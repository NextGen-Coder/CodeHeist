<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<style>
    .header {
        padding: 20px;
        font-size: 20px;
        font-family: serifs;
    }

    .header>p {
        line-height: 0px;
    }

    .formdiv {
        width: 30%;
        padding: 40px;
    }

    .inputborder {
        border: none;
        border-bottom: 1px solid grey;
    }

    .inputborder:hover {
        border: none;
        border-bottom: 1px solid springgreen;
    }

    .fontfam {
        font-family: 'old english';
    }

    .formbtn{
        border-radius: 30px;
        color: white;
        background: #fc0a0a;
    }
    .height{
        height: 50vh;
    }

    .img1{
        position: relative;
        left: 250px;
    }
    .img2{
        position: relative;
        right: 250px;
    }

    .button{
        padding: 6px 40px;
        border-radius:30px;
        background:#e4e4e4;
        color:#413e3e;
        font-weight:bolder;
    }

    .button1{
        margin-top:30px;
    }

    .footerr{
        margin-top:80px;
    }
</style>

<body style="background: #413e3e">
    <div class="height"><br>
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
 
    <div class="p-0 m-0 w-100 row coderelay">
        <img src="./assets/images/code relay.png" height="auto" width="300px" alt="" class="mx-auto mt-3">
    </div>
<div class="button1">
    <div class="row justify-content-center">    
     <a href="./admin/adminlogin.php"><button class="btn button ">Log In As Admin</button></a>
    </div><br>
    <div class="row mx-auto justify-content-center">
     <a href="./login.php"><button class="btn button ">Log In As User</button></a>
    </div>
</div>
    <div class="header text-center text-white justify-content-center footerr">
        <p>Powered By</p>
        <h4>NextGenCoder</h4>
    </div>
</body>
</html>