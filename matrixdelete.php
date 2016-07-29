<?php
########################################################################
if ($hasreferrals != "yes")
{
$dq = "select * from $matrixtoshow where id=\"$deleteid\"";
$dr = mysql_query($dq);
$drow = mysql_num_rows($dr);
if ($drow > 0)
{
$username = mysql_result($dr,0,"username");
$positionordernumber = mysql_result($dr,0,"positionordernumber");
for($i=1;$i<=$matrixdepth;$i++)
{
$variableparentid = "parent" . $i;
$variableparentname = "parent" . $i . "username";
eval("\$variableparentid = mysql_result(\$dr,0,\"$variableparentid\");");
eval("\$variableparentname = mysql_result(\$dr,0,\"$variableparentname\");");
$refq = "update $matrixtoshow set L$i=L$i-1,datecycled=0 where id=\"" . $variableparentid . "\"";
$refr = mysql_query($refq) or die(mysql_error());
} # for($i=1;$i<=$matrixdepth;$i++)
$delq = "delete from $matrixtoshow where id=\"$deleteid\"";
$delr = mysql_query($delq) or die(mysql_error());
$show = "Position #" . $positionordernumber . " in " . $matrixwidth . " x " . $matrixdepth . " " . $matrixlevelname . " for member " . $username . " was deleted.";
} # if ($drow > 0)
if ($drow < 1)
{
$show = "Position #" . $positionordernumber . " in " . $matrixwidth . " x " . $matrixdepth . " " . $matrixlevelname . " was not found.";
}
} # if ($hasreferrals != "yes")
##########################################################################
if ($hasreferrals == "yes")
{
$dq = "select * from $matrixtoshow where id=\"$deleteid\"";
$dr = mysql_query($dq);
$drow = mysql_num_rows($dr);
if ($drow > 0)
{
$username = mysql_result($dr,0,"username");
$positionordernumber = mysql_result($dr,0,"positionordernumber");
$delq = "update $matrixtoshow set username=\"VACANT\" where id=\"$deleteid\"";
$delr = mysql_query($delq) or die(mysql_error());
for($i=1;$i<=$matrixdepth;$i++)
{
$parentid = "parent" . $i;
$parentusername = "parent" . $i . "username";
$refq = "update $matrixtoshow set $parentusername=\"VACANT\" where $parentid=\"$deleteid\"";
$refr = mysql_query($refq);
} # for($i=1;$i<=$matrixdepth;$i++)
$show = "Position #" . $positionordernumber . " in " . $matrixwidth . " x " . $matrixdepth . " " . $matrixlevelname . " for member " . $username . " was marked vacant. When new positions are ordered, vacant positions are filled in order.";
} # if ($drow > 0)
if ($drow < 1)
{
$show = "Position #" . $positionordernumber . " in " . $matrixwidth . " x " . $matrixdepth . " " . $matrixlevelname . " was not found.";
}
} # if ($hasreferrals == "yes")
?>