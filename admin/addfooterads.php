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

		$userid = $_POST['userid'];
        $query = "insert into footerads (userid,paid) values('$userid','$max')";
		
		$count = 0;
		$quantity = $_POST['quantity'];
		while($quantity > $count) {
			$count++;
			mysql_query ($query);
		}
		
        echo "<p><center>".$quantity." solo footer ad with ".$max."  has been added to ".$userid."'s account.</p></center>";
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>