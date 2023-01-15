<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
					width="50" height="50"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="superadminHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="superadminViewServices.php">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="superadminClinicAccountApplication.php">Application</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item d-flex">
                        		<a class="nav-link" href="#">Welcome Superadmin</a>
                    		</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
		<nav>
	</header>
	<?php
	//This try block will be execute once the user enters the page
	try	{
		$DBName = "dentalhealthapplicationdb";
		$conn = mysqli_connect("localhost", "root", "",$DBName );
		//Name of the table 
		$TableNameClinic = "clinic";
		//The lines to run in sql (get current applications)
		//$SQLstring = "SELECT useraccount.username, clinic.clinicName, clinic.acraNum, clinic.clinicArea FROM $TableNameUseraccount INNER JOIN $TableNameClinic ON useraccount.username = clinic.username WHERE clinic.clinicStatus = 'inreview'";	
		$SQLstring = "SELECT username, clinicName, acraNum, clinicArea, clinicStatus FROM $TableNameClinic WHERE clinicStatus='inreview'";
		//Executing the sql
		$queryResult = mysqli_query($conn, $SQLstring);
		} 	
		catch(mysqli_sql_exception $e) {
				echo "Error";
	}
	?>
	<body>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-5">
				<div class="col-md-5 text-center text-md-start">
					<!--original spot-->
					<!--<div class="display-6">Welcome Super Admin</div>-->
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6">Welcome Super Admin</div>
					<div class="display-6 pb-3">Pending Clinic Admin Applications</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Username</th>
								<th scope="col">Clinic Name</th>
								<th scope="col">ACRA</th>
								<th scope="col">Area</th>
								<th scope="col">Status</th>
							<tr>
						</thead>
						<tbody>
							<?php
								while($rows = mysqli_fetch_array($queryResult))
								{
							?>
							<tr>
							<td><a href="superadminClinicAAProfile.php?acraNum=<?php echo $rows['acraNum'];?>"> <?php echo $rows['username'];?></a>
							</td>
							<td><?php echo $rows['clinicName'];?>
							</td>
							<td><?php echo $rows['acraNum'];?>
							</td>
							<td><?php echo $rows['clinicArea'];?>
							</td>
							<td><?php echo $rows['clinicStatus'];?>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>