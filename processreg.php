<?php 
    session_start();

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
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phonenum = mysqli_real_escape_string($conn, $_POST["phonenum"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    $password = crypt($password);
    
    $uuid = openssl_random_pseudo_bytes(2);
    $value = unpack('H*', $uuid);
    $uuid = base_convert($value[1], 16, 2);
    if($uuid == NULL){
        die("failed to generate UUID");
    }
    
    $sql = "INSERT INTO account(uuid, fname, lname, email, phone, password) VALUES ('$uuid', '$fname', '$lname', '$email','$phonenum', '$password')";
    if (mysqli_query($conn, $sql)){
         $_SESSION["uuid"] = $uuid;
         $_SESSION["email"] = $email;
         $_SESSION['valid'] = true;
         header("Location: index.php");

   } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>