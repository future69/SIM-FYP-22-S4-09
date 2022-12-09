<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Dentist View Patient</title>
</head>
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
								<a class="nav-link" href="dentistHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active"  aria-current="page" href="dentistSearchPatient.php">Patient</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewService.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
						<li class="nav-item">
								<a class="nav-link" href="#">Welcome Dr. Lee</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistPersonalProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepage">Logout</a>
							</li>
						</ul>
					</div>
				</div>
        </nav>  

        <?php 
			if (isset($_POST['back'])) {
				header("Location:dentistSearchPatient.php");
			}
		?>
        <body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center border border-5 m-3">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-4">
							<h1>Patient Account</h1>
						</div>
					</div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="John" disabled id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
						<div class="col-lg-4">
						  <input type="password" placeholder="12345" class="form-control" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="John Doe" disabled id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="S12345678I" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">DOB:</label>
						<div class="col-lg-4">
							<input type="date" class="form-control" disabled id="datePicker">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Address:</label>
						<div class="col-lg-4">
						  <input class="form-control"  placeholder="11 Spring run" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="352467" disabled id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" disabled class="col-lg-1 col-form-label">Gender:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select gender" name="clinicNameSL"  disabled id="clinicNameSL">
								<option value="plceaholder">Male</option>
								<option value="plceaholder">Female</option>
								<option value="plceaholder">Others</option>
							</select>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="876543221" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="John@email.com" disabled id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="formFileMedicalHistory" class="col-1 col-form-label">Medical history:</label>
						<div class="col-lg-4">
							<button type="submit" class="btn btn-primary col-md-3" name="downloadFile">Download</button>	
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Return</button>
					  </div>
					</form>
				</div>
			</div>
</body>
</html>