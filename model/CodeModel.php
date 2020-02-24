<?php 
    class CodeDBModel {
        public function codeRun( $code, $language) {
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
            $responseData = json_decode($response, TRUE);
    
            // Print the date from the response
            $_SESSION['code'] = $responseData['output'];
            echo "<script> window.location='../challenges.php';</script>";
        }


        public function saveCode( $mail, $code, $language) {
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
            $responseData = json_decode($response, TRUE);
    
            // Print the date from the response
            $_SESSION['code'] = $responseData['output'];
            echo "<script> window.location='../challenges.php';</script>";
        }

    }

?>