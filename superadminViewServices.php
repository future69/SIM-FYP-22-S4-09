<?php
ob_start();
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <script>
		//AJAX function for onclick feature (Get timing)
		function setServiceStatus(serviceNameValue){
            //Get service name followed by status, etc Braces,suspended
            //Proceed to split them and assign them to different variables
            const serviceNameValueArray = serviceNameValue.split(",");
            var serviceName = serviceNameValueArray[0];
            var serviceValue = serviceNameValueArray[1];
			//console.log(serviceName);
            //console.log(serviceValue);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200){
				}
			};
			xmlhttp.open("GET", "superadminViewServicesAjaxStatusChange.php?q=" + serviceName + "&w=" + serviceValue, true);
			xmlhttp.send();
		}
    </script>
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
                            <a class="nav-link active"  aria-current="page" href="superadminViewServices.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="superadminViewCAAccount.php">Accounts</a>
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
</header>
<?php
	//This try block will be execute once the user enters the page
	try	{
		$DBName = "u418115598_dentalapp";
        $conn = mysqli_connect("localhost","u418115598_superuser","HjOSN8hM*", $DBName);
		$TableNameService = "service";

		//The lines to run in sql (get current applications)
		$SQLstring = "SELECT * FROM $TableNameService";
		//Executing the sql
		$queryResult = mysqli_query($conn, $SQLstring);
		} 	
		catch(mysqli_sql_exception $e) {
				echo "Error";
	}
    if (isset($_POST['createService'])) {
	    header("Location:superadminCreateService.php");
    }
	?>
<body>
    <div class="container-lg">
        <div class="row justify-content-center align-items-center pt-5">
        </div>
        <div class="row justify-content-center align-items-center pt-5">
            <div class="row col-12">
                <div class="row col-6 display-4">Services</div>
                <div class="row col-2 justify-content-start align-items-start">
                    <form method="POST">
                        <button type="submit" name="createService" class="btn btn-primary">Create Service</button>
                    </form>
                </div>
                <table class="table table-hover table-secondary table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Service Name</th>
                            <th scope="col">Status</th>
                        <tr>
                    </thead>
                    <tbody>
                        <?php
                            while($rows = mysqli_fetch_array($queryResult))
                            {
                            $rbCounter = 0;
                        ?>
                        <tr>
                        <td><?php echo $rows['serviceName'];?></td>
                        <td>
                        <select class="form-select" name="serviceStatus" id="serviceStatus" onclick="setServiceStatus(this.value)">
                            <option value="<?php echo $rows['serviceName'];?>,active" <?php if($rows['serviceStatus'] == 'active'){ echo ' selected';} ?>>Active</option>
                            <option value="<?php echo $rows['serviceName'];?>,suspended" <?php if($rows['serviceStatus'] == 'suspended'){ echo ' selected';} ?>>Suspended</option>
                        </td>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>