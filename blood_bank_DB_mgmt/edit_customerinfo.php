<!doctype html>
<html lang=en>
<head>
<title>Edit a record</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="signup.css">

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<h2 class="title">Edit a Record</h2>

<?php
		// After clicking the Edit link in the found_record.php page, the editing interface appears
		// The code looks for a valid user ID, either through GET or POST #1
		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
		} 
		elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission
		$id = $_POST['id'];
		} 
		else { // If no valid ID, stop the script
		echo '<p class="error">This page has been accessed in error</p>';
		exit();
		}

require ('connect-mysql.php');
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['Name'])) {
		$errors[] = 'You forgot to enter your first name';
		} else {
		$Name = mysqli_real_escape_string($dbcon, trim($_POST['Name']));
		}


		 // Look for the descriptions
		if (empty($_POST['Address'])) {
		$errors[] = 'You forgot to enter the address.';
		} else {
		$Address = mysqli_real_escape_string($dbcon, trim($_POST['Address']));
		}


		
// Look for the dental codes
        if (empty($_POST['UnitReq'])) {
		$errors[] = 'You forgot to enter your units req';
		} else {
		$UnitReq = mysqli_real_escape_string($dbcon, trim($_POST['UnitReq']));
		}




		// Look for the descriptions
		if (empty($_POST['Btype'])) {
		$errors[] = 'You forgot to enter your btype.';
		} else {
		$Btype = mysqli_real_escape_string($dbcon, trim($_POST['Btype']));
		}



		


       // Look for the descriptions
	   //if (empty($_POST['dates'])) {
	   //$errors[] = 'You forgot to enter the date.';
	   //} else {
	   // $email = mysqli_real_escape_string($dbcon, trim($_POST['dates']));
		//}


        
		
        // Look for the descriptions
		if (empty($_POST['Dates'])) {
		$errors[] = 'You forgot to enter the dates';
		} else {
		$Dates = mysqli_real_escape_string($dbcon, trim($_POST['Dates']));
		}

		/*// Look for the dental codes
        if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your first name';
		} else {
		$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
		}      


		// Look for the descriptions
		if (empty($_POST['dtype'])) {
		$errors[] = 'You forgot to enter the address.';
		} else {
		$dtype = mysqli_real_escape_string($dbcon, trim($_POST['dtype']));
		}

*/

		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$q = "UPDATE customer SET Name='$Name', Address='$Address', Btype='$Btype', UnitReq='$UnitReq', Dates='$Dates'  WHERE CustId=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<h3>The user has been edited.</h3>';
		} else { // Echo a message if the query failed
		echo '<p class="error">The user could not be edited due to a system error. 
		We apologize for any inconvenience.</p>'; // Error message.
		echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection.
		// Include the footer and quit the script:
		
		exit();
		} else   { // Display the errors.
		echo '<p class="error">The following error(s) occurred:<br />';
        
		foreach ($errors as $msg) { // Extract the errors from the array and echo them
		echo " - $msg<br>\n";
	    }
		echo '</p><p>Please try again.</p>';
		} // End of if (empty($errors))section
}        // End of the conditionals
         // Select the record 


$q = "SELECT CustId,Name,Address,Btype,UnitReq,Dates FROM customer WHERE CustId=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<form action="edit_customerinfo.php" method="post" class="form">
	<p><label class="label" for="Name"> Name:</label>
	<input class="fl-left" id="Name" type="text" name="Name" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
	<p><label class="label" for="Address">Address:</label>
	<input class="fl-left" type="text" name="Address" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	
	<p><label class="label" for="Btype">BloodType:</label>
	<input class="fl-left" type="text" name="Btype" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<p><label class="label" for="UnitReq">UnitReq:</label>
	<input class="fl-left" type="text" name="UnitReq" size="30" maxlength="50" 
	value="' . $row[4] . '"></p>
	<p><label class="label" for="Dates">Dates:</label>
	<input class="fl-left" type="text" name="Dates" size="30" maxlength="50" 
	value="' . $row[5] . '"></p>
	

	
	<p><input id="submit" type="submit" name="submit" value="Edit"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { // The record could not be validated
	  echo '<p class="error">This page has been accessed in error</p>';
	 }
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>