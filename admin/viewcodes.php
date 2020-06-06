<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #00071d;
        }

        .name {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btnn {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btnn .text {
            background: #00071d;
            border: 0.5px solid grey;
            padding: 3px;
            width: 300px;
            color: white;
        }

        input::placeholder {
            padding: 2px 5px;
            opacity: 0.5;
        }

        .submit {
            border-radius: 18px;
        }

        @font-face {
            font-family: "Space Age";
            src: url(assets/fonts/spaceage.ttf);
        }

        .btnn {
            font-family: "Space Age";
            font-size: 1.1em;
        }
    </style>
</head>

<body>
<?php 
        session_start();
        if( $_SESSION['login_user']) {
        } else {
            echo "<script>window.location='viewcodes.php';</script>";
        }
    ?>
    <div class="name">
        <img src="../assets/images/name.png" alt="">
    </div>

    <div class="text-center">

        <h2>USER CODES</h2>
    </div>

    <?php

include("../model/config.php");
$sql = "SELECT * FROM user ";

if($result = mysqli_query($db, $sql)){
if(mysqli_num_rows($result) > 0){

?>
    <div class="">
        <div class="justify-content-center">
            <table class="table text-white bg-secondary text-center" style="border-radius: 8px;">
                <thead>
                    <tr class="bg-dark">

                        <th>UserID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Level</th>
                        <th>Codes</th>
                    </tr>
                </thead>
                <tbody>
                    <div id="accordion">
                        <?php
    
    while($row = mysqli_fetch_array($result)){ 
        $code_sql = "SELECT * FROM code WHERE user_id=".$row['user_id']."";
                    if($coderesult = mysqli_query($db, $code_sql)){
                        if(mysqli_num_rows($coderesult) > 0){ ?>
                        <tr>
                            <td> <?php echo $row['user_id'] ?> </td>
                            <td> <?php echo $row['user_name'] ?> </td>
                            <td> <?php echo $row['user_phone'] ?> </td>
                            <td>
                                <?php 
                    $u = $row['user_id'];

                    for( $i=0; $i<10; $i++) {
                        $code1 = "SELECT * FROM code,user WHERE code.challenge_id = $i AND user.user_id= '$u' ";
                        if($result1 = mysqli_query($db, $code1)){ 
                            $row1 = mysqli_fetch_assoc($result1);
                            if(mysqli_num_rows($result1)>0) { ?>
                                <button type="button" class="btn btn-light mb-2" data-toggle="collapse"
                                    data-target="#demo<?php echo $row1['challenge_id'].$u ?>">Level
                                    <?php echo $row1['challenge_id'] ?></button>
                                <?php echo "<br>";}  } } ?>
                            </td>
                            <td>

                                <?php 
                    $u = $row['user_id'];

                    for( $i=0; $i<10; $i++) {
                        $code1 = "SELECT * FROM code,user WHERE code.challenge_id = $i AND user.user_id= '$u' ";
                        if($result1 = mysqli_query($db, $code1)){ 
                            $row1 = mysqli_fetch_assoc($result1);
                            if(mysqli_num_rows($result1)>0) { ?>

                                <div id="demo<?php echo $row1['challenge_id'].$u ?>" class="collapse"
                                    data-parent="#accordion">
                                    Language = <?php echo $row1['language'] ; ?><br>
                                    <?php echo $row1['program'] ?>
                                </div>
                                <?php } } } ?>
                            </td>
                        </tr>
                        <?php  } ?>



                        <?php }  } }}?>


                    </div>
                </tbody>
            </table>
            <div class="row justify-content-center mt-3">
                <a type="submit" class="btn formbtn1 btn-info" href="./token.php">Register Token</a>
            </div>
        </div>
    </div>

    <div class="name text-white">
        <p class="text-center">
            In association with <br>
            <b>Priyadarshani J.L. College of Engineering</b>
        </p>
    </div>
</body>
<script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
<script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>

</html>