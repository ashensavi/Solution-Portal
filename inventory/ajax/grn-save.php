<?php
include "../db/dbConnection.php";
$data = (array)$_POST['data'];
$grnNum = $data['grnNum'];
$receveDate = $data['receveDate'];
$supplier = $data['supplier'];
$locatoin = $data['locatoin'];
$invNo = $data['invNo'];
$dueDate = $data['dueDate'];
$user_id = $data['user_id'];

$insert_grn_sql = "INSERT INTO `grn_tbl`(`grn_id`, `grn_num`, `grn_received`, `grn_suppid`, `grn_locid`, `grn_invoice_no`, `grn_due_on`, `added_user`, `added_date`) VALUES (
'0',
'$grnNum',
'$receveDate',
'$supplier',
'$locatoin',
'$invNo',
'$dueDate',
'$user_id',
'data')";
$result_grn_details = mysqli_query($connection, $insert_grn_sql);
$last_id = mysqli_insert_id($connection);

if ($result_grn_details) {
    for ($i = 0; $i < count((array)$data['proObj']); $i++) {
        $pro_id = $data['proObj'][$i]['id'];
        $pro_name = $data['proObj'][$i]['name'];
        $qty = $data['proObj'][$i]['qty'];
        $cost = $data['proObj'][$i]['cost'];
        $price = $data['proObj'][$i]['price'];
        $exdate = $data['proObj'][$i]['exdate'];



        $batch_get_sql = "SELECT * FROM `batch_tbl` WHERE `pro_id`='$pro_id' AND`batch_location`='$locatoin'";
        $result_batch = mysqli_query($connection, $batch_get_sql);
        $res_batch_data = mysqli_fetch_assoc($result_batch);
        $batc_no = "SELECT MAX(batch_id) AS max_id FROM batch_tbl";
        $max_batch_id = mysqli_query($connection, $batc_no);
        $batch_ids = mysqli_fetch_assoc($max_batch_id);
        $batch_ids = ++ $batch_ids['max_id'];
        if (count((array)$res_batch_data) == 0) {

            $insert_batch_sql = "INSERT INTO `batch_tbl`(`batch_id`, `pro_id`, `batch_no`, `batch_date`, `ex_date`, `cost`, `price`, `user_id`, `added_date`, `batch_location`) VALUES (
                '$batch_ids',
                '$pro_id',
                '$batch_ids',
                '$exdate',
                '$exdate',
                '$cost',
                '$price',
                '$user_id',
                '$receveDate',
                '$locatoin')";
            mysqli_query($connection, $insert_batch_sql);
        } else {
            $update_batch_sql = "UPDATE `batch_tbl` SET `cost`='$cost',`price`='$price' WHERE `batch_id`='$res_batch_data[batch_id]'";
            $result_update_batch = mysqli_query($connection, $update_batch_sql);

        }

        $insert_grn_details = "INSERT INTO `grndetail_tbl`(`detail_id`, `grnPro_id`, `qty`, `cost`, `price`, `exDate`, `grn_num`, `grn_id`) VALUES (
            '0',
            '$pro_id',
            '$qty',
            '$cost',
            '$price',
            '$exdate',
            '$batch_ids',
            '$last_id')";
        $grn_details_result = mysqli_query($connection, $insert_grn_details);
        if ($grn_details_result) {
            $is_exsit_po_table = "SELECT * FROM `stock_tbl` WHERE `pro_id` ='$pro_id' AND `stock_location`='$locatoin'";
            $resulttt = mysqli_query($connection, $is_exsit_po_table);
            $datass = mysqli_fetch_array($resulttt);
            if (count((array)$datass) == 0) {
                $batch_in_stock_sql="SELECT * FROM `batch_tbl` WHERE `pro_id`= '$pro_id' AND `batch_location`='$locatoin'";
                $res_bt_result=mysqli_query($connection,$batch_in_stock_sql);
                $resutttt=mysqli_fetch_assoc($res_bt_result);
                $insert_sock = "INSERT INTO `stock_tbl`(`stock_id`, `stock_location`, `pro_id`, `batch_id`, `stock_qty`, `update_date`) VALUES (
                        0,
                        '$locatoin',
                        '$pro_id',
                        '$resutttt[batch_no]',
                        '$qty',
                        'date')";
                $if_result = mysqli_query($connection, $insert_sock);
            } else {
                $old_qty = 0;
                $old_qty = $datass['stock_qty'] + $qty;
                $update_sql = "UPDATE `stock_tbl` SET `stock_qty`='$old_qty' WHERE `stock_id`='$datass[stock_id]'";
                $if_result_one = mysqli_query($connection, $update_sql);
            }
        }

    }
    $response_array['status'] = 'success';
    echo json_encode($response_array);
} else {
    $response_array['status'] = 'error';
    echo json_encode($response_array);
}


?>
