<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>Clinic Assistant Appointment Treatment Details</title>
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
						<a class="nav-link " href="clinicassistant-PersonalProfile.php">Profile</a>
					</li>
					<li class="nav-item d-flex">
						<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<?php

$clinicName = 'tempClinicName'; //get this from session in the future
$apptID = $_GET['apptID'];
$servername = "u418115598_dentalapp";

//create connection
$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $servername);
$TableNameAppointment = 'appointment';
$TableNameDentist = 'dentistprofile';
$TableNameUseraccount = 'useraccount';
$TableNamePatientProfile = 'patientprofile';
$TableNameClinic = 'clinic';
$TableNameClinicAssistant = 'clinicassistantprofile';

//The lines to run in sql (get dentist info)
$SQLstring = "SELECT * FROM $TableNameAppointment 
INNER JOIN $TableNameDentist 
ON appointment.practitionerNumber = dentistprofile.practitionerNumber 
INNER JOIN $TableNameUseraccount 
ON dentistprofile.nric = useraccount.nric 
WHERE appointment.apptID = '". $apptID ."'";

//The lines to run in sql (get patient info)
$SQLstring2 = "SELECT * FROM $TableNameAppointment 
INNER JOIN $TableNamePatientProfile 
ON appointment.nric = patientprofile.nric 
INNER JOIN $TableNameUseraccount 
ON appointment.nric = useraccount.nric 
WHERE appointment.apptID = '". $apptID ."'";

//The lines to run in sql (get allergies and med history)
$SQLstring3 = "SELECT * FROM $TableNameAppointment 
INNER JOIN $TableNamePatientProfile 
ON appointment.nric = patientprofile.nric 
INNER JOIN $TableNameUseraccount 
ON appointment.nric = useraccount.nric 
WHERE appointment.apptID = '". $apptID ."'";

//The lines to run in sql (get services)
$SQLstring4 = "SELECT servicesSelected FROM $TableNameClinic 
WHERE clinicName = '". $clinicName ."'";

//The lines to run in sql (get clinic assistants)
$SQLstring5 = "SELECT * FROM $TableNameClinicAssistant 
INNER JOIN $TableNameUseraccount 
ON clinicassistantprofile.nric = useraccount.nric 
WHERE clinicassistantprofile.clinicName = '". $clinicName ."'";

//query results for dentist and patient info tables
$queryResult = mysqli_query($conn, $SQLstring);
$queryResult2 = mysqli_query($conn, $SQLstring2);

//query results for allergies and med history
$queryResult3 = mysqli_query($conn, $SQLstring3);
$rowPatientInfo = mysqli_fetch_assoc($queryResult3);

//Convert string from database to array
$queryResultClinicServices = mysqli_query($conn, $SQLstring4);
$rowClinicServices = mysqli_fetch_assoc($queryResultClinicServices);
$listOfServices = explode(" ", $rowClinicServices['servicesSelected']);

//query results for clinic assistants name
$queryResult4 = mysqli_query($conn, $SQLstring5);

mysqli_close($conn);

if (isset($_POST['btnUpdate'])) {

	//Value is at the input boxes incase of wrong entry, dont have to retype 
	//Declaring, removing backslashes and whitespaces
	$servicelist = stripslashes($_POST['serviceSL']);
	$assistant = stripslashes($_POST['assistantSL']);
	$allergies = stripslashes($_POST['allergiesTB']);
	$material = stripslashes($_POST['materialSL']);
	$medhistory = stripslashes($_POST['medhistoryTB']);

	//Remove whitespaces
	$servicelist = trim($_POST['serviceSL']);
	$assistant = trim($_POST['assistantSL']);
	$allergies = trim($_POST['allergiesTB']);
	$material = trim($_POST['materialSL']);
	$medhistory = trim($_POST['medhistoryTB']);

	$SQLstring = "INSERT INTO apptreatmentdetail (assistant, allergies, material, medHistory) VALUES ('$assistant', '$allergies', '$material', '$medhistory')";

	$sqlService = "INSERT INTO appointment (serviceName) VALUES ('$servicelist')";

	mysqli_query($conn, $SQLstring);
	mysqli_query($conn, $sqlService);
	mysqli_close($conn);
}

?>

<body>
	<div class="registrationBoxPatient container">
		<form method="POST">
			<div class="row justify-content-center align-items-center">
				<div class="row col-12 text-center pb-5">
					<div class="display-6">Appointment treatment details for name3</div>
				</div>
				<div class="row col-7">
					<table class="table caption-top table-hover table-secondary table-striped ">
						<caption>Appointment Details</caption>
						<thead>
							<tr>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Dentist</th>
							<tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_assoc($queryResult)) {
								?>
								<tr>
									<td><?php echo $row['apptDate']?></td>
									<td><?php echo $row['apptTime']?></td>
									<td><?php echo $row['fullName']?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<table class="table caption-top table-hover table-secondary table-striped ">
						<caption>Patient Details</caption>
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">DOB</th>
								<th scope="col">Gender</th>
								<th scope="col">X-Ray</th>
							<tr>
						</thead>
						<tbody>
						<?php
							while ($row = mysqli_fetch_assoc($queryResult2)) {
								?>
								<tr>
									<td><?php echo $row['fullName']?></td>
									<td><?php echo $row['nric']?></td>
									<td><?php echo $row['dob']?></td>
									<td><?php echo $row['gender']?></td>
									<td><button type="submit" class="btn btn-primary" name="downloadFile">Download</button></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<div class="row col-2 py-2">
						<label for="medhistoryTB" class="col-2 col-form-label">Medical History: </label>
					</div>
					<div class="col-10 mt-2">
						<textarea class="form-control" id="medhistoryTB" name="medhistoryTB" readonly><?php echo $rowPatientInfo['medHistory']?></textarea>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="serviceSL" class="col-3 col-form-label">Service:</label>
						<div class="col-7">
							<select class="form-select" name="serviceSL" id="serviceSL" size="2" multiple>
							<?php
							foreach($listOfServices as $serviceName) {
							?>
								<option value="<?php echo $serviceName;?>"><?php echo $serviceName;?></option>
							<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="assistantSL" class="col-3 col-form-label">Assistant(s):</label>
						<div class="col-9">
							<select class="form-select" name="assistantSL" id="assistantSL" size="2" multiple>
							<?php
							while ($assistantNames = mysqli_fetch_assoc($queryResult4)) {
							?>
								<option value="<?php echo $assistantNames['fullName'], ' '. $assistantNames['nric'];?>"><?php echo $assistantNames['fullName'], ' '. $assistantNames['nric'];?></option>
							<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="allergiesLabel" class="col-3 col-form-label">Allergies:</label>
						<div class="col-7">
							<textarea class="form-control" id="allergiesTB" name="allergiesTB" size="3"><?php echo $rowPatientInfo['allergies']?></textarea>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="materialSL" class="col-3 col-form-label">Materials:</label>
						<div class="col-7">
							<textarea class="form-control" id="materialsTB" name="materialsTB" size="3"></textarea>
						</div>
					</div>
					<div class="row col-2 py-2">
						<label for="treatmentNotesTB" class="col-2 col-form-label">Treatment Notes:</label>
					</div>
					<div class="col-10 mt-2">
						<textarea class="form-control" id="treatmentNotesTB" name="treatmentNotesTB"></textarea>
					</div>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" id="btnBack" name="btnBack" value="btnBack">Back</button>
						<button class="btn btn-Primary" id=btnUpdate name="btnUpdate" value="btnUpdate">Update</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>