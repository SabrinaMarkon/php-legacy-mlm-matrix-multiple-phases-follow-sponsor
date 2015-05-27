<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$index = $_POST['index'];
$htmlcode = $_POST['htmlcode'];

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";


if( session_is_registered("alogin") ) {

    $query = "update adminnotes set htmlcode='".$htmlcode."' where id=".$index;
	$result = mysql_query ($query)
	     or die ("Update failed");

    echo "<center>Page has been updated!</center>";
    ?><p>Click <a href=index.php>here</a> to go back<p>
    </td>
    </tr>
    </table>
	<?

  	}

else  {
	echo "Unauthorised Access!";
    }
include "../footer.php";
mysql_close($dblink);
?>