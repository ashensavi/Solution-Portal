<?php
include "../db/dbConnection.php";
?>

<?php
$id = $_GET['po_id'];
$product_sql = "SELECT * FROM `po_tbl` WHERE `po_id`='$id'";
$res_po = mysqli_query($connection, $product_sql);
$po_result = mysqli_fetch_assoc($res_po);

$grn_details = "SELECT * FROM `po_details_tbl` WHERE `po_id`='$po_result[po_id]'";
$details_Res = mysqli_query($connection, $grn_details);
while ($resut_deatis_grn = mysqli_fetch_array($details_Res)) {
    $pro_sql = "SELECT * FROM `products_tbl` WHERE `pro_id`='$resut_deatis_grn[pro_id]'";
    $product_restt = mysqli_query($connection, $pro_sql);
    $product_data = mysqli_fetch_assoc($product_restt);
        $id = $product_data['pro_id'];
        echo "<div class='col-3 ' title='" . $product_data['pro_name'] . "'>
            <div class='card card-post card-round' style='background-color:#48AAF7; cursor:pointer; ' onclick='searchByCode(" . $id . ")'>
                <img class='card-img-top' src='assets/img/productimg/no img.jpg'>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px;'>" . $product_data['pro_name'] . "</p>
            </div>
        </div>";
}
?>
