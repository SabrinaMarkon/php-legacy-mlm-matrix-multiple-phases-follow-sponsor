<?php
####################################################################################### HOT HEADLINE ADZ + HOT HEADER AD COMBINATION July 11 2010 - SABRINA MARKON
if ($memtype=="JVPARTNER")
{
$hheadlineadearn = $jvhheadlineadearn;
$hheaderadearn = $jvhheaderadearn;
}
if ($memtype=="PRO")
{
$hheadlineadearn = $prohheadlineadearn;
$hheaderadearn = $prohheaderadearn;
}
if (($memtype!="JVPARTNER") and ($memtype!="PRO"))
{
$hheadlineadearn = $freehheadlineadearn;
$hheaderadearn = $freehheaderadearn;
}
###########
$hheadlinequeryexclude = "select * from hheadlineads where clicks<=max and approved=1 order by rand()";
$hheadlineresult = mysql_query($hheadlinequeryexclude);
$hheadlinerows = mysql_num_rows($hheadlineresult);
###########
$hheaderqueryexclude = "select * from hheaderads where clicks<=max and approved=1 order by rand()";
$hheaderresult = mysql_query($hheaderqueryexclude);
$hheaderrows = mysql_num_rows($hheaderresult);
###########
if (($hheadlinerows > 0) or ($hheaderrows > 0))
{
?>
<table align="center" topmargin="0" leftmargin="0" bottommargin="0" width="960" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
<?php
if ($hheadlinerows > 0)
{
$hheadlinequeryexclude2 = "select * from hheadlineads where clicks<=max and approved=1 order by rand() limit 1";
$hheadlineresult2 = mysql_query($hheadlinequeryexclude2);
while($hheadlineinfo = mysql_fetch_array($hheadlineresult2))
{
mysql_query("update hheadlineads set views=views+1 where id='".$hheadlineinfo['id']."'");
?>
<tr>
<td width=480 bgcolor="<?php echo $hheaderadtopnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadtopnotefontcolor ?>; font-family: <?php echo $hheaderadtopnotefontface ?>; size: <?php echo $hheaderadtopnotefontsize ?>;">HOT Headline Adz! - Click To The Right --></b></td>
<?php
if($hheadlineinfo['bold'])
	{
	echo "<td bgcolor=\"".$hheadlineinfo['bgcolor']."\" align=center><a href=\"./hheadlineclicks.php?id=".$hheadlineinfo['id']."\" target=\"_blank\"><b><font color=\"".$hheadlineinfo['color']."\"><b>".$hheadlineinfo['title']."</font></b></a></td>";
	}
else
	{
	echo "<td bgcolor=\"".$hheadlineinfo['bgcolor']."\" align=center><a href=\"./hheadlineclicks.php?id=".$hheadlineinfo['id']."\" target=\"_blank\"><b><font color=\"".$hheadlineinfo['color']."\">".$hheadlineinfo['title']."</font></b></a></td>";
	}
?>
</tr>
<?php
}
} # if ($hheadlinerows > 0)
if ($hheadlinerows < 1)
{
if ($hheaderrows > 0)
	{
?>
<tr>
<td colspan="2" bgcolor="<?php echo $hheaderadbottomnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadbottomnotefontcolor ?>; font-family: <?php echo $hheaderadbottomnotefontface ?>; size: <?php echo $hheaderadbottomnotefontsize ?>;">^ ^ ^ Featured HOT Header Ad! ^ ^ ^</b> - <a href="<? echo $domain; ?>/memberlogin.php" target=\"_top\" style="text-decoration: underline;"><b>Login and Order Yours Today!</b></a></font></b>
</td>
</tr>
<?php
	} # if ($hheaderrows > 0)
} # if ($hheadlinerows < 1)
###########
if ($hheaderrows > 0)
{
$hheaderqueryexclude2 = "select * from hheaderads where clicks<=max and approved=1 order by rand() limit 1";
$hheaderresult2 = mysql_query($hheaderqueryexclude2);
while($hheaderinfo = mysql_fetch_array($hheaderresult2))
{
$hheaderid = $hheaderinfo['id'];
$hheaderbanner = $hheaderinfo['banner'];
$hheaderbgcolor = $hheaderinfo['bgcolor'];
$hheaderheading = $hheaderinfo['heading'];
$hheaderheadingfontcolor = $hheaderinfo['headingfontcolor'];
$hheaderdescription = $hheaderinfo['description'];
$hheaderdescriptionfontcolor = $hheaderinfo['descriptionfontcolor'];
mysql_query("update hheaderads set views=views+1 where id=\"$hheaderid\"");
?>
<tr>
<td width=480 bgcolor="<?php echo $hheaderbgcolor ?>" align="center"><a target="_blank" href="./hheaderadclicks.php?id=<?php echo $hheaderid ?>" target=\"_blank\">
<img src="<?php echo $hheaderbanner ?>" border="0" height="60" width="468"></a></td>
<td bgcolor="<?php echo $hheaderbgcolor ?>"><div style="width: 300px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hheaderheadingfontcolor ?>;"><b><a style="color:<?php echo $hheaderheadingfontcolor ?>" target="_blank" href="./hheaderadclicks.php?id=<?php echo $hheaderid ?>"><?php echo $hheaderheading ?></a></b></div><div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hheaderdescriptionfontcolor ?>;"><?php echo $hheaderdescription ?></div></td>
</tr>
<?php
} # while($hheaderinfo = mysql_fetch_array($hheaderresult2))
?>
<tr>
<td colspan="2" bgcolor="<?php echo $hheaderadbottomnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadbottomnotefontcolor ?>; font-family: <?php echo $hheaderadbottomnotefontface ?>; size: <?php echo $hheaderadbottomnotefontsize ?>;">^ ^ ^ Featured HOT Header Ad! ^ ^ ^</b> - <a href="<? echo $domain; ?>/memberlogin.php" target=\"_top\" style="text-decoration: underline;"><b>Login and Order Yours Today!</b></a></font></b>
</td>
</tr>
<?php
} # if ($hheaderrows > 0)
?>
</table>
<?php
} # if (($hheadlinerows > 0) or ($hheaderrows > 0))
####################################################################################### END HOT HEADLINE ADZ + HOT HEADER AD COMBINATION July 11 2010 - SABRINA MARKON
?>