<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Dentist Create Appointment Treatment Details</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand mb-0 h1" href="">
					<img
					class="d-inline-block align-top"
					src="images/SuperDentalLogo.png"
					width="50" height="40"/>
					DiamondDental™
					</a>
					<div class="collapse navbar-collapse" id="navigationBar">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="dentistHomepage.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active"  aria-current="page" href="dentistViewnSearchAppointment.php">Appointment</a>
							</li>
                            <li class="nav-item">
								<a class="nav-link" href="dentistPastAppointment.php">Past Appointment</a>
							</li>
							<li class="nav-item">
								<a class="nav-link"  href="dentistSearchPatient.php">Patient</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dentistViewService.php">Services</a>
							</li>
						</ul>
					</div>
					<div class="me-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="dentistPersonalProfile.php">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
        </nav>
<body>
<div class="container-lg">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Create Appointment Treatment Details</div>
        <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
            </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                    <p>Appointment Treatment Details for (Patient Name)</p>
                            <table class=" col-3 table table-hover border border-2 border-secondary">
                                <thead>
                                    <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Services</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Date 1</td>
                                    <td>Name 1</td>
                                    <td>Service 1</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Patient Details</p>
                            <table class=" col-3 table table-hover border border-2 border-secondary">
                                <thead>
                                    <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Date 1</td>
                                    <td>Name 1</td>
                                    <td>Service 1</td>
                                    <td>Gender 1</td>
                                    <td>Price 1</td>
                                    </tr>
                                </tbody>
                            </table>

                        <div class="">
                            <label for="ClinicVisit" class="form-label">Patient Medical History</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <p>Employee involved:</p>
                            <table class=" col-3 table table-hover border border-2 border-secondary">
                                <thead>
                                    <tr>
                                    <th scope="col">Dentist</th>
                                    <td>Dentist 1</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="col">Clinic Assistant</th>
                                    <td>Clinic Assistant 1</td>
                                    </tr>
                                </tbody>
                            </table>

                        <div class="">
                            <label for="ClinicVisit" class="form-label">Dentist Remark</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="row align-items-center mt-3">
                            <div class="col-3">
                                <a class="btn btn-secondary"  href="dentistViewnSearchAppointment.php" onclick="alert('Treatment details Created!')">Confirm</a>
                            </div>
                        </div>
            </div>
    </div>
</body>
</html>





