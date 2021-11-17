<?php
include 'db/dbConnection.php';
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
$sql1 = mysqli_query($connection, "SELECT * FROM pos_tbl WHERE pos_id = '$id'");
$res1 = mysqli_fetch_array($sql1);

$amount = $res1['amount'];
$date = $res1['pos_date'];
$time = $res1['pos_time'];
$refNo = $res1['ref_code'];
$discount = $res1['pro_disc'];
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

    <style>
    .buttonmod {
        border: none;
        width: 100%;
        height: 30px;
        margin-left: 0px;
        padding: 0px;
        color: white;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        border-bottom: 0.3px solid white;
    }

    .buttonPay {
        border: none;
        width: 100%;
        height: 100%;
        margin-left: 0px;
        padding: 0px;
        color: white;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
    }

    .loader {
        position: fixed;
        margin: auto;
        right: 5%;
        top: 13%;
        bottom: 87%;
        z-index: 1;
        border: 50px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 45px !important;
        height: 45px !important;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    #style-7::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    #style-7::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    #style-7::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.44, rgb(122, 153, 217)),
                color-stop(0.72, rgb(73, 125, 189)),
                color-stop(0.86, rgb(28, 58, 148)));
    }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- select2 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'>
</head>

<body>
    <div style="display:none;" class="loader" id="loader"></div>
    <div class="wrapper sidebar_minimize">
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
                        <h4 class="page-title">EXCHANGE PRODUCTS</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card" id="style-7" style="height:75vh; overflow-y: scroll;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <!-- <select class="form-control js-select2" id="customertxt">
                                                    <option disabled selected hidden value="">Select Location</option>
                                                    <?php
                                                    $sql = mysqli_query($connection,"SELECT * FROM location_tbl");
                                                    $row = mysqli_num_rows($sql);
                                                    while ($row = mysqli_fetch_array($sql)){
                                                        if ($row['loc_id'] != 1) {
                                                            echo "<option value='". $row['loc_id'] ."'>" .$row ['loc_name'] ."</option>" ;
                                                        }
                                                    }
                                                    ?>
                                                </select> -->
                                                <!-- <div class="input-group-prepend">
                                                    <button data-toggle="modal" data-target="#customerModal" type="button" class="btn btn-icon btn-round btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div> -->
                                            </div>
                                            <!-- <div style="margin-top:3px">
                                                <input type="text" class="form-control" id="proIdText" placeholder="Search product by code or name, you can serch barcode too" onkeyup="getProduct()">
                                            </div> -->

                                            <div class="table-responsive">
                                                <table style="width:100%;"
                                                    class="table-head-bg-info  table-head-bg-primary mt-3"
                                                    id="proTable">
                                                    <thead style="height:15px;">
                                                        <tr style="">
                                                            <th style="text-align:center">#</th>
                                                            <th style="text-align:center">Product</th>
                                                            <!-- <th style="text-align:center">Price</th> -->
                                                            <th style="text-align:center">Qty</th>
                                                            <th style="text-align:center"><i style="color:red;"
                                                                    class="fa fa-trash"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-pricing">
                                        <div class="card-body">
                                            <ul class="specification-list" style=" display:none">
                                                <li style="background-color:#D9EDF7 ;">
                                                    <span style="font-size:15px; color:black; margin-left:10px;"
                                                        class="name-specification" id="totItems">Total Items : </span>
                                                    <span style="font-size:15px; color:black; margin-right:10px;"
                                                        class="status-specification" id="totPrice">Total : </span>
                                                </li>
                                                <li style="background-color:#D9EDF7 ;">
                                                    <span style="font-size:15px; color:blue; margin-left:10px;"
                                                        class="name-specification">Discount :</span>
                                                    <span style="font-size:15px; color:black; margin-left:10px;"
                                                        class="name-specification" id="totDis"></span>
                                                    <!-- <span style="font-size:15px; color:blue; margin-right:2%;"
                                                        class="status-specification">Order Tax :
                                                        <span style="font-size:15px; color:black;"> 856.25</span>
                                                    </span> -->
                                                </li>
                                                <li style="background-color:#DFF0D8;">
                                                    <span
                                                        style="font-size:20px; color:black; font-weight:bold; margin-left:10px;"
                                                        class="name-specification">Total Payable (Rs.)</span>
                                                    <span
                                                        style="font-size:20px; color:black; font-weight:bold; margin-right:10px;"
                                                        class="status-specification" id="totWithDisc"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer ">
                                            <div class="row user-stats text-center" style="height:50px;">
                                                <div class="col">
                                                    <!-- <div class="number">
                                                        <button class="buttonPay" onclick="holdPOS()"
                                                            style="background-color:#E08D0B;">Hold</button>
                                                    </div> -->
                                                    <div class="title">
                                                        <button class="buttonPay"
                                                            style="background-color:#D73925;height:50px;"
                                                            onclick="cancelPOS()"> Cancel </button>
                                                    </div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="number">
                                                        <button class="buttonPay" style="background-color:#504D8B;"
                                                            onclick="print()"> Print Order </button>
                                                    </div>
                                                    <div class="title">
                                                        <button class="buttonPay" data-toggle="modal"
                                                            style="background-color:#021A35;" data-target="#holdModal"
                                                            onclick="addRowHold()">
                                                            View Hold </button>
                                                    </div>
                                                </div> -->
                                                <div class="col" style="background-color:#008C4C; padding: 0px;">
                                                    <button class="buttonPay" style="background-color:#008C4C;"
                                                        onclick="save()">Exchange</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header" align="center" style="background-color:lightgray;">
                                    <h2 style="color:#1572e8; font-weight:bold;">Bill Preview</h2>
                                </div>
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
                                                <table style="width:100%;" class="table-head mt-3" id="">
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
                                        $x = 1;
                                        $sql2="SELECT * FROM pos_tbl,pos_details_tbl,stock_tbl,batch_tbl WHERE pos_tbl.pos_id = '$id' AND pos_details_tbl.pos_id = pos_tbl.pos_id AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
                                        $result = mysqli_query($connection,$sql2);

                                        while($dataRow=mysqli_fetch_assoc($result)){
                                            // $tot = $dataRow['totQty'] * $dataRow['totQty'];
                                            echo "<tr>";
                                            echo "<td style='text-align:center'>".$x."</td>";
                                            echo "<td style='text-align:center'>".$dataRow['pro_name']."(".$dataRow['pro_code'].")</td>";
                                            echo "<td style='text-align:center'>".number_format($dataRow['price'],2)."</td>";
                                            echo "<td style='text-align:center'>".$dataRow['totQty']."</td>";
                                            echo "<td style='text-align:center'>".number_format($dataRow['totQty']*$dataRow['price'],2)."</td>";
                                            echo "</tr>";
                                        $x++;
                                        $grossAmount += $dataRow['totQty']*$dataRow['price'];
                                        } 
                                        $netAmount= $grossAmount - ($grossAmount*$discount / 100);
                                        $disPrice= ($grossAmount*$discount / 100);
                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                            <div style="margin-top:5px; margin-bottom:0px;">
                                                <div class="row">
                                                    <div class="col-6" align="left">
                                                        <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;">
                                                            Gross Amount
                                                        </p>
                                                    </div>
                                                    <div class="col-6" align="right">
                                                        <p
                                                            style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                                            <?php echo number_format($grossAmount,2) ?> </p>
                                                    </div>
                                                    <div class="col-6" align="left">
                                                        <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;">
                                                            Discount
                                                        </p>
                                                    </div>
                                                    <div class="col-6" align="right">
                                                        <p
                                                            style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;">
                                                            <?php echo $discount ?>%
                                                            (<?php echo number_format($disPrice,2) ?>)</p>
                                                    </div>
                                                    <div class="col-6" align="left">
                                                        <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;">
                                                            Net Amount
                                                        </p>
                                                    </div>
                                                    <div class="col-6" align="right">
                                                        <p
                                                            style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                            <?php echo number_format($netAmount,2) ?> </p>
                                                    </div>
                                                    <div class="col-6" align="left">
                                                        <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;">
                                                            Cash </p>
                                                    </div>
                                                    <div class="col-6" align="right">
                                                        <p
                                                            style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                            <?php echo number_format($amount,2) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                            <div style="margin-top:5px; margin-bottom:0px;">
                                                <div class="row">
                                                    <div class="col-6" align="left">
                                                        <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;">
                                                            Change </p>
                                                    </div>
                                                    <div class="col-6" align="right">
                                                        <p
                                                            style="margin-top:0px; margin-bottom:0px; margin-right:20px;">
                                                            <?php echo $amount - $netAmount ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                                            <div style="margin-top:0px; margin-bottom:0px;" align="center">
                                                <svg id="barcode"></svg>
                                            </div>
                                            <div style="margin-top:0px; margin-bottom:0px;" align="center">
                                                <?php echo $description; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- *************************************************************** -->
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

        <!--   barcode generator JS Files   -->
        <script src="assets/js/jsBarcode.all.min.js"></script>

        <?php 
        $sql8 = mysqli_query($connection, "SELECT * FROM exchange_tbl WHERE exchange_bill = '$id'");
        $res8 = mysqli_fetch_array($sql8);

        if (!empty($res8['exchange_bill'])) { ?>
            <script>
                var SweetAlert2Demo = function() {
                    var initDemos = function() {
                        swal({
                            icon: "error",
                            title: 'Exchange Bill issued',
                            type: 'error',
                            buttons: {
                                confirm: {
                                    text: 'OK',
                                    className: 'btn btn-danger'
                                }
                            }
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.href = "exchange-product.php";
                            } else {
                                window.location.href = "exchange-product.php";
                            }
                        });
                    };
                    return {
                    init: function() {
                        initDemos();
                    },
                };
                }();
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });
            </script>
        <?php } ?>

        

        <script type="text/javascript">
        JsBarcode("#barcode", "<?php echo $id ?>", {
            format: "CODE128",
            lineColor: "#000000",
            height: 50,
            displayValue: false
        });
        </script>

        <script type="text/javascript">
        var tableData = [];
        var calObj = [];
        var loader = document.getElementById("loader");
        var newPrice = 0;
        var obj = [];
        var storObj = [];
        </script>

        <script type="text/javascript">
        function cancelPOS() {
            window.location.href = 'exchange-product.php';
        }

        function calculatePrice() {
            var total = 0.00;
            var totWithDis = 0.00;
            var disc = 0.00;
            var totDisc = 0.00;
            var items = 0;
            var totItem = 0;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    items++;
                    totItem += tableData[i].totQty;
                    total += tableData[i].price * tableData[i].totQty;
                }
            }
            totDisc += (total * disc / 100);
            totWithDis += total - totDisc;

            calObj = {
                "total": total,
                "totWithDis": totWithDis,
                "disc": disc,
                "totDisc": totDisc,
                "items": items,
                "totItem": totItem
            }
            // console.log(calObj);
        }

        function save() {
            loader.style.display = "block";
            var proObj = [];

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    proObj.push({
                        id: tableData[i].id,
                        code: tableData[i].code,
                        proName: tableData[i].proName,
                        stockId: tableData[i].stockId,
                        qty: tableData[i].qty,
                        totQty: tableData[i].totQty
                    });
                }
            } 

            obj = {
                "billId":<?php echo $id ?>,
                proObj
            }

            $.ajax({
                url: "ajax/exchange_pro.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function(data) {
                    
                    var res = JSON.parse(data);

                    if (res.status == 'success') {
                        loader.style.display = "none";
                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
                                swal({
                                    icon: "success",
                                    title: 'Success !',
                                    type: 'success',
                                    buttons: {
                                        confirm: {
                                            text: 'OK',
                                            className: 'btn btn-success'
                                        }
                                    }
                                }).then((Delete) => {
                                    if (Delete) {
                                        window.location.href = "exchange-bill.php?id=" + res.bill_id;
                                    } else {
                                        window.location.href = "exchange-bill.php?id=" + res.bill_id;
                                    }
                                });
                            };
                            return {
                                init: function() {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function() {
                            SweetAlert2Demo.init();
                        });
                    } else if (res.status == 'error') {
                        loader.style.display = "none";
                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
                                swal({
                                    icon: "error",
                                    title: 'Not Success !',
                                    type: 'error',
                                    buttons: {
                                        confirm: {
                                            text: 'OK',
                                            className: 'btn btn-danger'
                                        }
                                    }
                                });
                            };
                            return {
                                init: function() {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function() {
                            SweetAlert2Demo.init();
                        });
                    }
                },
                error: function(xhr, status, error) {
                    loader.style.display = "none";
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function() {
                        var initDemos = function() {
                            swal({
                                icon: "error",
                                title: 'Not Success !' + errorMessage,
                                type: 'error',
                                buttons: {
                                    confirm: {
                                        text: 'OK',
                                        className: 'btn btn-danger'
                                    }
                                }
                            });
                        };
                        return {
                            init: function() {
                                initDemos();
                            },
                        };
                    }();
                    jQuery(document).ready(function() {
                        SweetAlert2Demo.init();
                    });
                }
            });
        }

        function addRow() {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    var x = document.getElementById("proTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'><button class='btn btn-primary btn-xs'>" + tableData[i].proName +
                        "(" + tableData[i].code + ")" + "</button></td>" +
                        "<td><div><input type='text' class='form-control form-control-sm' id='" + tableData[i].id +
                        "' value='" + tableData[i].totQty + "' style='text-align:center' onkeyup='editQty(" + tableData[
                            i].id + ")'></div></td>" + "<td style='text-align:center'>" +
                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' " + "class='btn btn-link btn-danger'" +
                        ">" + "<i class='fa fa-trash'></i>" + "</button></td>" +
                        "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }
            calculatePrice();
        }

        function removeRow(x) {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id == x) {
                        delete tableData[i];
                    }
                }
            }
            addRow();
        }

        function editQty(id) {

            var editQty = 0;
            editQty = document.getElementById(id).value;

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i].id === id) {
                    if (tableData[i].qty >= parseInt(editQty)) {
                        tableData[i].totQty = parseInt(editQty);

                    } else {
                        tableData[i].totQty = 1;
                        document.getElementById(id).value = tableData[i].qty;

                        var content = {};
                        content.message = 'Bill Quantity : ' + tableData[i].qty;
                        content.title = 'Please check the' + tableData[i].proName + ' Quantity';
                        content.icon = 'fas fa-exclamation';

                        $.notify(content, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 4500,
                        });
                    }
                }
            }
        }
        </script>

        <?php 
        $sql2="SELECT * FROM pos_details_tbl WHERE pos_id = '$id'";
        $result = mysqli_query($connection,$sql2);

        while($dataRow=mysqli_fetch_assoc($result)){ ?>

        <script>
            tableData.push({
                id: <?php echo $dataRow['pos_det_id'] ?> ,
                code: '<?php echo $dataRow['pro_code'] ?>' ,
                proName: '<?php echo $dataRow['pro_name'] ?>',
                stockId: <?php echo $dataRow['stock_id'] ?> ,
                qty: <?php echo $dataRow['totQty'] ?> ,
                totQty: <?php echo $dataRow['totQty'] ?>
            });

            addRow();
        </script>

        <?php } ?>
</body>

</html>