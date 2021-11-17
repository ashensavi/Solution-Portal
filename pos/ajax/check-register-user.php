<?php
    include('../db/dbConnection.php');

    session_start();
    $user = $_SESSION['user_id'];

    $result = $mysqli->query("SELECT * FROM register_table WHERE reg_user_id='$user' AND reg_status = 0") or die($mysqli->error());

    if ( $result->num_rows > 0 ) { 
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }
    else{
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
?> 