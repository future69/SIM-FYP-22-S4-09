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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/loginCSS.css" type="text/css" />
    <title>superadmin-CAaccount</title>
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

    <?php
    //Name of the table
    $DBName = "u418115598_dentalapp";
    $conn = mysqli_connect("localhost", "u418115598_superuser", "HjOSN8hM*", $DBName) or die("Connection Failed");
    $sqlquery = "SELECT * from useraccount INNER JOIN clinic ON useraccount.username = clinic.username";
    $result = mysqli_query($conn, $sqlquery);

    ?>
    <form method="POST">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center pb-3 p-2 display-6 fw-bold">Clinic Admin Account</div>
            <div class="">
                <div class="row">
                    <div class="col-md-3">
                        <!--Contatiner control-->
                    </div>
                    <div class="col-md-6 border border-3 p-3 justify-content-center d-flex">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-sm-5">Search Clinic Admin Account:</div>
                                <div class="input-group col-3 col-sm-3">
                                    <input type="text" class="search_admin form-control" id="search_admin" placeholder="Search by Clinic name" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <!-- Force next columns to break to new line -->
                                <div class="w-100"></div>

                                <div class="justify-content-center d-flex mt-4 p-2">Result(s)</div>
                                <div class="border border-2 border-secondary">
                                    <div id="result_admin" class="align-middle"></div>
                                </div>
                            </div>
                            <div class="text-center p-3">
                                <!-- <a href="superadminCreateCAAcount.php" class="btn btn-secondary">Create Clinic Admin Account</a> -->
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
                    url: "cadmin-livesearch.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result_admin').html(data);
                    }
                });
            }
            $('#search_admin').keyup(function() {
                var search_admin = $(this).val();
                if (search_admin != '') {
                    load_data(search_admin);
                } else {
                    load_data();
                }
            });
        });
    </script>

</body>

</html>