<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Add Customer | SKYPOS</title>
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
    
    <style>
        .fileUpload {
    /* position: relative; */
    overflow: hidden;
    /* margin: 10px; */
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    </style>

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
						<h4 class="page-title">ADD CUSTOMERS</h4>
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
								<a href="#">Add Customers</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="add-customerpro.php" method="post" enctype="multipart/form-data">
								<div class="card">
									<!-- <div class="card-header">
										<div class="card-title">Form Elements</div>
									</div> -->
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Customer Name</label>
													<input type="text" class="form-control" id="" name="txt_name" placeholder="Enter Customer Name">
													<!-- <small  id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
												</div>
												<div class="form-group">
													<label for="">Email Address</label>
													<input type="email" class="form-control" id="email" name="txt_email" placeholder="Enter Email Address">
												</div>
												<div class="form-group">
													<label for="">Phone</label>
													<input type="number" class="form-control" id="" name="txt_phone" placeholder="Enter Phone Number">
												</div>
												<div class="form-group">
													<label for="comment">Customer Custom Field</label>
													<textarea class="form-control" id="comment" name="txt_feild" rows="3"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button class="btn btn-primary" type="submit">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Add Customer
										</button>
										<a href='list-customers.php' class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-times"></i>
											</span>
												Cancel
										</a>
									</div>
								</div>
							</form>
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