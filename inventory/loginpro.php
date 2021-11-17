<?php 
session_start();
include 'db/dbConnection.php';

$name = $mysqli->escape_string($_POST['name']);
$result = $mysqli->query("SELECT * FROM user_tbl WHERE user_name='$name'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User doesn't exist!";
    	header("location: error");
  }
  else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password'] == $user['user_pwd'] ) {

        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_loc'] = $user['user_loc'];

		header("location:index.php"); 
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        	header("location: error");
        // echo "<script type='text/javascript'>goerror()</script>";
    }
}

?>