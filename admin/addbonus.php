<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

		$userid = $_POST['userid'];
		
        $query = "insert into dailybonus (userid,rented) values('$userid','".$_POST['rented']."')";
		mysql_query ($query);
		
        echo "<p><center>A blank daily bonus has been added to ".$userid."'s account.</p></center>";
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>