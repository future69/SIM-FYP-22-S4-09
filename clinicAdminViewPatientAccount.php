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
					src="images/superDentalLogo.png"
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
								<a class="nav-link" href="clinicAdminAppointments.php">Appointments</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminServices.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<span class="navbar-brand text-center">Toa Payoh Dental</span>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		</nav>
		<?php 

			if (isset($_POST['back'])) {
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
							<h1>View Patient Account</h1>
						</div>
					</div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
						<div class="col-lg-4">
						  <input type="password" class="form-control" id="passwordTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="fullnameTB" class="col-lg-1 col-form-label">Full name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="fullnameTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="genderSL" class="col-lg-1 col-form-label">Gender:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select gender" name="genderSL"disabled >
								<option value="plceaholder">Male</option>
								<option value="plceaholder">Female</option>
								<option value="plceaholder">Others</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="nricTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="nricTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="emailTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input type="email" class="form-control" id="emailTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="phoneNumTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="dobTB" class="col-lg-1 col-form-label">DOB:</label>
						<div class="col-lg-4">
							<input type="date" class="form-control" id="dobTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="clinicAddress" class="col-lg-1 col-form-label">Address:</label>
						<div class="col-lg-4">
							<input class="form-control" id="clinicAddress" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="postalCodeTB" class="col-lg-1 col-form-label">Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="postalCodeTB" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="formFileMedicalHistory" class="col-1 col-form-label">Medical history:</label>
						<div class="col-lg-4">
							<input class="form-control" type="file" id="formFileMedicalHistory" multiple disabled>	
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>
</html>