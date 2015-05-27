<?php
session_start();
include "../config.php";
if(session_is_registered("alogin"))
{
$action = $_POST["action"];
$show = "";
####################################################################################################
if ($action == "addadpack")
{
$apquantity = $_POST['apquantity'];
$userid = $_POST['adpackuserid'];
$adpacktogive = $_POST['adpacktogive'];
for($k=1;$k<=$apquantity;$k++)
{
	$apackq = "select * from adpacks where id=\"$adpacktogive\"";
	$apackr = mysql_query($apackq);
	$apackrows = mysql_num_rows($apackr);
	if ($apackrows > 0)
	{
	$description = mysql_result($apackr,0,"description");
	$points = mysql_result($apackr,0,"points");
	$surfcredits = mysql_result($apackr,0,"surfcredits");
	$banner_num = mysql_result($apackr,0,"banner_num");
	$banner_views = mysql_result($apackr,0,"banner_views");
	$solo_num = mysql_result($apackr,0,"solo_num");
	$traffic_num = mysql_result($apackr,0,"traffic_num");
	$traffic_views = mysql_result($apackr,0,"traffic_views");
	$login_num = mysql_result($apackr,0,"login_num");
	$login_views = mysql_result($apackr,0,"login_views");
	$hotlink_num = mysql_result($apackr,0,"hotlink_num");
	$hotlink_views = mysql_result($apackr,0,"hotlink_views");
	$button_num = mysql_result($apackr,0,"button_num");
	$button_views = mysql_result($apackr,0,"button_views");
	$ptc_num = mysql_result($apackr,0,"ptc_num");
	$ptc_views = mysql_result($apackr,0,"ptc_views");
	$featuredad_num = mysql_result($apackr,0,"featuredad_num");
	$featuredad_views = mysql_result($apackr,0,"featuredad_views");
	$hheaderad_num = mysql_result($apackr,0,"hheaderad_num");
	$hheaderad_views = mysql_result($apackr,0,"hheaderad_views");
	$hheadlinead_num = mysql_result($apackr,0,"hheadlinead_num");
	$hheadlinead_views = mysql_result($apackr,0,"hheadlinead_views");
	########################################################
	if ($points > 0)
		{
		mysql_query("UPDATE members SET points=points+".$points." WHERE userid='".$userid."'");
		}
	if ($surfcredits > 0)
		{
		mysql_query("UPDATE members SET surfcredits=surfcredits+".$surfcredits." WHERE userid='".$userid."'");
		}
	if ($solo_num > 0)
		{
			$count = $solo_num;
			while($count > 0) {
				mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$userid."', '0', '', '', '0', '0')");
				$count--;
			}
		}
	if (($featuredad_num > 0) and ($featuredad_views > 0))
		{
			$count = $featuredad_num;
			while($count > 0) {
				mysql_query("insert into featuredads (userid,max,purchase) values('$userid','".$featuredad_views."',NOW())");
				$count--;
				}
		}
	if (($hheaderad_num > 0) and ($hheaderad_views > 0))
		{
			$count = $hheaderad_num;
			while($count > 0) {
				mysql_query("insert into hheaderads (userid,max,purchase) values('$userid','".$hheaderad_views."',NOW())");
				$count--;
				}
		}
	if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
		{
			$count = $hheadlinead_num;
			while($count > 0) {
				mysql_query("insert into hheadlineads (userid,max,purchase) values('$userid','".$hheadlinead_views."',NOW())");
				$count--;
				}
		}
	if (($banner_num > 0) and ($banner_views > 0))
		{
			$count = $banner_num;
			while($count > 0) {
				mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$banner_views."', '0')");
				$count--;
			}
		}
	if (($button_num > 0) and ($button_views > 0))
		{
			$count = $button_num;
			while($count > 0) {
				mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$userid."', '0', '0', '0', '".$button_views."', '0')");
				$count--;
			}
		}
	if (($login_num > 0) and ($login_views > 0))
		{
			$count = $login_num;
			while($count > 0) {
				mysql_query("insert into loginads (userid,max) values('$userid','".$login_views."')");
				$count--;
			}
		}
	if (($traffic_num > 0) and ($traffic_views > 0))
		{
			$count = $traffic_num;
			while($count > 0) {
				mysql_query("insert into tlinks (userid,paid) values('$userid','".$traffic_views."')");
				$count--;
			}
		}
	if (($hotlink_num > 0) and ($hotlink_views > 0))
		{
			$count = $hotlink_num;
			while($count > 0) {
				mysql_query("insert into hotlinks (userid,max) values('$userid','".$hotlink_views."')");
				$count--;
			}
		}
	if (($ptc_num > 0) and ($ptc_views > 0))
		{
			$count = $ptc_num;
			while($count > 0) {
				mysql_query("insert into ptcads (userid,paid) values('$userid','".$ptc_views."')");
				$count--;
			}
		}
	} # if ($apackrows > 0)
