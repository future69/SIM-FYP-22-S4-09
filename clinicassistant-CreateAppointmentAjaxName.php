<?php
//This try block will be execute once the user enters the page
try	{
    $theNric = $_REQUEST["q"];
    //$theClinic = 'tempClinicName';
    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
    //Load list of dentists in each clinic
    $TableNameUseraccounts = "useraccount";

    //The lines to run in sql
    $SQLstring = "SELECT fullName FROM $TableNameUseraccounts WHERE nric = '" . $theNric . "'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
    
    if ($queryResult->num_rows != 0){
        $rows=mysqli_fetch_assoc($queryResult);
        echo $rows['fullName'];
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