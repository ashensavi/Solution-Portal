<?php
include "../db/dbConnection.php";
?>

<?php
$id = $_GET['id'];


$query = "SELECT * FROM `products_tbl` WHERE `pro_id`='$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
//$added_date = $row['added_date'];
//$added_user = $row['added_user'];
//$brand_id = $row['brand_id'];
//$cat_id = $row['cat_id'];
//$pro_all_qty = $row['pro_all_qty'];
//$pro_code = $row['pro_code'];
$pro_cost = $row['pro_cost'];
//$pro_desc = $row['pro_desc'];
$pro_id = $row['pro_id'];
//$pro_img = $row['pro_img'];
$pro_name = $row['pro_name'];
$pro_price = $row['pro_price'];
//$pro_unit = $row['pro_unit'];
//$rack_no = $row['rack_no'];
//$subcat_id = $row['subcat_id'];
//$supplier_id = $row['supplier_id'];
//$whole_sale_price = $row['whole_sale_price'];


$return_arr = array();

$return_arr['pro_id'] = $pro_id;
$return_arr['pro_name'] = $pro_name;
$return_arr['qty'] = 0;
$return_arr['pro_cost']=$pro_cost;
$return_arr['pro_price']=$pro_price;

//$return_arr['']=;
//$return_arr['whole_sale_price']=$whole_sale_price;

echo json_encode($row);
?>
