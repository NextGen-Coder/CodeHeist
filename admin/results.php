<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>

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

    <h2>LEADERBOARD</h2>
    </div>

    <?php

    include("../model/config.php");
    $sql = "SELECT * FROM user ORDER BY points DESC";
    
    if($result = mysqli_query($db, $sql)){
        if(mysqli_num_rows($result) > 0){
    
    ?>
    <div class=" container">
        <div class="justify-content-center">
    <table class="table text-white bg-secondary" style="border-radius: 8px;">
        <thead>
            <tr class="bg-dark">
                <th>Rank</th>
                <th>Id</th>
                <th>Name</th>
                <th>College</th>
                <th>Mobile</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
             $rank=1;
            while($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td> <?php echo " $rank" ?> </td>
                <td> <?php echo $row['user_id'] ?> </td>
                <td> <?php echo $row['user_name'] ?> </td>
                <td> <?php echo $row['user_college'] ?> </td>
                <td> <?php echo $row['user_phone'] ?> </td>
                <td> <?php echo $row['points'] ?> </td>
            </tr>
            <?php $rank++; } ?> 
         
            
        </tbody>
    </table> <?php } }?>
    </div>
    </div>

</body>

</html>