<?php
    include('../db/dbConnection.php');
?>
<?php

    $data = (array) $_POST['data'];

    $pos_pos = $data['pos_pos'];
    $pos_customer = $data['pos_customer'];
    $pos_bill_sett = $data['pos_bill_sett'];
    $pos_day_sales = $data['pos_day_sales'];
    $pos_curr_month_sales = $data['pos_curr_month_sales'];
    $pos_last_month_sale = $data['pos_last_month_sale'];
    $pos_dispose_pro = $data['pos_dispose_pro'];
    $pos_damage_stock = $data['pos_damage_stock'];
    $pos_reorder_stock = $data['pos_reorder_stock'];
    $pos_verify_pro_transfer = $data['pos_verify_pro_transfer'];
    $pos_pro_exchange = $data['pos_pro_exchange'];
    $pos_stock_rep = $data['pos_stock_rep'];
    $pos_reo_pro_rep = $data['pos_reo_pro_rep'];
    $pos_pro_rep = $data['pos_pro_rep'];
    $pos_sales_rep = $data['pos_sales_rep'];
    $pos_damage_pro_rep = $data['pos_damage_pro_rep'];
    $pos_exp_pro_rep = $data['pos_exp_pro_rep'];
    $pos_disposal_rep = $data['pos_disposal_rep'];
    $pos_not_moving_item_rep = $data['pos_not_moving_item_rep'];
    $pos_cashier_reg_rep = $data['pos_cashier_reg_rep'];
    $user_id = $data['user_id'];

    mysqli_autocommit($connection, false);

    $query1 = "UPDATE user_tbl SET 
                    pos_pos='$pos_pos',
                    pos_customer='$pos_customer',
                    pos_bill_sett='$pos_bill_sett',
                    pos_day_sales='$pos_day_sales',
                    pos_curr_month_sales='$pos_curr_month_sales',
                    pos_last_month_sale='$pos_last_month_sale',
                    pos_dispose_pro='$pos_dispose_pro',
                    pos_damage_stock='$pos_damage_stock',
                    pos_reorder_stock='$pos_reorder_stock',
                    pos_verify_pro_transfer='$pos_verify_pro_transfer',
                    pos_pro_exchange='$pos_pro_exchange',
                    pos_stock_rep='$pos_stock_rep',
                    pos_reo_pro_rep='$pos_reo_pro_rep',
                    pos_pro_rep='$pos_pro_rep',
                    pos_sales_rep='$pos_sales_rep',
                    pos_damage_pro_rep='$pos_damage_pro_rep',
                    pos_exp_pro_rep='$pos_exp_pro_rep',
                    pos_disposal_rep='$pos_disposal_rep',
                    pos_not_moving_item_rep='$pos_not_moving_item_rep',
                    pos_cashier_reg_rep='$pos_cashier_reg_rep'
                    WHERE 
                    user_id='$user_id'";

    $result1 = mysqli_query($connection, $query1);

    if ($result1) {
        mysqli_commit($connection);
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?>