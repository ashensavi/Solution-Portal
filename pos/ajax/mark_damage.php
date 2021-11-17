<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();

    $data = (array) $_POST['data'];

    $user = $_SESSION['user_id'];
    $date = date("m/d/Y");

    mysqli_autocommit($connection, false);

    $addedData = true;

    // $response_array['status'] = $data;
    //         echo json_encode($response_array);

    for ($x = 0; $x < count($data['proObj']); $x++) {
    
        $stockId = $data['proObj'][$x]['id'];
        $proCode = $data['proObj'][$x]['code'];
        $proName = $data['proObj'][$x]['proName'];
        $price = $data['proObj'][$x]['price'];
        $totQty = $data['proObj'][$x]['totQty'];

        $query2 = "INSERT INTO damage_tbl(`damage_id`,`damage_stock_id`,`damage_qty`,`added_user`,`damage_added_date`)VALUES(
            '',
            '$stockId',
            '$totQty',
            '$user',
            '$date')";

        $result2 = mysqli_query($connection, $query2);

        if (!$result2) {
            mysqli_rollback($connection);
            $response_array['status'] = 'error';
            echo json_encode($response_array);
            $addedData = false;
            break;
        }else {

            $query5 = "UPDATE stock_tbl SET 
            stock_qty = stock_qty - $totQty 
            WHERE 
            stock_id='$stockId'";

            $result5 = mysqli_query($connection, $query5);

            if (!$result5) {
                mysqli_rollback($connection);
                $response_array['status'] = 'error';
                echo json_encode($response_array);
                $addedData = false;
                break;
            }
        }
    }
    if ($addedData) {
        mysqli_commit($connection);
        $response_array['status'] = 'success';
        echo json_encode($response_array);  
    }
?>