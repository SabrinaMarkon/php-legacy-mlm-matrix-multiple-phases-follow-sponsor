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
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

        echo "<center><H2>All Bottom Navigation Links</H2></center>";
       $query = "SELECT COUNT(*) as num FROM botnav";
                  $total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];

        $query = "select * from botnav ORDER BY userid";
		$result = mysql_query ($query)
	     	or die ("Query failed");

 echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><p><b>";
   echo "$total_pages Bottom Nav Links Found";
    echo "</center></p></b>";
mysql_close($dblink);
    ?>

                    <center><table width=70% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Url</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Added</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$userid = $line["userid"];
            $added = $line["added"];
            $status = $line["status"];
            $name = $line["name"];
			$url = $line["targeturl"];
            if ($status=="1") {
            	$status="Yes";
            }
            else {
            	$status="No";
            }
            if ($added=="1") {
            	$added="Yes";
            }
            else {
            	$added="No";
            }
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $name; ?></font></center></td>
         <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><br><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank">ad link</a></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $status; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $added; ?></font></center></td>

		  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deletebotnav.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
          	</form>
          </center>
          </td>
          </td></tr> <?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>