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
<table>
<tr>
<td width="15%" valign=top><br>
<?php
include "adminnavigation.php";
?>
</td>
<td  valign="top" align="center"><br>
<?php
$action = $_POST["action"];
$show = "";
#########################################################################################
if ($action == "savesettings")
{
$newminimumpayout = $_POST["newminimumpayout"];
$newpaymentprocessorfeepercentagetoadd = $_POST["newpaymentprocessorfeepercentagetoadd"];
$newminimumbalancetowithdraw = $_POST["newminimumbalancetowithdraw"];
$newcanbuymultiplepositionsatonce = $_POST["newcanbuymultiplepositionsatonce"];
$q1 = "select * from settings where name=\"minimumpayout\"";
$r1 = mysql_query($q1);
$rows1 = mysql_num_rows($r1);
if ($rows1 > 0)
	{
	$q2 = "update settings set setting=\"$newcanbuymultiplepositionsatonce\" where name=\"canbuymultiplepositionsatonce\"";
	$r2 = mysql_query($q2);
	}
if ($rows1 < 1)
	{
	$q2 = "insert into settings (name,setting) values (\"canbuymultiplepositionsatonce\",\"$newcanbuymultiplepositionsatonce\")";
	$r2 = mysql_query($q2);
	}
$q3 = "select * from settings where name=\"minimumpayout\"";
$r3 = mysql_query($q3);
$rows3 = mysql_num_rows($r3);
if ($rows3 > 0)
	{
	$q4 = "update settings set setting=\"$newminimumpayout\" where name=\"minimumpayout\"";
	$r4 = mysql_query($q4);
	}
if ($rows3 < 1)
	{
	$q4 = "insert into settings (name,setting) values (\"minimumpayout\",\"$newminimumpayout\")";
	$r4 = mysql_query($q4);
	}
$q5 = "select * from settings where name=\"paymentprocessorfeepercentagetoadd\"";
$r5 = mysql_query($q5);
$rows5 = mysql_num_rows($r5);
if ($rows5 > 0)
	{
	$q6 = "update settings set setting=\"$newpaymentprocessorfeepercentagetoadd\" where name=\"paymentprocessorfeepercentagetoadd\"";
	$r6 = mysql_query($q6);
	}
if ($rows5 < 1)
	{
	$q6 = "insert into settings (name,setting) values (\"paymentprocessorfeepercentagetoadd\",\"$newpaymentprocessorfeepercentagetoadd\")";
	$r6 = mysql_query($q6);
	}
$q9 = "select * from settings where name=\"minimumbalancetowithdraw\"";
$r9 = mysql_query($q9);
$rows9 = mysql_num_rows($r9);
if ($rows9 > 0)
	{
	$q10 = "update settings set setting=\"$newminimumbalancetowithdraw\" where name=\"minimumbalancetowithdraw\"";
	$r10 = mysql_query($q10);
	}
if ($rows9 < 1)
	{
	$q10 = "insert into settings (name,setting) values (\"minimumbalancetowithdraw\",\"$newminimumbalancetowithdraw\")";
	$r10 = mysql_query($q10);
	}
$show = "<p align=\"center\">Settings saved!</p>";
} # if ($action == "savesettings")
#########################################################################################
if ($action == "addmatrix")
{
$matrixlevelname = $_POST["matrixlevelname"];
$matrixdepth = $_POST["matrixdepth"];
$matrixwidth = $_POST["matrixwidth"];
$matrixprice = $_POST["matrixprice"];
$matrixprice = sprintf("%.2f", $matrixprice);
$matrixpayout = $_POST["matrixpayout"];
$matrixpayout = sprintf("%.2f", $matrixpayout);
$givereentrythislevel = $_POST["givereentrythislevel"];
$cyclecommissionforsponsor = $_POST["cyclecommissionforsponsor"];
$cyclecommissionforsponsor = sprintf("%.2f", $cyclecommissionforsponsor);
$matrixactive = $_POST["matrixactive"];
	if(!$matrixlevelname)
	{
	$error = "<div>Please return and enter name for the matrix phase.</div>";
	}
	if((!$matrixdepth) or (!is_numeric($matrixdepth)))
	{
	$error .= "<div>Please return and enter the depth for this matrix (how many levels in this matrix phase).</div>";
	}
	if((!$matrixwidth) or (!is_numeric($matrixwidth)))
	{
	$error .= "<div>Please return and enter the width for this matrix (how many positions will be in each position's first level of this matrix phase).</div>";
	}
	if((!$matrixprice) or ($matrixprice == 0))
	{
	$error .= "<div>Please return and enter the price to buy a position in this matrix phase.</div>";
	}
	if((!$matrixpayout) or ($matrixpayout == 0))
	{
	$error .= "<div>Please return and enter the total earnings for completing this matrix phase.</div>";
	}
$q = "insert into matrixconfiguration (matrixlevelname,matrixwidth,matrixdepth,matrixprice,matrixpayout,givereentrythislevel,matrixactive,cyclecommissionforsponsor) values (\"$matrixlevelname\",\"$matrixwidth\",\"$matrixdepth\",\"$matrixprice\",\"$matrixpayout\",\"$givereentrythislevel\",\"$matrixactive\",\"$cyclecommissionforsponsor\")";
$r = mysql_query($q);

$newmatrixid = mysql_insert_id();

$mq = "select * from matrixconfiguration order by id";
$mr = mysql_query($mq);
$matrixsequence = 0;
while ($mrowz = mysql_fetch_array($mr))
	{
	$sid = $mrowz["id"];
	$matrixsequence = $matrixsequence+1;
	$sq = "update matrixconfiguration set matrixsequence=\"$matrixsequence\" where id=\"$sid\"";
	$sr = mysql_query($sq);
	}
############
$buildq = "";
$matrixtablename = "matrix" . $newmatrixid;
for($i=1;$i<=$matrixdepth;$i++)
{
$buildq = $buildq . "L" . $i . " integer unsigned not null,";
}
for($j=1;$j<=$matrixdepth;$j++)
{
$buildq = $buildq . "parent" . $j . " integer unsigned not null,";
$buildq = $buildq . "parent" . $j . "username varchar(255) not null,";
}
$createq1 = "create table $matrixtablename (
id integer unsigned not null primary key auto_increment,
username varchar(255) not null,";
$createq1 .= $buildq;
$createq1 .= "datecycled datetime not null,
cycled varchar(4) not null default 'no',
urlreferrerid integer unsigned not null,
urlreferrername varchar(255) not null,
owed decimal(9,2) not null default '0.00',
paid decimal(9,2) not null default '0.00',
lastpaid datetime not null,
paychoice varchar(255) not null,
transaction varchar(255) not null,
positionordernumber integer unsigned not null,
signupdate datetime not null)
";
$creater1 = mysql_query($createq1) or die(mysql_error());
$createq2 = "insert into $matrixtablename (id,username,urlreferrerid,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (1,\"COMPANY\",1,\"COMPANY\",\"Admin\",\"Admin\",1,NOW())";
$creater2 = mysql_query($createq2);
############
$q3 = "select * from settings where name=\"minimumpayout\"";
$r3 = mysql_query($q3);
$rows3 = mysql_num_rows($r3);
if ($rows3 < 1)
	{
	$q4 = "insert into settings (name,setting) values (\"minimumpayout\",\"5.00\")";
	$r4 = mysql_query($q4);
	}
