<?php 
    session_start();
    if(isSet($_SESSION["email"])){
        header("location: index.html");
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
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phonenum = mysqli_real_escape_string($conn, $_POST["phonenum"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    $password = crypt($password);
    

    //source - https://stackoverflow.com/questions/637278/what-is-the-best-way-to-generate-a-random-key-within-php
    function get_key($bit_length = 16){
        $fp = @fopen('/dev/urandom','rb');
        if ($fp !== FALSE) {
            $key = substr(base64_encode(@fread($fp,($bit_length + 7) / 8)), 0, (($bit_length + 5) / 6)  - 2);
            @fclose($fp);
            return $key;
        }
        return null;
    }
    $uuid = getkey();
    if(uuid == NULL)
        die("failed to generate UUID");

    
    $sql = "INSERT INTO account(uuid, fname, lname, email, phone, password) VALUES ('$uuid', '$fname', '$lname', '$email','$phonenum', '$password')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["uuid"] = $uuid;
        $_SESSION["email"] = $email;
        $_SESSION['valid'] = true;
 ?>

<!DOCTYPE html>
        <html>
          <head>
              <link rel="stylesheet" href="css/reg.css">
          </head>
          <body>
            <div id="formBox">
              <h1>Success!</h1>
                <br><br>
                <h3><a href="index.html">Go Home</a></h3>
                <h3><a href="regpage/childreg.php">Register Child For Camp!</a></h3>
            <br> 
           </div>
        </body>
        </html>
<?php;
   } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>