<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<script>
	//AJAX function for onclick feature (get dentist from a selected clinic, also calls getTimings function)
	function getDentists(inputClinicName){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				//If user clicks the blank space
				if (inputClinicName == "placeholder"){
					var theDentistSL = document.getElementById("dentistNameSL"); 
					var theTimeSL = document.getElementById("timeSlotSL"); 
					theDentistSL.innerHTML = "";
					theTimeSL.innerHTML = "";
				}
				if (this.readyState == 4 && this.status == 200){
					var parts = JSON.parse(xmlhttp.responseText);
					//console.log(parts[0]['fullName']);
					var theDentistSL = document.getElementById("dentistNameSL"); 
					//Clear all existing options first
					theDentistSL.innerHTML = "";
					console.log(parts);
					// Populate list with options:
					for(var i = 0; i < parts.length; i++) {
						var dPracNum = parts[i]['practitionerNumber'];
						var dName = parts[i]['fullName'];
						theDentistSL.innerHTML += "<option value='" + dPracNum + "'>" + 'Dr. ' + dName + "</option>";
					}
				}
			};
			xmlhttp.open("GET", "potentialPatientBookAppointmentAjax.php?q=" + inputClinicName, true);
			xmlhttp.send();
	}

	//AJAX function for onclick feature (Get timing)
	function getTimings(selectedDate){
			var inputClinicName = document.getElementById("clinicNameSL").value;
			console.log(selectedDate);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200){
					var parts = JSON.parse(xmlhttp.responseText);
					console.log(parts);
					//Got an object from the php file instead, so needed to convert it into an array
					var parts = Object.keys(parts).map((key) => [ parts[key]]);
					var theTimeSL = document.getElementById("timeSlotSL"); 
					theTimeSL.innerHTML = "";

					//Populate list with options:
					for(var i = 0; i < parts.length; i++) {
						var timings = parts[i];
						console.log(typeof timings);
						theTimeSL.innerHTML += "<option value='" + timings + "'>" + timings + "</option>";
					};
				}
			};
			xmlhttp.open("GET", "potentialPatientBookAppointmentAjaxTiming.php?q=" + inputClinicName + "&w=" + selectedDate, true);
			xmlhttp.send();
	}
	</script>
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
						<a class="nav-link" aria-current="page" href="potentialPatientHomepageAftLogin.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientView&SearchAppointment.php">View Appointment(s)</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="potentialPatientBookAppointment.php">Book Appointment</a>
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
			<?php
			//Set session variables from login
			$patientUsername = $_SESSION["patientUsername"];
			$patientFullname = $_SESSION["patientFullname"];
			$patientNric = $_SESSION["patientNric"];

			$errorMessage = "";
			try {
				//Load the list of clinics
				$DBName = "dentalhealthapplicationdb";
				$conn = mysqli_connect("localhost", "root", "", $DBName);
				//Name of the table 
				$TableNameClinic = "clinic";
				$SQLstring = "SELECT * FROM $TableNameClinic WHERE clinicStatus='approved'";
				//Executing the sql
				$queryResultListOfClinics = mysqli_query($conn, $SQLstring);

			} catch (mysqli_sql_exception $e) {
				echo "Error";
			}
			try {
				// Another query to retrieve lists of clinics
				$SQLstring3 = "SELECT * FROM $TableNameClinic WHERE clinicStatus='approved'";
				$queryResultSample = mysqli_query($conn, $SQLstring3);
				$theClinics = mysqli_fetch_assoc($queryResultSample);
				$theFirstClinic = $theClinics['clinicName'];

				//Load list of dentists in each clinic
				$TableNameDentistProfile = "dentistprofile";
				$TableNameUseraccounts = "useraccount";
				//The lines to run in sql (getting all records that match patient nric from session)
				$SQLstring2 = "SELECT * FROM $TableNameDentistProfile INNER JOIN $TableNameUseraccounts ON dentistprofile.nric = useraccount.nric WHERE dentistprofile.clinicName = '" . $theFirstClinic . "'";
				$queryResultListOfDentists = mysqli_query($conn, $SQLstring2);

			} catch (mysqli_sql_exception $e) {
				echo "Error";
			}
			if (isset($_POST['submit'])) {
				$clinicName = $_POST['clinicNameSL'];

				if ($clinicName != 'placeholder'){
					$dentistName = $_POST['dentistNameSL'];
					$date = $_POST['datePicker'];
					$timeSlot = $_POST['timeSlotSL'];
					$reason = $_POST['reasonTB'];

					
				}

				else {
					$errorMessage = "Please input all values";
				}
				
			} 
			else if (isset($_POST['back'])) {
				header("Location:potentialPatientHomepageAftLogin.php");
			}
			?>
</header>

<body>
	<div class="registrationBoxPatient container">
		<div class="row justify-content-center align-items-center">
			<form method="POST">
				<div class="row justify-content-center ps-5">
					<div class="col-4">
						<h1>Book appointment</h1>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Name:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="usernameTB" value="<?php echo $patientFullname; ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="passwordTB" value="<?php echo $patientNric; ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="clinicNameSL" class="col-lg-1 col-form-label">Clinic Name:</label>
					<div class="col-lg-4">
						<select class="form-select" name="clinicNameSL" id="clinicNameSL" onclick="getDentists(this.value)">
							<option value='placeholder'> </option>
							<?php
							while ($listOfClinics = mysqli_fetch_assoc($queryResultListOfClinics)) {
							?>
								<option value="<?php echo $listOfClinics['clinicName']; ?>"><?php echo $listOfClinics['clinicName']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="dentistNameSL" class="col-lg-1 col-form-label">Dentist Name:</label>
					<div class="col-lg-4">
						<select class="form-select" name="dentistNameSL" id="dentistNameSL">
						<option value='placeholder'> </option>
						</select>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Date:</label>
					<div class="col-lg-4">
						<input type="date" class="form-control" name='datePicker' id="datePicker" oninput="getTimings(this.value)" min="<?php echo date('Y-m-d'); ?>">
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Time Slot:</label>
					<div class="col-lg-4">
						<select class="form-select" name="timeSlotSL" id="timeSlotSL">
						<option value='placeholder'> </option>
						</select>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="reasonTB" class="col-lg-1 col-form-label">Reason:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="reasonTB" id="reasonTB">
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