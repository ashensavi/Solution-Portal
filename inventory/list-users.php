<?php include 'db/dbConnection.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>List Users | SKYPOS</title>
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
                        <h4 class="page-title">USER LIST</h4>
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
                                <a href="#">People</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">List Users</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <!-- <h4 class="card-title">Add Row</h4> -->
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                            data-target="#addBrandModal">
                                            <i class="fa fa-plus"></i>
                                            Add User
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- add brand Modal -->
                                    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="add-users.php" method="post" enctype="multipart/form-data">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h4 class="modal-title">
                                                            <span class="fw-mediumbold"> ADD </span>
                                                            <span class="fw-light"> USERS </span>
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="">User Name</label>
                                                                    <input type="text" class="form-control" name="txt_name" placeholder="Enter Brand Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="">Password</label>
                                                                    <input type="password" class="form-control" name="txt_pwd" placeholder="Enter Brand Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="">Category</label>
                                                                    <select class="form-control" id="" name="txt_userrole">
                                                                        <option value="" disabled selected hidden>Select
                                                                            User Role</option>
                                                                        <option value="admin"> admin </option>
                                                                        <option value="cashier"> cashier </option>
                                                                        <option value="Stock keeper"> Stock keeper
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="">Location</label>
                                                                    <select class="form-control" name="txt_location">
                                                                        <option disabled selected hidden> Select
                                                                            Location </option>
                                                                        <?php
																		$sql = mysqli_query($connection,"SELECT * FROM location_tbl");
																		$row = mysqli_num_rows($sql);
																		while ($row = mysqli_fetch_array($sql)){
																			echo "<option value='". $row['loc_id'] ."'>" .$row['loc_name'] ."</option>" ;
																		}
																		?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" id="" class="btn btn-primary">Add
                                                            User</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--End add brand Modal -->
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>User Role</th>
													<th>Location</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql="SELECT * From user_tbl,location_tbl WHERE location_tbl.loc_id = user_tbl.user_loc";
                                                $result = mysqli_query($connection,$sql);

                                                while($dataRow=mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                    echo "<td >".$dataRow['user_name']."</td>";
													echo "<td >".$dataRow['user_type']."</td>";
													echo "<td >".$dataRow['loc_name']."</td>";
                                                    echo "<td>
                                                        <div class=\"form-button-action\">
                                                            <a href='edit-users.php?id=$dataRow[user_id]'>
                                                                <button type=\"button\" data-toggle=\"tooltip\" 		title=\"Edit\" class=\"btn btn-link btn-primary btn-lg\" data-original-title=\"Edit Task\">
                                                                    <i class=\"fa fa-edit\"></i>
                                                                </button>
                                                            </a>

                                                            <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete-user.php?id=$dataRow[user_id]'>
                                                                <button type=\"button\" data-toggle=\"tooltip\" title=\"Remove\" class=\"btn btn-link btn-danger\" data-original-title=\"Remove\">
                                                                    <i class=\"fa fa-times\"></i>
                                                                </button>
                                                            </a>
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
</body>

</html>