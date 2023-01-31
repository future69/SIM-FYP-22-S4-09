<?php
ob_start();
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
						<a class="nav-link" href="ClinicAssistant-HomePage.php">Home</a>
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
						<a class="nav-link" href="index.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<?php
//Declare error message
$allergiesError = $materialError = $treatmentNotesError = $serviceError = $assistantError = $errorMessage = null;

//$clinicName = 'tempClinicName'; //get this from session in the future
$clinicName = $_SESSION["clinicAssistantClinicName"];
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

if (isset($_POST['btnUpdate'])) {

	//Value is at the input boxes incase of wrong entry, dont have to retype 
	//Declaring, removing backslashes and whitespaces
	$allergies = stripslashes($_POST['allergiesTB']);
	$material = stripslashes($_POST['materialsTB']);
	$treatmentNotes = stripslashes($_POST['treatmentNotesTB']);

	//Remove whitespaces
	$allergies = trim($_POST['allergiesTB']);
	$material = trim($_POST['materialsTB']);
	$treatmentNotes = trim($_POST['treatmentNotesTB']);

	//Method to validate entries
	function correctValidation(): int
	{
		//Keep track of total false, the number represents the numbers of inputs failed
		$totalFalseCount = 0;

		if (empty($GLOBALS['allergies'])) {
			$GLOBALS['allergiesError'] = "Please enter a value";
			$totalFalseCount++;
		}

		if (empty($GLOBALS['material'])) {
			$GLOBALS['materialError'] = "Please enter a value";
			$totalFalseCount++;
		}

		if (empty($GLOBALS['treatmentNotes'])) {
			$GLOBALS['treatmentNotesError'] = "Please enter a value";
			$totalFalseCount++;
		}

		if (isset($_POST['serviceSL']) == false) {
			$GLOBALS['serviceError'] = "Please select at least 1 service";
			$totalFalseCount++;
		}

		if (isset($_POST['assistantSL']) == false) {
			$GLOBALS['assistantError'] = "Please select at least 1 assistant";
			$totalFalseCount++;
		}

		return $totalFalseCount;
	}

	//Check for any errors
	if (correctValidation() > 0) {
		$errorMessage = "Please complete all fields";
	} else {
		try {
		$todaysDate = date("Y-m-d");
		$appStatus = 'past';
		//Gets selected services array and adds them together to form a string 
		$selectedServices = implode(" ",$_POST['serviceSL']);
		$selectedAssistants = implode(" ",$_POST['assistantSL']);

		//Get old medical history and combine with new treatment notes
		$SQLstring3 = "SELECT medHistory FROM $TableNameAppointment INNER JOIN $TableNamePatientProfile ON appointment.nric = patientprofile.nric WHERE apptID = '".$apptID."'";
		$queryResultPastMedicalHistory = mysqli_query($conn, $SQLstring3);
		$rowPastMedicalHistory = mysqli_fetch_assoc($queryResultPastMedicalHistory);
		//combine with new treatment notes
		$pastMedHistory = $rowPastMedicalHistory['medHistory'];
		$newMedHistory = $pastMedHistory . '~~' . $todaysDate . '~' . $treatmentNotes;

		//Update appointment table and patient table
		$SQLstring = "UPDATE $TableNameAppointment SET serviceName='".$selectedServices."', apptStatus='".$appStatus."', assistant='".$selectedAssistants."', treatmentNotes='".$treatmentNotes."', materialsUsed='".$material."' WHERE apptID = '".$apptID."'";
		$SQLstring2 = "UPDATE $TableNameAppointment INNER JOIN $TableNamePatientProfile ON appointment.nric = patientprofile.nric SET medHistory='".$newMedHistory."', allergies='".$allergies."' WHERE apptID = '".$apptID."'";

		mysqli_query($conn, $SQLstring);
		mysqli_query($conn, $SQLstring2);
		mysqli_close($conn);

		echo "<script>
		alert('Success');
		window.location.href='clinicassistant-AppointmentList.php';
		</script>";
		} catch (mysqli_sql_exception $e) {
			echo "<p>Error: unable to connect/insert record in the database.</p>";
		}
	}
} else if (isset($_POST['btnBack'])){
	header("Location:clinicassistant-AppointmentList.php");
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
						<label for="serviceSL" class="col-3 col-form-label">Services:</label>
						<div class="col-7">
							<select class="form-select" name="serviceSL[]" id="serviceSL" size="2" multiple>
							<?php
							foreach($listOfServices as $serviceName) {
							?>
								<option value="<?php echo $serviceName;?>"><?php echo $serviceName;?></option>
							<?php
							}
							?>
							</select>
							<div class="errorMessage">
								<?php echo $serviceError;?>
							</div>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="assistantSL" class="col-3 col-form-label">Assistant(s):</label>
						<div class="col-9">
							<select class="form-select" name="assistantSL[]" id="assistantSL" size="2" multiple>
							<?php
							while ($assistantNames = mysqli_fetch_assoc($queryResult4)) {
							?>
								<option value="<?php echo $assistantNames['fullName'], ' '. $assistantNames['nric'];?>"><?php echo $assistantNames['fullName'], ' '. $assistantNames['nric'];?></option>
							<?php
							}
							?>
							</select>
							<div class="errorMessage">
								<?php echo $assistantError;?>
							</div>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="allergiesLabel" class="col-3 col-form-label">Allergies:</label>
						<div class="col-7">
							<textarea class="form-control" id="allergiesTB" name="allergiesTB" size="3"><?php echo $rowPatientInfo['allergies']?></textarea>
						</div>
						<div class="errorMessage">
							<?php echo $allergiesError;?>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="materialSL" class="col-3 col-form-label">Materials:</label>
						<div class="col-7">
							<textarea class="form-control" id="materialsTB" name="materialsTB" size="3"></textarea>
							<div class="errorMessage">
								<?php echo $materialError;?>
							</div>
						</div>
					</div>
					<div class="row col-2 py-2">
						<label for="treatmentNotesTB" class="col-2 col-form-label">Treatment Notes:</label>
					</div>
					<div class="col-10 mt-2">
						<textarea class="form-control" id="treatmentNotesTB" name="treatmentNotesTB"></textarea>
						<div class="errorMessage">
							<?php echo $treatmentNotesError;?>
						</div>
					</div>
					<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>
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