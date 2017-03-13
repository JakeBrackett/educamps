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
    
    $query = "SELECT campname, capacity, enrolled from camps where enrolled < campcapacity;";
    $result = mysqli_query($conn, $query) or die ("Couldn't execute query. ".mysqli_error($con));
    $resultArray = array();
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
        $value = row['campname'];
        $seats = row['capacity'] - row['enrolled'];
        $camps[] = array('value'=> $value, 'seats', $seats);
    }
    echo json_encode($resultArray);
?>