<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>List Products | SKYPOS</title>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
<div class="wrapper">
    <!-- Navbar -->
    <?php include('header.php');?>
    <!-- End Navbar -->
    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">GRN LIST</h4>
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
                            <a href="#">GRN</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">List GRN</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <!-- <h4 class="card-title">Add Row</h4> -->
                                    <a class=" ml-auto" href="add-products.php">
                                        <button class="btn btn-primary btn-round" data-toggle="modal"
                                                data-target="#">
                                            <i class="fa fa-plus"></i>
                                            Add Products
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>GRN Id</th>
                                            <th>GRN Due Date</th>
                                            <th>GRN received Date</th>
                                            <th>GRN Invoice No</th>
                                            <th>Location</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>GRN Id</th>
                                            <th>GRN Due Date</th>
                                            <th>GRN received Date</th>
                                            <th>GRN Invoice No</th>
                                            <th>Location</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php

                                        $sql="SELECT * FROM grn_tbl inner join grndetail_tbl on grn_tbl.grn_id=grndetail_tbl.grn_id  inner join location_tbl on location_tbl.loc_id=grn_tbl.grn_locid  group by grn_tbl.grn_id";
                                        $result = mysqli_query($connection,$sql);
                                        while($dataRow=mysqli_fetch_assoc($result)){
//                                                $sql2="SELECT * FROM `supplier_tbl` WHERE `supplier_id`='$dataRow[supplier_id]' ";
//                                                $result2 = mysqli_query($connection,$sql2);
//                                                $dataRow2=mysqli_fetch_assoc($result2);
                                            // echo "<td >".$dataRow['supplier_id']."</td>";
                                            echo "<td >".$dataRow['grn_id']."</td>";
                                            echo "<td >".$dataRow['grn_due_on']."</td>";
                                            echo "<td >".$dataRow['grn_received']."</td>";
                                            echo "<td >".$dataRow['grn_invoice_no']."</td>";
                                            echo "<td >".$dataRow['loc_name']."</td>";

                                            echo "<td>
														<div class=\"form-button-action\">
															<a href='printViewGrn.php?id=$dataRow[grn_id]'>
																<button type=\"button\" data-toggle=\"tooltip\" 		title=\"View & Print\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
																	<i class=\"fa fa-eye\"></i>
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

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#dataTable').DataTable( {
    //         "order": [[ 0, "desc" ]]
    //     } );
    // } );
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</body>

</html>