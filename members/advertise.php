<?php
session_start();
include "../config.php";
require('../EgoPaySci.php');
include "../header.php";
include "../style.php";
if ( !session_is_registered("ulogin") )
{
   ?>
   <!-- Not Logged In -->
   <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>
   <?
   include "../footer.php";
   exit;
}

if( session_is_registered("ulogin") )
   	{  // members only stuff!
   
   
   if($_POST['action'] = "resetbanner") {
	mysql_query("UPDATE banners SET show_clicks=0, show_views=0 WHERE id='".$_POST['id']."' AND userid='".$userid."'");
   }

if($_POST['action'] = "resetbuttons") {
	mysql_query("UPDATE buttons SET show_clicks=0, show_views=0 WHERE id='".$_POST['id']."' AND userid='".$userid."'");

   }
   
   if($_POST['dell']) {
	   $sql = mysql_query("DELETE FROM loginads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['dell'])."' LIMIT 1");
   }
   
    if($_POST['deldb']) {
	   mysql_query("DELETE FROM dailybonus where id='".intval($_POST['deldb'])."' and userid='".$_SESSION[uname]."'");
   }

   if($_POST['delt']) {
	   $sql = mysql_query("DELETE FROM tlinks where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delt'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM tlviews where tlid='".intval($_POST['delt'])."'");
   }
   
 if($_POST['delptc']) {
	   $sql = mysql_query("DELETE FROM ptcads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delptc'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM ptcadviews where tlid='".intval($_POST['delt'])."'");
   }
 if($_POST['delfullloginad']) {
	   $sql = mysql_query("DELETE FROM fullloginads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delfullloginad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM fullloginadviews where fullloginadid='".intval($_POST['delfullloginad'])."'");
   }
 if($_POST['delfeaturedad']) {
	   $sql = mysql_query("DELETE FROM ptcads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delfeaturedad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM featuredadclicks where featuredadid='".intval($_POST['delfeaturedad'])."'");
   }
  if($_POST['delhheadlinead']) {

	   $sql = mysql_query("DELETE FROM hheadlineads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delhheadlinead'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM hheadlineadclicks where hheadlineadid='".intval($_POST['delhheadlinead'])."'");
   }
 if($_POST['delhheaderad']) {

	   $sql = mysql_query("DELETE FROM hheaderads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delhheaderad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM hheaderadclicks where hheaderadid='".intval($_POST['delhheaderad'])."'");
   } 
##### Featured Ads, Full Page Login Ads, Hot Header/Headline Ads copyright 2010 Sabrina Markon, PearlsOfWealth.com webmaster@pearlsofwealth.com only.
if ($memtype == "SUPER JV")
{
$fullloginadprice = $superjvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricesuperjv;
$featuredadprice = $superjvfeaturedadprice;
$featuredadpointprice = $featuredadpointpricesuperjv;
$featuredadmaxhits = $superjvfeaturedadmaxhits;
$hheadlineadprice = $superjvhheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricesuperjv;
$hheadlineadmaxhits = $superjvhheadlineadmaxhits;
$hheaderadprice = $superjvhheaderadprice;
$hheaderadpointprice = $hheaderadpointpricesuperjv;
$hheaderadmaxhits = $superjvhheaderadmaxhits;
}
if ($memtype == "JV Member")
{
$fullloginadprice = $jvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricejv;
$featuredadprice = $jvfeaturedadprice;
$featuredadpointprice = $featuredadpointpricejv;
$featuredadmaxhits = $jvfeaturedadmaxhits;
$hheadlineadprice = $jvhheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricejv;
$hheadlineadmaxhits = $jvhheadlineadmaxhits;
$hheaderadprice = $jvhheaderadprice;
$hheaderadpointprice = $hheaderadpointpricejv;
$hheaderadmaxhits = $jvhheaderadmaxhits;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$fullloginadprice = $profullloginadprice;
$fullloginadpointprice = $fullloginadpointpricepro;
$featuredadprice = $profeaturedadprice;
$featuredadpointprice = $featuredadpointpricepro;
$featuredadmaxhits = $profeaturedadmaxhits;
$hheadlineadprice = $prohheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricepro;
$hheadlineadmaxhits = $prohheadlineadmaxhits;
$hheaderadprice = $prohheaderadprice;
$hheaderadpointprice = $hheaderadpointpricepro;
$hheaderadmaxhits = $prohheaderadmaxhits;
}
################################################

		include("navigation.php");
      include("../banners2.php");

        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
        //banner and solo ad payment buttons.

        ?>
		<p><font size=6>Advertising</font><br>
<?
 echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        
		$query = "SELECT * FROM pages where name='Advertiser Instructions'";
		$result = mysql_query ($query)
			or die ("Query failed");
		while ($line = mysql_fetch_array($result)) {
			$htmlcode = $line["htmlcode"];
			echo $htmlcode;
        }

?>

		
		<p>
		<b>Redeem Promo Code</b><br>
		<form method="post" action="promo.php">
		Code: <input type="text" name="code"><br>
		<input type="submit" value="Redeem Promo Code">
		</form>
		</p>
		<br><HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
		
		
		<p><b>Trade commissions for points</p></b>
		<p>Current conversion rate: 1$ = <? echo $pointrate; ?> points<br>
		<?
		if($commission) {
		?>
		You are owed <? echo round($commission,2); ?>$ commissions and you have <? echo $points; ?> points.<br>
		<form method="post" action="convert.php">
		Convert: <input type="text" name="amount">$<br>
		<input type="submit" value="Submit">
		</form>
		<?
		} else echo "You don't have any commission.";
		?>
		</p>


<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
		
		
		<p><b>Purchase Points</p></b>
          <p>Price $<? echo $pointprice; ?> per 1000 points.</p>
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Points <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $pointprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/payreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Points <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $pointprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }
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
					'amount'    => $pointprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Points ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Points ' . $userid,
				'cf_3' => $pointprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $pointprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Points <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Points <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $pointprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $pointprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Points <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $pointprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Points <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Points <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>
<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
<div style="width: 75%;">
		  <p><b><font style="background: yellow;">NEW!</font> Purchase FULL PAGE Login Ad</b></p>
            <p>Price $<? echo $fullloginadprice; ?>
<?php
if ($fullloginadpointprice > 0)
{
echo " or $fullloginadpointprice points per Full Page Login Ad";
}
echo " for unlimited visits to your website on the day of your choice!";
?>
</p>
<p><a href="fullloginadbuy.php"><font face="Tahoma" size="2" color="#ff0000">Click HERE to Order Your Full Page Login Ad!</font></a></p>
</div>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>  		  
<p><b><font style="background: yellow;">NEW!</font> Purchase Featured Ad</b></p>
<p>Price $<? echo $featuredadprice; ?>
<?php
if ($featuredadpointprice > 0)
{
echo " or $featuredadpointprice points per Featured Ad";
}
echo " for $featuredadmaxhits impressions.";
?>
</p>
<?
if (($featuredadpointprice > 0) and ($points >= $featuredadpointprice))
{
?>
<p><font face="Tahoma" size="2"><a href="trade.php?item=featuredad&featuredadpointprice=<?php echo $featuredadpointprice ?>&featuredadmaxhits=<?php echo $featuredadmaxhits ?>"><br>TRADE <?php echo $featuredadpointprice ?> POINTS</a></font></p>
<?
}
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Featured Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
				<input type="hidden" name="on1" value="Max">
				<input type="hidden" name="os1" value="<? echo $featuredadmaxhits; ?>">
	            <input type="hidden" name="amount" value="<? echo $featuredadprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Featured Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
		  <input type="hidden" name="apc_2" value="<? echo $featuredadmaxhits; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $featuredadprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $featuredadprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Featured Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Featured Ad ' . $userid,
				'cf_3' => $featuredadprice,
				'cf_4' => $featuredadmaxhits,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $featuredadprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item max">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Featured Ad <?php echo $userid ?>">
			<input type="hidden" name="max" value="<?php echo $featuredadmaxhits ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Featured Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $featuredadprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_item_1_custom_2_title" value="max">
			<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $featuredadmaxhits ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $featuredadprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="user2" value="<?php echo $featuredadmaxhits ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Featured Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $featuredadprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname,max">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Featured Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="max" value="<? echo $featuredadmaxhits; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Featured Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>	  
<p><b><font style="background: yellow;">NEW!</font> Purchase Hot Headline Adz</b></p>
<p>Price $<? echo $hheadlineadprice; ?>
<?php
if ($hheadlineadpointprice > 0)
{
echo " or $hheadlineadpointprice points per Hot Headline Ad";
}
echo " for $hheadlineadmaxhits clicks.";
?>
</p>
<?
if (($hheadlineadpointprice > 0) and ($points >= $hheadlineadpointprice))
{
?>
<p><font face="Tahoma" size="2"><a href="trade.php?item=hheadlinead&hheadlineadpointprice=<?php echo $hheadlineadpointprice ?>&hheadlineadmaxhits=<?php echo $hheadlineadmaxhits ?>"><br>TRADE <?php echo $hheadlineadpointprice ?> POINTS</a></font></p>
<?
}

          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Hot Headline Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
				<input type="hidden" name="on1" value="Max">
				<input type="hidden" name="os1" value="<? echo $hheadlineadmaxhits; ?>">
	            <input type="hidden" name="amount" value="<? echo $hheadlineadprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	      <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Hot Headline Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
		  <input type="hidden" name="apc_2" value="<? echo $hheadlineadmaxhits; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $hheadlineadprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $hheadlineadprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Hot Headline Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Hot Headline Ad ' . $userid,
				'cf_3' => $hheadlineadprice,
				'cf_4' => $hheadlineadmaxhits,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $hheadlineadprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item max">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Hot Headline Ad <?php echo $userid ?>">
			<input type="hidden" name="max" value="<?php echo $hheadlineadmaxhits ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Hot Headline Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $hheadlineadprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_item_1_custom_2_title" value="max">
			<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $hheadlineadmaxhits ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $hheadlineadprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="user2" value="<?php echo $hheadlineadmaxhits ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Hot Headline Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $hheadlineadprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname,max">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Hot Headline Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="max" value="<? echo $hheadlineadmaxhits; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Hot Headline Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>  
<p><b><font style="background: yellow;">NEW!</font> Purchase HOT Header Adz</b></p>
<p>Price $<? echo $hheaderadprice; ?>
<?php
if ($hheaderadpointprice > 0)
{
echo " or $hheaderadpointprice points per Hot Header Ad";
}
echo " for $hheaderadmaxhits clicks.";
?>
</p>
<?
if (($hheaderadpointprice > 0) and ($points >= $hheaderadpointprice))
{
?>
<p><font face="Tahoma" size="2"><a href="trade.php?item=hheaderad&hheaderadpointprice=<?php echo $hheaderadpointprice ?>&hheaderadmaxhits=<?php echo $hheaderadmaxhits ?>"><br>TRADE <?php echo $hheaderadpointprice ?> POINTS</a></font></p>
<?
}

          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Hot Header Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
				<input type="hidden" name="on1" value="Max">
				<input type="hidden" name="os1" value="<? echo $hheaderadmaxhits; ?>">
	            <input type="hidden" name="amount" value="<? echo $hheaderadprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	      <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Hot Header Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
		  <input type="hidden" name="apc_2" value="<? echo $hheaderadmaxhits; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $hheaderadprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $hheaderadprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Hot Header Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Hot Header Ad ' . $userid,
				'cf_3' => $hheaderadprice,
				'cf_4' => $hheaderadmaxhits,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $hheaderadprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item max">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Hot Header Ad <?php echo $userid ?>">
			<input type="hidden" name="max" value="<?php echo $hheaderadmaxhits ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Hot Header Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $hheaderadprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_item_1_custom_2_title" value="max">
			<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $hheaderadmaxhits ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $hheaderadprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="user2" value="<?php echo $hheaderadmaxhits ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Hot Header Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $hheaderadprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname,max">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Hot Header Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="max" value="<? echo $hheaderadmaxhits; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Hot Header Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>
<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
<p><b>Purchase Daily Bonus Navigation Button Banner Link</p></b>
<p align="center"><span style="background-color: #FFFF00"><b>Only $<? echo $dailybonusprice; ?></b></span></p>
<p align="center"><a href="<? echo $domain; ?>/members/dailybonus.php"><img src="/images/GetItNow.png" border="0"></a></p>
</p>
<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
		
		
		
		
		
          <p><b>Purchase Banner<br> Must Be 468x60 For Rotation...</p></b>
          <p>Price $<? echo $bannerprice; ?> or <? echo $bannerpointprice; ?> points per 1000 impressions.</p>
          <?
		  if($points >= $bannerpointprice) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=banner">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy banner impressions</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Banner Impressions <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $bannerprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Banner Impressions <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $bannerprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $bannerprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Banner Impressions ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Banner Impressions ' . $userid,
				'cf_3' => $bannerprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $bannerprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Banner Impressions <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Banner Impressions <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $bannerprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $bannerprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Banner Impressions <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $bannerprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Banner Impressions <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Banner Impressions <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
				  
	


	
          <p><b>Purchase Button (125x125) Banners </p></b>
          <p>Price $<? echo $buttonprice; ?> or <? echo $buttonpointprice; ?> points per 1000 impressions.</p>
          <?
		  if($points >= $buttonpointprice) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=button">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy button banner impressions</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Button Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $buttonprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Button Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $buttonprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $buttonprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Button Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Button Ad ' . $userid,
				'cf_3' => $buttonprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $buttonprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Button Ad <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Button Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $buttonprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $buttonprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Button Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $buttonprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Button Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Button Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

	<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>  
		  
          	<p><b>Purchase Solo Ads</b></p>
            <p>Price $<? echo $soloprice; ?> or <? echo $solopointprice; ?> points per solo ad.</p>
			
			
		  <?
		  if($points >= $solopointprice) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=solo">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a solo ad</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Solo Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $soloprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Solo Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $soloprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $soloprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Solo Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Solo Ad ' . $userid,
				'cf_3' => $soloprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $soloprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Solo Ad <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Solo Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $soloprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $soloprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Solo Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $soloprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Solo Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Solo Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
					  
	

		 <p><b>Purchase Hot Link 1</b></p>
            <p>Price $<? echo $hotlinkprice1; ?> or <? echo $hotlinkpointprice1; ?> points per hotlink with 5000 views.</p>
			
			
		  <?
		  if($points >= $hotlinkpointprice1) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=hotlink1">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a hot link</font></p>
		  <?
		  }
		  ?>
		  
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="http://marketersknowhow.com/images/paypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Hot Link <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $hotlinkprice1; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Hot Link <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $hotlinkprice1; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $hotlinkprice1,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Hot Link ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Hot Link ' . $userid,
				'cf_3' => $hotlinkprice1,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $hotlinkprice1 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Hot Link <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Hot Link <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $hotlinkprice1 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $hotlinkprice1 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Hot Link <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $hotlinkprice1; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Hot Link <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Hot Link <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>		  
		  
		  
		  
			   
			<br><br>
	
	<p><b>Purchase Hot Link 2</b></p>
            <p>Price $<? echo $hotlinkprice2; ?> or <? echo $hotlinkpointprice2; ?> points per hotlink with 10000 views.</p>
			
			
		  <?
		  if($points >= $hotlinkpointprice2) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=hotlink2">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a hot link</font></p>
		  <?
		  }
		  ?>
		  
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="http://marketersknowhow.com/images/paypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Hot Link Pack 2 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $hotlinkprice2; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Hot Link Pack 2 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $hotlinkprice2; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $hotlinkprice2,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Hot Link Pack 2 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Hot Link Pack 2 ' . $userid,
				'cf_3' => $hotlinkprice2,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $hotlinkprice2 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Hot Link Pack 2 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Hot Link Pack 2 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $hotlinkprice2 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $hotlinkprice2 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Hot Link Pack 2 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $hotlinkprice2; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Hot Link Pack 2 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Hot Link Pack 2 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>		  
		  
		  
		  
			   
			<br><br>	  
			
