<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGenCoder | Code Heist</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/button.css">
    <link rel="stylesheet" href="assets/styles/hover.css">
    <link rel="stylesheet" href="assets/styles/fonts.css">
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

        .pop-up textarea{
            background: #00071d;
        }
        .pop-up textarea::placeholder{
            color: whitesmoke;
            opacity: 0.8;
        }
        
        .code-heist-logo{
            margin: auto;
        }
        .code-heist-logo img{
            height: 150px;
            width: auto;
            margin: auto;
        }
       .names a{
        border-bottom: 2px solid;
       }
    </style>
</head>
<body>
<div id="response"></div>

<div class="pop-up text-center text-white mb-2" id="display" style="background: #00071d;">
    <div class="code-heist-logo">
        <img  src="assets/images/code_heist_end.png" alt="">
    </div>
    <p class="aquire">thank you for submiting the code</br>
    we appreciate your presence and efforts to solve</br>
    the code heist competition</p>
    
    <textarea class="text-white" id="message" cols="50" rows="4" placeholder="PLEASE ENTER YOUR FEEDBACK"></textarea>
    
    <h4 class="hacked text-danger">OUR TEAM</h4>
    <p class="aquire names"><a href="https://instagram.com/rajatpatil7?igshid=vsazl5mj2o7v" target="_blank">rajat patil</a> - lead developer</br>
    <a href="https://instagram.com/mohitugemuge" target="_blank">mohit ugemuge</a> - frontend developer</br>
    <a href="https://instagram.com/akramshaha75?igshid=x1ovcdgjqm87" target="_blank">akram shaha</a> - backend developer</br>
    <a href="https://instagram.com/kawadkar_nikhil?igshid=yetjzqvoo1qb" target="_blank">nikhil kawadkar</a> - coding challenges</br>
    <a href="https://instagram.com/praful.nimje?igshid=i8q6sc6e0yl5" target="_blank">praful nimje</a> - promotional video</br>
    <a href="https://instagram.com/nirbhay_bangare?igshid=c2uopv1m62d3" target="_blank">nirbhay bangare</a> - ui/ux & graphic designing</p>
    
    <h4 class="hacked text-danger">SPECIAL THANKS</h4>
    <h4 class="hacked">priyadarshini J.L college of Engineering</br>
    nandanvan, nagpur</h4>
    <h5 class="hacked">department of computer science and engineering</h5>
    <a href="https://pjlce.edu.in/">https://pjlce.edu.in/</a>
<br><br>
    <div class="pop-name row aquire">
    <p class="col-md-4">prof. ashish mohod <br> cse department pjlce</p>
    <p class="col-md-4">dr. v.p.balpande <br> hod cse department pjlce</p>
    <p class="col-md-4">dr. a.m.shende <br> principal pjlce</p>
    </div>

    <h4 class="hacked text-danger">ALSO FOLLOW US ON</h4>
    <a href="https://github.com/NextGen-Coder" target="_blank"><img src="assets/images/github.png" alt=""></a>
    <a href="https://instagram.com/nextgencoder?igshid=17phrlns9bck3" target="_blank"><img class="mx-5 my-2" src="assets/images/instagram.png" alt=""></a>
    <a href="https://codepen.io/nextgencoders" target="_blank"><img src="assets/images/codepen.png" alt=""></a>
    <br>
    <br>
    <button class="btn btn-info aquire" onclick="off()">exit</button>
</div>
<div id="display1">
    
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
            <b>Priyadarshini J.L. College of Engineering</b>
        </p>
    </div>
</div>
</body>
<script src="assets/jquery/dist/jquery.min.js"></script>  
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function on(){
       document.getElementById('display').style.display = "block";
       document.getElementById('display').style.transitionDuration = "2s";
       document.getElementById('display1').style.display = "none";
    }
    function off(){
        saveFeedback();
    }
</script>
<?php  
    if(isset($_GET["competition"]) && $_GET["competition"]=="ended") {
        echo "<script> on() </script>";
    }
?>
<!-- Script for Running Code -->
<script>
    function saveFeedback() {
        var message = document.getElementById("message").value;
        var userId = <?php echo $_GET["userId"] ?>;

        var checkingData = {
            "message" : message,
            "user_id" : userId
        }
        
        $.ajax({
            type: "POST",
            url: "model/Feedback.php",
            data: checkingData,
            beforeSend: function () {
                document.getElementById('display').style.display = "none";
                document.getElementById('display1').style.display = "block";
            },
            success: function (msg) {
                window.location = "controller/LogoutController.php";
            }
        });    
    }
</script>
</html>