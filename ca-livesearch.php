<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dentalhealthapplicationdb");
$output = '';

//this will get the value from the search bar and will run the filtering 
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT useraccount.fullName, useraccount.nric, patientprofile.dob FROM useraccount INNER JOIN patientprofile ON useraccount.nric = patientprofile.nric
  WHERE fullName LIKE '%".$search."%'
 ";
}
else
{
//when search bar is empty show to whole table 
 $query = "
 SELECT useraccount.fullName, useraccount.nric, patientprofile.dob FROM useraccount INNER JOIN patientprofile ON useraccount.nric = patientprofile.nric
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
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
    <td>'.$row["fullName"].'</td>
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