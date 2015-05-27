<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("ulogin") ) {  
include("../banners2.php");
  
    	echo "<p><b><center>Thank you for your <i>$sitename</i> purchase!</center></p></b>";

 	} else { 
?>
  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>
<?
  }
  
  include "../footer.php";
  mysql_close($dblink);
?>