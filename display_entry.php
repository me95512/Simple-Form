<?php # Developed by Mikalonet 19/04/2015

// This is display_entry script retrieves all the records from the users table.

$page_title = 'Display all the Current Users: Tel: 07424592553';
echo '<h1>Data Entry form</h1>';

require_once ('mysqli_connect.php');

// The number of records to show per page:
$display = 10;

// To show the numbers of pages
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Check.
	$pages = $_GET['p'];
} else { // Recheck.
 	// Check the number of records:
	$q = "SELECT COUNT(the_test_id) FROM the_test";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];
	// Determine the number of pages
	if ($records > $display) { // If pages is > 1
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
} // End of conditional statement.

// Specified where to start the database results
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

// Allow sorting of record
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

// Determine the sorting order:
switch ($sort) {
	case 'fn':
		$order_by = 'Name ASC';
		break;
	case 'sn':
		$order_by = 'Surname ASC';
		break;
	case 'el':
		$order_by = 'Email ASC';
		break;
	default:
		$order_by = 'Email ASC';
		$sort = 'el';
		break;
}
	
// Begin the query:
$q = "SELECT Name, Surname, Email AS dr, the_test_id FROM the_test ORDER BY $order_by LIMIT $start, $display";		
$r = @mysqli_query ($dbc, $q); // Start the query.

// Create table header:
echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	
	<td align="left"><b><a href="display_entry.php?sort=fn">First Name</a></b></td>
	<td align="left"><b><a href="display_entry.php?sort=sn">Surname</a></b></td>
	<td align="left"><b><a href="display_entry.php?sort=el">Email</a></b></td>
</tr>
';

// extract and show all the data
$bg = '#eeeeee'; 
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
		echo '<tr bgcolor="' . $bg . '">
		
		<td align="left">' . $row['Name'] . '</td>
		<td align="left">' . $row['Surname'] . '</td>
		<td align="left">' . $row['dr'] . '</td>
	</tr>
	';
} // End of conditional statement.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);

// If needed create the links.
if ($pages > 1) {
	
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	//  Make a previous button if it's not the first page,
	if ($current_page != 1) {
		echo '<a href="display_entry.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Create all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="display_entry.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of conditional.
	
	// Create a Next button if it's not the last page,
	if ($current_page != $pages) {
		echo '<a href="display_entry.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
} // End of links section.
	
?>
<p><a href="index.php">Back to main page</a></p>
