<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if(session_is_registered("alogin"))
{
?>
<table style="background: #ffffff;">
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
#################### Hot Header/Headline Ads copyright 2010 Sabrina Markon, PearlsOfWealth.com webmaster@pearlsofwealth.com only.
        echo "<center><H2>All Hot Header Ads in the database</H2></center>";

        $query = "select * from hheaderads";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
            <div style="width: 580px; padding: 2px; overflow:auto;">
			<table align="center" width="580" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Heading</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Banner</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Description</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Added</font></center></td>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Max Clicks</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Shown</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$userid = $line["userid"];
            $added = $line["added"];
            $heading = $line["heading"];
			$url = $line["url"];
			$banner = $line["banner"];
			if ($banner == "")
			{
			$bannerurl = "";
			}
			if ($banner != "")
			{
			$bannerurl = "<img src=\"".$banner."\" border=\"0\" width=\"200\">";
			}
			$headingfontcolor = $line["headingfontcolor"];
			$description = $line["description"];
			$descriptionfontcolor = $line["descriptionfontcolor"];
			$bgcolor = $line["bgcolor"];
            $max = $line["max"];
            $views = $line["views"];
            $clicks = $line["clicks"]; 
            $approved = $line["approved"];
            if ($added=="1") {
            	$added="Yes";
            }
            else {
            	$added="No";
            }
            if ($approved=="1") {
            	$approved="Yes";
            }
            else {
            	$approved="No";
            }
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>

<?php
if ($heading == "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div>&nbsp;</div></td>
<?php
}
if ($heading != "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $bgcolor ?>; color: <?php echo $headingfontcolor ?>;"><? echo $heading; ?></div></td>
<?php
}
?>

		  <td bgcolor="<? echo $basecolour; ?>"><center><a href="sitecheck.php?url=<?php echo $url ?>" target="_blank"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><?php echo $url ?></font></a></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><?php echo $bannerurl ?></center></td>
<?php
if ($description == "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div>&nbsp;</div></td>
<?php
}
if ($description != "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center>
<div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $bgcolor ?>; color: <?php echo $descriptionfontcolor ?>;"><? echo $description; ?></div></td>
<?php
}
?>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $added; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $max; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $views; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $clicks; ?></font></center></td>
 		  <form method="POST" action="deletehheaderad.php">	
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Delete">
          </form>
          </center>
          </td>
          </td></tr> <?
        }
        echo "</table></div>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>