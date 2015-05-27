<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!
		include("navigation.php");
        include("../banners2.php");

        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

 if ($memtype == "PRO") {

                echo "Only " . $middlelevel . " Members Can Access This Page<br>Upgrade Your Account <a href=upgrade.php>Here</a>.<br><br>";

}  else{


        
		$query = "SELECT * FROM pages where name='JV Bonuses'";
		$result = mysql_query ($query)
			or die ("Query failed");
		while ($line = mysql_fetch_array($result)) {
			$htmlcode = $line["htmlcode"];
			echo $htmlcode;
        }


}
        echo "</td></tr></table>";
	}

else
  { ?>

  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>