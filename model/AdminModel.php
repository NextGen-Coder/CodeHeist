<?php 
    class AdminDBModel {

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
                "versionIndex" => "2",
                "stdin" => $inputCase,
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
            return $responseData = json_decode($response, TRUE);
        }



        public function calculateResults() {
            include("config.php");

            $deleteRecords = "DELETE FROM code_exe";
            mysqli_query($db, $deleteRecords);

            $allCodes = "SELECT * FROM code";
            $result = mysqli_query($db, $allCodes);
            
            $stmt = $db->prepare("INSERT INTO code_exe (user_id, code_id, challenge_id, output, test_case) VALUES ( ?, ?, ?, ?, ?)");
            $stmt->bind_param( "sssss", $userID, $codeID, $challengeID, $outputGiven, $testCase);
            
            while($row = mysqli_fetch_array($result)){
                $admin = new AdminDBModel();

                $allChallenges = "SELECT * FROM challenge where challenge_id='".$row['challenge_id']."'";
                $resultChallenges = mysqli_query( $db, $allChallenges);

                $challengeRow = mysqli_fetch_array($resultChallenges);
                $inputCase = $challengeRow['test_in_1'];

                echo "<script> window.alert('".$inputCase."'); </script>";

                $response = $admin->codeRun( $row['program'], $row['language'], $inputCase);
                echo "<script> window.alert('".$response["output"]."'); </script>";

                $userID = $row['user_id'];
                $codeID = $row['code_id'];
                $challengeID = 1;
                $outputGiven = $response['output'];
                $testCase = 1;

                if(!$stmt->execute()){
                    trigger_error("there was an error....".$db->error, E_USER_WARNING);
                }
            }
   
        }
        public function adminAuthenticate($adminId, $password1){
            include("config.php");
            session_start();

            $query = "SELECT * FROM admin WHERE admin_id = '$adminId' and password = '$password1'";
            
            if(mysqli_query($db, $query)){
                $_SESSION['login_user'] = $adminId;
                echo "<script>window.alert('Login Successfull'); window.location='../admin/adminDash.php';</script>";
                mysqli_close($db);
            }else{
                $error = "Your Login Id or Password is invalid";
                echo "<script>window.alert('$error'); window.location='../admin/adminlogin.php';</script>";
                mysqli_close($db);
            }
        }

        
    }

?>