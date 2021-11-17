<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Edit User | SKYPOS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
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
	<style>
            section {
                display: flex;
                flex-direction: column;
                padding: 0.5em;
            }

            h1 {
              font-weight: 400;
              font-size: 2em;
              cursor: default;
              margin: 0 0 .5em 0;
              color:black;
            }

            .form-check {
              padding-left: 0;
            }

            input[type="checkbox"] {
              display: none;
              height: 0;
              width: 0;
            }
            input[type="checkbox"] + label {
              align-items: center;
              color: #e3e3e3;
              cursor: pointer;
              display: inline-flex;
              margin: 10px 0;
              position: relative;
            }
            input[type="checkbox"] + label > span {
              align-items: center;
              background: white;
              border: 2px solid blue;
              border-radius: 2px;
              display: inline-flex;
              height: 21px;
              justify-content: center;
              margin-right: 15px;
              transition: .25s ease;
              width: 21px;
            }
            input[type="checkbox"]:checked + label > span {
              animation: shrink-bounce ci-transition(fancy-hover);
            }
            input[type="checkbox"]:checked + label > span::before {
              animation: checkbox-check .125s .25s ease forwards;
              border-bottom: 3px solid transparent;
              border-radius: 2px;
              border-right: 3px solid transparent;
              content: "";
              left: 5px;
              position: absolute;
              top: 10px;
              transform: rotate(45deg);
              transform-origin: 0 100%;
            }

            @keyframes shrink-bounce {
              0% {
                transform: scale(1);
              }
              33% {
                transform: scale(0.85);
              }
              100% {
                transform: scale(1);
              }
            }
            @keyframes checkbox-check {
              0% {
                border-color: red;
                height: 0;
                transform: translate3d(0, 0, 0) rotate(45deg);
                width: 0;
              }
              33% {
                height: 0;
                transform: translate3d(0, 0, 0) rotate(45deg);
                width: 11px;
              }
              100% {
                border-color: red;
                height: 20px;
                transform: translate3d(0, -20px, 0) rotate(45deg);
                width: 11px;
              }
            }
        </style>
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
						<h4 class="page-title">ADD USER</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- <form action="edit-userpro.php" method="post" enctype="multipart/form-data"> -->
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="">User Email</label>
													<input id="txt_email" type="email" class="form-control" placeholder="Enter User Email">
												</div>
                                                    <div class="form-group">
                                                        <label for="">User Role</label>
                                                        <select class="form-control" id="txt_userrole" name="">
                                                            <option value="" disabled selected hidden>Select User Role</option>
                                                            <option value="super admin">super admin</option>
                                                            <option value="admin"> admin </option>
                                                            <option value="cashier"> cashier </option>
                                                            <option value="Stock keeper"> Stock keeper </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Location</label>
                                                        <select class="form-control" id="txt_location">
                                                            <option disabled selected hidden> Select Location </option>
                                                            <?php
																$sql = mysqli_query($connection,"SELECT * FROM location_tbl");
																$row = mysqli_num_rows($sql);
																while ($row = mysqli_fetch_array($sql)){
																	echo "<option value='". $row['loc_id'] ."'>" .$row['loc_name'] ."</option>" ;
																}
															?>
                                                        </select>
                                                    </div>
                                                <div class="form-group">
													<label for="">Password</label>
													<input type="password" class="form-control" id="newpwd" onkeyup="myFunction()">
												</div>
                                                <div class="form-group">
												<label for="">Confirm Password</label>
													<input type="password" class="form-control" id="currpwd" onkeyup="myFunction()">
                                                </div>
											</div>
											<div class="col-md-3">
                                                <section>
                                                    <h1>POS</h1>
                                                    <input id='pos_pos' type='checkbox' />
                                                    <label for='pos_pos'>
                                                        <span></span>
                                                        pos
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="col-md-3">
                                                <section>
                                                    <h1>Customers</h1>
                                                    <input id='pos_customer' type='checkbox' />
                                                    <label for='pos_customer'>
                                                        <span></span>
                                                        List Customers
                                                    </label>
                                                </section>
                                            </div>
											<div class="col-md-3">
                                                <section>
                                                    <h1>Setting</h1>
                                                    <input id='pos_bill_sett' type='checkbox' />
                                                    <label for='pos_bill_sett'>
                                                        <span></span>
                                                        Bill Setting
                                                    </label>
                                                </section>
                                            </div>
											<div class="col-md-3">
                                                <section>
                                                    <h1>Sales Reports</h1>
                                                    <input id='pos_day_sales' type='checkbox' />
                                                    <label for='pos_day_sales'>
                                                        <span></span>
                                                        Per Day Sales
                                                    </label>
                                                    
                                                    <input id='pos_curr_month_sales' type='checkbox' />
                                                    <label for='pos_curr_month_sales'>
                                                        <span></span>
                                                        Current Month Sales
                                                    </label>

													<input id='pos_last_month_sale' type='checkbox' />
                                                    <label for='pos_last_month_sale'>
                                                        <span></span>
                                                        Last Month Sales
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="col-md-3">
                                                <section>
                                                    <h1>Stock</h1>
                                                    <input id='pos_dispose_pro' type='checkbox' />
                                                    <label for='pos_dispose_pro'>
                                                        <span></span>
                                                        Dispose Products
                                                    </label>

													<input id='pos_damage_stock' type='checkbox' />
                                                    <label for='pos_damage_stock'>
                                                        <span></span>
                                                        Damage Stock
                                                    </label>

													<input id='pos_reorder_stock' type='checkbox' />
                                                    <label for='pos_reorder_stock'>
                                                        <span></span>
                                                        Reorder Stock
                                                    </label>

													<input id='pos_verify_pro_transfer' type='checkbox' />
                                                    <label for='pos_verify_pro_transfer'>
                                                        <span></span>
                                                        Verify Products Transfer
                                                    </label>

													<input id='pos_pro_exchange' type='checkbox' />
                                                    <label for='pos_pro_exchange'>
                                                        <span></span>
                                                        Product Exchange
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="col-md-3">
                                                <section>
                                                    <h1>Reports</h1>
                                                    <input id='pos_stock_rep' type='checkbox' />
                                                    <label for='pos_stock_rep'>
                                                        <span></span>
                                                        Stock Reports
                                                    </label>
                                                    
                                                    <input id='pos_reo_pro_rep' type='checkbox' />
                                                    <label for='pos_reo_pro_rep'>
                                                        <span></span>
                                                        Reorder Products Report
                                                    </label>

													<input id='pos_pro_rep' type='checkbox' />
                                                    <label for='pos_pro_rep'>
                                                        <span></span>
                                                        Products Report
                                                    </label>

													<input id='pos_sales_rep' type='checkbox' />
                                                    <label for='pos_sales_rep'>
                                                        <span></span>
                                                        Sales Report
                                                    </label>

													<input id='pos_damage_pro_rep' type='checkbox' />
                                                    <label for='pos_damage_pro_rep'>
                                                        <span></span>
                                                        Damage Products Report
                                                    </label>

													<input id='pos_exp_pro_rep' type='checkbox' />
                                                    <label for='pos_exp_pro_rep'>
                                                        <span></span>
                                                        Expired Products Report
                                                    </label>

													<input id='pos_disposal_rep' type='checkbox' />
                                                    <label for='pos_disposal_rep'>
                                                        <span></span>
                                                        Disposal Report
                                                    </label>

													<input id='pos_not_moving_item_rep' type='checkbox' />
                                                    <label for='pos_not_moving_item_rep'>
                                                        <span></span>
                                                        Not Moving Item Report
                                                    </label>

													<input id='pos_cashier_reg_rep' type='checkbox' />
                                                    <label for='pos_cashier_reg_rep'>
                                                        <span></span>
                                                        Cashier Register Report
                                                    </label>
                                                </section>
                                            </div>
										</div>
									</div>
									<div class="card-action">
										<button id="editbtn" disabled type="submit" class="btn btn-primary" onClick="addUser()">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>
											Add
										</button>
										<a href='list-users.php' class="btn btn-danger">
											<span class="btn-label">
												<i class="fa fa-times"></i>
											</span>
											Cancel
										</a>
									</div>
								</div>
							<!-- </form> -->
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

    <script>
    /**
    *add user 
    */
    function addUser() {
        var pos_pos = 0;
        if (document.getElementById("pos_pos").checked) {
            pos_pos = 1;
        }
        var pos_customer = 0;
        if (document.getElementById("pos_customer").checked) {
            pos_customer = 1;
        }
        var pos_bill_sett = 0;
        if (document.getElementById("pos_bill_sett").checked) {
            pos_bill_sett = 1;
        }
        var pos_day_sales = 0;
        if (document.getElementById("pos_day_sales").checked) {
            pos_day_sales = 1;
        }
        var pos_curr_month_sales = 0;
        if (document.getElementById("pos_curr_month_sales").checked) {
            pos_curr_month_sales = 1;
        }
        var pos_last_month_sale = 0;
        if (document.getElementById("pos_last_month_sale").checked) {
            pos_last_month_sale = 1;
        }
        var pos_dispose_pro = 0;
        if (document.getElementById("pos_dispose_pro").checked) {
            pos_dispose_pro = 1;
        }
        var pos_damage_stock = 0;
        if (document.getElementById("pos_damage_stock").checked) {
            pos_damage_stock = 1;
        }
        var pos_reorder_stock = 0;
        if (document.getElementById("pos_reorder_stock").checked) {
            pos_reorder_stock = 1;
        }
        var pos_verify_pro_transfer = 0;
        if (document.getElementById("pos_verify_pro_transfer").checked) {
            pos_verify_pro_transfer = 1;
        }
        var pos_pro_exchange = 0;
        if (document.getElementById("pos_pro_exchange").checked) {
            pos_pro_exchange = 1;
        }
        var pos_stock_rep = 0;
        if (document.getElementById("pos_stock_rep").checked) {
            pos_stock_rep = 1;
        }
        var pos_reo_pro_rep = 0;
        if (document.getElementById("pos_reo_pro_rep").checked) {
            pos_reo_pro_rep = 1;
        }
        var pos_pro_rep = 0;
        if (document.getElementById("pos_pro_rep").checked) {
            pos_pro_rep = 1;
        }
        var pos_sales_rep = 0;
        if (document.getElementById("pos_sales_rep").checked) {
            pos_sales_rep = 1;
        }
        var pos_damage_pro_rep = 0;
        if (document.getElementById("pos_damage_pro_rep").checked) {
            pos_damage_pro_rep = 1;
        }
        var pos_exp_pro_rep = 0;
        if (document.getElementById("pos_exp_pro_rep").checked) {
            pos_exp_pro_rep = 1;
        }
        var pos_disposal_rep = 0;
        if (document.getElementById("pos_disposal_rep").checked) {
            pos_disposal_rep = 1;
        }
        var pos_not_moving_item_rep = 0;
        if (document.getElementById("pos_not_moving_item_rep").checked) {
            pos_not_moving_item_rep = 1;
        }
        var pos_cashier_reg_rep = 0;
        if (document.getElementById("pos_cashier_reg_rep").checked) {
            pos_cashier_reg_rep = 1;
        }

        var user_email = document.getElementById("txt_email").value;
        var user_role = document.getElementById("txt_userrole").value;
        var user_loc = document.getElementById("txt_location").value;
        var user_pwd = document.getElementById("currpwd").value;

        obj = {
                "user_email":user_email ,
                "user_role":user_role ,
                "user_loc":user_loc ,
                "user_pwd":user_pwd ,
                "pos_pos":pos_pos ,
                "pos_customer":pos_customer ,
                "pos_bill_sett":pos_bill_sett ,
                "pos_day_sales":pos_day_sales ,
                "pos_curr_month_sales":pos_curr_month_sales ,
                "pos_last_month_sale":pos_last_month_sale ,
                "pos_dispose_pro":pos_dispose_pro ,
                "pos_damage_stock":pos_damage_stock ,
                "pos_reorder_stock":pos_reorder_stock ,
                "pos_verify_pro_transfer":pos_verify_pro_transfer ,
                "pos_pro_exchange":pos_pro_exchange ,
                "pos_stock_rep":pos_stock_rep ,
                "pos_reo_pro_rep":pos_reo_pro_rep ,
                "pos_pro_rep":pos_pro_rep ,
                "pos_sales_rep":pos_sales_rep ,
                "pos_damage_pro_rep":pos_damage_pro_rep ,
                "pos_exp_pro_rep":pos_exp_pro_rep ,
                "pos_disposal_rep":pos_disposal_rep ,
                "pos_not_moving_item_rep":pos_not_moving_item_rep ,
                "pos_cashier_reg_rep":pos_cashier_reg_rep
        }
        $.ajax({
                url: "ajax/add-user.php",
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
                                        window.location.href = "list-users.php";
                                    } else {
                                        window.location.href = "list-users.php";
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
                    } else if (res.status == '1') {
                        var SweetAlert2Demo = function() {
                            var initDemos = function() {
                                swal({
                                    icon: "error",
                                    title: 'User with this email already exists!',
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
    </script>
    <script>
        function myFunction() {
            var pwd=document.getElementById("newpwd").value;
            var currpwd=document.getElementById("currpwd").value;
            if (pwd == currpwd) {
                document.getElementById("editbtn").disabled = false;
            }else{
                document.getElementById("editbtn").disabled = true;
            }
        }
    </script>
</body>
</html>