<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/button.css">
    <link rel="stylesheet" href="assets/styles/hover.css">
    <link rel="stylesheet" href="/assets/styles/fonts.css">
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
            height: auto;
            width: 80%;
            margin: auto;
            position: absolute;
            background: #00071d;
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

        .pop-up a img{
            height: 25px;
            width: auto;
        }  
        .pop-up a img:hover{
            opacity: 0.5;
        }
    </style>
</head>
<body>
<div id="response"></div>

<div class="pop-up text-center text-white" id="display" style="background: #00071d;">
    <img src="/coderelay/images/logo.png" alt="">
    <p class="aquire">thank you for submiting the code</br>
    we appreciate your presence and efforts to solve</br>
    the code heist competition</p>

    <h4 class="hacked text-danger">OUR TEAM</h4>
    <p class="hacked">rajat patil-lead developer</br>
    mohit ugemuge-frontend developer</br>
    nikhil kawadkar-coding challenges</br>
    praful nimje-promotional video</br>
    nirbhay bangare-ui/ux & graphic designing</p>
    
    <h4 class="hacked text-danger">SPECIAL THANKS</h4>
    <h4 class="hacked">priyadarshini J.L college of Engineering</br>
    nandanvan, nagpur</h4>
    <h5 class="hacked">department of computer science and engineering</h5>
    <a href="https://pjlce.edu.in/">https://pjlce.edu.in/</a>

    <h4 class="hacked text-danger">SPECIAL THANKS</h4>
    <div class="pop-name row aquire">
    <p class="col-md-4">prof. ashish mohod <br> cse department pjlce</p>
    <p class="col-md-4">dr. v.p.balpande <br> hod cse department pjlce</p>
    <p class="col-md-4">dr. a.m.shende <br> principal pjlce</p>
    </div>

    <h4 class="hacked text-danger">ALSO FOLLOW US ON</h4>
    <a href="https://github.com/NextGen-Coder"><img src="/assets/images/github.png" alt=""></a>
    <a href="https://instagram.com/nextgencoder?igshid=17phrlns9bck3"><img class="mx-5 my-2" src="/assets/images/instagram.png" alt=""></a>
    <a href="https://codepen.io/nextgencoders"><img src="/assets/images/codepen.png" alt=""></a>
    <br>
    <button class="btn btn-info aquire" onclick="off()">exit</button>
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