<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM main_transfer_tbl WHERE main_tra_id = '$id'");
$res = mysqli_fetch_array($sql);

$date = $res['transfer_date'];
$tra_id = $res['main_tra_id'];
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SKYPOS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <style>
    .tox-statusbar__branding{
        display:none;
    }
    </style>
    <script>
        var localObj = [];
    </script>
</head>

<body>
    <header style="margin: 0px 0 2em !important;">
        <h1 style="letter-spacing: 0em !important; padding: 0em 0 !important; font-size: 1.5rem !important; margin:0;">APPROVE TRANSFER PRODUCTS</h1>
    </header>
    <article>
        <table class="meta">
            <tr>
                <th style="border-style: none;">Number</th>
                <td style="border-style: none;">TRA00<?php echo $tra_id ?></td>
            </tr>
            <tr>
                <th style="border-style: none;">Date & Time</th>
                <td style="border-style: none;"><?php echo $date ?></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM stock_transfer_tbl,stock_tbl,products_tbl,batch_tbl WHERE stock_transfer_tbl.main_trans_id = '$id' AND stock_tbl.stock_id = stock_transfer_tbl.trans_stock_id AND products_tbl.pro_id = stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id";
                $result = mysqli_query($connection,$sql);

                while($dataRow=mysqli_fetch_assoc($result)){ ?>
                    <script>
                        localObj.push({
                            id: <?php echo $dataRow['transfer_id'] ?>,
                            qty: <?php echo $dataRow['transfer_qty'] ?>
                        });
                        // console.log(localObj);
                    </script>
                    <tr>
                        <td style="border-style: none;"><?php echo $dataRow['pro_name'] ?></td>
                        <td style="text-align:center;"><span contenteditable id="span<?php echo $dataRow['transfer_id'] ?>"><?php echo $dataRow['transfer_qty'] ?></span></td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </article>
    <aside>
        <h2>Additional Notes</h2>
        <br>
        <div>
            <textarea id="note1" rows="5" cols="88" style="border: 1px solid !important; border-color:#d2d2d2 !important;"></textarea>
        </div>
        <div style="margin-top:50px;" align="center">
            <button type="button"
                style="cursor:pointer; border-radius:10px; background-color:#08b13c; width:150px; height:50px; color:white; font-weight:bold;" onclick="addStock(<?php echo $id?>)">approve</button>

            <a href='add-stock.php'>
                <button type="button" style="cursor:pointer; border-radius:10px; background-color:#7579ff; width:150px; height:50px; color:white; font-weight:bold;">Go Back</button>
            </a>
        </div>
    </aside>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.5/tinymce.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    
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
    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script>

    function addStock(id) {
        $special_note1 = $("#note1").val();


        for (let index = 0; index < localObj.length; index++) {
            localObj[index].qty =  document.getElementById('span'+localObj[index].id).innerHTML;
        }

        obj = {
            "transfer_id": <?php echo $tra_id ?>,
            "special_note": $special_note1,
            localObj,
            "id":id
        }

        $.ajax({
            url: "ajax/save-stock.php",
            type: "POST",
            data: {
                data: obj
            },

            success: function(data) {
                console.log(data);
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
                                    window.location.href = "add-stock.php";
                                } else {
                                    window.location.href = "add-stock.php";
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

    // tinymce.init({
    //     selector: "textarea",
    //     plugins: "lists advlist autolink autoresize charmap code emoticons hr image insertdatetime link media paste preview searchreplace table textpattern toc visualblocks visualchars wordcount quickbars autoresize spellchecker",
    //     toolbar: "code preview | undo redo | formatselect | fontselect | fontsizeselect | bold italic underline strikethrough backcolor forecolor | subscript superscript | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | paste searchreplace | toc link image media charmap insertdatetime emoticons hr | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | removeformat spellchecker",
    //     insertdatetime_element: true,
    //     media_scripts: [{
    //             filter: 'platform.twitter.com'
    //         },
    //         {
    //             filter: 's.imgur.com'
    //         },
    //         {
    //             filter: 'instagram.com'
    //         },
    //         {
    //             filter: 'https://platform.twitter.com/widgets.js'
    //         },
    //     ],
    //     browser_spellcheck: true,
    //     contextmenu: true,
    //     autoresize_on_init: true,
    //     max_height: 400,
    //     spellchecker_languages: 'English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr_FR,' + 'German=de,Italian=it,Polish=pl,Portuguese=pt_BR,Spanish=es,Swedish=sv',
    // });
    </script>

</body>

</html>