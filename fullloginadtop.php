<?php
session_start();
include "config.php";
$flid = $_GET['flid'];
$url = $_GET['url'];
$amt = $_GET['amt'];
if ($userid == "")
{
if ($url != "")
{
?>
<div style="float: left; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<div style="float: right; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<?
} # if ($url == "")
echo "<center>Invalid member account</center>";
exit;
} # if ($userid == "")
if ($flid == "")
{
if ($url != "")
{
?>
<div style="float: left; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<div style="float: right; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<?
} # if ($url != "")
echo "<center>Invalid link</center>";
exit;
} # if ($flid == "")
########################################################################
if ($memtype == "SUPER JV")
{
$fullloginadearn = $superjvfullloginadearn;
$fullloginadcredittimer = $superjvfullloginadcredittimer;
}
if ($memtype == "JV Member")
{
$fullloginadearn = $jvfullloginadearn;
$fullloginadcredittimer = $jvfullloginadcredittimer;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$fullloginadearn = $profullloginadearn;
$fullloginadcredittimer = $profullloginadcredittimer;
}
$redirecturl = $domain."/fullloginadtop.php?amt=".$fullloginadearn."&flid=".$flid."&url=".urlencode($url);
########################################################################
if ($amt != "")
{
$alreadyclickedq = "select * from fullloginadviews where userid=\"$userid\" and fullloginadid=\"$flid\"";
$alreadyclickedr = mysql_query($alreadyclickedq);
$alreadyclickedrows = mysql_num_rows($alreadyclickedr);
if ($alreadyclickedrows > 0)
	{
	if ($url != "")
	{
	?>
	<div style="float: left; padding-top: 75px;">
	<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
	</div>
	<div style="float: right; padding-top: 75px;">
	<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
	</div>
	<?
	} # if ($url != "")
?>
<center>You Already Earned Points Today For This Link - <a href="/members/index.php" target="_top">Go to the member area</a> - <a href="/members/fullloginadbuy.php" target="_top">Purchase Full Login Ads</a>
<br>
<?
include("banners.php");
mysql_close($dblink);
?>
</center>
<?php
exit;
	} # if ($alreadyclickedrows > 0)
#########################
$pointsq1 = "update members set points=points+".$amt.",lastfullloginadseen='".date('Y-m-j')."' where userid='".$userid."'";
$pointsr1 = mysql_query($pointsq1);
$pointsq2 = "insert into fullloginadviews (userid,fullloginadid,dateviewed) values (\"$userid\",\"$flid\",NOW())";
$pointsr2 = mysql_query($pointsq2);
if ($url != "")
{
?>
<div style="float: left; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<div style="float: right; padding-top: 75px;">
<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
</div>
<?
} # if ($url != "")
?>
<center>You Have Earned <?php echo $amt ?> Points - <a href="/members/index.php" target="_top">Go to the member area</a> - <a href="/members/fullloginadbuy.php" target="_top">Purchase Full Login Ads</a>
<br>
<?
include("banners.php");
mysql_close($dblink);
?>
</center>
<?php
exit;
} # if ($amt != "")
########################################################################
$alreadyclickedq = "select * from fullloginadviews where userid=\"$userid\" and fullloginadid=\"$flid\"";
$alreadyclickedr = mysql_query($alreadyclickedq);
$alreadyclickedrows = mysql_num_rows($alreadyclickedr);
if ($alreadyclickedrows > 0)
	{
	if ($url != "")
	{
	?>
	<div style="float: left; padding-top: 75px;">
	<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
	</div>
	<div style="float: right; padding-top: 75px;">
	<a href="<?php echo $url ?>" target="_top">Remove This Frame</a>
	</div>
	<?
	} # if ($url != "")
?>
<center>You Already Earned Points Today For This Link - <a href="/members/index.php" target="_top">Go to the member area</a> - <a href="/members/fullloginadbuy.php" target="_top">Purchase Full Login Ads</a>
<br>
<?
include("banners.php");
mysql_close($dblink);
?>
</center>
<?php
exit;
	} # if ($alreadyclickedrows > 0)
?>
<html><head></head>
<body>
<center>You Will Earn <?php echo $fullloginadearn ?> Points After <span id="plzwait"><?php echo $fullloginadcredittimer ?> Seconds</span>
<script type="text/javascript">
counter = <?php echo $fullloginadcredittimer ?>;
function countdown() {
	if ((0 <= 100) || (0 > 0)) {
		counter--;
		if(counter > 0) {
			document.getElementById("plzwait").innerHTML = '<b>'+counter+'<\/b> seconds';
			setTimeout('countdown()',1000);
		}
		if(counter < 1)
		{
		window.location="<?php echo $redirecturl ?>";
		}
	}
}
countdown();
</script>
<br>
<?
include("banners.php");
mysql_close($dblink);
?>
</center>
</body>
</html>