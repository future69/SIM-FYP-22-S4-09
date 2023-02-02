<?php
//This try block will be execute once the user enters the page
try	{
    
    $theNric = $_REQUEST["q"];

    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
    //Name of the table 
    $TableName = "pasthistory";
    //The lines to run in sql
    $SQLstring = "SELECT medicalHistory, allergies FROM $TableName" . " where nric ='". $theNric ."'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);

    if ($queryResult->num_rows != 0){
        $rows=mysqli_fetch_assoc($queryResult);
        $pastMedHistory = $rows['medicalHistory'];
        $pastAllergies = $rows['allergies'];
        echo $pastMedHistory . "|" . $pastAllergies;
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