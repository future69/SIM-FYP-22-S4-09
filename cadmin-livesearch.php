<?php
//fetch.php
$DBName = "u418115598_dentalapp";
$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
$output = '';
$output_admin = '';


//this is for superadmin
//this will get the value from the search bar and will run the filtering 
if(isset($_POST["query_admin"]))
{
 $search_admin = mysqli_real_escape_string($conn, $_POST["query_admin"]);
 $query_admin = "
  SELECT * from useraccount INNER JOIN clinic ON useraccount.username = clinic.username;
  WHERE useraccount.username LIKE '%".$search_admin."%'
 ";
}
else
{
//when search bar is empty show to whole table 
 $query_admin = "
 SELECT * from useraccount INNER JOIN clinic ON useraccount.username = clinic.username;
 ";
}
$result_admin = mysqli_query($conn, $query_admin);
if(mysqli_num_rows($result_admin) > 0)
{
 $output_admin .= '
  <div class="table-responsive ">
   <table class="table table bordered">
    <tr>
     <th>Clinic Name Account</th>
     <th>Status</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result_admin))
 {
  $output_admin .= '
   <tr>
    <td><a href="superadminUpdateCAAcount.php?clinicName='.$row["username"].'">'.$row["username"].'</a></td>
    <td>'.$row["accStatus"].'</td>
   </tr>
  ';
  
 }
 echo $output_admin;
}
else
{
 echo 'Data Not Found';
}
?>