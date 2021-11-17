<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Stock Report | SKYPOS</title>
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
                        <h4 class="page-title">REGISTER REPORT</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="index.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <!--<li class="separator">-->
                            <!--    <i class="flaticon-right-arrow"></i>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a href="#">Report</a>-->
                            <!--</li>-->
                            <!--<li class="separator">-->
                            <!--    <i class="flaticon-right-arrow"></i>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <a href="#">Stock Report</a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Product</label>
                                                    <select onchange="pageReload()" class="form-control">
                                                        <option disabled selected hidden>Select One</option>
                                                        <?php
													$sql = mysqli_query($connection,"SELECT * FROM products_tbl");
													$row = mysqli_num_rows($sql);
													while ($row = mysqli_fetch_array($sql)){
                                                        echo "<option value='". $row['pro_id'] ."'>" .$row ['pro_name'] ."</option>" ;
													}
													?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Location</label>
                                                    <select onchange="pageReload()" class="form-control">
                                                        <option disabled selected hidden>Select One</option>
                                                        <?php
													$sql = mysqli_query($connection,"SELECT * FROM location_tbl");
													$row = mysqli_num_rows($sql);
													while ($row = mysqli_fetch_array($sql)){
                                                        echo "<option value='". $row['loc_id'] ."'>" .$row ['loc_name'] ."</option>" ;
													}?>
                                                    </select>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>Open Time</th>
                                                    <th>Close Time</th>
                                                    <th>Open Price</th>
                                                    <th>Close Prise</th>
                                                    <th>Note</th>
                                                    <th>Print</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <!-- <tr>
                                                    <th>Product</th>
                                                    <th>Barcode</th>
                                                    <th>Batch No</th>
                                                    <th>QTY</th>
                                                    <th>price</th>
                                                    <th>Location</th>
                                                    <th>image</th>
                                                </tr> -->
                                            </tfoot>
                                            <tbody>
                                                <?php

											$sql="SELECT * FROM register_table,user_tbl WHERE register_table.reg_status = 1 AND user_tbl.user_id = register_table.reg_user_id AND user_tbl.user_loc = $location";
											$result = mysqli_query($connection,$sql);

											while($dataRow=mysqli_fetch_assoc($result)){
											echo "<tr>";
											    echo "<td >".$dataRow['user_name']."</td>"; 
												echo "<td >".$dataRow['open_time']."</td>";    
                                                echo "<td >".$dataRow['close_time']."</td>";
                                                echo "<td >".number_format($dataRow['open_price'],2)."</td>";    
												echo "<td >".number_format($dataRow['cloce_price'],2)."</td>";
												echo "<td >".$dataRow['regNote']."</td>";
												echo "<td ><a href='print-cash-out.php?id=" . $dataRow['reg_id'] . "'><button type='button' class='btn btn-primary btn-sm font-weight-bold'>Print</button></a></td>";
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

    function pageReload() {
        window.location.reload();
    }
    </script>

</body>

</html>