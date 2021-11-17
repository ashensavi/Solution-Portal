<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'alphawav_test1';

// $host = 'localhost';
// $user = 'epartner_ly_pos';
// $pass = 'epartner_ly_pos';
// $db   = 'epartner_ly_pos';


$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$connection= mysqli_connect($host,$user,$pass,$db) or die("error finding DB");

?>
