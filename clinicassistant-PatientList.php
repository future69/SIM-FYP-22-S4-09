<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>Clinic Assistant Patient List</title>
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
                        <a class="nav-link" href="clinicassistant-AppointmentList.php">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="clinicassistant-PatientList.php">View Patient</a>
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
                        <a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php
$servername = "dentalhealthapplicationdb";

//Name of the table 
$con = mysqli_connect("localhost", "root", "", $servername) or die("Connection Failed");
$sqlquery = "SELECT ua.* , pp.* FROM useraccount ua, patientprofile pp WHERE ua.nric = pp.nric";
$result = mysqli_query($con, $sqlquery);

if (isset($_POST['createPatient'])) {
    header("Location:clinicassistant-CreatePatient.php");
}

?>

<body>


    <form method="POST">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Patient Account</div>
            <div class=""></div>
            <div class="row">
                <div class="col-md-3">
                    <!--Contatiner control-->
                </div>
                <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-sm-3">Search:</div>
                            <div class="input-group col-3 col-sm-3">
                                <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                            </div>
                            <div class="mt-4 text-center p-3">
                                <button type="submit" class="btn btn-Primary" name="createPatient">Create Patient Account</button>
                            </div>

                            <!-- Force next columns to break to new line -->
                            <div class="w-100"></div>
                            <div class="input-group col-3 col-sm-3 mt-4 p-2 border border-2 border-secondary">
                            <div id="result" class="align-middle"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <!--Contatiner control-->
            </div>
        </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "ca-livesearch.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>
</body>

</html>