<?php
session_start();
$ppFullName = $_SESSION['patientFullname'];

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
			<a class="navbar-brand mb-0 h1" href="potentialPatientHomepageAftLogin.php">
				<img class="d-inline-block align-top" src="images/superDentalLogo.png" width="50" height="40" />
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
						<a class="nav-link" href="potentialPatientBills.php">Bills</a>
					</li>
				</ul>
			</div>
			<div class="me-auto">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Welcome <?php echo $ppFullName ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="potentialPatientProfile.php">Profile</a>
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
		//This try block will be execute once the user enters the page
		try	{
			//Get nric from session
			$patientNric = $_SESSION['patientNric'];

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

		//Declare error messages
		$passwordError = $phoneNumError = $emailError = $addressError = $postalCodeError = $allergiesError = null;
		$errorMessage = null;

		if (isset($_POST['updatePatient'])) {

			//Declaring
			$errors = 0;
			$DBName = "u418115598_dentalapp";

			//Declaring, removing backslashes and whitespaces
			$password = stripslashes($_POST['passwordTB']);
			$phoneNum = stripslashes($_POST['phoneNumTB']);
			$email = stripslashes($_POST['emailTB']);
			$address = stripslashes($_POST['addressTB']);
			$postalCode = stripslashes($_POST['postalCodeTB']);
			$allergies = stripslashes($_POST['allergyTB']);

			//Remove whitespaces
			$password = trim($_POST['passwordTB']);
			$phoneNum = trim($_POST['phoneNumTB']);
			$email = trim($_POST['emailTB']);
			$address = trim($_POST['addressTB']);
			$postalCode = trim($_POST['postalCodeTB']);
			$allergies = trim($_POST['allergyTB']);

			//Method to validate entries
			function correctValidation(): int
			{
				//Keep track of total false, the number represents the numbers of inputs failed
				$totalFalseCount = 0;

				if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $GLOBALS['password']) == 0) {
					$GLOBALS['passwordError'] = "Please enter a valid password";
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
					$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName);

					//Name of the table 
					$TableNameUserAccount = "useraccount";
					//Encrypt password
					$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

					$SQLstring = "UPDATE $TableNameUserAccount
					SET password = '".$encryptedPassword."', email = '".$email."', 
					phoneNum = '".$phoneNum."', address = '".$address."', postal = '".$postalCode."'
					WHERE nric = '".$patientNric."'";

					mysqli_query($conn, $SQLstring);
					echo "<meta http-equiv='refresh' content='0'>";

					$errorMessage = "Success!";

					//Reset values after success
					$password = "";
					$address = "";
					$postalCode = "";
					$phoneNum = "";
					$email = "";

				} catch (mysqli_sql_exception $e) {
					echo "<p>Error: unable to connect/insert record in the database.</p>";
				}
			}
		} else {
			$password = "";
			$address = "";
			$postalCode = "";
			$phoneNum = "";
			$email = "";
		}
	?>
</header>

<body>
	<div class="registrationBoxPatient container">
		<div class="row justify-content-center align-items-center">
			<form method="POST">
				<div class="row justify-content-center ps-5">
					<div class="col-4">
						<h1>Your Profile</h1>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
					<div class="col-lg-4">
						<input class="form-control" id="usernameTB" value="<?php echo $rows['username'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
					<div class="col-lg-4">
						<input type="password" class="form-control" name="passwordTB" id="passwordTB" placeholder="8 characters containing 1 letter and 1 number">
						<div class="errorMessage">
							<?php echo $passwordError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Full Name:</label>
					<div class="col-lg-4">
						<input class="form-control" id="fullNameTB" value="<?php echo $rows['fullName'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">NRIC:</label>
					<div class="col-lg-4">
						<input class="form-control" id="nricTB" value="<?php echo $rows['nric'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">DOB:</label>
					<div class="col-lg-4">
						<input class="form-control" id="dobTB" value="<?php echo $rows['dob'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Address:</label>
					<div class="col-lg-4">
						<input class="form-control" id="addressTB" name="addressTB" value="<?php echo $rows['address'] ?>">
						<div class="errorMessage">
							<?php echo $addressError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Postal Code:</label>
					<div class="col-lg-4">
						<input class="form-control" id="postalCodeTB" name="postalCodeTB" value="<?php echo $rows['postal'] ?>">
						<div class="errorMessage">
							<?php echo $postalCodeError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Gender:</label>
					<div class="col-lg-4">
						<input class="form-control" id="genderTB" value="<?php echo $rows['gender'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Phone Number:</label>
					<div class="col-lg-4">
						<input class="form-control" id="phoneNumTB" name="phoneNumTB" value="<?php echo $rows['phoneNum'] ?>">
						<div class="errorMessage">
							<?php echo $phoneNumError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Email:</label>
					<div class="col-lg-4">
						<input type="email" class="form-control" id="emailTB" name="emailTB" value="<?php echo $rows['email'] ?>">
						<div class="errorMessage">
							<?php echo $emailError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Medical History:</label>
					<div class="col-lg-4">
						<input class="form-control" id="medHistoryTB" value="All 4 wisdom teeth removed" disabled>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="allergyTB" class="col-lg-1 col-form-label">Allergies:</label>
					<div class="col-lg-4">
						<input class="form-control" id="allergyTB" name="allergyTB" value="<?php echo $rows['allergies'] ?>">
						<div class="errorMessage">
							<?php echo $allergiesError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="familyMembersTB" class="col-lg-1 col-form-label">Family Members:</label>
					<div class="col-lg-4">
						<input class="form-control" id="familyMembersTB" value="STATIC DATA" disabled>
					</div>
				</div>
				<div class="input-group col-4 justify-content-center align-items-center py-2">
					<div class="input-group-prepend">
						<button class="btn btn-primary" type="button">+</button>
						<button class="btn btn-danger" type="button">-</button>
					</div>
					<div class="col-lg-4 ps-2">
						<input type="text" class="form-control" placeholder="Family Member (NRIC)">
					</div>
				</div>
				<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					<button type="submit" class="btn btn-primary" name="updatePatient" value="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>