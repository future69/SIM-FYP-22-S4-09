<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Patient List</title>
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
                        <a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
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
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Patient Account</div>
        <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-3">Patient Search:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Search by Name or NRIC" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        <div class="mt-4 text-center p-3">
                            <a href="clinicassistant-CreatePatient.php" class="btn btn-secondary">Create Patient Account</a>
                        </div>

                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>

                        <div class="justify-content-center d-flex mt-4 p-2">Result(s)</div>
                            <div class="input-group col-3 col-sm-3 border border-2 border-secondary">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">NRIC</th>
                                    <th scope="col">Date of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                        <a href="clinicassistant-PatientDetails.php">John</a>
                                    </td>
                                    <td>S12345678C</td>
                                    <td>12-05-1996</td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <a href="clinicassistant-PatientDetails.php">Mary</a>
                                    </td>
                                    <td>S98765432G</td>
                                    <td>23-03-1992</td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <a href="clinicassistant-PatientDetails.php">Doe</a>
                                    </td>
                                    <td>S85643721H</td>
                                    <td>15-09-1992</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
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