<p><b>Purchase Hot Link 3</b></p>
            <p>Price $<? echo $hotlinkprice3; ?> or <? echo $hotlinkpointprice3; ?> points per hotlink with 20000 views.</p>
			
			
		  <?
		  if($points >= $hotlinkpointprice3) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=hotlink3">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a hot link</font></p>
		  <?
		  }
		  ?>
		  
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="http://marketersknowhow.com/images/paypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Hot Link Pack 3 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $hotlinkprice3; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Hot Link Pack 3 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $hotlinkprice3; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $hotlinkprice3,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Hot Link Pack 3 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Hot Link Pack 3 ' . $userid,
				'cf_3' => $hotlinkprice3,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $hotlinkprice3 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Hot Link Pack 3 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Hot Link Pack 3 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $hotlinkprice3 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $hotlinkprice3 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Hot Link Pack 3 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/padireturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $hotlinkprice3; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Hot Link Pack 3 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Hot Link Pack 3 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>		  	  
		  
		  
               
          <HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>

     <p><b>Purchase Traffic Links 1</p></b>
		  
		  <p>Price $<? echo $tlinkprice1; ?> or <? echo $tlinkpoints1; ?> points per 50 link views.</p>
		  <?
		  if($points >= $tlinkpoints1) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=tlink1">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 50 links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Traffic Link 50 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $tlinkprice1; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Traffic Link 50 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $tlinkprice1; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $tlinkprice1,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Traffic Link 50 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Traffic Link 50 ' . $userid,
				'cf_3' => $tlinkprice1,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $tlinkprice1 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Traffic Link 50 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Traffic Link 50 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $tlinkprice1 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $tlinkprice1 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Traffic Link 50 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $tlinkprice1; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Traffic Link 50 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Traffic Link 50 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>				  
		<p><b>Purchase Traffic Links 2</p></b>
		  <p>Price $<? echo $tlinkprice2; ?> or <? echo $tlinkpoints2; ?> points per 100 link views.</p>
		  <?
		  if($points >= $tlinkpoints2) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=tlink2">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 100 links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Traffic Link 100 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $tlinkprice2; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Traffic Link 100 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $tlinkprice2; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $tlinkprice2,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Traffic Link 100 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Traffic Link 100 ' . $userid,
				'cf_3' => $tlinkprice2,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $tlinkprice2 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Traffic Link 100 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Traffic Link 100 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $tlinkprice2 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $tlinkprice2 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Traffic Link 100 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $tlinkprice2; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Traffic Link 100 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Traffic Link 100 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>		  
	<p><b>Purchase Traffic Links 3</p></b>	  
		  
		  <p>Price $<? echo $tlinkprice3; ?> or <? echo $tlinkpoints3; ?> points per 200 link views.</p>
		  <?
		  if($points >= $tlinkpoints3) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=tlink3">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 200 links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Traffic Link 200 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $tlinkprice3; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Traffic Link 200 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $tlinkprice3; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $tlinkprice3,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Traffic Link 200 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Traffic Link 200 ' . $userid,
				'cf_3' => $tlinkprice3,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $tlinkprice3 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Traffic Link 200 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Traffic Link 200 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $tlinkprice3 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $tlinkprice3 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Traffic Link 200 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $tlinkprice3; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Traffic Link 200 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Traffic Link 200 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>


 <HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>

     <p><b>Purchase Paid To Click 1</p></b>
		  
		  <p>Price $<? echo $ptc1; ?> or <? echo $ptc1points; ?> points per 50 ptc link views.</p>
		  <?
		  if($points >= $ptc1points) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=ptc1">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 50 ptc links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> PTC 1 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $ptc1; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> PTC 1 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $ptc1; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $ptc1,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' PTC 1 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' PTC 1 ' . $userid,
				'cf_3' => $ptc1,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $ptc1 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> PTC 1 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> PTC 1 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $ptc1 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $ptc1 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> PTC 1 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $ptc1; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> PTC 1 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> PTC 1 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>				  
		<p><b>Purchase Paid To Click 2</p></b>
		  <p>Price $<? echo $ptc2; ?> or <? echo $ptc2points; ?> points per 100 ptc link views.</p>
		  <?
		  if($points >= $ptc2points) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=ptc2">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 100 ptc links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> PTC 2 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $ptc2; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> PTC 2 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $ptc2; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $ptc2,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' PTC 2 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' PTC 2 ' . $userid,
				'cf_3' => $ptc2,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $ptc2 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> PTC 2 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> PTC 2 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $ptc2 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $ptc2 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> PTC 2 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $ptc2; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> PTC 2 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> PTC 2 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>		  
	<p><b>Purchase Paid To Click 3</p></b>	  
		  
		  <p>Price $<? echo $ptc3; ?> or <? echo $ptc3points; ?> points per 200 ptc link views.</p>
		  <?
		  if($points >= $ptc3points) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=ptc3">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy 200 ptc links view</font></p>
		  <?
		  }
		  ?>
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> PTC 3 <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $ptc3; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> PTC 3 <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $ptc3; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $ptc3,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' PTC 3 ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' PTC 3 ' . $userid,
				'cf_3' => $ptc3,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $ptc3 ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> PTC 3 <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> PTC 3 <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $ptc3 ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $ptc3 ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> PTC 3 <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $ptc3; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> PTC 3 <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> PTC 3 <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>


		
     <HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
				  
		<?
		  
		  $sql = mysql_query("SELECT * FROM topnav WHERE 1");
		  
		  if(@mysql_num_rows($sql) < $topnavmax) {

?>  
		  
		  <p><b>Purchase 7 Day Top Navigation Link - Must Be Set-Up At Time of Purchase!</p></b>
          <p>Price $<? echo $navtopprice; ?> or <? echo $navtoppointprice; ?> points per top navigation link.</p>
          	
		  <?
		  
		 		  
			  if($points >= $navtoppointprice) {
			  ?>
			   <p><font face="Tahoma" size="2"><a href="trade.php?item=navtop">Pay using your points</a></font></p>
			  <?
			  } else {
			  ?>
			   <p><font face="Tahoma" size="2">You don't have enough points to buy a top navigation link</font></p>
			  <?
			  }
			  ?>
			  
			  
			  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Top Navigation Link <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $navtopprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Top Navigation Link <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $navtopprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $navtopprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Top Navigation Link ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Top Navigation Link ' . $userid,
				'cf_3' => $navtopprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $navtopprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Top Navigation Link <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Top Navigation Link <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $navtopprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $navtopprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Top Navigation Link <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $navtopprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Top Navigation Link <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Top Navigation Link <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>			  
			  
			  
			  
			  
			<?
		  
		  } 


