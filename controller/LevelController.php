<?php 
    include("../model/InitModel.php");
        
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $entity = new InitCodesModel();
        $entity->initializeCodes( $_GET['level']);
    } 
        
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new InitCodesModel();
        $entity->initializeCodes( 1);
    } 
?>