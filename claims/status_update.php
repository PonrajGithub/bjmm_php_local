<?php
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);

    $id = $obj['id'];
    $status = $obj['status'];

    $query = "UPDATE `claims` SET `status`='$status'`updated_on`=CURRENT_TIMESTAMP WHERE id='$id'";

    echo $query;
   

    if(mysqli_query($conn, $query)){
        
        $MSG = 'Claim Updated Successfully' ;
        
        $json = json_encode($MSG);
        
        echo $json ;
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($conn);
    
    ?>