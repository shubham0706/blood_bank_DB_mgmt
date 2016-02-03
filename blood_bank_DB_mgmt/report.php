<html>
<head>
<title>Report Page</title>


</head>
<body>



<?php
require "connect-mysql.php";
$query = "SELECT DISTINCT Name from branches";
$queryrun = mysqli_query($dbcon,$query);
//var_dump($queryrun);
$i=0;
//$row=mysql_fetch_assoc($queryrun);
//echo $row;
 while($row=mysqli_fetch_assoc($queryrun))
 	$holddt[$i++]=$row['Name'];
//print_r($holddt);
?>
<br>
<h2><center><u>Blood Units in a Bank</u></center></h2>
<h3>
<br>
<br>
<ul>
<li> Select a bank:-</li>
<br>
<form action='location.php' method='POST' ><select name="venuename">
	<?php
			foreach($holddt as $ID){
				echo "<option value='".$ID."' >".$ID."</option>";
			}
		 ?>	</select><input type='submit' value='Go'></form>

</ul>
</h3>


</body>
</html>