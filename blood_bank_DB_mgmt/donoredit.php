<!doctype html>
<html lang=en>
<head>
<title>Donor Info</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="donoredit.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<a href="index.html"><img src="logo.png" width="40" height="40" class="logo">
		<p class="logotext">BloodBank</p></a>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">Donor Info</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT DId AS DId,  name AS name,age AS age ,address AS address,dates AS dates,btype AS btype,phno AS phno   FROM donor";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class"=heading"><td class="col head"><b>Name</b></td><td class="col head"><b>Dates</b></td>
				<td class="col head"><b>blood type</b></td><td class="col head"><b>Phone</b></td><b>Edit</b></td>
                <td class="col head"><b>edit</b></td><td class="last"><b>Delete</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading1><td>' . $row['name'] . '</td><td class="col">'.  $row['age'] . '</td>
				<td class="col">'.  $row['address'] . '</td><td "col">'.  $row['dates'] . '</td>
				<td "col">'.  $row['btype'] . '</td><td "col">'.  $row['phno'] . '</td>
				
				<td "col"><a href="edit_donorinfo.php?id=' . $row['DId'] . '">Edit</a></td>
                <td class="last1"><a href="delete_userinfo.php?id=' . $row['DId'] . '">Delete</a></td></tr>'; }
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
<p>

<center>
<button onclick="window.print()">Print</button>
</center></p>
</div>
</body>
</html>