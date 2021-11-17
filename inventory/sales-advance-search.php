<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php
//$product_id=$_POST['txt_pro_id'];
//$customer_id=$_POST['txt_cust_id'];
//$user_id=$_POST['txt_user_id'];
//$location_id=$_POST['txt_location_id'];
//$date_from=$_POST['date_from'];
//$date_to=$_POST['date_to'];

//echo $date_to;

?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Sales Report | SKYPOS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

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
            active: function () {
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
                    <h4 class="page-title">Filter Result (Sales)</h4>
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
                            <a href="#">Filter Result (Sales)</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-12">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Customer</th>
                                            <th>Ref. Note</th>
                                            <th>Pro. Description</th>
                                            <th>Cash Amount</th>
                                            <th>Pay By</th>
                                            <th>Pay Note</th>
                                            <th>secu. Code</th>
                                            <th>Card No</th>
                                            <th>Holder Name</th>
                                            <th>Card Type</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>cvv2</th>
                                            <th>cheque No</th>
                                            <th>Ref. Code</th>
                                            <th>Discount %</th>
                                            <th>Product</th>
                                            <!-- <th>sdfs</th> -->
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Customer</th>
                                            <th>Ref. Note</th>
                                            <th>Pro. Description</th>
                                            <th>Cash Amount</th>
                                            <th>Pay By</th>
                                            <th>Pay Note</th>
                                            <th>secu. Code</th>
                                            <th>Card No</th>
                                            <th>Holder Name</th>
                                            <th>Card Type</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>cvv2</th>
                                            <th>cheque No</th>
                                            <th>Ref. Code</th>
                                            <th>Discount %</th>
                                            <th>Product</th>
                                            <!-- <th>fsdf</th> -->
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        if (!empty($_POST['txt_pro_id']) && !empty($_POST['txt_cust_id']) && !empty($_POST['txt_user_id']) && !empty($_POST['txt_location_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to'])) {
                                            $product_id = $_POST['txt_pro_id'];

                                            $customer_id = $_POST['txt_cust_id'];
                                            $user_id = $_POST['txt_user_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];

                                            $sql = "SELECT * FROM pos_tbl,user_tbl,products_tbl WHERE products_tbl.pro_id = '$product_id' AND pos_tbl.customerId= '$customer_id' AND user_tbl.user_id= '$user_id' AND user_tbl.user_loc= '$location_id' AND pos_tbl.pos_date BETWEEN '$date_from' AND '$date_to'";

                                        } elseif (!empty($_POST['txt_cust_id']) && !empty($_POST['txt_user_id']) && !empty($_POST['txt_location_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to'])) {

                                            $customer_id = $_POST['txt_cust_id'];
                                            $user_id = $_POST['txt_user_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl,user_tbl WHERE pos_tbl.customerId= '$customer_id' AND user_tbl.user_id= '$user_id' AND user_tbl.user_loc= '$location_id' AND pos_tbl.pos_date BETWEEN '$date_from' AND '$date_to'";

                                        } elseif (!empty($_POST['txt_pro_id']) && !empty($_POST['txt_user_id']) && !empty($_POST['txt_location_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to'])) {
                                            $product_id = $_POST['txt_pro_id'];
                                            $customer_id = $_POST['txt_cust_id'];
                                            $user_id = $_POST['txt_user_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl,user_tbl,products_tbl WHERE products_tbl.pro_id = '$product_id' AND user_tbl.user_id= '$user_id' AND user_tbl.user_loc= '$location_id' AND pos_tbl.pos_date BETWEEN '$date_from' AND '$date_to'";
                                        } elseif (!empty($_POST['txt_pro_id']) && !empty($_POST['txt_cust_id']) && !empty($_POST['txt_location_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to'])) {
                                            $product_id = $_POST['txt_pro_id'];
                                            $customer_id = $_POST['txt_cust_id'];

                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl,user_tbl,products_tbl WHERE products_tbl.pro_id = '$product_id' AND pos_tbl.customerId= '$customer_id' AND user_tbl.user_loc= '$location_id' AND pos_tbl.pos_date BETWEEN '$date_from' AND '$date_to'";

                                        } elseif (!empty($_POST['txt_pro_id']) && !empty($_POST['txt_cust_id']) && !empty($_POST['txt_user_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to']) && !empty($_POST['txt_location_id'])) {
                                            $product_id = $_POST['txt_pro_id'];
                                            $customer_id = $_POST['txt_cust_id'];
                                            $user_id = $_POST['txt_user_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl WHERE added_user = '$product_id' ";
                                        } elseif (!empty($_POST['txt_pro_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to']) && !empty($_POST['txt_location_id'])) {
                                            $product_id = $_POST['txt_pro_id'];


                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl WHERE added_user = '$product_id' ";
                                        } elseif (!empty($_POST['txt_cust_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to']) && !empty($_POST['txt_location_id'])) {
                                            $customer_id = $_POST['txt_cust_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl WHERE added_user = '$customer_id' ";
                                        } elseif (!empty($_POST['txt_user_id']) && !empty($_POST['date_from']) && !empty($_POST['date_to']) && !empty($_POST['txt_location_id'])) {

                                            $user_id = $_POST['txt_user_id'];
                                            $location_id = $_POST['txt_location_id'];
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            $sql = "SELECT * FROM pos_tbl WHERE added_user = '$user_id' ";
                                        } else {
                                            $date_from = $_POST['date_from'];
                                            $date_to = $_POST['date_to'];
                                            echo $date_to;
                                            echo $date_from;
//                                            $sql = "SELECT * FROM pos_tbl WHERE pos_date = '$date_to' ";
                                            $sql = "SELECT * FROM pos_tbl WHERE pos_date BETWEEN '$date_from' AND '$date_to'";
                                        }

                                        $result = mysqli_query($connection, $sql);

                                        while ($dataRow = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td >" . $dataRow['pos_date'] . "</td>";
                                            echo "<td >" . $dataRow['pos_time'] . "</td>";
                                            echo "<td >" . $dataRow['added_user'] . "</td>";
                                            echo "<td >" . $dataRow['customerId'] . "</td>";
                                            echo "<td >" . $dataRow['refNote'] . "</td>";
                                            echo "<td >" . $dataRow['proDesc'] . "</td>";
                                            echo "<td >" . number_format($dataRow['amount'], 2) . "</td>";
                                            echo "<td >" . $dataRow['payBy'] . "</td>";
                                            echo "<td >" . $dataRow['payNote'] . "</td>";
                                            echo "<td >" . $dataRow['secuCode'] . "</td>";
                                            echo "<td >" . $dataRow['cardNo'] . "</td>";
                                            echo "<td >" . $dataRow['holdName'] . "</td>";
                                            echo "<td >" . $dataRow['cardType'] . "</td>";
                                            echo "<td >" . $dataRow['month'] . "</td>";
                                            echo "<td >" . $dataRow['year'] . "</td>";
                                            echo "<td >" . $dataRow['cvv2'] . "</td>";
                                            echo "<td >" . $dataRow['cheqNo'] . "</td>";
                                            echo "<td >" . $dataRow['ref_code'] . "</td>";
                                            echo "<td >" . number_format($dataRow['pro_disc'], 2) . "</td>";
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
        <?php include('footer.php'); ?>
        <!-- End footer -->
    </div>

    <!-- Custom template | don't include it in your project! -->
    <?php include('rightSidebar.php'); ?>
    <!-- End Custom template -->
</div>


<script>
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
    $(document).ready(function () {
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
