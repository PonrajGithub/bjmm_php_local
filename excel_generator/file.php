<?php
include '../DBConfig.php';

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');
 
// decoding the received JSON and store into $obj variable.
$obj = json_decode($json,true);

$assembly = $obj['assembly'];

$sql = "SELECT `id`, `date_of_registration`, `name`, `status`, `application_number`, `register_number`, `uan_number`,
 `mobile`, `occupation`, `father_name`, `dob`, `aadhaar_number`, `account_number`, `ifsc_code`, `smart_card_no`, `nominee`, `adddress`,
 `pincode`, `panchayat`, `taluka`, `union_name`, `district`, `assembly`, `parliment`, `renewal_date` FROM `profile` WHERE `assembly`='$assembly'";


$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();

// $setRec = mysqli_query($conn, $sql);  
// $columnHeader = '';  
// $columnHeader = "No" . "\t" . "Registration Date" . "\t" . "name" . "\t" . "Application Number" . "\t" . "UAN Number" . "\t";
// $setData = '';  
//   while ($rec = mysqli_fetch_row($setRec)) {  
//     $rowData = '';  
//     foreach ($rec as $value) {  
//         $value = '"' . $value . '"' . "\t";  
//         $rowData .= $value;  
//     }  
//     $setData .= trim($rowData) . "\n";  
// }  
  
// header("Content-type: application/octet-stream");  
// header("Content-Disposition: attachment; filename=User_Detail.xls");  
// header("Pragma: no-cache");  
// header("Expires: 0");

//   echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?>