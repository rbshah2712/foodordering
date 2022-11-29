<?php
session_start();

error_reporting(E_ALL);
$baseURL = "http://localhost/Food-order/Admin/";
$db = "food-order";
$host = "localhost";
$user = "root";
$pwd = "";
$website = "Food Ordering System";
global $connect;
$connect = mysqli_connect($host,$user,$pwd);

if (!$connect) {
    die('Could not connect: ' . mysqli_connect_error($connect));
}
else {
    $dbconnect = mysqli_select_db($connect,$db);
    //echo 'connected';
}

function set_msg($msg,$type=null){
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;//success,warning,danger
 }//end set_msg()
  
 function get_msg(){
     if(isset($_SESSION['msg'])){
       $type = isset($_SESSION['type'])?$_SESSION['type']:'success';
       echo '<div class="alert alert-'.$type.'">';
         echo $_SESSION['msg'];
       echo '</div>';
       //now remove msg & type from session
       unset($_SESSION['msg']);
       unset($_SESSION['type']);
     }//endif isset session[msg]
 }//end get_msg()


  
 ?>
