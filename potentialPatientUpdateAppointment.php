<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script>
			//AJAX function for onclick feature (Get timing)
			function getTimings(selectedDate){
			var inputClinicName = document.getElementById("clinicNameTB").value;
			var inputDentistPracNumber = document.getElementById("dentistNameSL").value;
			console.log(inputDentistPracNumber);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200){
					var parts = JSON.parse(xmlhttp.responseText);
					//Got an object from the response text, so needed to convert it into an array
					var parts = Object.keys(parts).map((key) => [ parts[key]]);
					var theTimeSL = document.getElementById("timeSlotSL"); 
					theTimeSL.innerHTML = "";
					for(var i = 0; i < parts.length; i++) {
						var timings = parts[i];
						theTimeSL.innerHTML += "<option value='" + timings + "'>" + timings + "</option>";
					};
				}
			};
			xmlhttp.open("GET", "potentialPatientBookAppointmentAjaxTiming.php?q=" + inputClinicName + "&w=" + selectedDate + "&e=" + inputDentistPracNumber, true);
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
								<a class="nav-link" aria-current="page" href="potentialPatientHomepageAftLogin.php">Home</a>
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
		<nav>
		<?php 
		$dateError = $timeSlotError = $reasonError = null;
		$errorMessage = "";

		$patientUsername = $_SESSION["patientUsername"];
		$patientFullname = $_SESSION["patientFullname"];
		$patientNric = $_SESSION["patientNric"];
		try {
			$apptID = $_GET['apptID'];
			$DBName = "u418115598_dentalapp";
			$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
			//Name of the table 
			$TableNameAppointment = "appointment";
			$TableNameDentist = "dentistprofile";
			$TableNameUseraccount = "useraccount";
			//The lines to run in sql (get current applications)
			$SQLstring = "SELECT * FROM $TableNameAppointment 
			INNER JOIN $TableNameDentist 
			ON appointment.practitionerNumber = dentistprofile.practitionerNumber 
			INNER JOIN $TableNameUseraccount 
			ON dentistprofile.nric = useraccount.nric 
			WHERE appointment.apptID = '". $apptID ."'";	
			//Executing the sql
			$queryResult = mysqli_query($conn, $SQLstring);
			$rows = mysqli_fetch_array($queryResult);
		} catch (mysqli_sql_exception $e){

		}

		if (isset($_POST['submit'])) {
			$date = $_POST['datePicker'];
			$reason = $_POST['reasonTB'];
			$timeSlot = $_POST['timeSlotSL'];

			//Method to validate entries
			function correctValidation(): int
			{
				//Keep track of total false, the number represents the numbers of inputs failed
				$totalFalseCount = 0;
				if (empty($GLOBALS['date'])) {
					$GLOBALS['dateError'] = "Please select a date";
					$totalFalseCount++;
				}
				if (($GLOBALS['timeSlot']) == 'placeholder') {
					$GLOBALS['timeSlotError'] = "Please select a timeslot";
					$totalFalseCount++;
				}
				if (empty($GLOBALS['reason'])) {
					$GLOBALS['reasonError'] = "Please enter a reason";
					$totalFalseCount++;
				}
					return $totalFalseCount;
			}

			if (correctValidation() > 0){
				$errorMessage = "Please complete all fields";
			}
			else {
				try {
					//Appointment ID is created with the patient's nric plus current date + time(hour min second)

					$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
					$TableNameAppointment = "appointment";
					//Inserts data into DB
					$SQLstring = "UPDATE $TableNameAppointment
					SET apptDate = '".$date."', apptTime = '".$timeSlot."', reason = '".$reason."'
					WHERE apptID = '".$apptID."'";
					mysqli_query($conn, $SQLstring);
					mysqli_close($conn);

					echo "<script>
					alert('Success');
					window.location.href='potentialPatientView&SearchAppointment.php';
					</script>";
				} catch (mysqli_sql_exception $e) {
					echo "<p>Error: unable to connect/insert record in the database.</p>";
				}
			}
		}
		else if (isset($_POST['back'])) {
			header("Location:potentialPatientView&SearchAppointment.php");
		}
		?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-4">
							<h1>Update appointment</h1>
						</div>
					</div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Name:</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="fullnameTB" value="<?php echo $patientFullname ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="nricTB" value="<?php echo $patientNric ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="clinicNameSL" class="col-lg-1 col-form-label">Clinic Name:</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" id="clinicNameTB" value="<?php echo $rows['clinicName'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="dentistNameSL" class="col-lg-1 col-form-label">Dentist Name:</label>
						<div class="col-lg-4">
						<select class="form-select" name="dentistNameSL" id="dentistNameSL" disabled>
							<option value='<?php echo $rows['practitionerNumber'];?>'><?php echo $rows['fullName'];?></option>
						</select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Date:</label>
						<div class="col-lg-4">
						  <input type="date" class="form-control" name="datePicker" id="datePicker" oninput="getTimings(this.value)" min="<?php echo date('Y-m-d'); ?>">
						  	<div class="errorMessage">
								<?php echo $dateError;?>
							</div>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Time Slot:</label>
						<div class="col-lg-4">
						  <select class="form-select" name="timeSlotSL" id="timeSlotSL">
						    <option value="placeholder"> </option>
						  </select>
						  	<div class="errorMessage">
								<?php echo $timeSlotError;?>
							</div>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Reason:</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" name="reasonTB" id="reasonTB" value="<?php echo $rows['reason'];?>">
						  <div class="errorMessage">
							<?php echo $reasonError;?>
						  </div>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label class="col-lg-1 col-form-label" for="emailReminderCB">Receive email reminder:</label>
						<div class="col-lg-4">
							<input class="form-check-input" type="checkbox" value="" id="emailReminderCB" checked>
						</div>
					  </div>
					  <div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Confirm</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>