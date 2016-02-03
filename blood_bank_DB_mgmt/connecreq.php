<?php 
$connerror='could not connect.';
$mhost='localhost';
$muser='admin';
$mpass='admin';
$mdbase='bloodbank';

if(@(!mysql_connect($mhost,$muser,$mpass) || !mysql_select_db($mdbase)))
{
	die($connerror);
}
else
{
	//echo 'Connected to database<br/><br/>';
}

 ?>
