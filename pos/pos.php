<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>POS | SKYPOS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>

    <!-- select2 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'>

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
</head>

<body>
<div style="display:none;" class="loader" id="loader"></div>
<div class="wrapper sidebar_minimize">
    <!-- Navbar Header -->
    <?php include('header.php'); ?>
    <!-- End Navbar -->
    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">POS</h4>
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
                            <?php if ($_SESSION['user_type'] === "super admin") { ?>
                                <select name="cars" id="billTypes">
                                    <option value="non" hidden>Select Bill Type</option>
                                    <option value="hiddenBill">Hidden Bill</option>

                                </select>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card" id="style-7" style="height:75vh; overflow-y: scroll;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="form-control" id="customertxt">
                                                <option disabled selected hidden value="">Select One</option>
                                                <?php
                                                // $sql = mysqli_query($connection,"SELECT * FROM customer_tbl");
                                                $sql = mysqli_query($connection, "SELECT * FROM customer_tbl,user_tbl WHERE user_tbl.user_id = customer_tbl.added_user AND user_tbl.user_loc = $location");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    echo "<option value='" . $row['cus_id'] . "'>" . $row ['cus_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="input-group-prepend">
                                                <button data-toggle="modal" data-target="#customerModal"
                                                        type="button" class="btn btn-icon btn-round   btn-danger">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div style="margin-top:3px">
                                            <input type="text" class="form-control" id="refNotTxt"
                                                   placeholder="Reference Note">
                                        </div>
                                        <div style="margin-top:3px">
                                            <input type="text" class="form-control" id="proIdText"
                                                   placeholder="Search product by code or name, you can serch barcode too"
                                                   onkeyup="getProduct()">
                                        </div>
                                        <div style="margin-top:3px">
                                            <select class="form-control js-select3" id="txt_stockPro"
                                                    onchange="addToTableOnSelectByProduct()">
                                                <option disabled selected hidden>Select Product</option>

                                                <?php
                                                $sql = mysqli_query($connection, "SELECT * FROM products_tbl,stock_tbl,batch_tbl WHERE stock_tbl.pro_id = products_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id AND batch_tbl.batch_location = '$location' group by products_tbl.pro_id");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    echo "<option value='" . $row['pro_id'] . "'>" . $row['pro_code'] . " / " . $row['pro_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="table-responsive">
                                            <table style="width:100%;"
                                                   class="table-head-bg-info  table-head-bg-danger mt-3"
                                                   id="proTable">
                                                <thead style="height:15px;">
                                                <tr style="">
                                                    <th style="text-align:center">#</th>
                                                    <th style="text-align:center">Product</th>
                                                    <th style="text-align:center">Price</th>
                                                    <th style="text-align:center">Dis</th>
                                                    <th style="text-align:center">Qty</th>
                                                    <th style="text-align:center">Subtotal</th>
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
                                        <ul class="specification-list">
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
                                        <div class="row user-stats text-center">
                                            <div class="col">
                                                <div class="number">
                                                    <button class="buttonPay" onclick="holdPOS()"
                                                            style="background-color:#E08D0B;">Hold
                                                    </button>
                                                </div>
                                                <div class="title">
                                                    <button class="buttonPay" style="background-color:#D73925;"
                                                            onclick="cancelPOS()"> Cancel
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="number">
                                                    <button class="buttonPay" style="background-color:#504D8B;"
                                                            onclick="voidSale()"> Void Sales
                                                    </button>
                                                </div>
                                                <div class="title">
                                                    <button class="buttonPay" data-toggle="modal"
                                                            style="background-color:#021A35;" data-target="#holdModal"
                                                            onclick="addRowHold()">
                                                        View Hold
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col" style="background-color:#008C4C; padding: 0px;">
                                                <button data-toggle="modal" data-target="#paymentModal"
                                                        class="buttonPay" style="background-color:#008C4C;"
                                                        onclick="payment()">Payment
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" style="padding-left:1px;">
                        <div class="card card-post card-round"
                             style="height:75vh; overflow-y: scroll; overflow-x: hidden;" id="style-7">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <!-- <div class=" col-md-3" align="center">
                                        <h5 id="packTag" style="font-size:11px; font-weight:boled; color:#e68900;">
                                            View Packs</h5>
                                        <h5 id="proTag"
                                            style="display:none; font-size:11px; font-weight:boled; color:#e68900;">
                                            View Products</h5>
                                        <input type="checkbox" id="toggle_1" class="chkbx-toggle"
                                            onclick="viewPack()">
                                        <label for="toggle_1"></label>
                                    </div> -->
                                    <div class=" col-md-12" id="catDev">
                                        <select class="form-control js-select3" id="txt_proCat"
                                                onchange="getSubCategoryInPos()">
                                            <option disabled selected hidden>Select Category</option>

                                            <?php
                                            $sql = mysqli_query($connection, "SELECT * FROM category_tbl");
                                            $row = mysqli_num_rows($sql);
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo "<option value='" . $row['cate_id'] . "'>" . $row['cat_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <select class="form-control js-select3" id="txt_proSubCat"
                                                onchange="getProductByCate()">
                                            <option disabled selected hidden>Select Subcategory</option>
                                        </select>
                                        <select class="form-control js-select3" id="pack_id"
                                                onchange="selectPack()">
                                            <option disabled selected hidden>Select Pack</option>

                                            <?php
                                            $sql = mysqli_query($connection, "SELECT * FROM pack_tbl");
                                            $row = mysqli_num_rows($sql);
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo "<option value='" . $row['pack_id'] . "'>" . $row['pack_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row" id="proList">

                                </div>
                                <div class="row" id="packList" style="display:none;">

                                    <!-- <?php
                                    $sql = mysqli_query($connection, "SELECT * FROM pack_tbl");
                                    $row = mysqli_num_rows($sql);
                                    while ($row = mysqli_fetch_array($sql)) { ?>

                                        <div class="col-3 btn" style="padding:2px;" onclick="selectPack()">
                                            <div class="card card-post card-round"
                                                style="background-color:#48AAF7; border-color:black;">
                                                <p
                                                    style="text-align:center; color:white; margin-top:0px; margin-bottom:0px;">
                                                    <?php echo $row['pack_name']; ?></p>
                                                <p
                                                    style="text-align:center; color:white; margin-top:0px; margin-bottom:0px;">
                                                    <?php echo $row['pack_grade']; ?></p>
                                                <p
                                                    style="text-align:center; color:white; margin-top:0px; margin-bottom:0px;">
                                                    <?php echo $row['pack_disc']; ?>%</p>
                                            </div>
                                        </div>
                                        <?php } ?> -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- *************************************************************** -->
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php include('footer.php'); ?>
        <!-- End footer -->
    </div>

    <!-- payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">PAYMENT</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- style="background-color:#00A55A;" -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6" style="height:40px;">
                                    <label style="font-weight: bold !important;">Total Items :
                                        <span id="payItems" style="color:red;"></span></label>
                                </div>
                                <div class="col-sm-6" style="height:40px;">
                                    <label style="font-weight: bold !important;">Total Payable :
                                        <span id="payPayble" style="color:red;"></span></label>
                                </div>
                                <div class="col-sm-6" style="height:40px;">
                                    <label style="font-weight: bold !important;">Total Paying :
                                        <span id="payPaying" style="color:red;"></span></label>
                                </div>
                                <div class="col-sm-6" style="height:40px;">
                                    <label style="font-weight: bold !important;">Balance Rs.
                                        <span id="payBalance" style="color:red;">0.00</span></label>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" rows="2" id="proDescrip"></textarea>
                                </div>
                                <div style="display:none">
                                    <input type="text" id="txtExchangeId">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="padding-left: 0px; padding-right: 0px;">
                                        <label>Exchange Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="txtExchange"
                                                   onkeyup="exchangeBill()">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger btn-border" type="button"
                                                        onclick="clearExchange()"
                                                        style="font-weight:bold;">Clear
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Discount</label>
                                    <input type="number" class="form-control" id="txtDiscount" name=""
                                           onkeyup="calcDiscount()">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" id="txtAmount" name=""
                                           onkeyup="calcBalance()">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Paying by</label>
                                    <select class="form-control" id="paimentType" name="txt_brand"
                                            onchange="selectPaymentType()">
                                        <option value="cash">Cash</option>
                                        <option value="credit">Credit Card</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="other">Other Payment</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 form-group" id="cash">
                                    <label>Payment note</label>
                                    <input type="text" class="form-control" id="payNote" name="txt_">
                                </div>

                                <div style="display: none;" class="col-sm-12 form-group" id="cheque">
                                    <label>Cheque No</label>
                                    <input type="text" class="form-control" id="cheqNo" name="txt_">
                                </div>

                                <div style="display: none;" class="col-sm-12 form-group" id="credit">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <input type="text"
                                                   placeholder="Swipe Card here write security code manually"
                                                   class="form-control" id="secuCode" name="txt_">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" placeholder="Credit Card No" class="form-control"
                                                   id="cardNo" name="">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" placeholder="Holder Name" class="form-control"
                                                   id="holdName" name="">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <select class="form-control" id="cardType" name="">
                                                <option disabled selected hidden value="">Select One</option>
                                                <option value="Visa">Visa</option>
                                                <option value="Credit">Credit</option>
                                                <option value="MasterCard">MasterCard</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" placeholder="Month" class="form-control" id="month"
                                                   name="">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" placeholder="Year" class="form-control" id="year"
                                                   name="">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <input type="text" placeholder="CVV2" class="form-control" id="cvv2"
                                                   name="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col">
                                <div class="">
                                    <button class="buttonmod" style="background-color:#5CB2F8;" id="valuebtn"
                                            onclick="addAmount(0)">0
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12"
                                            onclick="addAmount(10)"> 10
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12;"
                                            onclick="addAmount(20)"> 20
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12"
                                            onclick="addAmount(50)"> 50
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12;"
                                            onclick="addAmount(100)"> 100
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12"
                                            onclick="addAmount(500)"> 500
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12"
                                            onclick="addAmount(1000)"> 1000
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#F39C12"
                                            onclick="addAmount(5000)"> 5000
                                    </button>
                                </div>
                                <div class="">
                                    <button class="buttonmod" style="background-color:#D73925"
                                            onclick="addAmount(1)"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button id="paymentSubmitBtn" class="btn btn-primary" onclick="save()">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--End payment Modal -->

    <!-- customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">ADD CUSTOMERS</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" id="cusName" name="txt_name"
                                       placeholder="Enter Customer Name">
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" id="cusEmail" name="txt_email"
                                       placeholder="Enter Email Address">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" id="cusPhone" name="txt_phone"
                                       placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="comment">Customer Custom Field</label>
                                <textarea class="form-control" id="cusField" name="txt_feild" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button id="" class="btn btn-primary" onclick="addCustomer()"> Add Customer
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End customer Modal -->
    <!-- edit qty Modal -->
    <div class="modal fade" id="editQtyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">Edit QTY</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" hidden id="idQtysid">
                                <label for="">QTY</label>
                                <input type="number" min="1" class="form-control" id="editQtyid">
                                <label id="editqtyli" style="color:red !important;font-size:12px !important;"></label>
                            </div>
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">

                                       <label for="">PRICE</label>
                                       <input type="number" class="form-control" id="editPrice">
                                       <label id="editqtyli" style="color:red !important;font-size:12px !important;"></label>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <input type="text" hidden id="idQtysid">
                                       <label for="">DISCOUNT</label>
                                       <input type="number" class="form-control" id="editDiscount">
                                       <label id="editqtyli" style="color:red !important;font-size:12px !important;"></label>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button id="" class="btn btn-primary" onclick="editqtyOnModal()">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End QTY Modal -->
    <!-- hold Modal -->
    <div class="modal fade" id="holdModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">Hold Bill</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table style="width:100%;" class="table-head-bg-info  table-head-bg-primary mt-3"
                               id="holdTable">
                            <thead style="height:15px;">
                            <tr style="">
                                <th style="text-align:center">#</th>
                                <th style="text-align:center">Name</th>
                                <th style="text-align:center">Date</th>
                                <th style="text-align:center">Time</th>
                                <th style="text-align:center"><i style="color:red;" class="fa fa-trash"></i>
                                </th>
                                <th style="text-align:center"><i style="color:lightgreen;"
                                                                 class="fa fa-check-circle"></i>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer no-bd">
                        <button class="btn btn-primary" onclick=""> Add</button>
                        <button type="button" class="btn btn-warning" onclick="clearAllStor()">Clear All</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End hold Modal -->

    <!-- void Modal -->
    <div class="modal fade" id="voidModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">VOID SALES</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form autocomplete="off" onkeydown="return event.key != 'Enter';">
                                <div class="form-group">
                                    <label for="">Bill Barcode</label>
                                    <input type="password" class="form-control" id="voidBillId"
                                           onkeyup="openPwdModal()">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <!-- <button id="" class="btn btn-primary" onclick="addCustomer()"> Add Customer
                        </button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--void Modal -->
    <!-- user Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form autocomplete="off" onkeydown="return event.key != 'Enter';">
                                <div class="form-group">
                                    <label for="">Manager/Supervisor Password</label>
                                    <input type="Password" class="form-control" id="txtMangPassword">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button class="btn btn-primary" onclick="voids()"> Void Bill
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user Modal -->

    <!-- open register Modal -->
    <div class="modal fade" id="openRegModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">Open Register</span>
                    </h4>
                </div>
                <form action="open-register.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Cash in hand</label>
                                    <input type="number" class="form-control" id="txtCashIn" name="txtCashIn">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button class="btn btn-primary" type="sumit">Open Register</button>
                            <button type="button" class="btn btn-danger"
                                    onclick="window.history.go(-1); return false;">Back
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- open register Modal -->

    <!-- Custom template | don't include it in your project! -->
    <?php include('rightSidebar.php'); ?>
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

    <!-- select2 -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js'></script>
    <script>
        $(document).ready(function () {
            $(".js-select2").select2();
        });

        $(document).ready(function () {
            $(".js-select3").select2();
        });
    </script>

    <script type="text/javascript">
        function getAllProductPos() {
            loader.style.display = "block";
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var respons = xmlhttp.responseText.trim();
                    document.getElementById('proList').innerHTML = this.responseText;
                    loader.style.display = "none";
                }
            }
            xmlhttp.open("GET", "ajax/get-all-product-pos.php", true);
            xmlhttp.send();
        }

        // getAllProductPos();
    </script>

    <script type="text/javascript">
        var tableData = [];
        var calObj = [];
        var loader = document.getElementById("loader");
        var newPrice = 0;
        var obj = [];
        var storObj = [];

        function print() {
            // window.print();
        }

        /**
         *Open void bill barcode field modal
         */
        function voidSale() {
            $('#voidModal').modal('show');
            setTimeout(function () {
                document.getElementById("voidBillId").focus();
            }, 700);
        }

        /**
         * Check Void bill & open password modal
         */
        function openPwdModal() {
            if (event.key === 'Enter') {

                obj = {
                    "billId": document.getElementById("voidBillId").value
                }

                $.ajax({
                    url: "ajax/check-void-bill.php",
                    type: "POST",
                    data: {
                        data: obj
                    },

                    success: function (data) {
                        var res = JSON.parse(data);

                        if (res.status == 'success') {

                            loader.style.display = "none";
                            $('#voidModal').modal('hide');
                            $('#userModal').modal('show');
                            setTimeout(function () {
                                document.getElementById("txtMangPassword").focus();
                            }, 700);

                        } else if (res.status == 'error') {

                            var content = {};
                            content.message = res.msg;
                            content.title = 'Please check the bill';
                            content.icon = 'fas fa-exclamation';

                            $.notify(content, {
                                type: "danger",
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                time: 1000,
                                delay: 4000,
                            });

                            loader.style.display = "none";
                            setTimeout(function () {
                                document.getElementById("voidBillId").value = "";
                            }, 700);

                        }
                    },
                    error: function (xhr, status, error) {
                        loader.style.display = "none";
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
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
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    }
                });
            }
        }

        /**
         * Void bill
         */
        function voids() {
            loader.style.display = "block";

            var managerPwd = document.getElementById("txtMangPassword").value;
            var billId = document.getElementById("voidBillId").value;

            obj = {
                "billId": billId,
                "managerPwd": managerPwd
            }

            $.ajax({
                url: "ajax/void-bill.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function (data) {
                    var res = JSON.parse(data);

                    if (res.status == 'success') {
                        loader.style.display = "none";

                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
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
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        document.getElementById("voidBillId").value =
                                            "";
                                        $('#userModal').modal('hide');
                                    } else {
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        document.getElementById("voidBillId").value =
                                            "";
                                        $('#userModal').modal('hide');
                                    }
                                });
                            };
                            return {
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    } else if (res.status == 'errorUser') {
                        loader.style.display = "none";
                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
                                swal({
                                    icon: "error",
                                    title: res.msg,
                                    type: 'error',
                                    buttons: {
                                        confirm: {
                                            text: 'OK',
                                            className: 'btn btn-danger'
                                        }
                                    }
                                }).then((Delete) => {
                                    if (Delete) {
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        setTimeout(function () {
                                            document.getElementById(
                                                "txtMangPassword").focus();
                                        }, 500);
                                    } else {
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        setTimeout(function () {
                                            document.getElementById(
                                                "txtMangPassword").focus();
                                        }, 500);
                                    }
                                });
                            };
                            return {
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    } else if (res.status == 'error') {
                        loader.style.display = "none";
                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
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
                                }).then((Delete) => {
                                    if (Delete) {
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        document.getElementById("voidBillId").value =
                                            "";
                                        $('#userModal').modal('hide');
                                    } else {
                                        document.getElementById("txtMangPassword")
                                            .value = "";
                                        document.getElementById("voidBillId").value =
                                            "";
                                        $('#userModal').modal('hide');
                                    }
                                });
                            };
                            return {
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    loader.style.display = "none";
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function () {
                        var initDemos = function () {
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
                            init: function () {
                                initDemos();
                            },
                        };
                    }();
                    jQuery(document).ready(function () {
                        SweetAlert2Demo.init();
                    });
                }
            });
            loader.style.display = "none";
        }

        function cancelPOS() {
            window.location.reload();
        }

        function holdPOS() {

            var localObj = [];
            var holdObj = [];

            var customerId = document.getElementById("customertxt").value;
            var refNote = document.getElementById("refNotTxt").value;
            var proDiscount = document.getElementById("txtDiscount").value;
            var proDesc = document.getElementById("proDescrip").value;
            var amount = document.getElementById("txtAmount").value;
            var payBy = document.getElementById("paimentType").value;
            var payNote = document.getElementById("payNote").value;
            var secuCode = document.getElementById("secuCode").value;
            var cardNo = document.getElementById("cardNo").value;
            var holdName = document.getElementById("holdName").value;
            var cardType = document.getElementById("cardType").value;
            var month = document.getElementById("month").value;
            var year = document.getElementById("year").value;
            var cvv2 = document.getElementById("cvv2").value;
            var cheqNo = document.getElementById("cheqNo").value;

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    localObj.push({
                        id: tableData[i].id,
                        code: tableData[i].code,
                        proName: tableData[i].proName,
                        price: tableData[i].price,
                        qty: tableData[i].qty,
                        totQty: tableData[i].totQty,
                        dis: tableData[i].dis
                    });
                }
            }

            holdObj = {
                "customerId": customerId,
                "refNote": refNote,
                "proDiscount": proDiscount,
                "proDesc": proDesc,
                "amount": amount,
                "payBy": payBy,
                "payNote": payNote,
                "secuCode": secuCode,
                "cardNo": cardNo,
                "holdName": holdName,
                "cardType": cardType,
                "month": month,
                "year": year,
                "cvv2": cvv2,
                "cheqNo": cheqNo,
                localObj
            }

            // var holdValue = JSON.parse(localStorage.getItem('hold'));
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date + time;
            var nameHold = "hold" + holdObj.customerId + dateTime;

            var sto = JSON.parse(localStorage.getItem('nameHold'));
            if (sto == undefined) {
                storObj.push({
                    id: storObj.length,
                    name: nameHold,
                    date: date,
                    time: time
                });
            } else {
                storObj = JSON.parse(localStorage.getItem('nameHold'));

                storObj.push({
                    id: storObj.length,
                    name: nameHold,
                    date: date,
                    time: time
                });
            }

            localStorage.setItem(nameHold, JSON.stringify(holdObj));
            localStorage.setItem("nameHold", JSON.stringify(storObj));
        }

        function addRowHold() {

            var stoname = JSON.parse(localStorage.getItem('nameHold'));
            if (stoname !== undefined) {
                storObj = JSON.parse(localStorage.getItem('nameHold'));
            }

            var table = document.getElementById("holdTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < storObj.length; i++) {
                if (storObj[i] !== null) {
                    var x = document.getElementById("holdTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'>" + storObj[i].name + "</td>" +
                        "<td style='text-align:center'>" + storObj[i].date + "</td>" +
                        "<td style='text-align:center'>" + storObj[i].time + "</td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='removeHoldRow(" + storObj[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='getHoldValue(" + storObj[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-success'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-check-circle'></i>" + "</button></td>" +
                        "</tr>";

                    $("#holdTable tbody").append(tr_str)
                }
            }
        }

        function removeHoldRow(nameHoldStor) {

            var stoname = JSON.parse(localStorage.getItem('nameHold'));
            if (stoname !== undefined) {
                storObj = JSON.parse(localStorage.getItem('nameHold'));
            }
            for (var i = 0; i < storObj.length; i++) {
                if (storObj[i] !== null) {
                    if (storObj[i].id == nameHoldStor) {
                        localStorage.removeItem(storObj[i].name);
                        delete storObj[i];
                    }
                }
            }
            localStorage.setItem("nameHold", JSON.stringify(storObj));
            addRowHold();
            $('#holdModal').modal('hide');
        }

        function getHoldValue(id) {
            var nameInStor = "";
            var valueObj = [];
            var stoname = JSON.parse(localStorage.getItem('nameHold'));
            if (stoname !== undefined) {
                storObj = JSON.parse(localStorage.getItem('nameHold'));
            }
            for (var i = 0; i < storObj.length; i++) {
                if (storObj[i] !== null) {
                    if (storObj[i].id == id) {
                        nameInStor = storObj[i].name;
                        valueObj = JSON.parse(localStorage.getItem(nameInStor));
                        localStorage.removeItem(storObj[i].name);
                        delete storObj[i];
                        localStorage.setItem("nameHold", JSON.stringify(storObj));
                    }
                }
            }

            addRowHold();

            document.getElementById("customertxt").value = valueObj.customerId;
            document.getElementById("refNotTxt").value = valueObj.refNote;
            document.getElementById("txtDiscount").value = valueObj.proDiscount;
            document.getElementById("proDescrip").value = valueObj.proDesc;
            document.getElementById("txtAmount").value = valueObj.amount;
            document.getElementById("paimentType").value = valueObj.payBy;
            document.getElementById("payNote").value = valueObj.payNote;
            document.getElementById("secuCode").value = valueObj.secuCode;
            document.getElementById("cardNo").value = valueObj.cardNo;
            document.getElementById("holdName").value = valueObj.holdName;
            document.getElementById("cardType").value = valueObj.cardType;
            document.getElementById("month").value = valueObj.month;
            document.getElementById("year").value = valueObj.year;
            document.getElementById("cvv2").value = valueObj.cvv2;
            document.getElementById("cheqNo").value = valueObj.cheqNo;

            tableData = valueObj.localObj;
            addRow();
            $('#holdModal').modal('hide');
        }

        function clearAllStor() {
            localStorage.clear();
            window.location.reload();
        }

        function addToTable(stock_id) {

            loader.style.display = "block";
            $.ajax({
                url: 'ajax/get-stock-detail-pos.php?id=' + stock_id,
                type: 'get',
                dataType: 'JSON',
                success: function (response) {
                    var len = response.length;
                    if (response === undefined || len == 0) {
                        var content = {};
                        content.message = 'Pelase try again';
                        content.title = 'not success';
                        content.icon = 'fas fa-exclamation';

                        $.notify(content, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 3500,
                        });
                        loader.style.display = "none";
                    } else {
                        loader.style.display = "none";

                        if (tableData.length === 0) {
                            // if (response.qty >= 1) {
                            tableData.push({
                                id: stock_id,
                                code: response.code,
                                proName: response.proName,
                                price: response.price,
                                dis:0,
                                qty: response.qty,
                                totQty: 1
                            });
                            // }
                        } else {
                            var added = false;
                            for (var i = 0; i < tableData.length; i++) {
                                if (tableData[i] !== undefined) {
                                    if (tableData[i].id === stock_id) {
                                        // if (response.qty > tableData[i].totQty) {
                                        tableData[i].totQty = parseFloat(tableData[i].totQty) + 1;
                                        // }
                                        added = true;
                                    }
                                }
                            }
                            if (added == false) {
                                // if (response.qty >= 1) {
                                tableData.push({
                                    id: stock_id,
                                    code: response.code,
                                    proName: response.proName,
                                    price: response.price,
                                    dis: 0,
                                    qty: response.qty,
                                    totQty: 1
                                });
                                // }
                            }
                        }
                        addRow();
                    }
                }
            });
        }

        function calculatePrice() {
            var exchangePrice = document.getElementById("txtExchange").value;
            var total = 0.00;
            var totWithDis = 0.00;
            var disc = 0.00;
            // disc = document.getElementById("txtDiscount").value;
            var totDisc = 0.00;
            var items = 0;
            var totItem = 0;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    disc +=tableData[i].dis;
                    items++;
                    totItem += tableData[i].totQty;
                    total += tableData[i].price * tableData[i].totQty;
                }
            }
            totDisc += disc;
            totWithDis += total - totDisc;
            totWithDis -= exchangePrice;

            calObj = {
                "total": total,
                "totWithDis": totWithDis,
                "disc": disc,
                "totDisc": totDisc,
                "items": items,
                "totItem": totItem
            }

            document.getElementById("totItems").textContent = "Total Items : " + items + "(" + parseInt(totItem) + ")";
            document.getElementById("totPrice").textContent = "Total : " + total.toFixed(2);
            document.getElementById("totWithDisc").textContent = totWithDis.toFixed(2);
            document.getElementById("totDis").textContent = totDisc.toFixed(2);

            // console.log(calObj);
        }

        function payment() {

            document.getElementById("payItems").textContent = calObj.items + "(" + calObj.totItem + ")";
            document.getElementById("payPayble").textContent = calObj.totWithDis.toFixed(2);
            document.getElementById("payPaying").textContent = calObj.total.toFixed(2);
            document.getElementById("valuebtn").textContent = calObj.totWithDis.toFixed(2);
            let discountAmount=calObj.total.toFixed(2)-calObj.totWithDis.toFixed(2);
            document.getElementById("txtDiscount").value=calDis;
            let calDis=discountAmount/calObj.total.toFixed(2)*100;
        }

        function addAmount(price) {
            if (price == 0) {
                newPrice = calObj.totWithDis;
            } else if (price == 1) {
                newPrice = 0;
            } else {
                newPrice += price;
            }
            document.getElementById("txtAmount").value = newPrice.toFixed(2);
            var balance = newPrice - calObj.totWithDis;
            document.getElementById("payBalance").textContent = balance.toFixed(2);
        }

        function calcBalance() {
            var balan = 0;
            balan = document.getElementById("txtAmount").value - calObj.totWithDis;
            document.getElementById("payBalance").textContent = balan.toFixed(2);
        }

        function calcDiscount() {
            calculatePrice();
            calcBalance();
            payment();
        }

        function editQty(id) {

            var editQty = 0;
            editQty = document.getElementById(id).value;

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i].id === id) {
                    if (tableData[i].qty >= parseFloat(editQty)) {
                        tableData[i].totQty = parseFloat(editQty);

                    } else {
                        tableData[i].totQty = 1;
                        document.getElementById(id).value = 1;

                        var content = {};
                        content.message = 'Stock Quantity : ' + tableData[i].qty;
                        content.title = 'Please check ' + tableData[i].proName + ' Quantity';
                        content.icon = 'fas fa-exclamation';

                        $.notify(content, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 3500,
                        });
                    }
                }
            }
            calculatePrice();
            // addRow();

            // setTimeout(function() {
            //     document.getElementById(id).focus();    
            // }, 700);

        }

        /**
         * Save pos bill
         */
        function save() {
            // document.getElementById("paymentSubmitBtn").disabled = true;
            loader.style.display = "block";

            var proObj = [];

            var customerId = document.getElementById("customertxt").value;
            var refNote = document.getElementById("refNotTxt").value;
            var proDesc = document.getElementById("proDescrip").value;
            var amount = document.getElementById("txtAmount").value;
            var payBy = document.getElementById("paimentType").value;
            var payNote = document.getElementById("payNote").value;
            var secuCode = document.getElementById("secuCode").value;
            var cardNo = document.getElementById("cardNo").value;
            var holdName = document.getElementById("holdName").value;
            var cardType = document.getElementById("cardType").value;
            var month = document.getElementById("month").value;
            var year = document.getElementById("year").value;
            var cvv2 = document.getElementById("cvv2").value;
            var cheqNo = document.getElementById("cheqNo").value;
            var discount = document.getElementById("txtDiscount").value;

            var excBillId = document.getElementById("txtExchangeId").value;
            var excPrice = document.getElementById("txtExchange").value;

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    proObj.push({
                        id: tableData[i].id,
                        code: tableData[i].code,
                        proName: tableData[i].proName,
                        price: tableData[i].price,
                        qty: tableData[i].qty,
                        totQty: tableData[i].totQty
                    });
                }
            }

            obj = {
                "customerId": customerId,
                "refNote": refNote,
                "proDesc": proDesc,
                "amount": amount,
                "payBy": payBy,
                "payNote": payNote,
                "secuCode": secuCode,
                "cardNo": cardNo,
                "holdName": holdName,
                "cardType": cardType,
                "month": month,
                "year": year,
                "cvv2": cvv2,
                "cheqNo": cheqNo,
                "discount": discount,
                "excBillId": excBillId,
                "excPrice": excPrice,
                proObj
            }

            $.ajax({
                url: "ajax/save-pos.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function(data) {
                    var res = JSON.parse(data);

                    if (res.status == 'success') {
                        $('#paymentModal').modal('hide');
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
                                        window.location.href = "print-bill.php?id=" +
                                            res
                                            .pos_id;
                                    } else {
                                        window.location.href = "print-bill.php?id=" +
                                            res
                                            .pos_id;
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
                        "<td style='text-align:center'><button title='Edit QTY' onClick='openEditQtyModal(" + tableData[i].totQty + "," + tableData[i].id + "," + tableData[i].price + "," + tableData[i].dis + ")' class='btn btn-primary btn-xs'>" + tableData[i].proName +
                        "(" + tableData[i].code + ")" + "</button></td>" + "<td style='text-align:center'>" + tableData[
                            i].price + ".00</td>" +
                        "<td style='text-align:center'>" + tableData[i].dis + "</td>" +
                        "<td style='text-align:center'>" + tableData[i].totQty + "</td>" + "<td style='text-align:center'>" + ((tableData[i].price *
                        tableData[i].totQty)-tableData[i].dis) + ".00</td>" +
                        "<td style='text-align:center'>" +

                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" +
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

        function getProduct() {
            loader.style.display = "block";
            var id = document.getElementById('proIdText').value;
            if (id == '') {
                // getAllProductPos();
                loader.style.display = "none";
            } else {

                if (event.key === 'Enter') {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos.php?id=" + id, true);
                    xmlhttp.send();
                } else {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos.php?id=" + id, true);
                    xmlhttp.send();
                }
            }
        }

        function addCustomer() {
            var name = document.getElementById("cusName").value;
            var email = document.getElementById("cusEmail").value;
            var phone = document.getElementById("cusPhone").value;
            var field = document.getElementById("cusField").value;
            var obj = [];
            obj = {
                "name": name,
                "email": email,
                "phone": phone,
                "field": field
            }

            $.ajax({
                url: "ajax/add-customer.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function (data) {
                    var res = JSON.parse(data);
                    if (res.status == 'success') {
                        document.getElementById('customertxt').innerHTML = res.select;
                        var content = {};
                        content.message = 'Customer added';
                        content.title = 'Success !';
                        content.icon = 'fas fa-check';

                        $.notify(content, {
                            type: "primary",
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 1000,
                            delay: 3500,
                        });
                        document.getElementById("cusName").value = '';
                        document.getElementById("cusEmail").value = '';
                        document.getElementById("cusPhone").value = '';
                        document.getElementById("cusField").value = '';
                        $('#customerModal').modal('hide');
                    } else if (res.status == 'error') {
                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
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
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function () {
                        var initDemos = function () {
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
                            init: function () {
                                initDemos();
                            },
                        };
                    }();
                    jQuery(document).ready(function () {
                        SweetAlert2Demo.init();
                    });
                }
            });
        }

        function selectPaymentType() {
            var value = document.getElementById('paimentType').value;

            var cash = document.getElementById("cash");
            var cheque = document.getElementById("cheque");
            var credit = document.getElementById("credit");

            if (value === "cash") {

                cash.style.display = "block";
                cheque.style.display = "none";
                credit.style.display = "none";

            } else if (value === "credit") {

                cash.style.display = "none";
                cheque.style.display = "none";
                credit.style.display = "block";

            } else if (value === "cheque") {

                cash.style.display = "none";
                cheque.style.display = "block";
                credit.style.display = "none";

            } else if (value === "other") {

                cash.style.display = "block";
                cheque.style.display = "none";
                credit.style.display = "none";

            }
        }

        function getProductByCate() {
            loader.style.display = "block";
            var categId = document.getElementById('txt_proCat').value;
            var subId = document.getElementById('txt_proSubCat').value;
            if (subId == '') {
                getAllProductPos();
            } else {

                if (event.key === 'Enter') {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos-subCategory.php?cateid=" + categId + "&subcateid=" + subId, true);
                    xmlhttp.send();
                } else {

                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && xmlhttp.status == 200) {
                            var respons = xmlhttp.responseText.trim();
                            document.getElementById('proList').innerHTML = this.responseText;
                            loader.style.display = "none";
                        }
                    }
                    xmlhttp.open("GET", "ajax/get-product-pos-subCategory.php?cateid=" + categId + "&subcateid=" + subId, true);
                    xmlhttp.send();
                }
            }
        }

        function selectPack() {
            addToTable(1);
            addToTable(2);
            addToTable(3);
            addToTable(4);
            addToTable(5);
            addToTable(6);
            addToTable(7);
            addToTable(8);
        }

        function selectPack2() {
            addToTable(3);
            addToTable(4);
        }

        function viewPack() {
            var checkBox = document.getElementById("toggle_1");
            if (checkBox.checked == true) {
                document.getElementById("packList").style.display = "block";
                document.getElementById("proList").style.display = "none";

                document.getElementById("packTag").style.display = "none";
                document.getElementById("proTag").style.display = "block";

                document.getElementById("catDev").style.display = "none";
            } else {
                document.getElementById("packList").style.display = "none";
                document.getElementById("proList").style.display = "block";

                document.getElementById("packTag").style.display = "block";
                document.getElementById("proTag").style.display = "none";

                document.getElementById("catDev").style.display = "block";
            }
        }

        /**
         * Exchanged products
         */
        function exchangeBill() {
            if (event.key === 'Enter') {
                loader.style.display = "block";
                var exchangeId = document.getElementById("txtExchange").value;
                document.getElementById("txtExchangeId").value = exchangeId;

                $.ajax({
                    url: "ajax/get-exchange-price.php?id=" + exchangeId,
                    type: "POST",
                    data: {},

                    success: function (data) {
                        var res = JSON.parse(data);

                        if (res.status == 'success') {

                            document.getElementById("txtExchange").value = res.price;
                            document.getElementById("txtExchange").setAttribute("readonly", "readonly");
                            loader.style.display = "none";
                            calculatePrice();

                        } else if (res.status == 'error') {
                            var SweetAlert2Demo = function () {
                                var initDemos = function () {
                                    swal({
                                        icon: "error",
                                        title: res.msg,
                                        type: 'error',
                                        buttons: {
                                            confirm: {
                                                text: 'OK',
                                                className: 'btn btn-danger'
                                            }
                                        }
                                    }).then((Delete) => {
                                        if (Delete) {
                                            document.getElementById("txtExchange").value =
                                                "";
                                            document.getElementById("txtExchangeId").value =
                                                "";
                                            document.getElementById("txtExchange").focus();
                                            loader.style.display = "none";
                                        } else {
                                            document.getElementById("txtExchange").value =
                                                "";
                                            document.getElementById("txtExchangeId").value =
                                                "";
                                            document.getElementById("txtExchange").focus();
                                            loader.style.display = "none";
                                        }
                                    });
                                };
                                return {
                                    init: function () {
                                        initDemos();
                                    },
                                };
                            }();
                            jQuery(document).ready(function () {
                                SweetAlert2Demo.init();
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
                                swal({
                                    icon: "error",
                                    title: 'Not Success!' + errorMessage,
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
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                        document.getElementById("txtExchange").value = "";
                        document.getElementById("txtExchangeId").value = "";
                        document.getElementById("txtExchange").focus();
                        loader.style.display = "none";
                    }
                });
            }
        }

        /**
         * Clear exchange field
         */
        function clearExchange() {
            document.getElementById("txtExchange").value = "";
            document.getElementById("txtExchange").removeAttribute('readonly');
            document.getElementById("txtExchange").focus();
            document.getElementById("txtExchangeId").value = "";
            calculatePrice();
        }

        /**
         *check register user
         */
        // function checkPOSRegister() {
        //     $.ajax({
        //         url: "ajax/check-register-user.php",
        //         type: "POST",

        //         success: function(data) {
        //             var res = JSON.parse(data);
        //             console.log(res);


        //             if (res.status == 'success') {

        //                 document.getElementById("txtCashIn").value = "";
        //                 $('#openRegModal').modal('hide');

        //             } else if (res.status == 'error') {

        //                 $('#openRegModal').modal({
        //                     backdrop: 'static',
        //                     keyboard: false
        //                 })

        //                 $('#openRegModal').modal('show');
        //                 setTimeout(function() {
        //                     document.getElementById("txtCashIn").focus();
        //                 }, 700);

        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             loader.style.display = "none";
        //             var errorMessage = xhr.status + ': ' + xhr.statusText;
        //             console.log(errorMessage);
        //             var SweetAlert2Demo = function() {
        //                 var initDemos = function() {
        //                     swal({
        //                         icon: "error",
        //                         title: 'Error !' + errorMessage,
        //                         type: 'error',
        //                         buttons: {
        //                             confirm: {
        //                                 text: 'OK',
        //                                 className: 'btn btn-danger'
        //                             }
        //                         }
        //                     }).then((Delete) => {
        //                         if (Delete) {
        //                             window.location = "index.php";
        //                         } else {
        //                             window.location = "index.php";
        //                         }
        //                     });
        //                 };
        //                 return {
        //                     init: function() {
        //                         initDemos();
        //                     },
        //                 };
        //             }();
        //             jQuery(document).ready(function() {
        //                 SweetAlert2Demo.init();
        //             });
        //         }
        //     });
        // }
        // checkPOSRegister();

        /**
         *Open Register
         */
        function openRegister() {

            var obj = [];
            obj = {
                "regPrice": document.getElementById("txtCashIn").value
            }

            $.ajax({
                url: "ajax/open-register.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function (data) {

                    var res = JSON.parse(data);
                    if (res.status == 'success') {

                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
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
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                });
                            };
                            return {
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    } else if (res.status == 'error') {

                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
                                swal({
                                    icon: "error",
                                    title: 'Not Success!',
                                    type: 'error',
                                    buttons: {
                                        confirm: {
                                            text: 'OK',
                                            className: 'btn btn-danger'
                                        }
                                    }
                                }).then((Delete) => {
                                    if (Delete) {
                                        location.reload();
                                    } else {
                                        location.reload();
                                    }
                                });
                            };
                            return {
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function () {
                        var initDemos = function () {
                            swal({
                                icon: "error",
                                title: 'Error! ' + errorMessage,
                                type: 'error',
                                buttons: {
                                    confirm: {
                                        text: 'OK',
                                        className: 'btn btn-danger'
                                    }
                                }
                            }).then((Delete) => {
                                if (Delete) {
                                    location.reload();
                                } else {
                                    location.reload();
                                }
                            });
                        };
                        return {
                            init: function () {
                                initDemos();
                            },
                        };
                    }();
                    jQuery(document).ready(function () {
                        SweetAlert2Demo.init();
                    });
                }
            });
        }

        function addToTableOnSelectByProduct() {

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var respons = xmlhttp.responseText.trim();
                    document.getElementById('txt_proSubCat').innerHTML = this.responseText;
                    getProductByProId();
                }
            }
            xmlhttp.open("GET", "ajax/get-productByProId.php?priId=" + document.getElementById('txt_stockPro').value, true);
            xmlhttp.send();

        }

        /**
         *get product By click the category
         */
        function getProductByCateOnClickCate() {
            loader.style.display = "block";
            var categId = document.getElementById('txt_proCat').value;

            if (event.key === 'Enter') {

                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && xmlhttp.status == 200) {
                        var respons = xmlhttp.responseText.trim();
                        document.getElementById('proList').innerHTML = this.responseText;
                        loader.style.display = "none";
                    }
                }
                xmlhttp.open("GET", "ajax/get-product-pos-category.php?cateid=" + categId, true);
                xmlhttp.send();
            } else {

                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && xmlhttp.status == 200) {
                        var respons = xmlhttp.responseText.trim();
                        document.getElementById('proList').innerHTML = this.responseText;
                        loader.style.display = "none";
                    }
                }
                xmlhttp.open("GET", "ajax/get-product-pos-category.php?cateid=" + categId, true);
                xmlhttp.send();
            }
        }


        function getProductByProId() {
            loader.style.display = "block";
            var categId = document.getElementById('txt_stockPro').value;

            if (event.key === 'Enter') {

                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && xmlhttp.status == 200) {
                        var respons = xmlhttp.responseText.trim();
                        document.getElementById('proList').innerHTML = this.responseText;
                        loader.style.display = "none";
                    }
                }
                xmlhttp.open("GET", "ajax/get-productPosbyProId.php?cateid=" + categId, true);
                xmlhttp.send();
            } else {

                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && xmlhttp.status == 200) {
                        var respons = xmlhttp.responseText.trim();
                        document.getElementById('proList').innerHTML = this.responseText;
                        loader.style.display = "none";
                    }
                }
                xmlhttp.open("GET", "ajax/get-productPosbyProId.php?cateid=" + categId, true);
                xmlhttp.send();
            }
        }

        /**
         *get subcategory
         */
        function getSubCategoryInPos() {

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var respons = xmlhttp.responseText.trim();
                    document.getElementById('txt_proSubCat').innerHTML = this.responseText;
                    getProductByCateOnClickCate();
                }
            }
            xmlhttp.open("GET", "ajax/get-subcategory.php?catid=" + document.getElementById("txt_proCat").value, true);
            xmlhttp.send();

        }

        function openEditQtyModal(qtytotal, id, price,discount) {
            document.getElementById('editqtyli').style.display = "none";
            $('#editQtyModal').modal('show');

            document.getElementById("editQtyid").value = qtytotal;
            document.getElementById("editDiscount").value = discount;

            document.getElementById("idQtysid").value = id;
            document.getElementById("editPrice").value = price;

            setTimeout(function () {
                document.getElementById("editQtyid").focus();
            }, 700);
        }

        function editqtyOnModal() {


            var editQty = document.getElementById("editQtyid").value;
            var editPrice = document.getElementById("editPrice").value;
            var editDiscount = document.getElementById("editDiscount").value;
            var eleId = parseInt(document.getElementById("idQtysid").value);

            if (editQty == null || editQty == '') {
                document.getElementById('editqtyli').style.display = "block";
                document.getElementById('editqtyli').innerHTML = 'QTY Field Required';

                setTimeout(function () {
                    document.getElementById("editQtyid").focus();
                }, 700);

            } else {
                totDis
                for (var i = 0; i < tableData.length; i++) {

                    if (tableData[i] !== undefined) {
                        if (tableData[i].id === eleId) {
                            // if (tableData[i].qty >= parseFloat(editQty)) {

                            tableData[i].totQty = parseFloat(editQty);
                            tableData[i].price = parseFloat(editPrice);
                            tableData[i].dis = parseFloat(editDiscount);

                            $('#editQtyModal').modal('hide');
                            // } else {
                            //     document.getElementById('editqtyli').style.display = "block";
                            //     document.getElementById('editqtyli').innerHTML = 'Stock Maximum Product Count Is '+ tableData[i].qty;
                            //     tableData[i].totQty = 1;
                            //     setTimeout(function() {
                            //         document.getElementById("editQtyid").focus();
                            //     }, 700);
                            // }
                        }
                    }

                }
            }

            calculatePrice();
            addRow();

        }

        /**
         *select pack
         */
        function selectPack() {
            loader.style.display = "block";
            var packId = document.getElementById("pack_id").value;

            $.ajax({
                url: 'ajax/get-pack-details.php?id=' + packId,
                type: 'POST',
                dataType: 'JSON',

                success: function (data) {
                    console.log(data);


                    if (data.status == 'success') {

                        loader.style.display = "none";

                        for (var i = 0; i < data.stock.length; i++) {
                            console.log();

                            tableData.push({
                                id: parseInt(data.stock[i].id),
                                code: data.stock[i].code,
                                proName: data.stock[i].proName,
                                price: data.stock[i].price,
                                dis:0,
                                qty: parseFloat(data.stock[i].stockQty),
                                totQty: parseFloat(data.stock[i].qty)
                            });
                        }
                        addRow();

                    } else if (data.status == 'error') {

                        loader.style.display = "none";

                        var SweetAlert2Demo = function () {
                            var initDemos = function () {
                                swal({
                                    icon: "error",
                                    title: data.msg,
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
                                init: function () {
                                    initDemos();
                                },
                            };
                        }();
                        jQuery(document).ready(function () {
                            SweetAlert2Demo.init();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    loader.style.display = "none";

                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function () {
                        var initDemos = function () {
                            swal({
                                icon: "error",
                                title: 'Error! ' + errorMessage,
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
                            init: function () {
                                initDemos();
                            },
                        };
                    }();
                    jQuery(document).ready(function () {
                        SweetAlert2Demo.init();
                    });
                }
            });
        }

        /**
         *check user login
         */
        // function checkLogin() {
        //     $.ajax({
        //         url: "ajax/check-login.php",
        //         type: "POST",

        //         success: function(data) {
        //             var res = JSON.parse(data);
        //             console.log(res);


        //             if (res.status == 'success') {

        //                 document.getElementById("txtCashIn").value = "";
        //                 $('#openRegModal').modal('hide');

        //             } else if (res.status == 'error') {

        //                 $('#openRegModal').modal({
        //                     backdrop: 'static',
        //                     keyboard: false
        //                 })

        //                 $('#openRegModal').modal('show');
        //                 setTimeout(function() {
        //                     document.getElementById("txtCashIn").focus();
        //                 }, 700);

        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             loader.style.display = "none";
        //             var errorMessage = xhr.status + ': ' + xhr.statusText;
        //             console.log(errorMessage);
        //             var SweetAlert2Demo = function() {
        //                 var initDemos = function() {
        //                     swal({
        //                         icon: "error",
        //                         title: 'Error ! ' + errorMessage,
        //                         type: 'error',
        //                         buttons: {
        //                             confirm: {
        //                                 text: 'OK',
        //                                 className: 'btn btn-danger'
        //                             }
        //                         }
        //                     }).then((Delete) => {
        //                         if (Delete) {
        //                             window.location = "index.php";
        //                         } else {
        //                             window.location = "index.php";
        //                         }
        //                     });
        //                 };
        //                 return {
        //                     init: function() {
        //                         initDemos();
        //                     },
        //                 };
        //             }();
        //             jQuery(document).ready(function() {
        //                 SweetAlert2Demo.init();
        //             });
        //         }
        //     });
        // }
        // checkLogin();
    </script>

    <?php

    $user = $_SESSION['user_id'];
    $result = $mysqli->query("SELECT * FROM register_table WHERE reg_user_id='$user' AND reg_status = '0'") or die($mysqli->error());

    if ($result->num_rows > 0) { ?>

        <script>
            document.getElementById("txtCashIn").value = "";
            $('#openRegModal').modal('hide');</script>
    <?php }
    else{ ?>
        <script>
            $('#openRegModal').modal({
                backdrop: 'static',
                keyboard: false
            })

            $('#openRegModal').modal('show');
            setTimeout(function () {
                document.getElementById("txtCashIn").focus();
            }, 700);</script>
    <?php }
    ?>

</body>

</html>