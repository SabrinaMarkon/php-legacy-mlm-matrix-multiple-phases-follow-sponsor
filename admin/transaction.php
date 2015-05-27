<?php

session_start();
include "../config.php";

if( session_is_registered("alogin") ) {


$query = "select * from transactions";
$result = mysql_query ($query)
	or die ("Query failed");


	
if(@mysql_num_rows($result)) {

	header("Content-type: text/plain" );

	   if(preg_match('/msie|(microsoft internet explorer)/i', $_SERVER['HTTP_USER_AGENT']))
	   {
	      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	      header('Pragma: public');
	   }
	   else header('Pragma: no-cache');
	   
	header('Content-Disposition: attachment; filename="transaction-'.date("Y-m-d").'.txt"');
	
	echo "Userid;Transaction;Date;Time;Qty\n";	
	while($each = mysql_fetch_array($result)) {
		echo $each['userid'].";".$each['action'].";".date("Y-m-d",$each['date']).";".date("G:i",$each['date']).";".$each['quantity']."\n";
	}


} else echo "No transaction found!";

  }
else
	echo "Unauthorised Access!";
?>