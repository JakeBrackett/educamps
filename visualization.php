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
    
    $sql="SELECT * FROM child";
    $childArr = $db -> query($sql);
    $count = 0;
    $month = array("01"=>0,"02"=>0,"03"=>0,"04"=>0,"05"=>0,"06"=>0,"07"=>0,"08"=>0,"09"=>0,"10"=>0,"12"=>0,"12"=>0);
    while ($child = $childArr->fetch_assoc()) {
        $date = $child['dob'];
        //echo $date;
        $dateArr = explode("-",$date);
        //echo $dateArr[1] ."\n";
        //echo "done";
        $month[$dateArr[1]]++;
    };
    for ($x = 1; $x <= 12; $x++) {
        $key = "";
        if($x < 10)
            $key = "0".$x;
        else
            $key .= $x;
        //echo $x . ": ";
        //echo $month[$key];
        //echo "\r\n". PHP_EOL;
    }
    
    $myJSON = json_encode($month);
    echo $myJSON;
    

    $db->close();

?>



