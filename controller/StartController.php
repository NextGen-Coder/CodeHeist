<?php
    include("../model/UserModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new InitCodesModel();
        $entity->authenticate( $userId, $password1);
    } 
?>