<?php
    include("../model/CodeModel.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new CodeDBModel();
        $code = $_POST['code'];
        $language = $_POST['language'];
        $mail = $_SESSION['login_user'];
        $entity->codeRun($mail, $code, $language);
    } 
?>