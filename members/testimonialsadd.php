<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if(session_is_registered("ulogin"))
{
include("../banners2.php");
echo "<p><center>";
if ($_POST["action"] == "addtestimonial")
{
$tname = $_POST["tname"];
$tcompany = $_POST["tcompany"];
$turl = $_POST["turl"];
$tphoto = $_POST["tphoto"];
$trating = $_POST["trating"];
$theading = $_POST["theading"];
$tbody = $_POST["tbody"];
if ($tname == "")
	{
	?><p>No Name entered. Click <a href=testimonialsadd.php>here</a> to go back<p> <?
	include "../footer.php";
	exit;
	}
if ($theading == "")
	{
	?><p>No Heading entered. Click <a href=testimonialsadd.php>here</a> to go back<p> <?
	include "../footer.php";
	exit;
	}
if ($tbody == "")
	{
	?><p>No Message entered. Click <a href=testimonialsadd.php>here</a> to go back<p> <?
	include "../footer.php";
	exit;
	}

if ($tphoto_name != "")
{
$type = $tphoto_type;
	if(($type != "image/gif") and ($type != "image/bmp") and ($type != "image/png") and ($type != "image/jpg") and ($type != "image/pjpeg") and ($type != "image/jpeg"))
	{
	?><p>The photo file is of a type not permitted for upload (only upload jpeg, jpg, pjpeg, gif, png, or bmp). Click <a href=testimonialsadd.php>here</a> to go back<p> <?
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
$ext = findexts($_FILES['tphoto']['name']);
$newfilename = $userid . "." . $ext;
$temp = $testimonialphotopath . $newfilename;
	if (@file_exists($temp))
	{
	# delete old one before uploading new one.
	@unlink($temp);
	}
	if(@move_uploaded_file($_FILES['tphoto']['tmp_name'], $temp)) 
	{
	@chmod($temp, 0777);
	}
} # if ($tphoto_name != "")

$q = "insert into testimonials (userid,name,photo,company,url,heading,body,rating,dateadded,approved,views) values ('$userid','$tname','$newfilename','$tcompany','$turl','$theading','$tbody','$trating',NOW(),'0','0')";
$r = mysql_query($q);

$headers = "From: $sitename<$adminemail>\n";
$headers .= "Reply-To: <$adminemail>\n";
$headers .= "X-Sender: <$adminemail>\n";
$headers .= "X-Mailer: PHP4\n";
$headers .= "X-Priority: 3\n";
$headers .= "Return-Path: <$adminemail>\n";
$to = $adminemail;
$subject = $sitename . " New Testimonial From UserID $userid";
$body = "UserID: $userid\nName: $tname\nCompany: $tcompany\nURL: $turl\nPhoto Uploaded: $newfilename\nRating: $trating/10\n\nTestimonial Heading: $theading\n\nTestimonial Message:\n\n$tbody\n\n
This testimonial will not show on the website until you login to the admin area \"Member Testimonials\" and approve it.\n\n";
@mail($to, $subject, wordwrap(stripslashes($body)),$headers, "-f$adminemail");
echo "<p align=\"center\"><font face=\"Tahoma\" size=\"2\">Your Testimonial was submitted successfully! Thank you! <br><a href=\"testimonialsadd.php\">Click here</a> to go back.</font></p>";
include "../footer.php";
exit;
} # if ($_POST["action"] == "addtestimonial")
$query1 = "select * from pages where name='Testimonial Page'";
$result1 = mysql_query ($query1);
$line1 = mysql_fetch_array($result1);
echo $line1["htmlcode"];
?>
<br>
<font size="3" face="Tahoma" color="<? echo $fontcolour; ?>">
<p><center><H2>Submit Your Testimonial</H2></p>
<form action="testimonialsadd.php" method="post" enctype="multipart/form-data">
<table width=80% border=0 cellpadding=4 cellspacing=0 align=center>
<tr><td align="right">Name: </td><td><input type="text" name="tname" size="25" maxlength="255"></td></tr>
<tr><td align="right">Company (optional): </td><td><input type="text" name="tcompany" size="25" maxlength="255"></td></tr>
<tr><td align="right">URL (optional): </td><td><input type="text" name="turl" size="25" maxlength="255"></td></tr>
<tr><td align="right">Photo (optional - 125x125 max): </td><td><input type="file" name="tphoto" size="25"></td></tr>
<tr><td align="right">Rating: </td><td><select name="trating">
<option value="10">10 Excellent</option>
<option value="9">9/10</option>
<option value="8">8/10</option>
<option value="7">7/10</option>
<option value="6">6/10</option>
<option value="5">5 Acceptable</option>
<option value="4">4/10</option>
<option value="3">3/10</option>
<option value="2">2/10</option>
<option value="1">1 Very Bad</option>
</select>
</td></tr>
<tr><td align="right">Testimonial Heading: </td><td><input type="text" name="theading" size="25" maxlength="255"></td></tr>
<tr><td align="right" valign="top">Testimonial Message: </td><td><textarea rows="15" cols="45" name="tbody" style="background-color:#fff;border:solid 1px #000;font-family:Tahoma,Arial,Helvetica;color:#000;"></textarea></td></tr>
<tr><td align="center" colspan="2">
<input type="hidden" name="action" value="addtestimonial">
<input type="submit" value="Submit"></td></tr>
</table>
</form>
<br><br><br>
<?
}
else
{
?>
<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>
<?
}
include "../footer.php";
exit;
?>