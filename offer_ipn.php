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


		
			mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal Special Offer Ad Package','".time()."','$payment_amount\$')");
		

			$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");
			$offer = mysql_fetch_array($sql);
		

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