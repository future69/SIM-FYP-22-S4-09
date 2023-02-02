<?php
//fetch.php

$DBName = "u418115598_dentalapp";
$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
$output = '';

//this will get the value from the search bar and will run the filtering 
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM useraccount INNER JOIN patientprofile ON useraccount.nric = patientprofile.nric
  WHERE useraccount.fullName LIKE '%".$search."%'
  OR useraccount.nric LIKE '%".$search."%'
 ";
}
else
{
//when search bar is empty show to whole table 
 $query = "
 SELECT * FROM useraccount INNER JOIN patientprofile ON useraccount.nric = patientprofile.nric
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive ">
   <table class="table table bordered">
    <tr>
     <th>Full Name</th>
     <th>NRIC</th>
     <th>Date of birth</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><a href="clinicassistant-PatientDetails.php?Patientnric='.$row["nric"].'">'.$row["fullName"].'</a></td>
    <td>'.$row["nric"].'</td>
    <td>'.$row["dob"].'</td>
   </tr>
  ';
  
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>