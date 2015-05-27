<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$id = $_POST['id'];
if( session_is_registered("alogin"))
{
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td  valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
if($_POST['submit'] == "Delete")
{
foreach($id as $each)
{
mysql_query ("update hheadlineads set title='', url='', color='', bgcolor='', added=0 where id=".$each);
}		
echo "<p><center>The Hot Headline Adz have been sent back to the users.</p></center>";
}
else 
{
foreach($id as $each) 
{
mysql_query ("update hheadlineads set approved=1 where id=".$each);
}					
echo "<p><center>The Hot Headline Adz have been approved.</p></center>";
}
echo "</td></tr></table>";
}
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>