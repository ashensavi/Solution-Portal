<?php
include "../db/dbConnection.php";
?>

<?php
$id=$_GET['po_id'];
$product_sql = "SELECT * FROM `po_details_tbl`,`products_tbl` WHERE products_tbl.`pro_code`='$id' AND products_tbl.pro_id=po_details_tbl.pro_id";


$product_result = mysqli_query($connection, $product_sql);
while ($product_data = mysqli_fetch_array($product_result)) {
    $id = $product_data['pro_id'];
    echo "<div class='col-3 ' title='" . $product_data['pro_name'] . "'>
            <div class='card card-post card-round' style='background-color:#48AAF7; cursor:pointer; ' onclick='searchByCode(" . $id . ")'>
                <img class='card-img-top' src='assets/img/productimg/no img.jpg'>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px;'>" . $product_data['pro_name'] . "</p>
                
            </div>
        </div>";
}

?>
