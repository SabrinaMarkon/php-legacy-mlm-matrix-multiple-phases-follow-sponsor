<?php
session_start();
include "../config.php";
$key = "http://demomatrixmpcf.phpsitescripts.com";
$key2 = "http://www.demomatrixmpcf.phpsitescripts.com";
if (($domain != $key) and ($domain != $key2))
{
echo "The script you are trying to run isn't licensed. Please contact <a href=\"mailto:sabrina@phpsitescripts.com\">Sabrina Markon, PHPSiteScripts.com</a> to purchase a licensed copy.</a>";
exit;
}
include "../header.php";
include "../style.php";
include("navigation.php");
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
?>
<table cellpadding="4" cellspacing="0" border="0" width="100%" align="center">
<?php
$query = "select * from pages where name='Matrix Order and Stats Page'";
$result = mysql_query ($query);
while ($line = mysql_fetch_array($result)) {
	echo "<tr><td colspan=\"2\"><br>";
	$htmlcode = $line["htmlcode"];
	echo $htmlcode;
	echo "<br>&nbsp;</td></tr>";
}
?>
<script type="text/javascript">
function changeHiddenInput (objDropDown)
{
	var adpackdata=objDropDown.value.split("||");
	var adpackid=adpackdata[0];
	if (adpackid)
	{
	var adpackdetails=adpackdata[1];
	document.getElementById("details").innerHTML = "<br>" + adpackdetails + "<br>";
	document.getElementById("details").visibility = "visible";
	document.getElementById("details").display = "block";
	}
	else
	{
	document.getElementById("details").innerHTML = "";
	document.getElementById("details").visibility = "hidden";
	document.getElementById("details").display = "none";
	}
}
</script>
<?php
$showid = $_REQUEST["showid"];
if ($showid == "")
{
$getfirstq = "select * from matrixconfiguration order by id limit 1";
$getfirstr = mysql_query($getfirstq);
$getfirstrows = mysql_num_rows($getfirstr);
if ($getfirstrows > 0)
	{
	$showid = mysql_result($getfirstr,0,"id");
	}
}
if ($showid == "")
{
?>
</table></td></tr>
<?php
exit;
}
$matrixtoshow = "matrix" . $showid;
$showq = "select * from matrixconfiguration where id=\"$showid\"";
$showr = mysql_query($showq);
$showrows = mysql_num_rows($showr);
if ($showrows > 0)
{
$matrixdepth = mysql_result($showr,0,"matrixdepth");
$matrixwidth = mysql_result($showr,0,"matrixwidth");
$matrixlevelname = mysql_result($showr,0,"matrixlevelname");
}
if ($showrows < 1)
{
?>
</table><br><br>
<?php
include "../footer.php";
exit;
}
?>
<tr><td align="center" colspan="2"><div style="font-size: 18px; font-weight: bold;">Your <?php echo $sitename ?> Positions</div></td></tr>
<tr><td colspan="2" align="center"><br>Please click each of your positions below to see its downline.</td></tr>
<tr><td colspan="2" align="center"><br>Your Affiliate URL: <a href="<?php echo $domain ?>/index.php?referid=<?php echo $userid ?>" target="_blank"><?php echo $domain ?>/index.php?referid=<?php echo $userid ?></a></td></tr>
<tr><td colspan="2" align="center"><br>Earnings Owed: $<?php echo $commission ?></td></tr>

