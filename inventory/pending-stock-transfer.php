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
    <?php  $loc =$_SESSION['user_loc'];
    var_dump($loc);?>
    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">PENDING STOCK LIST</h4>
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
                            <a href="#">Stock</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Pending Stock</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Qyt</th>
<!--                                            <th>Barcode</th>-->
<!--                                            <th>Catogory Name</th>-->
<!--                                            <th>Subcategory Name</th>-->
<!--                                            <th>Brand Name</th>-->
<!--                                            <th>Cost</th>-->
<!--                                            <th>Price</th>-->
<!--                                             <th>Whole Sale Price</th> -->
<!--                                            <th>Allert QTY</th>-->
<!--                                             <th>Rack Nu.</th> -->
<!--                                            <th>Supplier Name</th>-->
<!--                                            <th>image</th>-->
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Qyt</th>
<!--                                            <th>Barcode</th>-->
<!--                                            <th>Catogory Name</th>-->
<!--                                            <th>Subcategory Name</th>-->
<!--                                            <th>Brand Name</th>-->
<!--                                            <th>Cost</th>-->
<!--                                            <th>Price</th>-->
<!--                                             <th>Whole Sale Price</th> -->
<!--                                            <th>Allert QTY</th>-->
<!--                                             <th>Rack Nu.</th> -->
<!--                                            <th>Supplier Name</th>-->
<!--                                            <th>image</th>-->
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php

                                        $sql="SELECT stock_transfer_tbl.accept,stock_transfer_tbl.pro_Code,stock_transfer_tbl.transfer_qty,stock_transfer_tbl.transfer_id  from main_transfer_tbl left join stock_transfer_tbl on  main_transfer_tbl.main_tra_id=stock_transfer_tbl.main_trans_id where main_transfer_tbl.trans_loc='$loc' AND stock_transfer_tbl.accept = 0";
                                        $result = mysqli_query($connection,$sql);

                                        while($dataRow=mysqli_fetch_assoc($result)){

                                            echo "<tr>";
                                            echo "<td >".$dataRow['pro_Code']."</td>";
                                            echo "<td >".$dataRow['transfer_qty']."</td>";
                                            echo "<td>
													<div class=\"form-button-action\">
														<a href='aceept-tranfer.php?id=$dataRow[transfer_id]'>
															<button type=\"button\" data-toggle=\"tooltip\" title=\"Accept\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
																<i class=\"fa fa-check\"></i>
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
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

</body>

</html>