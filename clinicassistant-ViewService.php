<?php session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
    <title>Clinic Assistant View Services</title>
</head>
<?php
$clinicAssistantFullname = $_SESSION['clinicAssistantFullname'];
$clinicAssistantClinicName = $_SESSION['clinicAssistantClinicName'];

try {
    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");
    $DBService = 'service';
    $DBclinic = 'clinic';
    $sqlservice = "SELECT servicesSelected FROM $DBclinic WHERE clinicName = '$clinicAssistantClinicName'";
    $resultservice = mysqli_query($conn, $sqlservice);
} catch (mysqli_sql_exception $e) {
    echo "Error in retrieving from table";
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
            DiamondDental™
        </a>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="ClinicAssistant-HomePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="clinicassistant-ViewService.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clinicassistant-bills.php">Billing</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex mb-2 mb-md-0">
                <li class="nav-item d-flex">
                    <a class="nav-link" href="#">Welcome Clinic Assistant <?php echo $clinicAssistantFullname ?></a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container-lg">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Services</div>
        <div class="row">
            <div class="col-md-4">
                <!--Contatiner control-->
            </div>
            <div class="col-md-4 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <div class="input-group col-3 col-sm-3 ">
                            <table class="table table-hover table-secondary table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">Service Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rows = mysqli_fetch_assoc($resultservice);
                                    $servicesOffered = explode(",", $rows['servicesSelected']);
                                    //echo $rows['servicesSelected'];
                                    //while ($rows = mysqli_fetch_array($resultservice)) {
                                    foreach ($servicesOffered as $i => $key) {
                                    ?>
                                        <tr>
                                            <td><?php echo $key; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!--Contatiner control-->
        </div>
    </div>
</body>

</html>