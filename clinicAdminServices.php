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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<style>
	body {
		font-family: Arial;
	}

	/* Style the tab */
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}
</style>
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
	$DBName = "u418115598_dentalapp";
	$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");
	$DBclinic = 'clinic';
	$DBServiceoffered = 'servicesoffered';
	$DBService = 'service';
	$submittedvalue = "";
	$sqlservice = "SELECT * FROM $DBclinic WHERE acraNum = '$clinicAcraNum'";
	$sqlallservice = "SELECT * FROM $DBService";
	$resultservice = mysqli_query($conn, $sqlservice);
	$resultservice2 = mysqli_query($conn, $sqlallservice);
	$selectArray = array();

	if (isset($_POST['updateService'])) {
		$serviceStatusArr = array();
		$serviceStatusArr = $_POST["serviceStatus"];
		$confirmation = "Services has been updated";
		$string = "";


		for ($i = 0; $i < count($serviceStatusArr); $i++) {
			if ($serviceStatusArr[$i] !== "suspended") {
				$string .= $serviceStatusArr[$i] . ",";
			}
		}
		$string = rtrim($string, ",");
		$sqlupdate = "UPDATE $DBclinic SET servicesSelected = '$string' WHERE clinic.acraNum = '" . $clinicAcraNum . "'";
		$insertupdate = mysqli_query($conn, $sqlupdate);

		echo "<meta http-equiv='refresh' content='0'>";
	}

	$datas = array();
	if (mysqli_num_rows($resultservice) > 0) {
		//converts string into array
		while ($rows = mysqli_fetch_assoc($resultservice)) {
			$datas[] = $rows;
			//print_r($datas);
			foreach ($datas as $data) {
				$strExplode = explode(",", $data['servicesSelected']);
				//print_r($strExplode);
			}
		}
	}

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
		<div class="col-6 display-6 pb-3">Services</div>

		<div class="tab">
			<button class="tablinks" onclick="openservice(event, 'selectServices') ">Select Services</button>
			<button class="tablinks" onclick="openservice(event, 'currentServices')">Current Services</button>
		</div>

		<div id="selectServices" class="tabcontent">
			<form class="justify-content-end align-items-end" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
				<div class="row justify-content-center align-items-center pt-2">
					<div class="row">

						<div class="col text-end display-6 pb-3">
							<button type="submit" class="btn btn-warning" name="updateService">Update</button>
						</div>
						<table class="table table-hover table-secondary table-striped ">
							<thead>
								<tr>
									<th scope="col">Service Name</th>
									<th scope="col">Status</th>
								<tr>
							</thead>
							<tbody>
								<?php
								while ($rows = mysqli_fetch_array($resultservice2)) {
								?>
									<tr>
										<td><?php echo $rows['serviceName']; ?></td>
										<td>
											<select class="form-select" name="serviceStatus[]" id="serviceStatus" required>
												<option value="">Select Services</option>
												<option value="<?php echo $rows['serviceName']; ?>">Enable</option>
												<option value="suspended">Disable</option>
										</td>
									<?php
								}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</form>
		</div>

		<div id="currentServices" class="tabcontent">
			<table class="table table-hover table-secondary table-striped ">
				<thead>
					<tr>
						<th scope="col">Service Name</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (mysqli_num_rows($resultservice) == 0) {
						echo "<tr>" .
							"<td>Empty</td>" .
							"</tr>";
					}else{
					foreach ($strExplode as $CurrentService) {
						echo "<tr>" .
							"<td>" . $CurrentService . "</td>" .
							"</tr>";
					}
				}			
					?>
				</tbody>
			</table>
		</div>

		<script>
			function openservice(evt, serviceName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(serviceName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			function_alert("One of the option is not selected");
		</script>
	</div>
</body>

</html>