else echo "<font face=\"Tahoma\" size=\"2\">All top navigation links have been purchased. We only allow $topnavmax active top navigation links at a time.<br>Please check back later.</font>";
		  ?>

 <HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
				  
		<?
		  
		  $sql = mysql_query("SELECT * FROM botnav WHERE 1");
		  
		  if(@mysql_num_rows($sql) < $navmax) {

?>  
		  
		  <p><b>Purchase 7 Day Bottom Navigation Link - Must Be Set-Up At Time of Purchase!</p></b>
          <p>Price $<? echo $navprice; ?> or <? echo $navpricepoints; ?> points per bottom navigation link.</p>
          	
		  <?
		  
		 		  
			  if($points >= $navpricepoints) {
			  ?>
			   <p><font face="Tahoma" size="2"><a href="trade.php?item=botnav">Pay using your points</a></font></p>
			  <?
			  } else {
			  ?>
			   <p><font face="Tahoma" size="2">You don't have enough points to buy a bottom navigation link</font></p>
			  <?
			  }
			  ?>
			  
			  
			  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Bottom Navigation Link <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $navprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Bottom Navigation Link <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $navprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $navprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Bottom Navigation Link ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Bottom Navigation Link ' . $userid,
				'cf_3' => $navprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $navprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Bottom Navigation Link <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Bottom Navigation Link <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $navprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $navprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Bottom Navigation Link <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $navprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Bottom Navigation Link <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Bottom Navigation Link <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>			  
			  
			  
			  
			  
			<?
		  
		  } 


