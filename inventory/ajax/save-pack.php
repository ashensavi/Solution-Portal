<?php
    include('../db/dbConnection.php');

    $data = (array) $_POST['data'];

    $packGrade = $data['grade'];
    $packLocation = $data['location'];

    mysqli_autocommit($connection, false);

    $addedData = true;

    
    for ($x = 0; $x < count($data['proObj']); $x++) {
    
        $stockId = $data['proObj'][$x]['id'];
        $totQty = $data['proObj'][$x]['totQty'];
    
        $query2 = "INSERT INTO packdetail_tbl(`packDetail_id`,`packRef_id`,`packDetStock`,`packQty`,`pack_loc`)VALUES(
                0,
                $packGrade,
                $stockId,
                $totQty,
                $packLocation)";
    
        $result2 = mysqli_query($connection, $query2);
    
        if (!$result2) {
            mysqli_rollback($connection);
            $response_array['status'] = 'error';
            echo json_encode($response_array);
            $addedData = false;
            break;
        }
    }

    if ($addedData) {
        mysqli_commit($connection);
        $response_array['status'] = 'success';
        echo json_encode($response_array);  
    }
?>