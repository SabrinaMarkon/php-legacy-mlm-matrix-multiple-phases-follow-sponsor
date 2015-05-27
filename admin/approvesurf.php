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
        	if(isset($id) && is_array($id)){
        		$delcount = 0;
        		foreach($id as $each) {
        			mysql_query("DELETE FROM surfurls WHERE id='".$each."' LIMIT 1");
        			if(mysql_affected_rows()> 0){
        				$currentuserpoints = intval($_POST['currentpoints_'.$each]);
        				$currentuserid = $_POST['currentuserid_'.$each];
        				mysql_query("UPDATE members SET surfcredits=surfcredits+$currentuserpoints WHERE userid = '".$currentuserid."'");
        				$delcount++;
        				$delsuccessmsg = "<p><center>$delcount Surf Pages have been Deleted.</p></center>";
        			}
        		}
        		echo $delsuccessmsg;
        	}else{
        		echo "<p><center>No Surf page checked to Delete.</p></center>";
        	}
        } else {
        	if(isset($id) && is_array($id)){
        		foreach($id as $each) {
        			mysql_query ("update surfurls set approved=1 where id=".$each);
        		}

        		echo "<p><center>The Surf pages have been approved.</p><p>Click <a href=viewallsurfs.php>here</a> to view all approved surf pages<p></center>";
        	}else{
        		echo "<p><center>No Surf page checked to approved.</p></center>";
        	}
        }


        echo "</td></tr></table>";
}
else
echo "Unauthorised Access!";

include "../footer.php";

?>