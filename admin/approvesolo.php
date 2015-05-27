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
        <td  valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
		
		if($_POST['submit'] == "Delete") {

		foreach($id as $each) {
		mysql_query ("update solos set subject='', adbody='', url='', added=0 where id=".$each);
		}	
			
        echo "<p><center>The solo ads have been sent back to the user.</p></center>";
		} else {
		
		foreach($id as $each) {
		mysql_query ("update solos set approved=1 where id=".$each);
		}	
		
        echo "<p><center>The solo ads have been approved.</p></center>";
		}
		
		
		echo "</td></tr></table>";
  }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>