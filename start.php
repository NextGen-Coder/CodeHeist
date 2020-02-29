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
.formdiv {
    width: 30%;
    border: 2px solid red;
    padding: 40px;
}

.borderbtn {
    padding: 55px 40px;
    border-radius: 100px;
    border: 5px solid red;
    font-size: 30px;
}
.borderbtn:hover {
    border: 5px solid springgreen;
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
            echo "<script>window.location='login.php';</script>";
        }
    ?>

    <nav class="nb navbar navbar-expand-md bg-dark">
        <img class="navbar-brand text-white" href="#">
        <div class="text-center mx-auto">
            <ul class="navbar-nav mr-auto">
                <div class="header text-white">
                    <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                    <h2>Priyadarshini J.L. College of Engineering</h2>
                    <p>Department of Computer Science and Engineering</p>
                </div>
            </ul>
        </div>
        <div class="text-white">
            <img class="navbar-brand text-white" href="#">
        </div>
    </nav>
    <div class="formdiv container ">
        <div class="row justify-content-center mb-1 mt-3">
            <h1 class="text-white fontfam">CODE-RELAY</h1>
        </div>
        <form action="./controller/LevelController.php" method="post">
            <div class="row justify-content-center mt-3 mb-5">
                <button type="submit" class="btn btn-dark borderbtn">START</button>
            </div>
        </form>
    </div>
    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h5 style="line-height: 2px;">NextGenCoder</h5>
    </div>
</body>
</html>