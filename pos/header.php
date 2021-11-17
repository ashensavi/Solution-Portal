<?php 
    session_start();
if($_SESSION["loggedIn"] != true){ ?>
    <script>window.location = "login.php";</script>
   <?php }
    $location = $_SESSION['user_loc'];
    if (!isset($_SESSION['user_id'])){
		header('Location: login.php?err=1');
    }
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
    <div class="logo-header" data-background-color="red2" id="logoheader">

        <a href="index.php" class="logo">
            <!-- <img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
            <i class="fa fa-shopping-cart" aria-hidden="true" style="color:white; font-size:20px;"> </i><span style="color:white; margin-left:2px; font-family: 'Oleo Script'; font-size:22px;"> SkyPOS + Invent</span>
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
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="red2" id="navbarheader">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" role="button" title="Cash Out"  onclick="openCloseRegModal()">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="close-register.php" role="button" title="Close Register">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                    </a>
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
    <!--<button type="button" data-toggle-fullscreen class="btn btn-icon btn-round" title="Full Screen (F11)" style="position:fixed;margin:auto; bottom:50px; right:10px; width:45px; height:45px; background-color:#5C55BF;" data-toggle="tooltip">-->
    <!--<i class="fas fa-expand" style="font-size:150%; color:white;" data-toggle-fullscreen></i>-->
    <!--</button>-->
    
    <script language="javascript">
        /**
        *change theme color
        */
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
    
/**
*Open close register modal
*/
function openCloseRegModal() {
    <?php 
    $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = $_SESSION[user_id] AND reg_status = 0");
    $res8 = mysqli_fetch_array($sql);
    if (!empty($res8['reg_user_id'])) { ?>
    $('#closeRegModal').modal('show');
    <?php } ?>
}

/**
*close Register
*/
// function CloseRegister() {
 
// obj = {
//     "total": document.getElementById("txt1tot1").value,
//     "note": document.getElementById("textCloseNote").value
// }

// $.ajax({
//     url: "ajax/close-register.php",
//     type: "POST",
//     data: {
//         data: obj
//     },

//     success: function(data) {
// // console.log(data);

//         var res = JSON.parse(data);
//         if (res.status == 'success') {
//             var SweetAlert2Demo = function() {
//                 var initDemos = function() {
//                     swal({
//                         icon: "success",
//                         title: 'Success !',
//                         type: 'success',
//                         buttons: {
//                             confirm: {
//                                 text: 'OK',
//                                 className: 'btn btn-success'
//                             }
//                         }
//                     }).then((Delete) => {
//                         if (Delete) {
//                             window.location.href = "print-cash-out.php?id="+res.status_id;
//                         } else {
//                             window.location.href = "print-cash-out.php?id="+res.status_id;
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
//                     }).then((Delete) => {
//                         if (Delete) {
//                             location.reload();
//                         } else {
//                             location.reload();
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
//         var errorMessage = xhr.status + ': ' + xhr.statusText;
//         var SweetAlert2Demo = function() {
//             var initDemos = function() {
//                 swal({
//                     icon: "error",
//                     title: 'Error! ' + errorMessage,
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
// }

// function cashOutRegister() {

// obj = {
//     "cashout": document.getElementById("txtCashOut").value
// }

// $.ajax({
//     url: "ajax/cash-out-register.php",
//     type: "POST",
//     data: {
//         data: obj
//     },

//     success: function(data) {
// // console.log(data);

//         var res = JSON.parse(data);
//         if (res.status == 'success') {
//             var SweetAlert2Demo = function() {
//                 var initDemos = function() {
//                     swal({
//                         icon: "success",
//                         title: 'Success !',
//                         type: 'success',
//                         buttons: {
//                             confirm: {
//                                 text: 'OK',
//                                 className: 'btn btn-success'
//                             }
//                         }
//                     }).then((Delete) => {
//                         if (Delete) {
//                             location.reload();
//                         } else {
//                             location.reload();
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
//                     }).then((Delete) => {
//                         if (Delete) {
//                             location.reload();
//                         } else {
//                             location.reload();
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
//         var errorMessage = xhr.status + ': ' + xhr.statusText;
//         var SweetAlert2Demo = function() {
//             var initDemos = function() {
//                 swal({
//                     icon: "error",
//                     title: 'Error! ' + errorMessage,
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
// }
</script>
</div>

<!-- open register Modal -->
<div class="modal fade" id="closeRegModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header no-bd">
    <h2 style="color:blue;">Cash Out</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <!-- <form>
        <div class="row">
            <div class="col-sm-12">
                <div style="margin-top:5px; margin-bottom:0px;">
                    <div class="row">
                        <div class="col-6" align="left">
                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;">Cash in hand:</p>
                        </div>
                        <div class="col-6" align="right">
                            <p style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;" id="inHand"></p>
                        </div>
                        <div class="col-6" align="left">
                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;">Total Sales:</p>
                        </div>
                        <div class="col-6" align="right">
                            <p style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;" id="totalSale"></p>
                        </div>
                        <div class="col-6" align="left">
                            <p style="margin-top:0px; margin-bottom:0px;margin-left:20px;">Cash Out:</p>
                        </div>
                        <div class="col-6" align="right">
                            <p style="margin-top:0px; margin-bottom:0px; margin-right:0px; margin-right:20px;" id="cashoutp"></p>
                        </div>
                    </div>
                </div>
                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                <div style="margin-top:5px; margin-bottom:0px;">
                    <div class="row">
                        <div class="col-6" align="left">
                            <p style="margin-top:0px; margin-bottom:0px; margin-left:20px;">Total Cash In Hand:</p>
                        </div>
                        <div class="col-6" align="right">
                            <p style="margin-top:0px; margin-bottom:0px; margin-right:20px;" id="totalCash"></p>
                        </div>
                        <input id="txt1tot1" name="txt1tot1" type="text" style="display:none;">
                    </div>
                </div>
                <hr style="border-top: dotted 1px; margin-bottom:0px; margin-top:5px;" />
                
                <div class="form-group">
                    <label for="">Note</label>
                    <textarea rows="4" cols="50" class="form-control" id="textCloseNote"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer no-bd">
            <button class="btn btn-primary" type="submit">Close Register</button>
        </div>
    </form> -->
    
    <form action="cash-out.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Cash Out Price</label>
                    <input id="txtCashOut" name="txtCashOut" type="number" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer no-bd">
            <button class="btn btn-primary" type="submit">Cash Out</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
<!-- open register Modal -->
