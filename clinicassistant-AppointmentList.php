<?php
session_start();
$clinicAssistantFullname = $_SESSION['clinicAssistantFullname'];
$clinicAssistantClinicName = $_SESSION['clinicAssistantClinicName'];

//echo $clinicAssistantFullname;
//echo $clinicAssistantClinicName;
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<title>clinic Assistant Appointment List</title>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
				DiamondDental™
			</a>
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="ClinicAssistant-HomePage.php">Home</a>
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
						<a class="nav-link" href="clinicassistant-bills.php">Billing</a>
					</li>
				</ul>
				<ul class="navbar-nav d-flex mb-2 mb-md-0">
					<li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant <?php echo $clinicAssistantFullname ?></a>
					</li>
					<li class="nav-item d-flex">
						<a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
					</li>
					<li class="nav-item d-flex">
						<a class="nav-link" href="index.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<?php
	// $servername = "u418115598_dentalapp";
	// //Name of the table 

	// $clinicName = $_SESSION['clinicAssistantClinicName'];
	// $TableNameAppointment = "appointment";
	// $TableNameClinic = "clinic";
	// $TableNameUseraccount = "useraccount";
	// $con = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $servername) or die("Connection Failed");

	// $SQLstring = "SELECT * FROM $TableNameAppointment 
	// INNER JOIN $TableNameClinic 
	// ON appointment.clinicName = clinic.clinicName 
	// INNER JOIN $TableNameUseraccount 
	// ON appointment.nric = useraccount.nric 
	// WHERE clinic.clinicName = '" . $clinicName . "'";
	// $result = mysqli_query($con, $SQLstring);

	// if (isset($_GET['apptID'])) {
	// echo $_GET['apptID'];
	//if the above is able to get the ApptID uncomment the 3 rows below.
	// $deleteID = $_GET['apptID'];
	// $deleteSQL = "DELETE from appointment WHERE apptID = $deleteID";
	// $deleteQuery = mysqli_query($con, $deleteSQL);
	//} 

	//else if (isset($_POST['updateAppt'])) {
	// 	header("Location:clinicassistant-UpdateAppointment.php");
	// } else if (isset($_POST['CreateATD'])) {
	// 	header("Location:clinicassistant-ATD.php");
	// } else if (isset($_POST['bookAppointment'])) {
	// 	header("Location:clinicassistant-CreateAppointment.php");
	// }
	?>
</header>

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
						<input type="text" class="row col-3 form-control" name="apptSearch" id="searchClinicName" placeholder="Name or NRIC">
					</div>
				</form>
				<div class="col-4 text-end display-6 pb-3">
					<button type="submit" class="btn btn-warning" name="bookAppointment" onclick="location.href='clinicassistant-CreateAppointment.php'">Book Appointment</button>
				</div>
				<div class="row py-3">
					<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrent" value="flexRadioDefaultUpcoming" checked>
						  <label class="form-check-label" for="flexRadioDefaultCurrent"><strong>Current Appointments</strong></label>
					</div>
					<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPast" value="flexRadioDefaultPast" >
						  <label class="form-check-label" for="flexRadioDefaultPast"><strong>Past Appointments</strong></label>
					</div>
				</div>
				<div id="result"></div>

				<script>
						$(document).ready(function() {	
							// Default value for each field
							let search = $('#searchClinicName').val();
							let apptStatus = $('input[type="radio"]:checked').val();
							load_data(search, apptStatus);

							function load_data(search_text, apptStatus) {
								$.ajax({
									url: "casst-apptFilter.php",
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
</body>

</html>