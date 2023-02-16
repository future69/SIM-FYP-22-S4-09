<?php session_start(); 
if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == ''){
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
	<title>Dentist Personal Profile</title>
</head>

<?php
$dentistUsername = $_SESSION['dentistUsername'];
$dentistPassword = $_SESSION['dentistPassword'];
$dentistFullname = $_SESSION['dentistFullname'];
$dentistNric = $_SESSION['dentistNric'];
$dentistClinicName = $_SESSION['dentistClinicName'];
$dentistPhoneNo = $_SESSION['dentistPhoneNo'];
$dentistEmail = $_SESSION['dentistEmail'];
$dentistPracNum = $_SESSION['dentistPracNum'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand mb-0 h1" href="">
			<img class="d-inline-block align-top" src="images/superDentalLogo.png" width="50" height="40" />
			DiamondDental™
		</a>
		<div class="collapse navbar-collapse" id="navigationBar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="dentistHomepage.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dentistSearchPatient.php">Patient</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dentistViewService.php">Services</a>
				</li>
			</ul>
		</div>
		<div class="me-auto">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Welcome <?php echo $dentistFullname ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="dentistPersonalProfile.php">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<?php
	//This try block will be execute once the user enters the page
	try	{

		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
		//Name of the table 
		$TableNameDentist = "dentistprofile";
		$TableNameUserAccount = "useraccount";
		
		$SQLstring = "SELECT * FROM $TableNameUserAccount 
		INNER JOIN $TableNameDentist ON useraccount.nric = dentistprofile.nric
		WHERE useraccount.nric='$dentistNric'";
		//Executing the sql
		$queryResult = mysqli_query($conn, $SQLstring);
		$rows = mysqli_fetch_assoc($queryResult);

		} 	
		catch(mysqli_sql_exception $e) {
				echo "Error";
		}

	?>
<body>
	<div class="registrationBoxPatient container">
	<div class="row justify-content-center align-items-center m-3">
		<form method="POST">
			<div class="row justify-content-center ps-5">
				<div class="col-4">
					<h1>Dentist Profile</h1>
				</div>
			</div>
				<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB"  class="col-lg-1 col-form-label">Clinic Name:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $dentistClinicName; ?>" disabled id="passwordTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $dentistUsername; ?>" disabled id="usernameTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['fullName']; ?>" disabled id="usernameTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Gender:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['gender']; ?>" disabled id="usernameTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['nric']; ?>" disabled id="passwordTB">
				</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['phoneNum']; ?>" disabled id="passwordTB">
				</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Address:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['address']; ?>" disabled id="passwordTB">
				</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
				<label for="passwordTB" class="col-lg-1 col-form-label">Postal Code:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['postal']; ?>" disabled id="passwordTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['email']; ?>" disabled id="usernameTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Practitioner Number:</label>
				<div class="col-lg-4">
					<input class="form-control" value="<?php echo $rows['practitionerNumber']; ?>" disabled id="usernameTB">
				</div>
				</div>
				<div class="row justify-content-center py-2">
				<label for="usernameTB" class="col-lg-1 col-form-label">Qualification:</label>
				<div class="col-lg-4">
					<a href="staffQualificationsFiles/<?php echo $rows['qualification']; ?>" target="_blank">Download </a>
				</div>
				</div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
				</div>
			</form>
		</div>
	</div>
</body>

</html>