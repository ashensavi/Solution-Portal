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
?>

<head>
    <meta charset="utf-8">
    <title>Invoice | WEFIX</title>
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

    <header class="clearfix"  style="background-color: white;">
        <div id="logo">
            <img src="image/">
        </div>
        <div id="company">
            <h2 class="name"></h2>
            <div></div>
            <div></div>
            <div><a href="mailto:" target="_new"></a></div>
        </div>
        </div>
    </header>
    <main style="background-color: white;">
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name"></h2>
                <div class="address"></div>
                <div class="email"><a href="mailto:" target="_new"></a></div>
            </div>
            <div id="invoice">
                <h1>INVOICE</h1>
                <div class="date">Date: <?php echo $added_date ?></div>
                <div class="date">Invoice Number: <?php echo $quote_no ?></div>
                <!-- <div class="date">Valid Date: 30/06/2014</div> -->
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">S.NO</th>
                    <th class="desc" style="border-bottom: 0.5px solid #AAAAAA;">DESCRIPTION</th>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">UNIT</th>
                    <th class="qty" style="border-bottom: 0.5px solid #AAAAAA;">QTY</th>
                    <th class="unit" style="border-bottom: 0.5px solid #AAAAAA;">UNIT PRICE (Rs)</th>
                    <th class="total" style="border-bottom: 0.5px solid #AAAAAA;">AMOUNT (Rs)</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql="SELECT * From invoice_details_tbl,stock_tbl,products_tbl WHERE invoice_id = '$id' AND stock_tbl.stock_id = invoice_details_tbl.stock_id AND products_tbl.pro_id = stock_tbl.pro_id";
                    $result = mysqli_query($connection,$sql);
			        while($dataRow=mysqli_fetch_assoc($result)){ 
                        $total += $dataRow['totQty'] * $dataRow['invoice_price'];
                ?>

                <tr>
                    <td class="no"><?php echo $x ?></td>
                    <td class="desc">
                        <h3><?php echo $dataRow['pro_name']; ?></h3>
                        <?php echo $dataRow['invoice_desc']; ?>
                    </td>
                    <td class="unit"> <?php echo $dataRow['pro_unit']; ?> </td>
                    <td class="qty"><?php echo $dataRow['totQty']; ?></td>
                    <td class="unitPrice"><?php echo number_format($dataRow['invoice_price'],2); ?> </td>
                    <td class="total"><?php echo number_format($dataRow['totQty'] * $dataRow['invoice_price'],2); ?>
                    </td>
                </tr>
                <?php
                    $x++; 
                    } 
                ?>

            </tbody>
        </table>
        <div id="thanks"><?php echo "thanks" ?></div>
    </main>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <!-- <script src="assets/js/atlantis.min.js"></script> -->
    <script>
    function goBack() {
        window.location = 'list-invoice.php';
    }
    </script>
</body>

</html>