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
								<a class="nav-link active" aria-current="page" href="clinicAdminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">User Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">View User Appointment(s)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Services</a>
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
					<div class="display-6">Welcome Toa Payoh Dental</div>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Employee Account(s) Status</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">Role</th>
								<th scope="col">Status</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> Kenneth Toh </td>
								<td> S6523836H </td>
								<td> Clinic Assistant </td>
								<td> Active </td>
							</tr>
							<tr>
								<td> Christian Dior </td>
								<td> S1234567C </td>
								<td> Clinic Assistant </td>
								<td> Suspended </td>
							</tr>
							<tr>
								<td> Michael Myers </td>
								<td> S3334567C </td>
								<td> Dentist </td>
								<td> Active </td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>