<?php
    include("../model/AdminModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new AdminDBModel();
        $adminId = $_POST['admin'];
        $password1 = $_POST['pass'];
        $entity->adminAuthenticate( $adminId, $password1);
    } 
?>