<?php 
    class InitCodesModel {
        public function initializeCodes( $level) {
            include("config.php");
            session_start();
        
            $query = "SELECT * FROM challenge WHERE levels ='$level'";

            $result = mysqli_query($db,$query);

            if (!$result) {
                echo("<script>window.alert('Error " . mysqli_error($db) . "'); </script>");
            }

            $_SESSION['level'] = $level;  
            $row = mysqli_fetch_assoc($result);
            $_SESSION['description'] = $row['description'];
            $_SESSION['input'] = $row['input'];
            $_SESSION['output'] = $row['output'];   

            echo "<script> window.location='../challenges.php';</script>";
        }
    }

?>