<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();

    $data = (array) $_POST['data'];

    $customerId = $data['customerId'];
    $refNote = $data['refNote'];
    $proDesc = $data['proDesc'];
    $amount = $data['amount'];
    $payBy = $data['payBy'];
    $payNote = $data['payNote'];
    $secuCode = $data['secuCode'];
    $cardNo = $data['cardNo'];
    $holdName = $data['holdName'];
    $cardType = $data['cardType'];
    $month = $data['month'];
    $year = $data['year'];
    $cvv2 = $data['cvv2'];
    $cheqNo = $data['cheqNo'];
    $discount = $data['discount'];

    $date = date("m/d/Y");
    date_default_timezone_set("Asia/Colombo");
    $time = date("h:i:sa");
    $user = $_SESSION['user_id'];

    $select="SELECT MAX(pos_id) AS max_id FROM pos_tbl";
    $result= mysqli_query($connection,$select);
    $dataRow=mysqli_fetch_array($result);
    $dataRow = ++$dataRow['max_id'];
    $refNo = '0000'.(string)$dataRow;

    mysqli_autocommit($connection, false);

    $query1 = "INSERT INTO pos_tbl(`pos_id`,`pos_date`,`pos_time`,`added_user`,`customerId`,`refNote`,`proDesc`,`amount`,`payBy`,`payNote`,`secuCode`,`cardNo`,`holdName`,`cardType`,`month`,`year`,`cvv2`,`cheqNo`,`ref_code`,`pro_disc`)VALUES(
        '$dataRow',
        '$date',
        '$time',
        '$user',
        '$customerId',
        '$refNote',
        '$proDesc',
        '$amount',
        '$payBy',
        '$payNote',
        '$secuCode',
        '$cardNo',
        '$holdName',
        '$cardType',
        '$month',
        '$year',
        '$cvv2',
        '$cheqNo',
        '$refNo',
        '$discount')";

    $result1 = mysqli_query($connection, $query1);

    if ($result1) {
        for ($x = 0; $x < count($data['proObj']); $x++) {
        
            $stockId = $data['proObj'][$x]['id'];
            $proCode = $data['proObj'][$x]['code'];
            $proName = $data['proObj'][$x]['proName'];
            $price = $data['proObj'][$x]['price'];
            $totQty = $data['proObj'][$x]['totQty'];

            $query2 = "INSERT INTO pos_details_tbl(`pos_det_id`,`pos_id`,`stock_id`,`pro_code`,`pro_name`,`totQty`)VALUES(
                '',
                '$dataRow',
                '$stockId',
                '$proCode',
                '$proName',
                '$totQty')";

            $result2 = mysqli_query($connection, $query2);

            if (!$result2) {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
            }else {
                $sql5 = mysqli_query($connection,"SELECT * FROM stock_tbl WHERE stock_id = '$stockId'");
                $row1 = mysqli_num_rows($sql5);
                while ($row1 = mysqli_fetch_array($sql5)){
                    $stockQty = $row1['stock_qty'];
                }

                $newStock = $stockQty - $totQty;

                $query5 = "UPDATE stock_tbl SET 
                stock_qty='$newStock',
                update_date='$date' 
                WHERE 
                stock_id='$stockId'";

                $result5 = mysqli_query($connection, $query5);
                            
                if (!$result5) {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                }
            }
        }
        mysqli_commit($connection);
        $response_array['pos_id'] = $dataRow;
        $response_array['status'] = 'success';
        echo json_encode($response_array);

    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }

    // echo json_encode($data['proObj']);
    

    
?>