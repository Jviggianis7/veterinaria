<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get user id
if (isset($_POST['submit'])) {
	$incoming_id = $did;
	$outcoming_id = $_SESSION['id'];
	$message = $_POST['msg'];
	$sql = mysqli_query($con, "insert into messages(incoming_msg_id,outgoing_msg_id,msg) values('$incoming_id','$outcoming_id','$message')");
	if ($sql) {
		echo "<script>alert('mensaje enviado!');</script>";
		header("Location: " . $_SERVER['REQUEST_URI']);
        exit();

	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Chat</title>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


</head>

<body style="font-family: Poppins;">
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;"> Doctor | Chat</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Paciente</span>
								</li>
								<li class="active">
									<span>Chatear con Paciente</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Chatear con Paciente</h5>
												<?php $sql = mysqli_query($con, "select * from users where id='$did'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<h4>Chat con: <?php echo htmlentities($data['fullName']); ?></h4>
													<table class="table table-hover" id="sample-table-1">
														<thead>
															<tr>
																<th>#</th>
																<th class="hidden-xs">Mensaje</th>
																<th>Usuario que lo envia</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$sql2 = mysqli_query($con, "select * from messages where 
															incoming_msg_id='$did' and outgoing_msg_id='" . $_SESSION['id'] . "'
															or incoming_msg_id='" . $_SESSION['id'] . "' and outgoing_msg_id='$did'");
															$cnt = 1;
															while ($row = mysqli_fetch_array($sql2)) {
																$outgoing_id = $row['outgoing_msg_id'];
															$name = '';		
															// Consulta a la tabla de doctores
															$doctorQuery = mysqli_query($con, "SELECT doctorName FROM doctors WHERE id='$outgoing_id'");
															if (mysqli_num_rows($doctorQuery) > 0) {
																$doctorData = mysqli_fetch_assoc($doctorQuery);
																$name = $doctorData['doctorName'];
															} else {
																// Consulta a la tabla de usuarios
																$userQuery = mysqli_query($con, "SELECT fullName FROM users WHERE id='$outgoing_id'");
																if (mysqli_num_rows($userQuery) > 0) {
																	$userData = mysqli_fetch_assoc($userQuery);
																	$name = $userData['fullName'];
																}
															}
															?>
																<tr>
																	<td class="center"><?php echo $cnt; ?>.</td>
																	<td><?php echo $row['msg']; ?></td>
																	<td class="hidden-xs"><?php echo $name; ?></td>
																</tr>
															<?php
																$cnt = $cnt + 1;
															} ?>

														</tbody>
													</table>
													<hr />
													<form role="form" name="chat" method="post" onSubmit="return valid()">
														<div class="form-group">
															<label for="address">
																Mensaje
															</label>
															<textarea name="msg" class="form-control"><?php echo htmlentities($data['msg']); ?></textarea>
														</div>
													<?php } ?>
													<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
														Enviar
													</button>
													</form>
											</div>
											<div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="panel panel-white">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

		<!-- end: SETTINGS -->

		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>