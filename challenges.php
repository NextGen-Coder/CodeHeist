<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/phase.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/fonts.css">
    <style>
        body {
            min-height: 100vh;
            background: #00071d;
            color: white;
            overflow-x: hidden;
        }

        li{
            list-style-type: none;
        }

        li a{
            border-bottom: 1px solid white;
        }
        
        .test-span {
            color: gray;
        }

        #submit-btn {
            bottom: 0px;
        }

        .output-division {
            height: 80%;
        }
        .round{
            border-radius:10px;
        }
        #response{
            position:absolute;
            top:0;
            right:0;
        }
    </style>
</head>

<?php 
    include("model/config.php");
    session_start();
    date_default_timezone_set("Asia/Kolkata");

    $season = $_GET['season'];
    $level = $_GET['level'];

    $challengeQuery = "SELECT * FROM challenge WHERE season='".$season."' AND level='".$level."'"; 
    $challengeData = mysqli_fetch_assoc( mysqli_query($db, $challengeQuery));

    $userQuery = "SELECT * FROM user WHERE user_id='".$_SESSION['login_user']."'";
    $userRow = mysqli_fetch_assoc( mysqli_query($db,$userQuery));

    $codeQuery = "SELECT * FROM code WHERE challenge_id=".$challengeData["challenge_id"]." AND user_id=".$userRow["user_id"]; 
    $codeRow = mysqli_fetch_assoc( mysqli_query($db,$codeQuery));

    if( $_SESSION['login_user']) { 
?>

<body>
    <div class="row">
        <div class="col-md-4">
            <div class="pl-5">
            <img src="assets/images/code_heist.png" alt="">
            </div>
        </div>

        <div class="col-md-8 pl-5">
            <img src="assets/images/pow_by_ngc.png" alt="">
        <div id="response" class="space bg-danger h3 d-inline mr-5 mt-5 text-white border px-4 py-1 rounded"></div>
        </div>
    </div>

    <div class="row container-fluid mx-auto mb-3">

        <div class="col-md-3 border round">
            <div class="text-center">
                <h1 class="text-white text-center pt-4 hacked">PROGRAMS</h3>
                <?php
                    for( $i=1; $i<=5; $i++) {
                        echo "<li class='p-2 space h4'>";

                        echo ($i==$level) ? "<a href='#'" : "<a href='challenges.php?season=$season&level=".($i)."'";

                        echo "class='list text-danger py-2 px-4'>CODE
                                ".($i)."</a> </li>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-9 ">
            <div class="col test">
            <div class="row-4 row border round">
                <div class="col-md-8">
                    <p class="p-3 helvetica">
                    <?php echo $challengeData['description']; ?>
                    </p>
                </div>
                <div class="col-md-4 col text-center py-3">
                    <div class="border-left py-3">
                    <div class="row-md-6">
                        <h3 class="pt-3 hacked">TEST INPUT</h3>
                        <p class="helvetica"> <?php echo $challengeData['input_0']; ?> </p>
                    </div>
                    <div class="row-md-6">
                        <h3 class="pt-3 hacked">TEST OUTPUT</h3>
                        <p class="helvetica"> <?php echo $challengeData['output_0']; ?> </p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row-md-4 row text-center border round mt-2">
                <div class="col-md-8 compiler p-0 ">
                    <!--Compiler-->
                    <div id="code-edit" class="row code-div container mx-auto">
                        <div id="editor-menu">
                            <select name="language" class="options" id="prolang">
                                <option value="java">Java</option>
                                <option value="python">Python</option>
                                <option value="c">C</option>
                                <option value="cpp">Cpp</option>
                                <option value="javascript">Javascript</option>
                            </select>
                            <input type="hidden" id="chId" value="<?php echo $challengeData['challenge_id'] ?>">
                            <input type="text" hidden name="code" id="hiddencode">
                            <button id="run" onclick="saveCode( true)" type="button">
                                <img id="run-img" src="assets/images/run.png">
                            </button>
                        </div>
                        <div id="editor"> </div>
                    </div>
                </div>
                <div class="col-md-4 border-left rounded">
                    <div class="output-division">
                        <h3 class="pt-3 hacked">OUTPUT</h3>
                        <p id="outputPrint"> </p>
                    </div>
                    <div class="submit-division">
                        <button id="submit-btn" class="btn btn-danger w-100" onclick="saveCode( false)">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="row-md-4 row mt-3">
                <div class="col-md-6" id="test-cases-div"> </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</body>
<script src="assets/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/src-noconflict/ext-language_tools.js"></script>
<script src="assets/scripts/compiler.js"></script>
<script type="text/javascript">
    <?php 
    if($codeRow) { 
    ?>
        let dbLanguage = '<?php echo $codeRow["language"] ?>';
        document.getElementById('prolang').value = dbLanguage.toLowerCase();

        var codeInput = `<?php echo $codeRow["program"] ?>`;
        while(codeInput.indexOf("<><><>")!=-1) {
            codeInput = codeInput.replace( "<><><>", "+");
        }
        editor.setValue(codeInput);
        if(dbLanguage.toLowerCase()=='c'||dbLanguage.toLowerCase()=='cpp') {
            editor.session.setMode("ace/mode/c_cpp");
        } else {
            editor.session.setMode("ace/mode/"+dbLanguage.toLowerCase());
        }
    <?php 
    } 
    ?> </script>
<script src="assets/jquery/dist/jquery.min.js"></script>   
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Script for Running Output -->
<script type="text/javascript">
    function checkTestCase( testNo) {
        var code = editor.session.getValue();
        
        while(code.indexOf("+")!=-1) {
            code = code.replace( "+", "<><><>");
        }

        var checkingData = {
            "case" : testNo,
            "code" : code,
            "language" : document.getElementById("prolang").value,
            "challengeId" : document.getElementById("chId").value
        }
        $.ajax({
            type: "POST",
            url: "model/TestCase.php",
            data: checkingData,
            beforeSend: function () {
                document.getElementById("test"+(testNo+1)+"-span").innerHTML = "Testing"
                document.getElementById("test"+(testNo+1)+"-span").style.color = "#ffff33";
                document.getElementById("test"+(testNo+1)+"-img").src = "assets/images/case-running.png";
            },
            success: function (msg) {
                var response = JSON.parse(msg);
                
                if(response["success"]){
                    document.getElementById("test"+(testNo+1)+"-span").innerText = "Successful";
                    document.getElementById("test"+(testNo+1)+"-span").style.color = "#33ff33";
                    document.getElementById("test"+(testNo+1)+"-img").src = "assets/images/case-success.png";
                } else {
                    document.getElementById("test"+(testNo+1)+"-span").innerText = "Failed";
                    document.getElementById("test"+(testNo+1)+"-span").style.color = "#ff3333";
                    document.getElementById("test"+(testNo+1)+"-img").src = "assets/images/case-failed.png";
                }
                
                if( testNo<3) checkTestCase( testNo+1);
            }
        });    
    }

    function saveCode( isOnlyRun) {
        var code = editor.session.getValue();
        while(code.indexOf("+")!=-1) {
            code = code.replace( "+", "<><><>");
        }

        var checkingData = {
            "code" : code,
            "language" : document.getElementById("prolang").value,
            "challengeId" : document.getElementById("chId").value
        }
        
        $.ajax({
            type: "POST",
            url: "model/CodeModel.php",
            data: checkingData,
            beforeSend: function () {
                if(isOnlyRun) {
                    document.getElementById("outputPrint").innerText = "Please wait for the response"
                } else {
                    document.getElementById("test-cases-div").innerHTML = "<li class='mb-2'> Test Case 1 &nbsp;&nbsp;<span id='test1-span' class='test-span'>Testing</span> &nbsp;&nbsp;<img id='test1-img' src='assets/images/case-running.png'></li>"+
                    "<li class='mb-2'> Test Case 2 &nbsp;&nbsp;<span id='test2-span' class='test-span'>Waiting</span> &nbsp;&nbsp;<img id='test2-img' src='assets/images/case-waiting.png'></li>"+
                    "<li class='mb-2'> Test Case 3 &nbsp;&nbsp;<span id='test3-span' class='test-span'>Waiting</span> &nbsp;&nbsp;<img id='test3-img' src='assets/images/case-waiting.png'></li>"+
                    "<li> Test Case 4 &nbsp;&nbsp;<span id='test4-span' class='test-span'>Waiting</span> &nbsp;&nbsp;<img id='test4-img' src='assets/images/case-waiting.png'></li>";
                }
            },
            success: function (msg) {
                response = JSON.parse(msg);
                
                if(isOnlyRun) {
                    document.getElementById("outputPrint").innerText = response["output"];
                } else {
                    if(response["success"]){
                        document.getElementById("test1-span").innerText = "Successful";
                        document.getElementById("test1-span").style.color = "#33ff33";
                        document.getElementById("test1-img").src = "assets/images/case-success.png";
                    } else {
                        document.getElementById("test1-span").innerText = "Failed";
                        document.getElementById("test1-span").style.color = "#ff3333";
                        document.getElementById("test1-img").src = "assets/images/case-failed.png";
                    }
                    checkTestCase( 1);
                }                
            }
        });    
    }
    </script>

    <script>
        setInterval(function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","response.php",false);
            xmlhttp.send(null);
            var response = JSON.parse(xmlhttp.responseText);
            console.log(response)
            document.getElementById("response").innerHTML=response["countdown"];
        },1000);
    </script>
    <?php
    } else {
        echo "<script>window.location='login.php';</script>";
    } ?>
</html>