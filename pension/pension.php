<?php

include '../DBConfig.php';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM profile";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row = $result->fetch_assoc()) {
 
    $id = $row['id'];
    $item = $row['dob'];
 
    $dateOfBirth = $item;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');
    
    $query = "UPDATE `profile` SET `age`='$age' WHERE `id`='$id'";
    mysqli_query($conn, $query);
    }

    $sql = "SELECT * FROM `profile` ORDER BY `profile`.`age` DESC";

    $result = $conn->query($sql);

    if ($result->num_rows >0) {
    
    
    while($row[] = $result->fetch_assoc()) {
    
    $item = $row;
    
    $json = json_encode($item);
    
    }
    echo $json;

 }else {
    $MSG = 'No Results Found';
    $json = json_encode($MSG);
    echo $json ;
   }
}else {
    $MSG = 'Server Error';
    $json = json_encode($MSG);
    echo $json ;
   }
  
 
$conn->close();

?>