<?php
$firstmatrixq = "select * from matrixconfiguration order by id limit 1";
$firstmatrixr = mysql_query($firstmatrixq);
$firstmatrixrows = mysql_num_rows($firstmatrixr);
if ($firstmatrixrows > 0)
{
$firstmatrixprice = mysql_result($firstmatrixr,0,"matrixprice");
$firstmatrixpayout = mysql_result($firstmatrixr,0,"matrixpayout");
if ($firstmatrixprice > 0)
	{
	?>
	<tr><td colspan="2" align="center"><br><br><table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
	<tr><td align="center" colspan="2"><div style="font-size: 18px; font-weight: bold;">Order Positions</div></td></tr>
	<?php
	if ($paymentprocessorfeepercentagetoadd > 0)
	{
	?>
	<tr><td align="center" colspan="2"><br>A fee of <?php echo $paymentprocessorfeepercentagetoadd ?>% is added to the total to compensate for payment processor fees.</td></tr>
	<?php
	}
	?>
	<tr><td align="center" colspan="2"><br>
	<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#989898">
	<tr bgcolor="#d3d3d3"><td align="center"><b>Price Per Position</b></td>
	<td align="center"><b>Cycle Payout</b></td>
	<?php
	if ($canbuymultiplepositionsatonce == "yes")
		{
	?>
	<td align="center"><b>Number Of Positions</b></td>
	<?php
		}
	$adpackq = "select * from adpacks where enabled=\"yes\" order by id limit 1";
	$adpackr = mysql_query($adpackq);
	$adpackrows = mysql_num_rows($adpackr);
	if ($adpackrows > 0)
		{
	$adpackdefaultid = mysql_result($adpackr,0,"id");
	?>
	<td align="center"><b>Select AdPack</b></td>
	<?php
		}
	$adpackchosen = $_POST["adpackchosen"];
	if ($adpackchosen == "")
		{
		$adpackchosen = $adpackdefaultid;
		}
	?>
	<td align="center"><b>Pay</b></td>
	<?php
	if ($adminpayza != "")
	{
	?>
	<td align="center"><b>Payza</b></td></tr>
	<?php
	}
	if (($egopay_store_id!="") and ($egopay_store_password!=""))
	{
	?>
	<td align="center"><b>EgoPay</b></td></tr>
	<?php
	}
	if ($adminperfectmoney != "")
	{
	?>
	<td align="center"><b>Perfect Money</b></td></tr>
	<?php
	}
	if ($adminokpay != "")
	{
	?>
	<td align="center"><b>OKPay</b></td></tr>
	<?php
	}
	if ($adminsolidtrustpay != "")
	{
	?>
	<td align="center"><b>Solid Trust Pay</b></td></tr>
	<?php
	}
	if ($adminmoneybookers != "")
	{
	?>
	<td align="center"><b>Moneybookers</b></td></tr>
	<?php
	}

	?>
	<tr bgcolor="#eeeeee"><td align="center">$<?php echo $firstmatrixprice ?>
	<?php
	if ($paymentprocessorfeepercentagetoadd > 0)
			{
			$feepercentage = $paymentprocessorfeepercentagetoadd/100;
			$totalfee = $firstmatrixprice*$feepercentage;
			$totalfee = sprintf("%.2f", $totalfee);
			echo " + " . $paymentprocessorfeepercentagetoadd . "%(\$" . $totalfee . ") Payment Processor Fee";
			}
	?>
	</td>
	<td align="center"><b>$<?php echo $firstmatrixpayout ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
	?>
	<form method="post">
	<td align="center">
	Purchase <select name="howmanypositions" id="howmanypositions" onchange="this.form.submit();" class="pickone">
	<option value="1" <?php if ($howmanypositions == 1) { echo "selected"; } ?>>1</option>
	<option value="2" <?php if ($howmanypositions == 2) { echo "selected"; } ?>>2</option>
	<option value="3" <?php if ($howmanypositions == 3) { echo "selected"; } ?>>3</option>
	<option value="4" <?php if ($howmanypositions == 4) { echo "selected"; } ?>>4</option>
	<option value="5" <?php if ($howmanypositions == 5) { echo "selected"; } ?>>5</option>
	<option value="6" <?php if ($howmanypositions == 6) { echo "selected"; } ?>>6</option>
	<option value="7" <?php if ($howmanypositions == 7) { echo "selected"; } ?>>7</option>
	<option value="8" <?php if ($howmanypositions == 8) { echo "selected"; } ?>>8</option>
	<option value="9" <?php if ($howmanypositions == 9) { echo "selected"; } ?>>9</option>
	<option value="10" <?php if ($howmanypositions == 10) { echo "selected"; } ?>>10</option>
	</select> Positions
	<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
	</td>
	</form>
	<?php
	} # if ($canbuymultiplepositionsatonce == "yes")
	$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
	$adpackr = mysql_query($adpackq);
	$adpackrows = mysql_num_rows($adpackr);
	if ($adpackrows > 0)
		{
	?>
	<form method="post">
	<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
	<?php
		while ($adpackrowz = mysql_fetch_array($adpackr))
			{
			$adpackid = $adpackrowz["id"];
			$adpackdescription = $adpackrowz["description"];
	?>
	<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
	<?php
			}
	?>
	</select>
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	</td>
	</form>
	<?php
		}

	if ($paymentprocessorfeepercentagetoadd > 0)
		{
		$feepercentage = $paymentprocessorfeepercentagetoadd/100;
		$totalfee = $firstmatrixprice*$feepercentage;
		$totalfee = sprintf("%.2f", $totalfee);
		$totalcostperposition = $firstmatrixprice+$totalfee;
		$totalcost = $totalcostperposition*$howmanypositions;
		$totalcost = sprintf("%.2f", $totalcost);
		}
	else
		{
		$totalcost = $firstmatrixprice*$howmanypositions;
		$totalcost = sprintf("%.2f", $totalcost);
		}
	?>
	<td align="center"><b>$<?php echo $totalcost ?></b></td>
	<?php
	# PAYZA
	if ($adminpayza != "")
	{
	?>
	<form method="post" action="https://secure.payza.com/checkout">
	<td align="center">
	<input type="hidden" name="ap_purchasetype" value="item"> 
	<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
	<input type="hidden" name="ap_currency" value="USD"> 
	<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
	<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
	<input type="hidden" name="ap_quantity" value="1"> 
	<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
	<input type="hidden" name="apc_2" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="apc_3" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="ap_amount" value="<?php echo $totalcost ?>"> 
	<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
	</form>
	</td>
	<?php
	} # if ($adminpayza != "")

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
			'amount'    => $totalcost,
		/*
		 * Payment currency, USD/EUR
		 */
			'currency'  => 'USD',
		/*
		 * Description of the payment, limited to 120 chars
		 */
			'description' => $sitename . ' - ' . $userid,
		
		/*
		 * Optional fields
		 */
		'fail_url'	=> $domain. '/members/matrixselect.php',
		'success_url'	=> $domain. '/thank-you.php',
		
		/*
		 * 8 Custom fields, hidden from users, limited to 100 chars.
		 * You can retrieve them only from your callback file.
		 */
		'cf_1' => $userid,
		'cf_2' => $sitename . ' - ' . $userid,
		'cf_3' => $totalcost,
		'cf_4' => $howmanypositions,
		'cf_5' => $adpackchosen,
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
	<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalcost ?>">
	<input type="hidden" name="PAYMENT_UNITS" value="USD">
	<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
	<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions adpackid">
	<input type="hidden" name="userid" value="<?php echo $userid ?>">
	<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
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
	<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="ok_currency" value="usd">
	<input type="hidden" name="ok_item_1_type" value="service">
	<input type="hidden" name="ok_item_1_price" value="<?php echo $totalcost ?>">
	<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
	<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
	<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
	<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="ok_item_1_custom_3_title" value="adpackid">
	<input type="hidden" name="ok_item_1_custom_3_value" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/matrixselect.php">
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
	<input type="hidden" name="amount" value="<?php echo $totalcost ?>">
	<input type="hidden" name="currency" value="USD">
	<input type="hidden" name="user1" value="<?php echo $userid ?>">
	<input type="hidden" name="user2" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="user3" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
	<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
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
	<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="language" value="EN">
	<input type="hidden" name="amount" value="<?php echo $totalcost ?>">
	<input type="hidden" name="currency" value="USD">
	<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,adpackid">
	<input type="hidden" name="userid" value="<?php echo $userid ?>">
	<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
	</form>
	</td>
	<?php
	} # if ($adminmoneybookers != "")
	?>
	</table></td></tr>
	<?php
	} # if ($firstmatrixprice > 0)
} # if ($firstmatrixrows > 0)


