<?php
include "config.php";
require('EgoPaySci.php');
?>



<html>



<head><meta name="robots" content="noindex,nofollow">



<title>One-Time Offer</title>



<style>



<!--



BODY {



background-image: url(/images/bg.jpg);



background-repeat:repeat-x,y;



background-position:top;



background-attachment:fixed;



margin-top: 0px;



margin-bottom: 0px;



}



--></style>



</head>







<center>

<img src="/images/header.jpg">

<TABLE width="960px" height="400" border="1" cellpadding="10" cellspacing="10" bordercolor="#00008b" bgcolor="#FFFFFF">







  <TR bgcolor="#FFFFFF">







    <TD valign="top">







      <p align="left"><font face="Tahoma" size="3"><center>



	  <img src="<? echo $domain; ?>/images/dont.gif">



	  </center><BR><BR>



	  Thank you for confirming your email address!</font></p>











<?







		$query = "SELECT * FROM pages where name='OTO'";



		$result = mysql_query ($query)



			or die ("Query failed");



		while ($line = mysql_fetch_array($result)) {



			$htmlcode = $line["htmlcode"];



			echo $htmlcode;



		}







?>











		<p align="center"><b><font face="Tahoma" size="4" color="#008000">MAKE SURE TO CLICK RETURN TO MERCHANT (<? echo $adminname; ?>)<br></font></font></b></p>&nbsp;<P align=center>



<?



		



			$sql = mysql_query("SELECT * FROM oto LIMIT 1");



			$oto = mysql_fetch_array($sql);



?>











<center>



						 <table style="width: 80%; height: 100px" cellspacing="0" cellpadding="0" align="center">



						 <tr>







<? 
# PAYPAL
if($paypal<>"")
{ 
if ($oto['priceinterval'] == "onetime")
{	
?>
<td align="center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? echo $paypal; ?>">
<input type="hidden" name="item_name" value="<? echo $sitename; ?> One-Time Offer">
<input type="hidden" name="item_number" value="<? echo $sitename; ?> OTO#1">
<input type="hidden" name="amount" value="<? echo $oto['price']; ?>">
<input type="hidden" name="page_style" value="PayPal">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="return" value="<? echo $domain; ?>/thank-you-alot.php">
<input type="hidden" name="cancel_return" value="<? echo $domain; ?>/">
<input type="hidden" name="cn" value="Where did you hear about us?">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="hidden" name="on0" value="User ID">
<input type="hidden" name="os0" value="<? echo $_GET['id']; ?>">
<input type="hidden" name="notify_url" value="<? echo $domain; ?>/otoipn2.php">
<input type="image" src="<? echo $domain; ?>/images/paypalsm.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
</td>
<? 
}
if ($oto['priceinterval'] != "onetime")
{
?>
<td align="center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick-subscriptions">
<input type="hidden" name="business" value="<? echo $paypal; ?>">
<input type="hidden" name="item_name" value="<? echo $sitename; ?> One-Time Offer">
<input type="hidden" name="item_number" value="monthly">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="<? echo $domain; ?>/images/paypalsm.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="hidden" name="a3" value="<? echo $oto['price']; ?>">
<input type="hidden" name="return" value="<? echo $domain; ?>/members/thank-you-alot.php">
<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="M">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">
<input type="hidden" name="on0" value="User ID">
<input type="hidden" name="os0" value="<? echo $_GET['id']; ?>">
<input type="hidden" name="notify_url" value="<? echo $domain; ?>/otoipn2.php">
</form>
</td>
<?
}
}
# PAYZA
if ($adminpayza<>"") 
{ 
if ($oto['priceinterval'] == "onetime")
	{
?>
<td align="center">
<form method="post" action="https://secure.payza.com/checkout" > 
<input type="hidden" name="ap_purchasetype" value="item"/> 
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
<input type="hidden" name="ap_currency" value="USD"/> 
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/thank-you-alot.php"/>  
<input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> One-Time Offer"/> 
<input type="hidden" name="ap_itemcode" value="<? echo $sitename; ?> OTO#1"/> 
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $oto['price']; ?>"/> 
<input type="hidden" name="apc_1" value="<? echo $_GET['id']; ?>"> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png"/> 
</form>
</td>
<?
	}
if ($oto['priceinterval'] != "onetime")
	{
?>
<td align="center">
<form method="post" action="https://secure.payza.com/checkout">
<input type="hidden" name="ap_purchasetype" value="subscription"> 
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>">
<input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> One-Time Offer">
<input type="hidden" name="ap_currency" value="USD">
<input type="hidden" name="apc_1" value="<? echo $_GET['id']; ?>">
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/thank-you-alot.php">
<input type="hidden" name="ap_quantity" value="1">
<input type="hidden" name="ap_amount" value="<? echo $oto['price']; ?>">
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png"/> 
<input type="hidden" name="ap_timeunit" value="month">
<input type="hidden" name="ap_periodlength" value="1"> 
</form>
</td>
<?
	}
}
# EGOPAY
if (($egopay_store_id!="") and ($egopay_store_password!=""))
{
try {
		
	$oEgopay = new EgoPaySci(array(
		'store_id'          => $egopay_store_id,
		'store_password'    => $egopay_store_password
	));
	
	$sPaymentHash = $oEgopay->createHash(array(
	/*
	 * Payment amount with two decimal places 
	 */
		'amount'    => $oto['price'],
	/*
	 * Payment currency, USD/EUR
	 */
		'currency'  => 'USD',
	/*
	 * Description of the payment, limited to 120 chars
	 */
		'description' => $sitename . ' One-Time Offer',
	
	/*
	 * Optional fields
	 */
	'fail_url'	=> $domain,
	'success_url'	=> $domain. '/thank-you-alot.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $_GET['id'],
	'cf_2' => $sitename . ' One-Time Offer',
	'cf_3' => $oto['price'],
	//'cf_4' => '',
	//'cf_5' => '',
	//'cf_6' => '',
	//'cf_7' => '',
	//'cf_8' => '',
	));
	
} catch (EgoPayException $e) {
	die($e->getMessage());
}
?>
<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
<td align="center">
<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
</form>
</td>
<?php
} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

