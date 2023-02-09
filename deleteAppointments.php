<?php
//This try block will be execute once the user enters the page
try	{
    $apptID = $_REQUEST["q"];
    //$theClinic = 'tempClinicName';
    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
    $TableNameAppointment = "appointment";

    //The lines to run in sql
    $SQLstring = "DELETE FROM $TableNameAppointment WHERE apptID = '" . $apptID . "'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
}
    catch(mysqli_sql_exception $e) {
        echo "Error";
    }
?>