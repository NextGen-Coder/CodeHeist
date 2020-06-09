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
        .pop-up{
            height: 80vh;
            width: 80%;
            margin: auto;
            position: fixed;
            background: whitesmoke;
            border: 1px solid black;
            border-radius: 5px;
            color: black;
            z-index:2;
            display: none;
            left: 150px;
        }
        .log{
            position:absolute;
            right: 0;
            top: 0;
        }
    </style>
</head>
<body>
<div id="response"></div>

    <div class="pop-up text-center" id="display">
        <h1>hmm......</h1>
        <button class="btn btn-info" onclick="off()">ok</button>
    </div>

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
<script>
    function on(){
       document.getElementById('display').style.display = "block";
       document.getElementById('display').style.transitionDuration = "2s";
    }
    function off(){
       document.getElementById('display').style.display = "none";
       window.location = "controller/LogoutController.php";
    }
</script>
<?php  
    session_start();

    if(isset($_GET["competition"]) && $_GET["competition"]=="ended") {
        echo "<script> on() </script>";
    }
?>
</html>