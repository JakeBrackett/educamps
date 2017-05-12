<?php
    
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
    
    $sql="SELECT * FROM child";
    $childArr = $db -> query($sql);
    
    while ($child = $childArr->fetch_assoc()) {
        $date = $child['dob'];
    };
    
    $myJSON = json_encode($month);
    echo $myJSON;
    $db->close();

?>



