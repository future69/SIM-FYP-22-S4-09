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
								<a class="nav-link" href="potentialPatientRegistration.php">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="potentialPatientLogin.php">Login</a>
							</li>
						</ul>
					</div>
				</div>
		<nav>
		<?php 
			if (isset($_POST['submit'])) {
				header("Location:potentialPatientHomepageAftLogin.php?");
			}
		?>
	</header>
	<body>
		<div class="loginBox container d-flex justify-content-center align-items-center">
			<form method="POST">
				<h1>Patient Login</h1>
				  <div class="row mb-3">
					<label for="usernameTB" class="col-sm-4 col-form-label">Username : </label>
					<div class="col-sm-8">
					  <input class="form-control" id="usernameTB">
					</div>
				  </div>
				  <div class="row mb-3">
					<label for="passwordTB" class="col-sm-4 col-form-label">Password : </label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" id="passwordTB">
					</div>
				  </div>
				  <button type="submit" class="btn btn-primary align:right" name="submit">Confirm</button>
				</form>
			</div>
	</body>
</html>