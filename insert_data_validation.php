<?php
include 'DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);

 $mobile_number = $obj['mobile'];
 $aadhar_number = $obj['aadhaar_number'];
 $smart_card_no = $obj['smart_card_no'];

 $query = "SELECT * FROM profile WHERE mobile='" . $mobile_number . "'";
		
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
            $MSG = 'mobile number is already exist' ;
        
        // Converting the message into JSON format.
        $json = json_encode($MSG);
        
        // Echo the message.
        echo $json ;
        }else{
            $MSG = 'this mobile number is available' ;
        
        // Converting the message into JSON format.
        $json = json_encode($MSG);
        
        // Echo the message.
        echo $json ;
        }

        $query1 = "SELECT * FROM profile WHERE aadhaar_number='" . $aadhar_number . "'";
		
		$result1 = $conn->query($query1);

		if ($result1->num_rows > 0) {
            $MSG = 'aadhar number is already exist' ;
        
        // Converting the message into JSON format.
        $json = json_encode($MSG);
        
        // Echo the message.
        echo $json ;
        }else{
            $MSG = 'this aadhar number is available' ;
        
        // Converting the message into JSON format.
        $json = json_encode($MSG);
        
        // Echo the message.
        echo $json ;
        }


        