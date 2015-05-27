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
	
		$sql = mysql_query("SELECT id FROM tlinks WHERE paid <= sent");
		while($each = mysql_fetch_array($sql)) {

			mysql_query("DELETE FROM tlinks where id='".$each['id']."'");
			mysql_query("DELETE FROM tlviews where tlid='".$each['id']."'");
						
		}
		
	    echo "All the completed campaigns have been deleted!";

	} else {

	    $query1 = "delete from tlinks where id='".$id."'";
		$result1 = mysql_query ($query1)
		     or die ("Delete from 'tlinks' failed");
			 
		mysql_query("DELETE FROM tlviews where tlid='".$id."'");

	    echo "The traffic link has been deleted!";
	
	}

    ?><p>Click <a href=viewalltlinks.php>here</a> to go back<p><?
    echo "</td></tr></table>";
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>