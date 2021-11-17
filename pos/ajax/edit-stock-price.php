<?php
    include('../db/dbConnection.php');
?>
<?php

$data = (array) $_POST['data'];

$id = $data['id'];
$cost = $data['cost'];
$price = $data['price'];

 
mysqli_autocommit($connection, false);

$query1 = "UPDATE batch_tbl SET 
                            cost = $cost,
                            price = $price 
                            WHERE 
                            batch_id=$id";

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