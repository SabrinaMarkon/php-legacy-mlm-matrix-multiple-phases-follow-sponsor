<?php
session_start();
include "../config.php";
if( session_is_registered("alogin") ) {
?>
<script type="text/javascript" src="../jscripts/calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>
<?php
$action = $_POST["action"];
$show = "";
####################################################################################################
if ($action == "add")
{
	if ($_POST['adduserid'] == "")
	{
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
	echo "<p align=\"center\">UserID field was left blank.</p>";
	echo "<p align=\"center\"><a href=\"subscriptions.php\">Return</a></p>";
	?>
	</td></tr></table>
	<?php
	include "../footer.php";
	exit;
	}
mysql_query("insert into subscriptions (userid,transaction,paymentdate,amountreceived) values ('".$_POST['adduserid']."','".$_POST['addtransaction']."','".$_POST['addpaymentdate']."','".$_POST['addamountreceived']."')");
$show = "<div align=\"center\" style=\"color: #ff0000;\">New Subscription Record Added</div><br>";
} # if ($action == "add")
####################################################################################################
if ($action == "save")
{
	if ($_POST['saveuserid'] == "")
	{
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
	echo "<p align=\"center\">UserID field was left blank.</p>";
	echo "<p align=\"center\"><a href=\"subscriptions.php\">Return</a></p>";
	?>
	</td></tr></table>
	<?php
	include "../footer.php";
	exit;
	}
mysql_query("update subscriptions set userid='".$_POST['saveuserid']."', transaction='".$_POST['savetransaction']."', paymentdate='".$_POST['savepaymentdate']."', amountreceived='".$_POST['saveamountreceived']."' where id='".$_POST['id']."'");
$show = "<div align=\"center\" style=\"color: #ff0000;\">Subscription Record Saved</div><br>";
} # if ($action == "save")
####################################################################################################
if ($action == "delete")
{
mysql_query("delete from subscriptions where id='".$_POST['id']."'");
$show = "<div align=\"center\" style=\"color: #ff0000;\">Subscription Record Deleted</div><br>";
} # if ($action == "delete")
####################################################################################################
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
####################################################################################################
$tbl_name="subscriptions";	 # your table name
# How many adjacent pages should be shown on each side?
$adjacents = 3;
# First get total number of rows in data table. 
# If you have a WHERE clause in your query, make sure you mirror it here.
$query = "select count(*) as num FROM $tbl_name order by id desc";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
# Setup vars for query.
$targetpage = "subscriptions.php"; 	# your file name  (the name of this file)
$limit = 50; # how many items to show per page
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; # first item to display on this page
else
$start = 0; # if no page var is given, set start to 0
# Get data.
$pnquery = "select * from $tbl_name order by id desc limit $start, $limit";
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
<table align="center" border="0" width="90%">
<tr><td valign="top" align="center">
<?php
if ($show != "")
{
echo $show;
}
?>
<tr><td align="center" colspan="2">
<table cellpadding="0" cellspacing="2" border="0" align="center" bgcolor="#999999" style="width: 300px;">
<tr><td align="center" colspan="2"><div class="heading">Add Member Subscription Record</div></td></tr>
<?php
$uq = "select * from members order by userid";
$ur = mysql_query($uq);
$urows = mysql_num_rows($ur);
if ($urows < 1)
{
?>
<tr><td align="center" colspan="2">There are no members yet.</td></tr>
<?php
}
if ($urows > 0)
{
?>
	<form action="subscriptions.php" method="post">
	<tr bgcolor="#eeeeee"><td align="right">For UserID: </td><td>
	<select name="adduserid" class="pickone">
	<?php
	while ($urowz = mysql_fetch_array($ur))
	{
	$userid = $urowz["userid"];
	echo "<option value=\"" . $userid . "\">" . $userid . "</option>";
	}
	?>
	</select>
	</td></tr>
	<tr bgcolor="#eeeeee"><td align="right">Transaction: </td><td><input type="text" name="addtransaction" class="typein" size="16" maxlength="255"></td></tr>
	<tr bgcolor="#eeeeee"><td align="right">Payment Date: </td><td><script>DateInput('addpaymentdate', true, 'YYYY-MM-DD')</script></td></tr>
	<tr bgcolor="#eeeeee"><td align="right">Amount Received: </td><td>$<input type="text" name="addamountreceived" class="typein" size="6" maxlength="12"></td></tr>
	<tr><td colspan="2" align="center">
	<input type="hidden" name="action" value="add"><input type="submit" value="ADD" class="sendit"></form></td></tr>
<?php
} # if ($urows > 0)
?>
</table>
</td></tr>
<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
<?php
$numrows = @ mysql_num_rows($pnresult);
if ($numrows < 1)
{
?>
<tr bgcolor="#999999"><td align="center" colspan="2"><div class="heading">Existing Member Subscriptions</div></td></tr>
<tr bgcolor="#eeeeee"><td align="center" colspan="2">No Subscription records have been added yet.</td></tr>
<?php
}
if ($numrows > 0)
{
if ($pagination != "")
	{
?>
<tr><td align="center" colspan="2" style="height: 30px;"><?php echo $pagination ?></td></tr>
<?php
	}
?>
<tr><td align="center" colspan="2">
<!--<div style="width: 780px; height: 780px; overflow:auto;">-->
<table cellpadding="0" cellspacing="2" border="0" align="center" width="90%" bgcolor="#999999">
<tr><td align="center" colspan="7"><div class="heading">Existing Member Subscriptions</div></td></tr>
<tr bgcolor="#eeeeee">
<td align="center">Userid</td>
<td align="center">Transaction ID</td>
<td align="center">Payment Date</td>
<td align="center">Change Payment Date</td>
<td align="center">Amount Received</td>
<td align="center">Save</td>
<td align="center">Delete</td>
</tr>
<?php
while ($line = mysql_fetch_array($pnresult))
{
$subid = $line["id"];
$subuserid = $line["userid"];
$subtransaction = $line["transaction"];
$subpaymentdate = $line["paymentdate"];
$subamountreceived = $line["amountreceived"];
$q = "select * from members order by userid";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
?>
<form action="subscriptions.php" method="post">
<tr bgcolor="#eeeeee">
<?php
if ($rows < 1)
{
?>
<td align="center"><input type="text" class="typein" name="saveuserid" value="<?php echo $subuserid ?>" maxlength="255" size="16"></td>
<?php
}
if ($rows > 0)
{
?>
<td align="center">
<select name="saveuserid" class="pickone">
<?php
while ($rowz = mysql_fetch_array($r))
{
$userid = $rowz["userid"];
?>
<option value="<?php echo $userid ?>" <?php if ($subuserid == $userid) { echo "selected"; } ?>><?php echo $userid ?></option>
<?php
}
?>
</select>
</td>
<?php
} # if ($rows > 0)
?>
<td align="center"><input type="text" class="typein" name="savetransaction" value="<?php echo $subtransaction ?>" maxlength="255" size="16"></td>
<td align="center"><?php echo $subpaymentdate ?></td>
<td align="center"><script>DateInput('savepaymentdate', true, 'YYYY-MM-DD')</script></td>
<td align="center"><input type="text" class="typein" name="saveamountreceived" value="<?php echo $subamountreceived ?>" maxlength="12" size="6"></td>
<td align="center">
<input type="hidden" name="action" value="save">
<input type="hidden" name="id" value="<?php echo $subid ?>">
<input type="submit" value="SAVE">
</form></td>
<form method="POST" action="subscriptions.php">
<td align="center">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?php echo $subid ?>">
<input type="submit" value="DELETE">
</form></td>
</tr>
<?php
} # while ($line = mysql_fetch_array($pnresult))
?>
</table>
<!--</div> -->
</td></tr>
<?php
if ($pagination != "")
	{
?>
<tr><td align="center" colspan="2" style="height: 30px;"><?php echo $pagination ?></td></tr>
<?php
	}
} # if ($numrows > 0)
?>
</td></tr></table>
</td></tr></table>
<?php
include "../footer.php";
exit;
}
else
{
include "../header.php";
include "../style.php";
echo "Unauthorised Access!";
?>
</td></tr></table>
<?php
include "../footer.php";
exit;
}
?>