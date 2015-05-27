<?php
if ($adpackid != "")
{
for ($i=0;$i<$addquantity;$i++)
{
$apackq = "select * from adpacks where id=\"$adpackid\"";
$apackr = mysql_query($apackq);
$apackrows = mysql_num_rows($apackr);
if ($apackrows > 0)
{
$countq = "update adpacks set howmanytimeschosen=howmanytimeschosen+1 where id=\"$adpackid\"";
$countr = mysql_query($countq);
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
} # for ($i=0;$i<$addquantity;$i++)
} # if ($adpackid != "")
?>