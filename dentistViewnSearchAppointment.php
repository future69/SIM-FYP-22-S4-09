<?php 
	// Set session variables from login
	session_start();
	$dentistFullname = $_SESSION['dentistFullname'];
	$dentistPracNum = $_SESSION['dentistPracNum'];

	// set current date and time of query
	date_default_timezone_set("Singapore");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
								<a class="nav-link" href="dentistHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active"  aria-current="page" href="dentistViewnSearchAppointment.php">Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  href="dentistSearchPatient.php">Patient</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewService.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
						<li class="nav-item">
								<a class="nav-link" href="#">Welcome <?php echo $dentistFullName ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  href="dentistPersonalProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
        </nav>
	</header>
        <?php 
			if (isset($_POST['bookAppointment'])) {
				header("Location:dentistCreateAppointment.php");
			}
		?>
        <body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-3">
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
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrent" value="flexRadioDefaultUpcoming" checked>
						  <label class="form-check-label" for="flexRadioDefaultCurrent"><strong>Current Appointments</strong></label>
						</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPast" value="flexRadioDefaultPast">
						  <label class="form-check-label" for="flexRadioDefaultPast"><strong>Past Appointments</strong></label>
						</div>
					</div>
					<div id="result"></div>
					<!-- <table class="table table-hover table-secondary table-striped ">
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
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='dentistUpdateAppointment.php'">Update Appointment</button>
								<a class="btn btn-danger"  href="dentistViewnSearchAppointment.php"  onclick="alert('Appointment Deleted!')">Delete Appointment</a>
								<button type="submit" class="btn btn-success mt-2" name="CreateATD" onclick="location.href='dentistCreateATD.php'">Update Appointment Treatment Details</button>
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
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='dentistUpdateAppointment.php'">Update Appointment</button>
								<a class="btn btn-danger"  href="dentistViewnSearchAppointment.php"  onclick="alert('Appointment Deleted!')">Delete Appointment</a>
								<button type="submit" class="btn btn-success mt-2" name="CreateATD" onclick="location.href='dentistCreateATD.php'">Update Appointment Treatment Details</button>
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
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='dentistUpdateAppointment.php'">Update Appointment</button>
								<a class="btn btn-danger"  href="dentistViewnSearchAppointment.php"  onclick="alert('Appointment Deleted!')">Delete Appointment</a>
								<button type="submit" class="btn btn-success mt-2" name="CreateATD" onclick="location.href='dentistCreateATD.php'">Update Appointment Treatment Details</button>
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
								<button type="submit" class="btn btn-primary" name="updateAppt" onclick="location.href='dentistViewATD.php'">View Appointment Treatment Details</button>
								</td>
							</tr>
						</tbody>
					</table> -->
					<script>
						$(document).ready(function() {	
							// Default value for each field
							let search = $('#searchClinicName').val();
							let apptStatus = $('input[type="radio"]:checked').val();
							load_data(search, apptStatus);

							function load_data(search_text, apptStatus) {
								$.ajax({
									url: "den-apptFilter.php",
									method: "POST",
									data: {
										search_text: search_text,
										apptStatus: apptStatus
									},
									success: function(data) {
										$('#result').html(data);
									}
								});
							}

							// This is for clinic name search box (Clinic name)
							$('#searchClinicName').keyup(function() {
								search = $(this).val();

								load_data(search, apptStatus);
							});

							// This is for radio button (Appointment Status)
							$('input[type="radio"]').change(function() {
								apptStatus = $('input[type="radio"]:checked').val();

								load_data(search, apptStatus);
							});		
						});
					</script>
				</div>
			</div>
		</div>
</body>
</html>