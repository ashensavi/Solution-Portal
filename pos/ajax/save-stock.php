<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();
    $location = $_SESSION['user_loc'];
    $user = $_SESSION['user_id'];

    $data = (array) $_POST['data'];

    $transferId = $data['transfer_id'];
    $special_note = $data['special_note'];

    $date = date("m/d/Y");

    // mysqli_autocommit($connection, false);

    for ($y = 0; $y < count($data['localObj']); $y++) {

        $transfer_id = $data['localObj'][$y]['id'];

        $sql = mysqli_query($connection, "SELECT * FROM stock_transfer_tbl,stock_tbl,batch_tbl WHERE stock_transfer_tbl.transfer_id = '$transfer_id' AND stock_tbl.stock_id = stock_transfer_tbl.trans_stock_id AND batch_tbl.batch_id = stock_tbl.batch_id");
        $res = mysqli_fetch_array($sql);

        $proTotalQty = $data['localObj'][$y]['qty'];

        $proid = $res['pro_id'];
        $transfer_qty = $res['transfer_qty'];
        $stock_qty = $res['stock_qty'];
        $proprice = $res['price'];
        $proexDate = $res['ex_date'];
        $procost = $res['cost'];

        $added_status = true;
        $succStatus= true;

        $sql1="SELECT * FROM batch_tbl WHERE batch_location = '$location' AND pro_id = '$proid'";
		$result1 = mysqli_query($connection,$sql1);
		while($dataRow=mysqli_fetch_assoc($result1)){
            
            $batchId = $dataRow['batch_id'];
            $stockQty = 0;

            if ($dataRow['price'] == $proprice){

                $query5 = "UPDATE stock_tbl SET 
                stock_qty= stock_qty + $proTotalQty,
                update_date='$date'
                 WHERE 
                 batch_id='$batchId'";
                $result5 = mysqli_query($connection, $query5);

                $added_status = false ;
                
                if (!$result5) {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                    $succStatus= false;
                    break;
                }
            }
        }
            if ($added_status) {
              

                $select="SELECT MAX(batch_id) AS max_id FROM batch_tbl";
                $result= mysqli_query($connection,$select);
                $dataRow=mysqli_fetch_array($result);
                $dataRow = ++$dataRow['max_id'];

                $sql = mysqli_query($connection,"SELECT * FROM batch_tbl WHERE batch_location = '$location' AND pro_id = '$proid'");
                $row = mysqli_fetch_array($sql);
                $response_array['data'] = 'working....';
                $query3 = "INSERT INTO batch_tbl(`batch_id`,`pro_id`,`batch_no`,`batch_date`,`ex_date`,`cost`,`price`,`user_id`,`added_date`,`batch_location`)VALUES(
                    '',
                    '$proid',
                    '$dataRow',
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
                        '$dataRow',
                        '$proTotalQty',
                        '$date')";

                    $result4 = mysqli_query($connection, $query4);
                    if (!$result4) {
                        mysqli_rollback($connection);
                        $response_array['status'] = 'error';
                        echo json_encode($response_array);
                        $succStatus= false;
                        break;
                    }
                }else {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                    $succStatus= false;
                    break;
                }
            }
    }

    if($succStatus){

        $sql="SELECT * FROM stock_transfer_tbl,stock_tbl,products_tbl,batch_tbl WHERE stock_transfer_tbl.main_trans_id = $data[id] AND stock_tbl.stock_id = stock_transfer_tbl.trans_stock_id AND products_tbl.pro_id = stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id";
        $result = mysqli_query($connection,$sql);
        while($dataRow=mysqli_fetch_assoc($result)){
            for ($y = 0; $y < count($data['localObj']); $y++) {
                $transfer_id = $data['localObj'][$y]['id'];
                $transfer_qty = $data['localObj'][$y]['qty'];

                if ($transfer_id == $dataRow['transfer_id']){

                    if (intval($dataRow['transfer_qty'])> intval($transfer_qty )) {
                        $itemReturnQty = intval($dataRow['transfer_qty']) - intval($transfer_qty );

                        $query5 = "UPDATE stock_tbl SET 
                                stock_qty= stock_qty + $itemReturnQty 
                                WHERE 
                                stock_location= 2";
                        $result5 = mysqli_query($connection, $query5);
                    }
                }
            }

        }

        $query9 = "UPDATE main_transfer_tbl SET
            accept = 1,
            special_note = '$special_note',
            view = 0
            WHERE
            main_tra_id='$transferId'";
        $result9 = mysqli_query($connection, $query9);

        if ($result9) {
            mysqli_commit($connection);
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        } else {
            mysqli_rollback($connection);
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        }
    }
?>