<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();

    $data = (array) $_POST['data'];

    $grnNum = $data['grnNum'];
    $receveDate = $data['receveDate'];
    $supplier = $data['supplier'];
    $locatoin = $data['locatoin'];
    $invNo = $data['invNo'];
    $dueDate = $data['dueDate'];
    $grnValue = $data['grnValue'];
    $overrallDisc = $data['overrallDisc'];
    $netValue = $data['netValue'];
    $invoiceValue = $data['invoiceValue'];


    $date = date("m/d/Y");
    $user = $_SESSION['user_id'];
    $stack = array();

    mysqli_autocommit($connection, false);

    $select9="SELECT MAX(grn_id) AS max_id FROM grn_tbl";
    $result9= mysqli_query($connection,$select9);
    $dataRow9=mysqli_fetch_array($result9);
    $dataRow9 = ++$dataRow9['max_id'];
    $grnId = $dataRow9;

    $query1 = "INSERT INTO grn_tbl(`grn_id`,`grn_num`,`grn_received`,`grn_suppid`,`grn_locid`,`grn_com_no`,`grn_due_on`,`grn_value`,`grn_disc`,`net_value`,`invoice_value`,`added_user`,`added_date`)VALUES(
        '$grnId',
        '$grnNum',
        '$receveDate',
        '$supplier',
        '$locatoin',
        '$invNo',
        '$dueDate',
        '$grnValue',
        '$overrallDisc',
        '$netValue',
        '$invoiceValue',
        '$user',
        '$date')";

    $result1 = mysqli_query($connection, $query1);

    if ($result1) {
        for ($x = 0; $x < count($data['proObj']); $x++) {

            $proid = $data['proObj'][$x]['id'];
            $prounit = $data['proObj'][$x]['unit'];
            $proqty = $data['proObj'][$x]['qty'];
            $procost = $data['proObj'][$x]['cost'];
            $proprice = $data['proObj'][$x]['price'];
            $proexDate = $data['proObj'][$x]['exdate'];
            $prodiscount = $data['proObj'][$x]['discount'];
            $profreeQty = $data['proObj'][$x]['freeqty'];
            $prototalQty = $data['proObj'][$x]['totalQty'];

            $query2 = "INSERT INTO grndetail_tbl(`detail_id`,`grnPro_id`,`unit`,`qty`,`cost`,`price`,`exDate`,`discount`,`freeQty`,`grn_num`)VALUES(
                '',
                '$proid',
                '$prounit',
                '$proqty',
                '$procost',
                '$proprice',
                '$proexDate',
                '$prodiscount',
                '$profreeQty',
                '$grnId')";

            $result2 = mysqli_query($connection, $query2);

            if ($result2) {
                $select="SELECT MAX(batch_id) AS max_id FROM batch_tbl";
                $result= mysqli_query($connection,$select);
                $dataRow=mysqli_fetch_array($result);
                $dataRow = ++$dataRow['max_id'];
                $newBatch = '0000'.(string)$dataRow;

                $sql = mysqli_query($connection,"SELECT * FROM batch_tbl WHERE batch_location = '$locatoin' AND pro_id = '$proid'");
                $row = mysqli_fetch_array($sql);
                array_push($stack,$row);
				
                if (count($row) == 0) {

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
                        '$locatoin')";

                    $result3 = mysqli_query($connection, $query3);
                    if ($result3) {
                        $query4 = "INSERT INTO stock_tbl(`stock_id`,`stock_location`,`pro_id`,`batch_id`,`stock_qty`,`update_date`)VALUES(
                            '',
                            '$locatoin',
                            '$proid',
                            '$newBatch',
                            '$prototalQty',
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
                }else {
                    $sql1 = mysqli_query($connection,"SELECT * FROM batch_tbl WHERE batch_location = '$locatoin' AND pro_id = '$proid'");
                    $row2 = mysqli_fetch_array($sql1);
                    $productArr = array();
                    array_push($productArr,$row2);

                    $added_status = true ;

                    for ($y = 0; $y < count($productArr); $y++) {

                        $batchId = $productArr[$y]['batch_id'];
                        $stockQty = 0;

                        if ($productArr[$y]['price'] == $proprice){
                            $sql5 = mysqli_query($connection,"SELECT * FROM stock_tbl WHERE batch_id = '$batchId'");
                            $row1 = mysqli_num_rows($sql5);
                            while ($row1 = mysqli_fetch_array($sql5)){
                                $stockQty = $row1['stock_qty'];
                            }
                                
                            $newStock = $stockQty + $prototalQty;

                            $query5 = "UPDATE stock_tbl SET 
                            stock_qty='$newStock',
                            update_date='$date' 
                            WHERE batch_id='$batchId'";

                            $added_status = false ;

                            $result5 = mysqli_query($connection, $query5);
                            
                            if (!$result5) {
                                mysqli_rollback($connection);
                                $response_array['status'] = 'error';
                                echo json_encode($response_array);
                            }
                        }
                    }

                    if ($added_status) {
                        $select="SELECT MAX(batch_id) AS max_id FROM batch_tbl";
                        $result= mysqli_query($connection,$select);
                        $dataRow=mysqli_fetch_array($result);
                        $dataRow = ++$dataRow['max_id'];
                        $newBatch = '0000'.(string)$dataRow;

                        $sql = mysqli_query($connection,"SELECT * FROM batch_tbl WHERE batch_location = '$locatoin' AND pro_id = '$proid'");
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
                            '$locatoin')";
    
                        $result3 = mysqli_query($connection, $query3);
                        if ($result3) {
                            $query4 = "INSERT INTO stock_tbl(`stock_id`,`stock_location`,`pro_id`,`batch_id`,`stock_qty`,`update_date`)VALUES(
                                '',
                                '$locatoin',
                                '$proid',
                                '$newBatch',
                                '$prototalQty',
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
            }else {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
            }
        }
        mysqli_commit($connection);
        // echo json_encode($data);
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?>