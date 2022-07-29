<?php
include '../DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);


	$claim_id= $obj['claim_id'];
	$user_id= $obj['user_id'];


    $query = "INSERT INTO `applied_claims` (`claim_id`,`user_id`) VALUES('$claim_id','$user_id')";
    

    if(mysqli_query($conn, $query)){
        
        $MSG = 'Request Sent Successfully' ;
        
        $json = json_encode($MSG);
        
        echo $json ;
        
        }
        else{
        
            $MSG = 'Not Sent Try Again';
            $json = json_encode($MSG);
        
        echo $json ;
        
        }
        mysqli_close($conn);
    
    ?>