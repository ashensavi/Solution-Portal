<?php
include('../db/dbConnection.php');

$locationId=$_GET['locationId'];
date_default_timezone_set("Asia/Colombo");
$date1 = date("m/d/Y");
                                                                                        
$date = new DateTime($date1);
$from1=$date->format('m/d/Y');

$result = mysqli_query($connection,"SELECT * FROM pos_tbl,user_tbl WHERE bill_void=0 AND pos_date = '$from1' AND user_tbl.user_id = pos_tbl.added_user AND user_tbl.user_loc = '$locationId'");
// $result = mysqli_query($connection,$sql);

while($dataRow=mysqli_fetch_assoc($result)){

    // Start - Modification By Tharindu
    $tempCustId = $dataRow['customerId'];
    $sqlY = "SELECT * FROM customer_tbl WHERE cus_id=$tempCustId";
    $resultY = mysqli_query($connection, $sqlY);
    $custName = "";

    while ($dRow = mysqli_fetch_assoc($resultY)) {
        $custName = $dRow['cus_name'];
    }

    echo "<tr>";
    echo "<td >" . $dataRow['pos_date'] . "</td>";
    echo "<td >" . $dataRow['pos_time'] . "</td>";
    echo "<td >" . $custName . "</td>";
    echo "<td >" . $dataRow['refNote'] . "</td>";
    echo "<td >" . $dataRow['proDesc'] . "</td>";
    echo "<td >" . number_format($dataRow['amount'], 2) . "</td>";
    echo "<td >" . $dataRow['payBy'] . "</td>";
    echo "<td >" . $dataRow['payNote'] . "</td>";
    echo "<td >" . $dataRow['secuCode'] . "</td>";
    echo "<td >" . $dataRow['cardNo'] . "</td>";
    echo "<td >" . $dataRow['holdName'] . "</td>";
    echo "<td >" . $dataRow['cardType'] . "</td>";
    echo "<td >" . $dataRow['month'] . "</td>";
    echo "<td >" . $dataRow['year'] . "</td>";
    echo "<td >" . $dataRow['cvv2'] . "</td>";
    echo "<td >" . $dataRow['cheqNo'] . "</td>";
    echo "<td >" . $dataRow['ref_code'] . "</td>";
    echo "<td >" . number_format($dataRow['pro_disc'], 2) . "</td>";
    echo "<td ><button onclick='viewItemDetails(" . $dataRow['pos_id'] . "," . $dataRow['customerId'] . "," . number_format($dataRow['pro_disc'], 2) . ")' type='button' class='btn btn-primary btn-sm font-weight-bold'>View</button></td>";
    echo "</tr>";
    
    // End - Modification By Tharindu
   
}

?>