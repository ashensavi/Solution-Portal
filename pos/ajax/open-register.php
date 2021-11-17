<?php
    include('../db/dbConnection.php');

    session_start();

    $data = (array) $_POST['data'];

    $regPrice = $data['regPrice'];
    $closePrice = 0.0;

    $date = date("m/d/Y");
    date_default_timezone_set("Asia/Colombo");
    $time = date("h:i:sa");
    $user = $_SESSION['user_id'];

    mysqli_autocommit($connection, false);

    $query1 = "INSERT INTO register_table(`reg_id`, `reg_user_id`, `open_time`, `close_time`, `reg_status`, `open_price`, `cloce_price`,`regNote`,`cash_out`)VALUES(
                        '',
                        '$user',
                        now(),
                        '',
                        0,
                        '$regPrice',
                        '',
                        '',
                        0)";

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