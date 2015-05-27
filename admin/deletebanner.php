<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$id = $_POST['index'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
    $query1 = "delete from advertise where id=".$id;
	$result1 = mysql_query ($query1)
	     or die ("Delete from 'banners' failed");
    echo "The banner has been deleted!";

    echo "</td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>