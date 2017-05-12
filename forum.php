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
    
    $sql="SELECT forumposts.ftext, forumposts.postdate, account.fname, account.lname FROM forumposts JOIN account ON forumposts.account=account.uuid ORDER BY postdate desc";
    $posts= $db -> query($sql);
    $row = array();
    while ($post = $posts->fetch_assoc()) {
        $row[] = $post;
        //$text=$post["ftext"];
        //$name=$post["fname"]." ".$post["lname"];
    }
    $myJSON = json_encode($row);
    //$myJSON2 = json_encode($name);
    //echo $myJSON1;
    echo $myJSON;
    //phpmyadmin-ctl install 
    $db->close();
    
?>