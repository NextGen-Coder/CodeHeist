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
        border: 2px solid red;
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
</style>

<body class="bg-dark">
    <nav class="nb navbar navbar-expand-md bg-dark">
        <img src="./assets/images/clg_logo.png" width="120px" class="img-fluid" alt="">
        <div class="text-center mx-auto">
            <ul class="navbar-nav mr-auto">
                <div class="header text-white">
                    <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                    <h2>Priyadarshini J.L. College of Engineering</h2>
                    <p>Department of Computer Science and Engineering</p>
                </div>
            </ul>
        </div>
        <img src="./assets/images/naac_logo.png" width="130px" class="img-fluid" alt="">
    </nav>

    <div class="formdiv container ">
        <div class="row justify-content-center mb-3 mt-3">
            <h1 class="text-white fontfam">CODE-RELAY</h1>
        </div>
        <form action="./controller/LoginController.php" method="POST">
            <div class="form-group text-white mb-4">
                <label for="id">Login Id:</label>
                <input name="user" type="text" class="inputborder form-control bg-dark text-white" id="id"
                    placeholder="Enter login id">
            </div>
            <div class="form-group text-white">
                <label for="pwd">Password:</label>
                <input name="pass" type="password" class="inputborder form-control bg-dark text-white" id="password"
                    placeholder="Enter password">
            </div>
            <div class="row justify-content-center mt-5">
                <button type="submit" class="btn btn-dark p-2 pl-5 pr-5 borderbtn">Login</button>
            </div>
        </form>
    </div>


    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h4>NextGenCoder</h4>
    </div>


</body>

</html>