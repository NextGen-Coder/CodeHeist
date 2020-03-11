<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
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

    .formbtn {
        border-radius: 30px;
        color: white;
        background: #fc0a0a;
    }

    .height {
        height: 90vh;
    }

</style>

<body style="background: #413e3e">
    <div class="height">
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
            <div class="row justify-content-center mt-5">
                <h1 class="text-white fontfam">CODE-RELAY</h1>
                <h3 class="text-white fontfam">Admin Login</h3>
            </div>
            <form action="../controller/AdminLoginController.php" method="POST">
                <div class="form-group text-white my-4">
                    <label for="id">Admin Id:</label>
                    <input name="admin" type="text" style="background: #413e3e"
                        class="inputborder form-control text-white" id="id" placeholder="Enter login id">
                </div>
                <div class="form-group text-white">
                    <label for="pwd">Password:</label>
                    <input name="pass" type="password" style="background: #413e3e"
                        class="inputborder form-control text-white" id="password" placeholder="Enter password">
                </div>
            
                <div class="row justify-content-center mt-5">
                    <button type="submit" class="btn p-2 px-5 formbtn">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h4>NextGenCoder</h4>
    </div>
</body>

</html>