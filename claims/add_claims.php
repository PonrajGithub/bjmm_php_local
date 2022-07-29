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


	$title= $obj['title'];
	$url= $obj['title_url'];
	$description = $obj['description'];

    $query = "INSERT INTO `claims` (`title`,`title_url`,`description`) VALUES('$title','$url','$description')";
    

    if(mysqli_query($conn, $query)){
        
        $MSG = 'Claim Added Successfully' ;
        
        $json = json_encode($MSG);
        
        echo $json ;
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($conn);
    
    ?>