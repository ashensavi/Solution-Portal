<div class="sidebar sidebar-style-2" id="sidebar">
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
                            if ($_SESSION['user_type'] == 'super admin') {
                                echo "<li>
										<a href=\"list-users.php\">
											<span class=\"sub-item\">List Users</span>
										</a>
									</li>";
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <!-- <span class="caret"></span> -->
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <!-- ============================================== -->
                <!-- <li class="nav-item">
                    <a href="pos.php">
                        <i class="fas fa-grip-horizontal"></i>
                        <p>POS</p>
                    </a>
                </li> -->
                <!-- ============================================== -->
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Products">
                        <i class="fas fa-barcode"></i>
                        <p>Products</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Products">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="list-categories.php">
                                    <span class="sub-item">List Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="list-subCategories.php">
                                    <span class="sub-item">List Subcategories</span>
                                </a>
                            </li>
                            <li>
                                <a href="list-brands.php">
                                    <span class="sub-item">List Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="list-products.php">
                                    <span class="sub-item">List Products</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="products-pack.php">
                                    <span class="sub-item">Study Packs</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <!-- ======================================= -->
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
                <!-- ======================================== -->
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Suppliers">
                        <i class="fas fa-users"></i>
                        <p>Supplier</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Suppliers">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="list-supplier.php">
                                    <span class="sub-item">List Suppliers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ======================================== -->
                <li class="nav-item">
                    <a data-toggle="collapse" href="#stock">
                        <i class="fas fa-dolly-flatbed"></i>
                        <p>Stock</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="list-pack.php">
                                    <span class="sub-item">Book List</span>
                                </a>
                            </li>
                        <li>
                                <a href="purches-order.php">
                                    <span class="sub-item">Purchase Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="good-receive-note.php">
                                    <span class="sub-item">GRN</span>
                                </a>
                            </li>
                            <li>
                                <a href="view&printDRN.php">
                                    <span class="sub-item">view & Print Grn</span>
                                </a>
                            </li>
<!--                            <li>-->
<!--                                <a href="dispose-product.php">-->
<!--                                    <span class="sub-item">Dispose Products</span>-->
<!--                                </a>-->
<!--                            </li>-->
                            <!-- ======================================== -->
                            <li>
                                <a href="damage-stock.php">
                                    <span class="sub-item">Damage Stock</span>
                                </a>
                            </li>
                            <?php
                                if ( $_SESSION['user_loc'] === "2"){?>
                             <li>
                                <a href="products-transfer.php">
                                    <span class="sub-item">Products Transfer</span>
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="pending-stock-transfer.php">
                                    <span class="sub-item">Pending Stock Transfer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#Reports">
                        <i class="fas fa-signal"></i>
                        <p>Stock Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="Reports">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="stock-report.php">
                                    <span class="sub-item">Stock Reports</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="stock-reorder-level.php">
                                    <span class="sub-item">Reorder Pro. Reports</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="product-report.php">
                                    <span class="sub-item">Product report</span>
                                </a>
                            </li>

                            <li>
                                <a href="damage-product-report.php">
                                    <span class="sub-item">Damage Product Report</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="expired-report.php">
                                    <span class="sub-item">Expired Product Report</span>
                                </a>
                            </li> -->
<!--                            <li>-->
<!--                                <a href="disposal-report.php">-->
<!--                                    <span class="sub-item">Disposal Report</span>-->
<!--                                </a>-->
<!--                            </li>-->
                            <li>
                                <a href="moving-item-report.php?date=0">
                                    <span class="sub-item">Not Moving Item Report</span>
                                </a>
                            </li>
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
                            <li>
                                <a href="daily-sales-report.php">
                                    <span class="sub-item">Daily Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="current-month-sales.php">
                                    <span class="sub-item">Current month Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="last-month-sales.php">
                                    <span class="sub-item">Last Month Sales</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="custom-sales-report.php">
                                    <span class="sub-item">Custome Sales Report</span>
                                </a>
                            </li> -->

                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
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
                <li class="mx-4 mt-2">
                    <a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i
                                    class="fas fa-sign-out-alt"></i> </span>Logout</a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
