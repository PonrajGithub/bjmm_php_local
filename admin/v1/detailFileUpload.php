<?php

    include '../../DBConfig.php';

    // Create connection
    $conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

        $file_name = basename($_FILES["file"]["name"]);

        $file = "upload/". $file_name;

        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
        

        $query = "UPDATE `our_service` SET `file`='$file_name',`updated_on`=CURRENT_TIMESTAMP WHERE id=1";
        
        if(mysqli_query($conn, $query)){
            $Msg = 'The file has been uploaded';
     
            $Json = json_encode($Msg);
     
            echo $Json;
        }else{
            $Msg = 'Sorry, there was an error uploading file.';
     
            $Json = json_encode($Msg);
     
            echo $Json ;
        }
    
mysqli_close($conn);
?>