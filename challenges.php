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
        height: 400px;
        border-radius: 5px;

    }

    .list-group-item-dark {
        padding: 25px 0px;
    }
    .list-group-item-dark:hover {
        text-decoration: none;
    }
    .blocks {
        font-size: 20px;
    }
</style>

<body class="bg-dark text-white container">
    <div style="height: 100vh;">
        <div>
            <h3>CODE-RELAY</h3>
            <div class="row ">

                <div class="col-sm-3">
                    <div class="list-group levels bg-secondary text-center">
                        <h3 class="text-white text-center pb-5 pt-5">LEVELS</h3>
                        <a href="challenges.php?level=1" class="list-group-item list-group-item-dark">level 1</a>
                        <a href="challenges.php?level=2" class="list-group-item list-group-item-dark">level 2</a>
                        <a href="challenges.php?level=3" class="list-group-item list-group-item-dark">level 3</a>
                        <a href="challenges.php?level=4" class="list-group-item list-group-item-dark">level 4</a>
                        <a href="challenges.php?level=5" class="list-group-item list-group-item-dark">level 5</a>
                    </div>
                </div>
                <?php 
                session_start();
                $level = $_GET['level'];
                
                
                if($level == $_GET['level']){  
                $level = $_GET['level']; 

                include("model/config.php");
                $query = "SELECT *  FROM challenge WHERE level =$level"; 
                $myquery=mysqli_query($db,$query);
                while($row = mysqli_fetch_assoc($myquery)){
                ?>
                <div class="col-sm-9 ">
                    <div class="row">
                        <div class="col-sm-8 bg-secondary description">
                            <div class="row pb-5">
                                <span class="ml-2 blocks">Description:</span> <br><?php echo $row['description']; ?>
                            </div>
                            <div class="row" style="border-top: 1px solid white;">
                                <span class="ml-2 blocks">Input :</span><br><?php echo $row['input']; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="bg-secondary" style="height: 200px; border-radius: 5px;">
                                <span class="ml-2 blocks">Expected output:</span> <br><span class="ml-4"><?php echo $row['output']; ?></span>
                            </div>
                        </div>
                    </div><?php }   } ?>
                    <div class="row ">
                        <div class="col-sm-8 compiler bg-secondary">
                            <div class="row">
                                compiler<!-- compiler added here -->
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="bg-secondary compiler" style=" width: 100%; height: 200px; ">
                                <span class="ml-2 blocks">Output</span>
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