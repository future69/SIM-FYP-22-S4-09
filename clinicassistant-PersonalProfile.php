<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Personal Profile</title>
</head>
<header>
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
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-bills.php">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant Sam</a>
                    </li>
					<li class="nav-item d-flex">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
	<?php 
			if (isset($_POST['back'])) {
				header("Location:clinicassistant-Homepage.php");
			}
		?>
</header>
    <body>
<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center border border-5 m-3">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-4">
							<h1>Personal Profile</h1>
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
						  <input type="password" class="form-control" value="12345678" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" disabled placeholder="John Doe" id="usernameTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" disabled placeholder="S12345678I" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB"  class="col-lg-1 col-form-label">Clinic Location:</label>
						<div class="col-lg-4">
						  <input class="form-control" disabled placeholder="St John Clinic" id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="87654321" disabled id="passwordTB">
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input class="form-control" placeholder="John@email.com" disabled id="usernameTB">
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