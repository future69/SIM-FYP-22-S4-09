<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameClinic = 'clinic';
$approved = 'approved';

$query = "SELECT * FROM $TableNameClinic WHERE (clinicStatus = '$approved')";

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    $query .= " AND (clinicName LIKE '%" . $_POST['search_text'] . "%')";
    if ($_POST['area'] != 'allAreas'){
        $query .= " AND (clinicArea = '" . $_POST['area'] . "')";
    }
}
echo $query;
//echo $query;
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Operating Hours</th>
                    <th scope="col">Details</th>
                </tr>
            </thread>
            <tbody>
    ';

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>' . $row["clinicName"] . '</td>
                <td>'. $row["clinicAddress"] . '</td>
                <td>' . $row["clinicOpeningHour"] . '-' . $row["clinicClosingHour"] . '</td>
                <td><button type="submit" class="btn btn-secondary" name="viewServices" 
                onclick="location.href=\'potentialPatientViewServices.php?acra='.$row["acraNum"].'\'">View Services</button></td>
                <td>
                </tbody>
        ';
    }
    echo $output;
}
else
{
    echo "Data not found";
}
?>