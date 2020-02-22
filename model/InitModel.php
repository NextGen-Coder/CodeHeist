<?php 
    class InitCodesModel {
        public function initializeCodes($level) {
            include("config.php");
            session_start();
            
            $query = "SELECT * FROM challenge WHERE levels ='$level'";
            $result = mysqli_query($db,$query);
            while($row = mysqli_fetch_assoc($myquery)){
                $_SESSION['description'] = $row['description'];
                $_SESSION['input'] = $row['input'];
                $_SESSION['output'] = $row['output'];


                 
            }
            echo "<script>window.alert('data added Successfull'); window.location='../challenges.php';</script>";

            
        }
    }

?>