$mq = "select * from matrixconfiguration where matrixactive='yes' order by id";
$mr = mysql_query($mq);
$mrows = mysql_num_rows($mr);
if ($mrows > 0)
	{
?>
<tr>
<form action="matrixselect.php" method="get">
<td align="center" colspan="2"><br><br>Matrix Phase To Show:&nbsp;
<select name="showid" onchange="this.form.submit();">
<?php
	while ($mrowz = mysql_fetch_array($mr))
		{
		$id = $mrowz["id"];
		$matrixlevelname = $mrowz["matrixlevelname"];
		$matrixwidth = $mrowz["matrixwidth"];
		$matrixdepth = $mrowz["matrixdepth"];
		$matrixprice = $mrowz["matrixprice"];
		$matrixpayout = $mrowz["matrixpayout"];
		$givereentrythislevel = $mrowz["givereentrythislevel"];
		$cyclecommissionforsponsor = $mrowz["cyclecommissionforsponsor"];
?>
<option value="<?php echo $id ?>" <?php if ($id == $showid) { echo "selected"; } ?>><?php echo $matrixwidth ?> x <?php echo $matrixdepth ?> - <?php echo $matrixlevelname ?></option>
<?php
		} # while ($mrowz = mysql_fetch_array($mr))
?>
</select>
</td>
</form>
</tr>
<?php
	} # if ($mrows > 0)
