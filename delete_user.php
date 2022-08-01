<?php
include 'DBConfig.php';

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

// Getting the received JSON into $json variable.
$data = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($data,true);

$id = $obj['id'];


$sql = "DELETE FROM `profile` WHERE `id`='$id'";

    if($conn->query($sql)){

        $sql1 = "DELETE FROM `login` WHERE `user_id`='$id'";

        if($conn->query($sql1)){
            $msg = "User Deleted Successfully";
            $json = json_encode($msg);
            echo $json;
        }
    }

$conn->close();
?>