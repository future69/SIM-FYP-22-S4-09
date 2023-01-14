<?php
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
				$DBName = "dentalhealthapplicationdb";
				try {
					$conn = mysqli_connect("localhost", "root", "", $DBName);

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
				
					else {
						switch ($theResult['roleName']) {
							case 'patient':
								$_SESSION['patientUsername'] = $theResult['username'];
								$_SESSION['patientFullname'] = $theResult['fullName'];
								$_SESSION['patientNric'] = $theResult['nric'];
								header("Location:potentialPatientHomepageAftlogin.php?");
								break;
							case 'clinicAdmin':
								$_SESSION['clinicName'] = $theResult['nric'];
								$_SESSION['clinicAdminAcraNum'] = $theResult['nric'];
								break;
							case 'clinicAssistant':
								$_SESSION['clinicAssistantNric'] = $theResult['username'];
								$_SESSION['clinicAssistantFullname'] = $theResult['fullName'];
								break;
							case 'dentist':
								$_SESSION['dentistNric'] = $theResult['username'];
								$_SESSION['dentistFullname'] = $theResult['fullName'];
								break;
							// case 'superAdmin':
							// 	$_SESSION['patientNric'] = $theResult['username'];
							// 	$_SESSION['patientFullname'] = $theResult['nric'];
							// 	break;
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