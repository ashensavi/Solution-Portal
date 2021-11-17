<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM supplier_tbl WHERE supplier_id = '$id'");
    $res = mysqli_fetch_array($sql);

$id = $res['supplier_id'];
$name = $res['supplier_name'];
$email = $res['supplier_email'];
$phone = $res['supplier_phone'];
$field = $res['custom_field'];
$conName = $res['contact_name'];
$conPhone = $res['contact_phone'];
$site = $res['site_name'];
$credit = $res['credit_period'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit Supplier | SKYPOS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!-- Navbar Header -->
		<?php include('header.php');?>	
		<!-- End Navbar -->
		<!-- Sidebar -->
		<?php include('sidebar.php');?>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">EDIT SUPPLIERS</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">People</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit Suppliers</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<form action="edit-supplierpro.php" method="post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="">
													<input type="hidden" name="txt_id" id="" value="<?php echo $id; ?>">
												</div>
												<div class="form-group">
													<label for="">Supplier Name</label>
													<input type="text" class="form-control" id="" placeholder="Enter Supplier Name" name="txt_name" value="<?php echo $name; ?>">
												</div>
												<div class="form-group">
													<label for="">Email Address</label>
													<input type="email" class="form-control" id="" placeholder="Enter Email Address" name="txt_email" value="<?php echo $email; ?>">
												</div>
												<div class="form-group">
													<label for="">Phone</label>
													<input type="text" class="form-control" id="" placeholder="Enter Phone number" name="txt_phone" value="<?php echo $phone; ?>">
												</div>
												<div class="form-group">
													<label for="">Supplier Custom Field</label>
													<textarea class="form-control" id="" rows="3" name="txt_field"><?php echo $field; ?></textarea>
												</div>
												<div class="form-group">
													<label for="">Credit Period</label>
													<input type="number" class="form-control" id="" placeholder="Ex: 30 Days" name="txt_credit" value="<?php echo $credit; ?>">
												</div>
												<div class="form-group">
													<label for="">Contact Person Name</label>
													<input type="text" class="form-control" id="email2" placeholder="Enter Contact Person Name" name="txt_conName" value="<?php echo $conName; ?>">
												</div>
												<div class="form-group">
													<label for="">Contact Person Phone</label>
													<input type="text" class="form-control" id="email2" placeholder="Enter Contact Person Phone" name="txt_conPhone" value="<?php echo $conPhone; ?>">
												</div>
												<div class="form-group">
													<label for="">Web Site Name</label>
													<input type="text" class="form-control" id="email2" placeholder="Enter Web Site Name" name="txt_site" value="<?php echo $site; ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Edit Suppliers
										</button>
										<a href='list-supplier.php'>
											<button class="btn btn-danger">
												<span class="btn-label">
													<i class="fa fa-times"></i>
												</span>
												Cancel
											</button>
										</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<?php include('footer.php');?>
			<!-- End footer -->
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php include('rightSidebar.php');?>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo2.js"></script>
</body>
</html>