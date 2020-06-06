<?php
   session_start();
   
   $_SESSION['login_mail'] = null;
   if(session_destroy()) {
      header("Location: ../index.php");
   }
?>