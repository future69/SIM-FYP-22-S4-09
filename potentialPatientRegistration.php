<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
		<nav>
		<?php 
			if (isset($_POST['submit'])) {
				echo '<script>alert("Account created!")</script>';
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
							<h1>Patient Registration</h1>
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
						<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">DOB:</label>
						<div class="col-lg-4">
							<input type="date" class="form-control" id="datePicker">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Address:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Gender:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select gender" name="clinicNameSL" id="clinicNameSL">
								<option value="plceaholder">Male</option>
								<option value="plceaholder">Female</option>
								<option value="plceaholder">Others</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="allergiesTB" class="col-lg-1 col-form-label">Allergies:</label>
						<div class="col-lg-4">
						  	<input class="form-control" id="allergiesTB" aria-describedby="button-addon1" placeholder="insulin, paracetamol, etc.">
						</div>
					  </div>
					  <div class="input-group col-4 justify-content-center align-items-center py-2">
					  <label for="familyTB" class="col-lg-1 col-form-label">Family Members:</label>
					 	<div class="col-3 align-items-center">
							<input type="text" class="form-control" placeholder="Family Member (NRIC)">
						</div>
						<div class="input-group-prepend ps-2">
							<button class="btn btn-primary" type="button">+</button>
						</div>
						
					  </div>
						<div class="row justify-content-center align-items-center g-recaptcha" data-sitekey="6LcZnF0jAAAAAMSnSnEJF4o3T4K9QWsM29jnFUJQ"></div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Confirm</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>