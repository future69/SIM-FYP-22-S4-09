<?php
//This try block will be execute once the user enters the page
try	{
    $theClinic = $_REQUEST["q"];
    $theDate = $_REQUEST["w"];
    $theDentist = $_REQUEST["e"];
    // $theClinic = 'Toa Payoh Family Clinic';
    // $theDate = '2023-05-21';
    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
    //Load list of dentists in each clinic
    $TableNameClinic = "clinic";
    $TableNameAppointment = "appointment";

    //The lines to run in sql
    $SQLstring = "SELECT * FROM  $TableNameClinic WHERE clinicName = '" . $theClinic . "'";
    $SQLstring2 = "SELECT apptTime FROM $TableNameAppointment WHERE apptDate = '" . $theDate . "' AND practitionerNumber = '" . $theDentist . "'";

    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
    $queryResult2 = mysqli_query($conn, $SQLstring2);

    //Declare taken appointment times
    $takenAppointmentTimes[] = null;

    //Put all the taken appointment times into an array
    if ($queryResult2->num_rows != 0){
        //$takenAppointmentTimes=mysqli_fetch_array($queryResult2);
        while($row = $queryResult2->fetch_array()) {
            $takenAppointmentTimes[] = $row[0];
        }
        //print_r($takenAppointmentTimes);
        //Converts form associative to index array so can merge
        //$takenAppointmentTimes = array_column($takenAppointmentTimes, 'apptTime');
    }
    
    if ($queryResult->num_rows != 0){
        $rows=mysqli_fetch_assoc($queryResult);
        //Get opening and closing hours of clinic, and make 1 hour intervals between the times
        $clinicOpeningTime = $rows['clinicOpeningHour'];
        $clinicClosingTime = $rows['clinicClosingHour'];

        $time = strtotime($clinicOpeningTime);
        $timeStop = strtotime($clinicClosingTime);

        while($time<$timeStop) {
            $timeArray[] = date('H:i', $time);
            $time = strtotime('+60 minutes', $time);
        }
        //If there are existing appointments on this date
        if ($takenAppointmentTimes != null){
            $availableTimings = array_merge(array_diff($timeArray, $takenAppointmentTimes));
            //print_r($availableTimings);
            echo json_encode($availableTimings);
        } 
        else{
            //If there are no exisiting appointments on this date
            echo json_encode($timeArray);
            }
        }
    else 
        {
        echo null . "|" . null;
        }
}
    catch(mysqli_sql_exception $e) {
        echo "Error";
    }
?>