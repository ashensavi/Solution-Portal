<?php
    include('../db/dbConnection.php');

    session_start();
    $user = $_SESSION['user_id'];

    $data = (array) $_POST['data'];

    $cashout = $data['cashout'];

    $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = '$user' AND reg_status = 0");
    $res8 = mysqli_fetch_array($sql);

    
    if (!empty($res8['reg_user_id'])) {

        $id = $res8['reg_id'];

        $query5 = "UPDATE register_table SET cash_out = cash_out + $cashout WHERE reg_id='$id'";

        $result5 = mysqli_query($connection, $query5);
                    
        if ($result5) {
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        } else {
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        }
    } else {
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?> 