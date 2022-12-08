<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Dentist Create Appointment</title>
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
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Create Appointment</div>
        <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row"></div>
                    <div class="col-6 col-sm-3">Name:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Patient Name" aria-label="Name" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3 pt-3">NRIC:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="NRIC" aria-label="NRIC" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3 pt-3">Clinic Name:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Name" aria-label="Number" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3 pt-3">Date and Time:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="date" class="form-control" placeholder="date" aria-label="datetime " aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3 pt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Time
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">10am to 11am</a></li>
                                <li><a class="dropdown-item" href="#">1pm to 2pm</a></li>
                                <li><a class="dropdown-item" href="#">2pm to 3pm</a></li>
                                <li><a class="dropdown-item" href="#">4pm to 5pm</a></li>
                                <li><a class="dropdown-item" href="#">5pm to 6pm</a></li>
                            </ul>
                            </div>

                        <div class="col-6 col-sm-3 pt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Reason of Appointment
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Service 1</a></li>
                                <li><a class="dropdown-item" href="#">Service 2</a></li>
                                <li><a class="dropdown-item" href="#">Service 3</a></li>
                            </ul>
                            </div>
                        <div class="col mt-3 d-flex">Email Reminder
                            <div class="form-check me-5 ms-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    subscribe to email reminder  
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7 pt-3">
                        <a href="dentistViewATD.php" class="btn btn-info btn-block">Create Appointment Treatment Details</a>
                        </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-md-3">
                        <a class="btn btn-primary"  href="dentistViewnSearchAppointment.php" onclick="alert('Appointment Created!')">Confirm</a>
                        </div>
                        <div class="col-md-3">
                        <a class="btn btn-danger"  href="dentistViewnSearchAppointment.php"  onclick="alert('Appointment Canceled!')">Back</a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            </div>
    </div>
</body>
</html>