<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"href="assets/styles/fonts.css">
    <style>
    body {
        background: #00071d;
    }

    .name {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .start {
        position: absolute;
        height: 140px;
        width: 140px;
        border-radius: 50%;
        border: 10px solid #9C74F2;
        box-shadow: 1px 2px 15px 10px #9C74F2;
        align-items: center;
        justify-content: center;
        display: flex;
        color: #9C74F2;
    }

    .start:hover {
        border: 10px solid rgb(242, 116, 116);
        box-shadow: 1px 2px 15px 10px rgb(242, 116, 116);
        color: rgb(242, 116, 116);
    }

    .btnn {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .start p {
        font-weight: bolder;
    }

    @font-face {
        font-family: "Space Age";
        src: url(./fonts/spaceage.ttf);
    }

    .start {
        font-family: "Space Age";
        font-size: 1.1em;
    }
    </style>
</head>
<body>
<div class="name">
    <img src="assets/images/name.png"alt="">
</div>
    
<?php session_start();
include("model/config.php");
date_default_timezone_set("Asia/Kolkata");

$seasonQuery=mysqli_query($db, "select * from season where season_id=1");
$seasonData=mysqli_fetch_array($seasonQuery);
$startTime=date_format(date_create_from_format("Y-m-d H:i:s", $seasonData['start_time']), "Y-m-d H:i:s");
$endTime=date_format(date_create_from_format("Y-m-d H:i:s", $seasonData['end_time']), "Y-m-d H:i:s");
$currentTime=date("Y-m-d H:i:s");

if($currentTime >=$startTime) {
    if($currentTime < $endTime) {
        // Start Test
        $currTimeStamp=strtotime($currentTime);
        $endTimeStamp=strtotime($endTime);

        $min=floor(abs($endTimeStamp - $currTimeStamp) / (60));

        $countDownEndTime=date("Y-m-d H:i:s", strtotime('+'.$min.'minutes', strtotime($currentTime)));
        $_SESSION['end_time']=$countDownEndTime;

        ?>
        <div class="btnn">
            <a class="btnn"href="challenges.php?season=1&level=1">
                <div class="start">
                    <p class="h3">START</p>
                </div>
                <img src="assets/images/start.png"alt="">
            </a>
        </div>
        <?php
    }

    else {
        // Competition Ended
        echo "<p class='text-white text-center space h3 py-5 my-5'> Competition Ended</p>";
    }
}

else {
    // Competition isn't started
    echo "<p id='timer' class='text-white text-center space h3'></p>";
    ?>
    <div class="btnn">
        <a class="btnn"href="#">
            <div class="start">
                <p class="h3">START</p>
            </div>
            <img src="assets/images/start.png"alt="">
        </a>
    </div>
    <?php
}

?>



<div class="name text-white mt-4">
    <pre class="text-white">
<span class="h3">Instructions:-</span>
1. Browser Support - Google Chrome, Mozilla Firefox, Microsoft EDGE & Apple Safari.
2. Language Support - Java, C, C++ & Python. 
3. You need stable internet connectivity of at least 1.5 MBPS speed.
4. This will be an individual web proctored online challenge of 1 hours.
5. The test will have 5 problem statements each of which will have a pre-determined score. 
6. A participant’s final score will depend on -
   - No. of test cases passed and Code Efficiency.
   - Marks are assigned to the questions basis the difficulty level.
7. Submission of the code is required or points may not get allocated for the challenge.

<p class="text-center ">In association with <h6 class="text-center">Priyadarshini J.L. College of Engineering</h6></p>
    </pre><br>
    
</div>
</body>
<script>
var countDownDate=new Date("June 15, 2020 11:00:00").getTime();

var x=setInterval(function() {
        var now=new Date().getTime();
        var distance=countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days=Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours=Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes=Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds=Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("timer").innerHTML=days + "d "+ hours + "h "
        + minutes + "m "+ seconds + "s ";

        // If the count down is finished, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML="YOU CAN START TEST NOW";
        }
    }, 1000);
</script><script src="assets/bootstrap/jquery/dist/jquery.min.js"></script><script src="assets/bootstrap/dist/js/bootstrap.min.js"></script></html>