<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
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
        padding: 0px 40px 40px 40px;
        position: relative;
        top:-50px;
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

    .formbtn1{
        border-radius: 18px;
        color: white;
        padding: 6px 90px;

    }

    .container1{
        height: 130vh;
    }

    .img1{
        position: relative;
        left: 250px;
    }
    .img2{
        position: relative;
        right: 250px;
    }

    .coderelay{
        position:relative;
    }

    
    
</style>

<body style="background: #413e3e">
<div class="container1">
    <nav class="nb navbar navbar-expand-md">
        <img src="../assets/images/clg_logo.png" width="120px" class="img1" alt="">
        <div class="text-center mx-auto">
            <ul class="navbar-nav">
                <div class="header text-white">
                    <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                    <h2>Priyadarshini J.L. College of Engineering</h2>
                    <p>Department of Computer Science and Engineering</p>
                </div>
            </ul>
        </div>
        <img src="../assets/images/naac_logo.png" width="130px" class="img2" alt="">
    </nav>
    
    <div class="p-0 m-0 w-100 row coderelay">
        <img src="../assets/images/code_relay.png" height="150px" width="500px" alt="" class="mx-auto">
    </div>

    <div class="formdiv container height">
        <div class="row justify-content-center mt-5" >
            <h3 class="text-white fontfam">Token Generation</h3>
        </div>
        <form action="../controller/RegisterController.php" method="POST">
            <div class="form-group text-white my-4">
                <label for="name"> Name</label>
                <input name="user" type="text" style="background: #413e3e" class="inputborder form-control text-white" id="name"
                    placeholder="Name">
            </div>
            <div class="form-group text-white">
                <label for="clg">College Name</label>
                <input name="clg_name" type="text" style="background: #413e3e" class="inputborder form-control text-white" id="clg"
                    placeholder="College name">
            </div>
            <div class="form-group text-white">
                <label for="mail">Email</label>
                <input name="mail" type="email" style="background: #413e3e" class="inputborder form-control text-white" id="mail"
                    placeholder="Email">
            </div>
            <div class="form-group text-white">
                <label for="mob">Mobile</label>
                <input name="mobile" type="number" style="background: #413e3e" class="inputborder form-control text-white"
                 id="mob" placeholder="Mobile">
            </div>
            <div class="form-group text-white">
                <label for="pwd"> Password</label>
                <input name="pass" type="text" style="background: #413e3e" class="inputborder form-control text-white" id="pwd"
                    placeholder="Enter password">
            </div>
            <div class="row justify-content-center mt-4">
                <button type="submit" class="btn p-2 px-5 formbtn">Register</button>
            </div>
        </form>
    </div>
    </div>
<br>
    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h4>NextGenCoder</h4>
    </div>
    </div>
</body>

</html>