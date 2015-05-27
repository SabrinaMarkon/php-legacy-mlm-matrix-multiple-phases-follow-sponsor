<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$userid = $_POST['userid'];

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

    $query1 = "delete from members where userid='".$userid."'";
	$result1 = mysql_query ($query1);

    $query2 = "delete from post where userid='".$userid."'";
	$result2 = mysql_query ($query2);

    $query3 = "delete from viewed where userid='".$userid."'";
	$result3 = mysql_query ($query3);

    echo $userid." has been permanently deleted!";

    echo "</table></td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>