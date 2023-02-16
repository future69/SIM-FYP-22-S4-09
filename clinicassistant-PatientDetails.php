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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>Clinic Assistant Patient Details</title>
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
				<a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
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
//fetch.php
$DBName = "u418115598_dentalapp";
$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");


if (isset($_POST['back'])) {
	header("Location:clinicassistant-PatientList.php");
}

$Patientnric = $_GET['Patientnric'];

$sqlquery = "SELECT * FROM useraccount INNER JOIN patientprofile ON useraccount.nric = patientprofile.nric WHERE useraccount.nric = '" . $Patientnric . "'";
$result = mysqli_query($conn, $sqlquery);
$row = mysqli_fetch_assoc($result);
?>

<body>
	<!--This is for Personal Details-->
	<div class="clinicassistant container">
		<div class="row justify-content-center align-items-center border border-5 m-3">
			<div class="row justify-content-center ps-5">
				<div class="col-4">
					<h1>Patient Account</h1>
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
				<div class="col-lg-4">
					<input class="form-control" disabled id="usernameTB" value="<?php echo $row['username'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
				<div class="col-lg-4">
					<input type="password" class="form-control" disabled id="passwordTB" value="<?php echo $row['password'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
				<div class="col-lg-4">
					<input class="form-control" disabled id="usernameTB" value="<?php echo $row['fullName'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="S12345678I" disabled id="passwordTB" value="<?php echo $row['nric'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">DOB:</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" disabled id="datePicker" value="<?php echo $row['dob'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Address:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="11 Spring run" disabled id="passwordTB" value="<?php echo $row['address'] ?>">
				</div>
			</div>
			<div class="row justify-content-center align-items-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Postal Code:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="352467" disabled id="usernameTB" value="<?php echo $row['postal'] ?>">
				</div>
			</div>
			<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB" disabled class="col-lg-1 col-form-label">Gender:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="352467" disabled id="usernameTB" value="<?php echo $row['gender'] ?>">
				</div>
			</div>
			<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="876543221" disabled id="passwordTB" value="<?php echo $row['phoneNum'] ?>">
				</div>
			</div>
			<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
				<div class="col-lg-4">
					<input class="form-control" placeholder="John@email.com" disabled id="usernameTB" value="<?php echo $row['email'] ?>">
				</div>
			</div>
			<div class="row justify-content-center align-items-center py-2">
				<label for="formFileMedicalHistory" class="col-1 col-form-label">X-Ray:</label>
				<div class="col-lg-4">
					<button type="submit" class="btn btn-primary col-md-3" name="UploadFile">Upload</button>
				</div>
			</div>
			<div></div>
			<form method="POST">
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					<button class="btn btn-danger" name="back" value="back">Return</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>