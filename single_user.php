<?php
include 'DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

// Getting the received JSON into $json variable.
$data = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($data,true);

$mobile = $obj['mobile'];

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM profile WHERE mobile='$mobile'";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>