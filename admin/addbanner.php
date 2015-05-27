<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$name = $_POST['name'];
$url = $_POST['url'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>"; 
    $query = "insert into advertise (name,bannerurl) VALUES ('$name','$url')";
	$result = mysql_query ($query)
	     or die ("Insert failed");
    echo "Your new banner has been saved.";
    ?> <p>Click <a href=banners.php>here</a> to go back<p>
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