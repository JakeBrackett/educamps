<? php
    session_start();
    if(isSet($_SESSION["email"])){
        header("location: childreg.php");
    }
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
          $conn = new mysqli($servername, $username, $password, $dbname, $port);
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $user = mysqli_real_escape_string($_POST["email"]);
        $pass = crypt($_POST["password"]);
        $sql = "select uuid from account where email = $user AND password = $pass;";
        $uuidget = mysqli_query($conn, $sql);
        if($uuidget){
            $uuid = mysqli_fetch_array($uuid_get);
            $_SESSION['valid'] = true;
            $_SESSION['uuid'] = $uuid['uuid'];
            $_SESSION['email'] = $_POST["email"];
            echo "<div id='msg'>Login Complete! Thanks'</div>";
            header("location: index.html");
        }
        else{
            echo "<div id='msg'>Incorrect email or password.</div>"
        }
        
    }
?>

<!DOCTYPE html>
        <html>
          <head>
              <link rel="stylesheet" href="reg.css">
          </head>
          <body>
            <div id="loginBox">
              <h1>Login</h1>
              <form action="login.php" method="POST">
                    <br>
                    <label>Email:</label><input type="text" name="email" required><br>
                    <label>Password:</label><input type="password" name="password" required><br>
                <br>
                <input id="login" type="submit" value="Next">
            </form> 
                 <p>
        Not yet registered?
    <a href="registrationpage.html">Click here to register</a>
    </p>
           </div>
        </body>
        </html>