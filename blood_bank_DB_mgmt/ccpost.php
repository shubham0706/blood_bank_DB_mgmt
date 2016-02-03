<?php
require 'connecreq.php';
session_start();
$date = $_POST['dates'];
$btype = $_POST['btype'];
$id = $_SESSION['loggedin'];
$unitsreq = $_POST['unitsreq'];
$query1 = "INSERT INTO `custorder` VALUES ('$id', ' ','$unitsreq', '$btype','$date')";
if($query1run = mysql_query($query1))
{
	echo "Your order has been placed successfully";
	echo "<br><a href='cdisp.php'>Click here to go Back</a>";
}
else
{
	echo "Error Occured";
	die();
}

?>