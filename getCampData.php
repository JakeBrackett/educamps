<?php 
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";
    $dbport = 3306;
    
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
    if(!$conn) {
        die("Connection failed");
    }
    $resultArray = array();
    $query0 = "SELECT campname, campcapacity, enrolled, campcost FROM camps WHERE enrolled < campcapacity;";
    $result0 = mysqli_query($conn, $query0) or die ("Couldn't execute query. ".mysqli_error($con));
    while($row = mysqli_fetch_assoc($result0)) {
        $name = $row['campname'];
        $seats = $row['campcapacity'] - $row['enrolled'];
        $cost = $row['campcost'];
        $activities = array();
        $camps[] = array('name'=> $name, 'seats' => $seats, 'cost' => $cost, 'activities' => $activities);
    }

    $query1 = "SELECT DISTINCT camps.campname, activity.activityname FROM camp_activity INNER JOIN camps ON camps.campid = camp_activity.campid ";
    $query1 .= "INNER JOIN activity ON activity.activityid = camp_activity.activityid;";
    $result1 = mysqli_query($conn, $query1) or die ("Couldn't execute query. ".mysqli_error($conn));
    while($row = mysqli_fetch_assoc($result1)) {
        $activity = $row['activityname'];
        foreach($camps as &$camp) {
            if($camp['name'] == $row['campname']){
                $camp['activities'][] = $activity;
            }
        }
        unset($camp);
    }
    
    echo json_encode($camps);