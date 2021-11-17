<?php 
include 'db/dbConnection.php';
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
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands","simple-line-icons"],
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
                        <h4 class="page-title">VERIFY STOCK PRODUCTS</h4>
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
                                <a href="#">Report</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Stock Report</a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Date & Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                            $sql = "SELECT * FROM main_transfer_tbl WHERE accept = 0 AND trans_loc = $location";
											$result = mysqli_query($connection,$sql);

											while($dataRow=mysqli_fetch_assoc($result)){
                                            if($dataRow['accept'] == 0){
											echo "<tr>";
                                                echo "<td >TRA00".$dataRow['main_tra_id']."</td>";    
                                                echo "<td >".$dataRow['transfer_date']."</td>";
                                                echo "<td>
                                                        <div class=\"form-button-action\">

                                                            <a href=\"stock-added.php?id=$dataRow[main_tra_id]\">
                                                                <button type=\"button\" data-toggle=\"tooltip\" 		title=\"View Detail\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"View Detail\">
                                                                    <i style=\"font-size: 25px\" class=\"fas fa-eye\"></i>
                                                                </button>
                                                            </a>

                                                        </div>
                                                         <div class=\"form-button-action\">

                                                            <a href=\"stockTransferPrint.php?id=$dataRow[main_tra_id]\">
                                                                <button type=\"button\" data-toggle=\"tooltip\" 		title=\"View Detail\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"View Detail\">
                                                                    <i style=\"font-size: 25px\" class=\"fas fa-print\"></i>
                                                                </button>
                                                            </a>

                                                        </div>
                                                    </td>";
                                            echo "</tr>";
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
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });

    function stockTransfer(id, qty) {
        // obj = {
        //     "transferId": id,
        //     "qty": qty
        // }

        // $.ajax({
        //     url: "ajax/save-stock.php",
        //     type: "POST",
        //     data: {
        //         data: obj
        //     },

        //     success: function(data) {
        //         var res = JSON.parse(data);

        //         if (res.status == 'success') {
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
                        document.getElementById("tblRaw" + id).style.display = "none";
                    } else {
                        document.getElementById("tblRaw" + id).style.display = "none";
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
    </script>

</body>

</html>