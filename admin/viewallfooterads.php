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

        echo "<center><H2>All footer ads currently in the system</H2></center>";
 $query = "SELECT COUNT(*) as num FROM footerads where approved = 1";
                  $total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];

        $query = "select * from footerads where approved=1 ORDER BY userid";
		$result = mysql_query ($query)
	     	or die ("Query failed");

 echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><p><b>";
   echo "$total_pages Active Footer Ads Found";
    echo "</center></p></b>";
mysql_close($dblink);
    ?>
        <center>
						<form method="POST" action="deletefooterads.php">
						<input type="hidden" name="id" value="completed">
						<input type="submit" value="Delete the completed campaigns">
						</form>
						
          <table width=100% border=0 cellpadding=2 cellspacing=2>
        	<tr>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Footer Ad</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Paid For</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
				$userid = $line["userid"];
	            $subject = $line["subject"];
	            $url = $line["url"];
	            $paid = $line["paid"];
	            $adid = $line["id"];
                            $clicks = $line["clicks"];
                            $desc1 = $line["desc1"];
                            $desc2 = $line["desc2"];
	            $approved = $line["approved"];
	          
        ?><tr>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $userid; ?></p></font>
	                </TD>		
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?><br><? echo $desc1; ?><br><? echo $desc2; ?></p></font>
	                </TD>
	                 <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><br><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank">ad link</a></font></center></td>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $paid; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $clicks; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if($paid <= $counter) echo "campaign completed"; ?>
						<form method="POST" action="deletefooterads.php">
						<input type="hidden" name="id" value="<? echo $adid; ?>">
						<input type="submit" value="Delete">
						</form>
						</font>
	                </TD>
          </tr> <?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>