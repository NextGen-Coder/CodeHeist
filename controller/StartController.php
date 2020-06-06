<?php 
    session_start();
    include("../model/config.php");
    
    $userId = $_SESSION['login_user'];
    date_default_timezone_set("Asia/Kolkata");
    
    $duration = "";
    $res = mysqli_query($db, "select duration from timer");
    while($row = mysqli_fetch_array($res)){
        $duration = $row['duration'];
    }

    $_SESSION['duration'] = $duration;
    $_SESSION['start_time'] = date("Y-m-d H:i:s");

    $end_time = date("Y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));
    $_SESSION['end_time'] = $end_time;
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $entity = new UserDBModel();
        $userId = $_POST['user'];
        $password1 = $_POST['pass'];
        $entity->authenticate( $userId, $password1);
    } 
?>