<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



    <!-- <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script> -->


</head>

<body>
    <nav class="nb navbar navbar-expand-md bg-dark">
        <img src="../assets/images/clg_logo.png" width="120px" class="img-fluid" alt="">
        <div class="text-center mx-auto">
            <ul class="navbar-nav mr-auto">
                <div class="header text-white">
                    <p>Lokmanya Tilak Jankalyan Shikshan Sanstha</p>
                    <h2>Priyadarshini J.L. College of Engineering</h2>
                    <p>Department of Computer Science and Engineering</p>
                </div>
            </ul>
        </div>
        <img src="../assets/images/naac_logo.png" width="130px" class="img-fluid" alt="">
    </nav>

    <div class="container text-center">

        <h2>USER CODES</h2>
    </div>

    <?php

    include("../model/config.php");
    $sql = "SELECT * FROM user ";
    
    if($result = mysqli_query($db, $sql)){
        if(mysqli_num_rows($result) > 0){
    
    ?>
    <div class=" container">
        <div class="justify-content-center">
            <table class="table text-white bg-secondary" style="border-radius: 8px;">
                <thead>
                    <tr class="bg-dark">

                        <th>USER-ID</th>
                        <th>Name</th>
                        <th>College</th>
                        <th>Mobile</th>
                        <th>Level</th>
                        <th>Codes</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            
            while($row = mysqli_fetch_array($result)){ 
                $code_sql = "SELECT * FROM code WHERE user_id=".$row['user_id']."";
                            if($coderesult = mysqli_query($db, $code_sql)){
                                if(mysqli_num_rows($coderesult) > 0){ ?>
                    <tr>
                        <td> <?php echo $row['user_id'] ?> </td>
                        <td> <?php echo $row['user_name'] ?> </td>
                        <td> <?php echo $row['user_college'] ?> </td>
                        <td> <?php echo $row['user_phone'] ?> </td>
                        <td>
                        <?php 
                            $u = $row['user_id'];

                            for( $i=0; $i<10; $i++) {
                                $code1 = "SELECT * FROM code,user WHERE code.level = $i AND user.user_id= '$u' ";
                                if($result1 = mysqli_query($db, $code1)){ 
                                    $row1 = mysqli_fetch_assoc($result1);
                                    if(mysqli_num_rows($result1)==1) { ?> 
                                    <button type="button" class="btn btn-info" data-toggle="collapse"
                                        data-target="#demo<?php echo $row1['level'].$u ?>">Level
                                        <?php echo $row1['level']."</br>" ?></button>

                                <!-- <td>
                                    <div id="demo<?php echo $row1['level'].$u ?>" class="collapse">
                                        <?php echo $row1['program'] ?>
                                    </div>
                                </td> -->
                                
                                <?php } } } ?>
                            </td>
                            <td> 
                            </td>
                    </tr>
                    <?php  } ?>



                    <?php }  } }}?>


                </tbody>
            </table>
            <div class="row justify-content-center mt-3">
                <a type="submit" class="btn formbtn1 btn-info" href="./token.php">Register Token</a>
            </div>
        </div>
    </div>

</body>

</html>






<!-- <td><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">code
                                1</button>
                            <div id="demo" class="collapse">
                                <?php 
                                // $u = $row['user_id'];
                                // $code1 = "SELECT * FROM code,user WHERE code.level = 1 AND user.user_id= '$u' ";
                                //         if($result1 = mysqli_query($db, $code1)){ 
                                //             $row1 = mysqli_fetch_assoc($result1);
                                //             echo $row1['program'];   
                                //          }
                                ?>
                            </div>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">code
                                2</button>
                            <div id="demo1" class="collapse">
                                <?php 
                                // $code1 = "SELECT * FROM code,user WHERE code.level = 2 AND user.user_id= '$u' ";
                                //         if($result1 = mysqli_query($db, $code1)){ 
                                //             $row1 = mysqli_fetch_assoc($result1);
                                //             echo $row1['program'];   
                                //          }
                                        ?>
                            </div>


                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">code
                                3</button>
                            <div id="demo2" class="collapse">
                                <?php
                                //  $code1 = "SELECT * FROM code WHERE code,user WHERE code.level = 3 AND user.user_id= '$u' ";
                                //         if($result1 = mysqli_query($db, $code1)){ 
                                //             $row1 = mysqli_fetch_assoc($result1);
                                //             echo $row1['program'];   
                                //          }
                                        ?>
                            </div>
                            

                        </td> -->