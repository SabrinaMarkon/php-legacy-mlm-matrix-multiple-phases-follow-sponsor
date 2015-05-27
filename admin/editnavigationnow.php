<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$index = $_POST['index'];
$name = $_POST['name'];
$url = $_POST['url'];
$seq = $_POST['seq'];
$memtype = $_POST['memtype'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
     
    $query = "update navigation set name='".$name."', url='".$url."', seq=".$seq.",memtype='$memtype' where id=".$index;
	$result = mysql_query ($query)
	     or die ("Edit failed");

    echo "Your changes have been saved.";
    ?> <p>Click <a href=navigation.php>here</a> to go back<p>
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