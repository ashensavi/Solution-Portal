<?php

include ("../db/dbConnection.php");
$location =$_GET['location'];

$product =$_GET['product_id'];

?>




<?php

$sql="SELECT * FROM stock_tbl,damage_tbl,user_tbl,products_tbl,location_tbl,batch_tbl WHERE stock_tbl.stock_id=damage_tbl.damage_stock_id AND products_tbl.pro_id=stock_tbl.pro_id AND stock_tbl.stock_location=damage_tbl.added_user AND batch_tbl.pro_id=stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id AND location_tbl.loc_id=stock_tbl.stock_location AND stock_tbl.pro_id='$product' AND damage_tbl.added_user='$location' AND stock_tbl.pro_id='$product' AND stock_tbl.stock_location='$location' AND batch_tbl.pro_id='$product'";
$result = mysqli_query($connection,$sql);

while($dataRow=mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td >".$dataRow['pro_name']."</td>";
    echo "<td >".$dataRow['pro_code']."</td>";
    echo "<td >".$dataRow['damage_qty']."</td>";
    echo "<td >".number_format($dataRow['cost'],2)."</td>";
    echo "<td >".$dataRow['loc_name']."</td>";
    echo "<td >".$dataRow['damage_added_date']."</td>";
    echo "<td >"."<img src='assets/img/productimg/".$dataRow['pro_img']."'width='70' height='60' style='margin-top:2px; margin-bottom:2px;'>"."</td>";
    echo "</tr>";
}
?>
