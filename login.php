<?php
    session_start();
    if(isSet($_SESSION["email"])){
        header("Location: logout.php");
    }
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";
    $dbport = 3306;

    if (!empty($_POST['uname']) && !empty($_POST['psw'])) {
        $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
        if(!$conn) {
            die("Connection failed");
        }
        $user = mysqli_real_escape_string($conn, $_POST["uname"]);
        $sql = "select uuid, password from account where email = '$user';";
        $result = mysqli_query($conn, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            if(crypt($_POST["psw"], $row['password']) == $row['password']){
                $_SESSION['valid'] = true;
                $_SESSION['uuid'] = $row['uuid'];
                $_SESSION['email'] = $_POST["uname"];
                header("Location: index.php"); 
               }
          }
     }
?>

<!DOCTYPE html>
        <html>
          <head>
              <link rel="stylesheet" href="/css/default_layout.css">
              <link rel="stylesheet" href="/css/reg.css">
          </head>
          <body>
             <div id="header"></div>
            <div id="id01" class="modal"></div>
             <script src="/scripts/navBar.js"></script>

            <div id="loginBox">
              <h1>Login</h1>
              <h3 id="fail">Login failed... Try Again!</h3>
              <form action="login.php" method="POST">
                    <br>
                    <label>Email:</label><input type="text" name="uname" required><br>
                    <label>Password:</label><input type="password" name="psw" required><br>
                <br>
                <input id="login" type="submit">
            </form> 
                 <p>
        Not yet registered?
    <a href="newaccount.html">Click here to register</a>
    </p>
           </div>
        </body>
</html>
