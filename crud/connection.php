<?php
/*
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("4sale",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'lneven.dk.mysql';
$databaseName = 'lneven_dk_4sale';
$databaseUsername = 'lneven_dk_4sale';
$databasePassword = 'zxcv92';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
?>
