<?php
$servername = "dentalhealthapplicationdb";

//Name of the table 
$con = mysqli_connect("localhost", "root", "", $servername) or die("Connection Failed");

$sql = "SELECT ua.* , pp.* FROM useraccount ua, patientprofile pp WHERE ua.nric = pp.nric And fullName LIKE '%" . $_POST['name'] . "%'";

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><a href="clinicassistant-PatientDetails.php"> <?php echo $row['fullName'] ?> </a> </td>
                <td> <?php echo $row['nric'] ?> </td>
                <td> <?php echo $row['dob'] ?> </td>
            </tr>
        <?php
    }
} else {
    echo "<tr><td>0 Result's Found</td></tr>";
}
