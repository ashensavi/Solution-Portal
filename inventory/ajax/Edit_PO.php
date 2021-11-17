<?php include "../db/dbConnection.php" ?>
<?php
session_start();
$data = (array)$_POST['data'];
$user_id = $_SESSION['user_id'];
$poID=$data['po_id'];
//print_r($data);

$sql = "UPDATE po_tbl SET
                            supplier_id='$data[suplierId]',
                            location='$data[location]',
                            date='$data[date]'
                            WHERE 
                            po_id=$data[po_id]";
mysqli_query($connection,$sql);


$finsResult="SELECT *FROM po_details_tbl WHERE po_id=$data[po_id]";
$resultSet=mysqli_query($connection,$finsResult);
while ($dataRow=mysqli_fetch_assoc($resultSet)){
        $deletSql="DELETE FROM po_details_tbl WHERE po_order_de_id=$dataRow[po_order_de_id]";
        mysqli_query($connection,$deletSql);

}

for ($i = 0; $i < count($data['proObj']); $i++) {
    $pro_id = $data['proObj'][$i]['id'];
    $code = $data['proObj'][$i]['code'];
    $proName = $data['proObj'][$i]['proName'];
    $cost_prise = $data['proObj'][$i]['cost_prise'];
    $selling_price = $data['proObj'][$i]['selling_price'];
    $qty = $data['proObj'][$i]['qty'];
    $desc = $data['proObj'][$i]['desc'];


    $insert_po_details = "INSERT INTO `po_details_tbl`  (`po_order_de_id`, `pro_name`, `pro_qty`, `cost_prise`, `sell_prise`, `status`, `po_id`, `pro_id`) VALUES (
             0,
             '$proName',
             '$qty',
             '$cost_prise',
             '$selling_price',
             '1',
             '$poID',
             '$pro_id')";
    mysqli_query($connection,$insert_po_details);

}

     $response_array['status'] = 'success';
    $response_array['id'] = $poID;
     echo json_encode($response_array);



// $date = $data['date'];

// $insert_po_sql = "UPDATE `po_tbl` SET (`po_id`, `user_id`, `supplier_id`, `location`, `status`, `date`) VALUES (
// 0,
// '$user_id',
// '$supplier_id',
// '$location',
// '1',
// '$date') Where po_id = '$user_id'";

// $last_id =0;

// if (mysqli_query($connection, $insert_po_sql) == true) {

//     $last_id = mysqli_insert_id($connection);
//     for ($i = 0; $i < count($data['proObj']); $i++) {
//         $pro_id = $data['proObj'][$i]['id'];
//         $pro_name = $data['proObj'][$i]['proName'];
//         $cost_prise = $data['proObj'][$i]['cost_prise'];
//         $sell_prise = $data['proObj'][$i]['selling_price'];
//         $pro_qty = $data['proObj'][$i]['qty'];
// //        $pro_desc = $data['proObj'][$i]['desc'];
//         $pro_code = $data['proObj'][$i]['code'];
//         $po_id = $last_id;
//         $status = '1';
//
//
//         $insert_po_details = "UPDATE `po_details_tbl` SET (`po_order_de_id`, `pro_name`, `pro_qty`, `cost_prise`, `sell_prise`, `status`, `po_id`, `pro_id`) VALUES (
//             '0',
//             '$pro_name',
//             '$pro_qty',
//             '$cost_prise',
//             '$sell_prise',
//             '$status',
//             '$po_id',
//             '$pro_id') WHERE po_id = '$user_id' ";
//         mysqli_query($connection,$insert_po_details);
//
//     }
//     $response_array['status'] = 'success';
//     $response_array['id'] = $last_id;
//     echo json_encode($response_array);
// }else{
//     $response_array['status'] = 'error';
//     echo json_encode($response_array);
// }
?>
