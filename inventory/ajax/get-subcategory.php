<?php
include('../db/dbConnection.php');
// include('db_conn.php');
$catid = $_GET['catid'];

?>


<?php
    $sql3 = mysqli_query($connection,"SELECT * FROM subcategory_tbl WHERE cate_id = '$catid'");
    $row3 = mysqli_num_rows($sql3);
    echo "<option value='' disabled selected hidden>Select One</option>";
    while ($row3 = mysqli_fetch_array($sql3)){
        echo "<option value='". $row3['subcate_id'] ."'>" .$row3['subcate_name'] ."</option>" ;
    }
?>