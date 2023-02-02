<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
		//Set session variables from login
		$patientUsername = $_SESSION["patientUsername"];
		$patientFullname = $_SESSION["patientFullname"];
		$patientNric = $_SESSION["patientNric"];

		// set current date and time of query
		date_default_timezone_set("Singapore");
		// $currentTime = date("h:i:sa");
		// $currentDate = date("y-m-d");
	
		// //Declaration
		// $errorMessage = "";
		// $errorMessage2 = "";
	
		// //This try block will be execute once the user enters the page
		// try	{
		// $DBName = "u418115598_dentalapp";
		// $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
		// //Name of the table 
		// $TableNameAppointment = "appointment";
		// $TableNameClinic = "clinic";
		// //The lines to run in sql (getting all records that match patient nric from session)
		// $SQLstring = "SELECT * FROM $TableNameAppointment INNER JOIN $TableNameClinic ON appointment.clinicName = clinic.clinicName WHERE appointment.nric = '". $patientNric ."' ORDER BY str_to_date(apptDate, '%Y-%m-%d'), apptTime";
		// $result = mysqli_query($conn, $SQLstring);	
		// //Executing the sql
		// $queryResult = mysqli_query($conn, $SQLstring);
		// } 	
		// catch(mysqli_sql_exception $e) {
		// 		echo "Error";
		// }
		
		// if (isset($_POST['searchAppt'])) {

		// 	// search by clinic name
		// 	//Declaring, removing backslashes and whitespaces
		// 	$searchClinicName = stripslashes($_POST['searchClinicName']);
		// 	//Remove whitespaces
		// 	$searchClinicName = trim($_POST['searchClinicName']);

		// 	// search by filter period / status
		// 	//Declare selection values
		// 	$filterPeriod = $_POST['filterPeriod'];
		// 	$filterStatus = $_POST['filterStatus'];
		// 	$filterDateLower = "";
		// 	$filterDateUpper = "";
			
		// 	if ($GLOBALS['searchClinicName'] == null){
		// 		$GLOBALS['searchClinicName'] = "%";
		// 	} else {
		// 		$GLOBALS['searchClinicName'] = "%" . $GLOBALS['searchClinicName'] . "%";
		// 	}
			
		// 	// checking on filter status
		// 	if ($filterStatus == "flexRadioDefaultCurrent"){
		// 		//SQL string to search for current appointments
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptStatus='current'" ;
		// 	} 
		// 	else if ($filterStatus == "flexRadioDefaultPast"){
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptStatus='past'" ;
		// 	}
		// 	else if ($filterStatus == '1week'){
		// 		$filterDateLower = date('y-m-d', strtotime('-1 week'));
		// 		$filterDateUpper = date('y-m-d', strtotime('+1 week'));
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptdate BETWEEN CAST('" . $filterDateLower . "' AS DATE) AND CAST('" . $filterDateUpper . "' AS DATE)";
		// 	}
		// 	else if ($filterStatus == '1month'){
		// 		$filterDateLower = date('y-m-d', strtotime('-1 month'));
		// 		$filterDateUpper = date('y-m-d', strtotime('+1 month'));
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptdate BETWEEN CAST('" . $filterDateLower . "' AS DATE) AND CAST('" . $filterDateUpper . "' AS DATE)";
		// 	}
		// 	else if ($filterStatus == '3month'){
		// 		$filterDateLower = date('y-m-d', strtotime('-3 month'));
		// 		$filterDateUpper = date('y-m-d', strtotime('+3 month'));
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptdate BETWEEN CAST('" . $filterDateLower . "' AS DATE) AND CAST('" . $filterDateUpper . "' AS DATE)";
		// 	}
		// 	else if ($filterStatus == '6month'){
		// 		$filterDateLower = date('y-m-d', strtotime('-6 month'));
		// 		$filterDateUpper = date('y-m-d', strtotime('+6 month'));
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptdate BETWEEN CAST('" . $filterDateLower . "' AS DATE) AND CAST('" . $filterDateUpper . "' AS DATE)";
		// 	}
		// 	else if ($filterStatus == '1year'){
		// 		$filterDateLower = date('y-m-d', strtotime('-1 year'));
		// 		$filterDateUpper = date('y-m-d', strtotime('+1 year'));
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptdate BETWEEN CAST('" . $filterDateLower . "' AS DATE) AND CAST('" . $filterDateUpper . "' AS DATE)";
		// 	}
		// 	else {
		// 		$SQLstring = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName";
		// 	}

		// 	//Executing the sql
		// 	$queryResult = mysqli_query($conn, $SQLstring);
		// 	$GLOBALS['searchClinicName'] = "";
		// 	$filterDateLower = "";
		// 	$filterDateUpper = "";
		// } 
		
		// //to delete appt
		// else if (isset($_POST['deleteAppt'])) {
			
		// //Declaring, removing backslashes and whitespaces
		// $apptID = stripslashes($_POST['apptID']);
		// //Remove whitespaces
		// $apptID = trim($_POST['apptID']);
		
		// 	if (empty($apptID) == false){
		// 			//The lines to run in sql
		// 			$SQLdelAppt = "SELECT apptID, clinicName, nric, apptDate, apptTime, serviceName, apptStatus, practitionerNum FROM $TableName" . " where apptID ='". $apptID ."'";
		// 			//Executing the sql
		// 			$queryResultAppt = mysqli_query($conn, $SQLdelAppt);
					
		// 			if (mysqli_num_rows($queryResultAppt) == 0) {
		// 				$errorMessage2 = "Appointment does not exist";
		// 				} 
		// 			else {
		// 				header("Location:potentialPatientView&SearchAppointment.php?");
		// 			}
		// 	} 
		// }
	?>
	<body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row">
				<div class="row col-4 text-start pt-5">
					<div class="display-6">View Appointment(s)</div>
				</div>
				<form class="row col-8 justify-content-end align-items-center pt-5" method="POST">
					<label for="searchClinicName" class="row col-2 col-form-label"><h4>Search :</h4></label>
						<div class="row col-6">
							<input type="text" class="row col-3 form-control" id="searchClinicName" placeholder="Clinic Name">
						</div>
						<div class="row col-2">
							<select class="form-select" name="timeSlotSL" id="timeSlotSL">
								<option value="all">All Dates</option>
								<option value="1week">1 week</option>
								<option value="1month">1 month</option>
								<option value="3month">3 months</option>
								<option value="6month">6 months</option>
								<option value="1year">1 year</option>
							</select>
						</div>
				</form>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Your next appointments(s)</div>
					<div class="row py-3">
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrent" value="flexRadioDefaultUpcoming" checked>
						  <label class="form-check-label" for="flexRadioDefaultCurrent"><strong>Current Appointments</strong></label>
						</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPast" value="flexRadioDefaultPast">
						  <label class="form-check-label" for="flexRadioDefaultPast"><strong>Past Appointments</strong></label>
						</div>
					</div>
					<div id="result"></div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {	
				// Default value for each field
				let search = $('#searchClinicName').val();
				let apptStatus = $('input[type="radio"]:checked').val();
				let dateRange = $('#timeSlotSL').val();
				
				load_data(search, apptStatus, dateRange);

				function load_data(search_text, apptStatus, dateRange) {
					$.ajax({
						url: "pp-apptstatusfilter.php",
						method: "POST",
						data: {
							search_text: search_text,
							apptStatus: apptStatus,
							dateRange: dateRange
						},
						success: function(data) {
							$('#result').html(data);
						}
					});
				}

				// This is for clinic name search box (Clinic name)
				$('#searchClinicName').keyup(function() {
					search = $(this).val();

					load_data(search, apptStatus, dateRange);
				});

				// This is for radio button (Appointment Status)
				$('input[type="radio"]').change(function() {
					apptStatus = $('input[type="radio"]:checked').val();

					load_data(search, apptStatus, dateRange);
				});
				
				// This is for drop down (Date Range)
				$('#timeSlotSL').change(function() {
					dateRange = $(this).val();

					load_data(search, apptStatus, dateRange);
				});				
			});
		</script>
	</body>
</html>