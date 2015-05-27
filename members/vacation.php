<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( ($userid<>"")&&($password<>"") ) {


			if($_GET['action'] == "back") {
				mysql_query("UPDATE members SET vacation=0, vacation_date = '".time()."' WHERE userid='$userid'");
				$vacation = 0;
				$vacation_date = time();
			}
			
			if($_GET['action'] == "go") {
				mysql_query("UPDATE members SET vacation=1, vacation_date = '".time()."' WHERE userid='$userid'");
				$vacation = 1;
				$vacation_date = time();
			}


        include("navigation.php");
		include("../banners2.php");

            echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		?>
		
		
		<?
		if($vacation_date > time()-24*60*60 ) {
		?>

		<center>
		<br><br>
		Your account is now active again!<p>You will start receiving emails again. In order to prevent cheating you will not be able to advertise for 24 hours. 
		</center>

		</td></tr></table>
		<?
		include("../footer.php");
		exit;
		}
		?>
		

		<?
         echo "</font></td></tr></table>";

	}
else
  { ?>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include "../footer.php";
mysql_close($dblink);
?>