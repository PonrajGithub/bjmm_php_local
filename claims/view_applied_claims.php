<?php
include '../DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM `applied_claims` left JOIN profile on applied_claims.user_id=profile.id left JOIN claims on applied_claims.claim_id=claims.id ORDER BY `applied_claims`.`id` DESC";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = utf8_encode($item);
 
 }
 echo $json;
} else {
 echo "No Results Found.";
}
 
$conn->close();
?>