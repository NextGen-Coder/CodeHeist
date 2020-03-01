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
    <link rel="stylesheet" href="assets/styles/phase.css">
    <script src="./assets/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
</head>
<style>
    body {
        box-sizing: border-box !important
    }

    .header {
        padding: 20px;
        font-size: 20px;
        font-family: serifs;
    }

    .compiler {
        margin-top: 20px;
    }

    .description {
        width: 100%;
        height: 215px;
        border-radius: 5px;
    }

    .levels-a {
        height: 80vh;
    }

    .l1 {
        padding: 25px 0px;
    }

    .list {
        border: none;
        border-bottom: 2px solid grey;
    }

    .list:hover {
        text-decoration: none;
    }

    .blocks {
        font-size: 20px;
    }

    .desc1 {
        padding-bottom: 150px;
    }
</style>

<body class="text-white w-100">
    <?php 
        session_start();
        if( $_SESSION['login_user']) {
        } else {
            echo "<script>window.location='login.php';</script>";
        }
    ?>
    <div class="p-0 w-100 row">
        <h3 class="bg-dark m-0 py-3">CODE-RELAY</h3>
    </div>
    <div class="row bg-dark">
        <div class="col-3 bg-secondary">
            <div class="list-group levels-a levels bg-dark text-center">
                <h3 class="text-white text-center pb-5 pt-4">LEVELS</h3>
                <a href="controller/LevelController.php?level=1" class="list-group-item bg-dark list text-danger">level
                    1</a>
                <a href="controller/LevelController.php?level=2" class="list-group-item bg-dark list text-danger">level
                    2</a>
                <a href="controller/LevelController.php?level=3" class="list-group-item bg-dark list text-danger">level
                    3</a>
                <a href="controller/LevelController.php?level=4" class="list-group-item bg-dark list text-danger">level
                    4</a>
                <a href="controller/LevelController.php?level=5" class="list-group-item bg-dark list text-danger">level
                    5</a>
            </div>
        </div>
        <div class="col-9 bg-secondary">
            <div class="row pr-3 bg-secondary">
                <div class="col-8 bg-dark w-100 levels pr-3">
                    <p><?php echo $_SESSION['challenge_desc']; ?></p>
                    <br>
                    <h4>TEST INPUT &nbsp; &nbsp; <span><?php echo $_SESSION['challenge_input']; ?></span></h4>
                </div>
                <div class="col-4 bg-dark levels px-3 text-center" style="border-left: 2px solid saddlebrown">
                    <h4>TEST OUTPUT <br><br> <span><?php echo $_SESSION['challenge_output']; ?></span></h4>
                </div>
            </div>

            <div class="row pr-3">
                <div class="col-8 compiler p-0">
                    <!--Compiler-->
                    <form class="w-100" id="editorForm" action="controller/CodeController.php" method="post">
                        <div id="code-edit" class="row code-div mx-auto">
                            <div id="editor-menu">
                                <select name="language" class="options" id="prolang">
                                    <option value="java">Java</option>
                                    <option value="python">Python</option>
                                    <option value="c">C</option>
                                    <option value="cpp">Cpp</option>
                                    <option value="javascript">Javascript</option>
                                </select>
                                <select class="options" id="theme">
                                    <option value="dracula">Dark</option>
                                    <option value="xcode">Light</option>
                                </select>
                                <input type="text" hidden name="code" id="hiddencode">
                                <button id="screen">
                                    <img width="25px" id="screen-img" src="./assets/images/save.png">
                                </button>
                                <button id="run" type="submit">
                                    <img width="25px" id="run-img" src="./assets/images/run.png">
                                </button>
                            </div>
                            <div id="editor"> </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 bg-dark levels" style="height:358px; overflow: scroll !important;">
                    <h4 class="text-center">OUTPUT <br><br> </h4>
                    <p>
                        <?php 
                    if( isset($_SESSION['outputCode'])) {
                        echo $_SESSION['outputCode'];
                    }
                    ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-secondary w-100 p-2"></div>
        <div class="col-sm-12 mb-2 p-3 text-center bg-dark text-white justify-content-center">
            <p>Powered By</p>
            <h5 style="line-height: 2px;">NextGenCoder</h5>
        </div>
    </div>
</body>
<script src="assets/scripts/compiler.js"></script>

</html>