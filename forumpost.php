 <?php
    session_start();
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    
    //get data
    $formtype = $_POST['forumtype'];
    $id = $_SESSION['uuid'];
    
    if (isset($_SESSION['uuid'])){
        if ($formtype=='forumposts'){
            $textbox = $_POST['textbox'];
            $sql_p = "INSERT INTO forumposts (account, ftext, isReply) VALUES ('$id','$textbox', 0 )";
            if ($db->query($sql_p) === TRUE) {
                header("Location: forum.html");
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }    
    
        //type memories
        else{
            echo "<h2> Sorry, memories function not available at this time.</h2>";
            echo "<a href='forum.html'> Click to go back </a>";
            /* diabled
            $title=$_POST['caption'];
            $imgs=$_POST['imgs'];
            $sql_m = "INSERT INTO memories (account, description, filename) VALUES ('$id','$title', '$imgs')";
    
            $result = mysql_query($sql_m);
             if ($db->query($sql_m) === FALSE) {
            echo "Error: " . $sql_m . "<br>" . $db->error;
        }
       */
        }
}
$db->close();

?>