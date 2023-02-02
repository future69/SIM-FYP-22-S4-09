<?php
try	{
    $serviceName = $_REQUEST["q"];
    $serviceValue = $_REQUEST["w"];

    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
    //Name of the table 
    $TableNameService = "service";
    //The lines to run in sql
    $SQLstring = "UPDATE $TableNameService SET serviceStatus='" . $serviceValue . "' WHERE serviceName ='". $serviceName ."'";
    //Executing the sql
    $queryResult = mysqli_query($conn, $SQLstring);
}
    catch(mysqli_sql_exception $e) {
        echo "Error";
    }
?>