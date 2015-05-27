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

        echo "<center><H2>All solo ads in the database</H2></center>";
        $query = "select * from solos";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
            <center><table width=70% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Added</font></center></td>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Sent</font></center></td>
 <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Date Sent</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$userid = $line["userid"];
            $added = $line["added"];
            $sent = $line["sent"];
            $approved = $line["approved"];
$sqltimestamp = $line["date"];
            $subject = $line["subject"];
            if ($sent=="1") {
            	$sent="Yes";
            }
            else {
            	$sent="No";
            }
            if ($approved=="1") {
            	$approved="Yes";
            }
            else {
            	$approved="No";
            }
            if ($added=="1") {
            	$added="Yes";
            }
            else {
            	$added="No";
            }
        ?>
<tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $subject; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $added; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $sent; ?></font></center></td>
 <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<?
  if ($sent=="Yes") {
            	echo date ("Y-m-d H:i:s", $sqltimestamp);
            }
?> 

</font></center></td>

		  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deletesolo.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
          	</form>
          </center>
          </td>
          </td></tr><?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>