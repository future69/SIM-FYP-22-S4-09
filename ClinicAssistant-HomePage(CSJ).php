<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
<body>  
    
        <span class="border">
            <div class="container row align-item-start">
                <h2>Welcome Clinic Assistant</h2>
                <p>Appointment as of DD/MM/YYYY</P>
            </div>
        </span>
        <div class="container">
        <p>List of Current Appointment </p>
        <table class="table table table-striped table-hover table-bordered border-dark table-sm justify-content-center">
            <thead>
                <tr>
                    <th scope="col">Types of Services</td>
                    <th scope="col">Patient Name</td>
                    <th scope="col">Date & Time</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Service 1</td>
                    <td>Patient 1</td>
                    <td>10/10/2022</td>
                </tr>
                <tr>
                    <td>Service 2</td>
                    <td>Patient 2</td>
                    <td>11/11/2022</td>
                </tr>
                <tr>
                    <td>Service 3</td>
                    <td>Patient 3</td>
                    <td>12/12/2022</td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>
</html>