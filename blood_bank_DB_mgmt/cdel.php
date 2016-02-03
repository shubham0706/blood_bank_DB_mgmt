<?php
require "connecreq.php";
$cid=$_POST['cid'];

$query = "DELETE FROM `customer` WHERE `customer`.`Cid` = '$cid'";
$query1 = "DELETE FROM `login` WHERE `login`.`id` = '$cid'";
$queryrun = mysql_query($query);
$queryrun1 = mysql_query($query1);
if($queryrun && $queryrun1)
{
	echo "Record deleted Successfully.";
}
else 
{
	echo "Record not deleted";
}
echo "<a href='index.php'>Click here to Go Back</a>";
?>