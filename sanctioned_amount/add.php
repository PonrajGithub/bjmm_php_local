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


	$date= $obj['date'];
	$mobile= $obj['mobile'];
	$amount = $obj['amount'];
	$claim_type = $obj['claim_type'];


    $sql = "SELECT * FROM profile WHERE mobile='" . $mobile . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_row($result)) {
            $userId = $row[0];
        }

        $query = "INSERT INTO `sanctioned_amount` (`user_id`,`date`,`amount`,`claim_type`) VALUES('$userId','$date','$amount','$claim_type')";
            

            if(mysqli_query($conn, $query)){
                
                $MSG = 'List Added Successfully' ;
                
                $json = json_encode($MSG);
                
                echo $json;
                
                }
                else{
                
                    $MSG = 'Try Again' ;
                
                    $json = json_encode($MSG);
                    
                    echo $json;
                
                }
        }else{
            $MSG = 'This Mobile Number Not Registered';
                
            $json = json_encode($MSG);
                    
            echo $json;
            
            }
        mysqli_close($conn);
    
    ?>