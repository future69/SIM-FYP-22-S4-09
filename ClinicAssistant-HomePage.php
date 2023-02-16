<?php
session_start();
if (empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == '') {
	header("Location:index.php");
	die();
}
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>Clinic Assistant</title>
</head>
<?php
//setting session variables
$clinicAssistantNric = $_SESSION['clinicAssistantNric'];
$clinicAssistantFullname = $_SESSION['clinicAssistantFullname'];
$clinicName = $_SESSION['clinicAssistantClinicName'];
//$clinicName = "tempClinicName";

// executing try block
try {
	$DBName = "u418115598_dentalapp";
	$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");

	// setting todayDate
	date_default_timezone_set('Singapore');
	$todayDate = date('Y-m-d');

	// table name
	$TableNameAppointment = "appointment";
	//$TableNameClinic = "clinic";
	$TableNameUA = "useraccount";


	// sql query to get all appointments at clinic
	$SQLstring = "SELECT * FROM $TableNameAppointment INNER JOIN $TableNameUA ON useraccount.nric = appointment.nric
		WHERE clinicName = '" . $clinicName . "' AND (useraccount.roleName = 'patient') AND (appointment.apptDate = '" . $todayDate . "') 
		ORDER BY appointment.apptTime";

	// executing sql
	$queryResult = mysqli_query($conn, $SQLstring);
} catch (mysqli_sql_exception $e) {
	echo "Error in retrieving or linking tables";
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
					<a class="nav-link active" aria-current="page" href="ClinicAssistant-HomePage.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
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
		<!-- Put this div outside the center alignment, for the welcome message plus bills -->
		<!-- Tablehead can put caption-top -->
		<div class="column">
			<div class="col-md-5 text-start pt-5">
				<div class="display-6">Welcome <?php echo $clinicAssistantFullname ?></div>
			</div>
			<div class="col-md-5 text-start pt-4">
				<h5>You have <strong><?php $count = mysqli_num_rows($queryResult);
										echo $count; ?></strong> appointments today</h5>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pt-5">
			<div class="column">
				<div class="display-6 pb-3">Today's appointments (<?php echo $todayDate; ?>)</div>
				<table class="table table-hover table-secondary table-striped ">
					<thead>
						<tr>
							<th scope="col">Patient Name</th>
							<th scope="col">Patient NRIC</th>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
						<tr>
					</thead>
					<tbody>
						<?php
						while ($rows = mysqli_fetch_assoc($queryResult)) {
						?>
							<tr>
								<td> <?php echo $rows['fullName']; ?> </td>
								<td> <?php echo $rows['nric']; ?> </td>
								<td> <?php echo $rows['apptDate']; ?> </td>
								<td> <?php echo $rows['apptTime']; ?> </td>
							</tr>
						<?php } ?>
					</tbody>
			</div>
		</div>
	</div>
</body>

</html>