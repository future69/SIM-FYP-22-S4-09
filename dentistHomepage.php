<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
	<?php 
	// setting session variables
	$dentistNRIC = $_SESSION['dentistNric'];
	$dentistFullName = $_SESSION['dentistFullname'];
	$dentistPracNum = $_SESSION['dentistPracNum'];
	// $dentistFullName = "Dr. Lee";
	// $dentistPracNum = "T128172";

	// executing try block
	try {
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName) or die("Connection Failed");

		// setting todayDate
		date_default_timezone_set('Singapore');
		$todayDate = date('Y-m-d'); 

		// table name
		$TableNameAppointment = "appointment";
		//$TableNameClinic = "clinic";
		$TableNameUA = "useraccount";

		// sql query to get all appointments at clinic
		$SQLstring = "SELECT * 
			FROM  $TableNameAppointment INNER JOIN $TableNameUA on useraccount.nric = appointment.nric
			WHERE appointment.practitionerNum = '$dentistPracNum' 
			AND useraccount.roleName = 'patient' 
			AND appointment.apptDate = '$todayDate'";

		// executing sql
		$queryResult = mysqli_query($conn, $SQLstring);
		
		// $count = mysqli_num_rows($queryResult);
	} catch (mysqli_sql_exception $e) {
		echo "Error in retrieving or linking tables";
	}

	?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
					width="50" height="40"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="dentistHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistSearchPatient.php">Patient</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewService.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
						<li class="nav-item">
								<a class="nav-link" href="#">Welcome <?php echo $dentistFullName ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistPersonalProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		</nav>
	</header>
	<body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="column">
				<div class="col-md-5 text-start pt-5">
					<div class="display-6">Welcome <?php echo $dentistFullName ?></div>
				</div>
				<div class="col-md-5 text-start pt-4">
					<h5>You have <?php echo $count ?></strong> appointments today</h5>
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
