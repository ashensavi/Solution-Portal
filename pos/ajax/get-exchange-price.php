<?php
include('../db/dbConnection.php');
$id = $_GET['id'];

$sql = mysqli_query($connection, "SELECT * FROM exchange_tbl WHERE exchange_id = '$id'");
$res = mysqli_fetch_array($sql);

$exchanged = $res['exchanged'];
$price = number_format($res['exchange_price'],2);

if ($exchanged == 0) {
    $response_array['price'] = $price;
    $response_array['status'] = 'success';
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    $response_array['msg'] = 'Used Exchange Bill, Please Check';
    echo json_encode($response_array);
}

?>