<?php
include('../db/dbConnection.php');
?>

<?php
        $id = $_GET['id'];
        $return_arr = array();

        $query = "SELECT * FROM stock_tbl,products_tbl,batch_tbl WHERE stock_tbl.stock_id = '$id' AND products_tbl.pro_id = stock_tbl.pro_id AND batch_tbl.batch_id = stock_tbl.batch_id";
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($result)){
            $proName = $row['pro_name'];
            $price = $row['price'];
            $qty = $row['stock_qty'];
            $code = $row['pro_code'];

            $return_arr['proName'] = $proName;
            $return_arr['code'] = $code;
            $return_arr['price'] = $price;
            $return_arr['qty'] = $qty;
        }
        echo json_encode($return_arr);
?>