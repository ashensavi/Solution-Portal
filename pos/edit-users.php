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
	<style>
            section {
                display: flex;
                flex-direction: column;
                padding: 0.5em;
            }

            h1 {
              font-weight: 400;
              font-size: 2em;
              cursor: default;
              margin: 0 0 .5em 0;
              color:black;
            }

            .form-check {
              padding-left: 0;
            }

            input[type="checkbox"] {
              display: none;
              height: 0;
              width: 0;
            }
            input[type="checkbox"] + label {
              align-items: center;
              color: #e3e3e3;
              cursor: pointer;
              display: inline-flex;
              margin: 10px 0;
              position: relative;
            }
            input[type="checkbox"] + label > span {
              align-items: center;
              background: white;
              border: 2px solid blue;
              border-radius: 2px;
              display: inline-flex;
              height: 21px;
              justify-content: center;
              margin-right: 15px;
              transition: .25s ease;
              width: 21px;
            }
            input[type="checkbox"]:checked + label > span {
              animation: shrink-bounce ci-transition(fancy-hover);
            }
            input[type="checkbox"]:checked + label > span::before {
              animation: checkbox-check .125s .25s ease forwards;
              border-bottom: 3px solid transparent;
              border-radius: 2px;
              border-right: 3px solid transparent;
              content: "";
              left: 5px;
              position: absolute;
              top: 10px;
              transform: rotate(45deg);
              transform-origin: 0 100%;
            }

            @keyframes shrink-bounce {
              0% {
                transform: scale(1);
              }
              33% {
                transform: scale(0.85);
              }
              100% {
                transform: scale(1);
              }
            }
            @keyframes checkbox-check {
              0% {
                border-color: red;
                height: 0;
                transform: translate3d(0, 0, 0) rotate(45deg);
                width: 0;
              }
              33% {
                height: 0;
                transform: translate3d(0, 0, 0) rotate(45deg);
                width: 11px;
              }
              100% {
                border-color: red;
                height: 20px;
                transform: translate3d(0, -20px, 0) rotate(45deg);
                width: 11px;
              }
            }
        </style>
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
						<h4 class="page-title">EDIT USER</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="edit-userpro.php" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
                                                <div class="">
													<input type="hidden" name="txt_id" value="<?php echo $user_id; ?>">
												</div>
                                                <div class="">
													<input type="hidden" name="" id="pwd" value="<?php echo $user_pwd; ?>">
												</div>
												<!-- <div class="form-group">
													<label for="">User Email</label>
													<input type="email" class="form-control" placeholder="Enter User Email" value="<?php echo $user_name;?>" name="txt_name">
												</div> -->
                                                <div class="form-group">
													<label for="">New Password</label>
													<input type="password" class="form-control" name="txt_pwd" id="newpwd" onkeyup="myFunction()">
												</div>
                                                <div class="form-group">
												<label for="">Confirm Password</label>
													<input type="password" class="form-control" id="currpwd" name="" onkeyup="myFunction()">
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
            var pwd=document.getElementById("newpwd").value;
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