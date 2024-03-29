<?php
session_start();
if (empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == '') {
	header("Location:index.php");
	die();
}
?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>clinic Assistant Appointment List</title>
</head>

<?php
$clinicAssistantFullname = $_SESSION['clinicAssistantFullname'];
?>

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
					<a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="clinicassistant-bills.php">Billing</a>
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
if (isset($_POST['createNewEmployee'])) {
	header("Location:clinicAdminCreateEmployee.php");
} else if (isset($_POST['createNewPatient'])) {
	header("Location:clinicAdminCreatePatient.php");
} else if (isset($_POST['bookAppointment'])) {
	header("Location:clinicassistant-CreateAppointment.php");
}
?>

<body>
	<div class="container-lg">
		<!-- Put this div outside the center alignment, for the welcome message plus bills -->
		<!-- Tablehead can put caption-top -->
		<div class="row justify-content-center align-items-center pt-5">
			<div class="col-12 text-start">
				<div class="display-5">Billing</div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pt-5">
			<div class="row">
				<form class="row col-8 justify-content-start align-items-center" method="POST">
					<label for="searchClinicName" class="row col-2 col-form-label">
						<h4>Search :</h4>
					</label>
					<div class="row col-6">
						<input type="text" class="row col-3 form-control" id="searchClinicName" placeholder="Name or NRIC">
					</div>
				</form>

				<div id="result"></div>
				<script>
					$(document).ready(function() {
						// Default value for each field
						let search = $('#searchClinicName').val();
						load_data(search);

						function load_data(search_text) {
							$.ajax({
								url: "clinicassistant-billsJQuery.php",
								method: "POST",
								data: {
									search_text: search_text,
								},
								success: function(data) {
									$('#result').html(data);
								}
							});
						}

						// This is for user name/nric search box (name/nric)
						$('#searchClinicName').keyup(function() {
							search = $(this).val();

							load_data(search);
						});
					});
				</script>
			</div>
		</div>
	</div>
</body>

</html>