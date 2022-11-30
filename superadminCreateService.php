<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>superadmin-CreateService</title>
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
                        <a class="nav-link " href="superadminHomepage.php">Home</a>
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
						<a class="nav-link" href="superadminViewCAAccount.php">For Clinics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="superadminViewServices.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Application</a>
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
        <div class="fw-bold pt-5">Welcome Admin</div>
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Create Services</div>
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-3">Services</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Add a Service" aria-label="Add a Service" aria-describedby="basic-addon1">
                            </div>

                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>

                        <div class="col-6 col-sm-3">Status</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" placeholder="Open or Suspend" aria-label="Open or Suspend" aria-describedby="basic-addon1">
                            </div>
                    </div>
                    <div class="mt-4 text-center p-3">
                        <a href="superadminViewServices.php" class="btn btn-secondary" onclick="alert('Services added!')">Submit</a>
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