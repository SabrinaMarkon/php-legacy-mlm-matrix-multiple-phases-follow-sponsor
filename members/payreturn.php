<?php
	session_start();
	include "../header.php";
	include "../config.php";
	include "../style.php";

	if( session_is_registered("ulogin") ) {  
		// members only stuff!
		include("navigation.php");
    include("../banners2.php");

		$itemname = "";
		switch ($_GET['itemname']) {
		case "mmu";
			$itemname = "Monthly Membership Upgrade";
			break;

		case "ymu";
			$itemname = "Yearly Membership Upgrade";
			break;

		case "lmu";
			$itemname = "Lifetime Membership Upgrade";
			break;

		case "pts";
			$itemname = "Points";
			break;

		case "bnr";
			$itemname = "Banner";
			break;

		case "sad";
			$itemname = "Solo Ad";
			break;

		}

		if ($_GET['rettype']=="1") {    
    	echo "<p><b><center>Thank you for your <i>$itemname</i> purchase! The advertising has been added to your account.<br> Setup your campaign under 'Advertisers'.</center></p></b>";
    } else {
    	echo "<p><b><center>Your <i>$itemname</i> purchase has been cancelled.</center></p></b>";
  	}

 	} else { 
?>
  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>
<?
  }
  
  include "../footer.php";
  mysql_close($dblink);
?>