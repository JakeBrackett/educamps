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
    //echo "Connected successfully (".$db->host_info.")";
    
    $sql="SELECT * FROM camps";
    $campInfo = $db -> query($sql);
    $output = array();
    while ($row = $campInfo->fetch_assoc()) {
        $output[] = $row;
        
    };
    
    $myJSON = json_encode($output);
    echo $myJSON;
    

    $db->close();

?>



