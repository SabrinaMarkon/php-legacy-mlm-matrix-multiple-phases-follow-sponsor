<?php



	$ipn_data = array();         /* array to hold POST values from Payza IPN */

	include "config.php";
               

	/* check the security code sent with the post to ensure that the post came from Payza */

	$ap_sec_code = $_POST['ap_securitycode'];

	

	

	if ($seccode == $ap_sec_code){

		$amount = $_POST['ap_amount'];
		$userid = $_POST['apc_1'];
		$ap_status = $_POST['ap_status'];
		$item = $_POST['ap_itemname'];
		$txn_id = $_POST['ap_referencenumber'];
		$query = "select * from members where userid='".$userid."'";
		$result = mysql_query ($query) or die ("Query failed");
		$numrows = @ mysql_num_rows($result);

		if ($numrows == 1) {

		
			$user = mysql_fetch_array($result);
			$referid = $user["referid"];
			$paypal = $user["paypal_email"];
			$payza = $user["payza_email"];
			$egopay = $user["egopay_account"];
			$perfectmoney = $user["perfectmoney_account"];
			$okpay = $user["okpay_account"];
			$solidtrustpay = $user["solidtrustpay_account"];
			$moneybookers = $user["moneybookers_email"];
			$paychoice = "Payza";
			$transaction = $txn_id;
			$q = "select memtype from members where userid=\"$referid\"";
			$r = mysql_query($q);
			$rows = mysql_num_rows($r);

			if(($item != $sitename." Membership ".$userid) and ($item != $sitename." " . $toplevel . " Membership ".$userid) and ($item != $sitename." One-Time Offer") and ($item != $sitename." Special Offer") and ($item != $sitename." Special Offer Ad Package") and ($item != $sitename." - ".$userid)) {
				buycommission($user['referid'], $amount);
												$projvcom=0;
                                                $jvjvcom=0;
                                                $superjvjvcom=0;
                                                $prosupercom=0;
                                                $jvsupercom=0;
                                                $superjv2supercom=0;

			}
		

if($item == $sitename." One-Time Offer") {

$sql = mysql_query("SELECT * FROM oto LIMIT 1");
$oto = mysql_fetch_array($sql);
if ($oto['priceinterval'] == "onetime")
{
$payza_status = "Success";
}
if ($oto['priceinterval'] != "onetime")
{
$payza_status = "Subscription-Payment-Success";
}

if ($ap_status == $payza_status)
{
mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - OTO','".time()."','$amount\$')");


				if($oto['points']) mysql_query("UPDATE members SET points=points+".$oto['points']." WHERE userid='".$userid."'");

				if($oto['surfcredits']) mysql_query("UPDATE members SET surfcredits=surfcredits+".$oto['surfcredits']." WHERE userid='".$userid."'");

				if($oto['banner_num'] AND $oto['banner_views']) {

				

					$count = $oto['banner_num'];

					while($count > 0) {

						mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$oto['banner_views']."', '0')");

						$count--;

					}

				}
					if($oto['featuredad_num'] AND $oto['featuredad_views']) {
						$count = $oto['featuredad_num'];
						while($count > 0) {
							mysql_query("insert into featuredads (userid,max,purchase) values('$userid','".$oto['featuredad_views']."',NOW())");
							$count--;
							}
						}
				if($oto['button_num'] AND $oto['button_views']) {

			

				$count = $oto['button_num'];

				while($count > 0) {

					mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$oto['button_views']."', '0')");

					$count--;

				}

			}

				if($oto['traffic_num'] AND $oto['traffic_views']) {

				

					$count = $oto['traffic_num'];

					while($count > 0) {

						mysql_query("insert into tlinks (userid,paid) values('$userid','".$oto['traffic_views']."')");

						$count--;

					}

				}

                                                               if($oto['ptc_num'] AND $oto['ptc_views']) {

				

					$count = $oto['ptc_num'];

					while($count > 0) {

						mysql_query("insert into ptcads (userid,paid) values('$userid','".$oto['ptc_views']."')");

						$count--;

					}

				}

                                                               if($oto['hotlink_num'] AND $oto['hotlink_views']) {

					

						$count = $oto['hotlink_num'];

						while($count > 0) {

							mysql_query("insert into hotlinks (userid,max) values('$userid','".$oto['hotlink_views']."')");

							$count--;

						}

					}


				if($oto['login_num'] AND $oto['login_views']) {
					
						$count = $oto['login_num'];
						while($count > 0) {
							mysql_query("insert into loginads (userid,max) values('$userid','".$oto['login_views']."')");
							$count--;
						}
					}
                                                                  if($oto['topnav_num']) {
					
				$count = $oto['topnav_num'];
						while($count > 0) {		
							mysql_query("INSERT INTO `topnav` (`userid` , `date`) VALUES ('".$userid."', '".time()."')");
	
					$count--;
						}
					}

                                                                  if($oto['botnav_num']) {
					
				$count = $oto['botnav_num'];
						while($count > 0) {		
							mysql_query("INSERT INTO `botnav` (`userid` , `date`) VALUES ('".$userid."', '".time()."')");
	
					$count--;
						}
					}
	
				if($oto['solo_num']) {

				

					$count = $oto['solo_num'];

					while($count > 0) {

						mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");

						$count--;

					}

				}
					if($oto['hheadlinead_num'] AND $oto['hheadlinead_views']) {
						$count = $oto['hheadlinead_num'];
						while($count > 0) {
							mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','".$oto['hheadlinead_views']."',NOW())");
							$count--;
							}
						}
					if($oto['hheaderad_num'] AND $oto['hheaderad_views']) {
						$count = $oto['hheaderad_num'];
						while($count > 0) {
							mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','".$oto['hheaderad_views']."',NOW())");
							$count--;
							}
						}
				if($oto['upgrade_pro']=="1") {
					upgrade_jv($userid);
					}
					
				if($oto['upgrade_pro']=="2") {
					upgrade_superjv($userid);
					}
			
} # if ($ap_status == $payza_status)
			} 
			
			elseif($item == $sitename." - ".$userid) 
				{
				$howmanypositions = $_POST['apc_2'];
				$adpackid = $_POST['apc_3'];
				$firstmatrixq = "select * from matrixconfiguration order by id limit 1";
				$firstmatrixr = mysql_query($firstmatrixq);
				$firstmatrixrows = mysql_num_rows($firstmatrixr);
				if ($firstmatrixrows > 0)
					{
						$firstmatrixid = mysql_result($firstmatrixr,0,"id");
						$matrixid = $firstmatrixid;
						include "matrixadd.php";
						while($howmanypositions > 0)
							{
								# get configuration details for matrix.
								$mq = "select * from matrixconfiguration where id=\"$matrixid\"";
								$mr = mysql_query($mq);
								$mrows = mysql_num_rows($mr);
								if ($mrows > 0)
								{
								$matrixlevelname = mysql_result($mr,0,"matrixlevelname");
								$matrixwidth = mysql_result($mr,0,"matrixwidth");
								$matrixdepth = mysql_result($mr,0,"matrixdepth");
								$matrixprice = mysql_result($mr,0,"matrixprice");
								$matrixpayout = mysql_result($mr,0,"matrixpayout");
								$givereentrythislevel = mysql_result($mr,0,"givereentrythislevel");
								$cyclecommissionforsponsor = mysql_result($mr,0,"cyclecommissionforsponsor");
								$matrixsequence = mysql_result($mr,0,"matrixsequence");
								MatrixAdd($userid,$matrixlevelname,$matrixwidth,$matrixdepth,$matrixprice,$matrixpayout,$givereentrythislevel,$matrixsequence,$matrixid,$cyclecommissionforsponsor);
								} # } # if ($mrows > 0)
								$howmanypositions--;
						} # while($howmanypositions > 0)
					} # if ($firstmatrixrows > 0)
				}
				
			elseif($item == $sitename." Points ".$userid) {

				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - 1000 points','".time()."','$amount\$')");
				

				mysql_query("UPDATE members SET points=points+1000 WHERE userid = '".$userid."'");

			} elseif($item == $sitename." Solo Ad ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Solo Ad','".time()."','$amount\$')");
				
		
					mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");


			} elseif($item == $sitename." Daily Bonus ".$userid) {
			
				$rented = $_POST['apc_2'];
				mysql_query("insert into dailybonus (userid,rented) values('$userid','$rented')");

				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Daily Bonus $rented','".time()."','$amount\$')");	
				
										
				

			} elseif($item == $sitename." Banner Impressions ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Banner Impressions','".time()."','$amount\$')");
				
				
					mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");

				
			} elseif($item == $sitename." Button Ad ".$userid) {


				mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");
		
	mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Button Banner Ad','".time()."','$amount\$')");



			}  elseif($item == $sitename." Top Navigation Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Top Navigation link','".time()."','$amount\$')");
				
									mysql_query("INSERT INTO `topnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
									}  elseif($item == $sitename." Bottom Navigation Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Bottom Navigation link','".time()."','$amount\$')");
				
									mysql_query("INSERT INTO `botnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
									}

				
			 elseif($item == $sitename." Solo Footer Ad ".$userid) {



				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - ".$quantity." solo footer ad','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into footerads (userid,paid) values('$userid','100')");
					$quantity--;
				}
				

			} elseif($item == $sitename." Full Page Login Ad ".$userid) {
			
				$rented = $_POST['apc_2'];
				mysql_query("insert into fullloginads (userid,rented,purchase) values('$userid','$rented',NOW())");

				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Full Page Login Ad $rented','".time()."','$amount\$')");	
				

			} elseif($item == $sitename." Featured Ad ".$userid) {
			
				$featuredadmaxhits = $_POST['apc_2'];
				mysql_query("insert into featuredads (userid,max,purchase) values('$userid','$featuredadmaxhits',NOW())");

				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Featured Ad $featuredadmaxhits Impressions','".time()."','$amount\$')");	
				

			} elseif($item == $sitename." Hot Headline Ad ".$userid) {
				$hheadlineadmaxhits = $_POST['apc_2'];
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Hot Headline Ad $hheadlineadmaxhits Impressions','".time()."','$amount\$')");	
				while($quantity > 0) {
					mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','$hheadlineadmaxhits',NOW())");
					$quantity--;
				}
			} elseif($item == $sitename." Hot Header Ad ".$userid) {
				$hheaderadmaxhits = $_POST['apc_2'];
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Hot Header Ad $hheaderadmaxhits Clicks','".time()."','$amount\$')");
				while($quantity > 0) {
					mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','$hheaderadmaxhits',NOW())");
					$quantity--;
				}
			} elseif($item == $sitename." Login Ad ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Login ad','".time()."','$amount\$')");
				
					mysql_query("insert into loginads (userid,max) values('$userid','1000')");


			} elseif($item == $sitename." Traffic link 50 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Traffic link 50','".time()."','$amount\$')");
				

					mysql_query("insert into tlinks (userid,paid) values('$userid','50')");

				
			} elseif($item == $sitename." Traffic link 100 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Traffic link 100','".time()."','$amount\$')");
				

					mysql_query("insert into tlinks (userid,paid) values('$userid','100')");

				

			} elseif($item == $sitename." Traffic link 200 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment -  Traffic link 200','".time()."','$amount\$')");
				

					mysql_query("insert into tlinks (userid,paid) values('$userid','200')");

						

			} elseif($item == $sitename." PTC 1 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - PTC 50','".time()."','$amount\$')");
				

					mysql_query("insert into ptcads (userid,paid) values('$userid','50')");

				
			} elseif($item == $sitename." PTC 2 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - PTC 100','".time()."','$amount\$')");
				

					mysql_query("insert into ptcads (userid,paid) values('$userid','100')");

				

			} elseif($item == $sitename." PTC 3 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment -  PTC 200','".time()."','$amount\$')");
				

					mysql_query("insert into ptcads (userid,paid) values('$userid','200')");

						

			} elseif($item == $sitename." Hot Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Hot Link','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','5000')");		
					
			} elseif($item == $sitename." Hot Link Pack 2 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Hot Link 2','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','10000')");	

			} elseif($item == $sitename." Hot Link Pack 3 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Payza payment - Hot Link 3','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','20000')");	

					

			} elseif($item == $sitename." Membership ".$userid) {

if ((($jvinterval == "Lifetime") and ($ap_status == "Success")) or (($jvinterval != "Lifetime") and ($ap_status == "Subscription-Payment-Success")))
{
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - " . $middlelevel . " Member Upgrade','".time()."','$amount\$')");
				upgrade_jv($userid);
}			

			} elseif($item == $sitename." " . $toplevel . " Membership ".$userid) {

if ((($superjvinterval == "Lifetime") and ($ap_status == "Success")) or (($superjvinterval != "Lifetime") and ($ap_status == "Subscription-Payment-Success")))
{
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - " . $toplevel . " Upgrade','".time()."','$amount\$')");
				upgrade_superjv($userid);
}	

			} elseif($item == $sitename." Special Offer") {

				$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");
				$offer = mysql_fetch_array($sql);
if ($offer['priceinterval'] == "onetime")
{
$payza_status = "Success";
}
if ($offer['priceinterval'] != "onetime")
{
$payza_status = "Subscription-Payment-Success";
}
if ($ap_status == $payza_status)
{
mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Special Offer','".time()."','$amount\$')");

				if($offer['points']) mysql_query("UPDATE members SET points=points+".$offer['points']." WHERE userid='".$userid."'");

				if($offer['surfcredits']) mysql_query("UPDATE members SET surfcredits=surfcredits+".$offer['surfcredits']." WHERE userid='".$userid."'");

				if($offer['banner_num'] AND $offer['banner_views']) {

				

					$count = $offer['banner_num'];

					while($count > 0) {

						mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$offer['banner_views']."', '0')");

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

				if($offer['hotlink_num'] AND $offer['hotlink_views']) {
					
						$count = $offer['hotlink_num'];
						while($count > 0) {
							mysql_query("INSERT INTO hotlinks (userid,max,purchase) values('$userid','".$offer['hotlink_views']."','".time()."')");
							$count--;
						}
					} if($offer['solo_num']) {

				

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
} # if ($ap_status == $payza_status)
			}

		
elseif($item == $sitename." Special Offer Ad Package") {

				$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");
				$offer = mysql_fetch_array($sql);

if ($offer['priceinterval'] == "onetime")
{
$payza_status = "Success";
}
if ($offer['priceinterval'] != "onetime")
{
$payza_status = "Subscription-Payment-Success";
}
if ($ap_status == $payza_status)
{
mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Payza payment - Special Offer Ad Package','".time()."','$amount\$')");
		

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

				if($offer['hotlink_num'] AND $offer['hotlink_views']) {
					
						$count = $offer['hotlink_num'];
						while($count > 0) {
							mysql_query("INSERT INTO hotlinks (userid,max,purchase) values('$userid','".$offer['hotlink_views']."','".time()."')");
							$count--;
						}
					} if($offer['solo_num']) {

				

					$count = $offer['solo_num'];

					while($count > 0) {

						mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");

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

			} # if ($ap_status == $payza_status)

} 

		}

		

		

   	}

	else{

		/* Security code doesn't match. POST IS NOT FROM PAYZA.

		 * Ignore post, or do whatever fraud catching that you would like.

		 */

	}

?>