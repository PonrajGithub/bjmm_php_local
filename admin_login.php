<?php
 
include 'DBConfig.php';
 
// Creating connection.
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
$mobile = $obj['mobile'];
$password = $obj['password'];
 
$query = "SELECT * FROM `login` where `admin_mobile` = '$mobile' and `password` = '$password' ";

$check = mysqli_fetch_array(mysqli_query($conn,$query));
    
    if(isset($check)){
    
     $SuccessLoginMsg = 'DataMatched';
     
    $SuccessLoginJson = json_encode($SuccessLoginMsg);
     
     echo $SuccessLoginJson ; 
    
     }
     
     else{
     
    $InvalidMSG = 'NotMatched' ;
     
    $InvalidMSGJSon = json_encode($InvalidMSG);
     
    echo $InvalidMSGJSon ;
 }
 
 mysqli_close($conn);
?>