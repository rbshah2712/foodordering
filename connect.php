<?php
error_reporting(E_ALL);
$baseURL = "http://localhost/Food-order/Admin";
$db = "food-order";
$host = "localhost";
$user = "root";
$pwd = "";

$connect = mysqli_connect($host,$user,$pwd);

if (!$connect) {
    die('Could not connect: ' . mysql_error());
}
else {
    $dbconnect = mysqli_select_db($connect,$db);
    //echo 'connected';
}
