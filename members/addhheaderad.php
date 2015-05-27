<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
?>
<head>
<link rel="stylesheet" href="../jscripts/colorpicker/js_color_picker_v2.css" media="screen">
<script type="text/javascript" src="../jscripts/colorpicker/color_functions.js"></script>
<script type="text/javascript" src="../jscripts/colorpicker/js_color_picker_v2.js"></script>
</head>
<?
$done = $_POST['done'];
$id = $_POST['id'];
$heading = $_POST['heading'];
$headingfontcolor = $_POST['headingfontcolor'];
$description = $_POST['description'];
$descriptionfontcolor = $_POST['descriptionfontcolor'];
$url = $_POST['url'];
$bgcolor = $_POST['bgcolor'];
$banner = $_POST['banner'];
if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

    if ($done == "YES") {

		if (empty($heading)){
       		?><p>No heading entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($url)){
       		?><p>No url entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($description)){
       		?><p>No description entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($banner)){
       		?><p>No banner gif or jpg url entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($headingfontcolor)){
       		?><p>No heading font color entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($bgcolor)){
       		?><p>No background color for the ad was entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($descriptionfontcolor)){
       		?><p>No description font color entered. Click <a href=addhheaderad.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
    	$query = "update hheaderads set heading='$heading', headingfontcolor='$headingfontcolor', banner='$banner', url='$url', description='$description', descriptionfontcolor='$descriptionfontcolor', bgcolor='$bgcolor', added=1, approved=0 where id=".$id;
    	$result = mysql_query ($query) or die (mysql_error());
    	?>
      		<p><center>Thank you, your Hot Header Ad has been submitted to admin for approval. <a href="advertise.php">Click here</a> to go back.<br><br><strong>Your own ad is not visible to yourself. <br> You can keep track of the displays and clicks on the Advertising page.</strong> </p></center>
    	<?
    }
    else {
    	$query = "SELECT * FROM hheaderads where added=0 and userid='".$_SESSION[uname]."' limit 1";
		$result = mysql_query ($query) or die (mysql_error());
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $heading = $line["heading"];
			$headingfontcolor = $line["headingfontcolor"];
            $url = $line["url"];
			$description = $line["description"];
			$descriptionfontcolor = $line["descriptionfontcolor"];
			$banner = $line["banner"];
			$bgcolor = $line["bgcolor"];
            ?>
<script language="JavaScript" type="text/javascript">
<!--
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}
function changetext(id)
{
strheading = document.getElementById('heading').value;
strheadingfontcolor = document.getElementById('headingfontcolor').value;
strbgcolor = document.getElementById('bgcolor').value;
strurl = document.getElementById('url').value;
strbanner = document.getElementById('banner').value;
strdescription = document.getElementById('description').value;
strdescriptionfontcolor = document.getElementById('descriptionfontcolor').value;
document.getElementById('previewpane').innerHTML = "<table align=\"center\" width=\"880\" cellpadding=5 cellspacing=0 bgcolor=\"#FFFFFF\" border=1><tr><td width=\"480\" bgcolor=\""+strbgcolor+"\" align=\"center\"><a href=\""+strurl+"\" target=\"_blank\"><img src=\""+strbanner+"\" border=0></a></td><td bgcolor=\""+strbgcolor+"\"><font color="+strheadingfontcolor+"><b><a style=\"color:"+strheadingfontcolor+"\" target=\"_blank\" href=\""+strurl+"\">"+strheading+"</a></b></font><br><font color=\""+strdescriptionfontcolor+"\">"+strdescription+"</font></td></tr></table>";
}
-->
</script>			 
			 <center><H2>Add your Hot Header Ad</H2>
			  <div style="padding: 0px 20px 0px 20px;">
			</div>
<form method="POST">
Heading:<br>
<input type="text" name="heading" id="heading" maxlength="<?php echo $hheaderadmaxheadingchars ?>" size="25" value="<?php echo $heading ?>"><br>
Heading Text Color: <input type="text" size="10" maxlength="7" name="headingfontcolor" id="headingfontcolor" value="<?php echo $headingfontcolor ?>">&nbsp;<input type="button" value="Pick Color" onclick="showColorPicker(this,document.forms[0].headingfontcolor)">
<br><br>
Url:<br>
<input type="text" name="url" id="url" maxlength="255" size="25" value="<?php echo $url ?>"><br><br>
Banner Image:<br>
<input type="text" name="banner" id="banner" maxlength="255" size="25" value="<?php echo $banner ?>"><br><br>
Background Color: <input type="text" size="10" maxlength="7" name="bgcolor" id="bgcolor" value="<?php echo $bgcolor ?>">&nbsp;<input type="button" value="Pick Color" onclick="showColorPicker(this,document.forms[0].bgcolor)">
<br><br>
Description (maximum <?php echo $hheaderadmaxdescchars ?> characters):<br>
<textarea name="description" id="description" maxlength="<?php echo $hheaderadmaxdescchars ?>" rows="4" cols="29" onKeyDown="textCounter(this.form.description,this.form.remLen,<?php echo $hheaderadmaxdescchars ?>);" onKeyUp="textCounter(this.form.description,this.form.remLen,<?php echo $hheaderadmaxdescchars ?>);"><?php echo $description ?></textarea>
<br><input readonly type=text name=remLen size=5 maxlength=5 value="<?php echo $hheaderadmaxdescchars ?>" onfocus="this.form.elements[0].focus()"> &nbsp characters left
<br><br>
Description Text Color: <input type="text" size="10" maxlength="7" name="descriptionfontcolor" id="descriptionfontcolor" value="<?php echo $descriptionfontcolor ?>">&nbsp;<input type="button" value="Pick Color" onclick="showColorPicker(this,document.forms[0].descriptionfontcolor)">
			  <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
			  <p><b>Please double check your Hot Header Ad, as it cannot be edited once submitted.</b></p>
			  <input type="button" name="previewbutton" value="Preview Ad" onclick="changetext();" style="width: 150px;"><br><br>
              <input type="submit" value="Save" style="width: 150px;">
              </form>
			  <br>
<div id="previewpane">
</div>		  
			  </center>
            <?
    	}
    }
    echo "</td></tr></table>";
  }
else
  { ?>
  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>
  <? }
include "../footer.php";
mysql_close($dblink);
?>