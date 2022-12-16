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
                        <a class="nav-link" href="clinicassistant-HomePage.php">Home</a>
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
                        <a class="nav-link active" aria-current="page" href="clinicassistant-bills.php">Billing</a>
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
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Billing List</div>
        <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row"></div>
                    <div class="col-6 col-sm-3 pt-2">Patient Name:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="name3" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">NRIC:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="S8825463G" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">Date:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="10/12/2022" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">Time:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="20:00" disabled>
                            </div>
						<label for="servicelist" class="col-6 col-sm-3 pt-2">Services:</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" aria-label="Services Done" value="Braces" disabled>
						</div>
							<div class="col-6 col-sm-3 pt-2">Total Cost:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" aria-label="Name">
                            </div>
                        <div class="pt-3">
                            <label for="ClinicVisit" class="form-label">Bill Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                    <div class="row align-items-center justify-content-center pt-2">
                        <div class="col-2">
                        <a class="btn btn-danger" href="clinicassistant-bills.php">Back</a>
                        </div>
                        <div class="col-2">
                        <a class="btn btn-primary" href="clinicassistant-bills.php" onclick="alert('Bill Send!')">Confirm</a>
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