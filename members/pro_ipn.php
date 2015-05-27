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

		mysql_query("INSERT INTO transactions VALUES ('".$userid."','Paypal payment - Pro Upgrade','".time()."','$payment_amount\$')");

		upgrade_pro($userid);



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