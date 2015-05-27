<?
include "../config.php";
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
//Remove this line after you have debugged
//print $req;
}

// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);

// assign posted variables to local variables
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$quantity = $_POST['quantity'];
$userid = $_POST['option_selection1'];
$item = $_POST['item_name'];

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

if ($payment_status == "Completed" AND $receiver_email == $paypal) {

		$query = "select * from members where userid='".$userid."'";
		$result = mysql_query ($query)
		           		or die ("Query failed");
		$numrows = @ mysql_num_rows($result);


		if ($numrows == 1) {
		
			$user = mysql_fetch_array($result);
			buycommission($user['referid'], $payment_amount);

			
			if($item == $sitename." Points ".$userid) {
				mysql_query("UPDATE members SET points=points+".(1000* $quantity)." WHERE userid = '".$userid."'");
	
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".(1000* $quantity)." points','".time()."','$payment_amount\$')");
				
				
			} elseif($item == $sitename." Solo Ad ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." solos','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");
					$quantity--;
				}

			} elseif($item == $sitename." Hot Headline Ad ".$userid) {
			
				$hheadlineadmaxhits = $_POST['option_selection2'];
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Hot Headline Ad $hheadlineadmaxhits Clicks','".time()."','$amount\$')");
				while($quantity > 0) {
					mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','$hheadlineadmaxhits',NOW())");
					$quantity--;
				}
			} elseif($item == $sitename." Hot Header Ad ".$userid) {
			
				$hheaderadmaxhits = $_POST['option_selection2'];
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Header Ad $hheaderadmaxhits Clicks','".time()."','$amount\$')");
				while($quantity > 0) {
					mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','$hheaderadmaxhits',NOW())");
					$quantity--;
				}
			}  elseif($item == $sitename." Banner Impressions ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." banners','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");
					$quantity--;
				}
				
			} elseif($item == $sitename." Button Ad ".$userid) {


				mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '1000', '0')");
		
	mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - Button Banner Ad','".time()."','$amount\$')");



			}  elseif($item == $sitename." Top Navigation Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." top navigation link','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("INSERT INTO `topnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
					$quantity--;
				}
				
			} elseif($item == $sitename." Bottom Navigation Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." bottom navigation link','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("INSERT INTO `botnav` ( `userid` , `date`) VALUES ('".$userid."', '".time()."')");
					$quantity--;
				}
				
			} elseif($item == $sitename." Login Ad ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." login ad','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into loginads (userid,max) values('$userid','1000')");
					$quantity--;
				}

			} elseif($item == $sitename." Traffic link 50 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." traffic link 50','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into tlinks (userid,paid) values('$userid','50')");
					$quantity--;
				}
				
			} elseif($item == $sitename." Traffic link 100 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." traffic link 100','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into tlinks (userid,paid) values('$userid','100')");
					$quantity--;
				}
				

			} elseif($item == $sitename." Traffic link 200 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." traffic link 200','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into tlinks (userid,paid) values('$userid','200')");
					$quantity--;
				}
				
				
				
				
			} elseif($item == $sitename." PTC 1 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." PTC 50','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into ptcads (userid,paid) values('$userid','50')");
					$quantity--;
				}
				
			} elseif($item == $sitename." PTC 2 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." PTC 100','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into ptcads (userid,paid) values('$userid','100')");
					$quantity--;
				}
				

			} elseif($item == $sitename." PTC 3 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." PTC 200','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into ptcads (userid,paid) values('$userid','200')");
					$quantity--;
				}
				
				
				
				
			} elseif($item == $sitename." Solo Footer Ad ".$userid) {



				mysql_query("INSERT INTO transactions VALUES ('id', '".$userid."','Paypal payment - ".$quantity." solo footer ad','".time()."','$payment_amount\$')");
				
				while($quantity > 0) {
					mysql_query("insert into footerads (userid,paid) values('$userid','100')");
					$quantity--;
				}
				

			} elseif($item == $sitename." Full Page Login Ad ".$userid) {
			
				$rented = $_POST['option_selection2'];
				mysql_query("insert into fullloginads (userid,rented,purchase) values('$userid','$rented',NOW())");

				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Full Page Login Ad $rented','".time()."','$amount\$')");	
				

			} elseif($item == $sitename." Featured Ad ".$userid) {
			
				$featuredadmaxhits = $_POST['option_selection2'];
				mysql_query("insert into featuredads (userid,max,purchase) values('$userid','$featuredadmaxhits',NOW())");

				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Featured Ad $featuredadmaxhits Impressions','".time()."','$amount\$')");	
				

			} elseif($item == $sitename." Hot Link ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Hot Link','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','5000')");		
					
			} elseif($item == $sitename." Hot Link Pack 2 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Hot Link 2','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','10000')");	

			} elseif($item == $sitename." Hot Link Pack 3 ".$userid) {
				mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - Hot Link 3','".time()."','$amount\$')");
				
					mysql_query("insert into hotlinks (userid,max) values('$userid','20000')");	

					

			} 
	
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