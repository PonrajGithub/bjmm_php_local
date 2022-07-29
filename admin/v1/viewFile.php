<?php

include '../../DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);


// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM our_service WHERE `id`=1";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row = $result->fetch_assoc()) {
 
 $item = $row['file'];
 
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