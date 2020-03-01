<?php
    include("../model/CodeModel.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new CodeDBModel();
        $challenge = $_SESSION['challenge_id'];
        $user = $_SESSION['login_user'];
        $code = $_POST['code'];
        $language = $_POST['language'];
        $entity->saveCode( $user, $challenge, $code, $language);
    } 
?>