<?php
session_start();
$clinicName = $_SESSION["clinicName"];
$clinicAcraNum = $_SESSION["clinicAdminAcraNum"];
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
						<a class="nav-link" href="clinicAdminHomepage.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clinicAdminUserAccounts.php">User Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clinicAdminAppointments.php">Appointments</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="clinicAdminServices.php">Services</a>
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
	if (isset($_POST['updateService'])) {
		echo '<script>alert("Services updated!")</script>';
	}

	$DBName = "u418115598_dentalapp";
	$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");
	$DBclinic = 'clinic';
	$DBServiceoffered = 'servicesoffered';
	$DBService = 'service';
	$sqlservice = "SELECT * FROM $DBclinic WHERE acraNum = '$clinicAcraNum'";
	$resultservice = mysqli_query($conn, $sqlservice);

	?>
</header>

<body>
	<div class="container-lg">
		<!-- Put this div outside the center alignment, for the welcome message plus bills -->
		<!-- Tablehead can put caption-top -->
		<div class="row justify-content-center align-items-center pt-5">
			<div class="col-12 text-start text-md-start">
				<div class="display-6"></div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center pt-5">
			<div class="row">
				<div class="col-6 display-6 pb-3">Services(s)</div>
				<div class="col-6 text-end display-6 pb-3">
					<form class="justify-content-end align-items-end" method="POST">
						<button type="submit" class="btn btn-warning" name="updateService">Update</button>
					</form>
				</div>
				<table class="table table-hover table-secondary table-striped ">
					<thead>
						<tr>
							<th>Service Name</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$datas = array();
					if (mysqli_num_rows($resultservice) > 0) {
						//converts string into array
						while ($rows = mysqli_fetch_assoc($resultservice)) {
							$datas[] = $rows;
							//print_r($datas);
							foreach ($datas as $data) {
								$strExplode = explode(" ", $data['servicesSelected']);
								//print_r($strExplode);
							}
							//puts the arrays details into tables
							foreach ($strExplode as $test) {
								echo "<tr>".
								"<td>" . $test . "</td>" .
								"</tr>";
							}
						}
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>