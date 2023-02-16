<?php 
session_start(); 
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
	<?php
	// set session variables from login
	$clinicName = $_SESSION["clinicName"];
	// try block execution upon entering the page
	try {
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName);

		// table name
		$TableNameClinic = "clinic";
		$TableNameCAP = "clinicassistantprofile";
		$TableNameDP = "dentistprofile";
		$TableNameUA = "useraccount";

		// sql query to get employees
		$SQLstring = "SELECT useraccount.username, useraccount.nric, useraccount.fullName, useraccount.roleName, useraccount.accStatus, clinic.clinicName FROM $TableNameUA
					INNER JOIN $TableNameCAP ON clinicassistantprofile.nric = useraccount.nric
					INNER JOIN $TableNameClinic ON clinic.clinicName = clinicassistantprofile.clinicName
					WHERE clinic.clinicName = '" . $clinicName . "'
					UNION
					SELECT useraccount.username, useraccount.nric, useraccount.fullName, useraccount.roleName, useraccount.accStatus, clinic.clinicName FROM useraccount
					INNER JOIN $TableNameDP ON dentistprofile.nric = useraccount.nric
					INNER JOIN $TableNameClinic ON clinic.clinicName = dentistprofile.clinicName
					WHERE clinic.clinicName = '" . $clinicName . "'";

		// execute sql
		$queryResult = mysqli_query($conn, $SQLstring);
		
	} catch (mysqli_sql_exception $e) {
		echo "Error in connection";
	}
	?>
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
								<a class="nav-link active" aria-current="page" href="clinicAdminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="clinicAdminUserAccounts.php">User Accounts</a>
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
	</header>
	<body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-5">
				<div class="col-md-5 text-center text-md-start">
					<div class="display-6">Welcome <?php echo $clinicName ?></div>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Clinic Employee Account(s) Status</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">Role</th>
								<th scope="col">Status</th>
							<tr>
						</thead>
						<tbody>
						<?php
						while ($rows = mysqli_fetch_assoc($queryResult)) {
						?>
							<tr>
								<td> <?php echo $rows['fullName'] ?> </td>
								<td> <?php echo $rows['nric'] ?> </td>
								<td> <?php echo $rows['roleName'] ?> </td>
								<td> <?php echo $rows['accStatus'] ?> </td>
							</tr>
						<?php } ?>
						</tbody>
				</div>
			</div>
		</div>
	</body>
</html>