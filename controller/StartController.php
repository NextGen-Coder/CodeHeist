<?php
    include("../model/InitModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new InitCodesModel();
        $entity->initializeCodes();
    } 
?>