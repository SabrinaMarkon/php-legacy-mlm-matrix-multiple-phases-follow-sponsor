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
		echo "<br><H2><center>Trade points</H2>";
       
$paypal = $paypal_email;
$payza = $payza_email;
$egopay = $egopay_account;
$perfectmoney = $perfectmoney_account;
$okpay = $okpay_account;
$solidtrustpay = $solidtrustpay_account;
$moneybookers = $moneybookers_email;
$paychoice = "Points Trade - Special Offer";
$transaction = "Points Trade - Special Offer";

        if($item == "banner") {
		
			if($points >= $bannerpointprice) {
			
				mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");
				mysql_query("UPDATE members SET points=points-".$bannerpointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a banner','".time()."','-$bannerpointprice points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a banner. <a href=\"addbanners.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "button") {
		
			if($points >= $buttonpointprice) {
			
				mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");
		mysql_query("UPDATE members SET points=points-".$buttonpointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a button banner ad','".time()."','-$buttonpointprice points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a button banner. <a href=\"addbuttons.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "hotlink1") {
		
			if($points >= $hotlinkpointprice1) {
			
				mysql_query("insert into hotlinks (userid,max,purchase) values('$userid','5000','".time()."')");
				mysql_query("UPDATE members SET points=points-".$hotlinkpointprice1." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for an hotlink','".time()."','-$hotlinkpointprice1 points')");
				
				
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing an hotlink. <a href=\"addhotlink.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}	

		} elseif($item == "hotlink2") {
		
			if($points >= $hotlinkpointprice2) {
			
				mysql_query("insert into hotlinks (userid,max,purchase) values('$userid','10000','".time()."')");
				mysql_query("UPDATE members SET points=points-".$hotlinkpointprice2." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for an hotlink','".time()."','-$hotlinkpointprice2 points')");
				
				
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing an hotlink. <a href=\"addhotlink.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "hotlink3") {
		
			if($points >= $hotlinkpointprice3) {
			
				mysql_query("insert into hotlinks (userid,max,purchase) values('$userid','20000','".time()."')");
				mysql_query("UPDATE members SET points=points-".$hotlinkpointprice3." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for an hotlink','".time()."','-$hotlinkpointprice3 points')");
				
				
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing an hotlink. <a href=\"addhotlink.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
		
			
		} elseif($item == "tlink1") {
		
			if($points >= $tlinkpoints1) {
			
				mysql_query("insert into tlinks (userid,paid) values('$userid','50')");
				mysql_query("UPDATE members SET points=points-".$tlinkpoints1." WHERE userid = '".$userid."'");
			
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a traffic link','".time()."','-$tlinkpoints1 points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a traffic link. <a href=\"addtlinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}
		
		elseif($item == "tlink2") {
		
			if($points >= $tlinkpoints2) {
			
				mysql_query("insert into tlinks (userid,paid) values('$userid','100')");
				mysql_query("UPDATE members SET points=points-".$tlinkpoints2." WHERE userid = '".$userid."'");
			
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a traffic link','".time()."','-$tlinkpoints2 points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a traffic link. <a href=\"addtlinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}
		
		elseif($item == "tlink3") {
		
			if($points >= $tlinkpoints3) {
			
				mysql_query("insert into tlinks (userid,paid) values('$userid','200')");
				mysql_query("UPDATE members SET points=points-".$tlinkpoints3." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a traffic link','".time()."','-$tlinkpoints3 points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a traffic link. <a href=\"addtlinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "ptc1") {
		
			if($points >= $ptc1points) {
			
				mysql_query("insert into ptcads (userid,paid) values('$userid','50')");
				mysql_query("UPDATE members SET points=points-".$ptc1points." WHERE userid = '".$userid."'");
			
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a ptc 50 link','".time()."','-$ptc1points points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a ptc ad. <a href=\"addptclinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}
		
		elseif($item == "ptc2") {
		
			if($points >= $ptc2points) {
			
				mysql_query("insert into ptcads (userid,paid) values('$userid','100')");
				mysql_query("UPDATE members SET points=points-".$ptc2points." WHERE userid = '".$userid."'");
			
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a ptc 100 link','".time()."','-$ptc2points points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a ptc link. <a href=\"addptclinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}
		
		elseif($item == "ptc3") {
		
			if($points >= $ptc3points) {
			
				mysql_query("insert into ptcads (userid,paid) values('$userid','200')");
				mysql_query("UPDATE members SET points=points-".$ptc3points." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a ptc 200 link','".time()."','-$ptc3points points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a ptc link. <a href=\"addptclinks.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}  elseif($item == "navtop") {
		
			if($points >= $navtoppointprice) {
			
				mysql_query("INSERT INTO `topnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
				mysql_query("UPDATE members SET points=points-".$navtoppointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a top navigation link','".time()."','-$navtoppointprice points')");
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a top navigation link. <a href=\"addtopnav.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "botnav") {
		
			if($points >= $navpricepoints) {
			
				mysql_query("INSERT INTO `botnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
				mysql_query("UPDATE members SET points=points-".$navpricepoints." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a bottom navigation link','".time()."','-$navpricepoints points')");
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a bottom navigation link. <a href=\"addbotnav.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "login") {
		
			if($points >= $loginpricepoints) {
			
				mysql_query("insert into loginads (userid,max) values('$userid','1000')");
				mysql_query("UPDATE members SET points=points-".$loginpricepoints." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a login ad','".time()."','-$loginpricepoints points')");
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a login ad. <a href=\"addlogin.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}		

		} elseif($item == "solo") {
		
			if($points >= $solopointprice) {
			
				mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");
				mysql_query("UPDATE members SET points=points-".$solopointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a solo','".time()."','-$solopointprice points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a solo ad. <a href=\"addsolos.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		}  elseif($item == "fullloginad") {
		
			if($points >= $fullloginadpointprice) {
			
				mysql_query("insert into fullloginads (userid,rented,purchase) values('$userid','$rented',NOW())");
				mysql_query("update members set points=points-".$fullloginadpointprice." WHERE userid = '".$userid."'");

				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a Full Page Login Ad','".time()."','-$fullloginadpointprice points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a Full Page Login Ad. <a href=\"addfullloginad.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "featuredad") {
		
			if($points >= $featuredadpointprice) {
			
				mysql_query("insert into featuredads (userid,max,purchase) values('$userid','$featuredadmaxhits', NOW())");
				mysql_query("update members set points=points-".$featuredadpointprice." WHERE userid = '".$userid."'");

				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a Featured Ad','".time()."','-$featuredadpointprice points')");
			
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a Featured Ad. <a href=\"addfeaturedad.php\">Click here</a> to set it up.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
			
		} elseif($item == "hheadlinead") { 

			if($points >= $hheadlineadpointprice) {

				mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','$hheadlineadmaxhits', NOW())");
				mysql_query("update members set points=points-".$hheadlineadpointprice." WHERE userid = '".$userid."'");
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a Hot Headline Ad','".time()."','-$hheadlineadpointprice points')");
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a Hot Headline Ad. <a href=\"addhheadlinead.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}

		} elseif($item == "hheaderad") { 

			if($points >= $hheaderadpointprice) {

				mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','$hheaderadmaxhits', NOW())");
				mysql_query("update members set points=points-".$hheaderadpointprice." WHERE userid = '".$userid."'");
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Conversion for a Hot Header Ad','".time()."','-$hheaderadpointprice points')");
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a Hot Header Ad. <a href=\"addhheaderad.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}

		} elseif($item == "saf") {
		
			if($points >= $safpointprice) {
			
				mysql_query("insert into footerads (userid,paid) values('$userid','50')");
				mysql_query("UPDATE members SET points=points-".$safpointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for a Solo Footer Ad','".time()."','-$safpointprice points')");
				
			
				
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a Solo Footer Ad. <a href=\"addfooterads.php\">Click here</a> to set it up.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}
		    }  
		
				
		if($item == "offer") {
		
			if($points >= $sopointprice) {

                       $sql = mysql_query("SELECT * FROM offerpage LIMIT 1");

			$offer = mysql_fetch_array($sql);

                       $query = "select * from members where userid='".$userid."'";

	              	$result = mysql_query ($query)

		           		or die ("Query failed");

		         $numrows = @ mysql_num_rows($result);

			
				$user = mysql_fetch_array($result);
			
		
			mysql_query("UPDATE members SET points=points-".$sopointprice." WHERE userid = '".$userid."'");
		        mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for Special Offer','".time()."','-$sopointprice points')");

			

			

			

			if($offer['points']) mysql_query("UPDATE members SET points=points+".$offer['points']." WHERE userid='".$userid."'");



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
					}

			if($offer['hotlink_num'] AND $offer['hotlink_views']) {
					
						$count = $offer['hotlink_num'];
						while($count > 0) {
							mysql_query("INSERT INTO hotlinks (userid,max,purchase) values('$userid','".$offer['hotlink_views']."','".time()."')");
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

			if($offer['upgrade_pro']=="1") {
                                         $projvcom=0;
				         $jvjvcom=0;
                                         $superjvjvcom=0;
					upgrade_jv($userid);
					}
					
				if($offer['upgrade_pro']=="2") {
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

                                                                  if($offer['botnav_num']) {
					
				$count = $offer['botnav_num'];
						while($count > 0) {		
							mysql_query("INSERT INTO `botnav` (`userid` , `date`) VALUES ('".$userid."', '".time()."')");
	
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
			

							echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing the Special Offer Package.</font></p>";
			
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough commissions to purchase.</font></p>";
			}
			
		} elseif($item == "upgrade_jv_exchange") {
		
			if($points >= $jvpointprice) {
			
				$projvcom=0;
				$jvjvcom=0;
                                                                $superjvjvcom=0;
				upgrade_jv($userid);

				mysql_query("UPDATE members SET points=points-".$jvpointprice." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for a " . $middlelevel . " Member upgrade','".time()."','-$jvpointprice points')");
			
mysql_query("UPDATE members SET upgrade_points=1 WHERE userid = '".$userid."'");
	
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a " . $middlelevel . " Member upgrade.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}				
			
		} elseif($item == "upgrade_superjv_exchange") {
		
			if($points >= $superjvpricepointse) {
			
				$prosupercom=0;
				$jvsupercom=0;
                                                                $superjv2supercom=0;
				upgrade_superjv($userid);

				mysql_query("UPDATE members SET points=points-".$superjvpricepoints." WHERE userid = '".$userid."'");
				
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Conversion for a " . $toplevel . " upgrade','".time()."','-$superjvpricepoints points')");
			
mysql_query("UPDATE members SET upgrade_points=1 WHERE userid = '".$userid."'");
	
				echo "<p><font face=\"Tahoma\" size=\"2\">Thank you for purchasing a " . $toplevel . " Member upgrade.</font></p>";
			} else {
				echo "<p><font face=\"Tahoma\" size=\"2\">You don't have enough points</font></p>";
			}				
			
		}




	echo "<br><br><br>";
  

 }

include "../footer.php";
mysql_close($dblink);
?>