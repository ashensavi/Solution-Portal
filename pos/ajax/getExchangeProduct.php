<?php

include('../db/dbConnection.php');
session_start();
$data = (array)$_POST['data'];
$_METHOD_STATUS = $data['_METHOD_STATUS'];

date_default_timezone_set("Asia/Colombo");
$date = date("m/d/Y");
$time = date("h:i:sa");
$user = $_SESSION['user_id'];
$nowDateTime = date("Y-m-d H:i:s");

$output = "";
$dataSet = array();
if ($_METHOD_STATUS == "getItems") {
    $query = "SELECT *FROM pos_details_tbl INNER JOIN pos_tbl ON pos_details_tbl.pos_id = pos_tbl.pos_id INNER JOIN stock_tbl ON stock_tbl.stock_id = pos_details_tbl.stock_id INNER JOIN products_tbl ON products_tbl.pro_id = stock_tbl.pro_id WHERE pos_tbl.pos_id=$data[orderId]";


    $result = mysqli_query($connection, $query);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        array_push($dataSet, $row);
    }
    $response_array['status'] = 'success';
    $response_array['dataSet'] = $dataSet;
    echo json_encode($response_array);
}


if ($_METHOD_STATUS == "reAddItem") {
    $query = "UPDATE stock_tbl SET stock_qty=stock_qty+$data[qty] where stock_id=$data[stockId]";


    $result = mysqli_query($connection, $query);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        array_push($dataSet, $row);
    }
    $response_array['status'] = 'success';
    $response_array['dataSet'] = $query;
    echo json_encode($response_array);
}


if ($_METHOD_STATUS == "exChange") {
    for ($x = 0; $x < count($data['tableData']); $x++) {
        $stockId = $data['tableData'][$x]['STOCK_ID'];
        $stockQty = $data['tableData'][$x]['QTY'];

        $query = "Select *from pos_details_tbl where pos_id=$data[orderId] AND stock_id=$stockId";
        $result = mysqli_query($connection, $query);

        $dataRow = mysqli_fetch_assoc($result);
        $id = $dataRow['pos_det_id'];
        if (empty($id)) {
            $query1 = "UPDATE stock_tbl SET stock_qty=stock_qty-$stockQty where stock_id=$stockId";
            $result = mysqli_query($connection, $query1);
        }
    }
    $select="SELECT MAX(pos_id) AS max_id FROM pos_tbl";
    $result= mysqli_query($connection,$select);
    $dataRow=mysqli_fetch_array($result);
    $dataRow = ++$dataRow['max_id'];
    $refNo = '000'.(string)$dataRow;

    $quary2 = "Select *from pos_tbl where pos_id=$data[orderId]";
    $result2 = mysqli_query($connection,$quary2);


    while($dataRow=mysqli_fetch_assoc($result2)){
       $tptalPayAmount=$data['totWithDisc']-$data['currentTotal'];
        // if ($data['totWithDisc'] === $dataRow['amount']){
        //     $tptalPayAmount=0;
        // }else{
        //     $tptalPayAmount=$data['totWithDisc']-$dataRow['amount'];
        // }

        $sql2="INSERT INTO pos_tbl (
`pos_id`,
`pos_date`,
`pos_time`,
`added_user`,
`customerId`,
`refNote`,
`proDesc`,
`amount`,
`payBy`,
`payNote`,
`secuCode`,
`cardNo`,
`holdName`,
`cardType`,
`month`,
`year`,
`cvv2`,
`cheqNo`,
`ref_code`,
`pro_disc`,
`bill_void`,
`exc_bill_id`,
`exc_bill_price`,
`checkRegDate`) VALUE (
                    0,
                    '$date',
                    '$time', 
                    $user,
                    $dataRow[customerId],
                    '$dataRow[refNote]',
                    '$dataRow[proDesc]',
                    $tptalPayAmount,
                    '$dataRow[payBy]',
                    '$dataRow[payNote]',
                    '$dataRow[secuCode]',
                    '$dataRow[cardNo]',
                    '$dataRow[holdName]',
                    '$dataRow[cardType]',
                    '$dataRow[month]',
                    '$dataRow[year]',
                    '$dataRow[cvv2]',
                    '$dataRow[cheqNo]',
                    '$refNo',
                    '$dataRow[pro_disc]',
                    '$dataRow[bill_void]',
                    '$dataRow[exc_bill_id]',
                    '$tptalPayAmount',
                    '$dataRow[checkRegDate]'
                 )";
        $posResult= mysqli_query($connection, $sql2);

        $insertId=mysqli_insert_id($connection);
    }
    if ($result2) {

        for ($x = 0; $x < count($data['tableData']); $x++) {
            $stockId = $data['tableData'][$x]['STOCK_ID'];
            $stockQty = $data['tableData'][$x]['QTY'];
            $query =

            $query = "Select *from pos_details_tbl where pos_id=$data[orderId] AND stock_id=$stockId";
            $result = mysqli_query($connection, $query);

            $dataRow = mysqli_fetch_assoc($result);
            $id = $dataRow['pos_det_id'];
            if (empty($id)) {
                $sql1 = "INSERT INTO pos_details_tbl (`pos_det_id`,`pos_id`,`stock_id`,`totQty`) VALUE (
                    0,
                    $insertId,
                    $stockId,
                    $stockQty
                    )";
                mysqli_query($connection, $sql1);
            }


        }
    }
    $response_array['status'] = 'success';
    $response_array['lastId'] = $insertId;
    echo json_encode($response_array);


}