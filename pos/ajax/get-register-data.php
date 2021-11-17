<?php
    include('../db/dbConnection.php');

    session_start();
    $user = $_SESSION['user_id'];

    $totalAmount = 0.0;
    $excAmount = 0.0;

    $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = '$user' AND reg_status = 0");
    $res8 = mysqli_fetch_array($sql);

    
    if (!empty($res8['reg_user_id'])) {

        $openTime = $res8['open_time'];
        $opnPrice = $res8['open_price'];
        $cashOut = $res8['cash_out'];
        
        $sql2="SELECT * FROM pos_tbl WHERE added_user = '$user' AND bill_void = 0 AND checkRegDate BETWEEN '$openTime' AND now()";
        $result2 = mysqli_query($connection,$sql2);

        while($dataRow2=mysqli_fetch_assoc($result2)){
            
            $excAmount += $dataRow2['exc_bill_price'];
            $amount = 0.0;
            $discount = $dataRow2['pro_disc'];
            $posIds = $dataRow2['pos_id'];

            $sql3="SELECT * FROM pos_details_tbl,stock_tbl,batch_tbl WHERE pos_details_tbl.pos_id = '$posIds' AND stock_tbl.stock_id = pos_details_tbl.stock_id And batch_tbl.batch_id = stock_tbl.batch_id";
            $result3 = mysqli_query($connection,$sql3);

            while($dataRow3=mysqli_fetch_assoc($result3)){
                $amount += $dataRow3['totQty']*$dataRow3['price'];
            }
            $totalAmount += $amount - ($amount*$discount / 100);
            
        }
        $response_array['status'] = 'success';
        $response_array['opnTime'] = $openTime;
        $response_array['opnPrice'] = $opnPrice;
        $response_array['total'] = $totalAmount;
        $response_array['exeTotal'] = $excAmount;
        $response_array['cashOut'] = $cashOut;
        echo json_encode($response_array);
    } else {
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?> 