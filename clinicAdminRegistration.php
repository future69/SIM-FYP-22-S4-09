<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand mb-0 h1" href="">
				<img class="d-inline-block align-top" src="images/SuperDentalLogo.png" width="50" height="40" />
				DiamondDental™
			</a>
			<div class="collapse navbar-collapse" id="navigationBar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientHomepage.php">Home</a>
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
						<a class="nav-link active" aria-current="page" href="homepageRegisterAs.php">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="potentialPatientLogin.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<?php
	//Declare error messages
	$usernameError = $passwordError = $clinicNameError = $phoneNumError = $emailError = $addressError = $postalCodeError = $acraError = $dentalServicesError = $gCaptChaError = null;
	$errorMessage = null;

	//This try block will be execute once the user enters the page, to load select list data
	try {
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
		$servicesTable = "service";

		//The lines to run in sql
		$SQLstring = "SELECT serviceName FROM $servicesTable" . " where serviceStatus ='active'";

		//Executing the sql
		$queryResultListOfServices = mysqli_query($conn, $SQLstring);
	} catch (mysqli_sql_exception $e) {
		echo "Error";
	}

	if (isset($_POST['submitRegistration'])) {

		$errors = 0;
		$DBName = "dentalhealthapplicationdb";
		$clinicStatus = "inreview";
		$roleName = "clinicAdmin";
		$accStatus = "suspended";
		$area = $_POST['clinicAreaSL'];
		$openingHour = $_POST['clinicOpeningTimeSL'];
		$closingHour = $_POST['clinicClosingTimeSL'];

		//Value is at the input boxes incase of wrong entry, dont have to retype 
		//Declaring, removing backslashes and whitespaces
		$username = stripslashes($_POST['usernameTB']);
		$password = stripslashes($_POST['passwordTB']);
		$clinicName = stripslashes($_POST['clinicNameTB']);
		$email = stripslashes($_POST['emailTB']);
		$address = stripslashes($_POST['clinicAddressTB']);
		$postalCode = stripslashes($_POST['postalCodeTB']);
		$phoneNum = stripslashes($_POST['phoneNumTB']);
		$acra = stripslashes($_POST['acraTB']);

		//Remove whitespaces
		$username = trim($_POST['usernameTB']);
		$password = trim($_POST['passwordTB']);
		$clinicName = trim($_POST['clinicNameTB']);
		$email = trim($_POST['emailTB']);
		$address = trim($_POST['clinicAddressTB']);
		$postalCode = trim($_POST['postalCodeTB']);
		$phoneNum = trim($_POST['phoneNumTB']);
		$acra = trim($_POST['acraTB']);

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

			if (empty($GLOBALS['clinicName'])) {
				$GLOBALS['clinicNameError'] = "Please enter a value";
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
				$GLOBALS['postalCodeError'] = "Please enter a valid postal code";
				$totalFalseCount++;
			}

			if (empty($GLOBALS['acra'])) {
				$GLOBALS['acraError'] = "Please enter a value";
				$totalFalseCount++;
			}

			if (isset($_POST['dentalServicesSL']) == false) {
				$GLOBALS['dentalServicesError'] = "Please select at least 1 service";
				$totalFalseCount++;
			}

			return $totalFalseCount;
		}

		//Check for any errors
		if (correctValidation() > 0) {
			$errorMessage = "Please complete all fields";
		} else {
			try {
				$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

				//Name of the table 
				$TableNameUserAccount = "useraccount";
				$TableNameClinic = "clinic";
				$TableNameServicesOffered = "servicesOffered";

				//See if any existing username
				$SQLstringCheckUsername = "SELECT username FROM $TableNameUserAccount" . " where username='" . $username . "'";
				$queryResultCheckUsername = mysqli_query($conn, $SQLstringCheckUsername);

				//See if any existing acra number
				$SQLstringCheckAcra = "SELECT * FROM $TableNameClinic" . " where acraNum='" . $acra . "'";
				$queryResultCheckAcra = mysqli_query($conn, $SQLstringCheckAcra);

				//See if any existing clinic name
				$SQLstringCheckClinicName = "SELECT * FROM $TableNameClinic" . " where clinicName='" . $clinicName . "'";
				$queryResultClinicName = mysqli_query($conn, $SQLstringCheckClinicName);

				//Encrypt password
				$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

				//gCpatCha
				$secretKey = "6LcZnF0jAAAAAK8eSCd4rAmkhkhNZ6hF4FKgLfLq";
				$ip = $_SERVER['REMOTE_ADDR'];
				$response = $_POST['g-recaptcha-response'];
				$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
				$getUrlContent = file_get_contents($url);
				$data = json_decode($getUrlContent);

				//Gets selected services array and adds them together to form a string 
				$selectedServices = implode(" ",$_POST['dentalServicesSL']);

				//If there are no results means no login info matches, good thing
				if (mysqli_num_rows($queryResultCheckUsername) > 0) {
					$errorMessage = "The username is already in use, please try another";
				} else if (mysqli_num_rows($queryResultCheckAcra) > 0) {
					$errorMessage = "Acra number is already registered";
				} else if (mysqli_num_rows($queryResultClinicName) > 0) {
					$errorMessage = "Clinic Name is already in use";
				} else if ($data->success == false) {
					$errorMessage = "Please do recaptcha";
				} else {
					//Inserts data into DB
					$SQLstring = "INSERT INTO $TableNameUserAccount " . " (username, password, rolename, accStatus) " . " VALUES( '$username', '$encryptedPassword','$roleName','$accStatus')";
					$SQLstring2 = "INSERT INTO $TableNameClinic " . " (acraNum, clinicName, clinicAddress, clinicPostal, clinicArea, clinicPhoneNum, clinicEmail, clinicOpeningHour, clinicClosingHour, clinicStatus, username, servicesSelected) " . " VALUES('$acra','$clinicName','$address','$postalCode','$area','$phoneNum','$email','$openingHour','$closingHour','$clinicStatus','$username','$selectedServices')";
					mysqli_query($conn, $SQLstring);
					mysqli_query($conn, $SQLstring2);
					mysqli_close($conn);

					$errorMessage = "Success!";

					//Reset values after success
					$username = "";
					$password = "";
					$clinicName = "";
					$email = "";
					$address = "";
					$postalCode = "";
					$phoneNum = "";
					$acra = "";
				}
			} catch (mysqli_sql_exception $e) {
				echo "<p>Error: unable to connect/insert record in the database.</p>";
			}
		}
	} else if (isset($_POST['back'])) {
		header("Location:index.php");
	} else {
		$username = "";
		$password = "";
		$clinicName = "";
		$email = "";
		$address = "";
		$postalCode = "";
		$phoneNum = "";
		$acra = "";
	}
	?>
