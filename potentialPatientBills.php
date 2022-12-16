<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
					width="50" height="40"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepageAftLogin.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientView&SearchAppointment.php">View Appointment(s)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientBookAppointment.php">Book Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientView&SearchClinic.php">Clinics</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="potentialPatientBills.php">Bills</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientProfile.php">Profile</a>
							</li>
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
			<div class="column">
				<div class="col-md-5 text-start pt-5">
					<div class="display-6">View Bills</div>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="row">
					<div class="col-12 display-6 pb-3">List of bill(s)</div>
					<div class="col-2 form-check">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrentBills" checked>
					  <label class="form-check-label" for="flexRadioDefaultCurrentBills"><strong>Current Bills</strong></label>
					</div>
					<div class="col-2 form-check pb-2">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPastBills">
					  <label class="form-check-label" for="flexRadioDefaultPastBills"><strong>Past Bills</strong></label>
					</div>
					<table class="table table-hover table-secondary table-striped">
						<thead>
							<tr>
								<th scope="col">Amount Owed</th>
								<th scope="col">Clinic Name</th>
								<th scope="col">Date</th>
								<th scope="col">Service Provided</th>
								<th scope="col">Description</th>
								<th scope="col">Status (Paid/Unpaid)</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> $100 </td>
								<td> Lim's Clinic </td>
								<td> 28/7/22 </td>
								<td> Fillings, Polishing </td>
								<td> Nil </td>
								<td> Unpaid </td>
							</tr>
							<tr>
								<td> $200 </td>
								<td> Lim's Clinic </td>
								<td> 08/04/22 </td>
								<td> Extraction </td>
								<td> Nil </td>
								<td> Unpaid </td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>