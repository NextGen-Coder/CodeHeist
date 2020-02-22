<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<style>
    .compiler {
        margin-top: 10px;
    }

    .description,
    .compiler {
        width: 100%;
        height: 100px;
    }

    .levels {
        height: 100%;
    }
</style>

<body class="bg-dark text-white ">
    <div class="" style="height: 100vh;">
        <div>
            <h3>CODE-RELAY</h3>
            <div class="row ">

                <div class="col-sm-3">
                    <div class="list-group levels bg-secondary text-center">
                        <h3 class="text-white text-center">LEVELS</h3>
                        <a href="#" class="list-group-item list-group-item-secondary">level 1</a>
                        <a href="#" class="list-group-item list-group-item-secondary">level 2</a>
                        <a href="#" class="list-group-item list-group-item-secondary">level 3</a>
                        <a href="#" class="list-group-item list-group-item-secondary">level 4</a>
                        <a href="#" class="list-group-item list-group-item-secondary">level 5</a>
                    </div>
                </div>
                <div class="col-sm-9 ">
                    <div class="row">
                        <div class="col-sm-8 bg-secondary description">
                            <div class="row">
                                Description
                            </div>
                            <div class="row">
                                Input
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="bg-secondary" style="height: 100px;">
                                Expected output
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-8 compiler bg-secondary">
                            <div class="row">
                                compiler
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="bg-secondary compiler" style="height: 100px;">
                                output
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header text-center text-white justify-content-center">
        <p>Powered By</p>
        <h5 style="line-height: 2px;">NextGenCoder</h5>
    </div>
    </div>
</body>

</html>