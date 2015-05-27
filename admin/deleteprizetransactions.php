<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$id = $_POST['id'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";


foreach($id as $each) {
		mysql_query ("delete from prizetrans where id=".$each);
		}


    echo "The transaction has been deleted!";

    ?><p>Click <a href=prizetransactions.php>here</a> to go back<p><?
    echo "</td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>