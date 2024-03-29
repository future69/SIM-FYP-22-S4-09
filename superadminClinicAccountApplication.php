<?php
session_start();
if(empty($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == ''){
    header("Location:index.php");
    die();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>superadmin-ClinicAccountApp</title>
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
						<a class="nav-link " href="superadminViewServices.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="superadminClinicAccountApplication.php">Application</a>
					</li>
                </ul>
                <ul class="navbar-nav d-flex mb-2 mb-md-0">
					<li class="nav-item d-flex">
                        <a class="nav-link" href="#">Welcome Superadmin</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="index.php">Logout</a>
                     </li>
                 </ul>
            </div>
        </div>
     </nav>
		<div class="container-lg">
			<!-- Put this div outside the center alignment, for the welcome message plus bills -->
			<!-- Tablehead can put caption-top -->
			<div class="row justify-content-center align-items-center pt-3">
				<div class="col-md-5 text-center text-md-start">
					<!--original spot-->
					<!--<div class="display-6">Welcome Super Admin</div>-->
				</div>
			</div>
			<div class="row justify-content-center align-items-center pt-5">
				<div class="row">
					<div class="row display-6 justify-content-center align-items-center pb-5  display-6 fw-bold">Applications</div>
					<div class="row py-1">
					<div class="col-1 form-check fw-bold">Sort By :</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultInReviewAcc" value="inreview" checked>
						  <label class="form-check-label" for="flexRadioDefaultInReviewAcc"><strong>In-Review</strong></label>
						</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultApproveAcc" value="approved">
						  <label class="form-check-label" for="flexRadioDefaultApproveAcc"><strong>Approved</strong></label>
						</div>
						<div class="col-2 form-check">
						  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefaultRejectAcc" value="rejected">
						  <label class="form-check-label" for="flexRadioDefaultRejectAcc"><strong>Rejected</strong></label>
						</div>
					</div>
					<div id="result"></div>
					<!-- <table class="table table-hover table-secondary table-striped ">
						<thead>
							<tr>
								<th scope="col">Username</th>
								<th scope="col">Clinic Name</th>
								<th scope="col">ACRA</th>
								<th scope="col">Area</th>
								<th scope="col">Status</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> <a href="superadminClinicAAProfile.php" class="link-primary"> lohkintat22 </a></td>
								<td> clinic3 </td>
								<td> <a href="#" class="link-primary"> CD201554231D </a></td>
								<td> Central </td>
								<td>
								</td>
							</tr>
						</tbody>-->
					<script>
						$(document).ready(function() {	
							// Default value for each field
							let clinicStatus = $('input[type="radio"]:checked').val();
							load_data(clinicStatus);

							function load_data(clinicStatus) {
								$.ajax({
									url: "sa-CAAAppFilter.php",
									method: "POST",
									data: {
										clinicStatus: clinicStatus
									},
									success: function(data) {
										$('#result').html(data);
									}
								});
							}

							// This is for radio button (Clinic Acc Status)
							$('input[type="radio"]').change(function() {
								clinicStatus = $('input[type="radio"]:checked').val();

								load_data(clinicStatus);
							});		
						});
					</script>
				</div>
			</div>
		</div>
</body>
</html>