<?php
include 'db/dbConnection.php'; 
session_start();
$id = $_GET['id'];
?>

<?php
$sql = mysqli_query($connection, "SELECT * FROM bill_tbl");
$res = mysqli_fetch_array($sql);

$address = $res['address'];
$phone = $res['tell_num'];
$description = $res['discription'];
$img = $res['bill_logo'];
?>

<?php
$sql1 = mysqli_query($connection, "SELECT * FROM exchange_tbl WHERE exchange_id = '$id'");
$res1 = mysqli_fetch_array($sql1);

// $amount = $res1['amount'];
$date = $res1['exchange_date'];
// $time = $res1['pos_time'];
// $refNo = $res1['ref_code'];
// $discount = $res1['pro_disc'];
$total = $res1['exchange_price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Bill | SKYPOS</title>
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
    <link rel="stylesheet" href="assets/css/select2.min.css">
</head>

<body>
    <!-- <div class="wrapper sidebar_minimize"> -->
    <!-- <div class="main-panel"> -->
    <!-- <div class="content"> -->
    <div class="page-inner">
        <div class="row">
            <div class="col-md-3">  </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" id="printElement">
                        <div class="row">
                            <div class="col-12">
                                <div style="margin-bottom:10px;margin-left:20px;" align="left">
                                    <img src="assets/img/billimg/<?php echo $img; ?>" style="" class="">
                                    <h3 style="margin-top:10px;">Exchange Bill</h3>
                                </div>

                                <hr style="border-top: dotted 1px; margin-bottom:0px;" />

                                <div style="margin-top:0px; margin-bottom:0px;margin-left:20px;" align="left">
                                    <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $address; ?>
                                    </p>
                                    <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $phone; ?>
                                    </p>
                                    <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $date ?> </p>
                                    <p style="margin-top:0px; margin-bottom:0px;font-size:11px;"> Cashier:
                                        <?php echo $_SESSION['user_name'] ?>(<?php echo $_SESSION ['user_id'] ?>)
                                         </p>
                                </div>

                                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />

                                <div class="">
                                    <table style="width:100%;margin-left:20px;" class="table-head mt-3" id="proTable">
                                        <thead
                                            style="height:15px; border-bottom-style: dotted; border-bottom-width: 1px;">
                                            <tr style="">
                                                <th style="text-align:left;font-size:10px;width:20px!important ;">Ln</th>
                                                <th style="text-align:left;font-size:10px;width:40px!important ;">Items</th>
                                                <!-- <th style="text-align:center">Price</th> -->
                                                <th style="text-align:left;font-size:10px;padding-left:15px;">Qty</th>
                                                <!-- <th style="text-align:center">Amount</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $x = 1;
                                        $sql2="SELECT * FROM exchangedetaol_tbl WHERE exchange_refId = '$id'";
                                        $result = mysqli_query($connection,$sql2);

                                        while($dataRow=mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td style='text-align:left;font-size:10px;width:20px!important ;'>".$x."</td>";
                                            echo "<td style='text-align:left; width:40px!important ;font-size:10px;'>".$dataRow['exDetail_proName']."</td>";
                                            // echo "<td style='text-align:center'>".number_format($dataRow['price'],2)."</td>";
                                            echo "<td style='text-align:left;font-size:10px;padding-left:15px;'>".$dataRow['exDetail_qty']."</td>";
                                            // echo "<td style='text-align:center'>".number_format($dataRow['totQty']*$dataRow['price'],2)."</td>";
                                            echo "</tr>";
                                            $x++;
                                        } 
                                        
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                <div style="margin-top:5px; margin-bottom:0px;">
                                    <div class="row">
                                        <!-- <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;"> Gross Amount
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p
                                                style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                                <?php echo number_format($grossAmount,2) ?> </p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;"> Discount
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p
                                                style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                                <?php echo $discount ?>% (<?php echo number_format($disPrice,2) ?>)</p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Exchange Price
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($excPrice,2) ?> </p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Net Amount
                                            </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($netAmount,2) ?> </p>
                                        </div>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Cash </p>
                                        </div>
                                        <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($amount,2) ?>
                                            </p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" /> -->
                                <div style="margin-top:5px; margin-bottom:0px;margin-left:10px;">
                                    <div class="row">
                                        <div class="col-12" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Total : <?php echo number_format($total,2) ?> </p> </p>
                                        </div>
                                        <!-- <div class="col-6" align="right">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                <?php echo number_format($total,2) ?> </p>
                                        </div> -->
                                    </div>
                                </div>
                                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                <div style="margin-top:0px; margin-bottom:0px;margin-left:10px;" align="left">
                                    <svg id="barcode"></svg>
                                </div>
                                <div style="margin-top:0px; margin-bottom:0px;margin-left:20px;" align="left">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                    <button type="button" id="openWin" class="btn btn-icon btn-round" title="Print" style="position:fixed;margin:auto; bottom:250px; right:10px; width:70px; height:70px; background-color:#5C55BF;" onclick="print()" data-toggle="tooltip">
                    <i class="fa fa-print" style="font-size:200%; color:white;"></i>
                    </button>
                    <button type="button" id="openWin" class="btn btn-icon btn-round" title="Back To POS" style="position:fixed;margin:auto; bottom:150px; right:10px; width:70px; height:70px; background-color:#9d9100;" onclick="backToPOS()" data-toggle="tooltip">
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:210%; color:white;"></i>
                    </button>
                        <!-- <div onclick="print()" class="row" style="margin:0px;"> -->
                            <!-- <div class="col-12 btn btn-primary" style="margin-top:0px; font-weight:bold;">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </div> -->

                            <!-- <div onclick="backToPOS()" class="col-12 btn btn-warning"
                                style="margin-top:5px; font-weight:bold;">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </span>
                                BACK TO POS
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"> </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <!--   barcode generator JS Files   -->
    <script src="assets/js/jsBarcode.all.min.js"></script>
    
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
    JsBarcode("#barcode", "<?php echo $id ?>", {
        format: "CODE128",
        lineColor: "#000000",
        // width: 4,
        height: 50,
        displayValue: false
    });
    </script>
</body>

</html>