else echo "<font face=\"Tahoma\" size=\"2\">All bottom navigation links have been purchased. We only allow $navmax active bottom navigation links at a time. <br>Please check back later.</font>";
		  ?>


<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
		
		  
		  
		  
		  <p><b>Purchase Login Ad</b></p>
            <p>Price $<? echo $loginprice; ?> or <? echo $loginpricepoints; ?> points per login ad with 1000 views.</p>
			
			
		  <?
		  if($points >= $loginpricepoints) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=login">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a login ad</font></p>
		  <?
		  }
		  ?>
		  
		  
          <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Login Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $loginprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Login Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $loginprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'amount'    => $loginprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Login Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Login Ad ' . $userid,
				'cf_3' => $loginprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $loginprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Login Ad <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Login Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $loginprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $loginprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Login Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $loginprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Login Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Login Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>


	      <p><b>Purchase 100 Solo Footer Ads Clicks<BR><BR>Your Solo Footer Ad will be rotated randomly until it gets 100 clicks.</p></b>
          <p>Price <? echo $safprice; ?> or <? echo $safpointprice; ?> Points for Solo Footer Ads</p>

       
		
          	  <?
		     if($points >= $safpointprice) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=saf"><b>Pay using your points</b></a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a Solo Footer Ad</font></p>
		  <?
		  }
		  
		  ?>
		  		  <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Solo Footer Ad <? echo $userid; ?>">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $safprice; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Solo Footer Ad <? echo $userid; ?>"/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $safprice; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }
		 
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
					'amount'    => $safprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Solo Footer Ad ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Solo Footer Ad ' . $userid,
				'cf_3' => $safprice,
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $safprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Solo Footer Ad <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Solo Footer Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $safprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $safprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Solo Footer Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $safprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Solo Footer Ad <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Solo Footer Ad <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>


