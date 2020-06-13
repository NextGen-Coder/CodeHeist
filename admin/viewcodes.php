<?php 
    session_start();
    if( !isset($_SESSION['login_user'])) {
        echo "<script>window.location='adminlogin.php';</script>";
    }
    else if(isset($_SESSION['admin'])) {
?>
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
    <div class="name">
        <img src="../assets/images/name.png" alt="">
    </div>
    <h3 class="text-center text-white my-4">All Codes</h3>

    <?php
        include("../model/config.php");
        $sql = "SELECT * FROM user";

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
                        <th>Mail</th>
                        <th>Level</th>
                        <th>Codes</th>
                    </tr>
                </thead>
                <tbody>
                    <div id="accordion">
    <?php
        while($row = mysqli_fetch_array($result)) { 
            $code_sql = "SELECT * FROM code WHERE user_id=".$row['user_id']."";
                if($coderesult = mysqli_query($db, $code_sql)){
                    if(mysqli_num_rows($coderesult) > 0){ 
    ?>
                        <tr>
                            <td> <?php echo $row['user_id'] ?> </td>
                            <td> <?php echo $row['user_name'] ?> </td>
                            <td> <?php echo $row['user_mail'] ?> </td>
                            <td>
                                <?php 
                                    $codeQuery1 = "SELECT * FROM code WHERE user_id= ".$row['user_id'];
                                    $codeResult1 = mysqli_query($db, $codeQuery1);
                                    //$codeRow1 = mysqli_fetch_array( mysqli_query($db, $codeQuery1));
                                    while($codeRow1 = mysqli_fetch_array( $codeResult1)) {
                                        echo "<button type='button' class='btn btn-light mb-2' data-toggle='collapse' data-target='#demo".$codeRow1['challenge_id'].$row['user_id']."'>Level ".$codeRow1['challenge_id']."</button>
                                        <br>";
                                    }
                                ?>
                            </td>
                            <td>
                            <?php 
                                    $codeQuery1 = "SELECT * FROM code WHERE user_id= ".$row['user_id'];
                                    $codeResult1 = mysqli_query($db, $codeQuery1);
                                    //$codeRow1 = mysqli_fetch_array( mysqli_query($db, $codeQuery1));
                                    while($codeRow1 = mysqli_fetch_array( $codeResult1)) {
                                        $htmlCode = "<div id='demo".$codeRow1['challenge_id'].$row['user_id']."' class='collapse' data-parent='#accordion'>".
                                        "Language = ".$codeRow1['language']."<br> ".$codeRow1['program']." </div>";

                                        $code = str_replace("<><><>","+",$htmlCode);
                                        $code = str_replace(">",">\n",$code);
                                        echo $code;
                                    }
                            ?>
                            </td>
                        </tr>
                        <?php  } ?>
                        <?php }  } }}?>
                    </div>
                </tbody>
            </table>
        </div>
    </div>

    <div class="name text-white">
        <p class="text-center">
            In association with <br>
            <b>Priyadarshini J.L. College of Engineering</b>
        </p>
    </div>
</body>
<script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
<script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
</html>
<?php } else {
    echo "<script>window.location='adminlogin.php';</script>";
} ?>