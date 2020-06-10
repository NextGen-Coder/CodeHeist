<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gathering inputs
        $code = $_POST['code'];
        $language = $_POST['language'];
        $challengeId = $_POST['challengeId'];
        $case = $_POST['case'];
        $userId = $_SESSION['login_user'];
    
        // Some Mandatory Changes for JDoodle Requests 
        $language = $language=='python'?'python3':$language;
        $language = $language=='javascript'?'nodejs':$language;

        $code = str_replace("<><><>","+",$code);
        if($language=='c') {
            $language ='cpp14';
            $code = str_replace(">",">\n",$code);
        }

        //  FETCHING CHALLENGE 
        $challengeFetchingQuery = "SELECT * FROM challenge WHERE challenge_id=$challengeId"; 
        $row = mysqli_fetch_assoc( mysqli_query($db, $challengeFetchingQuery));
        
        // Object for sending response as JSON
        $ajaxResponse = json_decode('{ "testCase" : '.$case.', "success" : false }', TRUE);
        /////////////////// TEST CASE $case CHECKING ////////////////////

        // Input formatting
        $inputs = $row["input_$case"];
        $inputs = str_replace( " ", "\n", $inputs);

        // The data to send to the API
        $postData = array(
            "script" => $code,
            "language" => $language,
            "stdin" => $inputs."",
            "versionIndex" => "2",
            "clientId" => "be9a209b50977cbd22c436977ab648d0",
            "clientSecret" => "55794f230a6a52e27542d1f034747eb869b7ceef03b5c8f9cb0ae726c4ee14cc", 
            "verify_peer"=> true,
            "verify_peer_name"=> true,
            "cafile" => "/path/to/bundle/cacert.pem"
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

        // Checking Test Case 
        if( $responseData["output"]==$row["output_$case"] || 
            "\n".$responseData["output"]==$row["output_$case"] ||
            $responseData["output"]==$row["output_$case"]."\n") {
            $ajaxResponse["success"] = true;
        }

        
        // Fetching Code Execution Row
        $codeExeFetchingQuery = "SELECT * FROM code_exe WHERE challenge_id=$challengeId and user_id=$userId"; 
        $codeExeRow = mysqli_fetch_assoc( mysqli_query($db, $codeExeFetchingQuery));

        // Creating Query for Saving codes exe
        $stmt1 = "";
        $points = $row["points_per_case"];
        $newPoints = 0;
        $caseResult = "failed";
        
        for($i=1; $i<=4; $i++) {
            if( $i != $case+1 && $codeExeRow["case_$i"]=="success") {
                $newPoints += $points;
            }
        }

        $stmt1 = $db->prepare("UPDATE code_exe SET case_".($case+1)." = ?, points = ? WHERE challenge_id = ? and user_id = ?");

        if($ajaxResponse["success"]) {
            $newPoints += $points;
            $caseResult = "success";
        } else {
            $caseResult = "failed";
        }
        
        $stmt1->bind_param("ssss", $caseResult, $newPoints, $challengeId, $userId);
        

        if ( !$stmt1->execute()) {
            $ajaxResponse["alertToGive"] = " . $stmt->errno "."    ". $stmt->error;
        }
        
        echo json_encode($ajaxResponse);
    }
?>