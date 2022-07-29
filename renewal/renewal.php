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
    $item = $row['renewal_date'];
 
    $dateOfBirth = $item;
    $today = date("Y-m-d");
    // $diff = date_diff(date_create($dateOfBirth), date_create($today));
    // $renewal_id = $diff->format('%Y-%m');
    // echo $renewal_id. '<br/>';
    

//     $date1 = "2016-07-31";
// $date2 = "2016-08-05";

    $date1_ts = strtotime($today);
    $date2_ts = strtotime($dateOfBirth);
    $diff = $date2_ts - $date1_ts;
    $date = round($diff / 86400);

    $dateDiff = $date;
    $query = "UPDATE `profile` SET `renewal_remain_days`='$dateDiff' WHERE `id`='$id'";
    mysqli_query($conn, $query);
    }
    $sql = "SELECT * FROM `profile` ORDER BY `profile`.`renewal_remain_days` ASC";

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