<?php
    include('../db/dbConnection.php');

    session_start();

    $data = (array) $_POST['data'];

    $billId = $data['billId'];

    $sql8 = mysqli_query($connection, "SELECT * FROM pos_tbl WHERE pos_id = '$billId'");
    $res8 = mysqli_fetch_array($sql8);
    $voided = $res8['bill_void'];

    if ($voided == 0) {
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    } else {
        $response_array['status'] = 'error';
        $response_array['msg'] = 'This is voided bill';
        echo json_encode($response_array);
    }
?>