</header>

<body>
	<div class="registrationBoxPatient container">
		<div class="row justify-content-center align-items-center">
			<form method="POST">
				<div class="row justify-content-center ps-5">
					<div class="col-4">
						<h1>Clinic Registration</h1>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
					<div class="col-lg-4">
						<input class="form-control" id="usernameTB" name="usernameTB" value="<?php echo $username;?>">
						<div class="errorMessage">
							<?php echo $usernameError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
					<div class="col-lg-4">
						<input type="password" class="form-control" placeholder="8 characters containing 1 letter and 1 number" id="passwordTB" name="passwordTB" value="<?php echo $password;?>">
						<div class="errorMessage">
							<?php echo $passwordError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="clinicNameTB" class="col-lg-1 col-form-label">Clinic Name:</label>
					<div class="col-lg-4">
						<input class="form-control" id="clinicNameTB" name="clinicNameTB" value="<?php echo $clinicName;?>">
						<div class="errorMessage">
							<?php echo $clinicNameError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="emailTB" class="col-lg-1 col-form-label">Email:</label>
					<div class="col-lg-4">
						<input type="email" class="form-control" id="emailTB" name="emailTB" value="<?php echo $email;?>">
						<div class="errorMessage">
							<?php echo $emailError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="addressTB" class="col-lg-1 col-form-label">Address:</label>
					<div class="col-lg-4">
						<input class="form-control" id="clinicAddressTB" name="clinicAddressTB" value="<?php echo $address;?>">
						<div class="errorMessage">
							<?php echo $addressError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="postalCodeTB" class="col-lg-1 col-form-label">Postal Code:</label>
					<div class="col-lg-4">
						<input class="form-control" id="postalCodeTB" name="postalCodeTB" value="<?php echo $postalCode;?>">
						<div class="errorMessage">
							<?php echo $postalCodeError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="areaSL" class="col-lg-1 col-form-label">Area:</label>
					<div class="col-lg-4">
						<select class="form-select" class="form-select" aria-label="Select area" name="clinicAreaSL" id="clinicAreaSL">
							<option value="north">North</option>
							<option value="south">South</option>
							<option value="east">East</option>
							<option value="west">West</option>
							<option value="central">Central</option>
						</select>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
					<div class="col-lg-4">
						<input class="form-control" id="phoneNumTB" name="phoneNumTB" value="<?php echo $phoneNum;?>">
						<div class="errorMessage">
							<?php echo $phoneNumError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="acraTB" class="col-lg-1 col-form-label">ACRA:</label>
					<div class="col-lg-4">
						<input class="form-control" id="acraTB" name="acraTB" value="<?php echo $acra;?>">
						<div class="errorMessage">
							<?php echo $acraError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="dentalServiceSL[]" class="col-lg-1 col-form-label">Dental Services:</label>
					<div class="col-lg-4">
						<select class="form-select" name="dentalServicesSL[]" multiple>
							<?php
							while ($listOfServices = mysqli_fetch_assoc($queryResultListOfServices)) {
							?>
								<option value="<?php echo $listOfServices['serviceName'];?>"><?php echo $listOfServices['serviceName'];?></option>
							<?php
							}
							?>
						</select>
						<div class="errorMessage">
							<?php echo $dentalServicesError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="clinicOpeningTimeSL" class="col-1 col-form-label">Operating Hours:</label>
					<div class="col-2">
						<select class="form-select" class="form-select" aria-label="Opening" name="clinicOpeningTimeSL" id="clinicOpeningTime">
							<option value="08:00">08:00</option>
							<option value="09:00">09:00</option>
							<option value="10:00">10:00</option>
						</select>
					</div>
					<div class="col-2">
						<select class="form-select" class="form-select" aria-label="Closing" name="clinicClosingTimeSL" id="clinicClosingTime">
							<option value="18:00">18:00</option>
							<option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
						</select>
					</div>
				</div>
				<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage; ?></div>
				<div class="row justify-content-center align-items-center g-recaptcha" data-sitekey="6LcZnF0jAAAAAMSnSnEJF4o3T4K9QWsM29jnFUJQ"></div>
				<?php echo $gCaptChaError;?>
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					<button class="btn btn-danger" name="back" value="back">Back</button>
					<button type="submit" class="btn btn-primary" name="submitRegistration" value="submitRegistration">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>