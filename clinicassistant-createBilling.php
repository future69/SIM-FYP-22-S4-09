<?php 
session_start(); 
ob_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Billing</title>
</head>

<?php
$clinicAssistantFullname = $_SESSION['clinicAssistantFullname'];
?>

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
                        <a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-bills.php">Billing</a>
                    </li>
                 </ul>
                 <ul class="navbar-nav d-flex mb-2 mb-md-0">
                    <li class="nav-item d-flex">
						<a class="nav-link" href="#">Welcome Clinic Assistant <?php echo $clinicAssistantFullname ?></a>
                    </li>
					<li class="nav-item d-flex">
                        <a class="nav-link" href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="index.php">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
<?php 
	// executing try block
	try {
        //Declare errors
        $totalCostError = $billDescError = $errorMessage = null;

        $apptID = $_GET['apptID'];
		$DBName = "u418115598_dentalapp";
		$conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName) or die("Connection Failed");

		//Table name
		$TableNameAppointment = "appointment";
		$TableNameUA = "useraccount";

		//SQL query to get appt details
		$SQLstring = "SELECT * FROM $TableNameAppointment 
        INNER JOIN $TableNameUA ON useraccount.nric = appointment.nric
		WHERE apptID = '" . $apptID . "'";

		//Executing sql
		$queryResult = mysqli_query($conn, $SQLstring);
        $rows = mysqli_fetch_assoc($queryResult);

        //Declaring variables here first as cant take value from disabled inputs
        $patientName = $rows['fullName'];
        $patientNRIC = $rows['nric'];
        $apptDate = $rows['apptDate'];
        $apptTime = $rows['apptTime'];
        $apptServices = str_replace(' '," , ",$rows['serviceName']);
        $clinicName = $rows['clinicName'];

	} catch (mysqli_sql_exception $e) {
		echo "Error in retrieving or linking tables";
	}

    if (isset($_POST['btnCreate'])){

        $billDesc = stripslashes($_POST['billDescTA']);
        $billDesc = trim($_POST['billDescTA']);
        $totalCost = $_POST['totalCostTB'];

        //Method to validate entries
        function correctValidation(): int
        {
            //Keep track of total false, the number represents the numbers of inputs failed
            $totalFalseCount = 0;

            if (is_numeric($GLOBALS['totalCost']) == false) {
                $GLOBALS['totalCostError'] = "Please enter a valid number";
                $totalFalseCount++;
            }

            if (empty($GLOBALS['billDesc'])) {
                $GLOBALS['billDescError'] = "Please enter a value";
                $totalFalseCount++;
            }
            return $totalFalseCount;
        }

        if (correctValidation() > 0){
            $errorMessage = "Please complete all fields";
        } else {
            $TableNameBill = 'bill';
            $billStatus = 'unpaid';
            $billCreated = 1;

            //Insert bill into bill table
            $SQLstring = "INSERT INTO $TableNameBill 
            (`apptID`, `clinicName`, `nric`, `billCost`, `billDescription`, `billStatus`)
            VALUES('$apptID','$clinicName','$patientNRIC','$totalCost','$billDesc','$billStatus')";
            mysqli_query($conn, $SQLstring);

            //Update appointment table that bill has been create (false=0,true=1)
            $SQLstring2 = "UPDATE $TableNameAppointment SET billCreated='$billCreated' WHERE apptID = '".$apptID."'";
            mysqli_query($conn, $SQLstring2);
            mysqli_close($conn);

            echo "<script>
            alert('Bill Created');
            window.location.href='clinicassistant-bills.php';
            </script>";
            }
        } else if (isset($_POST['btnBack'])){
            header("Location:clinicassistant-bills.php");
        }
?>
<body>
<div class="container-lg">
    <form method="POST">
        <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Billing List</div>
        <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                <div class="container">
                    <div class="row"></div>
                    <div class="col-6 col-sm-3 pt-2">Patient Name:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $patientName; ?>" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">NRIC:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $patientNRIC; ?>" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">Date:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $apptDate; ?>" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">Time:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $apptTime; ?>" disabled>
                            </div>
                        <div class="col-6 col-sm-3 pt-2">Services:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $apptServices; ?>" disabled>
                            </div>
						<div class="col-6 col-sm-3 pt-2">Total Cost:</div>
                            <div class="input-group col-3 col-sm-3">
                            <input type="number" class="form-control" name="totalCostTB" id="totalCostTB">
                            </div>
                            <div class="errorMessage">
							    <?php echo $totalCostError;?>
						    </div>
                        <div class="pt-3">
                            <label for="billDescTA" class="form-label">Bill Description:</label>
                            <textarea class="form-control" id="billDescTA" name="billDescTA" rows="3"></textarea>
                            <div class="errorMessage">
							    <?php echo $billDescError;?>
						    </div>
                        </div>
                        <div class="row errorMessage justify-content-center align-items-center py-2"><?php echo $errorMessage;?></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" id="btnBack" name="btnBack" value="btnBack">Back</button>
						<button class="btn btn-Primary" id="btnCreate" name="btnCreate" value="btnCreate">Create</button>
					</div>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>