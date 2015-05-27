<?
session_start();
include "config.php";
$id = $_GET['id'];
$query = "select * from featuredads where id = '".$id."' LIMIT 1";
$result = mysql_query ($query) or die (mysql_error());
$numrows = @ mysql_num_rows($result);
?>
<html>
<body>
<?
if($_GET['url'])
{
?>
<div style="float: left; padding-top: 75px;">
<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
</div>
<div style="float: right; padding-top: 75px;">
<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
</div>
<?
}
?>
<center>
<?
if ($numrows == 1)
{
$query1 = "select * from featuredadclicks where userid='".$userid."' and featuredadid=".$id;
$result1 = mysql_query($query1) or die (mysql_error());
$numrows1 = @ mysql_num_rows($result1);
$query3 = "select * from members where userid='".$userid."'";
$result3 = mysql_query($query3) or die (mysql_error());
$userrecord = mysql_fetch_array($result3);
$memtype = $userrecord["memtype"];
if ($numrows1 == 0)
{
if ($memtype == "SUPER JV")
{
$earn = $superjvfeaturedadearn;
}
if ($memtype == "JV Member")
{
$earn = $jvfeaturedadearn;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$earn = $profeaturedadearn;
}			
$queryaddpoints="update members set points=points+".$earn." where userid='".$userid."'";
$resultaddpoints=mysql_query($queryaddpoints);
echo "<font color=BLACK>You have earned <font color=RED><b>$earn</b></font> points</font>.&nbsp;&nbsp;";
$query2 = "insert into featuredadclicks set userid='".$userid."', dateviewed=NOW(), featuredadid=".$id;
$result2 = mysql_query ($query2) or die (mysql_error());
} # if ($numrows1 == 0)
else 
{
echo "You have already received points for this link";
}
} # if ($numrows == 1)
else
{
echo "Invalid link";
}	
?>
<br>
<?
include("banners.php");
mysql_close();
?>
</center>
</body>
</html>