<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Purchase Order | SKYPOS</title>
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

    .lds-ellipsis {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
    }

    .lds-ellipsis div {
        position: absolute;
        top: 27px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #fff;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }

    .lds-ellipsis div:nth-child(1) {
        left: 6px;
        animation: lds-ellipsis1 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(2) {
        left: 6px;
        animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(3) {
        left: 26px;
        animation: lds-ellipsis2 0.6s infinite;
    }

    .lds-ellipsis div:nth-child(4) {
        left: 45px;
        animation: lds-ellipsis3 0.6s infinite;
    }

    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(0);
        }
    }

    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(19px, 0);
        }
    }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>

    <div id="preeLoader"
        style="display: none; position: fixed; z-index: 999; height: 2em; width: 2em; overflow: show; margin: auto; top: 0; left: 0; bottom: 0; right: 0; background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8)); width: 100%; height: 100%;"
        id="animationdiv">
        <div class="lds-ellipsis"
            style="position: fixed; z-index: 999; height: 2em; width: 2em; overflow: show; margin: auto; top: 0; left: 0; bottom: 0; right: 0;">
            <div style="background-color:white;"></div>
            <div style="background-color:white;"></div>
            <div style="background-color:white;"></div>
            <div style="background-color:white;"></div>
        </div>
    </div>
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
                        <h4 class="page-title">PURCHASE ORDER</h4>
                        <!-- <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="index.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="pos.php">Stock</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Good Receive Notes</a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- <div class="card-header">
									<div class="card-title">Form Elements</div>
								</div> -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Number</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full" id="grnNum">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Date
                                                    Received</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="date" class="form-control input-full" id="receveDate">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput"
                                                    class="col-md-4 col-form-label">Supplier</label>
                                                <div class="col-md-8 p-0">
                                                    <select class="form-control input-full" id="suppId"
                                                        name="txtcat_id">
                                                        <option value="" disabled selected hidden> Select One </option>
                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM supplier_tbl");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){
															echo "<option value='". $row['supplier_id'] ."'>" 	.$row['supplier_name'] ."</option>" ;
														}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Stock
                                                    Location</label>
                                                <div class="col-md-8 p-0">
                                                    <select class="form-control input-full" id="locId" name="txtcat_id">
                                                        <option value="1" selected hidden> Main Branch </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Company Inv.
                                                    No</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full" id="invNo">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Payment Due
                                                    on</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="date" class="form-control input-full" id="payDueDate">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">PO.
                                                    Value</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full" id="grnValue">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Overall
                                                    Discount %</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full" id="overrallDisc"
                                                        onkeyup="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Net
                                                    Value</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full" id="netValue">
                                                </div>
                                            </div>
                                            <div class="form-group form-inline has-error has-feedback">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Value</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="text" class="form-control input-full"
                                                        id="invoiceValue">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 row">
                                            <div class="">
                                                <input type="hidden" name="txt_id" id="proId">
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proCode" type="text" class="form-control input-border-bottom"
                                                    required onkeydown="searchByCode(this)">
                                                <label class="placeholder">Product Code</label>
                                            </div>
                                            <div class="col-md-3 form-group form-floating-label">
                                                <input id="proName" type="text" class="form-control input-border-bottom"
                                                    required onkeydown="searchByName(this)">
                                                <label for="" class="placeholder">Product Name</label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proUnite" type="text"
                                                    class="form-control input-border-bottom" required>
                                                <label for="" class="placeholder">Unit</label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proQty" type="text" class="form-control input-border-bottom"
                                                    required>
                                                <label for="" class="placeholder">Qty</label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proCost" type="text" class="form-control input-border-bottom"
                                                    required>
                                                <label for="" class="placeholder">Cost Price</label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proPrice" type="text"
                                                    class="form-control input-border-bottom" required>
                                                <label for="" class="placeholder">Sell Price</label>
                                            </div>
                                            <div class="col-md-4 form-group form-inline">
                                                <label for="inlineinput" class="col-md-4 col-form-label">Ex.
                                                    Date</label>
                                                <div class="col-md-8 p-0">
                                                    <input type="date" class="form-control input-full" id="proDate"
                                                        placeholder="Enter Input">
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proDis" type="text" class="form-control input-border-bottom"
                                                    required onkeyup="validateDisc()">
                                                <label for="" class="placeholder">Discount % </label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <input id="proFreeQty" type="text"
                                                    class="form-control input-border-bottom" required>
                                                <label for="" class="placeholder">Free Qty</label>
                                            </div>
                                            <div class="col-md-2 form-group form-floating-label">
                                                <button id="savebtn" disabled class="btn btn-success btn-round"
                                                    onclick="addToTable()">
                                                    <span class="btn-label">
                                                        <i style="font-size:30px;" class="fa fa-plus"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="proTable" style="width:100%;"
                                                    class="table-head-bg-info  table-head-bg-primary mt-3">
                                                    <thead style="height:15px;">
                                                        <tr style="">
                                                            <th style="text-align:center">#</th>
                                                            <th style="text-align:center">Product</th>
                                                            <th style="text-align:center">Unite</th>
                                                            <th style="text-align:center">Qty</th>
                                                            <th style="text-align:center">Cost</th>
                                                            <th style="text-align:center">price</th>
                                                            <th style="text-align:center">Ex. Date</th>
                                                            <th style="text-align:center">Discount</th>
                                                            <th style="text-align:center">Free Qty</th>
                                                            <th style="text-align:center">Total Qty</th>
                                                            <th style="text-align:center">Total Cost</th>
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
                                            <button class="btn btn-primary" onclick="save()">
                                                <span class="btn-label">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                                Save
                                            </button>
                                        </div>
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
    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script>
    var tableData = [];
    var obj = [];
    var loader = document.getElementById("preeLoader");

    function saveGRN() {

        var grnNum = document.getElementById("grnNum").value;
        var receveDate = document.getElementById("receveDate").value;
        var supplier = document.getElementById("suppId").value;
        var locatoin = document.getElementById("locId").value;
        var invNo = document.getElementById("invNo").value;
        var dueDate = document.getElementById("payDueDate").value;
        var grnValue = document.getElementById("grnValue").value;
        var overrallDisc = document.getElementById("overrallDisc").value;
        var netValue = document.getElementById("netValue").value;
        var invoiceValue = document.getElementById("invoiceValue").value;

        var proObj = [];

        if (grnNum !== "") {
            if (receveDate !== "") {
                if (supplier !== "") {
                    if (invNo !== "") {
                        if (dueDate !== "") {
                            if (grnValue !== "") {
                                if (invoiceValue !== "") {

                                    for (var i = 0; i < tableData.length; i++) {
                                        if (tableData[i] !== undefined) {
                                            proObj.push({
                                                id: tableData[i].id,
                                                code: tableData[i].code,
                                                name: tableData[i].name,
                                                unit: tableData[i].unit,
                                                qty: tableData[i].qty,
                                                cost: tableData[i].cost,
                                                price: tableData[i].price,
                                                exdate: tableData[i].exdate,
                                                discount: tableData[i].discount,
                                                freeqty: tableData[i].freeqty,
                                                totalQty: tableData[i].totalQty,
                                                total: tableData[i].total
                                            });
                                        }
                                    }
                                    obj = {
                                        "grnNum": grnNum,
                                        "receveDate": receveDate,
                                        "supplier": supplier,
                                        "locatoin": locatoin,
                                        "invNo": invNo,
                                        "dueDate": dueDate,
                                        "grnValue": grnValue,
                                        "overrallDisc": overrallDisc,
                                        "netValue": netValue,
                                        "invoiceValue": invoiceValue,
                                        proObj
                                    }
                                    // console.log(tableData);

                                    save();

                                    document.getElementById("grnNum").value = '';
                                    document.getElementById("receveDate").value = '';
                                    document.getElementById("suppId").value = '';
                                    document.getElementById("locId").value = '';
                                    document.getElementById("invNo").value = '';
                                    document.getElementById("payDueDate").value = '';
                                    document.getElementById("grnValue").value = '';
                                    document.getElementById("overrallDisc").value = '';
                                    document.getElementById("netValue").value = '';
                                    document.getElementById("invoiceValue").value = '';

                                    var table = document.getElementById("proTable");
                                    //or use :  var table = document.all.tableid;
                                    for (var i = table.rows.length - 1; i > 0; i--) {
                                        table.deleteRow(i);
                                    }

                                    tableData = {}
                                    console.log(tableData);

                                } else {
                                    var content = {};
                                    content.message = 'Pelase enter Invoice Value';
                                    content.title = 'Invoice Value is required';
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
                            } else {
                                var content = {};
                                content.message = 'Pelase enter GRN value';
                                content.title = 'GRN value is required';
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
                        } else {
                            var content = {};
                            content.message = 'Pelase enter Payment due date';
                            content.title = 'Payment due date is required';
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
                    } else {
                        var content = {};
                        content.message = 'Pelase enter Invoice number';
                        content.title = 'Invoice number is required';
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
                } else {
                    var content = {};
                    content.message = 'Pelase select supplier';
                    content.title = 'Supplier is required';
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
            } else {
                var content = {};
                content.message = 'Pelase enter GRN received Date';
                content.title = 'GRN received Date is required';
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
        } else {
            var content = {};
            content.message = 'Pelase enter GRN number';
            content.title = 'GRN number is required';
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

    function save() {
        // loader.style.display = "block";
        // $.ajax({
        //     url: "ajax/grn-save.php",
        //     type: "POST",
        //     data: {
        //         data: obj
        //     },

        //     success: function(data) {
        //         var res = JSON.parse(data);
        //         if (res.status == 'success') {
        //             loader.style.display = "none";

        var SweetAlert2Demo = function() {
            var initDemos = function() {
                swal({
                    icon: "success",
                    title: 'Save Success?',
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
                init: function() {
                    initDemos();
                },
            };
        }();
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });

        //         } else if (res.status == 'error') {
        //             loader.style.display = "none";
        //             var SweetAlert2Demo = function() {
        //                 var initDemos = function() {
        //                     swal({
        //                         icon: "error",
        //                         title: 'Not Success !',
        //                         type: 'error',
        //                         buttons: {
        //                             confirm: {
        //                                 text: 'OK',
        //                                 className: 'btn btn-danger'
        //                             }
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
        //     },
        //     error: function(xhr, status, error) {
        //         loader.style.display = "none";
        //         var errorMessage = xhr.status + ': ' + xhr.statusText;
        //         var SweetAlert2Demo = function() {
        //             var initDemos = function() {
        //                 swal({
        //                     icon: "error",
        //                     title: 'Not Success !' + errorMessage,
        //                     type: 'error',
        //                     buttons: {
        //                         confirm: {
        //                             text: 'OK',
        //                             className: 'btn btn-danger'
        //                         }
        //                     }
        //                 });
        //             };
        //             return {
        //                 init: function() {
        //                     initDemos();
        //                 },
        //             };
        //         }();
        //         jQuery(document).ready(function() {
        //             SweetAlert2Demo.init();
        //         });
        //     }
        // });
    }

    function validateDisc() {
        var discount = document.getElementById("overrallDisc").value;
        if (parseInt(discount) > 100) {
            document.getElementById("overrallDisc").value = '';
        }

        var proDisc = document.getElementById("proDis").value;
        if (parseInt(proDisc) > 100) {
            document.getElementById("proDis").value = '';
        }
    }

    function calculateTotal() {
        validateDisc();
        var total = 0;
        for (var i = 0; i < tableData.length; i++) {
            if (tableData[i] !== undefined) {
                total += parseInt(tableData[i].total);
            }
        }
        var discount = document.getElementById("overrallDisc").value;

        if (discount !== "") {
            total -= (total * parseInt(discount) / 100);
            document.getElementById("invoiceValue").value = total;
        } else {
            document.getElementById("invoiceValue").value = total;
        }
    }

    function addToTable() {
        var id = document.getElementById("proId").value;
        var code = document.getElementById("proCode").value;
        var name = document.getElementById("proName").value;
        var unit = document.getElementById("proUnite").value;
        var qty = document.getElementById("proQty").value;
        var cost = document.getElementById("proCost").value;
        var price = document.getElementById("proPrice").value;
        var exdate = document.getElementById("proDate").value;
        var discount = document.getElementById("proDis").value;
        var freeqty = document.getElementById("proFreeQty").value;
        var totalQty;
        var total = 0;

        if (discount !== "") {
            var tot = 0;
            tot = parseInt(qty) * parseInt(cost);
            tot -= (tot * parseInt(discount) / 100);
            total = parseInt(tot);
        } else {
            total = parseInt(qty) * parseInt(cost);
        }

        if (freeqty !== "") {
            totalQty = parseInt(qty) + parseInt(freeqty);
        } else {
            totalQty = parseInt(qty);
        }

        document.getElementById("proCode").value = '';
        document.getElementById("proName").value = '';
        document.getElementById("proUnite").value = '';
        document.getElementById("proQty").value = '';
        document.getElementById("proCost").value = '';
        document.getElementById("proPrice").value = '';
        document.getElementById("proDate").value = '';
        document.getElementById("proDis").value = '';
        document.getElementById("proFreeQty").value = '';

        document.getElementById("savebtn").disabled = true;

        tableData.push({
            id: id,
            code: code,
            name: name,
            unit: unit,
            qty: qty,
            cost: cost,
            price: price,
            exdate: exdate,
            discount: discount,
            freeqty: freeqty,
            totalQty: totalQty,
            total: total
        });

        var x = document.getElementById("proTable").rows.length;
        var tr_str = "<tr style='border-bottom:1pt solid #D9EDF7;'>" +
            "<td align='center'>" + x + "</td>" +
            "<td align='center'>" + name + "</td>" +
            "<td align='center'>" + unit + "</td>" +
            "<td align='center'>" + qty + "</td>" +
            "<td align='center'>" + cost + "</td>" +
            "<td align='center'>" + price + "</td>" +
            "<td align='center'>" + exdate + "</td>" +
            "<td align='center'>" + discount + "</td>" +
            "<td align='center'>" + freeqty + "</td>" +
            "<td align='center'>" + totalQty + "</td>" +
            "<td align='center'>" + total + "</td>" +
            "<td align='center'>" + "<button onclick='deleteRow(" + id +
            ")' type='button' data-toggle='tooltip' class='btn btn-link btn-danger' data-original-title='Remove'> <i class='fa fa-trash'></i> </button>" +
            "</td>" +
            "</tr>";

        $("#proTable tbody").append(tr_str);

        calculateTotal();
    }

    function deleteRow(x) {

        var table = document.getElementById("proTable");
        //or use :  var table = document.all.tableid;
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

        for (var i = 0; i < tableData.length; i++) {
            if (tableData[i] !== undefined) {

                var x = document.getElementById("proTable").rows.length;
                var tr_str = "<tr style='border-bottom:1pt solid #D9EDF7;'>" +
                    "<td align='center'>" + x + "</td>" +
                    "<td align='center'>" + tableData[i].name + "</td>" +
                    "<td align='center'>" + tableData[i].unit + "</td>" +
                    "<td align='center'>" + tableData[i].qty + "</td>" +
                    "<td align='center'>" + tableData[i].cost + "</td>" +
                    "<td align='center'>" + tableData[i].price + "</td>" +
                    "<td align='center'>" + tableData[i].exdate + "</td>" +
                    "<td align='center'>" + tableData[i].discount + "</td>" +
                    "<td align='center'>" + tableData[i].freeqty + "</td>" +
                    "<td align='center'>" + tableData[i].totalQty + "</td>" +
                    "<td align='center'>" + tableData[i].total + "</td>" +
                    "<td align='center'>" + "<button onclick='deleteRow(" + tableData[i].id +
                    ")' type='button' data-toggle='tooltip' class='btn btn-link btn-danger' data-original-title='Remove'> <i class='fa fa-trash'></i> </button>" +
                    "</td>" + "</tr>";

                $("#proTable tbody").append(tr_str);
            }
        }
        calculateTotal();
        // console.log(tableData);
    }

    function searchByCode(value) {
        if (event.key === 'Enter') {

            var id = value.value;

            $.ajax({
                url: 'ajax/get-product.php?id=' + id,
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    // console.log(response[0]);

                    if (response === undefined || len == 0) {
                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
                                swal({
                                    icon: "error",
                                    title: 'Product Note Match !',
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

                        document.getElementById("savebtn").disabled = true;
                    } else {
                        document.getElementById("proId").value = response[0].id;
                        document.getElementById("proName").value = response[0].name;
                        document.getElementById("proCost").value = response[0].cost;
                        document.getElementById("proPrice").value = response[0].price;
                        document.getElementById("savebtn").disabled = false;
                    }
                }
            });
        }
    }

    function searchByName(value) {
        if (event.key === 'Enter') {

            var name = value.value;

            $.ajax({
                url: 'ajax/get-product.php?name=' + name,
                type: 'get',
                dataType: 'JSON',
                success: function(response) {
                    var len = response.length;
                    // console.log(response[0]);

                    if (response === undefined || len == 0) {
                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
                                swal({
                                    icon: "error",
                                    title: 'Product Note Match !',
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

                        document.getElementById("savebtn").disabled = true;
                    } else {
                        document.getElementById("proId").value = response[0].id;
                        document.getElementById("proCode").value = response[0].code;
                        document.getElementById("proCost").value = response[0].cost;
                        document.getElementById("proPrice").value = response[0].price;
                        document.getElementById("savebtn").disabled = false;
                    }
                }
            });
        }
    }
    </script>
</body>

</html>