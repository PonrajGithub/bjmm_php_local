<?php
  include 'insert_data.php'
?>
<html>
<title> Form </title>

<body>
<table>
   <form method="post" action="insert_data.php"> 
     <input type="hidden" name="user_id">
   <tr>
     <td><label>Date of Registration </label></td>
     <td><input type="date" name="date_of_registration" /></td>
   </tr>
   <tr>
     <td><label>Name </label></td>
     <td><input type="text" name="name" /></td>
   </tr>  
   <tr>
     <td><label>Status </label></td>
     <td><input type="text" name="status" /></td>
   </tr>        
   <tr>
     <td><label>Application Number </label></td>
   <td><input type="text" name="application_number" /></td>
   </tr>  
   <tr>
     <td><label>Mobile Number </label></td>
   <td><input type="text" name="mobile" /></td>
   </tr>  
   <tr>
     <td><label>Occupation </label></td>
   <td><input type="text" name="occupation" /></td>
   </tr>      
   <tr>
     <td><label>Father Name </label></td>
   <td><input type="text" name="father_name" /></td>
   </tr>  
   <tr>
     <td><label>DOB </label></td>
   <td><input type="date" name="dob" /></td>
   </tr>  
   <tr>
     <td><label>Aadhaar Number </label></td>
   <td><input type="text" name="aadhaar_number" /></td>      
   <tr>
     <td><label>Account Number </label></td>
   <td><input type="text" name="account_number" /></td>
   </tr>  
   <tr>
     <td><label>IFSC Code </label></td>
   <td><input type="text" name="ifsc_code" /></td>
   </tr>  
   <tr>
     <td><label>Smart Card No </label></td>
   <td><input type="text" name="smart_card_no" /></td>        
   <tr>
     <td><label>Nominee </label></td>
   <td><input type="text" name="nominee" /></td>
   </tr>  
   <tr>
     <td><label>Adddress </label></td>
   <td><input type="text" name="adddress" /></td>
   </tr>  
   <tr>
     <td><label>Pincode </label></td>
   <td><input type="text" name="pincode" /></td>  
   <tr>
     <td><label>Panchayat </label></td>
   <td><input type="text" name="panchayat" /></td>
   </tr>  
   <tr>
     <td><label>Taluka </label></td>
   <td><input type="text" name="taluka" /></td>
   </tr>  
   <tr>
     <td><label>Union </label></td>
   <td><input type="text" name="union_name" /></td>      
   <tr>
     <td><label>District </label></td>
   <td><input type="text" name="district" /></td>
   </tr>  
   <tr>
     <td><label>Assembly </label></td>
   <td><input type="text" name="assembly" /></td>
   </tr>  
   <tr>
     <td><label>Parliment </label></td>
   <td><input type="text" name="parliment" /></td>
   </tr>  
   <tr>
     <td><label>Submit </label></td>
   <td><input type="submit" name="submit" /></td>
   </tr>  
   
</form>
</table>
</body>
</html>