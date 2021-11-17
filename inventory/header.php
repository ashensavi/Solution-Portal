<?php 
    session_start();
	if (!isset($_SESSION['user_name'])){
		header('Location: login.php?err=1');
    }
    $location = $_SESSION['user_loc'];
?>
<?php include 'db/dbConnection.php'; ?>
<link href='https://fonts.googleapis.com/css?family=Oleo Script' rel='stylesheet'>
<style>
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    body::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    body::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #CBCBCB;
    }

    .table-responsive::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    .table-responsive::-webkit-scrollbar {
        /* width: 12px; */
        height:11px;
        background-color: #F5F5F5;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #CBCBCB;
    }
    
    /* .table-responsive::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.44, rgb(122, 153, 217)),
                color-stop(0.72, rgb(73, 125, 189)),
                color-stop(0.86, rgb(28, 58, 148)));
    } */
</style>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue" id="logoheader">

        <a href="index.php" class="logo">
            <!-- <img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
            <i class="fa fa-shopping-cart" aria-hidden="true" style="color:white; font-size:15px;"> </i><span style="color:white; margin-left:2px; font-family: 'Oleo Script'; font-size:30px;"> SkyInventory</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue" id="navbarheader">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification" id="notifi"></span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                      
                        <!-- <li>
                            <a class="see-all" href="stock-reorder-level.php">See all notifications<i
                                    class="fa fa-angle-right"></i> </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                    </a>
                    <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">Quick Actions</span>
                            <span class="subtitle op-8">Shortcuts</span>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                                <div class="row m-0">
                                    <a class="col-6 col-md-4 p-0" href="pos.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-shapes-1"></i>
                                            <span class="text">POS</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="good-receive-note.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-file-1"></i>
                                            <span class="text">GRN</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="list-products.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-cart-1"></i>
                                            <span class="text">products</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="list-customers.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-user-2"></i>
                                            <span class="text">Customers</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="stock-reorder-level.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-store"></i>
                                            <span class="text">Stock reorder</span>
                                        </div>
                                    </a>
                                    <a class="col-6 col-md-4 p-0" href="damage-stock.php">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-interface-5"></i>
                                            <span class="text">Damage Stock</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile"
                                            class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4><?php echo $_SESSION['user_name'] ?></h4>
                                        <p class="text-muted"><?php echo $_SESSION['user_type'] ?></p>
                                        <!-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="#">My Balance</a>
                                <a class="dropdown-item" href="#">Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Account Setting</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="logout.php" style="color:red; font-size:20px;">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <button type="button" id="openWin" class="btn btn-icon btn-round" title="Open Keyboard (pc)" style="position:fixed;margin:auto; bottom:100px; right:10px; width:45px; height:45px; background-color:#5C55BF;" onclick="openKeyboard()" data-toggle="tooltip">
    <i class="fa fa-keyboard" style="font-size:150%; color:white;"></i>
    </button>
    <button type="button" id="openWin" class="btn btn-icon btn-round" title="Open Calculator (pc)" style="position:fixed;margin:auto; bottom:150px; right:10px; width:45px; height:45px; background-color:#5C55BF;" onclick="openCal()" data-toggle="tooltip">
    <i class="fas fa-calculator" style="font-size:150%; color:white;"></i>
    </button>
    <button type="button" data-toggle-fullscreen class="btn btn-icon btn-round" title="Full Screen (F11)" style="position:fixed;margin:auto; bottom:50px; right:10px; width:45px; height:45px; background-color:#5C55BF;" data-toggle="tooltip">
    <i class="fas fa-expand" style="font-size:150%; color:white;" data-toggle-fullscreen></i>
    </button>
    <script language="javascript">
        function openKeyboard(){
            $.ajax({
                url: 'ajax/openKeyboard.php',
                type: 'get',
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    
                }
            });
        }
        function openCal(){
            $.ajax({
                url: 'ajax/openCal.php',
                type: 'get',
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    
                }
            });
        }
        function changeTheme(theme){
            localStorage.setItem('Theme', theme);
            var theme1 = localStorage.getItem('Theme');
            if(theme1 == 'dark'){
                $('.navbar-header').removeAttr('data-background-color');
                $('.navbar-header').attr('data-background-color', 'dark');

                $('.logo-header').removeAttr('data-background-color');
                $('.logo-header').attr('data-background-color', 'dark');

                $('body').attr('data-background-color', 'dark');
                $('.sidebar').attr('data-background-color', 'dark2');
            }else{
                $('.navbar-header').removeAttr('data-background-color');
                $('.navbar-header').attr('data-background-color', 'blue');

                $('.logo-header').removeAttr('data-background-color');
                $('.logo-header').attr('data-background-color', 'blue');

                $('.sidebar').removeAttr('data-background-color');
                $('body').removeAttr('data-background-color');
            }
        }
    </script>
    
</div>