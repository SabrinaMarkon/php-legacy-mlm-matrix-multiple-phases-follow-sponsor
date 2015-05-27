<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

        echo "<center><H2>All Posted Text Ads</H2></center>";
                  $query = "SELECT COUNT(*) as num FROM post";
                  $total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];

        $query = "select * from post";
		$result = mysql_query ($query)
	     	or die ("Query failed");
          echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><p><b>";
   echo "$total_pages Active Text Ad Post Found";
    echo "</center></p></b>";
mysql_close($dblink);
    ?>

        <center>
          <table width=100% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Adbody/URL</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
            $adbody = $line["adbody"];
			$userid = $line["userid"];
$url = $line["url"];


        ?><tr>
	          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
	          <td bgcolor="<? echo $beasecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $adbody; ?><br><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
	          <form method="POST" action="deleteads.php">
	          <input type="hidden" name="id" value="<? echo $id; ?>">
	          <input type="submit" value="Delete">
	          </form>
	          </center>
	          </td>
          </tr> <?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
?>