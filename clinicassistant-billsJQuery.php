<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameAppointment = "appointment";
$TableNameUserAccount = "useraccount";
//Only past appointments can appear in bills
$apptStatus = "past";

$query = "SELECT * FROM $TableNameAppointment 
INNER JOIN $TableNameUserAccount
ON appointment.nric = useraccount.nric
WHERE (apptStatus = '".$apptStatus."' AND billCreated IS NULL)";

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    $query .= " AND (useraccount.fullName LIKE '%" . $_POST['search_text'] . "%'
                OR useraccount.nric LIKE '%" . $_POST['search_text'] . "%')";
}
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">NRIC</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thread>
            <tbody>
    ';

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>' . $row["fullName"] . '</td>
                <td>'. $row["nric"] . '</td>
                <td>' . $row["apptDate"] . '</td>
                <td>' . $row["apptTime"] . '</td>
                <td><button type="submit" class="btn btn-success" name="updateAccount" 
                onclick="location.href=\'clinicassistant-createBilling.php?apptID='.$row["apptID"].'\'">Create bill</button></td>
            </tr>
        ';
    }
    echo $output;
}
else
{
    echo "Data not found";
}
?>
