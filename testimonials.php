<?php
include "connect.php";
####### COPYRIGHT 2011 SABRINA MARKON pearlsofwealth@gmail.com #######
if ($testimonialrotateorgroup == "group")
{
$tq = "select * from testimonials where approved=\"1\" order by rand() limit $testimonialgroupmax";
$tr = mysql_query($tq);
$trows = mysql_num_rows($tr);
if ($trows > 0)
	{
?>
<br><br><center><font style="font-size: 22px; font-weight: bold;">Customer Testimonials</font><br><br>
<?php
	while ($trowz = mysql_fetch_array($tr))
		{
		$tid = $trowz["id"];
		$tuserid = $trowz["userid"];
		$tname = $trowz["name"];
		$tphoto = $trowz["photo"];
		$tcompany = $trowz["company"];
		$tcompany = stripslashes($tcompany);
		$turl = $trowz["url"];
		$theading = $trowz["heading"];
		$theading = stripslashes($theading);
		$tbody = $trowz["body"];
		$tbody = stripslashes($tbody);
		$trating = $trowz["rating"];
		$tq2 = "update testimonials set views=views+1 where id=\"$tid\"";
		$tr2 = mysql_query($tq2);
?>
<br>
<table width="490" cellpadding="10" cellspacing="0" style="border: 6px solid #000000; background: #eeeeee;" align="center">
<tr><td align="center" colspan="2"><font style="font-size: 16px; font-weight: bold;"><?php echo $theading ?></font></td></tr>
<tr><td colspan="2"><font style="font-size: 14px;"><i><?php echo $tbody ?></i></font></td></tr>
<?php
if ($tphoto == "")
{
?>
<tr>
<td align="center" colspan="2">
<div style="width: 340px;">
<font style="font-size: 16px; font-weight: bold;"><?php echo $tname ?></font><br>
<?php
if ($turl != "")
	{
if ($tcompany != "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $tcompany ?></font></a><br>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
if ($tcompany == "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
	} # if ($turl != "")
#######################
if ($turl == "")
	{
if ($tcompany != "")
	{
?>
<font style="font-size: 14px;"><?php echo $tcompany ?></font><br>
<?php
	}
	} # if ($turl == "")
?>
</div>
</td>
</tr>
<?php
}
if ($tphoto != "")
{
?>
<tr>
<td align="center"><img src="<?php echo $domain ?>/photos/<?php echo $tphoto ?>" style="border: 4px solid #000000;" alt="<?php echo $tname ?>'s <?php echo $sitename ?> Testimonial" width="125" height="125"></td>
<td align="left" valign="top">
<div style="width: 340px;">
<font style="font-size: 16px; font-weight: bold;"><?php echo $tname ?></font><br>
<?php
if ($turl != "")
	{
if ($tcompany != "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $tcompany ?></font></a><br>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
if ($tcompany == "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
	} # if ($turl != "")
#######################
if ($turl == "")
	{
if ($tcompany != "")
	{
?>
<font style="font-size: 14px;"><?php echo $tcompany ?></font><br>
<?php
	}
	} # if ($turl == "")
?>
</div>
</td>
</tr>
<?php
}
?>
</table><br>
<?php
		} # while ($trowz = mysql_fetch_array($tr))
	} # if ($trows > 0)
} # if ($testimonialrotateorgroup == "group")
######################################################################
if ($testimonialrotateorgroup != "group")
{
$tq = "select * from testimonials where approved=\"1\" order by rand() limit 1";
$tr = mysql_query($tq);
$trows = mysql_num_rows($tr);
if ($trows > 0)
	{
?>
<br><br><center><font style="font-size: 22px; font-weight: bold;">Customer Testimonials</font><br><br>
<?php
	$tid = mysql_result($tr,0,"id");
	$tuserid = mysql_result($tr,0,"userid");
	$tname = mysql_result($tr,0,"name");
	$tphoto = mysql_result($tr,0,"photo");
	$tcompany = mysql_result($tr,0,"company");
	$tcompany = stripslashes($tcompany);
	$turl = mysql_result($tr,0,"url");
	$theading = mysql_result($tr,0,"heading");
	$theading = stripslashes($theading);
	$tbody = mysql_result($tr,0,"body");
	$tbody = stripslashes($tbody);
	$trating = mysql_result($tr,0,"rating");
	$tq2 = "update testimonials set views=views+1 where id=\"$tid\"";
	$tr2 = mysql_query($tq2);
?>
<br>
<table width="490" cellpadding="10" cellspacing="0" style="border: 6px solid #000000; background: #eeeeee;" align="center">
<tr><td align="center" colspan="2"><font style="font-size: 16px; font-weight: bold;"><?php echo $theading ?></font></td></tr>
<tr><td colspan="2"><font style="font-size: 14px;"><i><?php echo $tbody ?></i></font></td></tr>
<?php
if ($tphoto == "")
{
?>
<tr>
<td align="center" colspan="2">
<div style="width: 340px;">
<font style="font-size: 16px; font-weight: bold;"><?php echo $tname ?></font><br>
<?php
if ($turl != "")
	{
if ($tcompany != "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $tcompany ?></font></a><br>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
if ($tcompany == "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
	} # if ($turl != "")
#######################
if ($turl == "")
	{
if ($tcompany != "")
	{
?>
<font style="font-size: 14px;"><?php echo $tcompany ?></font><br>
<?php
	}
	} # if ($turl == "")
?>
</div>
</td>
</tr>
<?php
}
if ($tphoto != "")
{
?>
<tr>
<td align="center"><img src="<?php echo $domain ?>/photos/<?php echo $tphoto ?>" style="border: 4px solid #000000;" alt="<?php echo $tname ?>'s <?php echo $sitename ?> Testimonial" width="125" height="125"></td>
<td align="left" valign="top">
<div style="width: 340px;">
<font style="font-size: 16px; font-weight: bold;"><?php echo $tname ?></font><br>
<?php
if ($turl != "")
	{
if ($tcompany != "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $tcompany ?></font></a><br>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
if ($tcompany == "")
	{
?>
<a href="<?php echo $turl ?>" target="_blank"><font style="font-size: 14px;"><?php echo $turl ?></font></a><br>
<?php
	}
	} # if ($turl != "")
#######################
if ($turl == "")
	{
if ($tcompany != "")
	{
?>
<font style="font-size: 14px;"><?php echo $tcompany ?></font><br>
<?php
	}
	} # if ($turl == "")
?>
</div>
</td>
</tr>
<?php
}
?>
</table><br>
<?php
	} # if ($trows > 0)
} # if ($testimonialrotateorgroup != "group")
?>