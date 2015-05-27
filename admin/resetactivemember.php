<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> 


<?


echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

 $query = "select * from members";
 $result = mysql_query ($query)
 	      or die ("Query 1 failed");


mysql_query("UPDATE members SET textad1_clicks='0', solo1_clicks='0', banner1_clicks='0', button1_clicks='0', hotlink1_clicks='0', htmlad1_clicks='0', traffic1_clicks='0', navtop1_clicks='0', navbot1_clicks='0', ptc1_clicks='0' WHERE 1");

                               $result = mysql_query ($query)
           		or die ("Query failed");
echo "<br><br><center><p><b><font size=2 face='$fonttype' color='$fontcolour'><b><center>Member Stats Reset</font></b></p></center><br><br>";

         echo "</td></tr></table>";
  include "../footer.php";
mysql_close($dblink);
?>