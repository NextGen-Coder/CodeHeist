<?php
    include("../model/UserModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new UserDBModel();
        $userId = $_POST['user'];
        $password1 = $_POST['pass'];
        $entity->authenticate( $userId, $password1);
    } 
?>