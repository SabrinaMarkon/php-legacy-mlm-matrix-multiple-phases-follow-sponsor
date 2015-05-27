<?php
session_start();
include "config.php";
require('EgoPaySci.php');
$flid = $_GET['flid'];
$url = $_GET['url'];
if (($flid != "") and ($url != ""))
{
$url = $domain."/fullloginad.php?flid=".$flid."&url=".urlencode($url);
}
else
{
$url = $domain."/members/index.php";
}
?>
<html>

<head><meta name="robots" content="noindex,nofollow">

<title>Special Offer</title>

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
<img src="/images/header.jpg" border="0">
<TABLE width="960px" height="400" border="1" cellpadding="10" cellspacing="10" bordercolor="#00008b" bgcolor="#FFFFFF">



  <TR bgcolor="#FFFFFF">



    <TD valign="top">

     

<?



		$query = "SELECT * FROM pages where name='Offer page'";

		$result = mysql_query ($query)

			or die ("Query failed");

		while ($line = mysql_fetch_array($result)) {

			$htmlcode = $line["htmlcode"];

			echo $htmlcode;

		}



?>





		<p align="center"><b><font face="Tahoma" size="4" color="#008000">MAKE SURE TO CLICK RETURN TO MERCHANT (<? echo $adminname; ?>)<br></font></font></b></p>&nbsp;<P align=center>

<?

		

			$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");

			$offer = mysql_fetch_array($sql);

?>



						 <table style="width: 80%; height: 100px" cellspacing="0" cellpadding="0" align="center">

						 <tr>





<? 
#PAYPAL	
if($paypal<>"") { ?>
<td align="center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? echo $paypal; ?>">
<input type="hidden" name="item_name" value="<? echo $sitename; ?> Special Offer">
<input type="hidden" name="amount" value="<? echo $offer['price']; ?>">
<input type="hidden" name="page_style" value="PayPal">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="return" value="<? echo $domain; ?>/members/advertise.php">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="hidden" name="on0" value="User ID">
<input type="hidden" name="os0" value="<? echo $userid; ?>">
<input type="hidden" name="notify_url" value="<? echo $domain; ?>/offer_ipn.php">
<input type="image" src="<? echo $domain; ?>/images/paypalsm.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
</td>
  <? } ?>
 <?php
# PAYZA	 
if ($adminpayza<>"") { ?>
<td align="center">
  <form method="post" action="https://secure.payza.com/checkout" > 
  <input type="hidden" name="ap_purchasetype" value="item"/> 
  <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
  <input type="hidden" name="ap_currency" value="USD"/>
  <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/advertise.php"/>
  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Special Offer"/> 
  <input type="hidden" name="ap_quantity" value="1"/>
  <input type="hidden" name="ap_amount" value="<? echo $offer['price']; ?>"/> 
  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
  <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png"/>    
  </form>
</td>
          <? }

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
		'amount'    => $offer['price'],
	/*
	 * Payment currency, USD/EUR
	 */
		'currency'  => 'USD',
	/*
	 * Description of the payment, limited to 120 chars
	 */
		'description' => $sitename . ' Special Offer',
	
	/*
	 * Optional fields
	 */
	'fail_url'	=> $domain,
	'success_url'	=> $domain. '/members/advertise.php',
	
	/*
	 * 8 Custom fields, hidden from users, limited to 100 chars.
	 * You can retrieve them only from your callback file.
	 */
	'cf_1' => $userid,
	'cf_2' => $sitename . ' Special Offer',
	'cf_3' => $offer['price'],
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
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $offer['price']; ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="item" value="<?php echo $sitename ?> Special Offer">
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
<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Special Offer">
<input type="hidden" name="ok_currency" value="usd">
<input type="hidden" name="ok_item_1_type" value="service">
<input type="hidden" name="ok_item_1_price" value="<?php echo $offer['price']; ?>">
<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
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
<input type="hidden" name="amount" value="<?php echo $offer['price']; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="user1" value="<?php echo $userid ?>">
<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>">
<input type="hidden" name="item_id" value="<?php echo $sitename ?> Special Offer">
<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
</form>
</td>
<?php
} # if ($adminsolidtrustpay != "")

# MONEYBOOKERS
		  if ($adminmoneybookers<>"") { ?>
<td align="center">
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/advertise.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/advertise.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $offer['price']; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Special Offer">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Special Offer">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
</form>
</td> 
          <? }

          ?>


						</tr>

						</table>

 





						</center></p>

						<p align="center"><font face="verdana" size="2">

						<span style="background-color: #FFFF00">**Do Not Forget To Click &quot;Return To Merchant (<? echo $adminname; ?>)&quot; After Payment**</span></p>

						</font><font face="verdana" size="2">

						</p>

						

						<p align="center"><b>If you are not interested, click the link below.</b></p>

						<p align="center"><a href="<?php echo $url ?>"><b>No, thanks. Just send me to <? echo $sitename; ?></a></b></font></font></td>

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

   				