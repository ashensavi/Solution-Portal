<?php 
    include 'db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SKYPOS</title>
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

    <!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
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
            <?php
                $user = $_POST['txt_close_user'];
                $note = $_POST['textCloseNote'];
                $total = $_POST['txt_close_price'];
                $closeTime = $_POST['txt_close_time'];
                $card = $_POST['txt_card_price'];

                $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = $user AND reg_status = 0");
                $res8 = mysqli_fetch_array($sql);
                
                if (!empty($res8['reg_user_id'])) {

                    $id = $res8['reg_id'];

                    $query5 = "UPDATE register_table SET 
                    close_time = '$closeTime',
                    reg_status = 1,
                    cloce_price=$total,
                    regNote='$note' 
                     WHERE 
                    reg_id=$id";

                    $result5 = mysqli_query($connection, $query5);
                                
                    if ($result5) { ?>
                        <script>
                            var SweetAlert2Demo = function() {
                                var initDemos = function() {
                                    swal({
                                        icon : "success",
                                        title: 'Success !',
                                        type: 'success',
                                        buttons:{
                                            confirm: {
                                                text : 'OK',
                                                className : 'btn btn-success'
                                            }
                                        } 
                                    }).then((Delete) => {
                                        if (Delete) {
                                            window.location.replace("print-cash-out.php?id="+<?php echo $id ?>+"&card="+<?php echo $card ?>);
                                        } else {
                                            window.location.replace("print-cash-out.php?id="+<?php echo $id ?>+"&card="+<?php echo $card ?>);
                                        }
                                    });
                                };

                                return {
                                    init: function() {
                                        initDemos();
                                    },
                                };
                            }();

                            jQuery(document).ready(function() {
                                SweetAlert2Demo.init();
                            });
                        </script>
                    <?php } else { ?>
                        <script>
                            var SweetAlert2Demo = function() {

                                var initDemos = function() {
                                    swal({
                                        icon : "error",
                                        title: 'Not Success !',
                                        type: 'error',
                                        buttons:{
                                            confirm: {
                                                text : 'OK',
                                                className : 'btn btn-danger'
                                            }
                                        }
                                    }).then((Delete) => {
                                        if (Delete) {
                                            window.location.replace("index.php");
                                        } else {
                                            window.location.replace("index.php");
                                        }
                                    });
                                };

                                return {
                                    init: function() {
                                        initDemos();
                                    },
                                };
                            }();

                            jQuery(document).ready(function() {
                                SweetAlert2Demo.init();
                            });
                        </script>
                    <?php }
                } else { ?>
                    <script>
                            var SweetAlert2Demo = function() {

                                var initDemos = function() {
                                    swal({
                                        icon : "error",
                                        title: 'Not Success !',
                                        type: 'error',
                                        buttons:{
                                            confirm: {
                                                text : 'OK',
                                                className : 'btn btn-danger'
                                            }
                                        }
                                    }).then((Delete) => {
                                        if (Delete) {
                                            window.location.replace("index.php");
                                        } else {
                                            window.location.replace("index.php");
                                        }
                                    });
                                };

                                return {
                                    init: function() {
                                        initDemos();
                                    },
                                };
                            }();

                            jQuery(document).ready(function() {
                                SweetAlert2Demo.init();
                            });
                        </script>
                <?php } ?>
			</div>
			<!-- footer -->
			<?php include('footer.php');?>
			<!-- End footer -->
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php include('rightSidebar.php');?>
		<!-- End Custom template -->
	</div>
	
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
    <!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
</body>
</html>