<?php
    include("../model/UserModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new UserDBModel();
        $user = $_POST['user'];
        $college = $_POST['clg_name'];
        $branch = $_POST['branch'];
        $year = $_POST['year'];
        $mobile = $_POST['mobile'];
        $mail = $_POST['mail'];
        $pass = rand(10000000, 99999990);
        $entity->registerUser( $user, $college, $branch, $year, $mobile, $mail, $pass);
    }
?>