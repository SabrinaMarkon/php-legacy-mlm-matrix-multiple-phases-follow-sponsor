<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$userid = $_POST['userid'];

if( session_is_registered("alogin") ) {

if ($_POST["action"] == "save")
{
$q = "update members set commission=\"$commission\",paypal_email=\"$paypal_email\",payza_email=\"$payza_email\",egopay_account=\"$egopay_account\",perfectmoney_account=\"$perfectmoney_account\",okpay_account=\"$okpay_account\",solidtrustpay_account=\"$solidtrustpay_account\",moneybookers_email=\"$moneybookers_email\" where id=\"$id\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Account Saved!</p>";
}
?>
<table align="center" border="0" width="100%">
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        echo "<H2>Regular Commissions Owed</H2>";
           $query = "select * from members where commission>1.00 ORDER BY commission DESC";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	echo "<p><center>No commission payments pending.</p></center>";

        }
if ($show != "")
{
echo $show;
}
        ?>
		<br>
           <table width=90% border=1 cellpadding=2 cellspacing=0 bgcolor="<?php echo $admintablebgcolor ?>">
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <? if ($pay_with['paypal']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="http://paypal.com" target="_blank">PayPal</a></font></center></td>
              <? } ?>
              <? if ($pay_with['payza']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://secure.payza.com/login" target="_blank">Payza</a></font></center></td>
              <? } ?>
              <? if ($pay_with['egopay']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://www.egopay.com/login" target="_blank">EgoPay</a></font></center></td>
              <? } ?>
              <? if ($pay_with['perfectmoney']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://perfectmoney.is/login.html" target="_blank">Perfect Money</a></font></center></td>
              <? } ?>
              <? if ($pay_with['okpay']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://www.okpay.com/en/account/login.html" target="_blank">OKPay</a></font></center></td>
              <? } ?>
              <? if ($pay_with['solidtrustpay']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://www.solidtrustpay.com/login" target="_blank">Solid Trust Pay</a></font></center></td>
              <? } ?>

              <? if ($pay_with['moneybookers']) { ?>
                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="https://account.skrill.com/login?locale=en" target="_blank">Moneybookers</a></font></center></td>
              <? } ?>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Amount</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Save</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
			$id = $line["id"];
            $userid = $line["userid"];
            $commission = $line["commission"];
			$formattedcommission = number_format($commission, 2);
            $member_paypal_email = $line["paypal_email"];
            $member_payza_email = $line["payza_email"];
			$member_egopay_account = $line["egopay_account"];
			$member_perfectmoney_account = $line["perfectmoney_account"];
			$member_okpay_account = $line["okpay_account"];
			$member_solidtrustpay_account = $line["solidtrustpay_account"];
            $member_moneybookers_email = $line["moneybookers_email"];
        ?><tr>
			<form method=POST action=commission.php>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
          <? if ($pay_with['paypal']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="paypal_email" value="<? echo $member_paypal_email; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['payza']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="payza_email" value="<? echo $member_payza_email; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['egopay']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="egopay_account" value="<? echo $member_egopay_account; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['perfectmoney']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="perfectmoney_account" value="<? echo $member_perfectmoney_account; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['okpay']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="okpay_account" value="<? echo $member_okpay_account; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['solidtrustpay']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="solidtrustpay_account" value="<? echo $member_solidtrustpay_account; ?>" size="30"></font></center></td>
          <? } ?>
          <? if ($pay_with['moneybookers']) { ?>
          	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="moneybookers_email" value="<? echo $member_moneybookers_email; ?>" size="30"></font></center></td>
          <? } ?>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><input type="text" name="commission" value="<? echo $commission; ?>"></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
          <input type="hidden" name="userid" value="<? echo $userid; ?>">
		  <input type="hidden" name="action" value="save">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Save">
          </center>
          </form></td>
<?php
}
?>
</tr>
<?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";

  }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>