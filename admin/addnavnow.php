<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$name = $_POST['name'];
$url = $_POST['url'];
$seq = $_POST['seq'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
    $query = "insert into navigation (name,url,status,seq) VALUES ('$name','$url','ON',$seq)";
	$result = mysql_query ($query)
	     or die ("Insert failed");
    echo "Your new navigation has been saved.";
    ?> <p>Click <a href=navigation.php>here</a> to go back<p>
    </table>
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