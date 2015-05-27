<?php
$MySqlHostname = "localhost"; //the name of your host - if its local leave it as is.
$MySqlUsername = "phpsites_demomat"; //the username to your database.
$MySqlPassword = "!!Z%mhy9)3.kJ}PQ+D"; //the password to your database.
$MySqlDatabase = "phpsites_demomatrixmpsf"; //the name of your database.
$dblink=MYSQL_CONNECT($MySqlHostname, $MySqlUsername, $MySqlPassword) or die("Could not connect to database");
@mysql_select_db("$MySqlDatabase") or die( "Could not select database");
?>