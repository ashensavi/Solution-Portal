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
    $poSucces = true;

    mysqli_autocommit($connection, false);

    $select9="SELECT MAX(po_id) AS max_id FROM po_tbl";
    $result9= mysqli_query($connection,$select9);
    $dataRow9=mysqli_fetch_array($result9);
    $dataRow9 = ++$dataRow9['max_id'];
    $grnId = $dataRow9;

    $query1 = "INSERT INTO po_tbl(`po_id`,`po_num`,`po_supId`,`po_loc`,`po_value`,`added_user`,`added_date`,`date`)VALUES(
        '$grnId',
        '$grnNum',
        '$supplier',
        '$locatoin',
        '$invoiceValue',
        '$user',
        '$date',
        '$receveDate')";

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

            $query2 = "INSERT INTO podetail_tbl(`podetail_id`,`po_forid`,`poPro_id`,`po_unit`,`po_qty`,`po_cost`)VALUES(
                '',
                '$grnId',
                '$proid',
                '$prounit',
                '$proqty',
                '$procost')";

            $result2 = mysqli_query($connection, $query2);

            if (!$result2) {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
                $poSucces = false;
                break;
            }
        }
        if($poSucces){
            mysqli_commit($connection);
            $response_array['status'] = 'success';
            $response_array['poId'] = $grnId;
            echo json_encode($response_array);
        }
    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?>