############
$pagestructureq = "alter table pages change name name varchar(255) not null";
$pagestructurer = mysql_query($pagestructureq);
$pagehtmlq = "select * from pages where name='Matrix Order and Stats Page'";
$pagehtmlr = mysql_query($pagehtmlq);
$pagehtmlrows = mysql_num_rows($pagehtmlr);
if ($pagehtmlrows < 1)
{
$pagehtmlq2 = "insert into pages (name,htmlcode) values ('Matrix Order and Stats Page','')";
$pagehtmlr2 = mysql_query($pagehtmlq2);
}
$navstructureq1 = "alter table navigation change name name varchar(255) not null";
$navstructurer1 = mysql_query($navstructureq1);
$navstructureq2 = "alter table navigation change url url varchar(255) not null";
$navstructurer2 = mysql_query($navstructureq2);
$navq = "select * from navigation where name='Matrix Stats'";
$navr = mysql_query($navq);
$navrows = mysql_num_rows($navr);
if ($navrows < 1)
{
$navq2 = "insert into navigation (name,url,status,seq,memtype,showforhigherlevel) values ('Matrix Stats','matrixselect.php','ON',36,'','1')";
$navr2 = mysql_query($navq2);
}
$navq = "select * from navigation where name='Buy Positions'";
$navr = mysql_query($navq);
$navrows = mysql_num_rows($navr);
if ($navrows < 1)
{
$navq3 = "insert into navigation (name,url,status,seq,memtype,showforhigherlevel) values ('Buy Positions','matrixselect.php','ON',37,'','1')";
$navr3 = mysql_query($navq3);
}
$show = "<p align=\"center\">New matrix phase created!</p>";
} # if ($action == "addmatrix")
#########################################################################################
if ($action == "savematrix")
{
$saveid = $_POST["saveid"];
$savematrixlevelname = $_POST["savematrixlevelname"];
$savematrixprice = $_POST["savematrixprice"];
$savematrixprice = sprintf("%.2f", $savematrixprice);
$savematrixpayout = $_POST["savematrixpayout"];
$savematrixpayout = sprintf("%.2f", $savematrixpayout);
$savegivereentrythislevel = $_POST["savegivereentrythislevel"];
$savematrixactive = $_POST["savematrixactive"];
$savecyclecommissionforsponsor = $_POST["savecyclecommissionforsponsor"];
$savecyclecommissionforsponsor = sprintf("%.2f", $savecyclecommissionforsponsor);
	if(!$savematrixlevelname)
	{
	$error = "<div>Please return and enter name for the matrix phase.</div>";
	}
	if((!$savematrixprice) or ($savematrixprice == 0))
	{
	$error .= "<div>Please return and enter the price to buy a position in this matrix phase.</div>";
	}
	if((!$savematrixpayout) or ($savematrixpayout == 0))
	{
	$error .= "<div>Please return and enter the total earnings for completing this matrix phase.</div>";
	}
$q = "update matrixconfiguration set matrixlevelname=\"$savematrixlevelname\",matrixprice=\"$savematrixprice\",matrixpayout=\"$savematrixpayout\",givereentrythislevel=\"$savegivereentrythislevel\",matrixactive=\"$savematrixactive\",cyclecommissionforsponsor=\"$savecyclecommissionforsponsor\" where id=\"$saveid\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Matrix phase saved!</p>";
} # if ($action == "savematrix")
#########################################################################################
if ($action == "resetmatrix")
{
$resetid = $_POST["resetid"];
?>
<br>
<table cellpadding="4" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2">Are you sure you want to reset the matrix phase? Doing so will remove ALL positions from this phase!</td></tr>
<form action="matrixsetup.php" method="post">
<tr><td align="center" colspan="2"><input type="button" onclick="window.open('matrixsetup.php','_top');" value="CANCEL - DO NOT RESET" class="sendit"></td></tr>
<tr><td align="center" colspan="2"><input type="hidden" name="action" value="resetmatrixconfirm"><input type="hidden" name="confirmresetid" value="<?php echo $resetid ?>"><input type="submit" value="RESET - ALL POSITIONS EXCEPT #1 WILL BE LOST!" class="sendit"></form></td></tr>
</table><br><br>

</td></tr></table>
<?php
include "../footer.php";
exit;
} # if ($action == "resetmatrix")
#########################################################################################
if ($action == "resetmatrixconfirm")
{
$confirmresetid = $_POST["confirmresetid"];
$matrixtablename = "matrix" . $confirmresetid;
$dq1 = "delete from $matrixtablename";
$dr1 = mysql_query($dq1);
$dq2 = "insert into $matrixtablename (id,username,urlreferrerid,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (1,\"COMPANY\",1,\"COMPANY\",\"Admin\",\"Admin\",1,NOW())";
$dr2 = mysql_query($dq2);
$show = "<p align=\"center\">Matrix phase was reset!</p>";
} # if ($action == "resetmatrixconfirm")
#########################################################################################
if ($action == "deletematrix")
{
$deleteid = $_POST["deleteid"];
?>
<br>
<table cellpadding="4" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2">Are you sure you want to delete the matrix phase? Doing so will delete all positions in this phase as well as the matrix phase itself!</td></tr>
<form action="matrixsetup.php" method="post">
<tr><td align="center" colspan="2"><input type="button" onclick="window.open('matrixsetup.php','_top');" value="CANCEL - DO NOT DELETE" class="sendit"></td></tr>
<tr><td align="center" colspan="2"><input type="hidden" name="action" value="deletematrixconfirm"><input type="hidden" name="confirmdeleteid" value="<?php echo $deleteid ?>"><input type="submit" value="DELETE - ENTIRE MATRIX PHASE AND ITS POSITIONS WILL BE REMOVED!" class="sendit"></form></td></tr>
</table><br><br>

</td></tr></table>
<?php
include "../footer.php";
exit;
} # if ($action == "resetmatrix")
#########################################################################################
if ($action == "deletematrixconfirm")
{
$confirmdeleteid = $_POST["confirmdeleteid"];
$matrixtablename = "matrix" . $confirmdeleteid;
$dq1 = "drop table $matrixtablename";
$dr1 = mysql_query($dq1);
$dq2 = "delete from matrixconfiguration where id=\"$confirmdeleteid\"";
$dr2 = mysql_query($dq2);
$show = "<p align=\"center\">Matrix phase was deleted!</p>";
} # if ($action == "deletematrixconfirm")
#########################################################################################
if ($action == "compressmatrix")
{
$compressid = $_POST["compressid"];
$matrixtablename = "matrix" . $compressid;
$matrixdepth = $_POST["matrixdepth"];
$q = "update $matrixtablename set positionordernumber=1 where id=1";
$r = mysql_query($q);
$q = "select * from $matrixtablename where username!=\"VACANT\" order by id";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
$positionordernumber = 0;
if ($rows > 0)
{
	while ($rowz = mysql_fetch_array($r))
	{
	$matrixid = $rowz["id"];
	$positionordernumber = $positionordernumber+1;
	for($i=1;$i<=$matrixdepth;$i++)
	{
	$levelname = "L" . $i;
	$parentidname = "parent" . $i;
	$q2 = "select * from $matrixtablename where $parentidname=\"".$matrixid."\"";
	$r2 = mysql_query($q2);
	$rows2 = mysql_num_rows($r2);
	$q3 = "update $matrixtablename set $levelname=\"".$rows2."\",positionordernumber=".$positionordernumber.",id=".$positionordernumber." where id=\"".$matrixid."\"";
	$r3 = mysql_query($q3);
	$q4 = "update $matrixtablename set $parentidname=".$positionordernumber." where $parentidname=".$matrixid;
	$r4 = mysql_query($q4);
	} # for($i=1;$i<=$matrixdepth;$i++)
	} # while ($rowz = mysql_fetch_array($r))
} # if ($rows > 0)
$show = "<p align=\"center\">Matrix phase was compressed</p>";
} # if ($action == "compressmatrix")
#########################################################################################
if ($show != "")
{
echo $show;
}
?>
<br>
<table cellpadding="4" cellspacing="0" border="0" align="center" width="90%">

