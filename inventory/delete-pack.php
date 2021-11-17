<?php
include 'db/dbConnection.php';
$packLocation = $_GET['location'];
$packGrade = $_GET['grade'];
if (!isset($packGrade)){
    header('Location: list-pack.php');
}
if (!isset($packLocation)){
    header('Location: list-pack.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Book List | SKYPOS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['assets/css/fonts.min.css']
        },
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
                        <h4 class="page-title">Delete Book List</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Grade</th>
                                                    <th>Location</th>
                                                    <th>Product</th>
                                                    <th>QTY</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Grade</th>
                                                    <th>Location</th>
                                                    <th>Product</th>
                                                    <th>QTY</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php

												$sql="SELECT * FROM pack_tbl,packdetail_tbl,location_tbl,stock_tbl,batch_tbl,products_tbl WHERE pack_tbl.pack_id= $packGrade AND packdetail_tbl.packRef_id = pack_tbl.pack_id AND packdetail_tbl.pack_loc = $packLocation AND stock_tbl.stock_id = packdetail_tbl.packDetStock AND batch_tbl.batch_id = stock_tbl.batch_id AND products_tbl.pro_id = batch_tbl.pro_id";
												$result = mysqli_query($connection,$sql);

												while($dataRow=mysqli_fetch_assoc($result)){
												    echo "<tr>";
													echo "<td >".$dataRow['pack_name']."</td>";
													echo "<td >".$dataRow['loc_name']."</td>";
													echo "<td >".$dataRow['pro_name']."</td>";
													echo "<td >".$dataRow['packQty']."</td>";
													echo "<td>
														<div class=\"form-button-action\">
															<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete-packPro.php?id=$dataRow[packDetail_id]'>
																<button type=\"button\" data-toggle=\"tooltip\" title=\"Remove\" class=\"btn btn-link btn-danger\" data-original-title=\"Remove\">
																	<i class=\"fa fa-window-close\"></i>
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

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                            )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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