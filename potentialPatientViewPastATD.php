<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script>
		//AJAX function for onclick feature (Get delete appointment)
		function deleteAppointment(apptID){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200){
					location.reload();
				}
			};
			xmlhttp.open("GET", "deleteAppointments.php?q=" + apptID, true);
			xmlhttp.send();
	}
	</script>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
					<img
					class="d-inline-block align-top"
					src="images/superDentalLogo.png"
					width="50" height="40"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepageAftLogin.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="potentialPatientView&SearchAppointment.php">View Appointment(s)</a>
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
								<a class="nav-link" href="index.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		</nav>	
	</header>
    <?php
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

//query results for dentist and patient info tables
$queryResult = mysqli_query($conn, $SQLstring);
$queryResult2 = mysqli_query($conn, $SQLstring2);

//query results for allergies and med history
$queryResult3 = mysqli_query($conn, $SQLstring3);
$rowPatientInfo = mysqli_fetch_assoc($queryResult3);

if (isset($_POST['btnBack'])){
	header("Location:potentialPatientView&SearchAppointment.php");
}

?>
	<body>
	<div class="registrationBoxPatient container">
		<form method="POST">
			<div class="row justify-content-center align-items-center">
				<div class="row col-12 text-center pb-5">
					<div class="display-6">Past Appointment Treatment Details</div>
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
						<textarea class="form-control" id="medhistoryTB" name="medhistoryTB" disabled><?php echo str_replace('~', "\r\n",$rowPatientInfo['medHistory']);?></textarea>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="serviceSL" class="col-3 col-form-label">Services:</label>
						<div class="col-7">
							<textarea class="form-control" id="servicesTA" name="servicesTA" disabled><?php echo str_replace(' ',",",$rowPatientInfo['serviceName']);?></textarea>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="assistantSL" class="col-3 col-form-label">Assistant(s):</label>
						<div class="col-9">
						<textarea class="form-control" id="assistantTA" name="assistantTA" disabled><?php echo str_replace(',',"\r\n",$rowPatientInfo['assistant']);?></textarea>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="allergiesLabel" class="col-3 col-form-label">Allergies:</label>
						<div class="col-7">
							<textarea class="form-control" id="allergiesTB" name="allergiesTB" size="3" disabled><?php echo $rowPatientInfo['allergies']?></textarea>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="materialSL" class="col-3 col-form-label">Materials:</label>
						<div class="col-7">
							<textarea class="form-control" id="materialsTB" name="materialsTB" size="3" disabled><?php echo $rowPatientInfo['materialsUsed']?></textarea>
						</div>
					</div>
					<div class="row col-2 py-2">
						<label for="treatmentNotesTB" class="col-2 col-form-label">Treatment Notes:</label>
					</div>
					<div class="col-10 mt-2">
						<textarea class="form-control" id="treatmentNotesTB" name="treatmentNotesTB" disabled><?php echo $rowPatientInfo['treatmentNotes']?></textarea>
					</div>
					<div class="row errorMessage justify-content-center align-items-center py-2"></div>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" id="btnBack" name="btnBack" value="btnBack">Back</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>