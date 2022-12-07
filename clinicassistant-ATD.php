<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Appointment Treatment Details</title>
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
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-Billing.php">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Logout</a>
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
				header("Location:clinicassistant-AppointmentList.php");
			}
		?>
<body>
<div class="registrationBoxPatient container">
	<form method="POST">
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
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> 20/11/2022 </td>
								<td> 15:00 </td>
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
					<form class="row justify-content-center align-items-center">
					<div class="row col-6 align-items-center py-2">
						<label for="dentistSL" class="col-2 col-form-label">Dentist:</label>
						<div class="col-6">
						  <select class="form-select" name="dentistSL" id="dentistSL">
						    <option value="plceaholder">Dr. John Tan</option>
							<option value="plceaholder">Dr. Kimberley Wexler</option>
							<option value="plceaholder">Dr. Andy Ruiz</option>
						  </select>
						</div>
					</div>
					<div class="row col-6 align-items-center py-2">
						<label for="assistantSL" class="col-3 col-form-label">Assistant(s):</label>
						<div class="col-9">
						  <select class="form-select" name="assistantSL" id="assistantSL" size="2" multiple>
						    <option value="plceaholder">Jacob Lee</option>
							<option value="plceaholder">John Adams</option>
							<option value="plceaholder">Michelle Lee</option>
						  </select>
						</div>
					</div>
					<div class="row col-12  py-2">
						<label for="remarksTA" class="col-1 col-form-label">Remarks:</label>
						<div class="col-10">
							<textarea class="form-control" aria-label="With textarea" id="remarksTA"></textarea>
						</div>
					</div>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" name="back" value="back">Back</button>
					</div>
					</form>
				</div>
			</div>
		</form>
		</div>
</body>
</html>