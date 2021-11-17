<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM subcategory_tbl WHERE subcate_id = '$id'");
    $res = mysqli_fetch_array($sql);

$subcate_id = $res['subcate_id'];
$subcate_name = $res['subcate_name'];
$subcate_code = $res['subcate_code'];
$cate_id = $res['cate_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit Subcategory | SKYPOS</title>
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
						<h4 class="page-title">EDIT SUBCATEGORIES</h4>
						<!-- <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Categories</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">edit Categories</a>
							</li>
						</ul> -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="edit-subCategoriespro.php" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
                                                <div class="">
													<input type="hidden" name="txt_subcateid" id="" value="<?php echo $subcate_id; ?>">
												</div>
												<div class="form-group">
													<label for="">Subcategory Code</label>
													<input type="text" class="form-control" id="" placeholder="Enter Subcategory Code" value="<?php echo $subcate_code;?>" name="txt_code">
												</div>
												<div class="form-group">
													<label for="">Subcategory Name</label>
													<input type="text" class="form-control" id="" placeholder="Enter Subcategory Name" value="<?php echo $subcate_name;?>" name="txt_name">
												</div>
                                                <div class="form-group">
												    <label for="">Category</label>
												    <select class="form-control" id="" name="txtcat_id">

                                                    <?php
														$sql = mysqli_query($connection,"SELECT * FROM category_tbl WHERE cate_id='$cate_id'");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                                
															echo "<option selected hidden value='$cate_id'>" .$row['cat_name'] ."</option>" ;
														}
														?>

														<?php
														$sql = mysqli_query($connection,"SELECT * FROM category_tbl");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                                
															echo "<option value='". $row['cate_id'] ."'>" .$row['cat_name'] ."</option>" ;
														}
														?>
                                                    </select>
                                                    </div>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Edit subcategory
										</button>
										<a href='list-subCategories.php' class="btn btn-danger">
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