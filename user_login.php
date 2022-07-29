<?php
 
include 'DBConfig.php';
 
// Creating connection.
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
$mobile = $obj['mobile'];

   $query_main = "SELECT * FROM `login` where admin_mobile = '$mobile' and user_type = 'mainAdmin' ";

   $check_2 = mysqli_fetch_array(mysqli_query($conn,$query_main));

   if(isset($check_2)){

      $SuccessLoginMsg_2 = 'mainAdmin';
      
      $SuccessLoginJson_2 = json_encode($SuccessLoginMsg_2);
      
      echo $SuccessLoginJson_2 ;

   }else{
 
      $query_admin = "SELECT * FROM `login` where admin_mobile = '$mobile' and user_type = 'admin' ";

      $check_1 = mysqli_fetch_array(mysqli_query($conn,$query_admin));


      if(isset($check_1)){

      $SuccessLoginMsg_1 = 'Admin';
      
      $SuccessLoginJson_1 = json_encode($SuccessLoginMsg_1);
      
      echo $SuccessLoginJson_1 ; 

      }
      
      else{
      
         $query_user = "SELECT * FROM `login` left JOIN profile on login.user_id=profile.id WHERE `user_type`='user' and `mobile` = '$mobile'";

         $check = mysqli_fetch_array(mysqli_query($conn,$query_user));
         
         if(isset($check)){
         
         $SuccessLoginMsg = 'User';
         
         $SuccessLoginJson = json_encode($SuccessLoginMsg);
         
         echo $SuccessLoginJson ; 
         
         }
         
         else{
         
         $InvalidMSG = 'Invalid Mobile Number Please Try Again' ;
         
         $InvalidMSGJSon = json_encode($InvalidMSG);
         
         echo $InvalidMSGJSon ;
      }
      }
   }
 
 mysqli_close($conn);
?>