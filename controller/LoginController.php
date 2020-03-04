<?php
    include("../model/UserModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new UserDBModel();
        $userId = $_POST['user'];
        $password1 = $_POST['pass'];
        $language = $_POST['language'];
        $entity->authenticate( $userId, $password1,$language);
    } 
?>