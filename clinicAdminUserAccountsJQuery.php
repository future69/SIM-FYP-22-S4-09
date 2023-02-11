<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameUA = "useraccount";
$TableNameClinicAssistant = "clinicassistantprofile";
$TableNameDentist = "dentistprofile";

$query = "";
//Get the clinic name of the clinic admin
$clinicName = $_POST['sessionVal'];


// This is for radio button (usertype/rolename)
if (isset($_POST['userType'])) {
    $theValue = $_POST['userType'];
    if ($theValue == 'employee'){
        $userTypeDentist = 'dentist';
        $userTypeClinicAssistant = 'clinicAssistant';

        $query .= 
        "SELECT useraccount.fullName, useraccount.roleName, useraccount.accStatus, useraccount.nric, clinicassistantprofile.clinicName FROM $TableNameUA
        LEFT JOIN $TableNameClinicAssistant ON useraccount.nric = clinicassistantprofile.nric
        WHERE (useraccount.roleName = '$userTypeClinicAssistant') AND (clinicassistantprofile.clinicName = '$clinicName')";

        if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
            $query .= " AND (useraccount.fullName LIKE '%" . $_POST['search_text'] . "%'
                        OR useraccount.nric LIKE '%" . $_POST['search_text'] . "%')";
        }

        $query .=
        "UNION
        SELECT useraccount.fullName, useraccount.roleName, useraccount.accStatus, useraccount.nric, dentistprofile.clinicName FROM $TableNameUA
        RIGHT JOIN $TableNameDentist ON useraccount.nric = dentistprofile.nric
        WHERE (useraccount.roleName = '$userTypeDentist') AND (dentistprofile.clinicName = '$clinicName')
        ";
    } else {
        $userTypePatient = 'patient';
        $query .= "SELECT * FROM $TableNameUA WHERE (roleName = '$userTypePatient')";
    }
}

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    $query .= " AND (useraccount.fullName LIKE '%" . $_POST['search_text'] . "%'
                OR useraccount.nric LIKE '%" . $_POST['search_text'] . "%')";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    $output .= '
        <table class="table table-hover table-secondary table-striped ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">NRIC</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
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
                <td>' . $row["roleName"] . '</td>
                <td>' . $row["accStatus"] . '</td>
                <td>
        ';
        
        if ($row["roleName"] == "patient")
        {
            $output .= '<button type="submit" class="btn btn-secondary" name="viewPatientAccount" 
            onclick="location.href=\'clinicAdminViewPatientAccount.php?nric='.$row["nric"].'\'">View Account</button>';
        } else {
            $output .= '<button type="submit" class="btn btn-success" name="updateAccount" 
            onclick="location.href=\'clinicAdminView&UpdateEmployeeAccount.php?nric='.$row["nric"].'\'">Update Account</button>';
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

