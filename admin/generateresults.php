<?php 
    session_start();
    if( !isset($_SESSION['login_user'])) {
        echo "<script>window.location='adminlogin.php';</script>";
    }
    else if(isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <script src="../assets/bootstrap/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #00071d;
        }

        .name {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btnn {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btnn .text {
            background: #00071d;
            border: 0.5px solid grey;
            padding: 3px;
            width: 300px;
            color: white;
        }

        input::placeholder {
            padding: 2px 5px;
            opacity: 0.5;
        }

        .submit {
            border-radius: 18px;
        }

        @font-face {
            font-family: "Space Age";
            src: url(../assets/fonts/spaceage.ttf);
        }

        .btnn {
            font-family: "Space Age";
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <div class="name">
        <img src="../assets/images/name.png" alt="">
    </div>
    <?php 
        include("../model/config.php");

        // sql to delete a record
        $sql = "TRUNCATE TABLE results";

        if (! mysqli_query($db, $sql)) {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $userQuery = "SELECT * FROM user";
        $userResult = mysqli_query($db, $userQuery);

        while($userRow = mysqli_fetch_array($userResult)) {
            $codeQuery = "SELECT * FROM code_exe WHERE user_id = ".$userRow['user_id'];
            $codeResult = mysqli_query($db, $codeQuery);
            $totalPoints = 0;
            while($codeRow = mysqli_fetch_array($codeResult)) {
                $totalPoints += $codeRow['points'];
            } 
            // prepare and bind
            $stmt = $db->prepare("INSERT INTO results (user_id, total_points) VALUES ( ?, ?)");
            $stmt->bind_param("ss", $userRow['user_id'], $totalPoints);
            $stmt->execute();
        } 
        echo "<script>window.location='results.php';</script>";
    ?>
</body>

</html>

<?php } else {
    echo "<script>window.location='adminlogin.php';</script>";
} ?>