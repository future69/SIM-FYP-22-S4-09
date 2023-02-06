<?php
session_start();
$dentistFullname = $_SESSION['dentistFullname'];
$dentistPracNum = $_SESSION['dentistPracNum'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
    <title>Dentist Search Patient</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="">
            <img class="d-inline-block align-top" src="images/superDentalLogo.png" width="50" height="40" />
            DiamondDental™
        </a>
        <div class="collapse navbar-collapse" id="navigationBar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dentistHomepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dentistViewnSearchAppointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dentistSearchPatient.php">Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dentistViewService.php">Services</a>
                </li>
            </ul>
        </div>
        <div class="me-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Dr. Lee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dentistPersonalProfile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
$servername = "dentalhealthapplicationdb";

//Name of the table
$DBName = "u418115598_dentalapp";
$conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");
$sqlquery = "SELECT ua.* , pp.* FROM useraccount ua, patientprofile pp WHERE ua.nric = pp.nric";
$result = mysqli_query($conn, $sqlquery);

?>

<body>
    <form method="POST">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Patient List</div>
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

                            <!-- Force next columns to break to new line -->
                            <div class="w-100 mt-5"></div>
                            <div class="border border-2 border-secondary">
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
                    url: "dentist-livesearch.php",
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