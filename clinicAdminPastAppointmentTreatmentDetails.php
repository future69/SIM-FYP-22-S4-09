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
								<a class="nav-link"  href="clinicAdminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminUserAccounts.php">User Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="clinicAdminAppointments.php">Appointment(s)</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminServices.php">Services</a>
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
		</nav>
		<?php 
			if (isset($_POST['submit'])) {
				echo '<script>alert("Appointment updated!")</script>';
			}
			else if (isset($_POST['back'])) {
				header("Location:clinicAdminAppointments.php");
			}
		?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<div class="row col-12 text-center pb-5">
					<div class="display-6">Appointment treatment details for name3</div>
				</div>
				<div class="row col-7">
					<table class="table caption-top table-hover table-secondary table-striped ">
					<caption>Appointment Details</caption>
						<thead>
							<tr>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Service(s)</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> 20/11/2022 </td>
								<td> 15:00 </td>
								<td> Polishing, Fillings </td>
							</tr>
						</tbody>
					</table>
					<table class="table caption-top table-hover table-secondary table-striped ">
					<caption>Patient Details</caption>
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">Age</th>
								<th scope="col">Gender</th>
								<th scope="col">Medical History</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> name3 </td>
								<td> S2234567C </td>
								<td> 34 </td>
								<td> Male </td>
								<td><button type="submit" class="btn btn-primary" name="downloadFile">Download</button></td>
							</tr>
						</tbody>
					</table>
					<form method="POST" class="row justify-content-center align-items-center">
					<div class="row col-6 align-items-center py-2">
						<label for="dentistTB" class="col-2 col-form-label">Dentist:</label>
						<div class="col-6">
							<input type="text" class="form-control" id="dentistTB" value="Dr. John Tan" disabled>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="assistantTB" class="col-3 col-form-label">Assistant(s):</label>
						<div class="col-9">
							<input type="text" class="form-control" id="assistantTB" value="Cory Lee, Michelle Yeo" disabled>
						</div>
					</div>
					<div class="row col-12  py-2">
						<label for="remarksTA" class="col-1 col-form-label">Remarks:</label>
						<div class="col-10">
							<textarea class="form-control" aria-label="With textarea" id="remarksTA" disabled> Polishing went as usual. Filling involved back 4 molars. </textarea>
						</div>
					</div>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" name="back" value="back">Back</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>