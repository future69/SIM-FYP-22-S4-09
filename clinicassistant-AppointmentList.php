<?php
session_start();
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>clinic Assistant Appointment List</title>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
				DiamondDental™
			</a>
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="clinicassistant-HomePage.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="clinicassistant-AppointmentList.php">Appointment</a>
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
						<a class="nav-link" href="#">Welcome Clinic Assistant Sam</a>
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
	<?php

	$servername = "u418115598_dentalapp";
	//Name of the table 
	$clinicName = 'Toa Payoh Family Clinic';
	$TableNameAppointment = "appointment";
	$TableNameClinic = "clinic";
	$TableNameUseraccount = "useraccount";
	$con = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $servername) or die("Connection Failed");


	$SQLstring = "SELECT * FROM $TableNameAppointment 
	INNER JOIN $TableNameClinic 
	ON appointment.clinicName = clinic.clinicName 
	INNER JOIN $TableNameUseraccount 
	ON appointment.nric = useraccount.nric 
	WHERE clinic.clinicName = '" . $clinicName . "'";
	$result = mysqli_query($con, $SQLstring);

	// if (isset($_POST['deleteAppt'])) {
	// 	echo '<script>alert("Appointment Deleted")</script>';
	// } else if (isset($_POST['updateAppt'])) {
	// 	header("Location:clinicassistant-UpdateAppointment.php");
	// } else if (isset($_POST['CreateATD'])) {
	// 	header("Location:clinicassistant-ATD.php");
	// } else if (isset($_POST['bookAppointment'])) {
	// 	header("Location:clinicassistant-CreateAppointment.php");
	// }
	?>
</header>

<body>
	<form method="POST">
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-5">
				<div class="col-12 text-start">
					<div class="display-5">Appointments</div>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="row">
					<label for="searchClinicName" class="row col-2 col-form-label">
						<h4>Search :</h4>
					</label>
					<div class="row col-6">
						<input type="text" class="row col-3 form-control" id="searchClinicName" placeholder="Name or NRIC">
					</div>
					<div class="col-4 text-end display-6 pb-3">
						<button type="submit" class="btn btn-warning" name="bookAppointment">Book Appointment</button>
					</div>
				</div>
			</div>
	</form>
	<div class="row py-3">
		<div class="col-2 form-check">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrent" checked>
			<label class="form-check-label" for="flexRadioDefaultCurrent"><strong>Current Appointments</strong></label>
		</div>
		<div class="col-2 form-check">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPast">
			<label class="form-check-label" for="flexRadioDefaultPast"><strong>Past Appointments</strong></label>
		</div>
	</div>

	<?php
	if (mysqli_num_rows($result) > 0) {
	?>
		<table class="table table-hover table-secondary table-striped ">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">NRIC</th>
					<th scope="col">Date</th>
					<th scope="col">Time</th>
					<th scope="col">Phone Number</th>
					<th scope="col">Reason</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td> <?php echo $row['fullName']; ?> </td>
						<td> <?php echo $row['nric']; ?> </td>
						<td> <?php echo $row['apptDate']; ?> </td>
						<td> <?php echo $row['apptTime']; ?> </td>
						<td> <?php echo $row['phoneNum']; ?> </td>
						<td> <?php echo $row['reason']; ?> </td>
						<td>
							<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='clinicassistant-UpdateAppointment.php'">Update Appointment</button>
							<button type="submit" class="btn btn-danger" name="deleteAppt">Deleted Appointment</button>
							<button type="submit" class="btn btn-success" name="CreateATD" onclick="location.href='clinicassistant-ATD.php?apptID=<?php echo $row['apptID']; ?>'">Update Appointment Treatment Details</button>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</div>
	<?php
	} else {
		echo "No results found";
	} ?>




</body>

</html>