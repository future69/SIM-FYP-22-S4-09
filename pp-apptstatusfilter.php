<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameAppointment = "appointment";
$TableNameClinic = "clinic";

$patientNric = $_SESSION['patientNric'];

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
                $dateFilter = " AND apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = " AND apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '1month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '1 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = " AND apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = " AND apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '3month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '3 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = " AND apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = " AND apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '6month':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '6 month'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = " AND apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = " AND apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
        case '1year':
            $dateRange = date('Y-m-d', strtotime($plusMinus . '1 year'));
            if (($_POST['apptStatus'] == 'flexRadioDefaultUpcoming')) {
                $dateFilter = " AND apptdate BETWEEN '$todayDate' AND '$dateRange'";
            }
            else {
                $dateFilter = " AND apptdate BETWEEN '$dateRange' AND '$todayDate'";
            }
            break;
    }

    $query .= "$dateFilter";
    $query .= " ORDER BY appointment.apptDate";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Address</th>
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
        ';
        
        if ($row["apptStatus"] == "upcoming")
        {
            $todayDate = date_create(date('Y-m-d')); 
            $apptDate = date_create($row['apptDate']);
            $dateDiff = date_diff($todayDate, $apptDate);
            //echo $dateDiff->format("%a");
            
            if (($dateDiff->format("%a")) > 2)
            {
                $output .= '<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href=\'potentialPatientUpdateAppointment.php?apptID='.$row["apptID"].'\'">Update Appointment</button>
                <button type="submit" class="btn btn-danger" onclick="deleteAppointment(this.value)" value='.$row["apptID"].' name="deleteAppt">Delete Appointment</button>';
            }
        } else {
            $output .= '<button type="submit" class="btn btn-secondary" name="viewApptTreatmentDetails" onclick="location.href=\'potentialPatientViewPastATD.php?apptID='.$row["apptID"].'\'">View Past Appointment Treatment Details</button>
                ';
        }
        $output .= '
                    </td>
            </tr>
        ' ;
    }
    echo $output;
}
else
{
    echo "Data not found";
}
?>

