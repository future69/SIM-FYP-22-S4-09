<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant View Services</title>
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
                        <a class="nav-link active" aria-current="page" href="clinicassistant-ViewService.php">Services</a>
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
                        <a class="nav-link"  href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="index.php">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
<body>
<div class="container-lg">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Services</div>
        <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <!-- Force next columns to break to new line -->
                            <div class="input-group col-3 col-sm-3 ">
                            <table class="table table-hover table-secondary table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Service</th>
                                    <th scope="col">Types of Services available</th>
                                    <th scope="col">Quotation of Services</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Service 1</td>
                                        <td>$100 - $150</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Service 2</td>
                                        <td>$200 - $250</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Service 3</td>
                                        <td>$300 - $350</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Service 4</td>
                                        <td>$400 - $450</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Service 5</td>
                                        <td>$500 - $550</td>
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
</body>
</html>