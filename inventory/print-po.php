<!DOCTYPE html>
<html lang="en" id="printElement">

<?php
session_start();

	if (!isset($_SESSION['user_name'])){
		header('Location: login.php?err=1');
	}
?>

<?php include 'db/dbConnection.php'; ?>

<?php
$id = $_GET['id'];
//echo $id;

?>

<head>
    <meta charset="utf-8">
    <title>SKYPOS</title>
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />
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
    <link rel="stylesheet" href="assets/css/invoiceStyle.css" media="all" />
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <style>
    /* override styles when printing */
    @media print {
        #openWin {
            display: none;
        }

        #backbtn {
            display: none;
        }

        .tox-menubar{
            display: none !important;
        }
        .tox-toolbar{
            display: none !important;
        }
        .tox-statusbar{
            display: none !important;
        }
        #tinymce{
            overflow-y: hidden !important;
        }
        .tox{
            border: none !important;
        }
        .tox-tinymce{
            border: none !important;
        }
        .tox-edit-area{
            border: none !important;
        }
    }
    .tox-statusbar__branding{
        display: none !important;
    }
    </style>
</head>

<button type="button" id="openWin" class="btn btn-icon btn-round" title=""
    style="position:fixed;margin:auto; bottom:250px; right:10px; width:60px; height:60px; background-color:#5C55BF; border:none; cursor:pointer;"
    onclick="window.print();return false;">
    <i class="fas fa-print" style="font-size:180%; color:white;"></i>
</button>
<button type="button" class="btn btn-icon btn-round" id="backbtn"
    style="position:fixed;margin:auto; bottom:160px; right:10px; width:60px; height:60px; background-color:#5C55BF; border:none; cursor:pointer;"
    onclick="goBack()">
    <i class="fas fa-arrow-left" style="font-size:200%; color:white;"></i>
</button>

<body  style="background-color: white;">

    <?php
    $total = 0;

    $sql = mysqli_query($connection, "SELECT * FROM po_tbl,supplier_tbl WHERE  po_tbl.po_id = '$id' AND supplier_tbl.supplier_id = po_tbl.supplier_id");
    $res = mysqli_fetch_array($sql);

    $supplier_name = $res['supplier_name'];
    $supplier_phone = $res['supplier_phone'];
    $supplier_email = $res['supplier_email'];
    $po_id= $res['po_id'];
    $date = $res['date'];
//    $po_value = $res['po_value'];
    $x = 1;
    ?>

    <!-- <header class="clearfix"  style="background-color: white;">
        <div id="logo">
            <img src="image/<?php echo $image ?>">
        </div>
        <div id="company">
            <h2 class="name"><?php echo $supplier_name ?></h2>
            <div><?php echo $supplier_phone ?></div>
            <div><a href="mailto:<?php echo $supplier_email ?>" target="_new"><?php echo $supplier_email ?></a></div>
        </div>
        </div>
    </header> -->
    <br>
    <br>
    <main style="background-color: white;">
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">TO:</div>
                <h2 class="name"><?php echo $supplier_name ?></h2>
                <div class="address"><?php echo $supplier_phone ?></div>
                <div class="email"><a href="mailto:<?php echo $supplier_email ?>" target="_new"><?php echo $supplier_email ?></a></div>
            </div>
            <div id="invoice">
                <h1>PURCHASE ORDER</h1>
                <div class="date">Date : <?php echo $date ?></div>
                <div class="date">PO Number : <?php echo $po_id ?></div>
                <!-- <div class="date">Valid Date: 30/06/2014</div> -->
            </div>
        </div>
        <hr style="margin-bottom:40px;">
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">NO</th>
                    <th class="desc" style="border-bottom: 0.5px solid #AAAAAA;">PRODUCTS</th>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">UNIT</th>
                    <th class="qty" style="border-bottom: 0.5px solid #AAAAAA;">QTY</th>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">UNIT PRICE (Rs)</th>
                    <th class="total" style="border-bottom: 0.5px solid #AAAAAA;">AMOUNT (Rs)</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql="SELECT * From po_details_tbl,products_tbl WHERE po_details_tbl.po_id = '$id' AND products_tbl.pro_id = po_details_tbl.pro_id
";
                    $result = mysqli_query($connection,$sql);
			        while($dataRow=mysqli_fetch_assoc($result)){
                        $total += $dataRow['pro_qty'] * $dataRow['cost_prise'];
                ?>

                <tr>
                    <td class="no"><?php echo $x ?></td>
                    <td class="desc">
                        <h3><?php echo $dataRow['pro_name']; ?></h3>
                    </td>
                    <td class="unit"> <?php echo $dataRow['pro_name']; ?> </td>
                    <td class="qty"><?php echo $dataRow['pro_qty']; ?></td>
                    <td class="unitPrice"><?php echo number_format($dataRow['cost_prise'],2); ?> </td>
                    <td class="total"><?php echo number_format($dataRow['pro_qty'] * $dataRow['cost_prise'],2); ?>
                    </td>
                </tr>
                <?php
                    $x++;
                    }
                ?>

            </tbody>

            <tfoot>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="3"></td>
                    <td colspan="1" style="">GRAND TOTAL (Rs.) </td>
                    <td style="text-align:right;"><?php echo number_format($total,2); ?></td>

                </tr>
            </tfoot>

        </table>
        <div id="thanks">
            Thanks
        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script>
    function goBack() {
        window.location = 'purches-order.php';
    }
    </script>

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.5/tinymce.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script>
    tinymce.init({
        selector: "textarea",
        plugins: "lists advlist autolink autoresize charmap code emoticons hr image insertdatetime link media paste preview searchreplace table textpattern toc visualblocks visualchars wordcount quickbars autoresize spellchecker",
        toolbar: "undo redo | formatselect | fontselect | fontsizeselect | bold italic underline strikethrough backcolor forecolor | subscript superscript | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | paste searchreplace | toc link image media charmap insertdatetime emoticons hr | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | removeformat spellchecker",
        insertdatetime_element: true,
        media_scripts: [{
                filter: 'platform.twitter.com'
            },
            {
                filter: 's.imgur.com'
            },
            {
                filter: 'instagram.com'
            },
            {
                filter: 'https://platform.twitter.com/widgets.js'
            },
        ],
        browser_spellcheck: true,
        contextmenu: true,
        autoresize_on_init: true,
        // max_height: 400,
        spellchecker_languages: 'English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr_FR,' + 'German=de,Italian=it,Polish=pl,Portuguese=pt_BR,Spanish=es,Swedish=sv',
    });
    </script>
</body>

</html>