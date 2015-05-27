<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
$done = $_POST['done'];
$id = $_POST['id'];
$url = $_POST['url'];
if(session_is_registered("ulogin"))
{
include("navigation.php");
include("../banners.php");
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
if ($done == "YES")
{
	if (($url == "") or ($url == "http://"))
	{
	?>
	<p>No url entered. Click <a href="addfullloginad.php">here</a> to go back<p>
	<?
	include "../footer.php";
	exit;
	}
$query = "update fullloginads set url=\"$url\",added=1,approved=0 where id=\"$id\"";
$result = mysql_query ($query) or die(mysql_error());
?>
<p><center>Your Full Page Login Ad has been submitted for approval. <a href="advertise.php">Click here</a> to go back.</p></center>
<?
} # if ($done == "YES")

else
{
if($_POST['id']) 
{	
$query = "SELECT * FROM fullloginads where userid='".$_SESSION[uname]."' AND id='".$_POST['id']."' limit 1";
}
else 
{
$query = "select * from fullloginads where added=0 and userid='".$_SESSION[uname]."' limit 1";
}
$result = mysql_query ($query) or die(mysql_error());
	while ($line = mysql_fetch_array($result))
	{
	$id = $line["id"];
	$url = $line["url"];
	if ($url != "")
	{
	$show = $url;
	}
	if ($url == "")
	{
	$show = "http://";
	}
?>
<br><br><center><H2>Add your Full Page Login Ad</H2>
<div style="padding: 0px 20px 0px 20px;"> 
<font size=2><br><br>
<b>Full Page Login Ads show 1 time per day per member who logs in, and allows them to earn points for visiting your website.<br></b>
<P align="center"><br>
<center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Submit Them!</font></h3></center>
<center><h3><font color=#000080>Protect Your Membership By Using the Tool
Below!<br>(Opens in New Window)</font></h3></center>
<center>
<form name='urtotest' target="_blank" action='sitecheck.php'
METHOD='GET' >
<input type='text' value="<?php echo $show ?>" size="50" name='url' />
<input type='submit' value='Check URL' />
<br>
</form>
</center><p>
Add Your Full Page Login Ad
</font><br><br>
</div>

<form method="post" action="addfullloginad.php">
Url:<br>
<input type="text" name="url" size="70" maxlength="255" value="<?php echo $show ?>"><br>
<input type="hidden" name="id" value="<? echo $id; ?>">
<input type="hidden" name="done" value="YES">
<p><b>Please double check your Full Page Login Ad URL, as it cannot be edited once submitted.</b></p>
<input type="submit" value="Save">
</form></center>
<?
	} # while ($line = mysql_fetch_array($result))
} # else
echo "</td></tr></table>";
} # if(session_is_registered("ulogin"))
else
{
?>
<p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>
<?
}
include "../footer.php";
mysql_close($dblink);
?>