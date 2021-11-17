<?php
include('../db/dbConnection.php');

$data = (array) $_POST['data'];
$_STATUS=$data['Data_Status'];
if ($_STATUS == "getData"){
$sql="SELECT * FROM pack_tbl,packdetail_tbl,location_tbl,stock_tbl,batch_tbl,products_tbl WHERE pack_tbl.pack_id= $data[grade] AND packdetail_tbl.packRef_id = pack_tbl.pack_id AND packdetail_tbl.pack_loc = $data[location] AND stock_tbl.stock_id = packdetail_tbl.packDetStock AND batch_tbl.batch_id = stock_tbl.batch_id AND products_tbl.pro_id = batch_tbl.pro_id GROUP BY products_tbl.pro_id";
$result = mysqli_query($connection,$sql);
$dataArray = array();
while($dataRow=mysqli_fetch_assoc($result)){
array_push($dataArray,$dataRow);
}
$response_array['status'] = 'success';
$response_array['dataArray'] = $dataArray;
echo json_encode($response_array);
}

if ($_STATUS == "editData"){
    $sql="DELETE FROM packdetail_tbl WHERE packRef_id=$data[grade] AND pack_loc=$data[location]";
    $result = mysqli_query($connection,$sql);
    $grade=$data['grade'];
    $location=$data['location'];
    for ($i = 0; $i < count($data['proObj']); $i++) {
        $id = $data['proObj'][$i]['id'];
        $code = $data['proObj'][$i]['code'];
        $proName = $data['proObj'][$i]['proName'];
        $price = $data['proObj'][$i]['price'];
        $qty = $data['proObj'][$i]['qty'];
        $totQty = $data['proObj'][$i]['totQty'];

        $sql1="INSERT INTO packdetail_tbl(`packDetail_id`,`packRef_id`,`packDetStock`,`packQty`,`pack_loc`) VALUES (
              0,$grade,$id,$totQty,$location)";
        mysqli_query($connection,$sql1);
    }
    $response_array['status'] = 'success';
    echo json_encode($response_array);
}