?>
<tr><td align="center" colspan="2"><br><br><div style="font-size: 18px; font-weight: bold;">Your Positions</div></td></tr>
<?php
$q = "select * from $matrixtoshow where username=\"$userid\" order by id";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows < 1)
{
?>
<tr><td colspan="2" align="center"><br>You don't have any positions in this matrix phase yet.</td></tr>
<?php
}
if ($rows > 0)
{
$columnnames = "";
$columnnames .= "<tr style=\"background: #eeeeee;\"><td align=\"center\"><br>#<br>&nbsp;</td><td align=\"center\"><br>Matrix ID<br>(click to view)<br>&nbsp;</td>";
	for($i=1;$i<=$matrixdepth;$i++)
	{
	$levelname = "Level " . $i;
	$columnnames .= "<td align=\"center\"><br>" . $levelname . "<br>&nbsp;</td>";
	}
$columnnames .= "<td align=\"center\"><br>Date Added<br>&nbsp;</td><td align=\"center\"><br>Cycle Date<br>&nbsp;</td></tr>";

?>
<tr><td colspan="2" align="center"><br><table align="center" border="0" cellpadding="2" cellspacing="2" bgcolor="#999999" width="500">
<?php
echo $columnnames;
$datavalues = "";
while ($rowz = mysql_fetch_array($r))
	{
	$matrixid = $rowz["id"];
	$positionordernumber = $rowz["positionordernumber"];
	$matrixsignupdate = $rowz["signupdate"];
		if ($matrixsignupdate == 0)
		{
		$matrixsignupdate = "";
		}
		if ($matrixsignupdate != 0)
		{
		$matrixsignupdate = formatDate($matrixsignupdate);
		}
	$matrixdatecycled = $rowz["datecycled"];
		if ($matrixdatecycled == 0)
		{
		$matrixdatecycled = "Not Yet";
		}
		if ($matrixdatecycled != 0)
		{
		$matrixdatecycled = formatDate($matrixdatecycled);
		}
	$datavalues .= "<tr bgcolor=\"#ffffff\"><td align=\"center\"><font color=\"#000000\">" . $matrixid . "</td><td align=\"center\"><a href=\"matrixstats.php?matrixid=" . $matrixid . "&showid=" . $showid . "&userid=" . $userid . "\" style=\"color: #0000ff; text-decoration: underline;\">" . $positionordernumber . "</a></td>";
	for($j=1;$j<=$matrixdepth;$j++)
	{
	$variablelevel = "L" . $j;
	eval("\$variablelevel = \$rowz[\"$variablelevel\"];");
	$datavalues .= "<td align=\"center\"><font color=\"#000000\">" . $variablelevel . "</td>";
	}
	$datavalues .= "<td align=\"center\"><font color=\"#000000\">" . $matrixsignupdate . "</td><td align=\"center\"><font color=\"#000000\">" . $matrixdatecycled . "</td></tr>";
	}
echo $datavalues;
?>
</table><br>&nbsp;</td></tr>
<?php
}
?>
</table><br><br>
<?php
include "../footer.php";
?>
