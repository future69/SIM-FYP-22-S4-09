<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
					width="50" height="50"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="superadminHomepage.php">Home</a>
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
							<li class="nav-item">
								<a class="nav-link" href="superadminViewServices.php">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="superadminClinicAccountApplication.php">Application</a>
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
		<nav>
	</header>
	<body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-5">
				<div class="col-md-5 text-center text-md-start">
					<!--original spot-->
					<!--<div class="display-6">Welcome Super Admin</div>-->
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6">Welcome Super Admin</div>
					<div class="display-6 pb-3">Current clinic admin applications</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Username</th>
								<th scope="col">Status</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> <a href="#" class="link-primary"> kennethTheGoat234 </a></td>
								<td> 
									<div class="btn-group dropend">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
										To be reviewed
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="#">Approve</a></li>
										<li><a class="dropdown-item" href="#">Reject</a></li>
									  </ul>
									</div>
								</td>
							</tr>
							<tr>
								<td> <a href="#" class="link-primary"> turtleBoy232 </a></td>
								<td>
									<div class="btn-group dropend">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
										To be reviewed
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
										<li><a class="dropdown-item" href="#">Approve</a></li>
										<li><a class="dropdown-item" href="#">Reject</a></li>
									  </ul>
									</div>
								</td>
							</tr>
							<tr>
								<td> <a href="#" class="link-primary"> lohkintat22 </a></td>
								<td>
									<div class="btn-group dropend">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
										To be reviewed
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
										<li><a class="dropdown-item" href="#">Approve</a></li>
										<li><a class="dropdown-item" href="#">Reject</a></li>
									  </ul>
									</div>
								</td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>