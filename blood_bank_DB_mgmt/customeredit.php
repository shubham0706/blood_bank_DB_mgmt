<!doctype html>
<html lang=en>
<head>
<title>Customer Info</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentistuser.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<a href="index.html"><img src="logo.png" width="40" height="40" class="logo">
		<p class="logotext">BloodBank</p></a>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">Customer Info</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT CustId AS CustId, Name AS Name,Address AS Address, Btype AS Btype, UnitReq AS UnitReq, Dates AS Dates FROM customer";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table>
				<tr class="heading"><td class="col head"><b>Name</b></td><td class="col head"><b>Address</b></td>
				<td class="col head"><b>blood type</b></td><td class="col head"><b>UnitReq</b><td class="col head"><b>Dates</b></td></td><td class="col head"><b>Edit</b></td>
                <td class="last"><b>Delete</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading1"><td class="col">' . $row['Name'] . '</td><td class="col">'.  $row['Address'] . '</td>
				<td class="col">'.  $row['Btype'] . '</td><td class="col">'.  $row['UnitReq'] . '</td>
				<td class="last1">'.  $row['Dates'] . '</td>
				
				<td class="col"><a href="edit_customerinfo.php?id=' . $row['CustId'] . '">Edit</a></td>
                <td class="last1"><a href="delete_customerinfo.php?id=' . $row['CustId'] . '">Delete</a></td></tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
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