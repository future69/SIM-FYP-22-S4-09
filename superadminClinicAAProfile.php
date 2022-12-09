<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>superadmin-Clinic account application profile</title>
</head>
<header>
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
						<a class="nav-link " href="">For Clinics</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="superadminViewServices.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="superadminClinicAccountApplication.php">Application</a>
					</li>
                </ul>
                <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Welcome Superadmin</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Logout</a>
                     </li>
                 </ul>
            </div>
        </div>
     </nav>
</header>   
        <?php
            if (isset($_POST['Update'])) {
                header("Location:superadminClinicAccountApplication.php");
			}
        ?>
<body>
		<div class="registrationBoxPatient container">
			<div class="row justify-content-center align-items-center">
				<form method="POST">
					<div class="row justify-content-center">
						<div class="row col-4 mt-4 mb-4">
							<h1>Application Profile</h1>
						</div>
					</div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="Username 1" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="Clinic 1" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label" >Clinic Address:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="address 1" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="6000" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Area:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="West" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="8888 8888" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Email:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="clinic1@email.com" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Service offered:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="Service1, Service2, Service 3" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">ACRA:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="acra1.png" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Opening Hours:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="openingtime" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Closing Hours:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="closingtime" disabled>
						</div>
					  </div>

                      <div class="row justify-content-center align-items-center py-2 mb-4">
						<label for="passwordTB" class="col-lg-1 col-form-label">Application Status:</label>
						<div class="col-lg-4">
                        <div class="form-check me-5" >
                                        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                        Active   
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Suspend
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            In Review
                                        </label>
                                    </div>
						</div>
					  </div>

					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
						<button class="btn btn-Primary" name="Update" value="Update">Update</button>
					  </div>
					</form>
				</div>
			</div>
	</body>
</html>