<?php 
    class UserDBModel {
        public function authenticate( $userId, $password1, $language) {
            include("config.php");
            session_start();

            $query = "SELECT * FROM user WHERE user_id = '$userId' and user_pass = '$password1'";
            $result = mysqli_query($db, $query);
            
            // Number of rows fetched
            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['user_lang'] = $language;
                $_SESSION['login_user'] = $userId;

                echo "<script>window.alert('$userId');</script>";

                $sql = "UPDATE user SET languageUsed='$language' WHERE user_id=$userId";
                if (mysqli_query($db, $sql)) {
                    echo "<script>window.alert('Login Successfull'); window.location='../start.php';</script>";
                    mysqli_close($db);
                } else {
                    echo "<script>window.alert('Error updating record: " . mysqli_error($db)."');</script>";
                }
            } else {
                $error = "Your Login Id or Password is invalid";
                echo "<script>window.alert('$error'); window.location='../login.php';</script>";
                mysqli_close($db);
            }


        }
        public function registerUser( $user, $college, $mobile, $mail, $pass){
            include("config.php");
            session_start();
                $query = "INSERT INTO user (user_name, user_college, user_phone, user_mail, user_pass) 
                          VALUES('$user', '$college', '$mobile', '$mail', '$pass')";
                $result = mysqli_query($db, $query);
                if(!$result) {
                    echo "Error:".mysqli_error($db);
                    exit();
                } else {
                    echo "<script>window.alert('Register Successfull'); window.location='../admin/adminDash.php';</script>";
                }
               
            
        }
    }

?>