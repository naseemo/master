<?php
session_start();
//error_reporting(E_ALL);
$db = mysqli_connect("localhost","naseemo_dbu","B{.2-QaLICl=","naseemo_db");
// Check connection
if (mysqli_connect_errno())
  {
 // echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
	  //echo 'conneted';
  }
?>
