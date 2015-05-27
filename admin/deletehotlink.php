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
	
	if($id == "completed") {
	
		$sql = mysql_query("SELECT id FROM hotlinks WHERE views >= max");
		while($each = mysql_fetch_array($sql)) {

			mysql_query("DELETE FROM hotlinks where id='".$each['id']."'");
						
		}
		
	    echo "All the completed hotlink campaigns have been deleted!";

	} else {

    $query1 = "delete from hotlinks where id='".$id."'";
	$result1 = mysql_query ($query1);

    echo "The hot link has been deleted!";
	
	}

    ?><p>Click <a href=viewallhotlink.php>here</a> to go back<p><?
    echo "</td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>