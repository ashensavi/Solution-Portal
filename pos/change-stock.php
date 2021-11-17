<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                        <h4 class="page-title">Change Stock Quantity & Price</h4>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Barcode</th>
                                                    <th>Cost Price</th>
                                                    <th>Selling Price</th>
                                                    <th>QTY</th>
                                                    <th>Edit QTY</th>
                                                    <th>Edit Price</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Barcode</th>
                                                    <th>Cost Price</th>
                                                    <th>Selling Price</th>
                                                    <th>QTY</th>
                                                    <th>Edit QTY</th>
                                                    <th>Edit Price</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
											$sql="SELECT * FROM stock_tbl,products_tbl,batch_tbl WHERE batch_tbl.batch_id=stock_tbl.batch_id AND products_tbl.pro_id = batch_tbl.pro_id AND batch_tbl.batch_location = $location";
											$result = mysqli_query($connection,$sql);

											while($dataRow=mysqli_fetch_assoc($result)){
                                                
                                            echo "<tr>";
												echo "<td >".$dataRow['pro_name']."</td>";    
                                                echo "<td >".$dataRow['pro_code']."</td>";
                                                echo "<td >".$dataRow['cost']."</td>";
                                                echo "<td >".$dataRow['price']."</td>";
                                                echo "<td >".$dataRow['stock_qty']."</td>";
                                                echo "<td>
													<div class=\"form-button-action\">
														<button onClick=\"openModal($dataRow[stock_qty],$dataRow[stock_id])\" type=\"button\" data-toggle=\"tooltip\" title=\"Edit QtY\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
															<i class=\"fa fa-cart-plus\"></i>
														</button>
													</div>
                                                </td>";    
                                                echo "<td>
													<div class=\"form-button-action\">
														<button onClick=\"openPriceModal($dataRow[batch_id],$dataRow[cost],$dataRow[price])\" type=\"button\" data-toggle=\"tooltip\" title=\"Edit Price\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
															<i class=\"fa fa-edit\"></i>
														</button>
													</div>
												</td>"; 
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
                                </div>
                            </div>
                            <div class="modal-footer no-bd">
                                <button id="" class="btn btn-primary" onclick="editqty()">Edit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End QTY Modal -->
            <!-- edit price Modal -->
            <div class="modal fade" id="editPriceModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h4 class="modal-title">
                                <span class="fw-mediumbold">Edit Cost Price & Selling Price</span>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" hidden id="edit_price_id">
                                        <label for="">Cost Price</label>
                                        <input type="number" min="1" class="form-control" id="txt_cost">
                                        <label id="costli" style="color:red !important;font-size:12px !important;"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Selling Price</label>
                                        <input type="number" min="1" class="form-control" id="txt_price">
                                        <label id="priceli" style="color:red !important;font-size:12px !important;"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer no-bd">
                                <button id="" class="btn btn-primary" onclick="editPrice()">Edit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End price Modal -->
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
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script>

    /**
     * open qty edit modal
     */
    function openModal(qtytotal,id) {
        document.getElementById('editqtyli').style.display = "none";
        $('#editQtyModal').modal('show');

        document.getElementById("editQtyid").value = qtytotal;

        document.getElementById("idQtysid").value = id;

        setTimeout(function() {
            document.getElementById("editQtyid").focus();
        }, 700);
    }

    /**
     * open price edit modal
     */
    function openPriceModal(batch,cost,price) {
        document.getElementById('priceli').style.display = "none";
        document.getElementById('costli').style.display = "none";
        $('#editPriceModal').modal('show');

        document.getElementById("txt_cost").value = cost;
        document.getElementById("txt_price").value = price;
        document.getElementById("edit_price_id").value = batch;

        setTimeout(function() {
            document.getElementById("txt_price").focus();
        }, 700);
    }

    /**
     * edit cost & price
     */
    function editPrice() {
        var editCost = document.getElementById("txt_cost").value;
        var editPrice = document.getElementById("txt_price").value;
        var editBatchId = document.getElementById("edit_price_id").value;

        if (editCost==null || editCost=='') {
            document.getElementById('costli').style.display = "block";
            document.getElementById('costli').innerHTML = 'Cost Price Field Required';
            document.getElementById('priceli').style.display = "none";
        }else if(editPrice==null || editPrice==''){
            document.getElementById('priceli').style.display = "block";
            document.getElementById('priceli').innerHTML = 'Selling Price Field Required';
            document.getElementById('costli').style.display = "none";
        }else{
            var obj = [];
            obj = {
                "id": editBatchId,
                "cost":editCost,
                "price":editPrice
            }

            $.ajax({
                url: "ajax/edit-stock-price.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function(data) {

                    var res = JSON.parse(data);
                    if (res.status == 'success') {

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
                    } else if (res.status == 'error') {

                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
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
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function() {
                        var initDemos = function() {
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
    }

    /**
     * edit QTY
     */
    function editqty() {
        var editQty = document.getElementById("editQtyid").value;
        var eleId  = parseInt(document.getElementById("idQtysid").value);          
            
        if (editQty==null || editQty=='') {
            document.getElementById('editqtyli').style.display = "block";
            document.getElementById('editqtyli').innerHTML = 'QTY Field Required';

            setTimeout(function() {
                document.getElementById("editQtyid").focus();
            }, 700);
                
        } else {
            var obj = [];
            obj = {
                "id": eleId,
                "qty":editQty
            }

            $.ajax({
                url: "ajax/edit-stock-qty.php",
                type: "POST",
                data: {
                    data: obj
                },

                success: function(data) {

                    var res = JSON.parse(data);
                    if (res.status == 'success') {

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
                    } else if (res.status == 'error') {

                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
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
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    var SweetAlert2Demo = function() {
                        var initDemos = function() {
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
    }

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