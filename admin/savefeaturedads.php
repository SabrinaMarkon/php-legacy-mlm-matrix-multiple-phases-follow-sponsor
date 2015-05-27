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
	for($k = 1; $k <= $featuredaddescmaxbodylines; $k++)
	{
	$descriptionline = "description" . $k;
	if ($$descriptionline != "")
		{
	$description = $description . "\n" . $$descriptionline;
		}
	}	
	##################################################
	$description = addslashes($description);
	$heading = addslashes($heading);
	$q = "update featuredads set url='$url',heading='$heading',headinghighlight='$headinghighlight',description='$description',max='$max' where id='$id'";
	$r =  mysql_query($q);
	echo "<br>The Featured Ad was updated!";

    ?><p>Click <a href=viewallfeaturedads.php>here</a> to go back<p><?
    echo "</td></tr></table>";
}
else 
{
echo "Unauthorised Access!";
}
include "../footer.php";
mysql_close($dblink);
?>