<?php
    include("../model/UserModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new UserDBModel();
        $user = $_POST['user'];
        $college = $_POST['clg_name'];
        $mobile = $_POST['mobile'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $entity->registerUser( $user, $college, $mobile, $mail, $pass);
    } 
?>