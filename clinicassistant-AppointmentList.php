<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>clinic Assistant Appointment List</title>
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
                        <a class="nav-link active" aria-current="page" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-ATL.php">Appointment Treatment list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-Billing.php">Billing</a>
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
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Existing Appointment</div>
        <div class="row">
                <div class="col-md-1">
                    <!--Contatiner control-->
            </div>
            <div class="col border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                    <p class="">
                        Can't find your patients appointment? Create an appointment for them here:
                        <a href="clinicassistant-CreateAppointment.php" class="btn btn-secondary btn-block">Create Appointment</a>
                    </p>

                    <div class="w-100"></div>
                        <div class="col-6">Search Appointment:</div>
                            <div class="input-group col-3 col-sm-3 pt-1">
                            <input type="text" class="form-control" placeholder="Search by Name" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        <div class="mt-4 text-center p-3">
                            <!--<a href="dentistCreateAppointment.php" class="btn btn-secondary">Create Appointment</a>-->
                        </div>

                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>
                        <div class="btn-group col-md-4" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-Primary" for="btnradio1">Existing Appointment</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" >
                        <label class="btn btn-outline-danger" for="btnradio2">Past Appointment</label>
                        </div>
                        
                        <div class="justify-content-center d-flex mt-4 p-2">Result(s)</div>
                            <div class="input-group col-3 col-sm-3 border border-2 border-secondary">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">NRIC</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>John</td>
                                    <td>S12345678G</td>
                                    <td>12/03/2022</td>
                                    <td>1:20pm</td>
                                    <td>85264317</td>
                                    <td>Ongoing</td>
                                    <td> 
                                        <a href="clinicassistant-UpdateAppointment.php" class="btn btn-secondary btn-block col">Update Appointment</a>
                                        <a href="#" class="btn btn-secondary btn-block col" onclick="alert('Appointment Deleted!')">Delete Appointment</a>
                                        <div class="w-100 p-2"></div>
                                        <a href="clinicassistant-ATD.php" class="btn btn-secondary btn-block">View Appointment Treatment Details</a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Mary</td>
                                    <td>S87654321C</td>
                                    <td>22/10/2022</td>
                                    <td>3:20pm</td>
                                    <td>85242517</td>
                                    <td>Today</td>
                                    <td> 
                                        <a href="clinicassistant-UpdateAppointment.php" class="btn btn-secondary btn-block col">Update Appointment</a>
                                        <a href="#" class="btn btn-secondary btn-block col" onclick="alert('Appointment Deleted!')">Delete Appointment</a>
                                        <div class="w-100 p-2"></div>
                                        <a href="#" class="btn btn-secondary btn-block">View Appointment Treatment Details</a>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <p class="mt-3">
                                Can't find your patients appointment treatment details? Create an appointment details for them here:
                                <a href="clinicassistant-ATD.php" class="btn btn-secondary btn-block">Create Appointment Treatment Details</a>
                                </p>
                    </div>
                </div>
            </div>
                <div class="col-md-1">
                    <!--Contatiner control-->
                </div>
            </div>
    </div>
</body>
</html>