<?php
include 'db/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Book List | SKYPOS</title>
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
<div class="wrapper">
    <!-- Navbar Header -->
    <?php include('header.php');?>
    <!-- End Navbar -->
    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- End Sidebar -->
    <?php
    $loc =$_SESSION['user_id'];
    ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">BOOK LIST</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Add New Grade</h4>
                                    <a class=" ml-auto" href="#">
                                        <button class="btn btn-primary btn-round" data-toggle="modal"
                                                data-target="#addGradeModal">
                                            <i class="fa fa-plus"> </i>
                                            Add New
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Add New Product in Book List</h4>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <select class="form-control js-select2" id="gradeNewTxt">
                                                <option disabled selected hidden value="">Select Grade</option>
                                                <?php
                                                $sql = mysqli_query($connection,"SELECT * FROM pack_tbl");
                                                $row = mysqli_num_rows($sql);
                                                while ($row = mysqli_fetch_array($sql)){
                                                    echo "<option value='". $row['pack_id'] ."'>" .$row ['pack_name'] ."</option>" ;
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control js-select2" id="locationNewTxt">
                                            <option disabled selected hidden value="">Select Location</option>
                                            <?php
                                            $sql1 = mysqli_query($connection,"SELECT * FROM user_tbl where user_id = '$loc'");
                                            $row1 = mysqli_fetch_array($sql1);
                                            $lid = $row1['user_loc'];

                                            $sql = mysqli_query($connection,"SELECT * FROM location_tbl where loc_id = '$lid'");
                                            $row = mysqli_num_rows($sql);
                                            while ($row = mysqli_fetch_array($sql)){
                                                echo "<option value='". $row['loc_id'] ."'>" .$row ['loc_name'] ."</option>" ;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4" align="right">
                                        <button class="btn btn-primary btn-round ml-auto"
                                                onClick="addNewBookList()">
                                            <i class="fa fa-plus"> </i>
                                            Add New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <select class="form-control js-select2" id="gradeTxt1">
                                                <option disabled selected hidden value="">Select Grade</option>
                                                <?php
                                                 $sql = mysqli_query($connection,"SELECT * FROM pack_tbl");
                                                 $row = mysqli_num_rows($sql);
                                                 while ($row = mysqli_fetch_array($sql)){
                                                     echo "<option value='". $row['pack_id'] ."'>" .$row ['pack_name'] ."</option>" ;
                                                 }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control js-select2" id="locationNewTxt1">
                                            <option disabled selected hidden value="">Select Location</option>
                                            <?php
                                             $sql1 = mysqli_query($connection,"SELECT * FROM user_tbl where user_id = '$loc'");
                                             $row1 = mysqli_fetch_array($sql1);
                                             $lid = $row1['user_loc'];

                                             $sql = mysqli_query($connection,"SELECT * FROM location_tbl");
                                             $row = mysqli_num_rows($sql);
                                             while ($row = mysqli_fetch_array($sql)){
                                                 echo "<option value='". $row['loc_id'] ."'>" .$row ['loc_name'] ."</option>" ;
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4" align="right">
                                        <button class="btn btn-success btn-round ml-auto" onclick="deletePack()">
                                            <i class="fa fa-edit"> </i>
                                            Edit
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
    <!-- add grade Modal -->
    <div class="modal fade" id="addGradeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="add-gradePro.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header no-bd">
                        <h4 class="modal-title">
                                <span class="fw-mediumbold">
                                    ADD</span>
                            <span class="fw-light">
                                    GRADE
                                </span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Grade Name</label>
                                    <input name="txt_grade_name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="" class="btn btn-primary">Add Grade</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End add grade Modal -->

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
<script src="assets/js/select2.min.js"></script>
<!-- select2 -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js'></script>

<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Bootstrap Notify -->
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script>
    $(document).ready(function() {

        $(".js-select2").select2();

        $(".js-select2-multi").select2();

        $(".large").select2({
            dropdownCssClass: "big-drop",
        });

    });
</script>
<script>
    function addNewBookList() {
        var newLocation = document.getElementById("locationNewTxt").value;
        var newGrade = document.getElementById("gradeNewTxt").value;

        if (newLocation == null || newLocation == "") {
            var content = {};
            content.message = ' ';
            content.title = 'Please Select Location';
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
        } else {
            if (newGrade == null || newGrade == "") {
                var content = {};
                content.message = ' ';
                content.title = 'Please Select Grade';
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
            } else {
                window.location.replace("study-pack.php?grade="+newGrade+"&location="+newLocation);
            }
        }st
    }

    function deletePack() {

        var deleteLocation = document.getElementById("gradeTxt1").value;
        var deleteGrade = document.getElementById("locationNewTxt1").value;


        if (deleteLocation == null || deleteLocation == "") {
            var content = {};
            content.message = ' ';
            content.title = 'Please Select Location';
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
        } else {
            if (deleteGrade == null || deleteGrade == "") {
                var content = {};
                content.message = ' ';
                content.title = 'Please Select Grade';
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
            } else {
                window.location.replace("study-pack-edit.php?grade="+deleteLocation+"&location="+deleteGrade);
            }
        }

    }
</script>
</body>

</html>