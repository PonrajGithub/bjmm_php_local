<?php

    include '../DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    
    $mobile_number = $_POST['mobilenumber'];

    $sql = "SELECT * FROM profile WHERE mobile='" . $mobile_number . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_row($result)) {
            $profile_id = $row[0];
        }

        if(is_dir("uploads/". $mobile_number ."/")){
            $Msg = 'Sorry! You are Already Uploaded Files Once, You Can Edit This User file.';
     
            $Json = json_encode($Msg);
     
            echo $Json ;
        }else{

        mkdir("uploads/". $mobile_number ."/");

        $aadhaar_name = basename($_FILES["aadhar"]["name"]);
        $bank_passbook_name = basename($_FILES["bankpassbook"]["name"]);
        $smart_card_name = basename($_FILES["smartcard"]["name"]);
        $dobproof_name = basename($_FILES["dobproof"]["name"]);
        $tnuwwbcard_name =  basename($_FILES["tnuwwbcard"]["name"]);
        $employeecert_name = basename($_FILES["employeecert"]["name"]);

        $aadhar_file = "uploads/". $mobile_number ."/" . $aadhaar_name;
        $bank_passbook= "uploads/". $mobile_number ."/" . $bank_passbook_name;
        $smart_card= "uploads/". $mobile_number ."/" . $smart_card_name;
        $dobproof= "uploads/". $mobile_number ."/" . $dobproof_name;
        $tnuwwbcard= "uploads/". $mobile_number ."/" . $tnuwwbcard_name;
        $employeecert= "uploads/". $mobile_number ."/" . $employeecert_name;

        move_uploaded_file($_FILES["aadhar"]["tmp_name"], $aadhar_file);
        move_uploaded_file($_FILES["bankpassbook"]["tmp_name"], $bank_passbook);
        move_uploaded_file($_FILES["smartcard"]["tmp_name"], $smart_card);
        move_uploaded_file($_FILES["dobproof"]["tmp_name"], $dobproof); 
        move_uploaded_file($_FILES["tnuwwbcard"]["tmp_name"], $tnuwwbcard);
        move_uploaded_file($_FILES["employeecert"]["tmp_name"], $employeecert);
        

        $query = "INSERT INTO `file_upload` (`profile_id`, `aadhar_name`, `bankpassbook_name`, `smartcard_name`, `dobproof_name`, `tnuwwbcard_name`, `employeecert_name`)
        VALUES('$profile_id', '$aadhaar_name', '$bank_passbook_name', '$smart_card_name', '$dobproof_name', '$tnuwwbcard_name', '$employeecert_name')";
        
        if(mysqli_query($conn, $query)){
            $Msg = 'The file has been uploaded';
     
            $Json = json_encode($Msg);
     
            echo $Json ; 
        }else{
            $Msg = 'Sorry, there was an error uploading file.';
     
            $Json = json_encode($Msg);
     
            echo $Json ;
        }
    }
        
    }else{
        
        $Msg = 'Please Add User Details First (or) Check Mobile Number, This Mobile Number Is Not Registered';
     
            $Json = json_encode($Msg);
     
            echo $Json ;
    }
mysqli_close($conn);
?>