<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>
				  
	<?

$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");

			$offer = mysql_fetch_array($sql);

?>

<p><b>Trade commissions for Special Offer Ad Package</p></b>
		<p>Special Offer Price: $<? echo $offer['price']; ?><br>
		<?
		if($commission >= $offer['price']) {
		?>

		You are owed <? echo round($commission,2); ?>$ commissions
		 <p><font face="Tahoma" size="2"><a href="commissionexchange.php?item=specialoffer"><b>Trade Now</b></a></font></p>
		<?
		} else echo "You don't have enough commissions to trade.";
		?>
</p>


		
<p><b>Purchase Special Offer Ad Package</p></b>
          <p>Price <? echo $offer['price']; ?> or <? echo $sopointprice; ?> Points for Special Offer Ad Package</p>
		  <?
		 
		     if($points >= $sopointprice) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=offer">Pay using your points</a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy the Special Offer Ad Package</font></p>
		  <?
		  }
		  
		  ?>
		  <?
          if ($paypal<>"") { ?>
	            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	            <input type="hidden" name="cmd" value="_xclick">
	            <input type="hidden" name="business" value="<? echo $paypal; ?>">
	            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Special Offer Ad Package ">
	            <input type="hidden" name="on0" value="User ID">
				<input type="hidden" name="os0" value="<? echo $userid; ?>">
	            <input type="hidden" name="amount" value="<? echo $offer['price']; ?>">
				<input type="hidden" name="undefined_quantity" value="1">
	            <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="return" value="<? echo $domain; ?>/members/paidreturn.php">
                <input type="hidden" name="cancel" value="<? echo $domain; ?>/members/payreturn.php">
				<input type="hidden" name="notify_url" value="<? echo $domain; ?>/offer_ipn.php">
	            <input type="hidden" name="currency_code" value="USD">
	            </form>
          <? }
		  if ($adminpayza<>"") { ?>
	        <form method="post" action="https://secure.payza.com/checkout" > 
          <input type="hidden" name="ap_purchasetype" value="item"/> 
          <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
          <input type="hidden" name="ap_currency" value="USD"/> 
          <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/paidreturn.php"/> 
          <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Special Offer Ad Package "/> 
          <input type="hidden" name="ap_quantity" value="1"/> 
		  <input type="hidden" name="apc_1" value="<? echo $userid; ?>">
          <input type="hidden" name="ap_amount" value="<? echo $offer['price']; ?>"/> 
          <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>
          <? }

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
					'description' => $sitename . ' Special Offer Ad Package ',
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/advertise.php',
				'success_url'	=> $domain. '/members/advertise.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Special Offer Ad Package ',
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
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $offer['price']; ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Special Offer Ad Package ">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Special Offer Ad Package ">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $offer['price']; ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $offer['price']; ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Special Offer Ad Package ">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/paidreturn.php">
<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/members/payreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $offer['price']; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Special Offer Ad Package ">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Special Offer Ad Package ">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>
          <? }
          ?>

<HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE>

<?php
echo "<br><br></font></td></tr></table>";
    }
else
  { ?>
  <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>
  <? }
include "../footer.php";
mysql_close($dblink);
?>