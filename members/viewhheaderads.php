<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners.php");

$queryexclude = "
			SELECT h.*
			FROM hheaderads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheaderadid FROM hheaderadclicks WHERE userid = '$userid')
			ORDER BY RAND()
";
#################### Hot Header/Headline Ads copyright 2010 Sabrina Markon, PearlsOfWealth.com webmaster@pearlsofwealth.com only.
$sql = mysql_query($queryexclude);
if(@mysql_num_rows($sql))
{
echo "<font size=3 face='$fonttype' color='$fontcolour'><center>";
echo "<p><font size=4>View Hot Header Ads</font><br><br>";
echo "<font size=2 color=RED>Click The Links Below To Earn ";
if ($memtype=="JVPARTNER")
{
$earn = $jvhheaderadearn;
}
if ($memtype=="PRO")
{
$earn = $prohheaderadearn;
}
if (($memtype!="JVPARTNER") and ($memtype!="PRO"))
{
$earn = $freehheaderadearn;
}
echo "$earn Points For Each Click</font><br><br>";
echo "<table align=\"center\" width=\"880\" cellpadding=2 cellspacing=0 bgcolor=\"#FFFFFF\" border=1>";
while($info = mysql_fetch_array($sql))
{
$id = $info['id'];
$banner = $info['banner'];
$bgcolor = $info['bgcolor'];
$heading = $info['heading'];
$headingfontcolor = $info['headingfontcolor'];
$description = $info['description'];
$descriptionfontcolor = $info['descriptionfontcolor'];
mysql_query("update hheaderads set views=views+1 where id=\"$id\"");
?>
<tr>
<td width=480 bgcolor="<?php echo $bgcolor ?>" align="center"><a target="_blank" href="./hheaderadclicks1.php?id=<?php echo $id ?>">
<img src="<?php echo $banner ?>" border="0"></a></td>
<td bgcolor="<?php echo $bgcolor ?>" align="center"><font color="<?php echo $headingfontcolor ?>"><b><a style="color:<?php echo $headingfontcolor ?>; padding: 2px;" target="_blank" href="./hheaderadclicks1.php?id=<?php echo $id ?>"><?php echo $heading ?></a></b><br>
<div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $bgcolor ?>; color: <?php echo $descriptionfontcolor ?>;"><? echo $description; ?></div>
</tr>
<?php
}
echo "</table><br><br>";
}
	}
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../memberlogin.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>