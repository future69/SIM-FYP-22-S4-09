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
								<a class="nav-link" href="clinicAdminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="clinicAdminUserAccounts.php">User Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminAppointments.php">Appointment(s)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminServices.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		</nav>
		<?php 
			if (isset($_POST['submit'])) {
				echo '<script>alert("Account created!")</script>';
			}
			else if (isset($_POST['back'])) {
				header("Location:clinicAdminUserAccounts.php");
			}
		?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-5">
							<h1>Create Employee Account</h1>
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
						<label for="fullnameTB" class="col-lg-1 col-form-label">Full name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="fullnameTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="genderSL" class="col-lg-1 col-form-label">Gender:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select gender" name="genderSL">
								<option value="plceaholder">Male</option>
								<option value="plceaholder">Female</option>
								<option value="plceaholder">Others</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="nricTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="nricTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input type="email" class="form-control" id="emailTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="phoneNumTB">
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
						<label for="roleSL" class="col-lg-1 col-form-label">Role:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select role" name="roleSL">
								<option value="plceaholder">Clinic Assistant</option>
								<option value="plceaholder">Dentist</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="formFileQualification" class="col-1 col-form-label">Qualifications:</label>
						<div class="col-lg-4">
							<input class="form-control" type="file" id="formFileQualification" multiple>	
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Practitioner Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="phoneNumberTB">
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>