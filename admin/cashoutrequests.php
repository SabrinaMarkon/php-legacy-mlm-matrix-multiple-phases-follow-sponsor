<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
?>
<table>
<tr>
<td width="15%" valign=top><br>
<?php
include "adminnavigation.php";
?>
</td>
<td  valign="top" align="center"><br>
<?php
if( session_is_registered("alogin") ) {
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if ($_POST["action"] == "delete")
{
$id = $_POST["id"];
$q = "delete from cashoutrequests where id=\"$id\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Request Deleted</p>";
} # if ($_POST["action"] == "delete")

if ($_POST["action"] == "markpaid")
{
$payid = $_POST["payid"];
$payamount = $_POST["payamount"];
$payuserid = $_POST["payuserid"];
$q2 = "select * from members where userid=\"$payuserid\"";
$r2 = mysql_query($q2);
$rows2 = mysql_num_rows($r2);
if ($rows2 > 0)
	{
######################## COMMISSION
	$paycommission = mysql_result($r2,0,"commission");
	if ($paycommission >= $payamount)
		{
		$q3 = "update members set commission=commission-".$payamount." where userid=\"$payuserid\"";
		$r3 = mysql_query($q3);
		$q4 = "insert into payouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$payamount\",NOW(),\"Earnings Payout\")";
		$r4 = mysql_query($q4);
		$howmuchlefttopay = 0;
		break;
		}
	if ($paycommission < $payamount)
		{
		$q3 = "update members set commission=0 where userid=\"$payuserid\"";
		$r3 = mysql_query($q3);
		if ($paycommission > 0)
		{
		$q4 = "insert into payouts (userid,paid,datepaid,description) values (\"$payuserid\",\"$paycommission\",NOW(),\"Earnings Payout\")";
		$r4 = mysql_query($q4);
		}
		$howmuchlefttopay = $payamount-$paycommission;
		}
$rq = "select * from members where userid=\"$payuserid\"";
$rr = mysql_query($rq);
$rrows = mysql_num_rows($rr);
if ($rrows > 0)
		{
$owedstill = mysql_result($rr,0,"commission");
$q7 = "update cashoutrequests set owed=\"$owedstill\",paid=\"$payamount\",lastpaid=\"$lastpaid\" where id=\"$payid\"";
$r7 = mysql_query($q7);
		}
$show = "<p align=\"center\">Cash Out Request #" . $payid . " for member " . $payuserid . " was marked as paid out.</p>";
$q = "update cashoutrequests set paid=\"$payamount\",lastpaid=NOW() where id=\"$payid\"";
$r = mysql_query($q);
	} # if ($rows2 > 0)
if ($rows2 < 1)
	{
$show = "<p align=\"center\">UserID " . $payuserid . " was not found.</p>";
	}
} # if ($_POST["action"] == "markpaid")

####################################################################################################
$tbl_name="cashoutrequests";	 # your table name
# How many adjacent pages should be shown on each side?
$adjacents = 3;
# First get total number of rows in data table. 
# If you have a WHERE clause in your query, make sure you mirror it here.
$query = "select count(*) as num FROM $tbl_name where amountrequested>0.00 order by id desc";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
# Setup vars for query.
$targetpage = "cashoutrequests.php"; 	# your file name  (the name of this file)
$limit = 20; # how many items to show per page
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; # first item to display on this page
else
$start = 0; # if no page var is given, set start to 0
# Get data.
$pnquery = "select * from $tbl_name where amountrequested>0.00 order by id desc limit $start, $limit";
$pnresult = mysql_query($pnquery);
# Setup page vars for display.
if ($page == 0) $page = 1; # if no page var is given, default to 1.
$prev = $page - 1; # previous page is page - 1
$next = $page + 1; # next page is page + 1
$lastpage = ceil($total_pages/$limit); # lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1; # last page minus 1
# Now we apply our rules and draw the pagination object. 
# We're actually saving the code to a variable in case we want to draw it more than once.
$pagination = "";
if($lastpage > 1)
{
$pagination .= "<div class=\"pagination\">";
# previous button
if ($page > 1) 
$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
else
$pagination.= "<span class=\"disabled\">« previous</span>";	
# pages	
if ($lastpage < 7 + ($adjacents * 2)) # not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2)) # enough pages to hide some
{
# close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
# in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
# close to end; only hide early pages
else
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class=\"current\">$counter</span>";
else
	$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
}
# next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
else
$pagination.= "<span class=\"disabled\">next »</span>";
$pagination.= "</div>\n";		
}
###############################################################
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
<table cellpadding="4" cellspacing="0" border="0" align="left" width="100%">
<?php
if ($pagination != "")
	{
?>
<tr><td align="center" colspan="2" style="height: 30px;"><?php echo $pagination ?></td></tr>
<?php
	}
?>
<tr><td align="center" colspan="2"><br><br>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading">Member Cash Out Requests</div></td></tr>
<?php
$numrows = @ mysql_num_rows($pnresult);
if ($numrows < 1)
{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">No Cash Out Requests Pending.</td></tr>
<?php
}
if ($show != "")
{
echo $show;
}
if ($numrows > 0)
{
?>
<tr><td align="center" colspan="2">
<!--<div style="width: 780px; height: 500px; overflow:auto;">-->
<table cellpadding="4" cellspacing="2" border="0" align="center" bgcolor="#999999">
<tr bgcolor="#eeeeee">
<td align="center">Userid</td>
<td align="center"><a href="http://paypal.com" target="_blank">PayPal</a></td>
<td align="center"><a href="https://secure.payza.com/login" target="_blank">Payza</a></td>
<td align="center"><a href="https://www.egopay.com/login" target="_blank">EgoPay</a></td>
<td align="center"><a href="https://perfectmoney.is/login.html" target="_blank">Perfect Money</a></td>
<td align="center"><a href="https://www.okpay.com/en/account/login.html" target="_blank">OKPay</a></td>
<td align="center"><a href="https://www.solidtrustpay.com/login" target="_blank">Solid Trust Pay</a></td>
<td align="center"><a href="https://account.skrill.com/login?locale=en" target="_blank">Moneybookers</a></td>
<td align="center">Amount Requested</td>
<td align="center">Date Requested</td>
<td align="center">Earnings Owing</td>
<td align="center">Already Paid For This Request</td>
<td align="center">Date Paid For This Request</td>
<td align="center">Mark Paid Out</td>
<td align="center">Delete</td>
</tr>
<?php
while ($line = mysql_fetch_array($pnresult)) {
$requestid = $line["id"];
$userid = $line["userid"];
$memberpaypal = $line["paypal"];
$memberpayza = $line["payza"];
$memberegopay = $line["egopay"];
$memberperfectmoney = $line["perfectmoney"];
$memberokpay = $line["okpay"];
$membersolidtrustpay = $line["solidtrustpay"];
$membermoneybookers = $line["moneybookers"];
$amountrequested = $line["amountrequested"];
if ($amountrequested > 0)
{
$bgcolor=" bgcolor=\"#FFCCCC\"";
}
else
{
$bgcolor = "";
}
$owed = $line["owed"];
$daterequested = $line["daterequested"];
if (($daterequested == "") or ($daterequested == 0))
	{
$daterequested = "N/A";
	}
if (($daterequested != "") and ($daterequested != 0))
	{
$daterequested = formatDate($daterequested);
	}
$paid = $line["paid"];
$lastpaid = $line["lastpaid"];
if (($lastpaid == "") or ($lastpaid == 0))
	{
$lastpaid = "N/A";
	}
if (($lastpaid != "") and ($lastpaid != 0))
	{
$lastpaid = formatDate($lastpaid);
	}
?>
<tr bgcolor="#eeeeee">
<td align="center"><?php echo $userid ?></td>
<td align="center"><?php echo $memberpaypal ?></td>
<td align="center"><?php echo $memberpayza ?></td>
<td align="center"><?php echo $memberegopay ?></td>
<td align="center"><?php echo $memberperfectmoney ?></td>
<td align="center"><?php echo $memberokpay ?></td>
<td align="center"><?php echo $membersolidtrustpay ?></td>
<td align="center"><?php echo $membermoneybookers ?></td>
<td align="center"<?php echo $bgcolor ?>>$<?php echo $amountrequested ?></td>
<td align="center"><?php echo $daterequested ?></td>
<td align="center">$<?php echo $owed ?></td>
<td align="center">$<?php echo $paid ?></td>
<td align="center"><?php echo $lastpaid ?></td>
<?php
if ($amountrequested > 0)
{
?>
<form method="post" action="cashoutrequests.php">
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<input type="hidden" name="action" value="markpaid">
<input type="hidden" name="payid" value="<?php echo $requestid ?>">
<input type="hidden" name="payamount" value="<?php echo $amountrequested ?>">
<input type="hidden" name="payuserid" value="<?php echo $userid ?>">
<input type="submit" value="Set As Paid">
</center>
</td></form>
</tr>
<?php
} # if ($amountrequested > 0)
if ($amountrequested <= 0)
{
?>
<td align="center">No Money Owed</td>
<?php
}
?>
<form method="post" action="cashoutrequests.php">
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?php echo $requestid ?>">
<input type="submit" value="Delete">
</center>
</td></form>
</tr>
<?php
}
?>
</table>
<!--</div>-->
</td></tr>
<?php
} # if ($numrows > 0)
?>
</td></tr></table>
</td></tr>
<tr><td align="center" colspan="2"><br><br><?php echo $pagination ?><br>&nbsp;<br>&nbsp;</td></tr>
</table>
<?php
}
else
echo "Unauthorised Access!";
?>
</td></tr></table>
<?php
include "../footer.php";
?>