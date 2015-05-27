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

        echo "<center><H2>All Active Hot Links</H2></center>";
 $query = "SELECT COUNT(*) as num FROM hotlinks where approved = 1";
                  $total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];

        $query = "select * from hotlinks where approved=1 ORDER BY userid";
		$result = mysql_query ($query)
	     	or die ("Query failed");
           echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><p><b>";
   echo "$total_pages Active Hot Links Found";
    echo "</center></p></b>";
mysql_close($dblink);
    ?>
            <center>
			
			<form method="POST" action="deletehotlink.php">
						<input type="hidden" name="id" value="completed">
						<input type="submit" value="Delete the completed hotlinks">
						</form>
			
			<table width=70% border=1 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Url</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Max</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Purchase</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Added</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$userid = $line["userid"];
            $added = $line["added"];
            $approved = $line["approved"];
            $subject = $line["subject"];
			$url = $line["url"];
			$max = $line["max"];
			$views = $line["views"];
            if ($approved=="1") {
            	$approved="Yes";
            }
            else {
            	$approved="No";
            }
            if ($added=="1") {
            	$added="Yes";
            }
            elseif($added=="2") {
				$added= "Complete";
			} else {
            	$added="No";
            }
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $subject; ?></font></center></td>
        <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><br><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank">ad link</a></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $max; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $views; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo date('Y-m-d', $line['purchase']); ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $added; ?></font></center></td>

		  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deletehotlink.php">
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

?>