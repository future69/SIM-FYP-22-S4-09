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
								<a class="nav-link active" aria-current="page" href="dentistHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistSearchPatient.php">Patient</a>
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
								<a class="nav-link active" aria-current="page" href="dentistPersonalProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Logout</a>
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
			<div class="column">
				<div class="col-md-5 text-start pt-5">
					<div class="display-6">Welcome Dr. Lee</div>
				</div>
				<div class="col-md-5 text-start pt-4">
					<h5>You have <strong>3</strong> appointments today</h5>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Today's appointments (28/11/2022)</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Patient Name</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> Long Tai Wat </td>
								<td> 28/11/2022 </td>
								<td> 14:30 </td>
							</tr>
							<tr>
								<td> Paddy Lee </td>
								<td> 28/11/2022 </td>
								<td> 15:30 </td>
							</tr>
							<tr>
								<td> Lim's Surgery </td>
								<td> 28/11/2022 </td>
								<td> 17:30 </td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>