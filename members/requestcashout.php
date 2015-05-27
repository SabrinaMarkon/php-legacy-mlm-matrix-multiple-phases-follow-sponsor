<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("ulogin") )
{
include("navigation.php");
include("../banners.php");
echo "<p><center>";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
$totalowed = 0.00;
####################################################
$commission = sprintf("%.2f", $commission);
###############################################################################
if ($_POST["action"] == "cashout")
{
$cashoutamount = $_POST["cashoutamount"];
$message = $_POST["message"];
if (($cashoutamount < $minimumpayout) or ($minimumpayout > 0))
	{
	echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Sorry, you cannot withdraw less than the minimum payout, which is \$" . $minimumpayout . "<br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
	include "../footer.php";
	exit;
	}
if ($cashoutamount > $commission)
	{
	echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">You do not have \$" . $cashoutamount . " in earnings to withdraw.<br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
	include "../footer.php";
	exit;
	}
if (($commission < $minimumbalancetowithdraw) and ($minimumbalancetowithdraw > 0))
	{
	echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Sorry, you cannot withdraw when your earnings balance is less than the minimum required amount, which is \$" . $minimumbalancetowithdraw . "<br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
	include "../footer.php";
	exit;
	}
if ($paypal_email == "")
	{
	$paypal_email = "Not Entered";
	}
if ($payza_email == "")
	{
	$payza_email = "Not Entered";
	}
if ($egopay_account == "")
	{
	$egopay_account = "Not Entered";
	}
if ($perfectmoney_account == "")
	{
	$perfectmoney_account = "Not Entered";
	}
if ($okpay_account == "")
	{
	$okpay_account = "Not Entered";
	}
if ($solidtrustpay_account == "")
	{
	$solidtrustpay_account = "Not Entered";
	}
if ($moneybookers_email == "")
	{
	$moneybookers_email = "Not Entered";
	}
$q = "insert into cashoutrequests (userid,paypal,payza,egopay,perfectmoney,okpay,solidtrustpay,moneybookers,amountrequested,owed,daterequested,message) values (\"$userid\",\"$paypal_email\",\"$payza_email\",\"$egopay_account\",\"$perfectmoney_account\",\"$okpay_account\",\"$solidtrustpay_account\",\"$moneybookers_email\",\"$cashoutamount\",\"$commission\",NOW(),\"$message\")";
$r = mysql_query($q);
########################################################
$headers = "From: $sitename<$adminemail>\n";
$headers .= "Reply-To: <$adminemail>\n";
$headers .= "X-Sender: <$adminemail>\n";
$headers .= "X-Mailer: PHP4\n";
$headers .= "X-Priority: 3\n";
$headers .= "Return-Path: <$adminemail>\n";
$to = $adminemail;
$subject = $sitename . " Cash Out Request for UserID $userid";
$body = "UserID: $userid\n";
$body .= "PayPal: $paypal_email\n";
$body .= "Payza: $payza_email\n";
$body .= "EgoPay: $egopay_account\n";
$body .= "Perfect Money: $perfectmoney_account\n";
$body .= "OKPay: $okpay_account\n";
$body .= "Solid Trust Pay: $solidtrustpay_account\n";
$body .= "Moneybookers/Skrill: $moneybookers_email\n";
$body .= "Requested Withdrawal: \$$cashoutamount\n";
$body .= "Message:\n$message\n\n";
$body .= "Total Earnings Owed: \$$commission\n";
$body .= "\n";
$body .= "TOTAL CASH ADMIN PAYS FROM THIS CASHOUT REQUEST: \$$cashoutamount\n";
$body .= "\n";
@mail($to, $subject, wordwrap(stripslashes($body)),$headers, "-f $adminemail");
echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Your cash out request for \$" . $cashoutamount . " was submitted to the admin. <br><a href=\"requestcashout.php\">Click here</a> to go back.</font></p>";
include "../footer.php";
exit;
} # if ($_POST["action"] == "cashout")
###############################################################################
?>
<style type="text/css">
<!--
td {
color: #000000;
font-size: 12px;
font-weight: normal;
font-family: Tahoma, sans-serif;
}
-->
</style>
<table align="center" border="0" width="100%">
<tr><td colspan="2">
<div style="text-align: center;">
<?php
$query = "select * from pages where name='Request Cash Out Page'";
$result = mysql_query ($query)
or die ("Query failed");
while ($line = mysql_fetch_array($result))
{
$htmlcode = $line["htmlcode"];
echo $htmlcode;
?>
<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
<?php
}
#############################
?>
</div> 
</td></tr>

<tr><td align="center" colspan="2">
<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#999999" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Cash Out Earnings</div></td></tr>
<?php
if ($minimumpayout > 0)
	{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">Minimum Payout: $<?php echo $minimumpayout ?></td></tr>
<?php
	}
if ($minimumbalancetowithdraw > 0)
	{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">Minimum Earnings Balance Required to Withdraw: $<?php echo $minimumbalancetowithdraw ?></td></tr>
<?php
	}
?>
<tr bgcolor="#eeeeee"><td colspan="2"><div>
Total Earnings Owed: $<?php echo $commission ?>
</div>
</td></tr>
<form method="post" action="requestcashout.php">
<tr bgcolor="#eeeeee"><td>Withdraw Earnings:</td><td>$<input type="text" name="cashoutamount" maxlength="12" size="6"></td></tr>
<tr bgcolor="#eeeeee"><td>Message:</td><td><input type="text" name="message" maxlength="255" size="95"></td></tr>
<tr><td align="center" colspan="2"><input type="hidden" name="action" value="cashout">
<input type="submit" value="Submit"></form></td></tr>
</table>
</td></tr>

<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
</table>
<?php
}
else
{ ?>
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>
<? }
include "../footer.php";
mysql_close($dblink);
?>