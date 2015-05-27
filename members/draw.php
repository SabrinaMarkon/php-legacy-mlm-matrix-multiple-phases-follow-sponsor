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
		echo "<br><H2><center>Weekly draw</H2>";
       
        if($drawing == 1) {
		
		
	$query1 = "SELECT * FROM pages WHERE name='Drawing'";
    $result1 = mysql_query ($query1);

    $line1 = mysql_fetch_array($result1);
         $htmlcode = $line1["htmlcode"];

    echo $htmlcode."<br><br>";
		
		
		
			$tickets = intval($_POST['tickets']);
			if($tickets) {
			
				if($points < $tickets*$drawprice) {
				
				echo "<font color=red>You don't have enough points.</font>";
				
				}
				else {
				
				
					mysql_query("UPDATE members SET points=points-".($tickets*$drawprice)." WHERE userid = '".$userid."'");
					
					mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','$tickets Draw tickets','".time()."','-".($tickets*$drawprice)." points')");
					
					
					$added = $tickets;
					while($tickets > 0) {
						mysql_query("INSERT INTO drawing VALUES('".$userid."')");
						$tickets--;
					}
					
					echo "You have successfully bought $added tickets.<br><br>";
				
				}
					
			}

			
			$scount = mysql_query("SELECT COUNT(*) FROM drawing  WHERE userid = '".$userid."'");
			$count = intval(mysql_result($scount, 0));
			
			if($drawwinner != "") $drawwinner = '<br>The last winner was '.$drawwinner.'.';

	  echo "You currently have $points points and $count chance(s) to win. $drawwinner";
	  ?>
	  <form action="draw.php" method="post">
	  <input type="text" name="tickets" value="1"> x <? echo $drawprice; ?> points<br>
	  <input type="submit" value="Buy">
	  </form>
	  </center>		

		
		<?
		} else echo "The weekly drawing is disabled.";
		
		

	echo "<br><br><br>";
  

 }

include "../footer.php";
mysql_close($dblink);
?>