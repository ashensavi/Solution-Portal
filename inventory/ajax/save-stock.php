<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();
    $location = $_SESSION['user_loc'];
    $user = $_SESSION['user_id'];

    $data = (array) $_POST['data'];

    $transferId = $data['transfer_id'];

    $date = date("m/d/Y");

    // mysqli_autocommit($connection, false);

    for ($y = 0; $y < count($data['localObj']); $y++) {

        $transfer_id = $data['localObj'][$y]['id'];

        // $response_array['status'] = $transfer_id;
        // echo json_encode($response_array);

        $sql = mysqli_query($connection, "SELECT * FROM stock_transfer_tbl,stock_tbl,batch_tbl WHERE stock_transfer_tbl.transfer_id = '$transfer_id' AND stock_tbl.stock_id = stock_transfer_tbl.trans_stock_id AND batch_tbl.batch_id = stock_tbl.batch_id");
        $res = mysqli_fetch_array($sql);

        $proTotalQty = $data['localObj'][$y]['qty'];

        $proid = $res['pro_id'];
        $transfer_qty = $res['transfer_qty'];
        $stock_qty = $res['stock_qty'];
        $proprice = $res['price'];
        $proexDate = $res['ex_date'];
        $procost = $res['cost'];

        $sql1="SELECT * FROM batch_tbl WHERE batch_location = '$location' AND pro_id = '$proid'";
		$result1 = mysqli_query($connection,$sql1);
		while($dataRow=mysqli_fetch_assoc($result1)){
            
            $batchId = $dataRow['batch_id'];
            $stockQty = 0;
            $added_status = true;

            if ($dataRow['price'] == $proprice){
                $sql5 = mysqli_query($connection,"SELECT * FROM stock_tbl WHERE batch_id = '$batchId'");
                $row1 = mysqli_num_rows($sql5);
                while ($row1 = mysqli_fetch_array($sql5)){
                    $stockQty = $row1['stock_qty'];
                }
                    
                $newStock = $stockQty + $proTotalQty;

                $query5 = "UPDATE stock_tbl SET 
                stock_qty='$newStock',
                update_date='$date'
                 WHERE 
                 batch_id='$batchId'";
                $result5 = mysqli_query($connection, $query5);

                $added_status = false ;
                
                if (!$result5) {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                }
            }

            if ($added_status) {
                $select="SELECT MAX(batch_id) AS max_id FROM batch_tbl";
                $result= mysqli_query($connection,$select);
                $dataRow=mysqli_fetch_array($result);
                $dataRow = ++$dataRow['max_id'];
                $newBatch = '0000'.(string)$dataRow;

                $sql = mysqli_query($connection,"SELECT * FROM batch_tbl WHERE batch_location = '$location' AND pro_id = '$proid'");
                $row = mysqli_fetch_array($sql);
                array_push($stack,$row);

                $query3 = "INSERT INTO batch_tbl(`batch_id`,`pro_id`,`batch_no`,`batch_date`,`ex_date`,`cost`,`price`,`user_id`,`added_date`,`batch_location`)VALUES(
                    '',
                    '$proid',
                    '$newBatch',
                    '$date',
                    '$proexDate',
                    '$procost',
                    '$proprice',
                    '$user',
                    '$date',
                    '$location')";

                $result3 = mysqli_query($connection, $query3);
                if ($result3) {
                    $query4 = "INSERT INTO stock_tbl(`stock_id`,`stock_location`,`pro_id`,`batch_id`,`stock_qty`,`update_date`)VALUES(
                        '',
                        '$location',
                        '$proid',
                        '$newBatch',
                        '$proTotalQty',
                        '$date')";

                    $result4 = mysqli_query($connection, $query4);
                    if (!$result4) {
                        mysqli_rollback($connection);
                        $response_array['status'] = 'error';
                        echo json_encode($response_array);
                    }
                }else {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                }
            }
        }
    }
    mysqli_commit($connection);
    $response_array['status'] = 'success';
    echo json_encode($response_array);
?>