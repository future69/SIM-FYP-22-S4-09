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
                <img src="images/superDentalLogo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
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
            <div class="column">
            <div class="col-md-5 text-start pt-5">
                <div class="container row align-item-start">
                        <h2>Welcome Clinic Assistant</h2>
                        <p>Appointment as of DD/MM/YYYY</P>
                    </div>
                </div>
            </div>
                <div class="container">
                <p>List of Current Appointment </p>
                <table class="table table table-striped table-hover table-bordered border-dark justify-content-center">
                    <thead>
                        <tr>
                            <th scope="col">Patient Name</td>
                            <th scope="col">NRIC</td>
                            <th scope="col">Date & Time</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Patient 1</td>
                            <td>NRIC 1</td>
                            <td>10/10/2022 : 1pm to 2pm</td>
                        </tr>
                        <tr>
                            <td>Patient 2</td>
                            <td>NRIC 2</td>
                            <td>11/11/2022 : 3pm to 4pm</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
    </body>
</html>