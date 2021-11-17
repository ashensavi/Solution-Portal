<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM user_tbl WHERE user_id = '$id'");
$res = mysqli_fetch_array($sql);

$user_id = $res['user_id'];
$user_name = $res['user_name'];
$user_pwd = $res['user_pwd'];
$user_role = $res['user_type'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit User | SKYPOS</title>
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
						<h4 class="page-title">EDIT USERS</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="edit-userpro.php" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
                                                <div class="">
													<input type="hidden" name="txt_id" id="" value="<?php echo $user_id; ?>">
												</div>
                                                <div class="">
													<input type="hidden" name="" id="pwd" value="<?php echo $user_pwd; ?>">
												</div>
												<div class="form-group">
													<label for="">User Name</label>
													<input type="text" class="form-control" id="" placeholder="Enter User Name" value="<?php echo $user_name;?>" name="txt_name">
												</div>
                                                <div class="form-group">
													<label for="">New Password</label>
													<input type="password" class="form-control" id="" name="txt_pwd">
												</div>
												<div class="form-group">
													<label for="">Current Password</label>
													<input type="password" class="form-control" id="currpwd" name="" onkeyup="myFunction()">
												</div>
                                                <div class="form-group">
												    <label for="">User Role</label>
												    <select class="form-control" id="" name="txt_userRole">                             
														<option selected hidden value="<?php echo $user_role;?>"><?php echo $user_role;?></option>

                                                        <option value="admin">admin</option>
                                                        <option value="cashier">cashier</option>
                                                        <option value="Stock keeper">Stock keeper</option>
                                                    </select>
                                                </div>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button id="editbtn" disabled type="submit" class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Edit
										</button>
										<a href='list-users.php' class="btn btn-danger">
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

    <script>
        function myFunction() {
            var pwd=document.getElementById("pwd").value;
            var currpwd=document.getElementById("currpwd").value;
            if (pwd == currpwd) {
                document.getElementById("editbtn").disabled = false;
            }else{
                document.getElementById("editbtn").disabled = true;
            }
        }
    </script>
</body>
</html>