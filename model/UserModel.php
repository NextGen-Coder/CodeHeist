<?php 
    class UserDBModel {
        public function authenticate( $userId, $password1) {
            include("config.php");
            session_start();

            $query = "SELECT * FROM user WHERE user_id = '$userId' and user_pass = '$password1'";
            $result = mysqli_query($db, $query);
            
            // Number of rows fetched
            $count = mysqli_num_rows($result);
            mysqli_close($db);

            if($count == 1) {
                $_SESSION['login_user'] = $userId;
                echo "<script>window.alert('Login Successfull'); window.location='../start.php';</script>";
            } else {
                $error = "Your Login Id or Password is invalid";
                echo "<script>window.alert('$error'); window.location='../login.php';</script>";
            }
        }
    }

?>