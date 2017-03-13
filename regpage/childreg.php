<? php
    session_start();
    if(!isSet($_SESSION["uuid"])){
        header("location: login.php");
    }
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get user data
    $activity = mysqli_real_escape_string($conn, $_POST["activity"]);
    $uuid = mysqli_real_escape_string($conn, $_SESSION["uuid"]);
    $total = mysqli_real_escape_string($conn, $_POST["total"]);
    $camp = mysqli_real_escape_string($conn, $_POST["camp"]);
    $regtimestamp = date("Y-m-d H:i:s");


    if(!activity or !total or !regtimestamp){
        die("ERROR: FIELD MISSING!");
    }
    
    $max = sizeof($children);
    for($i = 0; $i < $max;$i++){
                $children = mysqli_real_escape_string($conn, $_POST["childname"]);
                $childdob = mysqli_real_escape_string($conn, $_POST["childdob"]);
        mysqli_begin_transaction($conn);
        $sql0 = "INSERT INTO child(uuid, childname, dob, other) ";
        $sql0 .= "VALUES ('$uuid', '$childname[i]', '$childdob[i]', $other[i]);";
        $result0 = mysqli_query($conn, $sql0);
        if (!result0){
            die("Inserting Error on sql0");
        }
        $sql1 = "INSERT INTO session_enrollment(sessiontimestamp, enrollpaid, childid, account, activity, campid) ";
        $sql1 .= "VALUES ('$regtimestamp', '$total', LAST_INSERT_ID(), '$uuid', "
        $sql1 .= "(SELECT activityid FROM activity WHERE activityname = '$activity'), "
        $sql1 .= "(SELECT campid FROM camps WHERE campname = '$camp'));";
        $result1 = mysqli_query($conn, $sql1);
        if (!result1){
            die("Inserting Error on sql1");
        }
        $sql2 = "UPDATE camps SET enrolled = enrolled + 1 where campname = '$camp';";
        result2 = mysqli_query($conn, $sql2) or die("Inserting error on sql2");
        mysqli_commit($conn);
    }
    mysqli_close($conn);
?>
<html>
        <head>
        </head>
        <body>
          <div id="successbox">
            <img src="/img/educampslogo1.png">
            <img src="/img/success.jpg">
              <p>Thanks for Registering!</p>
              <p>Enter code: EDUCAMPER at checkout to recieve a discount on cool gear!</p>
        </div>
        </body>
</html>