$hmq = "update adpacks set howmanytimeschosen=howmanytimeschosen+1 where id=\"$adpacktogive\"";
$hmr = mysql_query($hmq);
} # for($k=1;$k<=$apquantity;$k++)
$show = "<div align=\"center\" style=\"color: #ff0000;\">" . $apquantity . " " . $sitename . " AdPack(s) Were Given To " . $adpackuserid . "</div><br>";
} # if ($action == "addadpack")
####################################################################################################
if ($action == "update")
{
if ($_POST['description'] == "")
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
	echo "<p align=\"center\">Description field was left blank.</p>";
	echo "<p align=\"center\"><a href=\"adpacks_admin.php\">Return</a></p>";
?>
</td></tr></table>
<?php
	include "../footer.php";
	exit;
	}
mysql_query("update adpacks set description = '".$_POST['description']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', enabled = '".$_POST['enabled']."' where id='".$_POST['id']."'");
$show = "<div align=\"center\" style=\"color: #ff0000;\">Your " . $sitename . " AdPack Was Saved!</div><br>";
} # if ($action == "update")
####################################################################################################
if ($action == "add")
{
if ($_POST['description'] == "")
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
	echo "<p align=\"center\">Description field was left blank.</p>";
	echo "<p align=\"center\"><a href=\"adpacks_admin.php\">Return</a></p>";
?>
</td></tr></table>
<?php
	include "../footer.php";
	exit;
	}
