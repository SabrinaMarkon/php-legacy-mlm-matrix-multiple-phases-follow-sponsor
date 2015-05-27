<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$oldid = mysql_real_escape_string( $_POST['name']);
$id = mysql_real_escape_string( $_POST['id']);

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><H2>Setup Your Button Ad(s)</H2></center>";

    $query = "select * from buttons where id=".$id;
    $result = mysql_query ($query)
		or die ("Query 1 failed");
	$line = mysql_fetch_array($result);
	     $max = $line["max"];
         $name = $line["name"];

    $query1 = "update buttons set max=max+".$max." where id=".$oldid;
    $result2 = mysql_query ($query1)
		or die ("Query 2 failed");

    $query2 = "delete from buttons where id=".$id;
    $result2 = mysql_query ($query2)
		or die ("Query 3 failed");

    echo "<p><center>".$max." credits have been added to ".$name."<a href=advertise.php> click here</a> to go back.</center></p>";
    echo "</td></tr></table>";
  }
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>