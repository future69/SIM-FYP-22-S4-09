<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
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
		$errorMessage = null;

		try	{
			$applicationAcraNum = $_GET['acraNum'];
			$DBName = "u418115598_dentalapp";
			$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
			//Name of the table 
			$TableNameClinic = "clinic";
			//The lines to run in sql (get current applications)
			//$SQLstring = "SELECT useraccount.username, clinic.clinicName, clinic.acraNum, clinic.clinicArea FROM $TableNameUseraccount INNER JOIN $TableNameClinic ON useraccount.username = clinic.username WHERE clinic.clinicStatus = 'inreview'";	
			$SQLstring = "SELECT * FROM $TableNameClinic WHERE acraNum='". $applicationAcraNum ."'";
			//Executing the sql
			$queryResult = mysqli_query($conn, $SQLstring);
			$rows = mysqli_fetch_array($queryResult);
			} 	
			catch(mysqli_sql_exception $e) 
			{
					echo "Error";
			}

            if (isset($_POST['updateClinicStatus'])) {
				$cbValue = $_POST['flexRadioDefault1'];
				echo $cbValue;
				$DBName = "dentalhealthapplicationdb";
				$conn = mysqli_connect("localhost", "root", "",$DBName );

				//Name of the table 
				$TableNameClinic = "clinic";
				$TableNameUseraccount = "useraccount";

				$username = $rows['username'];

				if($cbValue == "checkboxApprove") {
					$clinicStatus = 'approved';
					$accStatus = 'active';
					$SQLstring = "UPDATE $TableNameClinic SET clinicStatus='" . $clinicStatus . "' WHERE acraNum='" . $applicationAcraNum . "'";
					$SQLstring2 = "UPDATE $TableNameUseraccount SET accStatus='" . $accStatus . "' WHERE username='" . $username . "'";
					mysqli_query($conn, $SQLstring);
					mysqli_query($conn, $SQLstring2);
					$errorMessage = "Application approved!";
				}
				else if($cbValue == "checkboxReject"){
					$clinicStatus = 'rejected';
					$SQLstring = "UPDATE $TableNameClinic SET clinicStatus='" . $clinicStatus . "' WHERE acraNum='" . $applicationAcraNum . "'";
					mysqli_query($conn, $SQLstring);
					$errorMessage = "Application rejected!";
				}
				else {
					$errorMessage = "No changes made";
				}
			}
			if (isset($_POST['back'])) {
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
						  <input class="form-control" id="usernameTB" value="<?php echo $rows['username'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Name:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicName'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="usernameTB" class="col-lg-1 col-form-label" >Clinic Address:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="usernameTB" value="<?php echo $rows['clinicAddress'];?>" disabled>
						</div>
					  </div>
					  <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Postal Code:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicPostal'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Area:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicArea'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Phone Number:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicPhoneNum'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Clinic Email:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicEmail'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Service offered:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['servicesSelected'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">ACRA:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['acraNum'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Opening Hours:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicOpeningHour'];?>" disabled>
						</div>
					  </div>
                      <div class="row justify-content-center align-items-center py-2">
						<label for="passwordTB" class="col-lg-1 col-form-label">Closing Hours:</label>
						<div class="col-lg-4">
						  <input class="form-control" id="passwordTB" value="<?php echo $rows['clinicClosingHour'];?>" disabled>
						</div>
					  </div>

                      <div class="row justify-content-center align-items-center py-2 mb-4">
						<label for="passwordTB" class="col-lg-1 col-form-label">Application Status:</label>
						<div class="col-lg-4">
                        <div class="form-check me-5" >
							<div class="form-check">
								<input class="form-check-input" type="radio" name="flexRadioDefault1" value="checkboxApprove">
								<label class="form-check-label" for="flexRadioDefault1">
									Approve   
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="flexRadioDefault1" value="checkboxReject">
								<label class="form-check-label" for="flexRadioDefault1">
									Reject
								</label>
							</div>
							<div class="form-check"> 
								<input class="form-check-input" type="radio" name="flexRadioDefault1" value="checkboxInReview" checked>
								<label class="form-check-label" for="flexRadioDefault1">
									In Review
								</label>
							</div>	
						</div>
						</div>
					</div>
					<div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>
					  <div class="d-grid gap-2 d-md-flex justify-content-md-center py-2">
					  <button class="btn btn-Danger" name="back" value="back">Back</button>
					<button class="btn btn-Primary" name="updateClinicStatus" value="Update">Update</button>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>