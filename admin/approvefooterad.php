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
		mysql_query ("update footerads set subject='', url='', added=0 where id=".$each);
		}	
			
        echo "<p><center>The solo footer ads have been sent back to the users.</p></center>";
		} else {

		foreach($id as $each) {
		mysql_query ("update footerads set approved=1 where id=".$each);
		}				
				
        echo "<p><center>The solo footer ads have been approved.</p></center>";
		}


		echo "</td></tr></table>";
  }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>