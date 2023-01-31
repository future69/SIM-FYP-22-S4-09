<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Billing</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
                DiamondDental™
            </a>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="ClinicAssistant-HomePage.php">Home</a>
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
                        <a class="nav-link active"  aria-current="page" href="clinicassistant-Billing.php">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant Sam</a>
                    </li>
					<li class="nav-item d-flex">
                        <a class="nav-link " href="clinicassistant-PersonalProfile.php">Profile</a>
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
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Billing List</div>
        <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row"></div>
                    <div class="col-6 col-sm-3">Patient Name:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Patient Name" disabled aria-label="Name" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3">NRIC:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="NRIC" aria-label="Name" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3 pt-3">Date and Time:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="datetime-local" class="form-control" disabled placeholder="datetime" aria-label="datetime " aria-describedby="basic-addon1">
                            </div>
						<label for="servicelist" class="col-6 col-sm-3 pt-3">Service List:</label>
						<div class="col-lg-4">
							<select class="form-select" class="form-select" aria-label="Select gender" name="clinicNameSL" id="clinicNameSL">
								<option value="plceaholder">Service 1</option>
								<option value="plceaholder">Service 2</option>
								<option value="plceaholder">Service 3</option>
							</select>
						</div>
                            <div class="input-group col-3 col-sm-3">
                            <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        <div class="pt-3">
                            <label for="ClinicVisit" class="form-label">Bill Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-3">
                        <a class="btn btn-primary"  href="clinicassistant-Homepage.php" onclick="alert('Bill Send!')">Confirm</a>
                        </div>
                        <div class="col-3">
                        <a class="btn btn-danger"  href="clinicassistant-Homepage.php"  onclick="alert('Bill Cancelled Canceled!')">Back</a>
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