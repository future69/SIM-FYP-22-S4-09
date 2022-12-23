<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="CSS/loginCSS.css" type="text/css"/>
    <title>Clinic Assistant Appointment Treatment Details</title>
</head>
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
                        <a class="nav-link"  href="clinicassistant-ViewService.php">Services</a>
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
                        <a class="nav-link " href="clinicassistant-PersonalProfile.php">Profile</a>
                    </li>
					<li class="nav-item d-flex">
                        <a class="nav-link" href="potentialPatientHomepage.php">Logout</a>
                    </li>
                 </ul>
            </div>
        </div>
    </nav>
	<?php 
			if (isset($_POST['update'])) {
				echo '<script>alert("Appointment Treatment Details updated!")</script>';
			}
			else if (isset($_POST['back'])) {
				header("Location:clinicassistant-AppointmentList.php");
			}
		?>
<body>
<div class="registrationBoxPatient container">
	<form method="POST">
			<div class="row justify-content-md-center align-items-center">
				<div class="row col-md-auto text-center pb-5">
					<div class="display-6">Appointment treatment details for name3</div>
				</div>
				<div class="row col-md-auto">
					<table class="table caption-top table-hover table-secondary table-striped ">
					<caption>Appointment Details</caption>
						<thead>
							<tr>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Dentist</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> 20/11/2022 </td>
								<td> 15:00 </td>
								<td> Dr. John Tan </td>
							</tr>
						</tbody>
					</table>
					<table class="table caption-top table-hover table-secondary table-striped ">
					<caption>Patient Details</caption>
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">NRIC</th>
								<th scope="col">Age</th>
								<th scope="col">Gender</th>
								<th scope="col">Allergy</th>
								<th scope="col">Medical History</th>
								<th scope="col">Treatment History</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td> name3 </td>
								<td> S2234567C </td>
								<td> 34 </td>
								<td> Male </td>
								<td>
									Penicillin,
									Epinphrine	
								</td>
								<td>
									<button type="submit" class="btn btn-secondary" name="viewMedHistory">View Records</button><br><br>
									<button type="submit" class="btn btn-info" name="updateMedHistory">Update Records</button>
								</td>
								<td>
									<button type="submit" class="btn btn-secondary" name="viewTreatHistory">View Records</button>
								</td>
							</tr>
						</tbody>
					</table>
					<script>
						var treatIndex = 2;
					</script>
					<table class="table caption-top table-hover table-secondary table-striped " id="treatTable">
					<caption>Service Details</caption>
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Service</th>
								<th scope="col">Location / Area</th>
								<th scope="col">Assistant</th>
								<th scope="col">Materials</th>
								<th scope="col">Procedure</th>
								<th scope="col">Notes</th>
							<tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>
								<select class="form-select" name="serviceSL" id="serviceSL" size="3">
									<option value="plceaholder">Decay Remover</option>
									<option value="plceaholder">Polishing</option>
									<option value="plceaholder">Tooth Remover</option>
								</select>
								</td>
								<td>
									<textarea class='form-control' id="serviceLocTA"></textarea>
								</td>
								<td>
								<select class="form-select" name="assistantSL" id="assistantSL" size="3" multiple>
									<option value="plceaholder">Jacob Lee</option>
									<option value="plceaholder">John Adams</option>
									<option value="plceaholder">Michelle Lee</option>
								</select>
								</td>
								<td>
								<select class="form-select" name="materialSL" id="materialSL" size="3" multiple>
									<option value="plceaholder">Resin composites</option>
									<option value="plceaholder">Amalgam alloys</option>
									<option value="plceaholder">Glass ionomers</option>
								</select>
								</td>
								<td>
								<textarea class="form-control" aria-label="With textarea" id="procedureTA" size="3" ></textarea>
								</td>
								<td>
								<textarea class="form-control" aria-label="With textarea" id="notesTA" size="3" ></textarea>
								</td>
								<script>
								/*$("select").mousedown(function(e){
									e.preventDefault();

									var select = this;
									var scroll = select.scrollTop;
									e.target.selected = !e.target.selected;

									setTimeout(function(){select.scrollTop = scroll;}, 0);

									$(select).focus();
								}).mousemove(function(e){e.preventDefault()});
								*/
								</script>
							</tr>
						</tbody>
					</table>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
					<button type="button" onclick="addRow()" class="btn btn-dark">+ More Service</button>
					</div>
					<script>
						function addRow() {
							treatIndex++;
							var table = document.getElementById("treatTable");
							var row = table.insertRow(treatIndex); 
							var cell0 = row.insertCell(0);
							var cell1 = row.insertCell(1);
							var cell2 = row.insertCell(2);
							var cell3 = row.insertCell(3);
							var cell4 = row.insertCell(4);
							var cell5 = row.insertCell(5);
							var cell6 = row.insertCell(6);
							treatIndex--;
							cell0.innerHTML = treatIndex;

							cell1.innerHTML = "<select class='form-select' name='serviceSL' id='serviceSL' size='3'>" +
												"<option value='plceaholder'>Decay Remover</option>" +
												"<option value='plceaholder'>Polishing</option>" +
												"<option value='plceaholder'>Tooth Remover</option>" +
											"</select>";
							cell2.innerHTML = "<td><textarea class='form-control' id='serviceLocTA'></textarea></td>";
							cell3.innerHTML = "<select class='form-select' name='assistantSL' id='assistantSL' size='3' multiple>" +
												"<option value='plceaholder'>Jacob Lee</option>" +
												"<option value='plceaholder'>John Adams</option>" +
												"<option value='plceaholder'>Michelle Lee</option>" +
											"</select>";
							cell4.innerHTML = "<select class='form-select' name='assistantSL' id='assistantSL' size='3' multiple>" +
												"<option value='plceaholder'>Resin composites</option>" +
												"<option value='plceaholder'>Amalgam alloys</option>" +
												"<option value='plceaholder'>Glass ionomers</option>" +
											"</select>";
							cell5.innerHTML = "<textarea class='form-control' aria-label='With textarea' id='procedureTA' size='3' ></textarea>";
							cell6.innerHTML = "<textarea class='form-control' aria-label='With textarea' id='remarksTA' size='3' ></textarea>";
							treatIndex++;
						}
					</script>
					<div class="d-grid gap-2 d-md-flex justify-content-md-center pt-5">
						<button class="btn btn-danger" name="back" value="back">Back</button>
						<button class="btn btn-Primary" name="update" value="update">Update</button>
					</div>
					</form>
				</div>
			</div>
		</form>
		</div>
</body>
</html>