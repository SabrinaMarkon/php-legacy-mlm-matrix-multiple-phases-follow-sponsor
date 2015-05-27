<?php
session_start();
include "config.php";

$id = $_GET['id'];

echo "Redirecting, please wait....";
	$query = "update buttons set clicks=clicks+1,show_clicks=show_clicks+1 where id=".$id;
	$result = mysql_query ($query)
	    or die ("Query failed");

	$query2 = "select * from buttons where id='$id'";
	$result2 = mysql_query ($query2)
	    or die ("Query 2 failed");

	while ($line = mysql_fetch_array($result2)) {
	    $url = $line["targeturl"];
	}
	
		

	echo "<META HTTP-EQUIV=Refresh Content=0;URL=".$url.">";

?>