<?php
session_start();

$DBName = "u418115598_dentalapp";
$connect = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

$output = '';

//Name of the table 
$TableNameUA = "useraccount";

$query = "SELECT * FROM $TableNameUA WHERE";

// This is for radio button (usertype/rolename)
if (isset($_POST['userType'])) {
    $theValue = $_POST['userType'];
    if ($theValue == 'employee'){
        $userType = 'dentist';
        $userType2 = 'clinicAssistant';
        $query .= " (roleName = '".$userType."' OR roleName = '".$userType2."')";
    } else {
        $userType = 'patient';
        $query .= " roleName = '$userType'";
    }
}

// This is for search text
if (isset($_POST['search_text']) && $_POST['search_text'] != '') {
    $query .= " AND (fullName LIKE '%" . $_POST['search_text'] . "%'
                OR nric LIKE '%" . $_POST['search_text'] . "%')";
                echo $query;
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

