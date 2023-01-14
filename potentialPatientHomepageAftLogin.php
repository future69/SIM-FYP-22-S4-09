<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
				<img class="d-inline-block align-top" src="images/SuperDentalLogo.png" width="50" height="40" />
				DiamondDental™
			</a>
			<div class="collapse navbar-collapse" id="navigationBar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="potentialPatientHomepageAftLogin.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientView&SearchAppointment.php">View Appointment(s)</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientBookAppointment.php">Book Appointment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientView&SearchClinic.php">Clinics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientBills.php">Bills</a>
					</li>
				</ul>
			</div>
			<div class="me-auto">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientProfile.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<nav>
</header>
<?php
//Set session variables from login
$patientUsername = $_SESSION["patientUsername"];
$patientFullname = $_SESSION["patientFullname"];
$patientNric = $_SESSION["patientNric"];

//This try block will be execute once the user enters the page
try {
	$DBName = "dentalhealthapplicationdb";
	$conn = mysqli_connect("localhost", "root", "", $DBName);

	//Name of the table 
	$TableNameAppointment = "appointment";
	$TableNameClinic = "clinic";
	//The lines to run in sql (get current applications)
	$SQLstring = "SELECT * FROM $TableNameAppointment INNER JOIN $TableNameClinic ON appointment.clinicName = clinic.clinicName WHERE appointment.nric = '". $patientNric ."'";	
	//Executing the sql
	$queryResult = mysqli_query($conn, $SQLstring);
} catch (mysqli_sql_exception $e) {
	echo "Error";
}
?>

<body>
	<div class="container-lg">
		<!-- Put this div outside the center alignment, for the welcome message plus bills -->
		<!-- Tablehead can put caption-top -->
		<div class="column">
			<div class="col-md-5 text-start pt-5">
				<div class="display-6">Welcome <?php echo $patientFullname ?></div>
			</div>
			<div class="col-md-5 text-start pt-4">
				<h5>You have <strong>2</strong> outstanding payments</h5>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pt-5">
			<div class="column">
				<div class="display-6 pb-3">Your next appointments(s)</div>
				<table class="table table-hover table-secondary table-striped ">
					<thead>
						<tr>
							<th scope="col">Clinic Name</th>
							<th scope="col">Location</th>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
						<tr>
					</thead>
					<tbody>
						<?php
						while ($rows = mysqli_fetch_assoc($queryResult)) {
						?>
							<tr>
								<td> <?php echo $rows['clinicName']; ?> </td>
								<td> <?php echo $rows['clinicAddress']; ?> </td>
								<td> <?php echo $rows['apptDate']; ?> </td>
								<td> <?php echo $rows['apptTime']; ?> </td>
							</tr>
						<?php
						}
						?>
					</tbody>
			</div>
		</div>
	</div>
</body>

</html>