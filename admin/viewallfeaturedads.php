<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if (session_is_registered("alogin"))
{
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td  valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
if ($message != "")
{
echo "<center><font color=\"#ff0000\">" . $message . "</font></center><br>";
}
echo "<center><H2>All Featured Ads currently in the system</H2></center>";
$query = "SELECT COUNT(*) as num FROM featuredads";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages[num];
$query = "select * from featuredads ORDER BY userid";
$result = mysql_query ($query) or die ("Query failed");
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
echo "<center><p><b>";
echo "$total_pages Featured Ads Found";
echo "</center></p></b>";
?>
<center>
<form method="POST" action="deletefeaturedads.php">
<input type="hidden" name="id" value="completed">
<input type="submit" value="Delete the completed campaigns">
</form>
						
<table width=100% border=1 cellpadding=2 cellspacing=0 style="border: 1px solid #000000;">
<tr>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Heading</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Highlight Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Description</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Max Impressions</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Purchase</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Save</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
</tr>
<?
while ($line = mysql_fetch_array($result))
{
$featuredadid = $line["id"];
$featuredaduserid = $line["userid"];
$featuredadurl = $line["url"];
$featuredadheading = $line["heading"];
$featuredadheading = stripslashes($featuredadheading);
$featuredadheadinghighlight = $line["headinghighlight"];
$featuredaddescription = $line["description"];
$featuredaddescription = stripslashes($featuredaddescription);
$descriptions = explode("\n",$featuredaddescription);
$counter = count($descriptions);
$descriptionformfields = "";
for($m = 1; $m <= $featuredaddescmaxbodylines; $m++)
{
$descriptionline = $descriptions[$m];
$descriptionformfields = $descriptionformfields . "<input type=\"text\" id=\"description$m\" name=\"description$m\" maxlength=\"$featuredaddescmaxcharsperline\" size=\"$featuredaddescmaxcharsperline\" value=\"$descriptionline\"><br>";
} # for($m = 0; $m < $counter; $m++)
$featuredadapproved = $line["approved"];
$featuredadviews = $line["views"];
$featuredadclicks = $line["clicks"];
$featuredadmax = $line["max"];
$featuredadpurchase = $line["purchase"];
$featuredadpurchase = formatDate($featuredadpurchase);
?>
<tr>
<form method="POST" action="savefeaturedads.php">
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<p><? echo $featuredaduserid; ?></p></font>
</TD>		
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="text" name="heading" value="<?php echo $featuredadheading ?>" size="16" maxlength="255"></td>
<td bgcolor="<? echo $featuredadheadinghighlight; ?>" align="center"><input type="text" name="headinghighlight" value="<?php echo $featuredadheadinghighlight ?>" size="8" maxlength="255"></td>
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="text" name="url" value="<?php echo $featuredadurl ?>" size="16" maxlength="255"></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><?php echo $descriptionformfields ?></td>
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="text" name="max" value="<?php echo $featuredadmax ?>" maxlength="8" size="6"></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<p><? echo $featuredadviews; ?></p></font>
</TD>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<p><? echo $featuredadclicks; ?></p></font>
</TD>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<p><? echo $featuredadpurchase; ?></p></font>
</TD>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<? if ($featuredadapproved == 1) {
echo "Yes";
}
elseif ($featuredadapproved == 0) {
echo "Not yet";
}
elseif ($featuredadapproved == 2) {
echo "Denied *";
$addnote = 1;
}
?></font>
</TD>
<td bgcolor="<? echo $basecolour; ?>"><center>
<input type="hidden" name="id" value="<? echo $featuredadid; ?>">
<input type="hidden" name="action" value="save">
<input type="submit" value="Save"></form>
</td>
<form method="POST" action="deletefeaturedads.php">
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<? if($featuredadmax <= $featuredadviews) echo "campaign completed"; ?>
<input type="hidden" name="id" value="<? echo $featuredadid; ?>">
<input type="submit" value="Delete">
</form>
</td>
</tr>
<?
}# while ($line = mysql_fetch_array($result))
echo "</table></center>" ;
echo "</td></tr></table>";
} # if (session_is_registered("alogin"))
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
mysql_close($dblink);
?>