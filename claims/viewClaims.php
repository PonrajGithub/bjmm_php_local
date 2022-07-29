
<?php

header('Content-type="application/json"');
header('charset="utf-8"');
include '../DBConfig.php';
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM claims";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
    while($row[] = $result->fetch_assoc()) {
    
    $item = $row;
    
    $json = json_encode($item, JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    
    }
    echo $json;
    
   } else {
    echo "No Results Found.";
   }
 
$conn->close();
?>