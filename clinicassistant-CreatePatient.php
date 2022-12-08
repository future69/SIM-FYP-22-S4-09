<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Create Patient</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/superDentalLogo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                Diamond Dental
            </a>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-HomePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant Sam</a>
                    </li>
					<li class="nav-item d-flex">
                        <a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="potentialPatientLogin.php">Logout</a>
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
				header("Location:clinicassistant-PatientList.php");
			}
		?>
<body>
<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center border border-5 m-3">
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
						<label for="formFileMedicalHistory" class="col-1 col-form-label">Medical history:</label>
						<div class="col-lg-4">
							<input class="form-control" type="file" id="formFileMedicalHistory" multiple>	
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