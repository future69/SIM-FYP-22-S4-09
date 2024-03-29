<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameAppointment = "appointment";
$TableNameUA = "useraccount";

$clinicName = $_SESSION["clinicName"];

$query = "SELECT * 
            FROM $TableNameAppointment 
            INNER JOIN $TableNameUA ON appointment.nric = useraccount.nric 
            WHERE appointment.clinicName = '$clinicName'";

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
$query .= " ORDER BY appointment.apptDate, appointment.apptTime";

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
            $todayDate = date_create(date('Y-m-d')); 
            $apptDate = date_create($row['apptDate']);
            $dateDiff = date_diff($todayDate, $apptDate);
            //echo $dateDiff->format("%a");
            
            if (($dateDiff->format("%a")) > 2)
            {
                $output .= '<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href=\'clinicAdminUpdateAppointment.php?apptID='.$row["apptID"].'\'">Update Appointment</button>
                <button type="submit" class="btn btn-danger" onclick="deleteAppointment(this.value)" value='.$row["apptID"].' name="deleteAppt">Delete Appointment</button>';
            }

        //     $output .= '<button type="submit" class="btn btn-success" name="updateApptTreatmentDetails" onclick="location.href=\'dentistUpdateATD.php?apptID='.$row["apptID"].'\'">Update Appointment Treatment Details</button>
        //         ';
        } else {
            $output .= '<button type="submit" class="btn btn-secondary" name="viewApptTreatmentDetails" onclick="location.href=\'clinicAdminPastAppointmentTreatmentDetails.php?apptID='.$row["apptID"].'\'">View Past Appointment Treatment Details</button>
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