<!-- START ADMIN SETTINGS FORM -->
<tr><td align="center" colspan="2"><br>
<form action="matrixsetup.php" method="post">
<table cellpadding="0" cellspacing="2" border="0" align="left" bgcolor="#999999" style="width: 680px;">
<tr bgcolor="#d3d3d3"><td align="center" colspan="2"><div class="heading">Basic Pay System Settings</div></td></tr>
<tr bgcolor="#eeeeee"><td>Minimum cashout request allowed (set to 0.00 to disable): </td><td>$<input type="text" name="newminimumpayout" value="<?php echo $minimumpayout ?>" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td>Minimum account balance members must maintain to be allowed to withdraw (set to 0.00 to disable): </td><td>$<input type="text" name="newminimumbalancetowithdraw" value="<?php echo $minimumbalancetowithdraw ?>" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td>May member buy multiple matrix positions at once?: </td><td><select name="newcanbuymultiplepositionsatonce"><option value="yes" <?php if ($canbuymultiplepositionsatonce == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($canbuymultiplepositionsatonce != "yes") { echo "selected"; } ?>>NO</option></select></td></tr>

<tr bgcolor="#eeeeee"><td>Add additional fee to matrix position prices to cover fees charged by payment processors (enter 0 to disable):</td><td><select name="newpaymentprocessorfeepercentagetoadd" class="pickone">
<?php
for ($j=0;$j<=100;$j++)
{
?>
<option value="<?php echo $j ?>" <?php if ($paymentprocessorfeepercentagetoadd == $j) { echo "selected"; } ?>><?php echo $j ?>% Of Total Price</option>
<?php
}
?>
</select></td></tr>
<tr bgcolor="#d3d3d3"><td colspan="2" align="center"><input type="hidden" name="action" value="savesettings"><input type="submit" value="SAVE SETTINGS" class="sendit"></td></tr>
</table></form>
</td></tr>
<!-- END ADMIN SETTINGS FORM -->

<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>

<!-- START ADD NEW MATRIX FORM -->
<tr><td align="center" colspan="2">
<form action="matrixsetup.php" method="post">
<table cellpadding="0" cellspacing="2" border="0" align="left" bgcolor="#999999" style="width: 680px;">
<tr bgcolor="#d3d3d3"><td align="center" colspan="2"><div class="heading">Create New m x n Matrix Phase</div></td></tr>
<tr bgcolor="#eeeeee"><td colspan="2">Members go into the next phase, in order created, after cycling the phase before it. After cycling the last phase, the position is re-entered into the first matrix phase to start over again.</td></tr>
<tr bgcolor="#eeeeee"><td align="right">Matrix phase name (anything you like..Level 1, Phase 1, etc.): </td><td><input type="text" class="typein" id="matrixlevelname" name="matrixlevelname" maxlength="255" size="16"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Matrix depth (how many levels are in this matrix phase?): </td><td><input type="text" class="typein" id="matrixdepth" name="matrixdepth" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Matrix width (how many referrals in each position's level 1 for this phase?): </td><td><input type="text" class="typein" id="matrixwidth" name="matrixwidth" maxlength="12" size="4"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Price per position in this matrix phase: </td><td><input type="text" id="matrixprice" name="matrixprice" maxlength="12" size="6" value="0.00"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Total cycle earnings for this matrix phase deposited to member account: </td><td><input type="text" id="matrixpayout" name="matrixpayout" maxlength="12" size="6" value="0.00"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Bonus earnings for sponsor when a site referral cycles this matrix phase: </td><td><input type="text" id="cyclecommissionforsponsor" name="cyclecommissionforsponsor" maxlength="12" size="6" value="0.00"></td></tr>
<tr bgcolor="#eeeeee"><td align="right">When cycling, give a re-entry into this phase: </td><td><select name="givereentrythislevel"><option value="yes">YES</option><option value="no">NO</option></select></td></tr>
<tr bgcolor="#eeeeee"><td align="right">Activate now:</td><td><select id="matrixactive" name="matrixactive" class="pickone"><option value="yes">YES</option><option value="no">NO</option></select></td></tr>
<tr bgcolor="#d3d3d3"><td colspan="2" align="center">
<input type="hidden" name="action" value="addmatrix"><input type="submit" value="CREATE" class="sendit"></form></td></tr>
</table>
</td></tr>
<!-- END ADD NEW MATRIX FORM -->

<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>

<!-- START SHOW MATRIX PHASES -->
<tr><td align="center" colspan="2">
<table cellpadding="0" cellspacing="2" border="0" align="left" bgcolor="#999999" style="width: 680px;">
<tr bgcolor="#d3d3d3"><td align="center" colspan="14"><div class="heading">Your Matrix Paysystem Phases</div></td></tr>
<?php
$mq = "select * from matrixconfiguration order by id";
$mr = mysql_query($mq);
$mrows = mysql_num_rows($mr);
if ($mrows < 1)
{
?>
<tr bgcolor="#eeeeee"><td align="center" colspan="14">No matrix phases/levels have been created yet.</td></tr>
<?php
}
if ($mrows > 0)
{
?>
<tr bgcolor="#eeeeee"><td align="center"><b>Phase/Level</b></td><td align="center"><b>Name</b></td><td align="center"><b>Matrix</b></td><td align="center"><b>Position Price</b></td><td align="center"><b>Total Cycle Earnings Deposited to Member Account</b></td><td align="center"><b>Sponsor Bonus Earnings For Referral Cycle</b></td><td align="center"><b>Earnings Used For Entry Into Next Phase (0.00 to disable)</b></td><td align="center"><b>When Cycling, Give Re-Entry into This Phase</b></td><td align="center"><b>Currently Active</b></td><td align="center"><b>Save</b></td><td align="center"><b>Compress</b></td><td align="center"><b>Reset (starts over with no positions)</b></td><td align="center"><b>Delete (completely removes)</b></td></tr>
<?php
	$matrixlevel = 0;
	$bg = 0;
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
	$matrixactive = $mrowz["matrixactive"];
	$matrixlevel = $matrixlevel+1;
	$sq = "update matrixconfiguration set matrixsequence=\"$matrixlevel\" where id=\"$id\"";
	$sr = mysql_query($sq);
	if ($bg == 0)
		{
		$bgcolor = "#d3d3d3";
		}
	if ($bg != 0)
		{
		$bgcolor = "#eeeeee";
		}
?>
<form action="matrixsetup.php" method="post">
<tr bgcolor="<?php echo $bgcolor ?>">
<td align="center"><?php echo $matrixlevel ?></td>
<td align="center"><input type="text" class="typein" id="savematrixlevelname" name="savematrixlevelname" maxlength="255" size="16" value="<?php echo $matrixlevelname ?>"></td>
<td align="center"><?php echo $matrixwidth ?> x <?php echo $matrixdepth ?></td>
<td align="center"><input type="text" id="savematrixprice" name="savematrixprice" maxlength="12" size="4" value="<?php echo $matrixprice ?>"></td>
<td align="center"><input type="text" id="savematrixpayout" name="savematrixpayout" maxlength="12" size="4" value="<?php echo $matrixpayout ?>"></td>
<td align="center"><input type="text" id="savecyclecommissionforsponsor" name="savecyclecommissionforsponsor" maxlength="12" size="4" value="<?php echo $cyclecommissionforsponsor ?>"></td>
<td align="center"><select name="savegivereentrythislevel"><option value="yes" <?php if ($givereentrythislevel == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($givereentrythislevel != "yes") { echo "selected"; } ?>>NO</option></select></td>
<td align="center"><select id="savematrixactive" name="savematrixactive" class="pickone">
<option value="yes" <?php if ($matrixactive == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($matrixactive != "yes") { echo "selected"; } ?>>NO</option></select></td>
<td align="center"><input type="hidden" name="action" value="savematrix"><input type="hidden" name="saveid" value="<?php echo $id ?>"><input type="submit" value="SAVE" style="width: 100px;"></form></td>
<form action="matrixsetup.php" method="post">
<td align="center"><input type="hidden" name="action" value="compressmatrix"><input type="hidden" name="compressid" value="<?php echo $id ?>"><input type="hidden" name="matrixdepth" value="<?php echo $matrixdepth ?>"><input type="submit" value="COMPRESS" style="width: 100px;"></form></td>
<form action="matrixsetup.php" method="post">
<td align="center"><input type="hidden" name="action" value="resetmatrix"><input type="hidden" name="resetid" value="<?php echo $id ?>"><input type="submit" value="RESET" style="width: 100px;"></form></td>
<form action="matrixsetup.php" method="post">
<td align="center"><input type="hidden" name="action" value="deletematrix"><input type="hidden" name="deleteid" value="<?php echo $id ?>"><input type="submit" value="DELETE" style="width: 100px;"></form></td>
</tr>
<?php
	if ($bgcolor == "#d3d3d3")
		{
		$bg = 1;
		}
	if ($bgcolor != "#d3d3d3")
		{
		$bg = 0;
		}
	}
}
?>
</table>
</td></tr>
<!-- END SHOW MATRIX PHASES -->


</table><br><br>

</td></tr></table>
<?php
include "../footer.php";
exit;
?>