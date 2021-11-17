<div class="sidebar sidebar-style-2" id="sidebar" data-background-color="red2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo $_SESSION['user_name'] ?>
                            <span class="user-level"><?php echo $_SESSION['user_type'] ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <?php 
								echo "<li>
									<a href=\"list-users.php\">
										<span class=\"sub-item\">List Users</span>
									</a>
								</li>";
							?>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-danger">
                <li class="nav-item active">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <!-- ============================================== -->
                <?php if ($_SESSION['pos_pos'] == 1) { ?>
                <li class="nav-item">
                    <a href="pos.php">
                        <i class="fas fa-grip-horizontal"></i>
                        <p>POS</p>
                    </a>
                </li>
                <?php } ?>
                <!-- ======================================= -->
                <?php if ($_SESSION['pos_customer'] == 1) { ?>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Customers">
                        <i class="fas fa-users"></i>
                        <p>Customers</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Customers">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="list-customers.php">
                                    <span class="sub-item">List Customers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php } ?>
                <!-- ======================================== -->
                <li class="nav-item">
                    <a data-toggle="collapse" href="#stock">
                        <i class="fas fa-dolly-flatbed"></i>
                        <p>Stock</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav nav-collapse">
                            <?php if ($_SESSION['user_type'] == 'super admin') { ?>
                            <li>
                                <a href="change-stock.php">
                                    <span class="sub-item">Change Stock QTY</span>
                                </a>
                            </li>
                            <?php } ?>
                            <!-- ======================================== -->
                            <?php if ($_SESSION['pos_dispose_pro'] == 1) { ?>
                            <li>
                                <a href="dispose-product.php">
                                    <span class="sub-item">Dispose Products</span>
                                </a>
                            </li>
                            <?php } ?>
                            <!-- ======================================== -->
                            <?php if ($_SESSION['pos_damage_stock'] == 1) { ?>
                            <li>
                                <a href="damage-stock.php">
                                    <span class="sub-item">Damage Stock</span>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if ($_SESSION['pos_reorder_stock'] == 1) { ?>
                            <li>
                                <a href="stock-reorder-level.php">
                                    <span class="sub-item">Reorder Stock</span>
                                </a>
                            </li>
                            <?php } ?>
                            <!-- ======================================= -->
                            <?php if ($_SESSION['pos_verify_pro_transfer'] == 1) { ?>
                            <li>
                                <a href="add-stock.php">
                                    <span class="sub-item">Verify Products Transfer</span>
                                </a>
                            </li>
                            <?php } ?>

                            <?php if ($_SESSION['pos_pro_exchange'] == 1) { ?>
                            <li>
                                <a href="exchange-product.php">
                                    <span class="sub-item">Products Exchange</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Reports">
                        <i class="fas fa-signal"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Reports">
                        <ul class="nav nav-collapse">
                            <?php if ($_SESSION['pos_stock_rep'] == 1) { ?>
                            <li>
                                <a href="stock-report.php">
                                    <span class="sub-item">Stock Reports</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_reo_pro_rep'] == 1) { ?>
                            <li>
                                <a href="stock-reorder-level.php">
                                    <span class="sub-item">Reorder Pro. Reports</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_pro_rep'] == 1) { ?>
                            <li>
                                <a href="product-report.php">
                                    <span class="sub-item">Products report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_sales_rep'] == 1) { ?>
                            <li>
                                <a href="sales-report.php">
                                    <span class="sub-item">Sales Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_damage_pro_rep'] == 1) { ?>
                            <li>
                                <a href="damage-product-report.php">
                                    <span class="sub-item">Damage Product Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_exp_pro_rep'] == 1) { ?>
                            <li>
                                <a href="expired-report.php">
                                    <span class="sub-item">Expired Product Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_disposal_rep'] == 1) { ?>
                            <li>
                                <a href="disposal-report.php">
                                    <span class="sub-item">Disposal Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_not_moving_item_rep'] == 1) { ?>
                            <li>
                                <a href="moving-item-report.php?date=0">
                                    <span class="sub-item">Not Moving Item Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_cashier_reg_rep'] == 1) { ?>
                            <li>
                                <a href="register-report.php">
                                    <span class="sub-item">Cashier Register Report</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_pro_rep'] == 1) { ?>
                                <li>
                                    <a href="item-selling-report.php">
                                        <span class="sub-item">Item Selling Report</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sales">
                        <i class="fas fa-signal"></i>
                        <p>Sales Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sales">
                        <ul class="nav nav-collapse">
                            <?php if ($_SESSION['pos_day_sales'] == 1) { ?>
                            <li>
                                <a href="daily-sales-report.php">
                                    <span class="sub-item">Per Day Sales</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_curr_month_sales'] == 1) { ?>
                            <li>
                                <a href="current-month-sales.php">
                                    <span class="sub-item">Current month Sales</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['pos_last_month_sale'] == 1) { ?>
                            <li>
                                <a href="last-month-sales.php">
                                    <span class="sub-item">Last Month Sales</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <?php if ($_SESSION['pos_bill_sett'] == 1) { ?>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Settings">
                        <i class="fas fa-cogs"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Settings">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="add-bill-sett.php">
                                    <span class="sub-item">Bill Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php } ?>
                <li class="mx-4 mt-2">
                    <a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="fas fa-sign-out-alt"></i> </span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>