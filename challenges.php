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
    .header {
        padding: 20px;
        font-size: 20px;
        font-family: serifs;
    }

    .compiler {
        margin-top: 10px;
    }

    .description,
    .compiler {
        width: 100%;
        height: 200px;
        border-radius: 5px;
    }

    .levels {
        height: 90vh;
        border-radius: 5px;

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
</style>

<body class=" text-white container l1" style="background-color:black;">
    <div class="" style="height: 100vh;">
        <div>
            <h3>CODE-RELAY</h3>
            <div class="row ">

                <div class="col-sm-3">
                    <div class="list-group levels bg-dark text-center">
                        <h3 class="text-white text-center pb-5 pt-5">LEVELS</h3>
                        <a href="controller/LevelController.php?level=1" class="list-group-item bg-dark list text-danger">level 1</a>
                        <a href="controller/LevelController.php?level=2" class="list-group-item bg-dark list text-danger">level 2</a>
                        <a href="controller/LevelController.php?level=3" class="list-group-item bg-dark list text-danger">level 3</a>
                        <a href="controller/LevelController.php?level=4" class="list-group-item bg-dark list text-danger">level 4</a>
                        <a href="ontroller/LevelController.php?level=5" class="list-group-item bg-dark list text-danger">level 5</a>
                    </div>
                </div>
                <?php 
                session_start();
                $level = $_SESSION['level'];
    
                if($level == $_SESSION['level']){  
                $level = $_SESSION['level']; 

                include("model/config.php");
                $query = "SELECT *  FROM challenge WHERE level =$level"; 
                $myquery=mysqli_query($db,$query);
                while($row = mysqli_fetch_assoc($myquery)){
                    
                ?>
                <div class="col-sm-9 ">
                    <div class="row">
                        <div class="col-sm-8 bg-dark description">
                            <div class="row pb-5">
                                <span class="ml-2 blocks">Description :</span> <span class="ml-3 blocks"><?php echo $row['description']; ?></span>
                            </div>
                            <div class="row" style="border-top: 1px solid grey;">
                                <span class="ml-2 blocks">Test Input :</span> <span class="ml-3 blocks"><?php echo $row['input']; ?></span> 
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="bg-secondary" style="height: 200px; border-radius: 5px;">
                                <span class="ml-2 blocks">Expected output:</span> <br><span
                                    class="ml-4"><?php echo $row['output']; ?></span>
                            </div>
                        </div>
                    </div><?php }   } ?>
                    <div class="row ">
                        <div class="col-sm-8 compiler">
                            <div class="row">
                                <!--Compiler-->
                                <form class="w-100" id="editorForm" action="controller/CodeController.php"
                                    method="post">
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
                                if( isset($_SESSION['outputCode'])) {
                                    echo $_SESSION['outputCode'];
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