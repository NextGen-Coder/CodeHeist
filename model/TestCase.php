<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Gathering inputs
        $code = $_POST['code'];
        $language = $_POST['language'];
        $challengeId = $_POST['challengeId'];
        $case = $_POST['case'];
        $userId = $_SESSION['login_user'];
    
        // Some Mandatory Changes for JDoodle Requests 
        $language = $language=='python'?'python3':$language;
        $language = $language=='javascript'?'nodejs':$language;

        $code = str_replace("<><><>","+",$code);
        if($language=='c') {
            $language ='cpp14';
            $code = str_replace(">",">\n",$code);
        }

        //  FETCHING CHALLENGE 
        $challengeFetchingQuery = "SELECT * FROM challenge WHERE challenge_id=$challengeId"; 
        $row = mysqli_fetch_assoc( mysqli_query($db, $challengeFetchingQuery));
        
        // Object for sending response as JSON
        $ajaxResponse = json_decode('{ "testCase" : '.$case.', "success" : false }', TRUE);
        /////////////////// TEST CASE $case CHECKING ////////////////////

        // Input formatting
        $inputs = $row["input_$case"];
        $inputs = str_replace( " ", "\n", $inputs);

        // Random Test Case Credentials
        $clientId = "";
        $clientSecret = "";
        $choice = rand(1,25);

        switch ($choice) {
            // Rajat Ids
            case 1:
                $clientId = "6a12fd18773efb45dd8c612433895194";
                $clientSecret = "18e0fd8cdd07136086af0f620d57a4af982d04e5c9e29b8274371a6c82b58a94";
                break;
            case 2:
                $clientId = "9be35b9e4e3d824eecb8fd08165116e4";
                $clientSecret = "9b3b9720b3bfb2de441c9901fedd17996456e7cf5de929afcc76052f2264eaec";
                break;
            case 3:
                $clientId = "3712a80d5a82862866fdf68e4d29e3fa";
                $clientSecret = "5a35e1d38e6fd8369c4d400143ee49090d2575e43dc9cd7314a2904d4d2d4fd4";
                break;
            case 4:
                $clientId = "22fb1f7176b37b554abf91c2e783d97";
                $clientSecret = "d8a9970461c5a811df173de805b1320e173b056700d220979e48a82db02e58fa";
                break;
            case 5:
                $clientId = "c53782b1138b5936b4f53ca633caef57";
                $clientSecret = "b8e7e5089a45e0201160ab8f5abdac426bc91b413bf79f35d362892120c5d2b";
                break;
            case 6:
                $clientId = "dc367a7a99360c04a8d2791d72143e07";
                $clientSecret = "551c2076be0432ca54df6963a0fcf22a72b4cd80a0a020e06aaf91384abe5fe6";
                break;
            case 7:
                $clientId = "42d8be42675dde1208728b597ede3739";
                $clientSecret = "3fed690632d4efb2e65ce689f83da7e4045e51b122261417d2d5280c4a4dd972";
                break;
            case 8:
                $clientId = "8517a0901d4c85b76ca2589e2768aa0d";
                $clientSecret = "4f62b9d84d73ca72154b136899072c803e347c3dcbaeef8400c5dd46cccc31f6";
                break;
            case 9:
                $clientId = "b8fe9a65f51c1d6949516963db004f5a";
                $clientSecret = "acdbaef68195a4b120e451c7e8cc8fdaf99b7bfad03dda2524854f38409278cf";
                break;
            case 10:
                $clientId = "90057696668e1eb3afca230dd9507613";
                $clientSecret = "482a90b9ac6f793edd13210c3fcce74d0cc1968f6db67de93dcd57c70d080cd4";
                break;
            // Nikhil Ids
            case 11:
                $clientId = "8278de01dc7c477930a2a1df3c4a820d";
                $clientSecret = "69a83d897d357880a5abc19f038a1fa9cb2535a990dadee7092df6b9a8bd5ca8";
                break;
            case 12:
                $clientId = "346e3c83534328733277743a6b46e2dd";
                $clientSecret = "d9f675ae154afc9f780a7ea665bca1e27c19684b0ec4aa06393d04fecb6a9786";
                break;
            case 13:
                $clientId = "1d91e7340f8707775caf06668ca7acdb";
                $clientSecret = "2e1dc123ae45b7de2ac40da836ae9d9c41a7a1446e413d1c9b33a9d1a716cdb8";
                break;
            case 14:
                $clientId = "d942adbff410f5a5adb9a1cfe8dded9f";
                $clientSecret = "eb478bb9ed36291849b56b120c8429217e8a54be9b181b8b5b91d9fe6ab1c57d";
                break;
            case 15:
                $clientId = "13115efa1634a578555872ddad360cbd";
                $clientSecret = "d7d2d358b6f1876acf23fa976fe810ba50218043379ffa4df9f5ea4a30142b7e";
                break;
            case 16:
                $clientId = "b58caf238976540675bbc08aa2f28b67";
                $clientSecret = "5afe52be900acee4e18d811a7eb4d10d1c8585181674f560cd3bb84489ef06b9";
                break;
            case 17:
                $clientId = "606a345dbe334552b2df64f56d246c49";
                $clientSecret = "e29225d27af4be5f2cfa497a2e18527fa2a4b8f783e19709e2552fc1f070768f";
                break;
            case 18:
                $clientId = "41eb0b5f03552f8c13dfdc05ec64189e";
                $clientSecret = "a949b7972fbfe1690a451954304bcaed3cc91bc644028758fbf30682e48f6859";
                break;
            case 19:
                $clientId = "ac60729df8fad97addb1c51dc374e8c9";
                $clientSecret = "6929e246bb592cf6868315e2d2f3bff3eb155afa71926aa381ee7a7e4aca049c";
                break;
            case 20:
                $clientId = "a4f988660e1580cd7d1df4aadaf424bf";
                $clientSecret = "8fd34599b3c3e9865c6d31e23ee8e2288761f17a84e835f3e0e15b8b89a1d910";
                break;
            case 21:
                $clientId = "c17b9009d394ba480da6c07a39c7e2a2";
                $clientSecret = "e5ba45ae93e325686128b619f1283f14e83108a2d77c76f27af7bf5a3d3aaff5";
                break;
            case 22:
                $clientId = "2971400660b554b739aefdec0cc9a941";
                $clientSecret = "5b864af93bdb87cb53b1e66c5ef7aaebc69508cc7566923c65942c2c8b9a9176";
                break;
            case 23:
                $clientId = "c74d83b1da48e278bc1ad6a0c0bd9b74";
                $clientSecret = "254d26e6e701207a81a5dab31fec72cb8e095e48c495bb291e2795423ecd58e3";
                break;
            case 24:
                $clientId = "ef0dd7c17c45793a99d858dd5b0d0d8c";
                $clientSecret = "aea8d82a2229232e817834d0b85d2edfc3b23c059a74faa6e3e483afbac85bb6";
                break;
            case 25:
                $clientId = "d5c49bcad6f2a572e21d03df4056b988";
                $clientSecret = "a042580c2bde1fcc0d79d31ede30617cd9c9dd05b3b4f07fae425d755798a138";
                break;
            default:
                $clientId = "ed3d8b92ac70bc1c3ad2382d334afc1d";
                $clientSecret = "ad03c152017d7fccc90dcfd4ac6bd6bde753f53438061dd1cecc46e56b57d85b";
        }
        
        // The data to send to the API
        $postData = array(
            "script" => $code,
            "language" => $language,
            "stdin" => $inputs."",
            "versionIndex" => "2",
            "clientId" => $clientId,
            "clientSecret" => $clientSecret
        );

        // Create the context for the request
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' =>  "Content-Type: application/json\r\n",
                'content' => json_encode($postData)
            )
        ));

        // Sending request and getting response
        $response = file_get_contents('https://api.jdoodle.com/execute', FALSE, $context);

        // Checking for errors
        if($response === FALSE){
            die('Error');
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Checking Test Case 
        if( $responseData["output"]==$row["output_$case"] || 
            "\n".$responseData["output"]==$row["output_$case"] ||
            $responseData["output"]==$row["output_$case"]."\n") {
            $ajaxResponse["success"] = true;
        }

        
        // Fetching Code Execution Row
        $codeExeFetchingQuery = "SELECT * FROM code_exe WHERE challenge_id=$challengeId and user_id=$userId"; 
        $codeExeRow = mysqli_fetch_assoc( mysqli_query($db, $codeExeFetchingQuery));

        // Creating Query for Saving codes exe
        $stmt1 = "";
        $points = $row["points_per_case"];
        $newPoints = 0;
        $caseResult = "failed";
        
        for($i=1; $i<=4; $i++) {
            if( $i != $case+1 && $codeExeRow["case_$i"]=="success") {
                $newPoints += $points;
            }
        }

        $stmt1 = $db->prepare("UPDATE code_exe SET case_".($case+1)." = ?, points = ? WHERE challenge_id = ? and user_id = ?");

        if($ajaxResponse["success"]) {
            $newPoints += $points;
            $caseResult = "success";
        } else {
            $caseResult = "failed";
        }
        
        $stmt1->bind_param("ssss", $caseResult, $newPoints, $challengeId, $userId);
        

        if ( !$stmt1->execute()) {
            $ajaxResponse["alertToGive"] = " . $stmt->errno "."    ". $stmt->error;
        }
        
        echo json_encode($ajaxResponse);
    }
?>