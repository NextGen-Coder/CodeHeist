<?php
   session_start();
   
   $_SESSION['login_user'] = null;
   if(session_destroy()) {
      header("Location: ../index.php");
   }
?>