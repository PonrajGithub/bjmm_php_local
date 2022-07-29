<?php
include '../DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM `sanctioned_amount` left JOIN profile on sanctioned_amount.user_id=profile.id ORDER BY `sanctioned_amount`.`id` DESC";

// "SELECT * FROM `sanctioned_amount` left JOIN profile on sanctioned_amount.user_id=profile.id ORDER BY `sanctioned_amount`.`id` DESC";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 echo $json;
} else {
    $MSG = 'No Results Found' ;
                
    $json = json_encode($MSG);
    
    echo $json;
}
 
$conn->close();
?>