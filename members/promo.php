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
		echo "<br><H2><center>Redeem Promo Code</H2>";
       
	if($_POST['code']) {
		
		$sql = mysql_query("SELECT * FROM promo_codes WHERE code='".$_POST['code']."' AND ((members='New' AND time<='".strtotime($joindate)."') OR (members='Existing' AND time>='".strtotime($joindate)."') OR members='All' )");
		if(@mysql_num_rows($sql)) {
			$offer = mysql_fetch_array($sql);
			if($offer['count'] < $offer['max']) {

				$sql2 = mysql_query("SELECT * FROM promo_used WHERE promoid='".$offer['id']."' AND userid='".$userid."'");
				if(!@mysql_num_rows($sql2)) {
				
				
					mysql_query("INSERT INTO promo_used (promoid,userid) VALUES ('".$offer['id']."','".$userid."')");
					mysql_query("UPDATE promo_codes SET count=count+1 WHERE id='".$offer['id']."'");
				
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

				if($offer['upgrade']=="1") {
                                         $projvcom=0;
				         $jvjvcom=0;
                                         $superjvjvcom=0;
					upgrade_jv($userid);
					}
					
				if($offer['upgrade']=="2") {
                                        $prosupercom=0;
				        $jvsupercom=0;
                                        $superjv2supercom=0;
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

                                                                  if($offer['hotlink_num'] AND $offer['hotlink_views']) {
					
						$count = $offer['hotlink_num'];
						while($count > 0) {
							mysql_query("INSERT INTO hotlinks (userid,max,purchase) values('$userid','".$offer['hotlink_views']."','".time()."')");
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
				
					echo "Your advertising has been added to your account. <a href=\"advertise.php\">Go back</a>";
				
				} else echo "<font color=\"red\">You already used that promo code.</font>";
			} else echo "<font color=\"red\">The promo code has expired.</font>";
		} else echo "<font color=\"red\">Wrong promo code.</font>";
		
	
	
	} else echo"<font color=\"red\">You need to enter a promo code.</font>";
		
		



	echo "<br><br><br>";
} # if(session_is_registered("ulogin"))
else
{
?>
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>
<?
}
include "../footer.php";
mysql_close($dblink);
?>