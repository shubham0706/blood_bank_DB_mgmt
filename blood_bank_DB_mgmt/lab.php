<?php
require "connecreq.php";
session_start();
$sid = $_POST['sid'];
$query = "SELECT `status` FROM `labs` WHERE `labs`.`sid` = '$sid'";
$queryrun = mysql_query($query);
 $result = mysql_result($queryrun,0,`status`);
if($result=='accepted')
	echo"Your Blood was Accepted.Thank You for your donation.";
else if($result == 'rejected')
	echo"Sorry, your Blood was rejected.";
?>