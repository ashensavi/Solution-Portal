<?php
include 'db/dbConnection.php'; 
session_start();
$id = $_GET['id'];
$card = $_GET['card'];
?>

<?php
$sql = mysqli_query($connection, "SELECT * FROM bill_tbl");
$res = mysqli_fetch_array($sql);
$address = $res['address'];

$sql1 = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_id=$id");
$res1 = mysqli_fetch_array($sql1);
$inHand = $res1['open_price'];
$cashOut = $res1['cash_out'];
$totalHand = $res1['cloce_price'];
$openAt = $res1['open_time'];
$closeAt = $res1['close_time'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SKYPOS</title>
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

    <style></style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
</head>

<body>
    <!-- <div class="wrapper sidebar_minimize"> -->
    <!-- <div class="main-panel"> -->
    <!-- <div class="content"> -->
    <div class="page-inner">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" id="printElement">
                        <div class="row">
                            <div class="col-12">
                                <div style="margin-top:0px; margin-bottom:0px;" align="center">
                                    <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $address; ?>
                                    </p>
                                    <p style="margin-top:0px; margin-bottom:0px;">Cash Out Report</p>
                                    
                                    <p style="margin-top:0px; margin-bottom:0px;font-size:14px;"> Cashier:
                                        <?php echo $_SESSION['user_name'] ?>(<?php echo $_SESSION ['user_id'] ?>) </p>
                                    <p style="margin-top:0px; margin-bottom:0px;font-size:14px;"> Open At: <?php echo $openAt ?> / Close At: <?php echo $openAt ?> </p>
                                </div>

                                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                <div style="margin-top:5px; margin-bottom:0px;">
                                    <div class="row">
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;"> Cashier Open Price
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p
                                                style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                                <?php echo number_format($inHand,2) ?> </p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;"> Cash Out
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p
                                                style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;"> - <?php echo number_format($cashOut,2) ?></p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Card Sales
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($card,2) ?> </p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Total Sales
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format(($totalHand+$cashOut)-$inHand,2) ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: solid 1px; margin-bottom:0px; margin-top:5px;" />
                                <div style="margin-top:5px; margin-bottom:0px;">
                                    <div class="row">
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Total in Hand</p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($totalHand,2) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div onclick="print()" class="row" style="margin:0px;">
                            <div class="col-12 btn btn-primary" style="margin-top:0px; font-weight:bold;">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </div>

                            <div onclick="backToPOS()" class="col-12 btn btn-warning"
                                style="margin-top:5px; font-weight:bold;">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </span>
                                BACK
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->

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

    <script src="assets/js/select2.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script type="text/javascript">
    function backToPOS() {
        window.location.href = "pos.php";
    }

    function print() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=800,height=700');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + printElement.innerHTML + '</html>');
        popupWin.document.close();
    }
    </script>
</body>

</html>