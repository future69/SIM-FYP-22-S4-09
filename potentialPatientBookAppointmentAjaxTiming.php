<?php
//This try block will be execute once the user enters the page
try	{
    // $theClinic = $_REQUEST["q"];
    // $theDate = $_REQUEST["w"];
    $theClinic = 'Toa Payoh Family Clinic';
    $theDate = '2024-05-21';
    $DBName = "dentalhealthapplicationdb";
    $conn = mysqli_connect("localhost", "root", "",$DBName);
    //Load list of dentists in each clinic
    $TableNameClinic = "clinic";
    $TableNameAppointment = "appointment";

    //The lines to run in sql
    $SQLstring = "SELECT * FROM  $TableNameClinic WHERE clinicName = '" . $theClinic . "'";
    $SQLstring2 = "SELECT apptTime FROM $TableNameAppointment WHERE apptDate = '" . $theDate . "'";

    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
    $queryResult2 = mysqli_query($conn, $SQLstring2);

    //Put all the taken appointment times into an array
    if ($queryResult2->num_rows != 0){
        //$takenAppointmentTimes=mysqli_fetch_array($queryResult2);
        while($row = $queryResult2->fetch_array()) {
            $takenAppointmentTimes[] = $row;
        }
        //Converts form associative to index array so can merge
        $takenAppointmentTimes = array_column($takenAppointmentTimes, 'apptTime');
    }
    
    if ($queryResult->num_rows != 0){
        $rows=mysqli_fetch_assoc($queryResult);
        $clinicOpeningTime = $rows['clinicOpeningHour'];
        $clinicClosingTime = $rows['clinicClosingHour'];

        $time = strtotime($clinicOpeningTime);
        $timeStop = strtotime($clinicClosingTime);

        while($time<$timeStop) {
            $timeArray[] = date('H:i', $time);
            $time = strtotime('+60 minutes', $time);
        }

        if ($takenAppointmentTimes != null){
            $availableTimings = array_diff($timeArray, $takenAppointmentTimes);
            //print_r(array($timeArray));
            echo json_encode($availableTimings);
        } 
        else{
            // for ($x = 0; $x <= count($timeArray); $x++) {
            //     $timeArray[] = $x;
            //   }
            //$result = array_reduce($arrayKeys, 'array_merge', array());
            //$newtimeArray = array_combine($arrayKeys,$timeArray);
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