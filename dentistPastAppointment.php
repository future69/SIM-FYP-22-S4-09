<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Dentist Past Appointment</title>
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
								<a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
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
<div class="column">
				<div class="col-md-5 text-start pt-5">
					<div class="display-6">Welcome Dr. Lee</div>
				</div>
			</div>
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Appointment List</div>
                <div class="col-md-2">
                    <!--Contatiner control-->
                </div>
            <div class="col border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-6">Search by Name or NRIC:</div>
                            <div class="input-group col-3 col-sm-3 pt-1">
                            <input type="text" class="form-control" placeholder="Search by Name or NRIC" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>
                        <div class="btn-group col-md-4 mt-4 mb-4" role="group" aria-label="Basic radio toggle button group">
                        <a href="dentistViewnSearchAppointment.php" class="btn btn-Primary">Existing Appointment</a>
                            <a href="dentistPastAppointment.php" class="btn btn-Danger">Past Appointment</a>
                        </div>

                            <div class="input-group col-3 col-sm-3 border border-2 border-secondary">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">NRIC</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>John</td>
                                    <td>S12345678G</td>
                                    <td>12/03/2022</td>
                                    <td>1:20pm</td>
                                    <td> 
                                        <a href="dentistViewATD.php" class="btn btn-secondary btn-block">View Appointment Treatment Details</a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Mary</td>
                                    <td>S87654321C</td>
                                    <td>22/10/2022</td>
                                    <td>3:20pm</td>
                                    <td> 
                                        <a href="dentistViewATD.php" class="btn btn-secondary btn-block">View Appointment Treatment Details</a>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
                <div class="col-md-2">
                    <!--Contatiner control-->
                </div>
            </div>
    </div>
</body>
</html>