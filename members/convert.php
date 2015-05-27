<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		echo "<br><H2><center>Convert commissions</H2>";
       
        if($amount <= $commission and $amount>0) {
		
			mysql_query("UPDATE members SET points=points+".($amount*$pointrate).", commission=commission-'".$amount."' WHERE userid = '".$userid."'");
			
			
				mysql_query("INSERT INTO transactions VALUES ('".$userid."','Commission conversion for ".($amount*$pointrate)." points','".time()."','-$amount\$')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">You converted $amount\$ for ".($amount*$pointrate)." points. <a href=\"advertise.php\">Click here</a> to go back.</font></p>";
			
		} else {
			echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough commissions</font></p>";
		}
			

	echo "<br><br><br>";
  

 }

include "../footer.php";
mysql_close($dblink);
?>