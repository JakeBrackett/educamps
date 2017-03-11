<? php 
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "educamps";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
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
    

    #Generate a random key from /dev/urandom, source - https://stackoverflow.com/questions/637278/what-is-the-best-way-to-generate-a-random-key-within-php
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
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>