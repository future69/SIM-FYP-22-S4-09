<?php 
session_start(); 
ob_start();
$clinicName = $_SESSION["clinicName"];
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
	try{
		$userNric = $_GET['nric'];
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName);

		//Table name
		$TableNameUserAccount = "useraccount";
		$TableNameDentist = "dentistprofile";
		$TableNameClinicAssistant = "clinicassistantprofile";

		$SQLstringGetRole = "SELECT * FROM $TableNameUserAccount WHERE nric = '". $userNric ."'";
		$queryResultRole = mysqli_query($conn, $SQLstringGetRole);
		$roleRow = mysqli_fetch_assoc($queryResultRole);

		if ($roleRow['roleName'] == 'dentist'){
			$SQLstring = "SELECT * FROM $TableNameUserAccount 
			INNER JOIN $TableNameDentist 
			ON useraccount.nric = dentistprofile.nric 
			WHERE useraccount.nric = '". $userNric ."'";
		} else {
			//SQL query
			$SQLstring = "SELECT * FROM $TableNameUserAccount 
			INNER JOIN $TableNameClinicAssistant 
			ON clinicassistantprofile.nric = useraccount.nric 
			WHERE useraccount.nric = '". $userNric ."'";
		}
		// execute sql
		$queryResult = mysqli_query($conn, $SQLstring);
		$rows = mysqli_fetch_assoc($queryResult);

	}catch (mysqli_sql_exception $e) {
		echo "Error";
	}
	//Declare error messages
	$passwordError = $phoneNumError = $emailError = $addressError = $postalCodeError = null;
	$errorMessage = null;

	if (isset($_POST['updateEmployee'])) {

		//Declaring
		$errors = 0;
		$DBName = "u418115598_dentalapp";
		$accStatus = "active";
		$accountStatus = $_POST['accStatusSL'];

		//Declaring, removing backslashes and whitespaces
		$password = stripslashes($_POST['passwordTB']);
		$phoneNum = stripslashes($_POST['phoneNumTB']);
		$email = stripslashes($_POST['emailTB']);
		$address = stripslashes($_POST['clinicAddressTB']);
		$postalCode = stripslashes($_POST['postalCodeTB']);

		//Remove whitespaces
		$password = trim($_POST['passwordTB']);
		$phoneNum = trim($_POST['phoneNumTB']);
		$email = trim($_POST['emailTB']);
		$address = trim($_POST['clinicAddressTB']);
		$postalCode = trim($_POST['postalCodeTB']);

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
				SET password = '".$encryptedPassword."', email = '".$email."', phoneNum = '".$phoneNum."', address = '".$address."', postal = '".$postalCode."', accStatus = '".$accountStatus."'
				WHERE nric = '".$userNric."'";

				mysqli_query($conn, $SQLstring);
				mysqli_close($conn);
				
				echo "<script>
					alert('Success');
					window.location.href='clinicAdminUserAccounts.php';
					</script>";

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
	} else if (isset($_POST['back'])) {
		header("Location:clinicAdminUserAccounts.php");
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
			<form method="POST" enctype="multipart/form-data">
				<div class="row justify-content-center ps-5">
					<div class="col-5">
						<h1>Update Employee Account</h1>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
					<div class="col-lg-4">
						<input class="form-control" name="usernameTB" id="usernameTB" value="<?php echo $rows['username'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Password:</label>
					<div class="col-lg-4">
						<input type="password" class="form-control" name="passwordTB" id="passwordTB" value="<?php echo $password;?>" placeholder="8 characters containing 1 letter and 1 number">
						<div class="errorMessage">
							<?php echo $passwordError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="fullNameTB" class="col-lg-1 col-form-label">Full name:</label>
					<div class="col-lg-4">
						<input class="form-control" name="fullNameTB" id="fullNameTB" value="<?php echo $rows['fullName'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="genderSL" class="col-lg-1 col-form-label">Gender:</label>
					<div class="col-lg-4">
						<input class="form-control" name="genderTB" id="genderTB" value="<?php echo $rows['gender'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="nricTB" class="col-lg-1 col-form-label">NRIC:</label>
					<div class="col-lg-4">
						<input class="form-control" name="nricTB" id="nricTB" value="<?php echo $rows['nric'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Email:</label>
					<div class="col-lg-4">
						<input type="email" class="form-control" name="emailTB" id="emailTB" value="<?php echo $rows['email'] ?>">
						<div class="errorMessage">
							<?php echo $emailError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="phoneNumTB" class="col-lg-1 col-form-label">Phone Number:</label>
					<div class="col-lg-4">
						<input class="form-control" name="phoneNumTB" id="phoneNumTB" value="<?php echo $rows['phoneNum'] ?>">
						<div class="errorMessage">
							<?php echo $phoneNumError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="usernameTB" class="col-lg-1 col-form-label">Address:</label>
					<div class="col-lg-4">
						<input class="form-control" name="clinicAddressTB" id="clinicAddressTB" value="<?php echo $rows['address'] ?>">
						<div class="errorMessage">
							<?php echo $addressError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center py-2">
					<label for="passwordTB" class="col-lg-1 col-form-label">Postal Code:</label>
					<div class="col-lg-4">
						<input class="form-control" name="postalCodeTB" id="postalCodeTB" value="<?php echo $rows['postal'] ?>">
						<div class="errorMessage">
							<?php echo $postalCodeError;?>
						</div>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="roleSL" class="col-lg-1 col-form-label">Role:</label>
					<div class="col-lg-4">
						<input class="form-control" name="roleTB" id="roleTB" value="<?php echo $rows['roleName'] ?>" disabled>
					</div>
				</div>
				<div class="row justify-content-center align-items-center py-2">
					<label for="roleSL" class="col-lg-1 col-form-label">Account Status:</label>
					<div class="col-lg-4">
					<select class="form-select" name="accStatusSL" id="accStatusSL">
						<option value="active" <?php if($rows['accStatus'] == 'active'){ echo ' selected';} ?>>Active</option>
						<option value="suspended" <?php if($rows['accStatus'] == 'suspended'){ echo ' selected';} ?>>Suspended</option>
					</select>
					</div>
				</div>
				<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					<button class="btn btn-danger" name="back" value="back">Back</button>
					<button type="submit" class="btn btn-primary" name="updateEmployee" value="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>