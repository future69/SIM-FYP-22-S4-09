<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

date_default_timezone_set("Singapore");
$todayDate = date('Y-m-d'); 
$output = '';

//Name of the table 
$TableNameAppointment = "appointment";
$TableNameUA = "useraccount";

$dentistFullname = $_SESSION['dentistFullname'];
$dentistPracNum = $_SESSION['dentistPracNum'];

$query = "SELECT * 
            FROM $TableNameAppointment 
            INNER JOIN $TableNameUA ON appointment.nric = useraccount.nric 
            WHERE appointment.practitionerNumber = '$dentistPracNum'";

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    // $search = mysqli_real_escape_string($connect, $_POST['search_text']);
    $query .= " AND (useraccount.fullName LIKE '%" . $_POST['search_text'] . "%'
                OR useraccount.nric LIKE '%" . $_POST['search_text'] . "%')";
}

// This is for radio button (Appt Status)
if (isset($_POST['apptStatus'])) {
    $apptStatus = ($_POST['apptStatus'] == 'flexRadioDefaultUpcoming') ? 'upcoming' : 'past';

    $query .= " AND appointment.apptStatus = '$apptStatus'";
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
                    <th scope="col">Phone Number</th>
                    <th scope="col">Reason</th>
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
                <td>'. $row["phoneNum"] . '</td>
                <td>'. $row["reason"] . '</td>
                <td>
        ';

        if ($row["apptStatus"] == "upcoming")
        {
            $output .= '<button type="submit" class="btn btn-success" name="updateApptTreatmentDetails" onclick="location.href=\'dentistCreateATD.php?apptID='.$row["apptID"].'\'">Update Appointment Treatment Details</button>
                ';

            /*if ()
            {
                $output .= '';
            }*/
            $dateDiff = $todayDate - $row['apptDate'];
            //$output .= "echo "

        } else {
            $output .= '<button type="submit" class="btn btn-secondary" name="updateApptTreatmentDetails" onclick="location.href=\'dentistCreateATD.php?apptID='.$row["apptID"].'\'">View Past Appointment Treatment Details</button>
                ';
        }
        $output .= '
                    </td>
            </tr>
        ';
        // <button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href=\'potentialPatientUpdateAppointment.php?\'">Update Appointment</button>
        // <button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
    }
    echo $output;
}
else
{
    echo "Data not found";
}
?>

