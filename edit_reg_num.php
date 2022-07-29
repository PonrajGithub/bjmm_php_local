<?php

    include 'DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $profile_id = $_POST['id'];
    $mobile_number = $_POST['mobilenumber'];
    $reg_number = $_POST['reg_number'];
    $renewal_date = $_POST['renewal_date'];
    $p_status = $_POST['p_status'];
    $doc_name = basename($_FILES["doc"]["name"]);


    $data_sql = "UPDATE `profile` SET `register_number`='$reg_number', `renewal_date`='$renewal_date', `p_status`='$p_status', `updated_on`=CURRENT_TIMESTAMP WHERE `id`='$profile_id'";

    if(mysqli_query($conn, $data_sql)){
            
        $file_sql = "SELECT * FROM `file_upload` where `profile_id` = '$profile_id'";
        $result = $conn->query($file_sql);

        if ($result->num_rows > 0) {

            $doc_file = "file_upload/uploads/". $mobile_number ."/" . $doc_name;
            
            move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_file);

            $query = "UPDATE `file_upload` SET `tnuwwbcard_name`='$doc_name',`update_on`=CURRENT_TIMESTAMP WHERE profile_id='$profile_id'";

            mysqli_query($conn, $query);

        }else{

            mkdir("file_upload/uploads/". $mobile_number ."/");
            if(is_dir("file_upload/uploads/". $mobile_number ."/")){
            $doc_file = "file_upload/uploads/". $mobile_number ."/" . $doc_name;
            move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_file);

            $query = "INSERT INTO `file_upload` (`profile_id`, `aadhar_name`, `bankpassbook_name`, `smartcard_name`, `dobproof_name`, `tnuwwbcard_name`, `employeecert_name`)
                    VALUES('$profile_id', '', '', '', '', '$doc_name', '')";
            mysqli_query($conn, $query);
            }else{
                $Msg = 'Sorry, there was an error in file uploading.';
         
                $Json = json_encode($Msg);
         
                echo $Json ;
            }
        }

        $Msg = 'Update Successfully!.., This user was disabled';
         
        $Json = json_encode($Msg);
    
        echo $Json ;
    
    }
    else{
    
        $Msg = 'Sorry, there was an error! Try Again.';
         
        $Json = json_encode($Msg);
 
        echo $Json ;
    
    }
    mysqli_close($conn);
?>