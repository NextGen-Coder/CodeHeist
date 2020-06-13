<?php 
    session_start();
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gathering inputs
        $code = $_POST['code'];
        $language = $_POST['language'];
        $challengeId = $_POST['challengeId'];
        $isOnlyRun = $_POST['isOnlyRun'];
        $id = $_SESSION['login_user'];

        // Getting User Id From Mail
        $userQuery = "SELECT * FROM user WHERE user_id='$id' LIMIT 1";
        $user = mysqli_fetch_assoc( mysqli_query($db, $userQuery));
        $userId = $user['user_id'];

        // Checking if code exists
        $codeQuery = "SELECT * FROM code WHERE challenge_id=$challengeId AND user_id=$userId"; 
        $codeRow = mysqli_fetch_assoc( mysqli_query($db,$codeQuery));

        // Creating Ajax Response Object
        $ajaxResponse = json_decode('{ "isSubmitted" : false, "success" : false, "output" : null, "alertToGive" : null, "save" : false }', TRUE);
        $sub = 0;

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

        // Random Test Case Credentials
        $clientId = "";
        $clientSecret = "";
        $choice = rand(1,40);

        switch ($choice) {
            // Praful Ids
            case 1:
                $clientId = "5093503a4fe139dcf0f23df1c61eea84";
                $clientSecret = "930ab6842aea84708c5c449005b6fd6b042f4666bc551af77904eb949c20adaa";
                break;
            case 2:
                $clientId = "414e0e7786b4a571ecb76830eb91af17";
                $clientSecret = "cef0ab10d8e0373958f5a48b1d2048189ca91634e0717d275028130d1293527e";
                break;
            case 3:
                $clientId = "62c27758d39df1c82553a2f2dc0ba21e";
                $clientSecret = "e24417fc7d028696438fbe2804c054b7121fb8de5f988b6cfba45bd4a29b361e";
                break;
            case 4:
                $clientId = "3a1f7073e0896a0715704c9837041163";
                $clientSecret = "2bcab6aacdc779b774f84962000e48be4cb54147f3d5acc0e921e3667d18304e";
                break;
            case 5:
                $clientId = "959c892c053af0cc2a49f4f4514f90eb";
                $clientSecret = "3344db82471296bd763a7589a8d1e8b89fead9965ffb7b5c8efc14e00d93f509";
                break;
            case 6:
                $clientId = "92817f535b1b1fcc7192a8d418159e23";
                $clientSecret = "fe2c716d2d883e50b0a3e44ffdef99b56afc97c029dee4243be17ac0a49592c7";
                break;
            case 7:
                $clientId = "35cfcdc7cdb3543397ba182e08c74d70";
                $clientSecret = "5b41307534b0bf028706326d186ef9624a56d899919a68da657ed25650ee32df";
                break;
            case 8:
                $clientId = "ab2e81cb727b96f444b0645c422825c2";
                $clientSecret = "8e28c23eaae181e520705abbb275ad3de52419d40d48a5bea4df17a79e55d400";
                break;
            case 9:
                $clientId = "859f7fe31f40b3cd9636e4f1191a6431";
                $clientSecret = "13c789b240a5e6cb2a503107cb7e0fe4fab386f982874d74edc99d7fc205dd94";
                break;
            case 10:
                $clientId = "cc098579efee70ce343714e0c6f35e29";
                $clientSecret = "45704ca99bf610154393ebf7331efb05ad7231451864ed7f2bf18b91f7a0c4f5";
                break;
            case 11:
                $clientId = "5961b86c6be5377472fa5aee8ed2f7d6";
                $clientSecret = "235febdc84c1ae25cf36e6f32704bdf4a3b2a36769db184a02ebe7c13955fb43";
                break;
            case 12:
                $clientId = "6773759a177c43c56ddda88c85fd69cc";
                $clientSecret = "8ed368ba6c46da484c278d96c8be1dbf2b7794ae8c15e627686471cc91b88323";
                break;
            case 13:
                $clientId = "7defdf6d312a7cf4b2be36a24c6b89ab";
                $clientSecret = "ef494a7f746916b3ea06ffe2287933ff8b587d26e3a1b74f566cf1c5623df35e";
                break;
            case 14:
                $clientId = "d193b837e688497169058b3a26b738c";
                $clientSecret = "98e1842a07f975d9f0bb583c96a71b232ce452df4235e0fda1b044a0186774ae";
                break;
            // Mohit Ids
            case 15:
                $clientId = "a4a35e631fb57084a02b59001de9e38d";
                $clientSecret = "1b55b972214c419d44aec5d9e2b07bf9de5d5e6bdfad36ed24fb5d50ce6db5dc";
                break;
            case 16:
                $clientId = "ceb36858813af886b3df9ba475fa1235";
                $clientSecret = "40f36a8a14b90b5108b22478037fcbf820b4c43a1396ff534320865bac2a610c";
                break;
            case 17:
                $clientId = "b282bcd7830cb17d8acc3f7c719f85a5";
                $clientSecret = "779336788b82dd9660d66229c79646fd49ebb89633cd136f56d1c52608e318f1";
                break;
            case 18:
                $clientId = "aa8de2900115b2f9cbc5720a1483ff7";
                $clientSecret = "ee73417afb00edbcaebc316dee78c8c6895ba6ba7a93d5d3222837916e023400";
                break;
            case 19:
                $clientId = "7de287d501c42bd53c683a3b3e74d074";
                $clientSecret = "960920233c6aef4f2c2e2540e3a8e42e040f2ded8de9a0e28cca490f04db1651";
                break;
            case 20:
                $clientId = "4f1d0a2a568d93879acfca0ec93025bf";
                $clientSecret = "46c4c8edfa9e506de3d8c91878f385261dc2eeac01697845274e43a95da6641";
                break;
            case 21:
                $clientId = "3629327e54b0b4bbb513696f6f3bf464";
                $clientSecret = "aec0ff1a1a37b9c7e819d7ae6f06e9d21ed1d0e18560b23d0385ae9f9f27e09f";
                break;
            case 22:
                $clientId = "ded3d1b69d7be766fbae2c9d6dc2b6db";
                $clientSecret = "5d41ad5dad5d1781f7fb10eae3ac570e0e28b0059e5c9d9170f37bcfdce8d904";
                break;
            // Nirbhay Ids
            case 23:
                $clientId = "c2c3d85452721f73ca37a92a018f7973 ";
                $clientSecret = "b2de79d239fbbfab734184037e355e5a5a495d2ca3430df9e6602f8878bd81a9";
                break;
            case 24:
                $clientId = "d97dec6519f3249a94c0053d81629efa";
                $clientSecret = "f10487ce50699d93c66e9ffc85ee55a871228ee2858f85776e25cd997e890dd5";
                break;
            case 25:
                $clientId = "9cbcdff491eecd29c7cd7d963ce197d1";
                $clientSecret = "71aa5e83700095c8e652bfa50acb1d57e552b93586fb10fde1c2bf32910cb44c";
                break;
            // Akram Ids
            case 26:
                $clientId = "8b92548806f2c63bb336875e249c4aee";
                $clientSecret = "cf03b201b88b770df98fa79511e3eac1f48e4e98c8aeb7841650d82b39ce99c9";
                break;
            case 27:
                $clientId = "42b1bf3251a92bc9825e249a3f4bf9c";
                $clientSecret = "37f9249747140a5b479790a643f0f7eb1dce592078fad02392ee73e29602a3a4";
                break;
            case 28:
                $clientId = "73f14d3d7fce088837d46923d0df4a";
                $clientSecret = "856f8ae8611ad48c4c19afc301e867af22b0b807c809dfc891d94f82d753be41";
                break;
            case 29:
                $clientId = "da084e41a0816a2721bde0cf50190fc";
                $clientSecret = "9c7c4b0fd2a70a65175865e657db2bdaaf314243f4bb4cb4a21f11aab8529a40";
                break;
            case 30:
                $clientId = "3030ae36c5273711beccfbe2e2dea582";
                $clientSecret = "8ae673048914707e46e1d714079317d509afa73b087e7f88b9f04a49a183d399";
                break;
            case 31:
                $clientId = "ba1358f0bf98df72e0e2b2668cab8c89";
                $clientSecret = "e43eee3232d408062081c0db003b83c2f7c21b495243c6544c0a7f9550e0efe7";
                break;
            case 32:
                $clientId = "5d5d06cb4445dbc47b696a8944c6e523";
                $clientSecret = "451f39cf4acbd29d05a566792fef4be718f1d96c9279bb5bee0d27c300ee5";
                break;
            case 33:
                $clientId = "6739feecbcdb4e9cd0e3c768734487ec";
                $clientSecret = "5618662d8a072fd4523cbf7eec827030ae786ae2069aeabfcac0204dbfe5fd6";
                break;
            // Nikhil Ids
            case 34:
                $clientId = "82f2a2a291860f569dee52781772e9a7";
                $clientSecret = "33c3e9b9e543fed4340268523297ef8a58a4269a123865aa83fa3a46daa40729";
                break;
            case 35:
                $clientId = "1b386dd2d1acae2cdef077f983aa0a05";
                $clientSecret = "810d1005b495a4fd6cbc088f9b54e48a48be9ea009b7662a12a59d85a2e862ee";
                break;
            case 36:
                $clientId = "9507c84c7df0f5e8e6fddbbc30ac3b4e";
                $clientSecret = "b4629f6968e3d58d844f0e14188a0a8e02a32abc36800617f52623600dd83648";
                break;
            // Praful Ids
            case 37:
                $clientId = "504773be7388879a886207301c986169";
                $clientSecret = "88755a955806d840e529982a0431993fff4ca498b767146a8ea5d1a9f6035cf9";
                break;
            case 38:
                $clientId = "6c52c3265f3e6a6c9f3a78f6327e40b4";
                $clientSecret = "edc9214558efa4f79ffef69c287d8d47a3eb329c19c5bfb419f26d5650bfea98";
                break;
            case 39:
                $clientId = "fe01950f7abc4d82e7945ee5acca45bc";
                $clientSecret = "588972f5ac38c2f20f3938f51756c2c52fc70b525dcc684d62c193bd2e2b63a0";
                break;
            case 40:
                $clientId = "7ea8bd656c152d24c066b79c98ad29ad";
                $clientSecret = "b6e57fbf2e656b57290efe6c5c36c0ffe75fe54298c942b66873773fa2863e4c";
                break;

            default:
                $clientId = "ed3d8b92ac70bc1c3ad2382d334afc1d";
                $clientSecret = "ad03c152017d7fccc90dcfd4ac6bd6bde753f53438061dd1cecc46e56b57d85b";
        }

        // The data to send to the API
        $postData = array(
            "script" => $code,
            "language" => $language,
            "stdin" => $inputs,
            "versionIndex" => "2",
            "clientId" => $clientId,
            "clientSecret" => $clientSecret
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
        
        if( $isOnlyRun==false || $isOnlyRun=="false") {
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
                $sub = $codeExeRow["submitted"];

                if( $sub < 1) {
                    if($codeExeRow["case_2"]=="success") {
                        $newPoints += $points;
                    }
                    if($codeExeRow["case_3"]=="success") {
                        $newPoints += $points;
                    }
                    if($codeExeRow["case_4"]=="success") {
                        $newPoints += $points;
                    }

                    $stmt1 = $db->prepare("UPDATE code_exe SET case_1 = ?, points = ?, submitted = ? WHERE challenge_id = ? and user_id = ?");

                    if($ajaxResponse["success"]) {
                        $newPoints += $points;
                        $caseResult = "success";
                    } else {
                        $caseResult = "failed";
                    }
                    $sub += 1;
                    $stmt1->bind_param("sssss", $caseResult, $newPoints, $sub, $challengeId, $userId);

                    if ( ! $stmt1->execute()) {
                        $ajaxResponse["alertToGive"] = " . $stmt->errno "."    ". $stmt->error;
                    }
                } else {
                    $ajaxResponse["isSubmitted"] = true;
                }
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

                if ( ! $stmt1->execute()) {
                    $ajaxResponse["alertToGive"] = " . $stmt->errno "."    ". $stmt->error;
                }
            }
        }
        echo json_encode($ajaxResponse);
    }
?>