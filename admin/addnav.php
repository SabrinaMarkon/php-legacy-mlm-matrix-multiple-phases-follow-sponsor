<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
     ?>
    <center>
    <p>Add a navigation button to the members area.</p>
	<form method="POST" action="addnavnow.php">
	Name:<br><input type="text" name="name" value=""><br>
	Url:<br><input type="text" name="url" value=""><br>
    Sequence:<br><input type="text" name="seq" value=""><br>
	<input type="submit" value="Add">
	</form>
	</center>
    </td>
    </tr>
    </table>
    <?
  	}

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";

?>