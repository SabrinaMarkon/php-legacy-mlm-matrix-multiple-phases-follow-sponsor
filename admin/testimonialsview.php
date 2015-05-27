<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
?>
<table>
<tr>
<td width="15%" valign=top><br>
<?php
include "adminnavigation.php";
?>
</td>
<td  valign="top" align="center"><br>
<?php
$userid = $_POST['userid'];
if( session_is_registered("alogin") ) {
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
if ($_POST["action"] == "delete")
{
$id = $_POST["id"];
$q = "delete from testimonials where id=\"$id\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Testimonial Deleted</p>";
}
#################################################################
if ($_POST["action"] == "approve")
{
$id = $_POST["id"];
$q = "update testimonials set approved=\"1\" where id=\"$id\"";
$r = mysql_query($q);
$show = "<p align=\"center\">Testimonial Approved</p>";
}
#################################################################
if ($_POST["action"] == "save")
{
$id = $_POST["id"];
$userid = $_POST["userid"];
$name = $_POST["name"];
$company = $_POST["company"];
$url = $_POST["url"];
$photo = $_POST["photo"];
$rating = $_POST["rating"];
$heading = $_POST["heading"];
$body = $_POST["body"];
if ($name == "")
	{
	?><p>No Name entered. Click <a href=testimonialsview.php>here</a> to go back<p>
	</td></tr></table>
	<?
	include "../footer.php";
	exit;
	}
if ($heading == "")
	{
	?><p>No Heading entered. Click <a href=testimonialsview.php>here</a> to go back<p>
	</td></tr></table>
	<?
	include "../footer.php";
	exit;
	}
if ($body == "")
	{
	?><p>No Message entered. Click <a href=testimonialsview.php>here</a> to go back<p>
	</td></tr></table>
	<?
	include "../footer.php";
	exit;
	}

$changedphoto = "no";
if ($photo_name != "")
{
$type = $photo_type;
	if(($type != "image/gif") and ($type != "image/bmp") and ($type != "image/png") and ($type != "image/jpg") and ($type != "image/pjpeg") and ($type != "image/jpeg"))
	{
	?><p>The photo file is of a type not permitted for upload (only upload jpeg, jpg, pjpeg, gif, png, or bmp). Click <a href=testimonialsview.php>here</a> to go back<p>
	</td></tr></table>
	<?
	include "../footer.php";
	exit;
	}
function findexts ($filename)
{
$filename = strtolower($filename) ;
$exts = split("[/\\.]", $filename) ;
$n = count($exts)-1;
$exts = $exts[$n];
return $exts;
}
$ext = findexts($_FILES['photo']['name']);
$newfilename = $userid . "." . $ext;
$temp = $testimonialphotopath . $newfilename;
	if (@file_exists($temp))
	{
	# delete old one before uploading new one.
	@unlink($temp);
	}
	if(@move_uploaded_file($_FILES['photo']['tmp_name'], $temp)) 
	{
	@chmod($temp, 0777);
	$changedphoto = "yes";
	}
} # if ($photo_name != "")

if ($changedphoto == "yes")
{
$q = "update testimonials set name='$name',photo='$newfilename',company='$company',url='$url',heading='$heading',body='$body',rating='$rating' where id='$id'";
$r = mysql_query($q);
}
if ($changedphoto != "yes")
{
$q = "update testimonials set name='$name',company='$company',url='$url',heading='$heading',body='$body',rating='$rating' where id='$id'";
$r = mysql_query($q);
}
$show = "<p align=\"center\">Testimonial Saved</p>";
} # if ($_POST["action"] == "save")
#################################################################
?>
<table align="center" border="0" width="100%">
<tr>
<td valign="top" align="center"> <?
echo "<p><center>";
echo "<H2>Member Testimonials</H2>";
$query = "select * from testimonials order by approved asc, id desc";
$result = mysql_query ($query);
$numrows = @ mysql_num_rows($result);
if ($numrows < 1) {
echo "<p><center>No Testimonials have been submitted yet.</p></center>";
}
if ($show != "")
{
echo $show;
}
if ($numrows > 0)
{
?>
<br>
<table width=90% border=1 cellpadding=2 cellspacing=0 bgcolor="<?php echo $admintablebgcolor ?>">
<tr>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Company</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Photo</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Rating</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Date Added</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Heading</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Message</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Save</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approve</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
</tr>
<?php
while ($line = mysql_fetch_array($result)) {
$tid = $line["id"];
$userid = $line["userid"];
$name = $line["name"];
$photo = $line["photo"];
$photopath = $testimonialphotopath . $photo;
$photourl = $domain . "/photos/" . $photo;
$company = $line["company"];
$company = stripslashes($company);
$url = $line["url"];
$heading = $line["heading"];
$heading = stripslashes($heading);
$body = $line["body"];
$body = stripslashes($body);
$rating = $line["rating"];
$dateadded = $line["dateadded"];
$dateadded = formatDate($dateadded);
$approved = $line["approved"];
$views = $line["views"];
?>
<tr>
<form action="testimonialsview.php" method="post" enctype="multipart/form-data">
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><?php echo $userid ?></font></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><input type="text" name="name" value="<?php echo $name ?>" maxlength="255"></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><input type="text" name="company" value="<?php echo $company ?>" maxlength="255"></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><input type="text" name="url" value="<?php echo $url ?>" maxlength="255"></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><img src="<?php echo $photourl ?>" width="125" height="125" border="0"><br><br><a href="<?php echo $photourl ?>" target="_blank"><?php echo $photourl ?></a></font>
<br><br><input type="file" name="photo" value="<?php echo $photopath ?>" maxlength="255"></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<select name="rating">
<option value="10" <?php if ($rating == 10) { echo "selected"; } ?>>10 Excellent</option>
<option value="9" <?php if ($rating == 9) { echo "selected"; } ?>>9/10</option>
<option value="8" <?php if ($rating == 8) { echo "selected"; } ?>>8/10</option>
<option value="7" <?php if ($rating == 7) { echo "selected"; } ?>>7/10</option>
<option value="6" <?php if ($rating == 6) { echo "selected"; } ?>>6/10</option>
<option value="5" <?php if ($rating == 5) { echo "selected"; } ?>>5 Acceptable</option>
<option value="4" <?php if ($rating == 4) { echo "selected"; } ?>>4/10</option>
<option value="3" <?php if ($rating == 3) { echo "selected"; } ?>>3/10</option>
<option value="2" <?php if ($rating == 2) { echo "selected"; } ?>>2/10</option>
<option value="1" <?php if ($rating == 1) { echo "selected"; } ?>>1 Very Bad</option>
</select>
</td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><?php echo $dateadded ?></font></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><input type="text" name="heading" value="<?php echo $heading ?>" maxlength="255"></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<textarea rows="10" cols="25" name="body" style="background-color:#fff;border:solid 1px #000;font-family:Tahoma,Arial,Helvetica;color:#000;"><?php echo $body ?></textarea>
</td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><?php echo $views ?></font></td>
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<input type="hidden" name="id" value="<?php echo $tid ?>">
<input type="hidden" name="userid" value="<?php echo $userid ?>">
<input type="hidden" name="action" value="save">
<input type="submit" value="Save">
</td>
</form>
<?php
if ($approved != 1)
	{
?>
<form action="testimonialsview.php" method="post" enctype="multipart/form-data">
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<input type="hidden" name="id" value="<?php echo $tid ?>">
<input type="hidden" name="action" value="approve">
<input type="submit" value="Approve">
</td>
</form>
<?php
	}
if ($approved == 1)
	{
?>
<td bgcolor="<? echo $contrastcolour; ?>" align="center"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></td>
<?php
	}
?>
<form action="testimonialsview.php" method="post" enctype="multipart/form-data">
<td bgcolor="<? echo $contrastcolour; ?>" align="center">
<input type="hidden" name="id" value="<?php echo $tid ?>">
<input type="hidden" name="action" value="delete">
<input type="submit" value="Delete">
</td>
</form>
</tr>
<?
}
echo "</table></center>" ;
} # if ($numrows > 0)
echo "</td></tr></table>";
}
else
echo "Unauthorised Access!";
?>
</td></tr></table>
<?
include "../footer.php";
?>