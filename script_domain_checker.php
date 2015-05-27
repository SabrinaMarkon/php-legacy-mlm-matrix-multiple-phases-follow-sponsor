<?php
$domain = $_GET['order_domain_name'];
$ext = $_GET['order_domain_extension'];
$check = $domain . "." . $ext;
$recordexists = checkdnsrr($check, "ANY");
if ($domain != "")
{
	if ($recordexists) 
	{
	  echo "<center>Unavailable</center>";
	}
	else 
	{
	  if ($ext == "info")
		{
		echo "<center>Available! - FREE Registration and FREE Yearly Renewal!</center>";
		}
	  if ($ext != "info")
		{
		echo "<center>Available! - adds $8.00 to order for 1 year registration</center>";
		}
	}
}
?>