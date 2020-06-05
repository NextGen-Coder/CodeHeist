<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #00071d;
        }

        .name {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .start {
            position: absolute;
            height: 140px;
            width: 140px;
            border-radius: 50%;
            border: 10px solid rgb(242, 116, 116);
            box-shadow: 1px 2px 15px 10px rgb(242, 116, 116);
            align-items: center;
            justify-content: center;
            display: flex;
            color: rgb(242, 116, 116);
        }
        .start:hover {
            border: 10px solid #9C74F2;
            box-shadow: 1px 2px 15px 10px #9C74F2;
            color: #9C74F2;
        }

        .btnn {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .start p {
            font-weight: bolder;
        }

        @font-face {
            font-family: "Space Age";
            src: url(./fonts/spaceage.ttf);
        }

        .start {
            font-family: "Space Age";
            font-size: 1.1em;
        }
    </style>
</head>

<body>
    <div class="name">
        <img src="assets/images/name.png" alt="">
    </div>
    <div class="btnn">
        <a class="btnn" href="challenges.php?season=1&level=1">
            <div class="start">
                <p class="h3">START</p>
            </div>
            <img src="assets/images/start.png" alt="">
        </a>
    </div>
    <div class="name text-white mt-4">
        <p class="text-center">
            In association with <br>
            <b>Priyadarshani J.L. College of Engineering</b>
        </p>
</body>
<script src="assets/bootstrap/jquery/dist/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

</html>