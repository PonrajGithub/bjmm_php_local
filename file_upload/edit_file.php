<?php

    include '../DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    
    $mobile_number = $_POST['mobilenumber'];
    $profile_id = $_POST['profile_id'];
    $change_file = $_POST['change_file'];
    $doc_name = basename($_FILES["doc"]["name"]);

        $sql = "SELECT * FROM `file_upload` where `$change_file` = '$doc_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $Msg = 'This file name is already taken, Please change different name of this file';
         
            $Json = json_encode($Msg);
        
            echo $Json ;
        }else{

        if(is_dir("uploads/". $mobile_number ."/")){

            $doc_file = "uploads/". $mobile_number ."/" . $doc_name;
            
            move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_file);
            
            $query = "UPDATE `file_upload` SET `$change_file`='$doc_name',`update_on`=CURRENT_TIMESTAMP WHERE profile_id='$profile_id'";

            
            
            if(mysqli_query($conn, $query)){
                $Msg = 'The file has been Modified';
         
                $Json = json_encode($Msg);
         
                echo $Json ; 
            }else{
                $Msg = 'Sorry, there was an error.';
         
                $Json = json_encode($Msg);
         
                echo $Json ;
            }
            
            }else{

            $Msg = 'Sorry! In this user`s files not uploaded, Please upload files for this user, Then you can modify this user`s files.';
        
            $Json = json_encode($Msg);
        
            echo $Json ;
        }
    }
        
mysqli_close($conn);
?>