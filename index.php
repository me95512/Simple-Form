<html>
<head>
<title>The Test Data Entry Form with PHP Tel: 07424592553</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css"href="print.css"/>
<script type="text/javascript" src="data_entry_javascript.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<?php #
// DO NO action to the Web browser prior to the header() line!

// Check if the form has been submitted.
if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize error array.
	// Check for a first name:
	if (empty($_POST['Name'])) {
		$errors[] = 'Please enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['Name']));
	}
	// Verify for a Surname.
	if (empty($_POST['Surname'])) {
		$errors[] = 'You forgot to enter your Surname.';
	} else {
		$sn = mysqli_real_escape_string($dbc, trim($_POST['Surname']));
	}
	
	// Verify for an email address.
	if (empty($_POST['Email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$el = mysqli_real_escape_string($dbc, trim($_POST['Email']));
	}
	
   // Verify for Telephone number.
	if (empty($_POST['Telephone'])) {
		$errors[] = 'You forgot to enter your Telephone number.';
	} else {
		$t= mysqli_real_escape_string($dbc, trim($_POST['Telephone']));
	}
	
	// Check for Gender:
	if (empty($_POST['Gender'])) {
		$errors[] = 'You forgot to select Gender.';
	} else {
		$gr = mysqli_real_escape_string($dbc, trim($_POST['Gender']));
	}
	
	// Check for DOB:
	if (empty($_POST['DOB'])) {
		$errors[] = 'You forgot to enter DOB.';
	} else {
		$ds = mysqli_real_escape_string($dbc, trim($_POST['DOB']));
	}
	
	// Check for Comments:
	if (empty($_POST['Comments'])) {
		$errors[] = 'You forgot to enter Comments.';
	} else {
		$ct= mysqli_real_escape_string($dbc, trim($_POST['Comments']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO the_test (Name, Surname, Email, Telephone, Gender, DOB, Comments) VALUES ('$fn', '$sn', '$el', '$t', '$gr', '$ds', '$ct')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message: 
			echo '<h2>Thank you!</h2>
		<p><h5>Your order would be process soon. A confirmation email would be sent to email account!</h5></p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">Your order could not be process due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		mysqli_close($dbc); // Close the database connection.
		// Include the footer and quit the script:
		//include ('includes/footer.html'); 
		//exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	//mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<form action="index.php" method="post">
<fieldset id="secondaryContent">Step 1: Your Details</fieldset></div>
 <fieldset id="secondaryContent1">	  
   First Name: <input type="text" name="Name" size="15" maxlength="40" value="<?php if (isset($_POST['Name'])) echo $_POST['Name']; ?>"/>
   &nbsp;&nbsp;Surname: <input type="text" name="Surname" size="15" maxlength="40" value="<?php if (isset($_POST['Surname'])) echo $_POST['Surname']; ?>"/><br><br>
   Email Address: <input type="text" name="Email" value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>"/><br><br>
   <a href="javascript:Toggle('products');"><img src="nextlabel.gif" align="right"></a></fieldset>
   </div></div>
   <fieldset id="secondaryContent">Step 2: More Comments </fieldset></div>
	<div id="products" style="display: none;">
  <fieldset id="secondaryContent1">
  Telephone: <input type="text" name="Telephone" size="15" maxlength="40" value="<?php if (isset($_POST['Telephone'])) echo $_POST['Telephone']; ?>"/>
  &nbsp;&nbsp;Gender 
 <select name="Gender">
   <option value="" selected>select yours</option>
   <option value="1">Male</option>
   <option value="2">Female</option>
</select><?php if (isset($_POST['Gender']));?>
<br><br>DOB: <input type="text" name="DOB" size="15" maxlength="40" value="<?php if (isset($_POST['DOB'])) echo $_POST['DOB']; ?>"/>
 <a href="javascript:Toggle('support');"><img src="nextlabel.gif" align="right"></a>
 <br><br><br></div></div>
 <fieldset id="secondaryContent">Step 3: Final Comments</fieldset></div>
  <div id="support" style="display: none;">
  <fieldset id="secondaryContent1">
 Comments<br>
 <TEXTAREA NAME="Comments" value="<?php if (isset($_POST['Comments'])) echo $_POST['Comments'];?>"></TEXTAREA>
 <br><br>
 <div align="center"><input type="submit" value="Submit"/>
 <input type="hidden" name="submitted" value="TRUE" /></div>
</form>
<p><a href="javascript:Expand();"></a><a href="javascript:Collapse();"></a></p>
<a href="display_entry.php">Display records</a>
 </div>
 </div>
 </div>
 </div>
</body>
</html>

