<?php
    session_start();
    if(!$_SESSION["valid"]){
        header("location: login.php");
    }
    if(!isset($_POST["activity"]) or !isset($_POST["total"]) or !isset($_POST["camp"])){
        header("location: childreg.html");
    }
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";
    $dbport = 3306;
    
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
    if(!$conn) {
        die("Connection failed");
    }
    

    // Get user data
    $activity = mysqli_real_escape_string($conn, $_POST["activity"]);
    $uuid = mysqli_real_escape_string($conn, $_SESSION["uuid"]);
    $total =  $str = substr($_POST["total"], 1);
    $total = floatval($total);
    $camp = mysqli_real_escape_string($conn, $_POST["camp"]);
    $regtimestamp = date("Y-m-d H:i:s");
    $children = $_POST["childname"];
    $childdobs = $_POST["childdob"];
    $others = $_POST["other"];
    
    $max = sizeof($children);
    for($i = 0; $i < $max;$i++){
        $childname = mysqli_real_escape_string($conn, $children[$i]);
        $childdob = mysqli_real_escape_string($conn, $childdobs[$i]);
        $other =  mysqli_real_escape_string($conn, $others[$i]);
        mysqli_begin_transaction($conn);
        $sql0 = "INSERT INTO child(uuid, childname, dob, other) ";
        $sql0 .= "VALUES ('$uuid', '$childname', '$childdob', '$other');";
        $result0 = mysqli_query($conn, $sql0);
        if (!result0){
            die("Inserting Error on sql0");
        }
        $sql1 = "INSERT INTO session_enrollment(sessiontimestamp, enrollpaid, childid, account, activity, campid) ";
        $sql1 .= "VALUES ('$regtimestamp', '$total', LAST_INSERT_ID(), '$uuid', ";
        $sql1 .= "(SELECT activityid FROM activity WHERE activityname = '$activity'), ";
        $sql1 .= "(SELECT campid FROM camps WHERE campname = '$camp'));";
        $result1 = mysqli_query($conn, $sql1);
        if (!result1){
            die("Inserting Error on sql1");
        }
        $sql2 = "UPDATE camps SET enrolled = enrolled + 1 where campname = '$camp';";
        $result2 = mysqli_query($conn, $sql2) or die("Inserting error on sql2");
        $successes[] = mysqli_commit($conn);
        }
    mysqli_close($conn);
    $flag = true;
    foreach($successes as $success){
        if(!$success){
            $flag = false;
        }
    }
    if($flag){
?>
    <html>
            <head>
                 <link rel="stylesheet" type="text/css" href="css/default_layout.css">
                  <link rel="stylesheet" href="css/reg.css">
            </head>
            <body>
    <div id="header">
        
    </div>
    <div id="id01" class="modal"></div>
     <script src="/scripts/navBarLoggedIn.js"></script>
              <div id="successbox">
                <img id="success" src="/img/success.jpg">
                  <p>Thanks for Registering!</p>
                  <p>Enter code: EDUCAMPER at checkout to recieve a discount on cool gear!</p>
            </div>
            </body>
    </html>
<?php }