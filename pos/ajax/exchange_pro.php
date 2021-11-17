<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();

    $data = (array) $_POST['data'];

    $billId = $data['billId'];
    $total = 0.0;
    $ifSuccess = true;

    $date = date("m/d/Y");
    $user = $_SESSION['user_id'];

    $select="SELECT MAX(exchange_id) AS max_id FROM exchange_tbl";
    $result= mysqli_query($connection,$select);
    $dataRow=mysqli_fetch_array($result);
    $dataRow = ++$dataRow['max_id'];

    $sql8 = mysqli_query($connection, "SELECT * FROM pos_tbl WHERE pos_id = '$billId'");
    $res8 = mysqli_fetch_array($sql8);
    $discount = $res8['pro_disc'];

    for ($x = 0; $x < count($data['proObj']); $x++) {
        $stockId = $data['proObj'][$x]['stockId'];
        $totQty = $data['proObj'][$x]['totQty'];

        $sql = mysqli_query($connection, "SELECT * FROM stock_tbl,batch_tbl WHERE stock_tbl.stock_id = '$stockId' AND batch_tbl.batch_id = stock_tbl.batch_id");
        $res = mysqli_fetch_array($sql);
        $sellPrice = $res['price'];

        $total += $sellPrice * $totQty;
    }

    $total = $total - ($total*$discount / 100);

    mysqli_autocommit($connection, false);

    $query1 = "INSERT INTO exchange_tbl(`exchange_id`,`exchange_date`,`exchange_user`,`exchange_price`,`exchanged`,`exchange_bill`)VALUES('$dataRow','$date','$user','$total',0,'$billId')";

    $result1 = mysqli_query($connection, $query1);

    if ($result1) {
        for ($x = 0; $x < count($data['proObj']); $x++) {

            $id = $data['proObj'][$x]['id'];
            $code = $data['proObj'][$x]['code'];
            $proName = $data['proObj'][$x]['proName'];
            $stockId = $data['proObj'][$x]['stockId'];
            $qty = $data['proObj'][$x]['qty'];
            $totQty = $data['proObj'][$x]['totQty'];

            $query2 = "INSERT INTO exchangedetaol_tbl(`exDetail_id`,`exDetail_detailId`,`exDetail_stockId`,`exDetail_proName`,`exDetail_proCode`,`exDetail_qty`,`exchange_refId`)VALUES(
                    '',
                    '$id',
                    '$stockId',
                    '$proName',
                    '$code',
                    '$totQty',
                    '$dataRow')";

            $result2 = mysqli_query($connection, $query2);

            if (!$result2) {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
                $ifSuccess = false;
                break;
            }else {

                $query5 = "UPDATE stock_tbl SET 
                stock_qty = stock_qty - $totQty,
                update_date = '$date' 
                WHERE 
                stock_id='$stockId'";

                $result5 = mysqli_query($connection, $query5);

                if (!$result5) {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                    $ifSuccess = false;
                    break;
                }
            }
        }

        if ($ifSuccess) {
            mysqli_commit($connection);
            $response_array['bill_id'] = $dataRow;
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        } else {
            mysqli_rollback($connection);
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        }
    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?>