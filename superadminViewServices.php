<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>superadmin-ViewServices</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="images/superDentalLogo.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                    DiamondDental™
                </a>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="superadminHomepage.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Our Partners</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">For Patients</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#">For Clinics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="superadminViewServices.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="superadminClinicAccountApplication.php">Application</a>
					</li>
                </ul>
                <ul class="navbar-nav d-flex mb-2 mb-md-0">
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
    <div class="container-lg">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold"> Services</div>
            <table class="table table-hover table-secondary table-striped border border-3">
                <thead>
                        <tr>
                            <th scope="col">Services</th>
                            <th scope="col">Status</th>
                        </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>Service 1</td>
                            <td>Suspend</td>
                        </tr>
                        <tr>
                            <td>Service 2</td>
                            <td>Open</td>
                        </tr>
                        <tr>
                            <td>Service 3</td>
                            <td>Suspend</td>
                        </tr>
                        <tr>
                            <td>Service 4</td>
                            <td>Open</td>
                        </tr>
                </tbody>
            </table>
            <div class="row align-items-center">
                <div class="col-6">
                <a class="btn btn-secondary" href="superadminCreateService.php">Add a New Service</a>
                </div>
                <div class="col-6">
                <a class="btn btn-secondary"  href="superadminUpdateService.php">Update Service</a>
                </div>
            </div>
        </div>
    </body>
</html>