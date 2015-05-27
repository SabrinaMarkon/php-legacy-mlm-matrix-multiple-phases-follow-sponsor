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
		$result = mysql_query ($query);
		$numrows = @ mysql_num_rows($result);
		if ($numrows == 1) {
		$user = mysql_fetch_array($result);
		$paypal = $user["paypal_email"];
		$payza = $user["payza_email"];
		$egopay = $user["egopay_account"];
		$perfectmoney = $user["perfectmoney_account"];
		$okpay = $user["okpay_account"];
		$solidtrustpay = $user["solidtrustpay_account"];
		$moneybookers = $user["moneybookers_email"];
		$referid = $user["referid"];
		$paychoice = "Paypal";
		$transaction = $txn_id;
		}

		mysql_query("INSERT INTO transactions VALUES ('id','".$userid."','Paypal payment - " . $middlelevel . " Member Upgrade','".time()."','$payment_amount\$')");
		upgrade_jv($userid);

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