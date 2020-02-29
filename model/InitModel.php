<?php 
    class InitCodesModel {
        public function initializeCodes( $level) {
            include("config.php");
            session_start();
        
            $query = "SELECT * FROM challenge WHERE level ='$level'";

            $result = mysqli_query($db,$query);

            if (!$result) {
                $_SESSION['challenge_desc'] = '';
                $_SESSION['challenge_points'] = '';
                $_SESSION['challenge_test_out_1'] = '';
                $_SESSION['challenge_test_out_1'] = '';
                $_SESSION['challenge_test_in_1'] = '';
                $_SESSION['challenge_test_in_1'] = '';
                $_SESSION['challenge_input'] = '';
                $_SESSION['challenge_output'] = '';
            } else {
                $_SESSION['level'] = $level;  
                $row = mysqli_fetch_assoc($result);
                $_SESSION['challenge_desc'] = $row['description'];
                $_SESSION['challenge_points'] = $row['points'];
                $_SESSION['challenge_test_out_1'] = $row['test_out_1'];
                $_SESSION['challenge_test_out_1'] = $row['test_out_2'];
                $_SESSION['challenge_test_in_1'] = $row['test_in_1'];
                $_SESSION['challenge_test_in_1'] = $row['test_in_2'];
                $_SESSION['challenge_input'] = $row['input'];
                $_SESSION['challenge_output'] = $row['output'];
            }
            
            echo "<script> window.location='../challenges.php';</script>";
        }
    }

?>