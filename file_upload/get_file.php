<?php

include '../DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

$profile_id = $obj['profile_id'];

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM file_upload WHERE `profile_id`='$profile_id'";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 echo $json;
} else {
 $MSG = 'No Files Found' ;
        
    $json = json_encode($MSG);
    
    echo $json;
}
 
$conn->close();
?>