<?php
date_default_timezone_set('Asia/Dubai');
session_start();
//error_reporting(E_ALL);
$db = mysqli_connect("localhost","naseemo_lara","^?T[tzpyEp&=","naseemo_la1");
// Check connection
if (mysqli_connect_errno())
  {
 // echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
	  //echo 'conneted';
  }

  
if(isset($_SESSION['id'])){
$sess_id = preg_replace("/[^0-9,.]/", "", $_SESSION['id']);
$sess_q = mysqli_query($db, "SELECT * FROM `admin_login` WHERE `id`='$sess_id'");
$check_f = mysqli_fetch_assoc($sess_q);
$sess_id = $check_f['id'];
$sess_name = $check_f['name'];
$sess_status = $check_f['status'];
}
?>
