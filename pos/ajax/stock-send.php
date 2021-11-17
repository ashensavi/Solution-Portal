<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();
    $data = (array) $_POST['data'];

    $date = date("m/d/Y");
    date_default_timezone_set("Asia/Colombo");
    $time = date("h:i:sa");
    $user = $_SESSION['user_id'];

    $location = $data['locationId'];

    $select="SELECT MAX(main_tra_id) AS max_id FROM main_transfer_tbl";
    $result= mysqli_query($connection,$select);
    $dataRow=mysqli_fetch_array($result);
    $dataRow = ++$dataRow['max_id'];

    $query1 = "INSERT INTO main_transfer_tbl(`main_tra_id`,`added_user`,`transfer_date`,`trans_loc`,`accept`,`special_note`)VALUES('$dataRow','$user',NOW(),'$location',0,'')";

        $result1 = mysqli_query($connection, $query1);
        if ($result1) {
            $success = true;
            for ($x = 0; $x < count($data['proObj']); $x++) {
        
                $stockId = $data['proObj'][$x]['id'];
                $totQty = $data['proObj'][$x]['totQty'];
        
                $query2 = "INSERT INTO stock_transfer_tbl(`transfer_id`,`trans_stock_id`,`transfer_qty`,`main_trans_id`)VALUES('','$stockId','$totQty','$dataRow')";
        
                $result2 = mysqli_query($connection, $query2);
                if (!$result2) {
                    $success = false;
                    mysqli_rollback($connection);
                    $response_array['status'] = 'error';
                    echo json_encode($response_array);
                    break;
                }
            }
            if ($success) {
                mysqli_commit($connection);
                $response_array['status'] = 'success';
                echo json_encode($response_array);
            }
        }else {
            mysqli_rollback($connection);
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        }
?>