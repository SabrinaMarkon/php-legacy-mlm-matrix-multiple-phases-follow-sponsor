<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if( session_is_registered("alogin") ) {

if ($action == "save")
{
$message = "";
	if ($rented == "")
	{
	$message .= "<br>The Rental date field was left blank";
	}
	if ($message == "")
	{
	$q = "update fullloginads set url=\"$url\",rented=\"$rented\" where id=\"$id\"";
	$r =  mysql_query($q);
	$message = "<br>The Full Page Login Ad was updated!";
	}
} # if ($action == "save")
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
if ($message != "")
{
echo "<center><font color=\"#ff0000\">" . $message . "</font></center><br>";
}
        echo "<center><H2>All Full Login Ad URLs in the database</H2></center>";
        $query = "select * from fullloginads";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
            <center><table width=85% border=1 cellpadding=0 cellspacing=0 style="border: 1px solid #000000;">
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Rental Date</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Hits</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Order Date</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Save</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$userid = $line["userid"];
            $url = $line["url"];
			$rented = $line["rented"];
            $approved = $line["approved"];
			$added = $line["added"];
			$hits = $line["hits"];
			$purchase = $line["purchase"];
			$purchase = formatDate($purchase);
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
        ?><tr>
		<form method="POST" action="viewallfullloginads.php">
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>" align="center"><input type="text" name="url" value="<?php echo $url ?>" size="25" maxlength="255"></td>
          <td bgcolor="<? echo $basecolour; ?>" align="center"><input type="text" name="rented" value="<?php echo $rented ?>" maxlength="10" size="10"></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $hits; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $purchase; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center>
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="action" value="save">
          	<input type="submit" value="Save">
          </center>
		  </form>
		  </td>
		  <form method="POST" action="deletefullloginad.php">
		  <td bgcolor="<? echo $basecolour; ?>"><center>
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
          </center>
		  </form>
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