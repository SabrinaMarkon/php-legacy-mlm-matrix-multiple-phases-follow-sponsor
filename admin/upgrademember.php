<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$userid = $_POST['userid'];


if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td  valign="top" align="center"><br><br> <?

    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>"; ?>
	        <center>
            <p>Upgrade (or downgrade) a member</p>
	        <form method="POST" action="upgradenow.php">
	        Userid:<br><input type="text" name="userid" maxLength="50" size="40" value=""><br>
            <select name="memtype">
			<option value="PRO"><?php echo $lowerlevel ?></option>
	        <option value="JV MEMBER"><?php echo $middlelevel ?></option>
            <option value="SUPER JV"><?php echo $toplevel ?></option>
	        </select>
			<br>
			Give Matrix Positon (only <?php echo $toplevel ?> or <?php echo $middlelevel ?>)<br>
			<select name="givematrixposition">
			<option value="1">YES</option>
			<option value="0">NO</option>
			</select>
			<br>
            <input type="submit" value="Save">
	        </form>
	        </center>
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