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
								<a class="nav-link active" aria-current="page" href="potentialPatientView&SearchAppointment.php">View Appointment(s)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientBookAppointment">Book Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientView&SearchClinic.php">Clinics</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Bills</a>
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
			<div class="row">
				<div class="row col-4 text-start pt-5">
					<div class="display-6">View Appointment(s)</div>
				</div>
				<form class="row col-8 justify-content-end align-items-center pt-5" method="POST">
					<label for="searchClinicName" class="row col-2 col-form-label"><h4>Search :</h4></label>
						<div class="row col-6">
							<input type="text" class="row col-3 form-control" id="searchClinicName" placeholder="Clinic Name">
						</div>
						<div class="row col-2">
							<select class="form-select" name="timeSlotSL" id="timeSlotSL">
								<option value="plceaholder">All Dates</option>
								<option value="plceaholder">1 week</option>
								<option value="plceaholder">1 month</option>
								<option value="plceaholder">3 months</option>
								<option value="plceaholder">6 months</option>
								<option value="plceaholder">1 year</option>
							</select>
						</div>
				</form>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Your next appointments(s)</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Clinic Name</th>
								<th scope="col">Location</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Action</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> Charlie's Clinic </td>
								<td> Hougang Ave 7 567234 </td>
								<td> 28/7/22 </td>
								<td> 14:30 </td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='potentialPatientUpdateAppointment.php'">Update Appointment</button>
								<button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
								</td>
							</tr>
							<tr>
								<td> Mustard and Sons </td>
								<td> Tampines Hub 654234 </td>
								<td> 5/11/22 </td>
								<td> 17:30 </td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='potentialPatientUpdateAppointment.php'">Update Appointment</button>
								<button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
								</td>
							</tr>
							<tr>
								<td> Lim's Surgery </td>
								<td> Toa Payoh Lorong 7 543647 </td>
								<td> 22/4/23 </td>
								<td> 08:30 </td>
								<td>Appointments can only be updated/deleted <br> more than 2 days before the appointment</td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>