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
	$register_number = $obj['register_number'];
	$renewal_date = $obj['renewal_date'];

	$pmsby = $obj['pmsby'];
	$pmsby_bankname = $obj['pmsby_bankname'];
	$pmsby_branchname = $obj['pmsby_branchname'];
	$pmjjby = $obj['pmjjby'];
	$pmjjby_bankname = $obj['pmjjby_bankname'];
	$pmjjby_branchname = $obj['pmjjby_branchname'];
	$pmsym = $obj['pmsym'];
	$pmsym_bankname = $obj['pmsym_bankname'];
	$pmsym_branchname = $obj['pmsym_branchname'];

	$check = "SELECT * FROM profile WHERE `mobile`='$mobile_number'";
	$result = $conn->query($check);

		if ($result->num_rows >0) {
			$MSG = 'This Mobile Number Already Registered' ;
				
				$json = json_encode($MSG);
				
				echo $json ;
		}else{


	$sql = "INSERT INTO `profile` (`date_of_registration`,`name`,`status`,`application_number`,`register_number`,`uan_number`,`mobile`,`occupation`,
	`father_name`,`dob`,`aadhaar_number`,`account_number`,`ifsc_code`,`smart_card_no`,`nominee`,`adddress`,`pincode`,`panchayat`,`taluka`,
	`union_name`,`district`,`assembly`,`parliment`,`renewal_date`,`pmsby`, `pmsby_bankname`, `pmsby_branchname`, `pmjjby`, `pmjjby_bankname`, 
	`pmjjby_branchname`, `pmsym`, `pmsym_bankname`, `pmsym_branchname`) VALUES('$date_of_registration','$name','$status','$application_number',
	'$register_number','$uan_number','$mobile_number','$occupation','$father_name','$dob','$aadhar_number','$account_number','$ifsc_code','$smart_card_no',
	'$nominee','$address','$pincode','$panchayat','$taluka','$union','$district','$assembly','$parliment','$renewal_date','$pmsby','$pmsby_bankname','$pmsby_branchname',
	'$pmjjby','$pmjjby_bankname','$pmjjby_branchname','$pmsym','$pmsym_bankname','$pmsym_branchname')";
	
	
	if(mysqli_query($conn, $sql)){
		
		$sql = "SELECT * FROM profile WHERE `mobile`='$mobile_number'";

		$result = $conn->query($sql);

		if ($result->num_rows >0) {
		
		
		$row = $result->fetch_assoc();
		
		$user_id = $row['id'];

		$query = "INSERT INTO `login` (`user_id`) VALUES('$user_id')";
	
				if(mysqli_query($conn, $query)){

				$MSG = 'User Added Successfully' ;
				
				$json = json_encode($MSG);
				
				echo $json ;
				
				}
				else{
				
				$MSG = 'Try again';
				$json = json_encode($MSG);
				
				echo $json ;
				
				}
			}
			}else{
				$MSG = 'Try again';
			$json = json_encode($MSG);
			
			echo $json ;
		}
	}
		mysqli_close($conn);
    
    ?>