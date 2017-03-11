<?php
   ob_start();
   session_start();
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "educamps";
    
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
          $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $user = mysqli_real_escape_string($_POST["username"]);
        $pass = crypt($_POST["password"]);
        $sql = "select uuid from account where email = $user AND password = $pass";
        $uuidget = mysqli_query($conn, $sql);
        if($uuidget){
            $uuid = mysqli_fetch_array($uuid_get);
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['uuid'] = $uuid['uuid'];
            echo "<div id='msg'>Login Complete! Thanks'</div>";
            echo "<script> window.location.assign('index.html'); </script>";
        }
        else{
            echo "<div id='msg'>Incorrect email or password.</div>"
        }
        
    }

?>