mysql_query("insert into adpacks set description = '".$_POST['description']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', enabled = '".$_POST['enabled']."'");
$show = "<div align=\"center\" style=\"color: #ff0000;\">New " . $sitename . " AdPack Added!</div><br>";
} # if ($action == "add")
####################################################################################################
if ($action == "delete")
{
mysql_query("delete from adpacks where id='".$_POST['id']."'");
$show = "<div align=\"center\" style=\"color: #ff0000;\">The " . $sitename . " AdPack Was Deleted</div><br>";
} # if ($action == "delete")
####################################################################################################
if ($action == "edit")
{
$editq = "select * from adpacks where id='".$_POST['id']."'";
$editr = mysql_query($editq);
$editrows = mysql_num_rows($editr);
if ($editrows > 0)
{
$offer = mysql_fetch_array($editr);
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
<tr><td valign="top" align="center">
<tr><td colspan="2" align="center">
<table cellpadding="0" cellspacing="2" border="0" align="center" width="90%" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading">Edit <?php echo $sitename ?> AdPack</div></td></tr>
<tr bgcolor="#eeeeee"><td colspan="2">AdPacks are given to a member as a bonus every time they receive a new matrix position. If you create AdPacks, members will have the option before they pay for a Matrix Position to select which AdPack they want, and the ads will be given to them immediately after payment.</td></tr>
<form method="POST" action="adpacks_admin.php">
<input type="hidden" name="id" value="<? echo $offer['id']; ?>">
<input type="hidden" name="action" value="update">
<tr bgcolor="#eeeeee"><td>Enabled:</td><td><select name="enabled">
<option value="yes" <?php if ($offer["enabled"] == "yes") { echo "selected"; } ?>>YES</option>
<option value="no" <?php if ($offer["enabled"] != "yes") { echo "selected"; } ?>>NO</option>
</td></tr>
<tr bgcolor="#eeeeee"><td>Description:</td><td><input type="text" name="description" maxlength="255" size="65" value="<? echo $offer["description"]; ?>"></td></tr>
<tr bgcolor="#eeeeee"><td>Points to add:</td><td><input type="text" name="points" value="<? echo $offer["points"]; ?>"> points</td></tr>
<tr bgcolor="#eeeeee"><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="<? echo $offer["surfcredits"]; ?>"> surf credits</td></tr>
<tr bgcolor="#eeeeee"><td>Solo to add:</td><td><input type="text" name="solo_num" value="<? echo $offer["solo_num"]; ?>"> solos</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Headline Adz to add:</td><td><input type="text" name="hheadlinead_num" value="<? echo $offer["hheadlinead_num"]; ?>"> hot headline ads</td></tr>
<tr bgcolor="#eeeeee"><td>Clicks per Hot Headline Ad:</td><td><input type="text" name="hheadlinead_views" value="<? echo $offer["hheadlinead_views"]; ?>"> clicks</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Header Ads to add:</td><td><input type="text" name="hheaderad_num" value="<? echo $offer["hheaderad_num"]; ?>"> hot header ads</td></tr>
<tr bgcolor="#eeeeee"><td>Clicks per Hot Header Ad:</td><td><input type="text" name="hheaderad_views" value="<? echo $offer["hheaderad_views"]; ?>"> clicks</td></tr>
<tr bgcolor="#eeeeee"><td>Banners to add:</td><td><input type="text" name="banner_num" value="<? echo $offer["banner_num"]; ?>"> banners</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Banner:</td><td><input type="text" name="banner_views" value="<? echo $offer["banner_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Featured Ads to add:</td><td><input type="text" name="featuredad_num" value="<? echo $offer["featuredad_num"]; ?>"> featured ads</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Featured Ad:</td><td><input type="text" name="featuredad_views" value="<? echo $offer["featuredad_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Button Banners to add:</td><td><input type="text" name="button_num" value="<? echo $offer["button_num"]; ?>"> banners</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Button Banner:</td><td><input type="text" name="button_views" value="<? echo $offer["button_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Traffic Links to add:</td><td><input type="text" name="traffic_num" value="<? echo $offer["traffic_num"]; ?>"> traffic links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Traffic Link:</td><td><input type="text" name="traffic_views" value="<? echo $offer["traffic_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>PTC Links to add:</td><td><input type="text" name="ptc_num" value="<? echo $offer["ptc_num"]; ?>"> ptc links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per PTC Link:</td><td><input type="text" name="ptc_views" value="<? echo $offer["ptc_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Links to add:</td><td><input type="text" name="hotlink_num" value="<? echo $offer["hotlink_num"]; ?>"> hot links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Hot Link:</td><td><input type="text" name="hotlink_views" value="<? echo $offer["hotlink_views"]; ?>"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Login ads to add:</td><td><input type="text" name="login_num" value="<? echo $offer["login_num"]; ?>"> login ads</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Login ad:</td><td><input type="text" name="login_views" value="<? echo $offer["login_views"]; ?>"> views</td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="UPDATE">&nbsp;&nbsp;<input type="button" value="CANCEL" onclick="window.location='adpacks_admin.php'"></td></tr>
</table>
</form>
</td></tr></table>
</td></tr></table>
<?php
include "../footer.php";
exit;
}
if ($editrows < 1)
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
echo "<p align=\"center\">That AdPack Was Not Found.</p>";
echo "<p align=\"center\"><a href=\"adpacks_admin.php\">Return</a></p>";
?>
</td></tr></table>
</td></tr></table>
<?php
include "../footer.php";
exit;
}
} # if ($action == "edit")
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
<tr><td valign="top" align="center">
<?php
if ($show != "")
{
echo $show;
}
$q = "select * from adpacks order by id";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
{
?>
<tr><td colspan="2" align="center">
<table cellpadding="0" cellspacing="2" border="0" align="center" width="90%" bgcolor="#999999">
<tr><td align="center" colspan="5"><div class="heading"><?php echo $sitename ?> AdPacks</div></td></tr>
<tr bgcolor="#eeeeee"><td align="center"><b>Description</b></td><td align="center"><b>Enabled</b></td><td align="center"><b>How Many Times Chosen</b></td><td align="center"><b>Edit</b></td><td align="center"><b>Delete</b></td></tr>
<?php
	while ($rowz = mysql_fetch_array($r))
	{
	$id = $rowz["id"];
	$description = $rowz["description"];
	$howmanytimeschosen = $rowz["howmanytimeschosen"];
	$enabled = $rowz["enabled"];
	$points = $rowz["points"];
	$surfcredits = $rowz["surfcredits"];
	$banner_num = $rowz["banner_num"];
	$banner_views = $rowz["banner_views"];
	$solo_num = $rowz["solo_num"];
	$traffic_num = $rowz["traffic_num"];
	$traffic_views = $rowz["traffic_views"];
	$login_num = $rowz["login_num"];
	$login_views = $rowz["login_views"];
	$hotlink_num = $rowz["hotlink_num"];
	$hotlink_views = $rowz["hotlink_views"];
	$button_num = $rowz["button_num"];
	$button_views = $rowz["button_views"];
	$ptc_num = $rowz["ptc_num"];
	$ptc_views = $rowz["ptc_views"];
	$featuredad_num = $rowz["featuredad_num"];
	$featuredad_views = $rowz["featuredad_views"];
	$hheaderad_num = $rowz["hheaderad_num"];
	$hheaderad_views = $rowz["hheaderad_views"];
	$hheadlinead_num = $rowz["hheadlinead_num"];
	$hheadlinead_views = $rowz["hheadlinead_views"];
	$details = "";
	if ($points > 0)
		{
		$details .= "<span>$points Points</span><br>";
		}
	if ($surfcredits > 0)
		{
		$details .= "<span>$surfcredits Surf Credits</span><br>";
		}
	if ($solo_num > 0)
		{
		$details .= "<span>$solo_num Solo Ads</span><br>";
		}
	if (($featuredad_num > 0) and ($featuredad_views > 0))
		{
		$details .= "<span>$featuredad_num Featured Ads with $featuredad_views Impressions</span><br>";
		}
	if (($hheaderad_num > 0) and ($hheaderad_views > 0))
		{
		$details .= "<span>$hheaderad_num Hot Header Adz with $hheaderad_views Impressions</span><br>";
		}
	if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
		{
		$details .= "<span>$hheadlinead_num Hot Headline Adz with $hheadlinead_views Impressions</span><br>";
		}
	if (($banner_num > 0) and ($banner_views > 0))
		{
		$details .= "<span>$banner_num Banner Ads with $banner_views Impressions</span><br>";
		}
	if (($button_num > 0) and ($button_views > 0))
		{
		$details .= "<span>$button_num Button Banner Ads with $button_views Impressions</span><br>";
		}
	if (($login_num > 0) and ($login_views > 0))
		{
		$details .= "<span>$login_num Login Ads with $login_views Impressions</span><br>";
		}
	if (($traffic_num > 0) and ($traffic_views > 0))
		{
		$details .= "<span>$traffic_num Traffic Links with $traffic_views Impressions</span><br>";
		}
	if (($hotlink_num > 0) and ($hotlink_views > 0))
		{
		$details .= "<span>$hotlink_num Hot Links with $hotlink_views Impressions</span><br>";
		}
	if (($ptc_num > 0) and ($ptc_views > 0))
		{
		$details .= "<span>$ptc_num PTC Ads with $ptc_views Impressions</span><br>";
		}
?>
<tr bgcolor="#eeeeee"><td align="center">
<a href="javascript:;" onclick="document.getElementById('showadpack').innerHTML='<?php echo $details ?>';"><?php echo $description ?></a></td><td align="center"><?php echo $enabled ?></td><td align="center"><?php echo $howmanytimeschosen ?></td>
<form method="POST" action="adpacks_admin.php">
<td align="center">
<input type="hidden" name="action" value="edit">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="EDIT" style="width: 99%;">
</form>
</td>
<form method="POST" action="adpacks_admin.php">
<td align="center">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" value="DELETE" style="width: 99%;">
</form>
</td>
</tr>
<?php
	} # while ($rowz = mysql_fetch_array($r))
?>
<tr bgcolor="#eeeeee"><td colspan="5" align="center">
<div id="showadpack"></div>
</td></tr>
</table></td></tr>
<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
<?php
} # if ($rows > 0)
?>
<tr><td align="center" colspan="2">
<table cellpadding="0" cellspacing="2" border="0" align="center" bgcolor="#999999" style="width: 300px;">
<tr><td align="center" colspan="2"><div class="heading">Give <?php echo $sitename ?> AdPack To A Member</div></td></tr>
<?php
$uq = "select * from members order by userid";
$ur = mysql_query($uq);
$urows = mysql_num_rows($ur);
if ($urows < 1)
{
?>
<tr><td align="center" colspan="2">There are no members yet to give AdPacks to.</td></tr>
<?php
}
if ($urows > 0)
{
	$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
	$adpackr = mysql_query($adpackq);
	$adpackrows = mysql_num_rows($adpackr);
	if ($adpackrows < 1)
	{
	?>
	<tr><td align="center" colspan="2">There are no AdPacks available yet. Please create some below.</td></tr>
	<?php
	}
	if ($adpackrows > 0)
	{
	?>
	<form action="adpacks_admin.php" method="post">
	<tr bgcolor="#eeeeee"><td align="right">Give To Member: </td><td>
	<select name="adpackuserid" class="pickone">
	<?php
	while ($urowz = mysql_fetch_array($ur))
	{
	$userid = $urowz["userid"];
	echo "<option value=\"" . $userid . "\">" . $userid . "</option>";
	}
	?>
	</select>
	</td></tr>
	<tr bgcolor="#eeeeee"><td>Select AdPack: </td><td><select name="adpacktogive">
	<?php
		while ($adpackrowz = mysql_fetch_array($adpackr))
			{
			$adpackid = $adpackrowz["id"];
			$adpackdescription = $adpackrowz["description"];
	?>
	<option value="<?php echo $adpackid ?>"><?php echo $adpackdescription ?></option>
	<?php
			}
	?>
	</select></td></tr>
	<tr bgcolor="#eeeeee"><td align="right">How Many To Give: </td><td><select name="apquantity" class="pickone">
	<?php
	for ($i=1;$i<=100;$i++)
	{
	?>
	<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
	</select></td></tr>
	<tr><td colspan="2" align="center">
	<input type="hidden" name="action" value="addadpack"><input type="submit" value="ADD" class="sendit"></form></td></tr>
	<?php
	} # if ($adpackrows > 0)
} # if ($urows > 0)
?>
</table>
</td></tr>
<tr><td colspan="2" align="center"><br>&nbsp;</td></tr>
<tr><td colspan="2" align="center">
<table cellpadding="0" cellspacing="2" border="0" align="center" width="90%" bgcolor="#999999">
<tr><td align="center" colspan="2"><div class="heading">Create <?php echo $sitename ?> AdPacks</div></td></tr>
<tr bgcolor="#eeeeee"><td colspan="2">AdPacks are given to a member as a bonus every time they receive a new matrix position. If you create AdPacks, members will have the option before they pay for a Matrix Position to select which AdPack they want, and the ads will be given to them immediately after payment.</td></tr>
<form method="POST" action="adpacks_admin.php">
<input type="hidden" name="action" value="add">
<tr bgcolor="#eeeeee"><td>Enable:</td><td><select name="enabled">
<option value="yes" selected>YES</option>
<option value="no">NO</option>
</td></tr>
<tr bgcolor="#eeeeee"><td>Description:</td><td><input type="text" name="description" maxlength="255" size="65" value=""></td></tr>
<tr bgcolor="#eeeeee"><td>Points to add:</td><td><input type="text" name="points" value="0"> points</td></tr>
<tr bgcolor="#eeeeee"><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="0"> surf credits</td></tr>
<tr bgcolor="#eeeeee"><td>Solo to add:</td><td><input type="text" name="solo_num" value="0"> solos</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Headline Adz to add:</td><td><input type="text" name="hheadlinead_num" value="0"> hot headline ads</td></tr>
<tr bgcolor="#eeeeee"><td>Clicks per Hot Headline Ad:</td><td><input type="text" name="hheadlinead_views" value="0"> clicks</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Header Ads to add:</td><td><input type="text" name="hheaderad_num" value="0"> hot header ads</td></tr>
<tr bgcolor="#eeeeee"><td>Clicks per Hot Header Ad:</td><td><input type="text" name="hheaderad_views" value="0"> clicks</td></tr>
<tr bgcolor="#eeeeee"><td>Banners to add:</td><td><input type="text" name="banner_num" value="0"> banners</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Banner:</td><td><input type="text" name="banner_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Featured Ads to add:</td><td><input type="text" name="featuredad_num" value="0"> featured ads</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Featured Ad:</td><td><input type="text" name="featuredad_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Button Banners to add:</td><td><input type="text" name="button_num" value="0"> banners</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Button Banner:</td><td><input type="text" name="button_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Traffic Links to add:</td><td><input type="text" name="traffic_num" value="0"> traffic links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Traffic Link:</td><td><input type="text" name="traffic_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>PTC Links to add:</td><td><input type="text" name="ptc_num" value="0"> ptc links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per PTC Link:</td><td><input type="text" name="ptc_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Hot Links to add:</td><td><input type="text" name="hotlink_num" value="0"> hot links</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Hot Link:</td><td><input type="text" name="hotlink_views" value="0"> views</td></tr>
<tr bgcolor="#eeeeee"><td>Login ads to add:</td><td><input type="text" name="login_num" value="0"> login ads</td></tr>
<tr bgcolor="#eeeeee"><td>Views per Login ad:</td><td><input type="text" name="login_views" value="0"> views</td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="ADD"></td></tr>
</table>
</form>


</td></tr></table>
</td></tr></table>
<?php
include "../footer.php";
}
else
{
echo "Unauthorised Access!";
exit;
}
?>


