<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
?>
<table align="center" border="0" width="100%">
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br>
<?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
		$userid = $_POST['userid'];
if ($userid == "")
{
?>
<p>No userid entered. Click <a href="addads.php">here</a> to go back<p>
<?
include "../footer.php";
exit;
}
$q = "select * from members where userid=\"$userid\"";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows < 1)
{
?>
<p>No such userid. Click <a href="addads.php">here</a> to go back<p>
<?
include "../footer.php";
exit;
}
$unix = strtotime($_POST['rented']);
$rentedwithnoleadingzeroonday = date('Y-m-j', $unix);

        $query = "insert into fullloginads (userid,rented,purchase) values('$userid','$rentedwithnoleadingzeroonday',NOW())";
		mysql_query ($query);
		
        echo "<p><center>A blank Full Page Login Ad has been added to ".$userid."'s account.</p></center>";
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>