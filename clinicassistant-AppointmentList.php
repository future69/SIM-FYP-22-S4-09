<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>clinic Assistant Appointment List</title>
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
                        <a class="nav-link active" aria-current="page" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-Billing.php">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="clinicassistant-PersonalProfile.php">Welcome Clinic Assistant Sam</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
	<?php 
			if (isset($_POST['createNewEmployee'])) {
				header("Location:clinicAdminCreateEmployee.php");
			}
			else if (isset($_POST['createNewPatient'])) {
				header("Location:clinicAdminCreatePatient.php");
			}
			else if (isset($_POST['bookAppointment'])) {
				header("Location:clinicassistant-CreateAppointment.php");
			}
		?>
<body>
<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-5">
				<div class="col-12 text-start">
					<div class="display-5">Appointments</div>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="row">
					<form class="row col-8 justify-content-start align-items-center" method="POST">
						<label for="searchClinicName" class="row col-2 col-form-label"><h4>Search :</h4></label>
							<div class="row col-6">
								<input type="text" class="row col-3 form-control" id="searchClinicName" placeholder="Name or NRIC">
							</div>
					</form>
					<div class="col-4 text-end display-6 pb-3">
						<form class="justify-content-end align-items-end" method="POST">
							<button type="submit" class="btn btn-warning" name="bookAppointment">Book Appointment</button>
						</form>
					</div>
					<div class="row py-3">
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrent" checked>
						  <label class="form-check-label" for="flexRadioDefaultCurrent"><strong>Current Appointments</strong></label>
						</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPast">
						  <label class="form-check-label" for="flexRadioDefaultPast"><strong>Past Appointments</strong></label>
						</div>
					</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Phone Number</th>
								<th scope="col">Reason</th>
								<th scope="col">Action</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> name1 </td>
								<td> S2234567C </td>
								<td> 20/11/2022 </td>
								<td> 15:00 </td>
								<td> 12345678 </td>
								<td> Dirty teeth </td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='clinicassistant-UpdateAppointment.php'">Update Appointment</button>
								<button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
								</td>
							</tr>
							<tr>
								<td> name2 </td>
								<td> S5847913C </td>
								<td> 23/11/2022 </td>
								<td> 17:00 </td>
								<td> 12345678 </td>
								<td> Toothache in molar </td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='clinicassistant-UpdateAppointment.php'">Update Appointment</button>
								<button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
								</td>
							</tr>
							<tr>
								<td> name3 </td>
								<td> S8825463G </td>
								<td> 20/12/2022 </td>
								<td> 20:00 </td>
								<td> 12345678 </td>
								<td> Bad breath </td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='clinicassistant-UpdateAppointment.php'">Update Appointment</button>
								<button type="submit" class="btn btn-danger" name="deleteAppt">Delete Appointment</button>
								</td>
							</tr>
							<tr>
								<td> name3(past appointment) </td>
								<td> S8825463G </td>
								<td> 10/12/2022 </td>
								<td> 20:00 </td>
								<td> 12345678 </td>
								<td class="overflow-auto"> smelly breath and dirty teeth</td>
								<td>
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='clinicassistant-ATD.php'">View Appointment Treatment Details</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</body>
</html>