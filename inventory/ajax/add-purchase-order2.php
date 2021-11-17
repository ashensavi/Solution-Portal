<?php include "../db/dbConnection.php" ?>
<?php
$data = (array)$_POST['data'];
$user_id = $_GET['user_id'];
$supplier_id = $data['suplierId'];
$location = $data['location'];

$date = $data['date'];

$insert_po_sql = "INSERT INTO `po_tbl`(`po_id`, `user_id`, `supplier_id`, `location`, `status`, `date`) VALUES (
0,
'$user_id',
'$supplier_id',
'$location',
'1',
'$date')";

$last_id =0;

if (mysqli_query($connection, $insert_po_sql) == true) {

    $last_id = mysqli_insert_id($connection);
    for ($i = 0; $i < count($data['proObj']); $i++) {
        $pro_id = $data['proObj'][$i]['id'];
        $pro_name = $data['proObj'][$i]['proName'];
        $cost_prise = $data['proObj'][$i]['cost_prise'];
        $sell_prise = $data['proObj'][$i]['selling_price'];
        $pro_qty = $data['proObj'][$i]['qty'];
//        $pro_desc = $data['proObj'][$i]['desc'];
        $pro_code = $data['proObj'][$i]['code'];
        $po_id = $last_id;
        $status = '1';


        $insert_po_details = "INSERT INTO `po_details_tbl` (`po_order_de_id`, `pro_name`, `pro_qty`, `cost_prise`, `sell_prise`, `status`, `po_id`, `pro_id`) VALUES (
            '0',
            '$pro_name',
            '$pro_qty',
            '$cost_prise',
            '$sell_prise',
            '$status',
            '$po_id',
            '$pro_id')  ";
        mysqli_query($connection,$insert_po_details);

    }
    $response_array['status'] = 'success';
    $response_array['id'] = $last_id;
    echo json_encode($response_array);
}else{
    $response_array['status'] = 'error';
    echo json_encode($response_array);
}
?>
