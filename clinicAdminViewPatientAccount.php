<?php 
session_start(); 
$clinicName = $_SESSION["clinicName"];
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
					<a class="navbar-brand mb-0 h1" href="">
					<img
					class="d-inline-block align-top"
					src="images/superDentalLogo.png"
					width="50" height="40"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="clinicAdminUserAccounts.php">User Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminAppointments.php">Appointments</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminServices.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">Welcome <?php echo $clinicName ?></a>
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
			//Get nric from session
			$patientNric = $_GET['nric'];

			$DBName = "u418115598_dentalapp";
			$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
			//Name of the table 
			$TableNamePatient = "patientprofile";
			$TableNameUserAccount = "useraccount";
			
			$SQLstring = "SELECT * FROM $TableNameUserAccount 
			INNER JOIN $TableNamePatient ON useraccount.nric = patientprofile.nric
			WHERE useraccount.nric='$patientNric'";
			//Executing the sql
			$queryResult = mysqli_query($conn, $SQLstring);
			$rows = mysqli_fetch_assoc($queryResult);

			} 	
			catch(mysqli_sql_exception $e) {
					echo "Error";
			}
			
			if (isset($_POST['back'])) {
				header("Location:clinicAdminUserAccounts.php");
			}
		?>
	</header>
	<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center ps-5">
						<div class="col-5">
							<h1>View Patient Account</h1>
						</div>
					</div>
					  <div class="row justify-content-center py-2">
						<label for="fullnameTB" class="col-lg-1 col-form-label">Full name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="fullnameTB" value="<?php echo $rows['fullName'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="genderSL" class="col-lg-1 col-form-label">Gender:</label>
						<div class="col-lg-4">
							<input class="form-control" id="genderTB" value="<?php echo $rows['gender'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="nricTB" class="col-lg-1 col-form-label">NRIC:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="nricTB" value="<?php echo $rows['nric'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="emailTB" class="col-lg-1 col-form-label">Email:</label>
						<div class="col-lg-4">
						  <input type="email" class="form-control" id="emailTB" value="<?php echo $rows['email'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="phoneNumTB" value="<?php echo $rows['phoneNum'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="dobTB" class="col-lg-1 col-form-label">DOB:</label>
						<div class="col-lg-4">
							<input type="date" class="form-control" id="dobTB" value="<?php echo $rows['dob'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="clinicAddress" class="col-lg-1 col-form-label">Address:</label>
						<div class="col-lg-4">
							<input class="form-control" id="clinicAddress" value="<?php echo $rows['address'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="postalCodeTB" class="col-lg-1 col-form-label">Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="postalCodeTB" value="<?php echo $rows['postal'] ?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="formFileMedicalHistory" class="col-1 col-form-label">Medical history:</label>
						<div class="col-lg-4">
							<textarea class="form-control" id="medhistoryTB" name="medhistoryTB" disabled><?php echo str_replace('~', "\r\n",$rows['medHistory']);?></textarea>
						</div>
					  </div>
					  <div class="row justify-content-center py-2">
						<label for="postalCodeTB" class="col-lg-1 col-form-label">Allergies:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="postalCodeTB" value="<?php echo $rows['allergies'] ?>" disabled>
						</div>
					  </div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-danger" name="back" value="back">Back</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>
</html>