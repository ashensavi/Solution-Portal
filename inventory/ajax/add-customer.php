<?php
    include('../db/dbConnection.php');
?>
<?php
    session_start();

    $data = (array) $_POST['data'];

    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];
    $feild = $data['field'];

    $date = date("m/d/Y");
    $user = $_SESSION['user_id'];

    $select="SELECT MAX(cus_id) AS max_id FROM customer_tbl";
    $result= mysqli_query($connection,$select);
    $dataRow=mysqli_fetch_array($result);
    $dataRow = ++$dataRow['max_id'];

    mysqli_autocommit($connection, false);

    $query1 = "INSERT INTO customer_tbl(`cus_id`,`cus_name`,`cus_phone`,`cus_email`,`cus_custom_feild`,`added_user`,`added_date`)VALUES(
        '',
        '$name',
        '$phone',
        '$email',
        '$feild',
        '$user',
        '$date')";

    $result1 = mysqli_query($connection, $query1);

    if ($result1) {
        mysqli_commit($connection);
        $response_array['status'] = 'success';
        $response_array['select'] = "<option selected value='". $dataRow ."'>". $name ."</option>";
        echo json_encode($response_array);
    }else {
        mysqli_rollback($connection);
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }