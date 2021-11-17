<?php include 'db/dbConnection.php'; ?>
<?php

$sendData = 0;
$id =  $_GET['id'];


$sql="SELECT * FROM `po_tbl`  WHERE  po_id = '$id' ";
$result = mysqli_query($connection,$sql);
$data = mysqli_fetch_array($result);
$data1 = $data ['po_id'];
$data1 = $data ['user_id'];
$data1 = $data ['supplier_id'];
$data1 = $data ['location'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>SkyPOS | Add Purchase Order</title>
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

    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <!-- select2 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'>
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

    <style>
        .select2 {
            width: 100% !important;
        }

        .select2-selection {
            border-color: #ebedf2 !important;
        }

        .select2.select2-container {
            width: 100% !important;
        }

        .select2.select2-container .select2-selection {
            border: 1px solid #ccc;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            height: 34px;
            margin-bottom: 15px;
            outline: none;
            transition: all 0.15s ease-in-out;
        }

        .select2.select2-container .select2-selection .select2-selection__rendered {
            color: #333;
            line-height: 32px;
            padding-right: 33px;
        }

        .select2.select2-container .select2-selection .select2-selection__arrow {
            background: #f8f8f8;
            border-left: 1px solid #ccc;
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
            height: 32px;
            width: 33px;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
            background: #f8f8f8;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
            -webkit-border-radius: 0 3px 0 0;
            -moz-border-radius: 0 3px 0 0;
            border-radius: 0 3px 0 0;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
            border: 1px solid #34495e;
        }

        .select2.select2-container.select2-container--focus .select2-selection {
            border: 1px solid #34495e;
        }

        .select2.select2-container .select2-selection--multiple {
            height: auto;
            min-height: 34px;
        }

        .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
            margin-top: 0;
            height: 32px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
            display: block;
            padding: 0 4px;
            line-height: 29px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice {
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            margin: 4px 4px 0 0;
            padding: 0 6px 0 22px;
            height: 24px;
            line-height: 24px;
            font-size: 12px;
            position: relative;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            margin: 0;
            text-align: center;
            color: #e74c3c;
            font-weight: bold;
            font-size: 16px;
        }

        .select2-container .select2-dropdown {
            background: transparent;
            border: none;
            margin-top: -5px;
        }

        .select2-container .select2-dropdown .select2-search {
            padding: 0;
        }

        .select2-container .select2-dropdown .select2-search input {
            outline: none;
            border: 1px solid #34495e;
            border-bottom: none;
            padding: 4px 6px;
        }

        .select2-container .select2-dropdown .select2-results {
            padding: 0;
        }

        .select2-container .select2-dropdown .select2-results ul {
            background: #fff;
            border: 1px solid #34495e;
        }

        .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
            background-color: #3498db;
        }

        .big-drop {
            width: 600px !important;
        }

        @import url("https://fonts.googleapis.com/css?family=Kanit&display=swap");
        /* RADIO BUTTON STLYING BEGINS */
        .myradio {
            display: inline-block;
            border-radius: 999px;
            margin: 5px;
        }

        .myradio__input {
            opacity: 0;
            position: absolute;
        }

        .myradio__label {
            border-radius: 9999px;
            padding: 3px 15px 3px 40px;
            cursor: pointer;
            position: relative;
            transition: all 0.5s;
        }

        .myradio__label::before, .myradio__label::after {
            content: "";
            border-radius: 9999px;
            width: 16px;
            height: 16px;
            margin: 3px 0;
            position: absolute;
            z-index: 1;
        }

        .myradio__label::before {
            background-color: #ffffff;
            border: 2px solid #dcdcdc;
            top: 4px;
            left: 10px;
            transition: all 0.5s;
        }

        .myradio__label::after {
            background-color: transparent;
            top: 4px;
            left: 10px;
            transition: all 0.2s;
            transition-timing-function: ease-out;
        }

        .myradio__label:hover::after {
            background-color: rgba(36, 74, 250, 0.08);
            transform: scale(2.5);
        }

        .myradio__input:checked ~ .myradio__label::before {
            background-color: #ffffff;
            border: 2px solid #244afa;
        }

        .myradio__input:checked ~ .myradio__label::after {
            background-color: #244afa;
            border: 2px solid transparent;
            top: 4px;
            left: 10px;
            transform: scale(0.6);
        }

        .myradio__input:checked ~ .myradio__label:hover::after {
            transform: scale(0.6);
        }
    </style>

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">PURCHASE ORDER</h4>
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
                            <a href="pos.php">purchase order</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card" id="style-7" style="height:75vh; overflow-y: scroll;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $sql="SELECT * FROM `po_tbl`  WHERE  po_id = '$id' ";
                                        $result = mysqli_query($connection,$sql);
                                        $data = mysqli_fetch_array($result);
                                        $data1 = $data ['po_id'];
                                        $data2 = $data ['user_id'];
                                        $data3 = $data ['supplier_id'];
                                        $data4 = $data ['location'];
                                        $data5 = $data ['date'];

                                        $sql2 = "SELECT * FROM `supplier_tbl` WHERE supplier_id = '$data3'";
                                        $result2 = mysqli_query($connection,$sql2);
                                        $data6 = mysqli_fetch_array($result2);
                                        $data7 = $data6 ['supplier_name'];


                                        $sql3 = mysqli_query($connection,"SELECT * FROM `po_details_tbl` WHERE po_id = $id ");
                                        $result3 = mysqli_query($connection,$sql);
                                        $dta = mysqli_fetch_array($result);
                                        $pro_name = $dta ['pro_name'];
                                        $pro_qty = $dta ['pro_qty'];
                                        $cost_prise = $dta['cost_prise'];
                                        $sell_prise = $dta ['sell_prise'];




                                        //print_r($_SESSION);

                                        ?>
                                        <!--new clm-->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div style="margin-top:3px">
                                                    <label for="">PO Number</label>
                                                    <input type="text" readonly class="form-control" id="po_id"

                                                           placeholder=" "
                                                           onkeyup="getProduct()" value="<?php echo $data1; ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div style="margin-top:3px">
                                                    <label for="">Date</label>
                                                    <input type="date" class="form-control" id="date"
                                                           placeholder="  "
                                                           onkeyup="getProduct()" value="<?php echo $data5 ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div style="margin-top:3px">
                                                    <label for="">Supplier</label>
                                                    <!--                                                    <input type="text" class="form-control" id="Profit_Margines"-->
                                                    <!--                                                           name="Profit_Margines"-->
                                                    <!--                                                           placeholder=" "-->
                                                    <!--                                                           onkeyup="getProduct()">-->
                                                    <select class="form-control" id="supselect" name="txt_cat" >
                                                        <option disabled selected hidden><?php echo $data7 ?></option>
                                                        <?php
                                                        $sql = mysqli_query($connection, "SELECT * FROM `supplier_tbl`");
                                                        $row = mysqli_num_rows($sql);
                                                        while ($row = mysqli_fetch_array($sql)) {
                                                            echo "<option value='" . $row['supplier_id'] . "'>" . $row        ['supplier_name'] . "</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <?php
//                                            $sql2 = mysqli_query($connection,"SELECT loc_name FROM `location_tbl` WHERE loc_id = '$_SESSION[user_loc]'");
//                                            $loc = mysqli_fetch_assoc($sql2);
                                            ?>

                                            <div class="col-sm-6">
                                                <div style="margin-top:3px">
                                                    <label for="">Location</label>
                                                    <textarea type="text" readonly class="form-control" id="location"
                                                              name="Conditions" rows="1" cols="50"
                                                              placeholder=""
                                                              onkeyup="getProduct()"> <?php echo $data4 ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <!--new clm-->
                                        <div style="margin-top:3px">
                                            <input type="text" class="form-control" id="proIdText"
                                                   placeholder="Search product by code or name, you can search barcode too"
                                                   onkeyup="getProduct()">
                                        </div>
                                        <br>
                                        <div class="table-responsive">
                                            <table style="width:100%;"
                                                   class="table-head-bg-info  table-head-bg-primary mt-3"
                                                   id="proTable">
                                                <thead style="height:15px;">
                                                <tr style="">
                                                    <th style="text-align:center">#</th>
                                                    <th style="text-align:center">PRODUCT</th>
                                                    <!--                                                    <th style="text-align:center">UNIT PRICE</th>-->
                                                    <th style="text-align:center">QUANTITY</th>
                                                    <th style="text-align:center">COST</th>
                                                    <th style="text-align:center">SELL PRISE</th>
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
                                            <!--                                            <li style="background-color:#eb9b34;">-->
                                            <!--                                                    <span-->
                                            <!--                                                            style="font-size:18px; color:black; font-weight:bold; margin-left:10px;"-->
                                            <!--                                                            class="name-specification">Discount %</span>-->
                                            <!--                                                <span-->
                                            <!--                                                        style="font-size:20px; color:black; font-weight:bold; margin-right:10px;"-->
                                            <!--                                                        class="status-specification" id="Discount"></span>-->
                                            <!--                                            </li>-->
                                            <!--                                            <li style="background-color:#DFF0D8;">-->
                                            <!--                                                    <span-->
                                            <!--                                                            style="font-size:20px; color:black; font-weight:bold; margin-left:10px;"-->
                                            <!--                                                            class="name-specification">Total Payable (Rs.)</span>-->
                                            <!--                                                <span-->
                                            <!--                                                        style="font-size:20px; color:black; font-weight:bold; margin-right:10px;"-->
                                            <!--                                                        class="status-specification" id="totWithDisc"></span>-->
                                            <!--                                            </li>-->
                                        </ul>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row user-stats text-center">
                                            <div class="col">
                                                <div class="number">
                                                    <button class="buttonPay"
                                                            style="background-color:white;"></button>
                                                </div>
                                                <div class="title">
                                                    <button class="buttonPay"
                                                            style="background-color:white;"></button>
                                                </div>
                                            </div>
                                            <div class="col" style="background-color:#008C4C; padding: 0px;">
                                                <button class="buttonPay" style="background-color:#008C4C;"
                                                        onclick="save()">Save & Print
                                                </button>
                                            </div>
                                            <div class="col"
                                                 style="background-color:#D73925; padding: 0px; margin-left:10px;">
                                                <button class="buttonPay" style="background-color:#D73925;"
                                                        onclick="cancelPOS()">Cancel
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
                                <!--                                <div class="d-flex align-items-center">-->
                                <!--                                    <button class="btn btn-round" data-toggle="modal" data-target="#addadditional">-->
                                <!--                                        <i class="fa fa-plus"> </i> Add new additional line in Quote </button>-->
                                <!--                                    <button class="btn btn-round btn-danger" data-toggle="modal" data-target="#addDiscount" style="margin-left:10px;">-->
                                <!--                                        <i class="fa fa-plus" style="font-weight:bold;"> </i> Discount </button>-->
                                <!--                                </div>-->
                            </div>
                            <div class="card-body">
                                <div class="row" id="proList">

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

    <!-- Custom template | don't include it in your project! -->
    <?php include('rightSidebar.php'); ?>
    <!-- End Custom template -->

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" id="modelProduct">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="modelDesc">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group" style="display:none;">
                                <input type="text" class="form-control" id="modelCode">
                                <input type="text" class="form-control" id="modelTotQTY">
                                <!--                                <input type="text" class="form-control" id="modelProduct">-->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" id="modelQTY" onkeyup="checkQtyByAdd()">
                                <span style="font-size:12px; color:red;" id="addQtySpan"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Cost Prise (Rs.)</label>
                                <input type="text" class="form-control" id="modelCOST">
                                <span style="font-size:12px; color:red;" id="addCOST"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Selling Price (Rs.)</label>
                                <input type="text" class="form-control" id="modelUnPrice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="addToTable()"> Add
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="editDesc">
                            </div>
                        </div>
                        <div class="col-sm-12" style="display:none;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="editCode">
                                <input type="text" class="form-control" id="editTotQTY">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" id="editQTY" onkeyup="checkQtyByEdit()">
                                <span style="font-size:12px; color:red;" id="editQtySpan"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Cost Prise (Rs.)</label>
                                <input type="text" class="form-control" id="editCost">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Selling Prise (Rs.)</label>
                                <input type="text" class="form-control" id="editUnPrice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="editProById()"> Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Add additional Modal -->
    <div class="modal fade" id="addadditional" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Main Description</label>
                                <input type="text" class="form-control" id="newMainDesc">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Sub Description</label>
                                <input type="text" class="form-control" id="newSubDesc">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Price (Rs.)</label>
                                <input type="text" class="form-control" id="newPrice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="addToTableNewLine()">
                        Add
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Add discount Modal -->
    <div class="modal fade" id="addDiscount" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Discount %</label>
                                <input type="text" value="0" class="form-control" id="txtDiscount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="discountPrice()">
                        Add
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->

    <!-- Edit additional Modal -->
    <div class="modal fade" id="editAdditional" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Main Description</label>
                                <input type="text" class="form-control" id="editnewMainDesc">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Sub Description</label>
                                <input type="text" class="form-control" id="editnewSubDesc">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Price (Rs.)</label>
                                <input type="text" class="form-control" id="editnewPrice">
                            </div>
                        </div>
                        <div class="col-sm-12" style="display:none;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="editnewy">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="editAdditionalLine()">
                        Add
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal --><div class="modal fade" id="editProModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="editDesc">
                            </div>
                        </div>
                        <div class="col-sm-12" style="display:none;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="editCode">
                                <input type="text" class="form-control" id="editTotQTY">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" id="editQTY" onkeyup="checkQtyByEdit()">
                                <span style="font-size:12px; color:#99c764;" id="editQtySpan"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Unit Price (Rs.)</label>
                                <input type="text" class="form-control" id="editUnPrice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="addRowButton" class="btn btn-primary" onclick="editProById()"> Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
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
    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
    <script src="assets/js/select2.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- multi selector -->

    <!-- https://www.geeksforgeeks.org/how-to-get-multiple-selected-values-of-select-box-in-php/ -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
    </script> -->

    <!-- // multi selector -->

    <script type="text/javascript">

        function addRow() {
            console.log(tableData);
            
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    var x = document.getElementById("proTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'><button class='btn btn-primary btn-xs' style='text-align:center; width:100%;' onclick='editProduct(" +
                        tableData[i].id + ")'>" +
                        tableData[i].proName +
                        "</button></td>" +
                        "<td style='text-align:center'>" + tableData[i].price + ".00</td>" +
                        "<td style='text-align:center'>" + tableData[i].totQty + "</td>" +
                        "<td style='text-align:center'>" + tableData[i].price * tableData[i].totQty + ".00</td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" + "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }
            addAdditionalRow();
            calculatePrice();
        }


        ///////////////////////////////////////////////////////////////
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
            xmlhttp.open("GET", "ajax/get-all-products-pos2.php", true);
            xmlhttp.send();
        }

        getAllProductPos();
    </script>

<!--hhhhhh-->

    <script type="text/javascript">
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
                        "<td style='text-align:center'><button class='btn btn-primary btn-xs' style='text-align:center; width:100%;' onclick='editProduct(" +
                        tableData[i].id + ")'>" +
                        tableData[i].proName +
                        "</button></td>" +
                        "<td style='text-align:center'>" + tableData[i].qty + "</td>" +
                        "<td style='text-align:center'>" + tableData[i].cost_prise + ".00</td>" +
                        "<td style='text-align:center'>" + tableData[i].selling_price + ".00</td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" + "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }
            addAdditionalRow();
            calculatePrice();
        }

        </script>
