<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gathering inputs
        $message = $_POST['message'];
        $userId = $_POST['user_id'];

        $query = "INSERT INTO feedbacks (user_id, message) VALUES('$userId', '$message')";
        $result1 = mysqli_query($db, $query);
    }
?>