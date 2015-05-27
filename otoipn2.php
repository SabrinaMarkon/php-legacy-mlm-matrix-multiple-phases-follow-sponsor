<?



include "config.php";



$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {

$value = urlencode(stripslashes($value));

$req .= "&$key=$value";

//Remove this line after you have debugged

//print $req;

}



// post back to PayPal system to validate

$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Host: www.paypal.com\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);



// assign posted variables to local variables

$payment_status = $_POST['payment_status'];

$payment_amount = $_POST['mc_gross'];

$payment_currency = $_POST['mc_currency'];

$quantity = $_POST['quantity'];

$txn_id = $_POST['txn_id'];

$receiver_email = $_POST['receiver_email'];

$payer_email = $_POST['payer_email'];

$userid = $_POST['option_selection1'];



// email header

$em_headers  = "From: $receiver_email\n";		

$em_headers .= "Reply-To: $receiver_email\n";

$em_headers .= "Return-Path: $receiver_email\n";



if (!$fp) {

// HTTP ERROR

} else {

fputs ($fp, $header . $req);

while (!feof($fp)) {

$res = fgets ($fp, 1024);

if (strcmp ($res, "VERIFIED") == 0) {

print "VERIFIED";

// check the payment_status is Completed

// check that txn_id has not been previously processed

// check that receiver_email is your Primary PayPal email

// check that payment_amount/payment_currency are correct

// process payment



	if ($receiver_email == $paypal AND $payment_status == "Completed") {



		$query = "select * from members where userid='".$userid."'";

		$result = mysql_query ($query)

		           		or die ("Query failed");

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
$paychoice = "Paypal";
$transaction = $txn_id;
												$projvcom=0;
                                                $jvjvcom=0;
                                                $superjvjvcom=0;
                                                $prosupercom=0;
                                                $jvsupercom=0;
                                                $superjv2supercom=0;
		
		
			mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - OTO','".time()."','$payment_amount\$')");

			$sql = mysql_query("SELECT * FROM oto LIMIT 1");
			$oto = mysql_fetch_array($sql);
	

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
		

		} else {

		//Error

		

		$message = "User can't be found\n\nAmount: $payment_amount\nPayer email: $payer_email\nUser ID: $userid";

		mail($paypal_email, "Invalid order", $message, $em_headers);

		

		}

	

	}





}

else if (strcmp ($res, "INVALID") == 0) {

// log for manual investigation

print "NOT VERIFIED";



}

}

fclose ($fp);

}



mysql_close();







?>