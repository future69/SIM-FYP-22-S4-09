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
  SELECT * FROM useraccount INNER JOIN clinic ON useraccount.username = clinic.username
  WHERE useraccount.username LIKE '%".$search."%'
 ";
}
else
{
//when search bar is empty show to whole table 
 $query = "
 SELECT * from useraccount INNER JOIN clinic ON useraccount.username = clinic.username
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive ">
   <table class="table table bordered">
    <tr>
     <th>Clinic Account Username</th>
     <th>Status</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><a href="superadminUpdateCAAccount.php?clinicAccountUsername='.$row["username"].'">'.$row["username"].'</a></td>
    <td>'.$row["accStatus"].'</td>
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