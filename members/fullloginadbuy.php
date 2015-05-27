<?php
session_start();
require('../EgoPaySci.php');
include "../config.php";
include "../header.php";
include "../style.php";
if(session_is_registered("ulogin"))
{
include("navigation.php");
include("../banners.php");
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
$query = "select * from pages where name='Full Page Login Ads'";
$result = mysql_query($query) or die(mysql_error());
while ($rowz = mysql_fetch_array($result))
{
$htmlcode = $rowz["htmlcode"];
echo $htmlcode;
}
#####################
if ($memtype == "SUPER JV")
{
$fullloginadprice = $superjvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricesuperjv;
}
if ($memtype == "JV Member")
{
$fullloginadprice = $jvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricejv;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$fullloginadprice = $profullloginadprice;
$fullloginadpointprice = $fullloginadpointpricepro;
}
echo "<font size=2><br><br>
<b>Full Page Login Ads show 1 time per day per member who logs in, and allows them to earn points for visiting your website.<br><br>For only <font color=#ff0000> \$".$fullloginadprice. "</font> your website receives unlimited visitors all day on the date of your choice!<br></b></font><br><br>";
#####################
if($_GET['year'] AND $_GET['month'])
{
$date =strtotime($_GET['year']."-".$_GET['month']."-01");
}
else
{
$date =time();
}
#####################
# This puts the day, month, and year in seperate variables
$day = date('d', $date) ;
if($day == date('t', $date))
{
$month = date('m', $date+2*24*60*60);
$year = date('Y', $date+2*24*60*60);
}
else
{
$month = date('m', $date) ;
$year = date('Y', $date) ;
}
# get first day of the month
$first_day = mktime(0,0,0,$month, 1, $year) ;

# month name
$title = date('F', $first_day) ; 

# what day of the week the first day of the month falls on
$day_of_week = date('D', $first_day) ;

# Once we know what day of the week it falls on, we know how many blank days occur before it. If the first day of the week is a Sunday then it would be zero
switch($day_of_week)
{
case "Sun": $blank = 0; break;
case "Mon": $blank = 1; break;
case "Tue": $blank = 2; break;
case "Wed": $blank = 3; break;
case "Thu": $blank = 4; break;
case "Fri": $blank = 5; break;
case "Sat": $blank = 6; break;
}

# Next determine how many days are in the current month
$days_in_month = cal_days_in_month(0, $month, $year) ; 

# start building the table heads
echo "<table border=1 width=\"95%\" cellpadding=5 cellspacing=0 bordercolor=#294d26>";
echo "<tr><th colspan=7>";

if($month == 1) {
$prevmonth = 12;
$prevyear = $year-1;
} else {
$prevmonth = $month-1;
$prevyear = $year;
}

if($month == 12) {
$nextmonth = 1;
$nextyear = $year+1;
} else {
$nextmonth = $month+1;
$nextyear = $year;
}

echo "<div style=\"float: left;\"><a href=\"fullloginadbuy.php?year=$prevyear&month=$prevmonth\"> 	&laquo;Previous </a></div><div style=\"float: right;\"><a href=\"fullloginadbuy.php?year=$nextyear&month=$nextmonth\"> 	Next&raquo; </a></div>";

echo "<center><font face=tahoma size=3><b> $title $year </b></font></th></tr>";
echo "<tr><td align=center><font face=tahoma size=2><b>Sunday</b></font></td><td align=center><font face=tahoma size=2><b>Monday</b></font></td><td align=center><font face=tahoma size=2><b>Tuesday</b></font></td><td align=center><font face=tahoma size=2><b>Wednesday</b></font></td><td align=center><font face=tahoma size=2><b>Thursday</b></font></td><td align=center><font face=tahoma size=2><b>Friday</b></font></td><td align=center><font face=tahoma size=2><b>Saturday</b></font></td></tr>";

# this counts the days in the week, up to 7
$day_count = 1;

echo "<tr>";
# take care of those blank days
while ( $blank > 0 )
{
echo "<td height=\"80\" width=\"80\"></td>";
$blank = $blank-1;
$day_count++;
}

# sets the first day of the month to 1
$day_num = 1;

# count up the days, untill we've done all of them in the month
while ( $day_num <= $days_in_month )
{
echo "<td height=\"80\" width=\"80\" valign=\"top\"><font face=tahoma><small><b>$day_num</b></small></font><br>";

if(strtotime($year."-".$month."-".$day_num)>= time()) {
	$sql = mysql_query("select * from fullloginads where rented='".$year."-".$month."-".$day_num."'");
	if(!@mysql_num_rows($sql)) {
echo "<center>";

$rentaldate = $year."-".$month."-".$day_num;

		  if ($paypal<>"") { ?>
			<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but01.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="<? echo $paypal; ?>">
			<input type="hidden" name="item_name" value="<? echo $sitename; ?> Full Page Login Ad <? echo $userid; ?>">
			<input type="hidden" name="on0" value="User ID">
			<input type="hidden" name="os0" value="<? echo $userid; ?>">
			<input type="hidden" name="on1" value="Date">
			<input type="hidden" name="os1" value="<?php echo $rentaldate ?>">				
			<input type="hidden" name="amount" value="<? echo $fullloginadprice; ?>">
			<input type="hidden" name="undefined_quantity" value="1">
			<input type="hidden" name="no_note" value="1">
			<input type="hidden" name="return" value="<? echo $domain; ?>/members/advertise.php">
			<input type="hidden" name="cancel" value="<? echo $domain; ?>/members/advertise.php">
			<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/advertise_ipn.php">
			<input type="hidden" name="currency_code" value="USD">
			</form>
          <? }

		  if ($adminpayza<>"") { ?>
			<form method="post" action="https://secure.payza.com/checkout" > 
			<input type="hidden" name="ap_purchasetype" value="item"/> 
			<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> 
			<input type="hidden" name="ap_currency" value="USD"/> 
			<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/advertise.php"/> 
			<input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Full Page Login Ad <? echo $userid; ?>"/> 
			<input type="hidden" name="ap_quantity" value="1"/> 
			<input type="hidden" name="apc_1" value="<? echo $userid; ?>">
			<input type="hidden" name="apc_2" value="<?php echo $rentaldate ?>">
			<input type="hidden" name="ap_amount" value="<? echo $fullloginadprice; ?>"/> 
			<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png"/>
			</form>
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
					'amount'    => $fullloginadprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Full Page Login Ad ' . $userid,
				
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
				'cf_2' => $sitename . ' Full Page Login Ad ' . $userid,
				'cf_3' => $fullloginadprice,
				'cf_4' => $rentaldate,
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
			<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $fullloginadprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item rentaldate">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Full Page Login Ad <?php echo $userid ?>">
			<input type="hidden" name="rentaldate" value="<?php echo $rentaldate ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Full Page Login Ad <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $fullloginadprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_item_1_custom_2_title" value="rentaldate">
			<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $rentaldate ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $fullloginadprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="user2" value="<?php echo $rentaldate ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/advertise.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Full Page Login Ad <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

		  if ($adminmoneybookers<>"") { ?>
			<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
			<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
			<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
			<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/advertise.php">
			<input type="hidden" name="cancel_url" value="<? echo $domain; ?>/advertise.php">
			<input type="hidden" name="language" value="EN">
			<input type="hidden" name="amount" value="<? echo $fullloginadprice; ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="merchant_fields" value="userid,itemname,rented">
			<input type="hidden" name="itemname" value="<? echo $sitename; ?> Full Page Login Ad <? echo $userid; ?>">
			<input type="hidden" name="userid" value="<? echo $userid; ?>">
			<input type="hidden" name="rented" value="<? echo $year."-".$month."-".$day_num; ?>">
			<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Solo <? echo $userid; ?>">
			<input type="image" style="border-width: 1px; border-color: #8B8583" width="82" src="<?php echo $domain ?>/images/moneybookerssm.gif">
			</form>
          <? }


if (($fullloginadpointprice > 0) and ($points >= $fullloginadpointprice))
{
?>
<p><font face="Tahoma" size="2"><a href="trade.php?item=fullloginad&fullloginadpointprice=<?php echo $fullloginadpointprice ?>&rented=<? echo $year."-".$month."-".$day_num; ?>"><br>TRADE <?php echo $fullloginadpointprice ?> POINTS</a></font></p>
<?
}
	} # if(!@mysql_num_rows($sql))
}

echo "</td>";

$day_num++;
$day_count++;

# Make sure a new rows is started every week
if ($day_count > 7)
{
echo "</tr><tr>";
$day_count = 1;
}
}
?>
</tr></table>
<? 
echo "</font></td></tr></table>";
} # if(session_is_registered("ulogin"))
else
{
?>
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>
<?
}
include "../footer.php";
mysql_close($dblink);
?>