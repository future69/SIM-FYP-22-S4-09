<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameClinic = "clinic";

//$clinicName = $_SESSION["clinicName"];

$query = "SELECT * FROM $TableNameClinic";


// This is for radio button (Clinic Acc Status)
if (isset($_POST['clinicStatus'])) {
    $clinicStatus = $_POST['clinicStatus'];

    $query .= " WHERE clinicStatus = '$clinicStatus'";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Acra</th>
                    <th scope="col">Area</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
    ';

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>' . $row["username"] . '</td>
                <td>'. $row["clinicName"] . '</td>
                <td>' . $row["acraNum"] . '</td>
                <td>' . $row["clinicArea"] . '</td>
                <td>'. $row["clinicStatus"] . '</td>
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

