<?php

// This Script was developed by Mikalonet inline to the request by David Lucas. It contains the database access information for the database. 
// This file also establishes a connection to MySQL database server and selects the database.

// Make the database access information:
define ('DB_USER', 'root');
define ('DB_PASSWORD', '');
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'Your Database Name');
// Create the connection:
$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Set the character set:
mysqli_set_charset($dbc, 'utf8');

// Skip the closing PHP tag

?>