<!--    ,lklf-->



    <script>




        </script>




    <script type="text/javascript">
        var tableData = [];
        var calObj = [];
        var loader = document.getElementById("loader");
        var newPrice = 0;
        var obj = [];
        var storObj = [];

        function getLabour() {
            // console.log('dasdsadsds');
        }

        function cancelPOS() {
            window.location.reload();
        }

        var labourArray = [];
        var additionalObj = [];

        function addToTableNewLine() {

            var newMainDesc = document.getElementById("newMainDesc").value;
            var newSubDesc = document.getElementById("newSubDesc").value;
            var newPrice = document.getElementById("newPrice").value;

            additionalObj.push({
                mainDesc: newMainDesc,
                subDesc: newSubDesc,
                price: newPrice
            });
            addRow();
            $('#addadditional').modal('hide');
            document.getElementById("newMainDesc").value = "";
            document.getElementById("newSubDesc").value = "";
            document.getElementById("newPrice").value = "";
        }

        function getLabourPack() {

            var labourPacks = $('#aaaaaaa').val();
            labourArray = [];

            for (var i = 0; i < labourPacks.length; i++) {
                loader.style.display = "block";
                $.ajax({
                    url: 'ajax/get-labourpack.php?id=' + labourPacks[i],
                    type: 'get',
                    dataType: 'JSON',
                    success: function (response) {
                        var len = response.length;
                        if (response === undefined || len == 0) {
                            var content = {};
                            content.message = 'Please try again';
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
                            labourArray.push({
                                price: response.labourPrice,
                                ID: response.labourID
                            });
                            calculatePrice();
                        }
                    }
                });
            }

        }

        function viewDetail(pro_id) {
            loader.style.display = "block";

            $.ajax({
                url: 'ajax/get-stock-detail-pos2.php?id=' + pro_id,
                type: 'get',
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    var len = response.length;
                    if (response === undefined || len == 0) {
                        var content = {};
                        content.message = 'Please try again';
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

                        document.getElementById("modelCode").value = pro_id;
                        document.getElementById("modelTotQTY").value = response.qty;
                        document.getElementById("modelProduct").value = response.pro_name;
                        document.getElementById("modelQTY").value = 1;
                        document.getElementById("modelUnPrice").value = response.pro_price;
                        document.getElementById("modelCOST").value = response.pro_cost;
                        document.getElementById("modelDesc").value = "";
                        $('#addProductModal').modal('show');

                    }
                }
            });
        }

        function addToTable() {
            var proId = document.getElementById("modelCode").value;
            var ProToQty = document.getElementById("modelTotQTY").value;
            var proName = document.getElementById("modelProduct").value;
            var proQty = document.getElementById("modelQTY").value;
            var proPrice = document.getElementById("modelUnPrice").value;//seling prise
            var proDesc = document.getElementById("modelDesc").value;
            var proCost = document.getElementById("modelCOST").value;

            var added = false;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id === proId) {
                        added = true;
                    }
                }
            }

            if (added == false) {
                tableData.push({
                    id: proId,
                    code: proId,
                    proName: proName,
                    totQty: proQty,
                    cost: proCost,
                    price: proPrice,
                    desc: proDesc
                });
                addRow();
                $('#addProductModal').modal('hide');
            } else {
                $('#addProductModal').modal('hide');
                var content = {};
                content.message = 'The product has been added. Change from table';
                content.title = 'not success';
                content.icon = 'fas fa-exclamation';

                $.notify(content, {
                    type: "danger",
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    time: 1000,
                    delay: 5000,
                });
            }
        }

        function editProduct(productId) {
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id == productId) {
                        document.getElementById("editDesc").value = tableData[i].desc;
                        document.getElementById("editCode").value = tableData[i].id;
                        document.getElementById("editTotQTY").value = tableData[i].qty;
                        document.getElementById("editQTY").value = tableData[i].totQty;
                        document.getElementById("editCost").value = tableData[i].cost;
                        document.getElementById("editUnPrice").value = tableData[i].price;

                        $('#editProModal').modal('show');
                    }
                }
            }
        }

        function checkQtyByEdit() {
            var checkTotQty = parseInt(document.getElementById("editTotQTY").value);
            var checkQty = parseInt(document.getElementById("editQTY").value);
            // if (checkTotQty < checkQty) {
            //     // document.getElementById("editQTY").value = checkTotQty;
            //     var content = {};
            //     content.message = 'stock QTY is ' + checkTotQty;
            //     content.title = 'please add valid QTY';
            //     content.icon = 'fas fa-exclamation';
            //
            //     $.notify(content, {
            //         type: "danger",
            //         placement: {
            //             from: "top",
            //             align: "right"
            //         },
            //         time: 1000,
            //         delay: 3500,
            //     })
            // }
        }

        function checkQtyByAdd() {
            var checkTotQty = parseInt(document.getElementById("modelTotQTY").value);
            var checkQty = parseInt(document.getElementById("modelQTY").value);
            // if (checkTotQty < checkQty) {
            //     // document.getElementById("modelQTY").value = checkTotQty;
            //     var content = {};
            //     content.message = 'stock QTY is ' + checkTotQty;
            //     content.title = 'please add valid QTY';
            //     content.icon = 'fas fa-exclamation';
            //
            //     $.notify(content, {
            //         type: "danger",
            //         placement: {
            //             from: "top",
            //             align: "right"
            //         },
            //         time: 1000,
            //         delay: 3500,
            //     });
            // }
        }

        function editProById() {
            var proEditId = document.getElementById("editCode").value;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id == proEditId) {
                        tableData[i].desc = document.getElementById("editDesc").value;
                        tableData[i].qty = document.getElementById("editTotQTY").value;
                        tableData[i].totQty = document.getElementById("editQTY").value;
                        tableData[i].price = document.getElementById("editUnPrice").value;
                        tableData[i].cost = document.getElementById("editCost").value;
                        addRow();
                        // $('#editProModal').modal('hide');
                    }
                }
            }
        }

        function calculatePrice() {
            var total = 0.00;
            var totWithDis = 0.00;
            var disc = 0.00;
            disc = parseInt(document.getElementById("txtDiscount").value);
            var totDisc = 0.00;
            var items = 0;
            var totItem = 0;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    items++;
                    totItem += parseInt(tableData[i].totQty);
                    total += tableData[i].price * tableData[i].totQty;
                }
            }
            for (var i = 0; i < labourArray.length; i++) {
                total += parseInt(labourArray[i].price);
            }

            for (var i = 0; i < additionalObj.length; i++) {
                if (additionalObj[i] !== undefined) {
                    total += parseInt(additionalObj[i].price);
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

            document.getElementById("totItems").textContent = "Total Items : " + items + "(" + parseInt(totItem) + ")";
            // document.getElementById("totPrice").textContent = "Total : " + total.toFixed(2);
            // document.getElementById("totWithDisc").textContent = totWithDis.toFixed(2);
            // document.getElementById("Discount").textContent = disc;
        }

        function calcDiscount() {
            calculatePrice();
            calcBalance();
            payment();
        }


        function discountPrice() {
            calculatePrice();
            $('#addDiscount').modal('hide');
        }

        function save() {
            loader.style.display = "block";

            var proObj = [];


            var po_id = document.getElementById("po_id").value;
            var date = document.getElementById("date").value;
            var location = document.getElementById("location").value;
            var suplier = document.getElementById("supselect").value;


            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    proObj.push({
                        id: tableData[i].id,
                        code: tableData[i].code,
                        proName: tableData[i].proName,
                        cost_prise: tableData[i].cost,
                        selling_price: tableData[i].price,
                        qty: tableData[i].totQty,
                        desc: tableData[i].desc
                    });
                }
            }

            additionalArray = [];

            for (var i = 0; i < additionalObj.length; i++) {
                if (additionalObj[i] !== undefined) {
                    additionalArray.push({
                        mainDesc: additionalObj[i].mainDesc,
                        subDesc: additionalObj[i].subDesc,
                        price: additionalObj[i].price
                    });
                }
            }

            obj = {
                "po_id": po_id,
                "date": date,
                "location": location,
                "suplierId": suplier,
                proObj,
                labourArray,
                additionalArray
            }


            $.ajax({
                url: "ajax/Edit_PO.php",
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
                                        window.location.href = "edit-po-report.php?id=" + res.id;
                                    } else {
                                        window.location.href = "edit-po-report.php?id=" + res.id;
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
        }




        function addRow() {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            // for (var i = 0; i < tableData.length; i++) {
            //     if (tableData[i] !== undefined) {
            //         var x = document.getElementById("proTable").rows.length;
            //
            //         var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
            //             "<td style='text-align:center'>" + x + "</td>" +
            //             "<td style='text-align:center'><button class='btn btn-primary btn-xs' style='text-align:center; width:100%;' onclick='editProduct(" +
            //             tableData[i].id + ")'>" +
            //             tableData[i].proName +
            //             "</button></td>" +
            //             "<td style='text-align:center'>" + tableData[i].qty + "</td>" +
            //             "<td style='text-align:center'>" + tableData[i].cost_prise + ".00</td>" +
            //             "<td style='text-align:center'>" + tableData[i].selling_price + ".00</td>" +
            //             "<td style='text-align:center'>" +
            //             "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
            //             "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
            //             "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" + "</tr>";
            //
            //         $("#proTable tbody").append(tr_str)
            //     }
            // }

            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    var x = document.getElementById("proTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'><button class='btn btn-primary btn-xs' style='text-align:center; width:100%;' onclick='editProduct(" +
                        tableData[i].id + ")'>" +
                        tableData[i].proName +
                        "</button></td>" +
                        "<td style='text-align:center'>" + tableData[i].totQty + "</td>" +
                        "<td style='text-align:center'>" + parseFloat(tableData[i].cost) + "</td>" +
                        "<td style='text-align:center'>" + parseFloat(tableData[i].price) + "</td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='removeRow(" + tableData[i].id + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" + "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }



            addAdditionalRow();
            calculatePrice();
        }

        function removeRowInNew(x) {
            var table = document.getElementById("proTable");
            for (var i = table.rows.length - 1; i > 0; i--) {
                table.deleteRow(i);
            }
            delete additionalObj[x];
            addRow();
        }

        function editAdditionalShow(y) {
            $('#editAdditional').modal('show');
            document.getElementById("editnewMainDesc").value = additionalObj[y].mainDesc;
            document.getElementById("editnewSubDesc").value = additionalObj[y].subDesc;
            document.getElementById("editnewPrice").value = additionalObj[y].price;
            document.getElementById("editnewy").value = y;
        }

        function editAdditionalLine() {
            var newY = document.getElementById("editnewy").value;
            var newMainDesc = document.getElementById("editnewMainDesc").value;
            var newSubDesc = document.getElementById("editnewSubDesc").value;
            var newPrice = document.getElementById("editnewPrice").value;

            additionalObj[newY].mainDesc = newMainDesc;
            additionalObj[newY].subDesc = newSubDesc;
            additionalObj[newY].price = newPrice;
            addRow();
            $('#editAdditional').modal('hide');
            document.getElementById("newMainDesc").value = "";
            document.getElementById("newSubDesc").value = "";
            document.getElementById("newPrice").value = "";
        }

        function addAdditionalRow() {
            var table = document.getElementById("proTable");
            for (var i = 0; i < additionalObj.length; i++) {
                if (additionalObj[i] !== undefined) {
                    var x = document.getElementById("proTable").rows.length;

                    var tr_str = "<tr style='border-bottom:1pt; solid #D9EDF7;'>" +
                        "<td style='text-align:center'>" + x + "</td>" +
                        "<td style='text-align:center'><button class='btn btn-primary btn-xs' style='text-align:center; width:100%;' onclick='editAdditionalShow(" +
                        i + ")'>" +
                        additionalObj[i].mainDesc +
                        "</button></td>" +
                        "<td style='text-align:center'>" + additionalObj[i].price + ".00</td>" +
                        "<td style='text-align:center'> - </td>" +
                        "<td style='text-align:center'>" + additionalObj[i].price + ".00</td>" +
                        "<td style='text-align:center'>" +
                        "<button onclick='removeRowInNew(" + i + ")' type='button'" +
                        "data-toggle='tooltip' title=''" + "class='btn btn-link btn-danger'" +
                        "data-original-title='Remove'>" + "<i class='fa fa-trash'></i>" + "</button></td>" + "</tr>";

                    $("#proTable tbody").append(tr_str)
                }
            }
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
        function editProById() {
            var proEditId = document.getElementById("editCode").value;
            for (var i = 0; i < tableData.length; i++) {
                if (tableData[i] !== undefined) {
                    if (tableData[i].id == proEditId) {
                        tableData[i].desc = document.getElementById("editDesc").value;
                        tableData[i].qty = document.getElementById("editTotQTY").value;
                        tableData[i].totQty = document.getElementById("editQTY").value;
                        tableData[i].price = document.getElementById("editUnPrice").value;
                        tableData[i].cost = document.getElementById("editCost").value;
                        addRow();
                        $('#editProModal').modal('hide');
                    }
                }
            }
        }


        function getProduct() {
            loader.style.display = "block";
            var id = document.getElementById('proIdText').value;
            if (id == '') {
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
                    xmlhttp.open("GET", "ajax/get-product-pos2.php?id=" + id, true);
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
                    xmlhttp.open("GET", "ajax/get-product-pos2.php?id=" + id, true);
                    xmlhttp.send();
                }
            }
        }
    </script>

    <!-- select2 -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js'></script>
    <script>
        $(document).ready(function () {

            $(".js-select2").select2();

            $(".js-select2-multi").select2();

            $(".large").select2({
                dropdownCssClass: "big-drop",
            });

        });

        function getCategory() {
            var serviceId = document.getElementById('custxt').value;

            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && xmlhttp.status == 200) {
                    var respons = xmlhttp.responseText.trim();
                    // var select= document.getElementById('jobtxt')
                    document.getElementById('jobtxt').innerHTML = this.responseText;
                    // select.options[select.options.length] = new Option(this.responseText);
                }
            }
            xmlhttp.open("GET", "ajax/find_category.php?id=" + serviceId, true);
            xmlhttp.send();
        }



    </script>

    <?php
    $sql = "SELECT * FROM `po_details_tbl` WHERE `po_id`=$id";
    $result = mysqli_query($connection, $sql);
    while ($dataRow = mysqli_fetch_assoc($result)) {
       echo $dataRow['po_id'];
        ?>
       <script type="text/javascript">

            tableData.push({
                id: <?php echo $dataRow['pro_id']; ?>,
                code: <?php echo $dataRow['pro_id']; ?>,
                proName:' <?php echo $dataRow['pro_name']; ?>',
                totQty: <?php echo $dataRow['pro_qty']; ?>,
                cost: <?php echo $dataRow['cost_prise']; ?>,
                price: <?php echo $dataRow['sell_prise']; ?>,
                desc: 'data'
            });
            addRow();
            console.log(tableData);
        </script>
        <?php
    }
    ?>

</body>

</html>
