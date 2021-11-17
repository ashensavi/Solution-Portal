<?php
include('../db/dbConnection.php');
?>

<?php

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $return_arr = array();

        $query = "SELECT * FROM products_tbl WHERE pro_code = '$id'";
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($result)){
            $id = $row['pro_id'];
            $name = $row['pro_name'];
            $cost = $row['pro_cost'];
            $price = $row['pro_price'];

            $return_arr[] = array("id" => $id,
                            "name" => $name,
                            "cost" => $cost,
                            "price" => $price);
        }
        echo json_encode($return_arr);

    }else {
        $name = $_GET['name'];
        $return_arr = array();

        $query = "SELECT * FROM products_tbl WHERE pro_name = '$name'";
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($result)){
            $id = $row['pro_id'];
            $code = $row['pro_code'];
            $cost = $row['pro_cost'];
            $price = $row['pro_price'];

            $return_arr[] = array("id" => $id,
                            "code" => $code,
                            "cost" => $cost,
                            "price" => $price);
        }
        echo json_encode($return_arr);
    }
    

?>