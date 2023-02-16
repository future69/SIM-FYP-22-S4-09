<?php
session_start();
$ppFullName = $_SESSION['patientFullname'];
$patientNric = $_SESSION['patientNric'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script>
		//AJAX function for onclick feature (Get timing)
		function setBillStatus(billStatus){
            //Get apptID followed by bill status, etc S9999999G1, paid
            //Proceed to split them and assign them to different variables
            const billArray = billStatus.split(",");
            var apptID = billArray[0];
            var billStatus = billArray[1];
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200){
				}
			};
			xmlhttp.open("GET", "potentialPatientBillsAjax.php?q=" + apptID + "&w=" + billStatus, true);
			xmlhttp.send();

		}
    </script>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
					<img
					class="d-inline-block align-top"
					src="images/superDentalLogo.png"
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
								<a class="nav-link" href="#">Welcome <?php echo $ppFullName ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Logout</a>
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
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultCurrentBills" value="unpaid" checked>
					  <label class="form-check-label" for="flexRadioDefaultCurrentBills"><strong>Current Bills</strong></label>
					</div>
					<div class="col-2 form-check pb-2">
					  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultPastBills" value="paid">
					  <label class="form-check-label" for="flexRadioDefaultPastBills"><strong>Past Bills</strong></label>
					</div>
				</div>
				<input type="hidden" id="patientNric" value="<?php echo $patientNric; ?>" />
		<div id="result"></div>
		<script>
			$(document).ready(function() {	

				let billStatus = $('input[type="radio"]:checked').val();
				let patientNric = $('#patientNric').val();

				load_data(billStatus,patientNric);

				function load_data(billStatus) {
					$.ajax({
						url: "potentialPatientBillsJQuery.php",
						method: "POST",
						data: {
							billStatus: billStatus,
							patientNric: patientNric
						},
						success: function(data) {
							$('#result').html(data);
						}
					});
				}
				// This is for radio button (Appointment Status)
				$('input[type="radio"]').change(function() {
					billStatus = $('input[type="radio"]:checked').val();
					let patientNric = $('patientNric').val();

					load_data(billStatus,patientNric);
				});
			});
		</script>
	</body>
</html>