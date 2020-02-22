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
    <?php session_start(); ?>
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
                        <div class="col-sm-8 compiler">
                            <div class="row">
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
                                                <img id="screen-img" src="./assets/images/full.png">
                                            </button>
                                            <button id="run" type="submit">
                                                <img id="run-img" src="./assets/images/run2.png">
                                            </button>
                                        </div>
                                        <div id="editor"> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="bg-secondary compiler" style="height: 100px;">
                                output
                                <p> 
                                <?php 
                                if( isset($_SESSION['code'])) {
                                    echo $_SESSION['code'];
                                }
                                ?> 
                            </p>
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
<script src="assets/scripts/compiler.js"></script>
</html>