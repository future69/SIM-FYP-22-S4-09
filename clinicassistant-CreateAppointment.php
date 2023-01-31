<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
    <title>Clinic Assistant Create Appointment</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/superDentalLogo.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
                DiamondDental™
            </a>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-HomePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-PatientList.php">View Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clinicassistant-ViewService.php">Services</a>
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

    $servername = "dentalhealthapplicationdb";

    //create connection
    $con = new mysqli('localhost', 'root', '', $servername);

    if (!$con) {
        die(mysqli_error($con));
    } else {
    }

    if (isset($_POST['submitAppt'])) {

        //Value is at the input boxes incase of wrong entry, dont have to retype 
        //Declaring, removing backslashes and whitespaces
        //$ClinicName = stripslashes($_POST['HiddenCname']);
        $nric = stripslashes($_POST['PNRICTB']);
        $DentistSlotSL = stripslashes($_POST['DentistSlotSL']);
        $Date = stripslashes($_POST['DateTB']);
        $timeSlot = stripslashes($_POST['timeSlotSL']);
        $Reason = stripslashes($_POST['PReasonTB']);

        //Remove whitespaces
        //$ClinicName = trim($_POST['HiddenCname']);
        $nric = trim($_POST['PNRICTB']);
        $DentistSlotSL = trim($_POST['DentistSlotSL']);
        $Date = trim($_POST['DateTB']);
        $timeSlot = trim($_POST['timeSlotSL']);
        $Reason = trim($_POST['PReasonTB']);

        $SQLstring = "INSERT INTO appointment " . " (nric, apptDentist, apptDate, apptTime, apptReason) " . " VALUES( '$nric', '$DentistSlotSL', '$Date', '$timeSlot', '$Reason')";

        mysqli_query($con, $SQLstring);
        mysqli_close($con);

        echo "Appointment Creation Successfully";
    } else {

    }

    ?>
</header>

<body>
    <div class="container-lg">
        <form method="POST">
            <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Create Appointment</div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
                <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                    <div class="container">
                        <div class="row"></div>
                        <div class="col-6 col-sm-3">Patient Name:</div>
                        <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" id="PNameTB" name="PNameTB" placeholder="Patient Name" aria-label="Name" aria-describedby="basic-addon1" disabled>
                        </div>
                        <div class="col-6 col-sm-3 pt-3">NRIC:</div>
                        <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" id="PNRICTB" name="PNRICTB" placeholder="NRIC" aria-label="NRIC" aria-describedby="basic-addon1" autocomplete="off">
                        </div>
                        <div class="col-6 col-sm-3 pt-3">Clinic name:</div>
                        <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" id="ClinicNameTB" name="ClinicNameTB" value="Tan Tock Seng" aria-label="NRIC" aria-describedby="basic-addon1" disabled>
                            <input type="hidden" id="HiddenCname" name="HiddenCname" value="Tan Tock Seng" />
                        </div>
                        <div class="col-6 col-sm-3 pt-3">
                            <label for="DentistSlotSL" id="DentistSlotSL" class="col-lg col-form-label">Dentist name:</label>
                            <select class="form-select" id="DentistSlotSL" name="DentistSlotSL">
                                <option selected>Select Dentist</option>
                                <option value="John Lee">John Lee</option>
                                <option value="Mary Doe">Mary Doe</option>
                                <option value="Sue Strong">Sue Strong</option>
                            </select>
                        </div>

                        <div class="col-6 col-sm-3 pt-3">Date:</div>
                        <div class="input-group col-3 col-sm-3">
                            <input type="date" class="form-control" id="DateTB" name="DateTB" placeholder="datetime" aria-label="datetime " aria-describedby="basic-addon1">
                        </div>
                        <div class="col-6 col-sm-3 pt-3">
                            <label for="timeSlotSL" id="timeSlotSL" class="col-lg col-form-label">Time Slot:</label>
                            <select class="form-select" id="timeSlotSL" name="timeSlotSL">
                                <option selected>Select Time Slot</option>
                                <option value="8.00">8:00</option>
                                <option value="9.00">9:00</option>
                                <option value="10.00">10:00</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-3 pt-2">Reason:</div>
                        <div class="input-group col-3 col-sm-3">
                            <input type="text" class="form-control" id="PReasonTB" name="PReasonTB" placeholder="" aria-label="Reason" aria-describedby="basic-addon1" autocomplete="off">
                        </div>
                        <div class="col mt-3 d-flex">Email Reminder
                            <div class="form-check me-5 ms-3">
                                <input class="form-check-input" type="radio" id="Emailreminder" name="Emailreminder" value="Yes">
                                <label class="form-check-label" for="Emailreminder">
                                    subscribe to email reminder
                                </label>
                            </div>
                        </div>

                        <div class="row align-items-center mt-3">
                            <div class="d-grid gap-2 d-md-flex py-2">
                                <button class="btn btn-danger" name="back" value="back">Back</button>
                                <button type="submit" class="btn btn-primary" id="submitAppt" name="submitAppt" value="submit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
            </div>
        </form>
    </div>
</body>

</html>