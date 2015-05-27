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



		$userid = mysql_real_escape_string($_POST['userid']);

        $query = "insert into buttons (userid,max) values('$userid','$max')";

		

		$count = 0;

		$quantity = mysql_real_escape_string($_POST['quantity']);

		while($quantity > $count) {

			$count++;

			mysql_query ($query);

		}

		

        echo "<p><center>".$quantity." blank buttons with ".$max." impressions ad has been added to ".$userid."'s account.</p></center>";

        echo "</td></tr></table>";

    }

else

	echo "Unauthorised Access!";



include "../footer.php";



?>