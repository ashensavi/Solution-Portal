<?php include 'db/dbConnection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Bill Setting | SKYPOS</title>
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
    .fileUpload {
        /* position: relative; */
        overflow: hidden;
        /* margin: 10px; */
    }

    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
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
        width: 11px;
        height: 11px;
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
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
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
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">BILL SETTING</h4>
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
                                <a href="#">Setting</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Bill Setting</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                        $sql = mysqli_query($connection, "SELECT * FROM bill_tbl WHERE bill_loc= $location");
                        $res = mysqli_fetch_array($sql);

                        $id = $res['bill_id'];
                        $address = $res['address'];
                        $phone = $res['tell_num'];
                        $description = $res['discription'];
                        $img = $res['bill_logo'];

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="add-bill-settPro.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="hidden" name="txt_id" id="" value="<?php echo $id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" class="form-control" id="" name="txt_address"
                                                        value="<?php echo $address; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone Number</label>
                                                    <input type="text" class="form-control" id="" name="txt_phone"
                                                        value="<?php echo $phone; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Footer Description</label>
                                                    <!-- <textarea class="form-control" id="" rows="7"
                                                        name="txt_desc"></textarea> -->
                                                    <textarea class="form-control" id="editor1" name="txt_desc" cols="30" rows="10" required=""><?php echo $description; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="avatar" style="width:100px;height:100px;">
                                                        <img src="assets/img/billimg/<?php echo $img; ?>" alt="..."
                                                            class="avatar-img rounded">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Header Logo (JPEG Format)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="fileUpload btn btn-primary">
                                                                <span>Upload</span>
                                                                <input id="uploadBtn" type="file" class="upload"
                                                                    name="txt_img" />
                                                            </div>
                                                        </div>
                                                        <input type="text" id="uploadFile" class="form-control"
                                                            placeholder="Choose File" aria-label=""
                                                            aria-describedby="basic-addon1" disabled="disabled">
                                                    </div>
                                                    <script>
                                                    document.getElementById("uploadBtn").onchange = function() {
                                                        document.getElementById("uploadFile").value = this.value;
                                                    };
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="btn-label">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Add
                                        </button>
                                        <a href="list-products.php" class="btn btn-danger">
                                            <span class="btn-label">
                                                <i class="fa fa-times"></i>
                                            </span>
                                            Cancel
                                        </a>
                                    </div>
                                </form>
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

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    <script type="text/javascript">
    $(function() {
        CKEDITOR.replace('editor1');
    });
    </script>
</body>

</html>