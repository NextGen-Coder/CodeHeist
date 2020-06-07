<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/button.css">
    <link rel="stylesheet" href="assets/styles/hover.css">
    <style>
        body {
            background: #00071d;
        }

        .name {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg {
            position: relative;
        }
    </style>
</head>
<body>
<?php  
session_start();

?>
<div id="response"></div>


    <div class="name">
        <img src="assets/images/name.png" alt="">
    </div>
    
    <div class="button1 mt-5">
        <li><a href="./admin/adminlogin.php" class="btn1 hvr-ripple-out">login as admin</a></li>
        <br><br>
        <li><a href="login.php" class="btn1 hvr-ripple-out">login as user</a></li>
    </div>

    <div class="name text-white mt-5">
        <p class="text-center">
            In association with <br>
            <b>Priyadarshani J.L. College of Engineering</b>
        </p>
    </div>
</body>
<script src="bootstrap/jquery/dist/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</html>