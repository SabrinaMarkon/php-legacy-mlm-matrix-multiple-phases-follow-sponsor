<?php
session_start();
include "config.php";
$adid = mysql_real_escape_string($_GET['id']);
if (empty($userid))
{
$message = "Invalid click link";
}
if (empty($adid))
{
$message = "Invalid click link";
}
$query = "select * from featuredads where id='".$adid."'";
$result = mysql_query ($query) or die (mysql_error());
$numrows = @ mysql_num_rows($result);
if ($numrows == 1)
{
$query2 = "select url from featuredads where id='".$adid."' LIMIT 1";
$result2 = mysql_query($query2);
	while($r=mysql_fetch_array($result2))
	{
	$url = $r['url'];
	}
mysql_query("UPDATE featuredads SET clicks=clicks+1 where id='".$adid."' LIMIT 1");
$query1 = "select * from featuredadclicks where userid='".$userid."' and featuredadid=".$adid;
$result1 = mysql_query ($query1) or die (mysql_error());
$numrows1 = @ mysql_num_rows($result1);
	if ($numrows1 >= 1)
	{
	$message = "You have already received credit for this link";
	} # if ($numrows1 >= 1)
} # if ($numrows == 1)
else
{
$message = "Invalid click link."; 
}
$message = urlencode($message);
if(empty($url))
{
$url = $domain;
}
mysql_close($dblink);
?>
<frameset ROWS="185,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
<frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="featuredadclicks2.php?message=<?=$message?>&adid=<?=$adid?>&url=<?=urlencode($url)?>">
<frame name="main" src="<?=$url?>">
</frameset><noframes></noframes>