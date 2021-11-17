<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Add Category | SKYPOS</title>
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
        <?php 
            $regStatus= true;
            $user = $_SESSION['user_id'];

            $totalAmount = 0.0;
			$excAmount = 0.0;
			$totalAmount1 = 0.0;
            $excAmount1 = 0.0;
            date_default_timezone_set("Asia/Colombo");
            $nowDateTime = date("Y-m-d H:i:s");

            $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = $user AND reg_status = 0");
            $res8 = mysqli_fetch_array($sql);
            
            if (!empty($res8['reg_user_id'])) {

                $openTime = $res8['open_time'];
                $opnPrice = $res8['open_price'];
                $cashOut = $res8['cash_out'];
                
                $sql2="SELECT * FROM pos_tbl WHERE added_user = $user AND bill_void = 0 AND checkRegDate BETWEEN '$openTime' AND '$nowDateTime'";
                $result2 = mysqli_query($connection,$sql2);

                while($dataRow2=mysqli_fetch_assoc($result2)){
					
					$posIds = $dataRow2['pos_id'];

					if($dataRow2['payBy'] == 'cash'){
						$excAmount += $dataRow2['exc_bill_price'];
						$amount = 0.0;
						$discount = $dataRow2['pro_disc'];

						$sql3="SELECT * FROM pos_details_tbl,stock_tbl,batch_tbl WHERE pos_details_tbl.pos_id = $posIds AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
						$result3 = mysqli_query($connection,$sql3);

						while($dataRow3=mysqli_fetch_assoc($result3)){
							$amount += $dataRow3['totQty']*$dataRow3['price'];
						}
						$totalAmount += $amount - ($amount*$discount / 100);
					}else if($dataRow2['payBy'] == 'credit') {
						$excAmount1 += $dataRow2['exc_bill_price'];
						$amount = 0.0;
						$discount = $dataRow2['pro_disc'];

						$sql3="SELECT * FROM pos_details_tbl,stock_tbl,batch_tbl WHERE pos_details_tbl.pos_id = $posIds AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
						$result3 = mysqli_query($connection,$sql3);

						while($dataRow3=mysqli_fetch_assoc($result3)){
							$amount += $dataRow3['totQty']*$dataRow3['price'];
						}
						$totalAmount1 += $amount - ($amount*$discount / 100);
					}
				}

                
            } else {
                $regStatus= false; ?>
                <script>
                            var SweetAlert2Demo = function() {

                                var initDemos = function() {
                                    swal({
                                        icon : "error",
                                        title: 'User is Not Register !',
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
		<div class="main-panel">
			<div class="content">
            <?php if($regStatus){ ?>
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Close Register</h4>
					</div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="card">
							    <div class="card-body">
							        <div class="row">
										<div class="col-md-12">
												<h2 style="color:red;">Register Details (opened at: <?php echo $openTime ?> / close at: <?php echo $nowDateTime ?>)</h2>
										</div>
                                        <div class="col-md-12">
											<div class="form-group">
												<h3 style="color:black;"><a style="color:blue;">Total Sales :</a> Rs. <?php echo number_format($totalAmount-$excAmount,2) ?></h3>
											</div>
										</div>
                                        <div class="col-md-12">
											<div class="form-group">
												<h3 style="color:black;"><a style="color:blue;">Cashier Open Price :</a> Rs. <?php echo number_format($opnPrice,2) ?></h3>
											</div>
										</div>
                                        <div class="col-md-12">
											<div class="form-group">
												<h3 style="color:black;"><a style="color:blue;">Cash Out :</a> Rs. <?php echo number_format($cashOut,2) ?></h3>
											</div>
										</div>
                                        <div class="col-md-12">
											<div class="form-group">
												<h3 style="color:black;"><a style="color:blue;">Total Cash In Hand :</a> Rs. <?php echo number_format(($totalAmount-$excAmount)+$opnPrice-$cashOut,2) ?></h3>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<h3 style="color:black;"><a style="color:blue;">Card Sales :</a> Rs. <?php echo number_format(($totalAmount1-$excAmount1),2) ?></h3>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
						<div class="col-md-12">
							<form action="closeRegisterPro.php" method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<input style="display:none;" type="text" name="txt_close_price" value="<?php echo ($totalAmount-$excAmount)+$opnPrice-$cashOut ?>">
                                                <input style="display:none;" type="text" name="txt_close_user" value="<?php echo $user ?>">
                                                <input style="display:none;" type="text" name="txt_close_time" value="<?php echo $nowDateTime ?>">
												<input style="display:none;" type="text" name="txt_card_price" value="<?php echo $totalAmount1-$excAmount1 ?>">
												<div class="form-group">
													<label for="">Note</label>
													<textarea rows="4" cols="50" class="form-control" name="textCloseNote"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="card-action">
										<button type="submit" class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Close Register
										</button>
										<a href='index.php' class="btn btn-danger">
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
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
</body>
</html>