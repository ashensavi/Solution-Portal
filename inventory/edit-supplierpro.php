<?php 
    include 'db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Wefix</title>
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

                    $id =  $_POST['txt_id'];
                    $name =  $_POST['txt_name'];
                    $email =  $_POST['txt_email'];
                    $phone =  $_POST['txt_phone'];
                    $field =  $_POST['txt_field'];
                    $conName =  $_POST['txt_conName'];
                    $conPhone =  $_POST['txt_conPhone'];
                    $site =  $_POST['txt_site'];
                    $credit =  $_POST['txt_credit'];

                    $sql = "UPDATE supplier_tbl SET 
                            supplier_name='$name',
                            supplier_email='$email',
                            supplier_phone='$phone',
                            custom_field='$field',
                            contact_name='$conName',
                            contact_phone='$conPhone',
                            site_name='$site',
                            credit_period='$credit'
                            WHERE 
                            supplier_id='$id'"; ?>

                    <?php  if ($connection->query($sql)===true){?> 
                        <script>
                            //== Class definition
                            var SweetAlert2Demo = function() {

                                //== Demos
                                var initDemos = function() {
                                    //== Sweetalert Demo 1
                                    swal({
                                        icon : "success",
                                        title: 'Supplier Updated Success !',
                                        type: 'success',
                                        buttons:{
                                            confirm: {
                                                text : 'OK',
                                                className : 'btn btn-success'
                                            }
                                        }
                                    }).then((Delete) => {
                                        if (Delete) {
                                            window.location.replace("list-supplier.php");
                                        } else {
                                            window.location.replace("list-supplier.php");
                                        }
                                    });
                                };

                                return {
                                    //== Init
                                    init: function() {
                                        initDemos();
                                    },
                                };
                            }();

                            //== Class Initialization
                            jQuery(document).ready(function() {
                                SweetAlert2Demo.init();
                            });
                        </script>
                    <?php }else{ ?>
                        <script>
                            //== Class definition
                            var SweetAlert2Demo = function() {

                                //== Demos
                                var initDemos = function() {
                                    //== Sweetalert Demo 1
                                    swal({
                                        icon : "error",
                                        title: 'Supplier Updated not Success !',
                                        type: 'error',
                                        buttons:{
                                            confirm: {
                                                text : 'OK',
                                                className : 'btn btn-danger'
                                            }
                                        }
                                    }).then((Delete) => {
                                        if (Delete) {
                                            window.location.replace("list-supplier.php");
                                        } else {
                                            window.location.replace("list-supplier.php");
                                        }
                                    });
                                };

                                return {
                                    //== Init
                                    init: function() {
                                        initDemos();
                                    },
                                };
                            }();

                            //== Class Initialization
                            jQuery(document).ready(function() {
                                SweetAlert2Demo.init();
                            });

                            // window.location.replace("list-customers.php");
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