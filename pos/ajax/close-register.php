<?php
    include('../db/dbConnection.php');

    session_start();
    $user = $_SESSION['user_id'];

    $data = (array) $_POST['data'];

    $note = $data['note'];
    $total = $data['total'];

    $sql = mysqli_query($connection, "SELECT * FROM register_table WHERE reg_user_id = '$user' AND reg_status = 0");
    $res8 = mysqli_fetch_array($sql);

    
    if (!empty($res8['reg_user_id'])) {

        $id = $res8['reg_id'];

        $query5 = "UPDATE register_table SET close_time = now(),reg_status = 1,cloce_price='$total',regNote='$note' WHERE reg_id='$id'";

        $result5 = mysqli_query($connection, $query5);
                    
        if ($result5) {
            $response_array['status'] = 'success';
            $response_array['status_id'] = $id;
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