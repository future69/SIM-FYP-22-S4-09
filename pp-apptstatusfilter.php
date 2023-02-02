<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "dentalhealthapplicationdb");
$output = '';

//Defining DB
$DBName = "dentalhealthapplicationdb";
//Name of the table 
$TableNameAppointment = "appointment";
$TableNameClinic = "clinic";

$patientNric = $_SESSION['patientNric'];

/* Explaination
This our our base query:
    SELECT * 
    FROM $TableNameAppointment 
    INNER JOIN $TableNameClinic ON appointment.clinicName = clinic.clinicName 
    WHERE appointment.nric = '$patientNric'
3 possibile condition
a) Text field aka search box
b) Radio button aka upcoming or past
c) Dropdown aka your date range

We use our base as the core store into a string

Example:
$query = //some base query here

CONDITION A:
    if (text box got some text)
        $query .= condition > AND clinicName LIKE %search%
============================================================
CONDITION B:
    if radio button == upcoming
        $query .= condition > upcoming
    else if radio button == past
        $query .= condition > past
============================================================
CONDITION C:
    if date range == 1yeasr
        $query .= condition > 1year range something

*/

/*
1. check on change for form
2. if work - take 3 input data using id and pass to function
3. if no work - update data in variable then call function
*/
// echo "search_text: " . $_POST['search_text'];
// echo "<br>";
// echo "apptStatus: " . $_POST['apptStatus'];
// echo "<br>";
// echo "apptStatus: " . $_POST['dateRange'];

// search_text: search_text,
// apptStatus: apptStatus,
// dateRange: dateRange

$query = "SELECT * 
            FROM $TableNameAppointment 
            INNER JOIN $TableNameClinic ON appointment.clinicName = clinic.clinicName 
            WHERE appointment.nric = '$patientNric'";

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    // $search = mysqli_real_escape_string($connect, $_POST['search_text']);
    $query .= " AND appointment.clinicName LIKE '%" . $_POST['search_text'] . "%'";
}

// This is for radio button (Appt Status)
if (isset($_POST['apptStatus'])) {
    $apptStatus = ($_POST['apptStatus'] == 'flexRadioDefaultUpcoming') ? 'upcoming' : 'past';

    $query .= " AND appointment.apptStatus = '$apptStatus'";
}

// This is for date range (Dropdown for Dates)
if (isset($_POST['dateRange']) & $_POST['dateRange'] != 'all') {
    $plusMinus = ($_POST['apptStatus'] == 'flexRadioDefaultUpcoming') ? '+' : '-';
    $todayDate = date('Y-m-d');

    $dateFilter = "";
    switch ($_POST['dateRange']) {
        case '1week':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '1 week'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = "apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = "apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '1month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '1 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = "apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = "apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '3month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '3 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = "apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = "apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '6month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '6 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = "apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = "apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '1year':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '1 year'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = "apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = "apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
    }

    $query .= " AND $dateFilter";
}

// echo "<br>";
// echo $query;

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Location</th>
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
                <td>' . $row["clinicName"] . '</td>
                <td>'. $row["clinicAddress"] . '</td>
                <td>' . $row["apptDate"] . '</td>
                <td>' . $row["apptTime"] . '</td>
                <td>
                <button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href=\'potentialPatientUpdateAppointment.php?\'">Update Appointment</button>
                <button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
                </td>
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

