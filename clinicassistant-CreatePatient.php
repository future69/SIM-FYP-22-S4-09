<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Create Patient</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/superDentalLogo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                Diamond Dental
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
                        <a class="nav-link" href="clinicassistant-ATL.php">Appointment Treatment list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-PastAppointment.php">Appointment History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
<body>
<div class="container-lg">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Patient Account Creation</div>
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-3">Username:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3">Password:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3">NRIC:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="NRIC" aria-label="NRIC" aria-describedby="basic-addon1">
                            </div>
                        <div class="col-6 col-sm-3">Date of Births:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="DOB" aria-label="DOB" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-6 col-sm-3">Gender</div>
                            <div class="input-group col-3 col-sm-3">
                            <div class="form-check me-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male   
                                </label>
                            </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                            </div>
                    </div>
                        <div class="col-6 col-sm-3">Email:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                            </div>
                        <div class="mt-4 text-center p-3">
                            <a href="clinicassistant-PatientList.php" class="btn btn-secondary" onclick="alert('Patient Account Created!')">Create Account</a>
                        </div>

                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>
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