<!-- 
<a href="controller/CalculateController.php"> Calculate Result </a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- JQuery Kaha Hai be -->
    <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<style>
.header {
    padding: 20px;font-size: 20px; font-family: serifs;
}
.header > p {
    line-height: 0px;
}

.borderbtn {
    padding: 110px 15px;
    border-radius: 50%;
    border: 11px solid red;
    font-size: 30px;
}
.borderbtn:hover {
    border: 11px solid springgreen;
}
.fontfam {
    font-family: 'old english';
}



</style>
<body class="bg-dark">
    <?php 
        session_start();
        if( $_SESSION['login_user']) {
        } else {
            echo "<script>window.location='adminDash.php';</script>";
        }
    ?>

<nav class="nb navbar navbar-expand-md">
            <div class="text-center mx-auto">
                <ul class="navbar-nav">
                <img src="../assets/images/clg_logo.png" width="120px" class="img1" alt="">
                    <div class="header text-white">
                        <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                        <h2>Priyadarshini J.L. College of Engineering</h2>
                        <p>Department of Computer Science and Engineering</p>
                    </div>
                    <img src="../assets/images/naac_logo.png" width="140px" class="img2" alt="">
                </ul>
            </div>
        </nav>
        
    <div class="formdiv container ">
        <div class="row justify-content-center mb-1 mt-3">
            <h1 class="text-white fontfam">CODE-RELAY</h1>
        </div>
        <!-- /*token generation */ -->
        <form action="token.php">
        <div class="row justify-content-center ">
                <button type="submit" class="btn btn-dark ">GENERATE Token</button>
            </div>
        </form>
        <!-- <form action="./results.php" method="post">
            <div class="row justify-content-center mt-5 mb-5">
                <button type="submit" class="btn btn-dark borderbtn ">GENERATE RESULT</button>
            </div>
        </form> -->

        <div class="row justify-content-center mt-3">
                <a type="submit" class="btn formbtn1 btn-info" href="./viewcodes.php">View Codes</a>
            </div>
    </div><?php

include("../model/config.php");
$sql = "SELECT * FROM user ";

if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){

?>
<div class=" container">
    <div class="justify-content-center">
<table class="table text-white bg-secondary" style="border-radius: 8px;">
    <thead>
        <tr class="bg-dark">
            
            <th>Id</th>
            <th>Name</th>
            <th>College</th>
            <th>Mobile</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    
        <?php
         
        while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            
            <td> <?php echo $row['user_id'] ?> </td>
            <td> <?php echo $row['user_name'] ?> </td>
            <td> <?php echo $row['user_college'] ?> </td>
            <td> <?php echo $row['user_phone'] ?> </td>
            <td> <?php echo $row['user_mail'] ?> </td>
        </tr>
        <?php } ?> 
     
        
    </tbody>
</table> <?php } }?>
</div>
</div>





    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h5 style="line-height: 2px;">NextGenCoder</h5>
    </div>
</body>
</html>