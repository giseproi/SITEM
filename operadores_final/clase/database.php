<?php

/**
 * Connect to the mysql database.
 */
$conn = mysql_connect("localhost", "root", "gardel") or die(mysql_error());
mysql_select_db('telemedicina', $conn) or die(mysql_error());

?>
