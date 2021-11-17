<?php
    include('../db/dbConnection.php');

    session_start();

    $data = (array) $_POST['data'];

    $billId = $data['billId'];
    $managerPwd = $data['managerPwd'];

    $ifSuccess = true;

    $date = date("m/d/Y");
    $user = $_SESSION['user_id'];

    mysqli_autocommit($connection, false);

    $sql8 = mysqli_query($connection, "SELECT * FROM user_tbl WHERE user_pwd = '$managerPwd'");
    $res8 = mysqli_fetch_array($sql8);
    $userType = $res8['user_type'];

    if (empty($userType)) {

        mysqli_rollback($connection);
        $response_array['status'] = 'errorUser';
        $response_array['msg'] = 'Wrong Password, Please check.';
        echo json_encode($response_array);

    } else{
        if ($userType == "admin" || $userType == "super admin") {
            
            $query1 = "INSERT INTO void_tbl(`void_id`,`void_bill`,`void_user`,`void_date`)VALUES('','$billId',$user,'$date')";
            $result1 = mysqli_query($connection, $query1);

            if ($result1) {
                $query5 = "UPDATE pos_tbl SET bill_void = 1 WHERE pos_id='$billId'";
                $result5 = mysqli_query($connection, $query5);

                if ($result5) {

                    $sql5 = mysqli_query($connection,"SELECT * FROM pos_details_tbl WHERE pos_id = '$billId'");
                    $row1 = mysqli_num_rows($sql5);
                    while ($row1 = mysqli_fetch_array($sql5)){
                        $stockId = $row1['stock_id'];
                        $stockQty = $row1['totQty'];

                        $query5 = "UPDATE stock_tbl SET 
                        stock_qty = stock_qty + $stockQty,
                        update_date = $date 
                        WHERE 
                        stock_id = $stockId";
        
                        $result5 = mysqli_query($connection, $query5);
                                    
                        if (!$result5) {
                            mysqli_rollback($connection);
                            $response_array['status'] = 'error';
                            echo json_encode($response_array);
                            $ifSuccess = false;
                            break;
                        }
                    }
                    if ($ifSuccess) {
                        mysqli_commit($connection);
                        $response_array['status'] = 'success';
                        echo json_encode($response_array);
                    }
                } else {
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                }
            } else {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
            }
        } else {
            mysqli_rollback($connection);
            $response_array['status'] = 'errorUser';
            $response_array['msg'] = 'Wrong Password, Please check.';
            echo json_encode($response_array);
        }
    }

?>