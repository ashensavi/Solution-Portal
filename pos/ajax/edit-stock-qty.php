<?php
    include('../db/dbConnection.php');
?>
<?php

$data = (array) $_POST['data'];

$id = $data['id'];
$qty = $data['qty'];

 
mysqli_autocommit($connection, false);

$query1 = "UPDATE stock_tbl SET stock_qty = $qty  WHERE stock_id='$id'";

$result1 = mysqli_query($connection, $query1);

if ($result1) {
    mysqli_commit($connection);
    $response_array['status'] = 'success';
    echo json_encode($response_array);
}else {
    mysqli_rollback($connection);
    $response_array['status'] = 'error';
    echo json_encode($response_array);
}
?>