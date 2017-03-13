<? php
    session_start();
    if(!isSet($_SESSION["uuid"])){
        header("location: login.php");
    }
    $servername = "127.0.0.1"; 
    $username = "dchan1";
    $password = "";
    $dbname = "c9";
    $port = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get user data
    $activity = mysqli_real_escape_string($conn, $_POST["activity"]);
    $uuid = mysqli_real_escape_string($conn, $_SESSION["uuid"]);
    $total = mysqli_real_escape_string($conn, $_POST["total"]);
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
        $sql1 = "INSERT INTO session_enrollment(sessiontimestamp, enrollpaid, childid, account, activity) ";
        $sql1 .= "VALUES ('$regtimestamp', '$total', LAST_INSERT_ID(), '$uuid', "
        $sql1 .= "(SELECT activityid FROM activity WHERE activityname = '$activity'));";
        $result1 = mysqli_query($conn, $sql1);
        if (!result1){
            die("Inserting Error on sql1");
        }
        mysqli_commit($conn);
    }
    mysqli_close($conn);
?>
<html>
          <head>
              <link rel="stylesheet" href="reg.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
              <script src="childreg.js"></script>
          </head>
        <body>
            <div id="formBox">
                <h1>Session Registration</h1>
                <form id="campregform" action="sessionreg.php" method="post">
                    <fieldset id="mainfs"> 
                        <legend>Camp Registration:</legend>
                        <br>
                        <fieldset id="child0">
                            <legend>Child 1</legend>
                            <label>Enter Child's Name:</label> 
                            <input type="text" class ="childname" name="childname[0]" required><br>
                            <label>Date of Birth:</label>
                            <input type="date" name="dob[0]"><br>
                       
                            <textarea rows=7 cols=100 placeholder="Enter Any Special Notes..."></textarea><br>
                        </fieldset>
                        <div id = "buttons">
                            <button type="button" id="newchild" class="childbutton">(+) Add Another Child</button>
                        </div>
                <br><br>
                       <label>Select Camp Date:</label>
                              <select id="camps" name="session">
                                <option value="summer">Summer</option>
                              </select>
                            
                            <label>Select Activity Type:</label>
                            <select id="activity" name="activity">
                                <option value="computer">Computer Activites</option>
                                <option value="robotics">Robotics</option>
                            </select><br>
                <br>
                <label class="strlabel">Total Price: </label>
                <input type="text" id="total" value="$0.00" name="total" readonly>
                </fieldset>
                <br>
                    <input id="regsubmit" type="submit" value="Submit">
                </form>
            </div>
        </body>
</html>