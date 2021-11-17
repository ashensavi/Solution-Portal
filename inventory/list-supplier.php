<?php 
    include 'db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>List Suppliers | SKYPOS</title>
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
						<h4 class="page-title">SUPPLIERS LIST</h4>
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
								<a href="#">List Suppliers</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
                                        <!-- <h4 class="card-title">Add Row</h4> -->
                                        <a class=" ml-auto" href="add-supplier.php">
                                            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#">
                                                <i class="fa fa-plus"></i>
                                                Add Suppliers
                                            </button>
                                        </a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Name</th>
													<th>Email Address</th>
                                                    <th>Phone</th>
                                                    <th>Custom Field</th>
                                                    <th>Credit Period</th>
													<th>Contact Name</th>
													<th>Contact Phone</th>
													<th>Site Name</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name</th>
													<th>Email Address</th>
                                                    <th>Phone</th>
                                                    <th>Custom Field</th>
                                                    <th>Credit Period</th>
													<th>Contact Name</th>
													<th>Contact Phone</th>
													<th>Site Name</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php

												$sql="SELECT * From supplier_tbl";
												$result = mysqli_query($connection,$sql);

												while($dataRow=mysqli_fetch_assoc($result)){ 
													
												echo "<tr>";
													echo "<td >".$dataRow['supplier_name']."</td>";    
													echo "<td >".$dataRow['supplier_email']."</td>";
													echo "<td >".$dataRow['supplier_phone']."</td>";
													echo "<td >".$dataRow['custom_field']."</td>";
													echo "<td >".$dataRow['credit_period']."</td>";
													echo "<td >".$dataRow['contact_name']."</td>";
													echo "<td >".$dataRow['contact_phone']."</td>";
													// echo "<td >".$dataRow['site_name']."</td>";
													echo "<td > <a href='$dataRow[site_name]' target=\"_blank\">$dataRow[site_name]</a> </td>";
													echo "<td>
														<div class=\"form-button-action\">
															<a href='edit-supplier.php?id=$dataRow[supplier_id]'>
																<button type=\"button\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
																	<i class=\"fa fa-edit\"></i>
																</button>
															</a>

															<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete-supplierpro.php?id=$dataRow[supplier_id]'>
																<button type=\"button\" data-toggle=\"tooltip\" title=\"Remove\" class=\"btn btn-link btn-danger\" data-original-title=\"Remove\">
																	<i class=\"fa fa-times\"></i>
																</button>
															</a>
														</div>
													</td>";    
												echo "</tr>";
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
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
	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>