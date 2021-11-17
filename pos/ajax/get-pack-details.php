<?php
include('../db/dbConnection.php');
session_start();
?>

<?php
        // $id = $_GET['id'];
        // $stock_array = array();
        // $status=true;

        // $query1 = "SELECT * FROM pack_tbl,packdetail_tbl WHERE pack_tbl.pack_id= $id AND packdetail_tbl.packRef_id = pack_tbl.pack_id";
        // $result1 = mysqli_query($connection,$query1);

        // while($row1 = mysqli_fetch_array($result1)){
        //     $query = "SELECT * FROM stock_tbl,products_tbl,batch_tbl WHERE stock_tbl.stock_id = $row1[packDetStock] AND products_tbl.pro_id = stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id";
        //     $result = mysqli_query($connection,$query);

        //     while($row = mysqli_fetch_array($result)){
        //         if ($row['stock_qty'] >= $row1['packQty']) {
        //             $pro_array = array();
        //             $pro_array['proName'] = $row['pro_name'];
        //             $pro_array['code'] = $row['pro_code'];
        //             $pro_array['price'] = $row['price'];
        //             $pro_array['qty'] = $row1['packQty'];
        //             $pro_array['stockQty'] = $row['stock_qty'];
        //             $pro_array['id'] = $row['stock_id'];
        //             array_push($stock_array,$pro_array);
        //         } else {
        //             $status=false;
        //             $response_array['status'] = 'error';
        //             $response_array['msg'] = $row['pro_name']."is not in stock please check !";
        //             echo json_encode($response_array);
        //             break;
        //         }
                
        //     }
        //     if ($status == false) {
        //         break;
        //     }
        // }

        // if ($status == true) {
        //     $response_array['status'] = 'success';
        //     $response_array['stock'] = $stock_array;
        //     echo json_encode($response_array);
        // }
        $id = $_GET['id'];
        $stock_array = array();
        $status=true;

        $query1 = "SELECT * FROM pack_tbl,packdetail_tbl WHERE pack_tbl.pack_id= $id AND packdetail_tbl.packRef_id = pack_tbl.pack_id AND packdetail_tbl.pack_loc = $_SESSION[user_loc]";
        $result1 = mysqli_query($connection,$query1);

        while($row1 = mysqli_fetch_array($result1)){
            $query = "SELECT * FROM stock_tbl,products_tbl,batch_tbl WHERE stock_tbl.stock_id = $row1[packDetStock] AND products_tbl.pro_id = stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id";
            $result = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($result)) {
                $proStatus=1;
                if ($row['stock_qty'] < $row1['packQty']) {
                    $proStatus=0;
                }else{
                    $proStatus=1;
                }
                    $pro_array = array();
                    $pro_array['proName'] = $row['pro_name'];
                    $pro_array['code'] = $row['pro_code'];
                    $pro_array['price'] = $row['price'];
                    $pro_array['qty'] = $row1['packQty'];
                    $pro_array['stockQty'] = $row['stock_qty'];
                    $pro_array['id'] = $row['stock_id'];
                    $pro_array['proStatus'] = $proStatus;
                    array_push($stock_array,$pro_array);
//                } else {
//                    $status=false;
//                    $response_array['status'] = 'error';
//                    $response_array['msg'] = $row['pro_name']." is not in stock please check !";
//                    echo json_encode($response_array);
//                    break;
//                }
                
            }
            if ($status == false) {
                break;
            }
        }

        if ($status == true) {
            $response_array['status'] = 'success';
            $response_array['stock'] = $stock_array;
            echo json_encode($response_array);
        }
        
?>