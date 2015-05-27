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

    $query1 = "delete from solos where id='".$id."'";
	$result1 = mysql_query ($query1);

    $query2 = "delete from links where adid='".$id."'";
	$result2 = mysql_query ($query2);

    $query3 = "delete from clicks where adid='".$id."'";
	$result3 = mysql_query ($query3);

    echo "The solo ad has been deleted!";

    ?><p>Click <a href=soloadstats.php>here</a> to go back<p><?
    echo "</td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>