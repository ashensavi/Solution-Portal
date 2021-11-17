<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Disposal Report | SKYPOS</title>
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
                        <h4 class="page-title">NOT MOVING ITEMS REPORT</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Select Date Range</label>
                                                    <select onchange="selectDay(this.value)" class="form-control">
                                                        <option selected disable hidden>Select One</option>
                                                        <option value="14">14 Days</option>
                                                        <option value="14">14 Days</option>
                                                        <option value="21">21 Days</option>
                                                        <option value="31">1 Month</option>
                                                        <option value="61">2 Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Barcode</th>
                                                    <th>Batch No</th>
                                                    <th>QTY</th>
                                                    <th>price</th>
                                                    <th>Location</th>
                                                    <th>Moving Date Range</th>
                                                    <th>image</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Barcode</th>
                                                    <th>Batch No</th>
                                                    <th>QTY</th>
                                                    <th>price</th>
                                                    <th>Location</th>
                                                    <th>Moving Date Range</th>
                                                    <th>image</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php 
                                            function dateDiffInDays($date1, $date2) {
                                                $diff = strtotime($date2) - strtotime($date1);
                                                return abs(round($diff / 86400));
                                            }
                                            ?>
                                            <?php

											$sql="SELECT * FROM stock_tbl,products_tbl,location_tbl,batch_tbl WHERE products_tbl.pro_id = stock_tbl.pro_id AND location_tbl.loc_id = stock_tbl.stock_location AND batch_tbl.batch_id = stock_tbl.batch_id AND batch_tbl.batch_location = '$location'";
											$result = mysqli_query($connection,$sql);

											while($dataRow=mysqli_fetch_assoc($result)){
                                                $date2 = date("m/d/Y");
                                                $date1 = $dataRow['update_date'];
                                                $dateDiff = dateDiffInDays($date1, $date2);
											echo "<tr>";
												echo "<td >".$dataRow['pro_name']."</td>";    
												echo "<td >".$dataRow['pro_code']."</td>";
												echo "<td >".$dataRow['batch_no']."</td>";
												echo "<td >".$dataRow['stock_qty']."</td>";    
												echo "<td >".number_format($dataRow['cost'],2)."</td>";
                                                echo "<td >".$dataRow['loc_name']."</td>";
                                                echo "<td >".$dateDiff."</td>";
												echo "<td >"."<img src='assets/img/productimg/".$dataRow['pro_img']."'width='70' height='60' style='margin-top:2px; margin-bottom:2px;'>"."</td>";
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
    
    function selectDay(dateRange) {
        window.location.href="moving-item-report.php?date="+dateRange;
    }
    </script>

</body>

</html>