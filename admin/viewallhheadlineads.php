<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if(session_is_registered("alogin"))
{
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
#################### Hot Header/Headline Ads copyright 2010 Sabrina Markon, PearlsOfWealth.com webmaster@pearlsofwealth.com only.
        echo "<center><H2>All Hot Headline Adz in the database</H2></center>";

        $query = "select * from hheadlineads";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
            <div style="width: 580px; padding: 2px; overflow:auto;">
			<table align="center" width="580" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
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
            $heading = $line["title"];
			$url = $line["url"];
			$color = $line["color"];
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
          <td bgcolor="<? echo $bgcolor; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $color; ?>"><? echo $heading; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><a href="sitecheck.php?url=<?php echo $url ?>" target="_blank"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $url; ?></font></a></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $added; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $max; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $views; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $clicks; ?></font></center></td>
 	      <form method="POST" action="deletehheadlinead.php">
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