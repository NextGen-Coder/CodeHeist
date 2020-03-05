<!-- 
<a href="controller/CalculateController.php"> Calculate Result </a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- JQuery Kaha Hai be -->
    <script src="assets/bootstrap/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
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

.img1{
        position: relative;
        left: 250px;
    }
    .img2{
        position: relative;
        right: 250px;
    }


</style>
<body class="bg-dark">
    <?php 
        session_start();
        if( $_SESSION['login_user']) {
        } else {
            echo "<script>window.location='login.php';</script>";
        }
    ?>

<nav class="nb navbar navbar-expand-md">
        <img src="./assets/images/clg_logo.png" width="120px" class="img1" alt="">
        <div class="text-center mx-auto">
            <ul class="navbar-nav">
                <div class="header text-white">
                    <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                    <h2>Priyadarshini J.L. College of Engineering</h2>
                    <p>Department of Computer Science and Engineering</p>
                </div>
            </ul>
        </div>
        <img src="./assets/images/naac_logo.png" width="130px" class="img2" alt="">
    </nav>
    <div class="formdiv container ">
        <div class="row justify-content-center mb-1 mt-3">
            <h1 class="text-white fontfam">CODE-RELAY</h1>
        </div>
        <form action="./controller/CalculateController.php" method="get">
            <div class="row justify-content-center mt-5 mb-5">
                <button type="submit" class="btn btn-dark borderbtn ">GENERATE RESULT</button>
            </div>
        </form>
    </div>
    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h5 style="line-height: 2px;">NextGenCoder</h5>
    </div>
</body>
</html>