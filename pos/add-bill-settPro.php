<?php 
    include 'db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Forms - Atlantis Lite Bootstrap 4 Admin Dashboard</title>
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

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <!-- Navbar Header -->
        <?php include('header.php');?>
        <!-- End Navbar -->
        <!-- Sidebar -->
        <?php include('sidebar.php');?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <?php
                    $id = $_POST['txt_id'];
                    $address = $_POST['txt_address'];
                    $phone = $_POST['txt_phone'];
                    $description = $_POST['txt_desc'];
                ?>

                <?php if (!empty($_FILES['txt_img']['name'])) { ?>

                <?php $image = $_FILES['txt_img']['name'];

                    $sql = "UPDATE bill_tbl SET
                            address = '$address',
                            tell_num = '$phone',
                            discription = '$description' ,
                            bill_logo = '$image'
                            WHERE 
                            bill_id='$id'"; ?>

                <?php  if ($connection->query($sql)===true){?>

                <?php
                        $target = 'assets/img/billimg/'.basename($image);
                        if(move_uploaded_file($_FILES['txt_img']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                        }else{
                        $msg = "Failed to upload image";
                        }

                        $orig_image = imagecreatefromjpeg($target);
                        $image_info = getimagesize($target);
                        $width_orig  = $image_info[0]; // current width as found in image file
                        $height_orig = $image_info[1]; // current height as found in image file
                        $width = 32; // new image width
                        $height = 32; // new image height
                        $destination_image = imagecreatetruecolor($width, $height);
                        imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                        // This will just copy the new image over the original at the same target.
                        imagejpeg($destination_image, $target, 100);

                        ?>

                <script>
                //== Class definition
                var SweetAlert2Demo = function() {

                    //== Demos
                    var initDemos = function() {
                        //== Sweetalert Demo 1
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
                                window.location.replace("add-bill-sett.php");
                            } else {
                                window.location.replace("add-bill-sett.php");
                            }
                        });
                    };

                    return {
                        //== Init
                        init: function() {
                            initDemos();
                        },
                    };
                }();

                //== Class Initialization
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });
                </script>
                <?php }else{ ?>
                <script>
                //== Class definition
                var SweetAlert2Demo = function() {

                    //== Demos
                    var initDemos = function() {
                        //== Sweetalert Demo 1
                        swal({
                            icon: "error",
                            title: 'Product Updated not Success?',
                            type: 'error',
                            buttons: {
                                confirm: {
                                    text: 'OK',
                                    className: 'btn btn-danger'
                                }
                            }
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.replace("add-bill-sett.php");
                            } else {
                                window.location.replace("add-bill-sett.php");
                            }
                        });
                    };

                    return {
                        //== Init
                        init: function() {
                            initDemos();
                        },
                    };
                }();

                //== Class Initialization
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });

                // window.location.replace("list-customers.php");
                </script>
                <?php } ?>
                <?php }else{ ?>

                <?php $sql = "UPDATE bill_tbl SET
                            address = '$address',
                            tell_num = '$phone',
                            discription = '$description'
                            WHERE 
                            bill_id='$id'"; ?>

                <?php  if ($connection->query($sql)===true){?>

                <script>
                //== Class definition
                var SweetAlert2Demo = function() {

                    //== Demos
                    var initDemos = function() {
                        //== Sweetalert Demo 1
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
                                window.location.replace("add-bill-sett.php");
                            } else {
                                window.location.replace("add-bill-sett.php");
                            }
                        });
                    };

                    return {
                        //== Init
                        init: function() {
                            initDemos();
                        },
                    };
                }();

                //== Class Initialization
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });
                </script>
                <?php }else{ ?>
                <script>
                //== Class definition
                var SweetAlert2Demo = function() {

                    //== Demos
                    var initDemos = function() {
                        //== Sweetalert Demo 1
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
                                window.location.replace("add-bill-sett.php");
                            } else {
                                window.location.replace("add-bill-sett.php");
                            }
                        });
                    };

                    return {
                        //== Init
                        init: function() {
                            initDemos();
                        },
                    };
                }();

                //== Class Initialization
                jQuery(document).ready(function() {
                    SweetAlert2Demo.init();
                });

                // window.location.replace("list-customers.php");
                </script>
                <?php } ?>
                <?php } ?>
            </div>
            <!-- footer -->
            <?php include('footer.php');?>
            <!-- End footer -->
        </div>

        <!-- Custom template | don't include it in your project! -->
        <?php include('rightSidebar.php');?>
        <!-- End Custom template -->
    </div>

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
</body>

</html>