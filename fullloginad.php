<?php
session_start();
ob_start();
include "config.php";
$flid = $_GET['flid'];
$url = $_GET['url'];
if (($flid != "") and ($url != ""))
{
$top = $domain."/fullloginadtop.php?flid=".$flid."&url=".urlencode($url);
$viewq = "update fullloginads set hits=hits+1,lastshown=NOW() where id=\"$flid\"";
$viewr = mysql_query($viewq);
?>
<frameset rows="185,*" border=0 frameborder=1 framespacing=0>
<frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="<?php echo $top ?>">
<frame name="main" src="<?php echo $url ?>">
</frameset>
<?php
} # if (($flid != "") and ($url != ""))
################################################
else
{
$flq1 = "select * from fullloginads where approved=\"1\" and rented=\"".date('Y-m-j')."\" order by rand() limit 1";
$flr1 = mysql_query($flq1);
$flrows1 = mysql_num_rows($flr1);
	if ($flrows1 > 0)
	{
	$flid = mysql_result($flr1,0,"id");
	$url = mysql_result($flr1,0,"url");
	$top = $domain."/fullloginadtop.php?flid=".$flid."&url=".urlencode($url);
	$viewq = "update fullloginads set hits=hits+1,lastshown=NOW() where id=\"$flid\"";
	$viewr = mysql_query($viewq);
?>
<frameset rows="185,*" border=0 frameborder=1 framespacing=0>
<frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="<?php echo $top ?>">
<frame name="main" src="<?php echo $url ?>">
</frameset>
<?php
	}
	if ($flrows1 < 1)
	{
	$url = $domain."/members/index.php";
	@header("refresh: 0; url=$url");
	}
} # else
?>