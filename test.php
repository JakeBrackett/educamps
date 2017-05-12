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
echo "Connected successfully (".$db->host_info.")";
$sql = "SELECT * from items";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["itemName"]. " - Name: " . $row["itemsize"]. " " . $row["description"]. "<br>";
    }
} else {
    echo "0 results";
}
$db->close();


?>