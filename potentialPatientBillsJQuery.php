<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
$output = '';

//Name of the table 
$TableNameBill = 'bill';
$TableNameAppointment = 'appointment';

$query = "SELECT * FROM $TableNameBill 
INNER JOIN $TableNameAppointment ON bill.apptID = appointment.apptID
WHERE (billStatus = '". $_POST['billStatus'] ."')";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Amount Owed</th>
                    <th scope="col">Clinic Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Service Provided</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                </tr>
            </thread>
            <tbody>
    ';

    while($row = mysqli_fetch_array($result))
    {
        if($_POST['billStatus'] == "unpaid"){
            $output .= '
                <tr>
                    <td>' ."$". $row["billCost"] . '</td>
                    <td>'. $row["clinicName"] . '</td>
                    <td>' . $row["apptDate"] .'</td>
                    <td>' . $row["apptTime"] .'</td>
                    <td>' . $row["serviceName"] . '</td>
                    <td>'. $row["billDescription"] . '</td>
                    <td>
                    <select class="form-select" name="billStatus" id="billStatus" onclick="setBillStatus(this.value)">
                        <option value="'. $row["apptID"] .',unpaid">Unpaid</option>
                        <option value="'. $row["apptID"] .',paid">Paid</option>
                    </select>
                    </td>

                    </tbody>
            ';
        } else {
            $output .= '
            <tr>
                <td>' ."$". $row["billCost"] . '</td>
                <td>'. $row["clinicName"] . '</td>
                <td>' . $row["apptDate"] .'</td>
                <td>' . $row["apptTime"] .'</td>
                <td>' . $row["serviceName"] . '</td>
                <td>'. $row["billDescription"] . '</td>
                <td>'. $row["billStatus"] . '</td>
                </tbody>
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

