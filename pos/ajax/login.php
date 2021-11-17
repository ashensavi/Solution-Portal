<?php 
include('../db/dbConnection.php');
session_start();

$data = (array) $_POST['data'];

$email = $mysqli->escape_string($data['email']);
$password =$data['password'];

$result = $mysqli->query("SELECT * FROM  user_tbl WHERE user_name='$email'");

if ( $result->num_rows == 0 ){ // User exist
    $status= 1;
  
}else { // User doesn't exist
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['user_pwd']) ){

        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_loc'] = $user['user_loc'];
        $_SESSION["loggedIn"] = true;

        $_SESSION['pos_pos'] = $user['pos_pos'];
        $_SESSION['pos_customer'] = $user['pos_customer'];
        $_SESSION['pos_bill_sett'] = $user['pos_bill_sett'];
        $_SESSION['pos_day_sales'] = $user['pos_day_sales'];
        $_SESSION['pos_curr_month_sales'] = $user['pos_curr_month_sales'];
        $_SESSION['pos_last_month_sale'] = $user['pos_last_month_sale'];
        $_SESSION['pos_dispose_pro'] = $user['pos_dispose_pro'];
        $_SESSION['pos_damage_stock'] = $user['pos_damage_stock'];
        $_SESSION['pos_reorder_stock'] = $user['pos_reorder_stock'];
        $_SESSION['pos_verify_pro_transfer'] = $user['pos_verify_pro_transfer'];
        $_SESSION['pos_pro_exchange'] = $user['pos_pro_exchange'];
        $_SESSION['pos_stock_rep'] = $user['pos_stock_rep'];
        $_SESSION['pos_reo_pro_rep'] = $user['pos_reo_pro_rep'];
        $_SESSION['pos_pro_rep'] = $user['pos_pro_rep'];
        $_SESSION['pos_sales_rep'] = $user['pos_sales_rep'];
        $_SESSION['pos_damage_pro_rep'] = $user['pos_damage_pro_rep'];
        $_SESSION['pos_exp_pro_rep'] = $user['pos_exp_pro_rep'];
        $_SESSION['pos_disposal_rep'] = $user['pos_disposal_rep'];
        $_SESSION['pos_not_moving_item_rep'] = $user['pos_not_moving_item_rep'];
        $_SESSION['pos_cashier_reg_rep'] = $user['pos_cashier_reg_rep'];
        
        $status= 3;

    }else {
        $status= 2;
    }
}

$response_array['status'] = $status;
echo json_encode($response_array);

?>