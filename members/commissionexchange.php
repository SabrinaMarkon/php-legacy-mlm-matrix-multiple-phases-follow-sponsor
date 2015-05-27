<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		echo "<br><H2><center>Commission Trade Completed</H2>";

$paypal = $paypal_email;
$payza = $payza_email;
$egopay = $egopay_account;
$perfectmoney = $perfectmoney_account;
$okpay = $okpay_account;
$solidtrustpay = $solidtrustpay_account;
$moneybookers = $moneybookers_email;
$paychoice = "Commission Exchange - Special Offer";
$transaction = "Commission Exchange - Special Offer";

        if($item == "specialoffer") {
		
			if($commission >= $$offer['price']) {

                       $sql = mysql_query("SELECT * FROM offerpage LIMIT 1");

			$offer = mysql_fetch_array($sql);

                       $query = "select * from members where userid='".$userid."'";

	              	$result = mysql_query ($query)

		           		or die ("Query failed");

		         $numrows = @ mysql_num_rows($result);

			
				$user = mysql_fetch_array($result);
			
		
			mysql_query("UPDATE members SET commission=commission-".$offer['price']." WHERE userid = '".$userid."'");
		        mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Commission Conversion for Special Offer','".time()."','".$offer['price']." removed from commissions')");

			

			

			

			if($offer['points']) mysql_query("UPDATE members SET points=points+".$offer['points']." WHERE userid='".$userid."'");

			if($offer['surfcredits']) mysql_query("UPDATE members SET surfcredits=surfcredits+".$offer['surfcredits']." WHERE userid='".$userid."'");

					if($offer['banner_num'] AND $offer['banner_views']) {
					
						$count = $offer['banner_num'];
						while($count > 0) {
							mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$offer['banner_views']."', '0')");
							$count--;
						}
					}

					if($offer['featuredad_num'] AND $offer['featuredad_views']) {
						$count = $offer['featuredad_num'];
						while($count > 0) {
							mysql_query("insert into featuredads (userid,max,purchase) values('$userid','".$offer['featuredad_views']."',NOW())");
							$count--;
							}
						}
					   if($offer['button_num'] AND $offer['button_views']) {
					
						$count = $offer['button_num'];
						while($count > 0) {
							mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$offer['button_views']."', '0')");
							$count--;
						}
					} if($offer['traffic_num'] AND $offer['traffic_views']) {
					
						$count = $offer['traffic_num'];
						while($count > 0) {
							mysql_query("insert into tlinks (userid,paid) values('$userid','".$offer['traffic_views']."')");
							$count--;
						}
					}
					
					if($offer['login_num'] AND $offer['login_views']) {
					
						$count = $offer['login_num'];
						while($count > 0) {
							mysql_query("insert into loginads (userid,max) values('$userid','".$offer['login_views']."')");
							$count--;
						}
					} if($offer['hotlink_num'] AND $offer['hotlink_views']) {
					
						$count = $offer['hotlink_num'];
						while($count > 0) {
							mysql_query("INSERT INTO hotlinks (userid,max,purchase) values('$userid','".$offer['hotlink_views']."','".time()."')");
							$count--;
						}
					}
					
					if($offer['solo_num']) {
					
						$count = $offer['solo_num'];
						while($count > 0) {
							mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");
							$count--;
						}
					}
			if($offer['hheadlinead_num'] AND $offer['hheadlinead_views']) {
				$count = $offer['hheadlinead_num'];
				while($count > 0) {
					mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','".$offer['hheadlinead_views']."',NOW())");
					$count--;
					}
				}
			if($offer['hheaderad_num'] AND $offer['hheaderad_views']) {
				$count = $offer['hheaderad_num'];
				while($count > 0) {
					mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','".$offer['hheaderad_views']."',NOW())");
					$count--;
					}
				}
				if($offer['upgrade_pro']=="1") {
					upgrade_jv($userid);
					}
					
				if($offer['upgrade_pro']=="2") {
					upgrade_superjv($userid);
					}				
					if($offer['ptc_num'] AND $offer['ptc_views']) {

				

					$count = $offer['ptc_num'];

					while($count > 0) {

						mysql_query("insert into ptcads (userid,paid) values('$userid','".$offer['ptc_views']."')");

						$count--;

					}

				}

   if($offer['topnav_num']) {
					
				$count = $offer['topnav_num'];
						while($count > 0) {		
							mysql_query("INSERT INTO `topnav` (`userid` , `date`) VALUES ('".$userid."', '".time()."')");
	
					$count--;
						}
					}

                                                                  if($offer['botnav_num']) {
					
				$count = $offer['botnav_num'];
						while($count > 0) {		
							mysql_query("INSERT INTO `botnav` (`userid` , `date`) VALUES ('".$userid."', '".time()."')");
	
					$count--;
						}
					}

				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing the Special Offer Package.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough commissions to purchase.</font></p>";
			}
			
		} elseif($item == "upgrade") {
		
			if($points >= $proprice2) {
			
				$freecommission=0;
				$procommission=0;
				upgrade_pro($userid);
				
				mysql_query("UPDATE members SET points=points-".$proprice2." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO paytrans VALUES ('id','".$userid."','Conversion for a pro upgrade','".time()."','-$proprice2 points')");
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a pro upgrade.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}				
			
		}

 



	echo "<br><br><br></td></tr></table>";
  

 }

include "../footer.php";
mysql_close($dblink);
?>