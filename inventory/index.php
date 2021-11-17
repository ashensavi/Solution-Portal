<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard | SKYPOS</title>
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
<body id="kkkk" onload="myFunction()">
	<div class="wrapper">
		<!-- Navbar -->
		<?php include('header.php');?>	
		<!-- End Navbar -->

		<!-- Sidebar -->
		<?php include('sidebar.php');?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> -->
								<!-- <a href="list-customers.php" class="btn btn-secondary btn-round">Add Customer</a> -->
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Products</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Suppliers</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Reorder Product</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php 
							$totPrice1 = 0;
							$date = date("m/d/Y");

							$sql7="SELECT * FROM `pos_tbl` WHERE pos_date = '$date'";
							$result7 = mysqli_query($connection,$sql7);

							while($dataRow7=mysqli_fetch_assoc($result7)){
								$posId1 = $dataRow7['pos_id'];
								$discount1 = $dataRow7['pro_disc'];
								$grossAmount1=0;
								$costDaily = 0;

								$sql8 = "SELECT * FROM pos_tbl,pos_details_tbl,stock_tbl,batch_tbl WHERE pos_tbl.pos_id = '$posId1' AND pos_details_tbl.pos_id = pos_tbl.pos_id AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
                                    $result8 = mysqli_query($connection,$sql8);
                                    while($dataRow8=mysqli_fetch_assoc($result8)){
										$grossAmount1 += $dataRow8['totQty']*$dataRow8['price'];
										$costDaily += $dataRow8['cost'];
									}
									$netAmount1= $grossAmount1 - ($grossAmount1*$discount1 / 100);
									$totPrice1 += $netAmount1-$costDaily;
							} ?>
						<!-- <div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Total income & spend statistics</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Daily</h6>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
												<h3 class="fw-bold">Rs. <?php echo number_format($totPrice1,2) ?></h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-md-8" style="display:none">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">User Statistics</div>
										<div class="card-tools">
											<a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="fa fa-pencil"></i>
												</span>
												Export
											</a>
											<a href="#" class="btn btn-info btn-border btn-round btn-sm">
												<span class="btn-label">
													<i class="fa fa-print"></i>
												</span>
												Print
											</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container" style="min-height: 375px">
										<canvas id="statisticsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>
						<?php 
							$totPrice = 0;
							$date = date("m/d/Y");

							$sql4="SELECT * FROM `pos_tbl` WHERE pos_date = '$date'";
							$result4 = mysqli_query($connection,$sql4);

							while($dataRow4=mysqli_fetch_assoc($result4)){
								$posId = $dataRow4['pos_id'];
								$discount = $dataRow4['pro_disc'];
								$grossAmount=0;

								$sql5 = "SELECT * FROM pos_tbl,pos_details_tbl,stock_tbl,batch_tbl WHERE pos_tbl.pos_id = '$posId' AND pos_details_tbl.pos_id = pos_tbl.pos_id AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
                                    $result5 = mysqli_query($connection,$sql5);
                                    while($dataRow5=mysqli_fetch_assoc($result5)){
										$grossAmount += $dataRow5['totQty']*$dataRow5['price'];
									}
									$netAmount= $grossAmount - ($grossAmount*$discount / 100);
									$totPrice += $netAmount;
							} ?>
						<!-- <div class="col-md-4">
							<div class="card card-primary">
								<div class="card-header">
									<div class="card-title" style="font-weight:bold; font-size:30px;">Daily Sales</div>
									<div class="card-category" style="font-weight:bold; font-size:18px;"><?php echo date("M/d/Y"); ?></div>
								</div>
								<div class="card-body pb-0">
									<div class="mb-4 mt-2">
										<h1>Rs. <?php echo number_format($totPrice,2) ?></h1>
									</div>
									<div class="pull-in">
										<canvas id="dailySalesChart"></canvas>
									</div>
								</div>
							</div>
						</div> -->

						<!-- <div class="col-md-4">
							<div class="card">
										<?php 
										$tran = 0;
										$date = date("m/d/Y");

										$sql7="SELECT * FROM grn_tbl WHERE added_date='$date'";
										$result7 = mysqli_query($connection,$sql7);

										while($dataRow7=mysqli_fetch_assoc($result7)){
											++$tran ;
										}

										$sql8="SELECT * FROM pos_tbl WHERE pos_date='$date'";
										$result8 = mysqli_query($connection,$sql8);

										while($dataRow8=mysqli_fetch_assoc($result8)){
											++$tran ;
										}
										
										?>

									<div class="card-body pb-0">
										<div class="h1 fw-bold float-right text-warning">+<?php echo (rand(1,99)); ?>%</div>
										<h2 class="mb-2"><?php echo $tran ?></h2>
										<p class="text-muted">Daily All Transactions</p>
										<div class="pull-in sparkline-fix">
											<div id="lineChart"></div>
										</div>
									<div class="pull-in">
										<canvas id="topProductsChart"></canvas>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <?php 
							$usersCount = 0;
							$date = date("m/d/Y");

							$sql6="SELECT * FROM user_tbl";
							$result6 = mysqli_query($connection,$sql6);

							while($dataRow6=mysqli_fetch_assoc($result6)){
								++$usersCount ;
							} ?>
						<div class="col-md-4">
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">All Users Count</h4>
									<h1 class="mb-4 fw-bold"><?php echo $usersCount ?></h1>
									<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per Daily</h4>
									<div id="activeUsersChart"></div>
									<h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
									<ul class="list-unstyled">
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/ pos.php</small> <span>10</span></li>
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/ products / list-product.php</small> <span>7</span></li>
									</ul>
								</div>
							</div>
						</div> -->
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
	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>

	<?php 
	$cus = 0;
	$date = date("m/d/Y");

	$sql="SELECT * FROM products_tbl WHERE added_date = '$date'";
	$result = mysqli_query($connection,$sql);

	while($dataRow=mysqli_fetch_assoc($result)){
		++$cus ;
	}

	$sale = 0;
	// $date = date("m/d/Y");

	$sql1="SELECT * FROM supplier_tbl WHERE added_date = '$date'";
	$result1 = mysqli_query($connection,$sql1);

	while($dataRow1=mysqli_fetch_assoc($result1)){
		++$sale ;
	}

	$reOder = 0;

    $sql2="SELECT * FROM stock_tbl,products_tbl,location_tbl,batch_tbl WHERE products_tbl.pro_id = stock_tbl.pro_id AND location_tbl.loc_id = stock_tbl.stock_location AND batch_tbl.batch_id = stock_tbl.batch_id";
    $result2 = mysqli_query($connection,$sql2);

    while($dataRow2=mysqli_fetch_assoc($result2)){
		$stQty = $dataRow2['stock_qty'];
        $alQty = $dataRow2['pro_all_qty'];
    	if ($stQty <= $alQty) {
			++$reOder ;
		}
	}
	?>
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?php echo $cus; ?>,
			maxValue:100,
			width:7,
			text: <?php echo $cus; ?>,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value: <?php echo $sale; ?>,
			maxValue:100,
			width:7,
			text: <?php echo $sale; ?>,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?php echo $reOder; ?>,
			maxValue:100,
			width:7,
			text: <?php echo $reOder; ?>,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [<?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>, <?php echo (rand(1,10)); ?>],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>,<?php echo (rand(1,100)); ?>], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>