<?php 
    class CodeDBModel {
        private function codeRun( $code, $language) {
            $language = $language=='python'?'python3':$language;
            $language = $language=='javascript'?'nodejs':$language;
    
            if($language=='c'||$language=='cpp') {
                $language ='cpp14';
                $code = str_replace(">",">\n",$code);
            }
            
            // The data to send to the API
            $postData = array(
                "script" => $code,
                "language" => $language,
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
    
            // Send the request
            $response = file_get_contents('https://api.jdoodle.com/execute', FALSE, $context);
    
            // Check for errors
            if($response === FALSE){
                die('Error');
            }
    
            // Decode the response
            return json_decode($response, TRUE);
        }


        public function saveCode( $user, $challenge, $code, $language) {
            include("config.php");

            $runModel = new CodeDBModel();
            $responseData = $runModel->codeRun( $code, $language);

            $code_check_query = "SELECT * FROM code WHERE user_id='$user' and challenge_id='$challenge'";
            $result = mysqli_query($db, $code_check_query);

            if(!mysqli_num_rows($result)>0) {
                // prepare and bind
                $stmt = $db->prepare("INSERT INTO code (user_id, challenge_id, language, program) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $user, $challenge, $_SESSION["user_lang"], $code);

                $stmt->execute();
            } else {
                $sql = "UPDATE code SET program='$code' WHERE user_id='$user' and challenge_id='$challenge'";

                if (mysqli_query($db, $sql)) {
                } else {
                    echo "<script>window.alert('Error updating record: " . mysqli_error($db)."');</script>";
                }
            }

            // Print the date from the response
            $_SESSION['code'] = $code;
            $_SESSION['outputCode'] = "<h4> ".$responseData['output']."</h4>";
            echo "<script> window.location='../challenges.php';</script>";

            // $code = mysqli_fetch_assoc($result);
            
            // $userid = $user['uid'];
            
            // // prepare and bind
            // $stmt = $db->prepare("INSERT INTO codes (uid, language, code) VALUES (?, ?, ?)");
            // $stmt->bind_param("sss", $userid, $language, $code);
            
            // $stmt->execute();
            
            // if(!$result) {
            //     echo "Error:".mysqli_error($db);
            //     exit();
            // } else {
            //     $_SESSION['login_mail'] = $mail;
            //     echo "<script>window.alert('Saved Successfull');</script>";
            // }
            //     echo "<script> window.location='../challenges.php';</script>";
        }
    }

?>