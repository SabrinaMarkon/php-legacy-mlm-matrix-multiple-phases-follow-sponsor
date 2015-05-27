<?php
include "config.php";
echo "Redirecting, please wait....";
$query = "update featuredads set clicks=clicks+1 where id=".$id;
$result = mysql_query ($query) or die (mysql_error());
$query2 = "select * from featuredads where id='$id'";
$result2 = mysql_query ($query2) or die (mysql_error());
while ($line = mysql_fetch_array($result2))
{
$url = $line["url"];
}
echo "<META HTTP-EQUIV=Refresh Content=0;URL=".$url.">";
?>