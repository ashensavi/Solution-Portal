<?php
include('../db/dbConnection.php');
$id=$_GET['id'];
?>

<?php
$sql = mysqli_query($connection,"SELECT * FROM products_tbl WHERE pro_name LIKE '$id%' ");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
    $id = $row['pro_id'];
    echo "<div class='col-4 '>
            <div class='card card-post card-round' style='background-color:#48AAF7; cursor:pointer;' onclick='viewDetail(".$id.")'>
                <img class='card-img-top' src='assets/img/productimg/".$row['pro_img']."'>
                <p style='text-align:center; color:white; margin-top:0px; margin-bottom:0px; height: 200px; '>".$row['pro_name']."</p>
                
            </div>
        </div>";
}
?>
