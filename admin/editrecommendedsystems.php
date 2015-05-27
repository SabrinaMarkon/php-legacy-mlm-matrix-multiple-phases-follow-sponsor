<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {

if ($action == "save")
{
$q = "update recommendedsystems set htmlcode='".$htmlcode."'";
$r = mysql_query($q) or die(mysql_error());
echo "<center>Your recommended systems html has been updated!</center>";
?><p>Click <a href=editrecommendedsystems.php>here</a> to go back<p>
</td>
</tr>
</table>
<?
include "../footer.php";
exit;
} # if ($action == "save")
#################################################################
$rq1 = "select * from recommendedsystems order by id limit 1";
$rr1 = mysql_query($rq1);
$rrows1 = mysql_num_rows($rr1);
if ($rrows1 > 0)
{
$htmlcode = mysql_result($rr1,0,"htmlcode");
}
if ($rrows1 < 1)
{
$rq2 = "insert into recommendedsystems (id,htmlcode) values (1,'')";
$rr2 = mysql_query($rq2);
$htmlcode = "";
}
?><table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
echo "<center><H2>Edit Recommended Systems</H2><br>These admin ads display in the navigation column of the website.</center>";
?>
<br>
<center>
<form method="POST" action="editrecommendedsystems.php">
<input type="hidden" name="action" value="save">
<textarea rows=20 cols=50 name="htmlcode"><? echo $htmlcode; ?></textarea><br>
<input type="submit" value="Save Changes">
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