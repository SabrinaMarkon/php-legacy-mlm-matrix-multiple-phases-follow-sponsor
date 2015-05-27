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

        mysql_query("DELETE FROM surfurls WHERE id='".$id."' LIMIT 1");
        if(mysql_affected_rows()> 0){
        	$currentuserpoints = intval($_POST['currentpoints_'.$id]);
        	$currentuserid = $_POST['currentuserid_'.$id];
        	mysql_query("UPDATE members SET surfcredits=surfcredits+$currentuserpoints WHERE userid = '".$currentuserid."'");
        	$delsuccessmsg = "<p><center>The Surf Page have been Deleted.</p></center>";
        }else{
        	$delsuccessmsg = "<p><center>The Surf Page Not Found.</p></center>";
        }

        echo $delsuccessmsg;


        ?><p>Click <a href=viewallsurfs.php>here</a> to go back<p><?
        echo "</td></tr></table>";
}

else  {
	echo "Unauthorised Access!";
}

include "../footer.php";
mysql_close($dblink);
?>