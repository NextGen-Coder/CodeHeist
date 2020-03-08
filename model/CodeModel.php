<?php 
    class CodeDBModel {
        private function codeRun( $code, $language, $inputCase) {
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
                "stdin" => $inputCase,
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


        public function saveCode( $user, $code, $language, $level) {
            include("config.php");

            $_SESSION['code'] = $code;

            $runModel = new CodeDBModel();
            $responseData = $runModel->codeRun( $code, $language, $_SESSION['challenge_input']);

            $code_check_query = "SELECT * FROM code WHERE user_id='$user' and level='$level'";
            $result = mysqli_query($db, $code_check_query);

            if(mysqli_num_rows($result)==0) {
                // prepare and bind
                $stmt = $db->prepare("INSERT INTO code (user_id, language, program, level) VALUES ( ?, ?, ?, ?)");
                $stmt->bind_param("ssss", $user, $language, $code, $level);
                $stmt->execute();
                
            } else {
                $sql = "UPDATE code SET program='$code' WHERE user_id='$user' and level='$level'";

                if (mysqli_query($db, $sql)) {
                } else {
                    echo "<script>window.alert('Error updating record: " . mysqli_error($db)."');</script>";
                }
            }

            // Print the date from the response
            $_SESSION['outputCode'] = "<h4> ".$responseData['output']."</h4>";
            // echo "<script> window.location='../challenges.php';</script>";
        }
    }

?>