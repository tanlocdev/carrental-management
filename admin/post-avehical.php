<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicalorcview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
		$airconditioner = $_POST['airconditioner'];
		$powerdoorlocks = $_POST['powerdoorlocks'];
		$antilockbrakingsys = $_POST['antilockbrakingsys'];
		$brakeassist = $_POST['brakeassist'];
		$powersteering = $_POST['powersteering'];
		$driverairbag = $_POST['driverairbag'];
		$passengerairbag = $_POST['passengerairbag'];
		$powerwindow = $_POST['powerwindow'];
		$cdplayer = $_POST['cdplayer'];
		$centrallocking = $_POST['centrallocking'];
		$crashcensor = $_POST['crashcensor'];
		$leatherseats = $_POST['leatherseats'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
		$query = $dbh->prepare($sql);

		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
		$query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
		$query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
		$query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
		$query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
		$query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
		$query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
		$query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
		$query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
		$query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
		$query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
		$query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
		$query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "???? th??m xe th??nh c??ng.";
		} else {
			$error = "L???i. Xin th??? l???i!!";
		}
	}


?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Locars | Admin Th??m xe</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">

		<link rel="shortcut icon" href="../assets/images/logo.jpg">


		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}


			input.checkbox {
				transform: scale(10);
			}

			body {
				
				margin-top: 100px;
			}
		</style>

	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title text-center">TH??M XE</h2>
							<button class="fa fa-arrow-left" onclick="goBack()"> Tr??? v??? </button>
							<p>

								<script>
									function goBack() {
										window.history.back();
									}
								</script>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">
										<div class="panel-heading">TH??NG TIN C?? B???N</div>
										<?php if ($error) { ?><div class="errorWrap"><strong>L???I!</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>TH??NH C??NG</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">T??n xe<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="vehicletitle" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Ch???n h??ng xe<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="brandname" required>
															<option value=""> Ch???n </option>
															<?php $ret = "select id,BrandName from tblbrands";
															$query = $dbh->prepare($ret);
															//$query->bindParam(':id',$id, PDO::PARAM_STR);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount() > 0) {
																foreach ($results as $result) {
															?>
																	<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
															<?php }
															} ?>

														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">M?? t??? Chi ti???t xe<span style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Gi?? thu?? (VND)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="priceperday" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">Ch???n lo???i nhi??n li???u<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="fueltype" required>
															<option value=""> Ch???n </option>

															<option value="X??ng">X??ng</option>
															<option value="D???u">D???u</option>
															<option value="??i???n">??i???n</option>
														</select>
													</div>
												</div>


												<div class="form-group">
													<label class="col-sm-2 control-label">?????i xe<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="modelyear" class="form-control" required>
													</div>
													<label class="col-sm-2 control-label">S??? ch??? ng???i<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="seatingcapacity" class="form-control" required>
													</div>
												</div>
												<div class="hr-dashed"></div>


												<div class="form-group">
													<div class="col-sm-12">
														<h4><b>T???i h??nh ???nh</b></h4>
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														H??nh 1 <span style="color:red">*</span><input type="file" name="img1" required>
													</div>
													<div class="col-sm-4">
														H??nh 2<span style="color:red">*</span><input type="file" name="img2" required>
													</div>
													<div class="col-sm-4">
														H??nh 3<span style="color:red">*</span><input type="file" name="img3" required>
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-4">
														H??nh 4</span><input type="file" name="img4" required>
													</div>
													<div class="col-sm-4">
														H??nh 5<input type="file" name="img5">
													</div>

												</div>
												<div class="hr-dashed"></div>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">
										<div class="panel-heading">Trang b???</div>
										<div class="panel-body">


											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline ">
														<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
														<label for="airconditioner"> ??i???u h??a t??? ?????ng </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
														<label for="powerdoorlocks"> C???a kh??a th??ng minh </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
														<label for="antilockbrakingsys"> Ch???ng b?? c???ng phanh ABS </label>
													</div>
												</div>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
													<label for="brakeassist"> Ph??n ph???i l???c phanh EBD </label>
												</div>
											</div>



											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="powersteering" name="powersteering" value="1">
														<label for="inlineCheckbox5"> Tr??? l???c l??i </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
														<label for="driverairbag">T??i kh?? h??ng gh??? tr?????c</label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
														<label for="passengerairbag"> T??i kh?? h??ng gh??? sau </label>
													</div>
												</div>
												<div class="checkbox checkbox-inline">
													<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
													<label for="powerwindow"> K??nh 2 l???p </label>
												</div>
											</div>


											<div class="form-group">
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
														<label for="cdplayer"> M??n h??nh c???m ???ng </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
														<label for="centrallocking"> Kh??a Vi sai trung t??m </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
														<label for="crashcensor"> C???nh b??o ??i???m m?? </label>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="checkbox checkbox-inline">
														<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
														<label for="leatherseats"> Gh??? da </label>
													</div>
												</div>
											</div><br>
											<hr style="padding: 5px;">


											<div class="form-group text-center">
												<div class="col-sm-8 col-sm-offset-2">
												<button class="btn btn-primary" name="submit" type="submit">&ensp;&ensp;&ensp; TH??M XE + &ensp;&ensp;&ensp;</button>
												&ensp;
													<button class="btn btn-default" type="reset">
														< &ensp;H???Y &ensp;</button> 
															</div>
											</div>

											</form>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>



				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>