<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGenCoder | Code Heist</title>
    <!-- <link rel="shortcut icon" href="assets/images/case-success.png"> -->
    <link rel="stylesheet" href="assets/styles/fonts.css">
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

        .btnn {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .btnn .text{
            background: #00071d;
            border: 0.5px solid grey;
            padding: 3px;
            width: 300px;
            color: white;
        }
        input::placeholder{
            padding: 2px 5px;
            opacity: 0.5;
        }
        .submit{
            border-radius: 18px;
        }
        .btnn{
            font-size: 1.1em;
        }
    </style>
</head>
<body>    
    <div class="name">
        <img src="assets/images/name.png" alt="">
    </div>
    <div class="btnn space text-white mt-5">
        <form action="controller/LoginController.php" method="POST" class="">
            LOGIN ID <br>
            <input type="text" name="user" class="text" placeholder="LOGIN ID" required> <br><br>
            PASSWORD <br>
            <input type="password" id="pass" name="pass" class="text" placeholder="PASSWORD" required><br>
            <input type="checkbox" id="checkbox" onclick="toggle()"><code class="px-2 text-white">Show password</code>
            <div class="row justify-content-center">
                <input type="submit" class="mt-3  btn bg-danger text-white submit px-5" value="LOGIN">
            </div>
        </form>
    </div>
    <div class="name text-white mt-3">
        <p class="text-center">
            In association with <br>
            <b>Priyadarshini J.L. College of Engineering</b>
        </p>
    </div>
</body>
<script src="assets/bootstrap/jquery/dist/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    function toggle(){
        var temp = document.getElementById('pass');
        if(temp.type === "password")
        {
            temp.type = "text";
        }
        else{
            temp.type = "password";
        }
    };
</script>
</html>