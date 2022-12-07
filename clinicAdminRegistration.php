<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
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
								<a class="nav-link" href="potentialPatientHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Our Partners</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">For Patients</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">For Clinics</a>
							</li>

						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="potentialPatientRegistration.php">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientLogin.php">Login</a>
							</li>
						</ul>
					</div>
				</div>
		</nav>
		<?php 
			if (isset($_POST['submit'])) {
				echo '<script>alert("Application Received")</script>';
			}
			else if (isset($_POST['back'])) {
				header("Location:potentialPatientHomepage.php");
			}
		?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-4">
							<h1>Clinic Registration</h1>
						</div>
					</div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
						<div class="col-lg-4">
						  <input type="password" class="form-control" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Clinic Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="clinicNameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input type="email" class="form-control" id="emailTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Address:</label>
						<div class="col-lg-4">
							<input class="form-control" id="clinicAddress">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="postalCodeTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Area:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select area" name="clinicAreaSL" id="clinicAreaSL">
								<option value="plceaholder">North</option>
								<option value="plceaholder">South</option>
								<option value="plceaholder">East</option>
								<option value="plceaholder">West</option>
								<option value="plceaholder">Central</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="phoneNumberTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">ACRA:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="acraTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Dental Services:</label>
						<div class="col-lg-4">
							<select class="form-select" multiple aria-label="Select Services">
								<option selected>Select Multiple</option>
								<option value="1">Braces</option>
								<option value="2">Extraction</option>
								<option value="3">Fillings</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="clinicOpeningTime" class="col-1 col-form-label">Operating Hours:</label>
						<div class="col-2">
							<select class="form-select" class="form-select" aria-label="Opening" name="clinicOpeningTime" id="clinicOpeningTime">
								<option value="plceaholder">Opening Hour</option>
								<option value="plceaholder">08:00</option>
								<option value="plceaholder">08:30</option>
								<option value="plceaholder">09:00</option>
								<option value="plceaholder">09:30</option>
							</select>
						</div>
						<div class="col-2">
							<select class="form-select" class="form-select" aria-label="Closing" name="clinicClosingTime" id="clinicClosingTime">
								<option value="plceaholder">Closing Hour</option>
								<option value="plceaholder">18:30</option>
								<option value="plceaholder">19:00</option>
								<option value="plceaholder">19:30</option>
								<option value="plceaholder">20:00</option>
							</select>
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