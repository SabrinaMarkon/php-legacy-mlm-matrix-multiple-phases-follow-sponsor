<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin"))
{
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
$userid = $_POST['userid'];
$query = "insert into featuredads (userid,max,purchase) values('$userid','$max',NOW())";
$count = 0;
$quantity = $_POST['quantity'];
while($quantity > $count)
{
$count++;
mysql_query ($query);
}
echo "<p><center>".$quantity." Featured ads with ".$max." impressions has been added to ".$userid."'s account.</p></center>";
echo "</td></tr></table>";
}
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>