<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<title>Clinic Assistant Create Patient</title>
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
						<a class="nav-link" href="clinicassistant-HomePage.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Billing</a>
					</li>
				</ul>
				<ul class="navbar-nav d-flex mb-2 mb-md-0">
					<li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant Sam</a>
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
	//Declare error messages
	$usernameError = $passwordError = $nricError = $fullNameError = $phoneNumError = $emailError = $addressError = $postalCodeError = $dobError = $medicalHistoryError = $allergiesError = $gCaptChaError = null;
	$errorMessage = null;
	if (isset($_POST['submitRegistration'])) {

		$errors = 0;
		$DBName = "dentalhealthapplicationdb";
		$roleName = "patient";
		$accStatus = "active";

		//Value is at the input boxes incase of wrong entry, dont have to retype 
		//Declaring, removing backslashes and whitespaces
		$username = stripslashes($_POST['usernameTB']);
		$password = stripslashes($_POST['passwordTB']);
		$nric = stripslashes($_POST['nricTB']);
		$fullName = stripslashes($_POST['fullNameTB']);
		$phoneNum = stripslashes($_POST['phoneNumTB']);
		$email = stripslashes($_POST['emailTB']);
		$address = stripslashes($_POST['addressTB']);
		$postalCode = stripslashes($_POST['postalCodeTB']);
		$gender = stripslashes($_POST['genderTB']);
		$dob = stripslashes($_POST['dobTB']);
		$medicalHistory = stripslashes($_POST['medicalHistoryTB']);
		$allergies = stripslashes($_POST['allergiesTB']);

		//Remove whitespaces
		$username = trim($_POST['usernameTB']);
		$password = trim($_POST['passwordTB']);
		$nric = trim($_POST['nricTB']);
		$fullName = trim($_POST['fullNameTB']);
		$phoneNum = trim($_POST['phoneNumTB']);
		$email = trim($_POST['emailTB']);
		$address = trim($_POST['addressTB']);
		$postalCode = trim($_POST['postalCodeTB']);
		$gender = trim($_POST['genderTB']);
		$dob = trim($_POST['dobTB']);
		$medicalHistory = trim($_POST['medicalHistoryTB']);
		$allergies = trim($_POST['allergiesTB']);

		//Method to validate entries
		function correctValidation(): int
		{
			//Keep track of total false, the number represents the numbers of inputs failed
			$totalFalseCount = 0;

			if (empty($GLOBALS['username'])) {
				$GLOBALS['usernameError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $GLOBALS['password']) == 0) {
				$GLOBALS['passwordError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (preg_match('/(?i)^[STFG]\d{7}[A-Z]$/', $GLOBALS['nric']) == 0) {
				$GLOBALS['nricError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['fullName'])) {
				$GLOBALS['fullNameError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (preg_match('/^[6,8,9]{1}[0-9]{7}$/', $GLOBALS['phoneNum']) == 0) {
				$GLOBALS['phoneNumError'] = "Please enter a valid contact number";
				$totalFalseCount++;
			}

			if (filter_var($GLOBALS['email'], FILTER_VALIDATE_EMAIL) == false) {
				$GLOBALS['emailError'] = "Please enter a valid email";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['address'])) {
				$GLOBALS['addressError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (preg_match('/[0-9]{6}/', $GLOBALS['postalCode']) == 0) {
				$GLOBALS['postalCodeError'] = "Please enter a valid contact number";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['dob'])) {
				$GLOBALS['dobError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['medicalHistory'])) {
				$GLOBALS['medicalHistoryError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['allergies'])) {
				$GLOBALS['allergiesError'] = "Please enter a value";
				$totalFalseCount++;
			}

			return $totalFalseCount;
		}

		//Check for any errors
		if (correctValidation() > 0) {
			$errorMessage = "Please complete all fields";
		} else {
			try {
				$conn = mysqli_connect("localhost", "root", "", $DBName);

				//Name of the table 
				$TableName = "useraccount";
				$TableName2 = "patientprofile";

				//See if any existing username
				$SQLstringCheckUsername = "SELECT username FROM $TableName" . " where username='" . $username . "'";
				$queryResultCheckUsername = mysqli_query($conn, $SQLstringCheckUsername);

				//See if any existing nric
				$SQLstringCheckNRIC = "SELECT username FROM $TableName" . " where nric='" . $nric . "'";
				$queryResultCheckNRIC = mysqli_query($conn, $SQLstringCheckNRIC);

				//Encrypt password
				$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

				//gCpatCha
				$secretKey = "6LcZnF0jAAAAAK8eSCd4rAmkhkhNZ6hF4FKgLfLq";
				$ip = $_SERVER['REMOTE_ADDR'];
				$response = $_POST['g-recaptcha-response'];
				$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
				$getUrlContent = file_get_contents($url);
				$data = json_decode($getUrlContent);

				//If there are no results means no login info matches, good thing
				if (mysqli_num_rows($queryResultCheckUsername) > 0) {
					$errorMessage = "The username is already in use, please try another";
				} else if (mysqli_num_rows($queryResultCheckNRIC) > 0) {
					$errorMessage = "The nric is already in use, please try another";
				} else if ($data->success == false) {
					$errorMessage = "Please do recaptcha";
				} else {
					//Inserts data into DB
					$SQLstring = "INSERT INTO $TableName " . " (username, password, nric, fullName, roleName, phoneNum, email, address, postal, gender, accStatus) " . " VALUES( '$username', '$encryptedPassword', '$nric', '$fullName', '$roleName', '$phoneNum', '$email', '$address', '$postalCode', '$gender', '$accStatus' )";
					$SQLstring2 = "INSERT INTO $TableName2 " . " (nric, dob, medHistory, allergies) " . " VALUES('$nric','$dob','$medicalHistory','$allergies')";
					mysqli_query($conn, $SQLstring);
					mysqli_query($conn, $SQLstring2);
					mysqli_close($conn);

					$errorMessage = "Success!";

					//Reset values after success
					$username = "";
					$password = "";
					$fullName = "";
					$nric = "";
					$dob = "";
					$address = "";
					$postalCode = "";
					$phoneNum = "";
					$email = "";
					$medicalHistory = "";
					$allergies = "";
				}
			} catch (mysqli_sql_exception $e) {
				echo "<p>Error: unable to connect/insert record in the database.</p>";
			}
		}
	} else if (isset($_POST['back'])) {
		header("Location:clinicassistant-PatientList.php");
	} else {
		$username = "";
		$password = "";
		$fullName = "";
		$nric = "";
		$dob = "";
		$address = "";
		$postalCode = "";
		$phoneNum = "";
		$email = "";
		$medicalHistory = "";
		$allergies = "";
	}

	?>
</header>

<body>
	<div class="registrationBoxPatient container">
		<div class="row justify-content-center align-items-center">
			<form method="POST">
				<div class="row justify-content-center ps-5">
					<div class="col-4">
						<h1>Patient Registration</h1>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
					<div class="col-lg-4">
						<input class="form-control" id="usernameTB" name="usernameTB" value="<?php echo $username; ?>">
						<div class="errorMessage">
							<?php echo $usernameError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
					<div class="col-lg-4">
						<input type="password" class="form-control" id="passwordTB" name="passwordTB" placeholder="8 characters containing 1 letter and 1 number" value="<?php echo $password; ?>">
						<div class="errorMessage">
							<?php echo $passwordError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="fullNameTB" class="col-lg-1 col-form-label">Full Name:</label>
					<div class="col-lg-4">
						<input class="form-control" id="fullNameTB" name="fullNameTB" value="<?php echo $fullName; ?>">
						<div class="errorMessage">
							<?php echo $fullNameError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="nricTB" class="col-lg-1 col-form-label">NRIC:</label>
					<div class="col-lg-4">
						<input class="form-control" id="nricTB" oninput="getHistory(this.value)" name="nricTB" value="<?php echo $nric; ?>">
						<div class="errorMessage">
							<?php echo $nricError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="dobTB" class="col-lg-1 col-form-label">DOB:</label>
					<div class="col-lg-4">
						<input type="date" class="form-control" id="dobTB" name="dobTB" value="<?php echo $dob; ?>">
						<div class="errorMessage">
							<?php echo $dobError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="addressTB" class="col-lg-1 col-form-label">Address:</label>
					<div class="col-lg-4">
						<input class="form-control" id="addressTB" name="addressTB" value="<?php echo $address; ?>">
						<div class="errorMessage">
							<?php echo $addressError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="postalCodeTB" class="col-lg-1 col-form-label">Postal Code:</label>
					<div class="col-lg-4">
						<input class="form-control" id="postalCodeTB" name="postalCodeTB" value="<?php echo $postalCode; ?>">
						<div class="errorMessage">
							<?php echo $postalCodeError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="genderTB" class="col-lg-1 col-form-label">Gender:</label>
					<div class="col-lg-4">
						<select class="form-select" class="form-select" aria-label="Select gender" name="genderTB" id="genderTB" value="<?php echo $gender; ?>">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="others">Others</option>
						</select>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
					<div class="col-lg-4">
						<input class="form-control" id="phoneNumTB" name="phoneNumTB" value="<?php echo $phoneNum; ?>">
						<div class="errorMessage">
							<?php echo $phoneNumError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="emailTB" class="col-lg-1 col-form-label">Email:</label>
					<div class="col-lg-4">
						<input class="form-control" id="emailTB" name="emailTB" value="<?php echo $email; ?>">
						<div class="errorMessage">
							<?php echo $emailError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="medicalHistoryTB" class="col-lg-1 col-form-label">Medical History:</label>
					<div class="col-lg-4">
						<input class="form-control" id="pastMedHistory" name="medicalHistoryTB" value="<?php echo $medicalHistory; ?>">
						<div class="errorMessage">
							<?php echo $medicalHistoryError; ?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="allergiesTB" class="col-lg-1 col-form-label">Allergies:</label>
					<div class="col-lg-4">
						<input class="form-control" id="pastAllergies" name="allergiesTB" value="<?php echo $allergies; ?>">
						<div class="errorMessage">
							<?php echo $allergiesError; ?>
						</div>
					</div>
				</div>
				<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage; ?></div>
				<div class="row justify-content-center align-items-center g-recaptcha" name="gCaptCha" data-sitekey="6LcZnF0jAAAAAMSnSnEJF4o3T4K9QWsM29jnFUJQ"></div>
				<?php echo $gCaptChaError; ?>
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					<button class="btn btn-danger" name="back" value="back">Back</button>
					<button type="submit" class="btn btn-primary" name="submitRegistration" value="submit">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>