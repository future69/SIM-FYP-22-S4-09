<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
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
								<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		<nav>
		<?php 
			if (isset($_POST['submit'])) {
				
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
						  <input type="text" class="form-control" id="usernameTB" placeholder="John De Jesus Doe" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="passwordTB" placeholder="S1234567G" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="clinicNameSL" class="col-lg-1 col-form-label">Clinic Name:</label>
						<div class="col-lg-4">
						  <select class="form-select" name="clinicNameSL" id="clinicNameSL">
						    <option value="plceaholder">Lim's Clinic</option>
							<option value="plceaholder">Joe's Surgery</option>
							<option value="plceaholder">Tan Tock Seng Hospital</option>
						  </select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="dentistNameSL" class="col-lg-1 col-form-label">Dentist Name:</label>
						<div class="col-lg-4">
						  <select class="form-select" name="clinicNameSL" id="dentistNameSL">
						    <option value="plceaholder">Dr. Dick Tan</option>
							<option value="plceaholder">Dr. Chloe Tay</option>
						  </select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Date:</label>
						<div class="col-lg-4">
						  <input type="date" class="form-control" id="datePicker">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Time Slot:</label>
						<div class="col-lg-4">
						  <select class="form-select" name="timeSlotSL" id="timeSlotSL">
						    <option value="plceaholder">8:00</option>
							<option value="plceaholder">9:00</option>
							<option value="plceaholder">10:00</option>
						  </select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Reason:</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label class="col-lg-1 col-form-label" for="emailReminderCB">Receive email reminder:</label>
						<div class="col-lg-4">
							<input class="form-check-input" type="checkbox" value="" id="emailReminderCB" checked>
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Confirm</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>