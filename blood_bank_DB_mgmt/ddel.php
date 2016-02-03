<?php
require "connecreq.php";
$did=$_POST['did'];

$query = "DELETE FROM `donor` WHERE `donor`.`Did` = '$did'";
$query1 = "DELETE FROM `login` WHERE `login`.`id` = '$did'";
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