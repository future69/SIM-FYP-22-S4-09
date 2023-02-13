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
    if ($_POST['clinicStatus'] == 'inreview')
    {
        $query .= " WHERE clinicStatus = 'inreview'";
    }
    else if ($_POST['clinicStatus'] == 'approved')
    {
        $query .= " WHERE clinicStatus = 'approved'";
    }
    else  if ($_POST['clinicStatus'] == 'rejected')
    {
        $query .= " WHERE clinicStatus = 'rejected'";
    }

    //$query .= " WHERE clinicStatus = '$clinicStatus'";
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
        if ($row["clinicStatus"] == 'inreview'){
        $output .= '
            <tr>
                <td><a href="superadminClinicAAProfile.php?acraNum='. $row['acraNum']. '">' . $row["username"] . '</a></td>
                <td>'. $row["clinicName"] . '</td>
                <td>' . $row["acraNum"] . '</td>
                <td>' . $row["clinicArea"] . '</td>
                <td>'. $row["clinicStatus"] . '</td>
            </tr>
        ';
        } else {
            $output .= '
            <tr>
                <td>'. $row["username"] . '</td>
                <td>'. $row["clinicName"] . '</td>
                <td>' . $row["acraNum"] . '</td>
                <td>' . $row["clinicArea"] . '</td>
                <td>'. $row["clinicStatus"] . '</td>
            </tr>
        ';
        }
    }
    echo $output;
}
else
{
    echo "Data not found";
}
?>
