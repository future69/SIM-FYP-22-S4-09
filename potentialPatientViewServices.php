<?php
session_start();
ob_start();
$ppFullName = $_SESSION['patientFullname'];
if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == ''){
    header("Location:index.php");
    die();
}
?>

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
								<a class="nav-link"  href="potentialPatientBills.php">Bills</a>
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
				</div>
		<nav>
	<?php
	try{
		$acra = $_GET['acra'];
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName);

		//Table name
		$TableNameUserAccount = "useraccount";
		$TableNameClinic = "clinic";
		$TableNameDentist = "dentistprofile";

		$SQLstring = "SELECT * FROM $TableNameClinic WHERE acraNum = '". $acra ."'";
		$queryResult = mysqli_query($conn, $SQLstring);
		$row = mysqli_fetch_assoc($queryResult);

		//Get clinic name
		$clinicName = $row['clinicName'];
		//Get all dentists under the clinic
		$SQLstringDentist = "SELECT * FROM $TableNameDentist
		INNER JOIN $TableNameUserAccount ON dentistprofile.nric = useraccount.nric 
		WHERE clinicName = '". $clinicName ."'";

		$queryResultDentist = mysqli_query($conn, $SQLstringDentist);
		$allDentists = "";
		//Loop all dentists into a string to be displayed
		while ($rowDentist = mysqli_fetch_assoc($queryResultDentist)){
			$allDentists .=  "Dr. " . $rowDentist['fullName'] . " , ";
		}

	}catch (mysqli_sql_exception $e) {
		echo "Error";
	}
	//Declare error messages
	$passwordError = $phoneNumError = $emailError = $addressError = $postalCodeError = null;
	$errorMessage = null;

	if (isset($_POST['backBth'])) {
		header("Location:potentialPatientView&SearchClinic.php");
	} else if (isset($_POST['bookBth'])) {
		header("Location:potentialPatientBookAppointment.php");
	}

	?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center">
						<div class="row col-3">
							<h1>Clinic Details</h1>
						</div>
					</div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Name of Clinic:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="<?php echo $clinicName;?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Location:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $row['clinicAddress'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label" >Operating hours:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="<?php echo $row['clinicOpeningHour'] . "-"; echo $row['clinicClosingHour'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Dentist(s):</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $allDentists;?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Services Offered:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="<?php echo $row['servicesSelected'];?>" disabled>
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="backBth" value="back">Back</button>
						<button class="btn btn-primary" name="bookBth" value="book">Book Appointment</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>