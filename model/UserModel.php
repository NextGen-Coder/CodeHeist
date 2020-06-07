<?php 
    class UserDBModel {
        public function authenticate( $userId, $password1) {
            include("config.php");
            session_start();

            $query = "SELECT * FROM user WHERE user_id = '$userId' and user_pass = '$password1'";
            $result = mysqli_query($db, $query);
            
            // Number of rows fetched
            $count = mysqli_num_rows($result);

            if($count >= 1) {
                $_SESSION['login_user'] = $userId;
                echo "<script>window.alert('Login Successfull'); window.location='../start.php';</script>";
            } else {
                $error = "Your Login Id or Password is invalid";
                // $error = mysqli_error($db);
                echo "<script>window.alert('$error'); window.location='../login.php';</script>";
                mysqli_close($db);
            }


        }
        public function registerUser( $user, $college, $mobile, $mail, $pass){
            include("config.php");
            session_start();

            $errors = array(); 

            $user_check_query = "SELECT * FROM user WHERE user_mail='$mail' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $users = mysqli_fetch_assoc($result);
            
            if ($users) { // if user exists
              if ($users['user_mail'] === $mail) {
                array_push($errors, "Mail already exists");
              }
            }
            
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $query = "INSERT INTO user (user_name, user_college, user_phone, user_mail, user_pass) 
                          VALUES('$user', '$college', '$mobile', '$mail', '$pass')";
                $result1 = mysqli_query($db, $query);
                if(!$result1) {
                    echo "Error:".mysqli_error($db);
                    exit();
                } else {
                $select = "SELECT * FROM user WHERE user_mail='$mail'";
                if($result2 = mysqli_query($db, $select)){
                    while($row = mysqli_fetch_array($result2)){
                    $userid = $row['user_id'];
                    echo "<script>window.alert('Token Register Successfull,$userid,$pass'); window.location='../admin/adminDash.php';</script>";
                    }
                }

                }
            }
            else{
                echo "<script>window.alert('Token Already Exists'); window.location='../admin/adminDash.php';</script>";
 
            }
               
            
        }
    }

?>