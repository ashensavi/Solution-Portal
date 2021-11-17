<?php
include('../db/dbConnection.php');

$id = $_GET['id'];

session_start();
$location = $_SESSION['user_loc'];
?>

<?php
	$sql = mysqli_query($connection,"SELECT * FROM products_tbl,stock_tbl,batch_tbl WHERE products_tbl.pro_code LIKE '%$id%' AND stock_tbl.pro_id = products_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id OR products_tbl.pro_name LIKE '%$id%' AND stock_tbl.pro_id = products_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id AND batch_tbl.batch_location = '$location'");
	$row = mysqli_num_rows($sql);
	while ($row = mysqli_fetch_array($sql)){
        $stockid = $row['stock_id'];
        if (!empty($row['pro_img'])) {
            $image = $row['pro_img'];
        }else {
            $image = 'no img.jpg';
        }
        echo "<div class='col-3 btn' style='padding:2px;' onclick='addToTable(".$stockid.")'>
            <div class='card card-post card-round' style='background-color:#48AAF7;'>
                <img class='card-img-top' src='assets/img/productimg/".$image."'>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px;'>".$row['pro_name']."</p>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px;'>Qty : ".$row['stock_qty']."</p>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px;'>Rs. ".number_format($row['price'],2)."</p>
            </div>
        </div>";
	}
?>