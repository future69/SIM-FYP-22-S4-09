<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>superadmin-UpdateCAAcount</title>
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
						<a class="nav-link active" aria-current="page" href="superadminViewCAAccount.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="superadminClinicAccountApplication.php">Application</a>
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
</head>
<?php
    $errorMessage = null;
    try	{
        $clinicAccountUsername = $_GET['clinicAccountUsername'];
        $DBName = "u418115598_dentalapp";
        $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
        //Name of the table 
        $TableNameClinic = "clinic";
        $TableNameUseraccount = "useraccount";

        $SQLstring = "SELECT * FROM $TableNameClinic INNER JOIN $TableNameUseraccount 
        ON clinic.username = useraccount.username WHERE clinic.username = '" . $clinicAccountUsername . "'";
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
			$DBName = "u418115598_dentalapp";
			$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);

            $TableNameUseraccount = "useraccount";

            if($cbValue == "checkboxApprove") {
                $accStatus = 'active';
                $SQLstring = "UPDATE $TableNameUseraccount SET accStatus='" . $accStatus . "' WHERE username='" . $clinicAccountUsername . "'";
                mysqli_query($conn, $SQLstring);
                echo "<meta http-equiv='refresh' content='0'>";
                echo "<script>alert('Status Updated');</script>";
            }
            else if($cbValue == "checkboxReject"){
                $accStatus = 'suspended';
                $SQLstring = "UPDATE $TableNameUseraccount SET accStatus='" . $accStatus . "' WHERE username='" . $clinicAccountUsername . "'";
                mysqli_query($conn, $SQLstring);
                echo "<meta http-equiv='refresh' content='0'>";
                echo "<script>alert('Status Updated');</script>";
            }
            else {
                $errorMessage = "No changes made";
            }
        }
        if (isset($_POST['back'])) {
            header("Location:superadminViewCAAccount.php");
        }
    ?>
<body>
    <div class="registrationBoxPatient container">
        <div class="row justify-content-center align-items-center">
            <form method="POST">
                <div class="row justify-content-center">
                    <div class="row col-4 mt-4 mb-4">
                        <h1>Clinic Account</h1>
                    </div>
                </div>
                    <div class="row justify-content-center align-items-center py-2">
                    <label for="usernameTB" class="col-lg-1 col-form-label">Username:</label>
                    <div class="col-lg-4">
                        <input class="form-control" id="usernameTB" value="<?php echo $rows['username'];?>" disabled>
                    </div>
                    </div>
                    <div class="row justify-content-center align-items-center py-2">
                    <label for="clinicNameTB" class="col-lg-1 col-form-label">Clinic Name:</label>
                    <div class="col-lg-4">
                        <input class="form-control" id="clinicNameTB" value="<?php echo $rows['clinicName'];?>" disabled>
                    </div>
                    </div>
                    <div class="row justify-content-center align-items-center py-2 mb-4">
                    <label for="flexRadioDefault1" class="col-lg-1 col-form-label">Account Status:</label>
                    <div class="col-lg-4">
                    <div class="form-check me-5" >
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" value="checkboxApprove" <?php if ($rows['accStatus'] == 'active') echo "checked='checked'"; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active   
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" value="checkboxReject" <?php if ($rows['accStatus'] == 'suspended') echo "checked='checked'"; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Suspended
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
	</body>
</html>