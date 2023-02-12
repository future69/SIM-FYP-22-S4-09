<?php
try	{
    $apptID = $_REQUEST["q"];
    $billStatus = $_REQUEST["w"];

    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

    //Name of the table 
    $TableNameBill = "bill";
    //The lines to run in sql
    $SQLstring = "UPDATE $TableNameBill SET billStatus='" . $billStatus . "' WHERE apptID ='". $apptID ."'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
}
    catch(mysqli_sql_exception $e) {
        echo "Error";
    }
?>