<?php 
    session_start();
    if( !isset($_SESSION['login_user'])) {
        echo "<script>window.location='login.php';</script>";
    } else {
        if( !isset($_SESSION['end_time'])) {
            echo "<script>window.location='start.php';</script>";
        } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/phase.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/fonts.css">
    <link rel="stylesheet" href="assets/styles/mediaquery.css">
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
        #response,#log{
            position:absolute;
            top:0;
            right:0;
        }
        .round{
            border-radius: 20px;
        }
        .round img{
            height: 38px;
            width: auto;
        }
    </style>
</head>

<?php 
    include("model/config.php");
    date_default_timezone_set("Asia/Kolkata");

    $season = $_GET['season'];
    $level = $_GET['level'];

    $challengeQuery = "SELECT * FROM challenge WHERE season='".$season."' AND level='".$level."'"; 
    $challengeData = mysqli_fetch_assoc( mysqli_query($db, $challengeQuery));

    $userQuery = "SELECT * FROM user WHERE user_id='".$_SESSION['login_user']."'";
    $userRow = mysqli_fetch_assoc( mysqli_query($db,$userQuery));

    $codeQuery = "SELECT * FROM code WHERE challenge_id=".$challengeData["challenge_id"]." AND user_id=".$userRow["user_id"]; 
    $codeRow = mysqli_fetch_assoc( mysqli_query($db,$codeQuery));
?>

<body>
    <div class="row">
        <div class="col-md-3">
            <div class="pl-5 ngc-logo">
            <img src="assets/images/code_heist.png" alt="">
            </div>
        </div>

        <div class="col-md-6 text-center ngc-logo">
            <img src="assets/images/pow_by_ngc.png" alt="">
        </div>
        <div class="col-md-3 mb-2">
            <button id="log" class="aquire btn bg-danger text-white log mt-1 mr-5 px-4 py-1 border" onclick="endTimer()">
                LOG OUT
            </button>
            <div id="response" class="digital bg-danger h3 d-inline mr-5 mt-5 text-white border px-4 py-1 rounded"></div>
        </div>
    </div>

    <div class="row container-fluid mx-auto mb-3">

        <div class="col-md-3 border round mb-2">
            <div class="text-center">
                <h1 class="text-white text-center pt-4 hacked">PROGRAMS</h3>
                <?php
                    for( $i=1; $i<=5; $i++) {
                        echo "<li class='p-2 space h4'>";

                        echo ($i==$level) ? "<a  class='text-secondary list py-2 px-4' href='#'" : "<a href='challenges.php?season=$season&level=".($i)."'";

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
                    <div class="border-left py-3 border-media">
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
                            </select>
                            <input type="hidden" id="chId" value="<?php echo $challengeData['challenge_id'] ?>">
                            <input type="text" hidden name="code" id="hiddencode">
                            <button id="run" class="bg-dark rounded border" onclick="saveCode( true)" type="button">
                                <img id="run-img" src="assets/images/run.png"> <p class="text-white d-inline">Run</p> 
                            </button>
                        </div>
                        <div id="editor"> </div>
                    </div>
                </div>
                <div class="col-md-4 border-left rounded border-media">
                    <div class="output-division">
                        <h3 class="pt-3 hacked">OUTPUT</h3>
                        <p id="outputPrint"> </p>
                    </div>
                    <div class="submit-division">
                        <button id="submit-btn" class="btn btn-danger w-100" onclick="saveCode( false)">SUBMIT CODE <?php echo $level ?> </button>
                    </div>
                </div>
            </div>
        </div>
            <div id='test-cases-div' class='row-md-4 row mt-3 mb-2'>
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
<!-- Script for Testing Cases -->
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
                console.log(msg)
                var response = JSON.parse(msg);
                
                if(response["success"]){
                    document.getElementById("test"+(testNo+1)+"-span").innerText = "Success";
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
</script>
<!-- Script for Running Code -->
<script>
    function saveCode( isOnlyRun) {
        var code = editor.session.getValue();
        while(code.indexOf("+")!=-1) {
            code = code.replace( "+", "<><><>");
        }

        var checkingData = {
            "code" : code,
            "isOnlyRun" : isOnlyRun,
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
                    let caseHtml = "";

                    for(let i=1; i<=4; i++) {
                        caseHtml += "<div class='col-md-3 mt-2 text-white'>"+
                            "<span class='round border py-2 pr-4'>"+
                            "<img id='test"+i+"-img' class='pb-1 pr-5' src='assets/images/case-waiting.png' alt=''>"+
                            "<span id='test"+i+"-span' class='h5 text-right test1-span'>waiting</span>"+
                            "</span>"+
                            "</div>";
                    }

                    document.getElementById("test-cases-div").innerHTML = caseHtml;
                }
            },
            success: function (msg) {
                console.log(msg)
                response = JSON.parse(msg);
                
                if(response["isSubmitted"]) {
                    alert("Your submition count for this challenge exceeded")
                    document.getElementById("test-cases-div").innerHTML = ""
                } else {
                    if(isOnlyRun) {
                        document.getElementById("outputPrint").innerText = response["output"];
                    } else {
                        if(response["success"]){
                            document.getElementById("test1-span").innerText = "Success";
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
            }
        });    
    }
</script>
<!-- Timer Interval -->
<script>
    var intervalVar = setInterval(function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","response.php",false);
        xmlhttp.send(null);
        var response = JSON.parse(xmlhttp.responseText);
        if(response["end"]==true) endTimer();
        document.getElementById("response").innerHTML=response["countdown"];
    },1000);
</script>
<!-- End Of Interval -->
<script>
    function endTimer(){
        clearInterval(intervalVar);
        window.onbeforeunload = true;
        window.location =  "index.php?competition=ended";
    }
</script>
<!-- No allowing unload -->
<script>
    // Warning before leaving the page (back button, or outgoinglink)
    window.onbeforeunload = function() {
        return "You may lost your code, Are you sure you want to leave this page?";
        //if we return nothing here (just calling return;) then there will be no pop-up question at all
        //return;
    };
</script>
</html>
<?php } } ?>