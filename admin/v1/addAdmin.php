<?php
include '../../DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);


	$user_id= $obj['user_id'];
	$admin_mobile= $obj['admin_mobile'];
	$password = $obj['password'];
	$user_type = $obj['user_type'];

    $query = "INSERT INTO `login` (`user_id`,`admin_mobile`,`password`,`user_type`) 
                VALUES('$user_id','$admin_mobile','$password','$user_type')";
    

    if(mysqli_query($conn, $query)){
        
        $MSG = 'Added Successfully' ;
        
        $json = json_encode($MSG);
        
        echo $json ;
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($conn);
    
    ?> 