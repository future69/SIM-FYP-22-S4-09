<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand mb-0 h1" href="">
			<img class="d-inline-block align-top" src="images/superDentalLogo.png" width="50" height="40" />
			DiamondDental™
		</a>
		<div class="collapse navbar-collapse" id="navigationBar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Our Partners</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">For Patients</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">For Clinics</a>
				</li>

			</ul>
		</div>
		<div class="me-auto">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="homepageRegisterAs.php">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="potentialPatientLogin.php">Login</a>
				</li>
			</ul>
		</div>
	</div>
	<nav>
	<?php
	$errorMessage = "";
	if (isset($_POST['submit'])) {
		$errors = 0;
		$DBName = "u418115598_dentalapp";
		try {
			$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
			//Name of the table 
			$TableName = "useraccount";

			//Declaring, removing backslashes and whitespaces
			$username = stripslashes($_POST['usernameTB']);
			$username = trim($_POST['usernameTB']);

			$password = trim($_POST['passwordTB']);
			$password = stripslashes($_POST['passwordTB']);

			//The lines to run in sql
			$SQLstring = "SELECT * FROM $TableName" . " where username='" . $username . "'";

			//Executing the sql
			$queryResult = mysqli_query($conn, $SQLstring);

			//Make result into array
			$theResult = mysqli_fetch_assoc($queryResult);

			if(empty($username) || empty($password)){
				$errorMessage = "Please enter both username and password";
			}
			//If there are no results means no login info matches, Check if password user entered matches hashed password from database
			else if (mysqli_num_rows($queryResult) == 0 || password_verify($password, $theResult['password']) == false) {
				$errorMessage = "Username/password is incorrect";
			} 
			else if ($theResult['accStatus'] == 'suspended'){
				$errorMessage = "Account is suspended";
			}
		
			else {
				switch ($theResult['roleName']) {
					case 'patient':
						$_SESSION['patientUsername'] = $theResult['username'];
						$_SESSION['patientFullname'] = $theResult['fullName'];
						$_SESSION['patientNric'] = $theResult['nric'];
						header("Location:potentialPatientHomepageAftLogin.php");
						break;
					case 'clinicAdmin':
						$TableNameClinic = 'clinic';
						$SQLstringClinic = "SELECT * FROM $TableName INNER JOIN $TableNameClinic
						ON useraccount.username = clinic.username WHERE useraccount.username = '".$theResult['username']."'";
						//Executing the sql
						$queryResultClinic = mysqli_query($conn, $SQLstringClinic);
						//Make result into array
						$theResultClinic = mysqli_fetch_assoc($queryResultClinic);
						
						$_SESSION['clinicAdminAcraNum'] = $theResultClinic['acraNum'];
						$_SESSION['clinicName'] = $theResultClinic['clinicName'];
						header("Location:clinicAdminHomepage.php");
						break;
					case 'clinicAssistant':
						//SQL statement to get clinic name
						$TableNameClinicAssistant = 'clinicassistantprofile';
						$SQLstringClinicAss = "SELECT * FROM $TableName INNER JOIN $TableNameClinicAssistant 
						ON useraccount.nric = clinicassistantprofile.nric WHERE useraccount.username = '".$theResult['username']."'";
						//Executing the sql
						$queryResultClinicAss = mysqli_query($conn, $SQLstringClinicAss);
						//Make result into array
						$theResultClinicAss = mysqli_fetch_assoc($queryResultClinicAss);

						$_SESSION['clinicAssistantUsername'] = $theResult['username'];
						$_SESSION['clinicAssistantPassword'] = $theResult['password'];
						$_SESSION['clinicAssistantFullname'] = $theResult['fullName'];
						$_SESSION['clinicAssistantNric'] = $theResult['nric'];
						$_SESSION['clinicAssistantClinicName'] = $theResultClinicAss['clinicName'];
						$_SESSION['clinicAssistantPhoneNo'] = $theResult['phoneNum'];
						$_SESSION['clinicAssistantEmail'] = $theResult['email'];
						header("Location:ClinicAssistant-HomePage.php");
						break;
					case 'dentist':
						$_SESSION['dentistNric'] = $theResult['nric'];

						//SQL statement to get clinic name
						$TableNameDentist = 'dentistprofile';
						$SQLstringDentist = "SELECT * FROM $TableName INNER JOIN $TableNameDentist ON useraccount.nric = dentistprofile.nric WHERE dentistprofile.nric = '" . $_SESSION['dentistNric']. "'";
						//$SQLstringDentist = "SELECT * FROM $TableNameDentist WHERE nric = '" . $_SESSION['dentistNric']. "'";
						//Executing the sql
						$queryResultDentist = mysqli_query($conn, $SQLstringDentist);
						//Make result into array
						$theResultDentist = mysqli_fetch_assoc($queryResultDentist);
						//details for dentist profile
						$_SESSION['dentistUsername'] = $theResult['username'];
						$_SESSION['dentistPassword'] = $theResult['password'];
						$_SESSION['dentistNric'] = $theResult['nric'];
						$_SESSION['dentistClinicName'] = $theResultClinicAss['clinicName'];
						$_SESSION['dentistPhoneNo'] = $theResult['phoneNum'];
						$_SESSION['dentistEmail'] = $theResult['email'];
						$_SESSION['dentistFullname'] = $theResult['fullName'];
						$_SESSION['dentistPracNum'] = $theResultDentist['practitionerNumber'];
						header("Location:dentistHomepage.php");
						break;
					case 'superAdmin':
						header("Location:superadminHomepage.php");
						break;
				}
			}
		} catch (mysqli_sql_exception $e) {
			echo "<p>Error: unable to connect/insert record in the database.</p>";
		}
	} 
	else {
		$username = "";
		$password = "";
	}

	?>
</header>

<body>
	<div class="loginBox container d-flex justify-content-center align-items-center">
		<form method="POST">
			<h1 class="row justify-content-center align-items-center">Login</h1>
			<div class="row pt-3">
				<label for="usernameTB" class="col-sm-4 col-form-label">Username : </label>
				<div class="col-sm-8">
					<input class="form-control" name="usernameTB" id="usernameTB" value="<?php echo $username;?>">
				</div>
			</div>
			<div class="row pt-3">
				<label for="passwordTB" class="col-sm-4 col-form-label">Password : </label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="passwordTB" id="passwordTB">
				</div>
			</div>
			<div class="errorMessage row justify-content-center align-items-center py-2">
				<?php echo $errorMessage;?>
			</div>
			<div class="row justify-content-center align-items-center">
				<button type="submit" class="btn btn-primary col-3" name="submit">Login</button>
			</div>
		</form>
	</div>
</body>

</html>