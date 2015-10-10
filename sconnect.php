<?php
// Connection file to include for connection to MySQL database
// localhost should work in this instance with the provider
$hostname="localhost"; 
// Granted specific permissions for db access
$username="tana_hwadmin";
$password="h3770w0r7d!";
$database="tana_helloworld";
$con=mysql_connect($hostname,$username,$password);
// If the connetion could not be made, then detail the error and die out
if(! $con)
{
die('Connection could not be made:'.mysql_error());
}
// If we are successful, then select the configured database
mysql_select_db($database,$con);
?>