# PERFECT MONEY
if ($adminperfectmoney != "")
{
?>
<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<td align="center">
<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $oto['price']; ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you-alot.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
<input type="hidden" name="userid" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> One-Time Offer">
<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
</form>
</td>
<?php
} # if ($adminperfectmoney != "")

# OKPAY
if ($adminokpay != "")
{
?>
<form  method="post" action="https://www.okpay.com/process.html">
<td align="center">
<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> One-Time Offer">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $oto['price']; ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you-alot.php">
<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>">
<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
</form>
</td>
<?php
} # if ($adminokpay != "")

# SOLID TRUST PAY
if ($adminsolidtrustpay != "")
{
?>
<form action="https://solidtrustpay.com/handle.php" method="post">
<td align="center">
<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
<input type="hidden" name="sci_name" value="your_sci_name">
<input type="hidden" name="amount" value="<?php echo $oto['price']; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you-alot.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> One-Time Offer">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
if ($adminmoneybookers != "")
{
?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td align="center">
<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you-alot.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<?php echo $oto['price']; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,item">
<input type="hidden" name="userid" value="<?php echo $_GET['id']; ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> One-Time Offer">
<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> One-Time Offer">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td>
<?php
} # if ($adminmoneybookers != "")
?>









						</tr>



						</table>







   



</center>



						</p>



						<p align="center"><font face="verdana" size="2">



						<span style="background-color: #FFFF00">**Do Not Forget To Click &quot;Return To Merchant (<? echo $adminname; ?>)&quot; After Payment**</span></p>



						</font><font face="verdana" size="2">



						</p>



						<p>If you are not interested, click the link below. <b>



						But remember - </b>you will not get another chance at 



						this offer!&nbsp; </p>



						<p><a href="<? echo $domain; ?>/memberlogin.php">No, thanks. Just 



						send me to <? echo $sitename; ?></a></font></td>



					</tr>



				</table>



			</div>



			</td>



		</tr>



	</table>



</div>



</body>



</html>



<?



mysql_close();



?>