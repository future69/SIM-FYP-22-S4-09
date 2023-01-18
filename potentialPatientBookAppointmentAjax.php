<?php
//This try block will be execute once the user enters the page
try	{
    $theClinic = $_REQUEST["q"];
    //$theClinic = 'tempClinicName';
    $DBName = "dentalhealthapplicationdb";
    $conn = mysqli_connect("localhost", "root", "",$DBName);
    //Load list of dentists in each clinic
    $TableNameDentistProfile = "dentistprofile";
    $TableNameUseraccounts = "useraccount";

    //The lines to run in sql
    $SQLstring = "SELECT practitionerNumber,fullName FROM $TableNameDentistProfile INNER JOIN $TableNameUseraccounts ON dentistprofile.nric = useraccount.nric WHERE dentistprofile.clinicName = '" . $theClinic . "'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
    
    if ($queryResult->num_rows != 0){
        //$rows=mysqli_fetch_assoc($queryResult);
        while($row = $queryResult->fetch_assoc()) {
            $myArray[] = $row;
        }
        //print_r($myArray);
        echo json_encode($myArray);
        }

    else 
        {
        echo null;
        }
}
    catch(mysqli_sql_exception $e) {
        echo "Error";
    }
?>