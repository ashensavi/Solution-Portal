<?php include 'db/dbConnection.php';

function monthName($monthNum)
{
    // $monthNum  = 3;
    $dateObj = DateTime::createFromFormat('!m', --$monthNum);
    return strtoupper($dateObj->format('F')); // March
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sales Report-Last month | SKYPOS</title>
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
        <?php include('header.php'); ?>
        <!-- End Navbar -->
        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">SALES REPORT - <?php echo monthName(date(('m'))); ?></h4>
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
                                <a href="#">Report</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Sales Report - <?php echo monthName(date(('m'))); ?></a>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select location</label>
                            <select onchange="pageReload()" class="form-control" id="txt_locaId">
                                <option disabled selected hidden>Select Your Location</option>
                                <?php
                                // $sql = mysqli_query($connection, "SELECT * FROM location_tbl");
                                // $row = mysqli_num_rows($sql);
                                // while ($row = mysqli_fetch_array($sql)) {
                                //     echo "<option value='" . $row['loc_id'] . "'>" . $row ['loc_name'] . "</option>";
                                // }
                                ?>
                            </select>
                        </div>
                    </div>
                </div> -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Customer Name</th>
                                                    <th>Ref. Note</th>
                                                    <th>Ref. Code</th>
                                                    <th>Pro. Description</th>
                                                    <th>Cash Amount</th>
                                                    <th>Discount %</th>
                                                    <th>Bill Total Price</th>
                                                    <th>View</th>
                                                    <th>Prin Bill</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Customer Name</th>
                                                    <th>Ref. Note</th>
                                                    <th>Ref. Code</th>
                                                    <th>Pro. Description</th>
                                                    <th>Cash Amount</th>
                                                    <th>Discount %</th>
                                                    <th>Bill Total Price</th>
                                                    <th>View</th>
                                                    <th>Prin Bill</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tbody">
                                                <?php


                                                $newDate = date("m-Y" ,strtotime("-1 month"));

                                                // Start - Modification By Tharindu
                                                $userLocationId = $_SESSION['user_loc'];

                                                $sqlT = "SELECT * FROM pos_tbl,user_tbl WHERE  bill_void=0 AND user_tbl.user_id = pos_tbl.added_user AND user_tbl.user_loc = '$userLocationId'";
                                                $resultT = mysqli_query($connection,$sqlT);

											while ($dataRow = mysqli_fetch_assoc($resultT)) {
                                                $tempCustId = $dataRow['customerId'];
                                                $orgDate = $dataRow['pos_date'];

                                                $oldDate = date("m-Y", strtotime($orgDate));

                                                if ( $oldDate === $newDate){
                                                    if ($tempCustId == 0) {
                                                        $tempCustId="-";
                                                    } else {
                                                        $sqlY = "SELECT * FROM customer_tbl WHERE cus_id=$tempCustId";
                                                        $resultY = mysqli_query($connection, $sqlY);

                                                        while ($dRow = mysqli_fetch_assoc($resultY)) {
                                                            $tempCustId = $dRow['cus_name'];
                                                        }
                                                    }



                                                    $id = $dataRow['pos_id'];
                                                    $discount = $dataRow['pro_disc'];
                                                    $grossAmount=0;
                                                    $sql2="SELECT * FROM pos_details_tbl,stock_tbl,batch_tbl WHERE pos_details_tbl.pos_id = '$id' AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
                                                    $result2 = mysqli_query($connection,$sql2);

                                                    while($dataRow2=mysqli_fetch_assoc($result2)){

                                                        $grossAmount += $dataRow2['totQty']*$dataRow2['price'];

                                                    }

                                                    $netAmount= $grossAmount - ($grossAmount*$discount / 100);

                                                    echo "<tr>";
                                                    echo "<td >" . $dataRow['pos_date'] . "</td>";
                                                    echo "<td >" . $dataRow['pos_time'] . "</td>";
                                                    echo "<td >" . $tempCustId . "</td>";
                                                    echo "<td >" . $dataRow['refNote'] . "</td>";
                                                    echo "<td >" . $dataRow['ref_code'] . "</td>";
                                                    echo "<td >" . $dataRow['proDesc'] . "</td>";
                                                    echo "<td >" . number_format($dataRow['amount'], 2) . "</td>";
                                                    echo "<td >" . number_format($dataRow['pro_disc'], 2) . "</td>";
                                                    echo "<td >" . number_format($netAmount, 2) . "</td>";
                                                    echo "<td ><button onclick='viewItemDetails(" . $dataRow['pos_id'] . "," . $dataRow['customerId'] . "," . number_format($dataRow['pro_disc'], 2) . ")' type='button' class='btn btn-primary btn-sm font-weight-bold'>View</button></td>";
                                                    echo "<td ><a href='print-bill.php?id=" . $dataRow['pos_id'] . "'><button type='button' class='btn btn-primary btn-sm font-weight-bold'>Print</button></a></td>";
                                                    echo "</tr>";
                                                }else{

                                                }

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
            <?php include('footer.php'); ?>
            <!-- End footer -->
        </div>

        <!-- Custom template | don't include it in your project! -->
        <?php include('rightSidebar.php'); ?>
        <!-- End Custom template -->
    </div>

    <script>
        // Start - Modification By Tharindu
        function viewItemDetails(posId, custId, disc) {
            window.location.href = "viewItemDetails-report.php?posId=" + posId + "&&custId=" + custId + "&&disc=" + disc;
        }
        // End - Modification By Tharindu

        function reportByCustomer() {
            var customer = document.getElementById("selectCus").value;
            window.location.href = "sales-report.php?cus=" + customer;
        }

        function reportByUser() {
            var users = document.getElementById("selectUser").value;
            window.location.href = "sales-report.php?user=" + users;
        }

        function handler() {
            if (event.key === 'Enter') {
                var date = document.getElementById("date").value;
                window.location.href = "sales-report.php?date=" + date;
            }
        }

        function pageReload() {
            var location = document.getElementById("txt_locaId").value;

            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var responce = xmlhttp.responseText.trim();
                    document.getElementById("tbody").innerHTML = this.responseText;
                    // alert(responce);
                }
            }
            xmlhttp.open("GET", "ajax/last-mont-sales.php?location=" + location, true);
            xmlhttp.send();
        }
    </script>

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