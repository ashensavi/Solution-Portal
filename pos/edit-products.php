<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM products_tbl WHERE pro_id = '$id'");
      $res = mysqli_fetch_array($sql);

$name = $res['pro_name'];
$code = $res['pro_code'];
$cate_id = $res['cat_id'];
$subcate_id = $res['subcat_id'];
$brand_id = $res['brand_id'];
$description = $res['pro_desc'];
$cost = $res['pro_cost'];
$price = $res['pro_price'];
$all_qty = $res['pro_all_qty'];
$supplier_id = $res['supplier_id'];
// $rack = $res['rack_no'];
// $whSale = $res['whole_sale_price'];
$img = $res['pro_img'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Edit Product | SKYPOS</title>
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
                        <h4 class="page-title">EDIT PRODUCTS</h4>
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
                                <a href="#">Products</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Edit Products</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="edit-productpro.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <input type="hidden" name="txt_id" id="" value="<?php echo $id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $name; ?>"
                                                        name="txt_name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product code </label><span> ( you can use product
                                                        barcode as code )</span>
                                                    <input type="text" class="form-control" value="<?php echo $code; ?>"
                                                        name="txt_code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select class="form-control" id="cateselect" name="txt_cat"
                                                        onchange="getsubcat()">
                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM category_tbl WHERE cate_id='$cate_id'");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                                
														echo "<option selected hidden value='$cate_id'>" .$row['cat_name'] ."</option>" ;
														}
														?>

                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM category_tbl");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                	echo "<option value='". $row['cate_id'] ."'>" .$row ['cat_name'] ."</option>" ;
														}
														?>
                                                    </select>
                                                </div>

                                                <div id="divselect" class="form-group">
                                                    <label for="">Subcategory</label>
                                                    <select class="form-control" id="subcateselect" name="txt_subcat">
                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM subcategory_tbl WHERE subcate_id='$subcate_id'");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                                
														echo "<option selected hidden value='$subcate_id'>" .$row['subcate_name'] ."</option>" ;
														}
														?>
                                                    </select>
                                                </div>
                                                <div style="display: none;" id="animationdiv" class="form-group">
                                                    <div class="lds-ellipsis">
                                                        <div style="background-color:black;"></div>
                                                        <div style="background-color:black;"></div>
                                                        <div style="background-color:black;"></div>
                                                        <div style="background-color:black;"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Brand</label>
                                                    <select class="form-control" id="" name="txt_brand">
                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM brand_tbl WHERE brand_id='$brand_id'");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                                
														echo "<option selected hidden value='$brand_id'>" .$row['brand_name'] ."</option>" ;
														}
														?>

                                                        <?php
														$sql = mysqli_query($connection,"SELECT * FROM brand_tbl");
														$row = mysqli_num_rows($sql);
														while ($row = mysqli_fetch_array($sql)){                 	echo "<option value='". $row['brand_id'] ."'>" .$row['brand_name'] ."</option>" ;
														}
														?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Product Description</label>
                                                    <textarea class="form-control" id="" rows="3"
                                                        name="txt_field"><?php echo $description; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Cost Price</label>
                                                    <input type="text" class="form-control" value="<?php echo $cost; ?>"
                                                        name="txt_cost">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Selling Price</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $price; ?>" name="txt_price">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="">Whole Sale Price</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $whSale; ?>" name="txt_whSale">
                                                </div> -->
                                                <!-- <div class="form-group">
                                                    <label for="">Rack Number</label>
                                                    <input type="text" class="form-control" value="<?php echo $rack; ?>"
                                                        name="txt_rack">
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="">Supplier</label>
                                                    <select class="form-control" name="txt_supp">
                                                        <?php
															$sql = mysqli_query($connection,"SELECT * FROM supplier_tbl WHERE supplier_id='$supplier_id'");
															$row = mysqli_num_rows($sql);
															while ($row = mysqli_fetch_array($sql)){                                
															echo "<option selected hidden value='$supplier_id'>" .$row['supplier_name'] ."</option>" ;
															}
															?>

                                                        <?php
															$sql = mysqli_query($connection,"SELECT * FROM supplier_tbl");
															$row = mysqli_num_rows($sql);
															while ($row = mysqli_fetch_array($sql)){          	echo "<option value='". $row['supplier_id'] . 	"'>" .$row['supplier_name'] ."</option>" ;
															}
															?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Alert Quantity</label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $all_qty; ?>" name="txt_level">
                                                </div>

                                                <div class="form-group">
                                                    <div class="avatar" style="width:100px;height:100px;">
                                                        <img src="assets/img/productimg/<?php echo $img; ?>" alt="..."
                                                            class="avatar-img rounded">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Image (JPEG Format)</label>
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
                                            Edit Product
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

    <script type="text/javascript">
    function getsubcat() {
        var divselect = document.getElementById("divselect");
        var animationdiv = document.getElementById("animationdiv");

        var catid = document.getElementById('cateselect').value;
        xmlhttp = new XMLHttpRequest();
        divselect.style.display = "none";
        animationdiv.style.display = "block";
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && xmlhttp.status == 200) {
                var respons = xmlhttp.responseText.trim();
                document.getElementById('subcateselect').innerHTML = this.responseText;
                divselect.style.display = "block";
                animationdiv.style.display = "none";
            }
        }
        xmlhttp.open("GET", "ajax/get-subcategory.php?catid=" + catid, true);
        xmlhttp.send();
    }
    </script>
</body>

</html>