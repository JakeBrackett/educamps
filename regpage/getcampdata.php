<? php 
    $servername = "127.0.0.1"; 
    $username = "dchan1";
    $password = "";
    $dbname = "c9";
    $port = 3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $camp = $_GET['q'];
    $query1 = "SELECT activity.activityname FROM camp_activity INNER JOIN camps ON camps.campid = camp_activity.campid "
        + "INNER JOIN activity ON activity.activityid = camp_activity.activityid where camps.campname = '$camp'";
    $result = mysqli_query($conn, $query) or die ("Couldn't execute query. ".mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $activity = row['activity.activityname'];
        $activities[] = array('activity'=> $activity);
    }
    $query2 = "SELECT campcost from camps where campname = '$camp' limit 1";
    $result = mysqli_query($conn, $query2) or die ("Couldn't execute query. ".mysqli_error($con));
    $costobj = mysqli_fetch_object($result);
    $cost = $costobj->campcost;
    
    echo json_encode(array(
        'cost' => $cost,
        'activities' => $activities
        )
     );
?>