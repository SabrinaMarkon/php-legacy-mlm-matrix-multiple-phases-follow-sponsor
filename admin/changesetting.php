<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$index = $_POST['index'];
$setting = $_POST['status'];

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <center><?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";


    $query = "update navigation set status='".$status."' where id=".$index;
	$result = mysql_query ($query)
	     or die ("Query failed");

    ?>
	<br><br><center><b>Status changed. Click <a href=navigation.php>here</a> to go back.</b></center>
    </td>
    </tr>
    </table>
	<?
    }
else {
 	echo "Unauthorised Access!";
}

include "../footer.php";
mysql_close($dblink);
?>