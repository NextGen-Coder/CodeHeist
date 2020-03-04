<?php
    include("../model/AdminModel.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $entity = new AdminDBModel();
        $entity->calculateResults();
    } 
?>