<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
                Diamond Dental
            </a>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-HomePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-bills.php">Billing</a>
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
                        <a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
<body>  
<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="column">
				<div class="col-md-5 text-start pt-5">
					<div class="display-6">Welcome Sam</div>
				</div>
				<div class="col-md-5 text-start pt-4">
					<h5>You have <strong>3</strong> appointments today</h5>
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="column">
					<div class="display-6 pb-3">Today's appointments (28/11/2022)</div>
					<table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Patient Name</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> Long Tai Wat </td>
								<td> 28/11/2022 </td>
								<td> 14:30 </td>
							</tr>
							<tr>
								<td> Paddy Lee </td>
								<td> 28/11/2022 </td>
								<td> 15:30 </td>
							</tr>
							<tr>
								<td> Lim's Surgery </td>
								<td> 28/11/2022 </td>
								<td> 17:30 </td>
							</tr>
						</tbody>
				</div>
			</div>
		</div>
    </body>
</html>