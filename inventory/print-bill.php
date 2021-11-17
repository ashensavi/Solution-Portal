<?php
include 'db/dbConnection.php';
session_start();
$id = $_GET['id'];
?>

<?php
$sql = mysqli_query($connection, "SELECT * FROM bill_tbl WHERE bill_loc = $_SESSION[user_loc]");
$res = mysqli_fetch_array($sql);

$address = $res['address'];
$phone = $res['tell_num'];
$description = $res['discription'];
$img = $res['bill_logo'];
?>

<?php
// $sql1 = mysqli_query($connection, "SELECT * FROM pos_tbl,pos_details_tbl,stock_tbl,batch_tbl WHERE pos_tbl.pos_id = '14' AND pos_details_tbl.pos_id = pos_tbl.pos_id AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id");
$sql1 = mysqli_query($connection, "SELECT * FROM pos_tbl WHERE pos_id = '$id'");
$res1 = mysqli_fetch_array($sql1);

$amount = $res1['amount'];
$date = $res1['pos_date'];
$time = $res1['pos_time'];
$refNo = $res1['ref_code'];
$discount = $res1['pro_disc'];
// echo json_encode($amount);
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
                            <div style="margin-bottom:10px" align="center">
                                <img src="assets/img/billimg/<?php echo $img; ?>" style="" class="">
                            </div>

                            <hr style="border-top: dotted 1px; margin-bottom:0px;" />

                            <div style="margin-top:0px; margin-bottom:0px;" align="center">
                                <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $address; ?>
                                </p>
                                <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $phone; ?>
                                </p>
                                <p style="margin-top:0px; margin-bottom:0px;"> <?php echo $date ?>
                                    <?php echo $time ?>
                                </p>
                                <p style="margin-top:0px; margin-bottom:0px;font-size:11px;"> User:
                                    <?php echo $_SESSION['user_name'] ?>(<?php echo $_SESSION ['user_id'] ?>)
                                    Ref:<?php echo $refNo ?> </p>
                            </div>

                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />

                            <div class="">
                                <table style="width:100%;" class="table-head mt-3" id="proTable">
                                    <thead
                                            style="height:15px; border-bottom-style: dotted; border-bottom-width: 1px;">
                                    <tr style="">
                                        <th style="text-align:center">Ln</th>
                                        <th style="text-align:center">Items</th>
                                        <th style="text-align:center">Price</th>
                                        <th style="text-align:center">Qty</th>
                                        <th style="text-align:center">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $grossAmount=0;
                                    $exchangePrice=0;
                                    $x = 1;
                                    $sql2="SELECT * FROM pos_tbl,pos_details_tbl,stock_tbl,batch_tbl,products_tbl WHERE pos_tbl.pos_id = '$id' AND pos_details_tbl.pos_id = pos_tbl.pos_id AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id AND products_tbl.pro_id = stock_tbl.pro_id";
                                    $result = mysqli_query($connection,$sql2);

                                    while($dataRow=mysqli_fetch_assoc($result)){
                                        // $tot = $dataRow['totQty'] * $dataRow['totQty'];
                                        $paymentType = $dataRow['payBy'];
                                        echo "<tr>";
                                        echo "<td style='text-align:center'>".$x."</td>";
                                        echo "<td style='text-align:center'>".$dataRow['pro_name']."(".$dataRow['pro_code'].")</td>";
                                        echo "<td style='text-align:center'>".number_format($dataRow['price'],2)."</td>";
                                        echo "<td style='text-align:center'>".$dataRow['totQty']."</td>";
                                        echo "<td style='text-align:center'>".number_format($dataRow['totQty']*$dataRow['price'],2)."</td>";
                                        echo "</tr>";
                                        $x++;
                                        $grossAmount += $dataRow['totQty']*$dataRow['price'];
                                        $exchangePrice = $dataRow['exc_bill_price'];
                                    }

                                    $netAmount= $grossAmount - ($grossAmount*$discount / 100);
                                    $disPrice= ($grossAmount*$discount / 100);
                                    $netAmount -= $exchangePrice;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                            <div style="margin-top:5px; margin-bottom:0px;">
                                <div class="row">
                                    <div class="col-6" align="left">
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
                                        <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;"> Exchange price
                                        </p>
                                    </div>
                                    <div class="col-6" align="right">
                                        <p
                                                style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                            <?php echo number_format($exchangePrice,2) ?></p>
                                    </div>
                                    <div class="col-6" align="left">
                                        <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Net Amount
                                        </p>
                                    </div>
                                    <div class="col-6" align="right">
                                        <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                            <?php echo number_format($netAmount,2) ?> </p>
                                    </div>
                                    <?php if($paymentType === "cash"){ ?>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Cash Payment</p>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-6" align="left">
                                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Card Payment</p>
                                        </div>
                                    <?php } ?>
                                    <div class="col-6" align="right">
                                        <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                            <?php echo number_format($amount,2) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                            <div style="margin-top:5px; margin-bottom:0px;">
                                <div class="row">
                                    <div class="col-6" align="left">
                                        <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;"> Change </p>
                                    </div>
                                    <div class="col-6" align="right">
                                        <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                            <?php echo $amount - $netAmount ?> </p>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                            <div style="margin-top:0px; margin-bottom:0px;" align="center">
                                <?php echo $description; ?>
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
                            BACK TO POS
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