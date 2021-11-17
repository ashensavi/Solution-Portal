<?php
include('../db/dbConnection.php');
?>

<?php
$sql = mysqli_query($connection,"SELECT * FROM products_tbl");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
    $id = $row['pro_id'];
    echo "<div class='col-4 '>
            <div class='card card-post card-round' style='background-color:#48AAF7; cursor:pointer; height: 200px' onclick='viewDetail(".$id.")'>
       <!--         <img class='card-img-top' src='assets/img/productimg/".$row['pro_img']."'> -->
                <img class='card-img-top' src='assets/img/productimg/no img.jpg'>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px; height: 200px; '>".$row['pro_name']."</p>
                
            </div>
        </div>";
}
?>
