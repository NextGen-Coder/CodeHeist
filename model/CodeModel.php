<?php 
    session_start();
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gathering inputs
        $code = $_POST['code'];
        $language = $_POST['language'];
        $challengeId = $_POST['challengeId'];
        $id = $_SESSION['login_user'];

        // Getting User Id From Mail
        $userQuery = "SELECT * FROM user WHERE user_id='$id' LIMIT 1";
        $user = mysqli_fetch_assoc( mysqli_query($db, $userQuery));
        $userId = $user['user_id'];

        // Checking if code exists
        $codeQuery = "SELECT * FROM code WHERE challenge_id=$challengeId AND user_id=$userId"; 
        $codeRow = mysqli_fetch_assoc( mysqli_query($db,$codeQuery));

        // Creating Ajax Response Object
        $ajaxResponse = json_decode('{ "success" : false, "output" : null, "alertToGive" : null, "save" : false }', TRUE);

        // Creating Query for Saving codes
        $stmt = "";
        if( $codeRow) {
            // prepare and bind
            $stmt = $db->prepare("UPDATE code SET program = ?, language = ? WHERE challenge_id = ? and user_id = ?");
            $stmt->bind_param("ssss", $code, $language, $challengeId, $userId);
        } else {
            // prepare and bind
            $stmt = $db->prepare("INSERT INTO code (user_id, challenge_id, program, language) VALUES ( ?, ?, ?, ?)");
            $stmt->bind_param("ssss", $userId, $challengeId, $code, $language);
        }

        if ($stmt->execute()) {
            $ajaxResponse["save"] = true;
            $ajaxResponse["alertToGive"] = "Code saved successfully";
        } else {
            $ajaxResponse["alertToGive"] = "Error saving code Please check your network connection";
            // $ajaxResponse["alertToGive"] = (" . $stmt->errno . ") " . $stmt->error;
        }


        /******************* CODE RUN ********************/

        // Some Mandatory Changes for JDoodle Requests 
        $language = $language=='python'?'python3':$language;
        $language = $language=='javascript'?'nodejs':$language;

        $code = str_replace("<><><>","+",$code);
        if($language=='c') {
            $language ='cpp14';
            $code = str_replace(">",">\n",$code);
        }

        /////////////////////  FETCHING CHALLENGE ////////////////////
        $challengeFetchingQuery = "SELECT * FROM challenge WHERE challenge_id=$challengeId"; 
        $row = mysqli_fetch_assoc( mysqli_query($db, $challengeFetchingQuery));

        // Input formatting
        $inputs = $row["input_0"];
        $inputs = str_replace( " ", "\n", $inputs);

        // The data to send to the API
        $postData = array(
            "script" => $code,
            "language" => $language,
            "stdin" => $inputs,
            "versionIndex" => "2",
            "clientId" => "ed3d8b92ac70bc1c3ad2382d334afc1d",
            "clientSecret" => "ad03c152017d7fccc90dcfd4ac6bd6bde753f53438061dd1cecc46e56b57d85b"
        );

        // Create the context for the request
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' =>  "Content-Type: application/json\r\n",
                'content' => json_encode($postData)
            )
        ));

        // Sending request and getting response
        $response = file_get_contents('https://api.jdoodle.com/execute', FALSE, $context);

        // Checking for errors
        if($response === FALSE){
            die('Error');
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);
        $ajaxResponse["output"] = $responseData["output"];
        
        if( $responseData["output"]==$row["output_0"] || 
            "\n".$responseData["output"]==$row["output_0"] ||
            $responseData["output"]==$row["output_0"]."\n") {
            $ajaxResponse["success"] = true;
        }
        $ajaxResponse["output"] = $responseData["output"];
        
        // Fetching Code Execution Row
        $codeExeFetchingQuery = "SELECT * FROM code_exe WHERE challenge_id=$challengeId and user_id=$userId"; 
        $codeExeRow = mysqli_fetch_assoc( mysqli_query($db, $codeExeFetchingQuery));

        // Creating Query for Saving codes exe
        $stmt1 = "";
        $points = $row["points_per_case"];
        $newPoints = 0;
        $caseResult = "failed";
        if( $codeExeRow) {
            // prepare and bind
            if($codeExeRow["case_2"]=="success") {
                $newPoints += $points;
            }
            if($codeExeRow["case_3"]=="success") {
                $newPoints += $points;
            }
            if($codeExeRow["case_4"]=="success") {
                $newPoints += $points;
            }

            $stmt1 = $db->prepare("UPDATE code_exe SET case_1 = ?, points = ? WHERE challenge_id = ? and user_id = ?");

            if($ajaxResponse["success"]) {
                $newPoints += $points;
                $caseResult = "success";
            } else {
                $caseResult = "failed";
            }
            
            $stmt1->bind_param("ssss", $caseResult, $newPoints, $challengeId, $userId);
        } else {
            // prepare and bind
            $stmt1 = $db->prepare("INSERT INTO code_exe (user_id, challenge_id, case_1, points) VALUES ( ?, ?, ?, ?)");
            
            if($ajaxResponse["success"]) {
                $newPoints += $points;
                $caseResult = "success";
            } else {
                $caseResult = "failed";
            }
            $stmt1->bind_param("ssss", $userId, $challengeId, $caseResult, $newPoints);
        }

        if ( ! $stmt1->execute()) {
            $ajaxResponse["alertToGive"] = " . $stmt->errno "."    ". $stmt->error;
        }
        
        echo json_encode($ajaxResponse);
    }
?>