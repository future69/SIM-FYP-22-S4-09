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
								<a class="nav-link" aria-current="page" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientAboutUs.php">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientOurPartners.php">Our Partners</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientForPatients.php">For Patients</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientForClinics.php">For Clinics</a>
							</li>

						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="homepageRegisterAs.php">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientLogin.php">Login</a>
							</li>
						</ul>
					</div>
				</div>
		<nav>
		<?php 
			if (isset($_POST['patientRegis'])) {
				header("Location:potentialPatientRegistration.php");
			}
			else if (isset($_POST['clinicRegis'])) {
				header("Location:clinicAdminRegistration.php");
			}
		?>
	</header>
	<body>
		<div class="container-lg">
			<div class="row justify-content-center align-items-center">
				<div class="row display-5 justify-content-center pt-5">Register As</div>
				<form method="POST">
					 <div class="d-grid gap-2 d-md-flex justify-content-md-center py-5">
						<button type="submit" class="btn btn-primary" name="patientRegis" value="submit">Patient</button>
						<button type="submit" class="btn btn-danger" name="clinicRegis" value="submit">Clinic</button>
					 </div>
				</form>
			</div>
		</div>
	</body>
</html>