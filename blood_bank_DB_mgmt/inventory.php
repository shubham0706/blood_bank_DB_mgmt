<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentistuser.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<a href="index.html"><img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">BloodBank</p></a>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">Inventory</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT  
bid AS bid,name AS name FROM inventory ";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table>
				<tr class="heading"><td class="col head"> <b>BranchId&nbsp</b></td>
				<td class=" last"><b>Name</b></td>
				
				</tr>';
				// Fetch and print all the records: 
				
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2">
				<td class="col">' . $row['bid'] .'</td>
				<td class="col">' . $row['name'] .'</td>
							</tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } // End of if ($result)

mysqli_close($dbcon); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>