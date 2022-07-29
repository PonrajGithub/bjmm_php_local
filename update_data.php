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

    $id = $obj['id'];
	$date_of_registration= $obj['date_of_registration'];
	$name= $obj['name'];
	$status = $obj['status'];
	$application_number = $obj['application_number'];
	$uan_number = $obj['uan_number'];
	$mobile_number = $obj['mobile'];
	$occupation = $obj['occupation'];
	$father_name = $obj['father_name'];
	$dob = $obj['dob'];
	$aadhar_number = $obj['aadhaar_number'];
	$account_number = $obj['account_number'];
	$ifsc_code = $obj['ifsc_code'];
    $smart_card_no = $obj['smart_card_no'];
	$nominee = $obj['nominee'];
	$address = $obj['adddress'];
	$pincode= $obj['pincode'];
	$panchayat = $obj['panchayat'];
	$taluka = $obj['taluka'];
	$union = $obj['union_name'];
	$district = $obj['district'];
	$assembly = $obj['assembly'];
	$parliment = $obj['parliment'];
	
	

	// $query = "UPDATE `profile` SET (`date_of_registration`,`name`,`status`,`application_number`,`mobile`,`occupation`,
    // `father_name`,`dob`,`aadhaar_number`,`account_number`,`ifsc_code`,`smart_card_no`,`nominee`,`adddress`,`pincode`,`panchayat`,`taluka`,
    // `union_name`,`district`,`assembly`,`parliment`) VALUES('$date_of_registration','$name','$status','$application_number',
    // '$mobile_number','$occupation','$father_name','$dob','$aadhar_number','$account_number','$ifsc_code','$smart_card_no',
    // '$nominee','$address','$pincode','$panchayat','$taluka','$union','$district','$assembly','$parliment') WHERE id='$id'";

    $query = "UPDATE `profile` SET `date_of_registration`='$date_of_registration',`name`='$name',`status`='$status',
    `application_number`='$application_number',`uan_number`='$uan_number',`mobile`='$mobile_number',`occupation`='$occupation',`father_name`='$father_name',
    `dob`='$dob',`aadhaar_number`='$aadhar_number',`account_number`='$account_number',`ifsc_code`='$ifsc_code',`smart_card_no`='$smart_card_no',
    `nominee`='$nominee',`adddress`='$address',`pincode`='$pincode',`panchayat`='$panchayat',`taluka`='$taluka',
    `union_name`='$union',`district`='$district',`assembly`='$assembly',`parliment`='$parliment' WHERE id='$id'";
    echo $query;

	if(mysqli_query($conn, $query)){
        // If the record inserted successfully then show the message.
        $MSG = 'Data Inserted Successfully into MySQL Database' ;
        
        // Converting the message into JSON format.
        $json = json_encode($MSG);
        
        // Echo the message.
        echo $json ;
        
        }
        else{
        
        echo 'Try Again';
        
        }
        mysqli_close($conn);
    
    ?>