<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$done = $_POST['done'];
$id = $_POST['id'];
$description = $_POST['description'];
$heading = $_POST['heading'];
if ($featuredadheadingbgcolorallowchoice == 1)
{
$headinghighlight = $_POST['headinghighlight'];
}
if ($featuredadheadingbgcolorallowchoice != 1)
{
$headinghighlight = $featuredadheadingbgcolor;
}
$url = $_POST['url'];
?>
<link href="../jscripts/colorjack/plugin.css" rel="stylesheet" type="text/css" />
<script src="../jscripts/colorjack/plugin.js" type="text/JavaScript"></script>
<script type="text/javascript">
function changetext(id)
{
var str = "";
	for(i=0; i<document.theform.elements.length; i++)
	{
theformfieldname = document.theform.elements[i].name;
if ((theformfieldname.substring(0,11) == "description") && (document.theform.elements[i].value != ""))
{
str = str + document.theform.elements[i].value + "<br />";
}
	}
document.getElementById('featuredadpreview').innerHTML = str;

str2 = document.getElementById('heading').value;
str2 = str2.replace(/\n/g, '');
str3 = document.getElementById('headinghighlight').value;
document.getElementById('previewpanetitle').innerHTML = str2;
document.getElementById('previewpanetitle').style.background=str3;
document.getElementById('previewpanetop').style.background=str3;
}
</script>
<?
if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<p><center>";
    if ($done == "YES") {

for($k = 1; $k <= $featuredaddescmaxbodylines; $k++)
{
$descriptionline = "description" . $k;
	if ($$descriptionline != "")
	{
	$description = $description . "\n" . $$descriptionline;
	}
}
         if (empty($description)){
       		?><p>No ad description entered. Click <a href=addfeaturedad.php>here</a> to go back<p> <?
       		include "../footermembers.php";
       		exit;
    	}
         if (empty($heading)){
       		?><p>Please return and enter a heading for your ad. Click <a href=addfeaturedad.php>here</a> to go back<p> <?
       		include "../footermembers.php";
       		exit;
    	}
         if (empty($headinghighlight)){
       		?><p>Please return and select a highlight color for your ad's heading. Click <a href=addfeaturedad.php>here</a> to go back<p> <?
       		include "../footermembers.php";
       		exit;
    	}
         if (empty($url)){
       		?><p>No URL entered. Click <a href=addfeaturedad.php>here</a> to go back<p> <?
       		include "../footermembers.php";
       		exit;
    	}
$description = addslashes($description);
$heading = addslashes($heading);
$q = "update featuredads set url='$url',heading='$heading',headinghighlight='$headinghighlight',description='$description',added=1,approved=0 where id='$id'";
$r =  mysql_query($q);
    	?>
      		<p><center>Your Featured Ad has been added, and has been placed in the queue for approval. <a href="advertise.php">Click here</a> to go back.</p><br></center>
    	<?
    }
    else {
		if($_POST['id']) 
		{	
		$query = "SELECT * FROM featuredads where userid='".$_SESSION[uname]."' AND id='".$_POST['id']."' limit 1";
		}
    	else 
		{
		$query = "SELECT * FROM featuredads where added=0 and userid='".$_SESSION[uname]."' limit 1";
		}
		
		$result = mysql_query ($query)
			or die ("Query failed 2");
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $description = $line["description"];
			$description = stripslashes($description);
$descriptions = explode("\n",$description);
$counter = count($descriptions);
$descriptionformfields = "";
for($m = 1; $m <= $featuredaddescmaxbodylines; $m++)
{
$descriptionline = $descriptions[$m];
$descriptionformfields = $descriptionformfields . "<input type=\"text\" id=\"description$m\" name=\"description$m\" maxlength=\"$featuredaddescmaxcharsperline\" size=\"$featuredaddescmaxcharsperline\" value=\"$descriptionline\"><br>";
} # for($m = 1; $m <= $featuredaddescmaxbodylines; $m++)
			$heading = $line["heading"];
			$heading = stripslashes($heading);
			$headinghighlight = $line["headinghighlight"];
			$url = $line["url"];
            ?>
<div id="plugin" onmousedown="HSVslide('drag','plugin',event)" style="TOP: 400px; LEFT: 900px; Z-INDEX: 20; display: none;">
<div id="plugHEX" onmousedown="stop=0; setTimeout('stop=1',100);">F1FFCC</div><div id="plugCLOSE" onmousedown="toggle('plugin')"><span style="background: #ffff00; font-weight: bold; font-size: 18px;">X</span></div><br>
<div id="SV" onmousedown="HSVslide('SVslide','plugin',event)" title="Saturation + Value">
<div id="SVslide" style="TOP: -4px; LEFT: -4px;"><br /></div>
</div>
<form id="H" onmousedown="HSVslide('Hslide','plugin',event)" title="Hue">
<div id="Hslide" style="TOP: -7px; LEFT: -8px;"><br /></div>
<div id="Hmodel"></div>
</form>
</div>
              <center><H2>Add Your Featured Ad</H2>
              <p>No adult, offensive or illegal ads (including pyramid schemes and chainletters).<BR>
			  <p align="left">If your Heading is too long, it will be truncated to fit into the title bar of your ad, so please Preview your ad before submitting it.<B></p>
              <br><form method="POST" id="theform" name="theform" action="addfeaturedad.php">
			  Heading:&nbsp;<input type="text" id="heading" name="heading" maxlength="<?php echo $featuredadmaxheadingchars ?>" size="<?php echo $featuredadmaxheadingchars ?>" value="<?php echo $heading ?>"><br><br>

<?php
if ($featuredadheadingbgcolorallowchoice == 1)
{
?>
			  Heading Highlighter:&nbsp;<input type="text" id="headinghighlight" name="headinghighlight" maxlength="16" size="16" value="<?php echo $headinghighlight ?>"> <a href="javascript:toggle('plugin')">Select Color</a><br><br>

<script type="text/javascript">
//*** CUSTOMIZE mkcolor() function below to perform the desired action when the color picker is being dragged/ used
//*** Parameter "v" contains the latest color being selected
function mkColor(v){
//** In this case, just update DIV with ID="colorbox" so its background color reflects the chosen color
//$S('colorbox').background='#'+v;
document.getElementById('headinghighlight').value='#'+v;
}

loadSV(); updateH('F1FFCC');
</script>
<?php
}
if ($featuredadheadingbgcolorallowchoice != 1)
{
?>
<input type="hidden" id="headinghighlight" name="headinghighlight" value="<?php echo $headinghighlight ?>">
<?php
}
?>
			  URL:&nbsp;<input type="text" name="url" maxlength="255" size="<?php echo $featuredadmaxheadingchars ?>" value="<?php echo $url ?>"><br><br>
			  Ad Description:<br>
<?php
echo $descriptionformfields;
?>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES"><br>
<input type="button" name="previewbutton" value="Preview Ad" onclick="changetext();" style="width: 150px;"><br><br>
              <input type="submit" value="Save" style="width: 150px;">
              </form>
			  <br>
<div id="previewpanetop" style="text-align: left; font-weight: bold; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; background: <?php echo $featuredadheadingbgcolor ?>; border: 1px solid <?php echo $featuredadheadingbordercolor ?>; border-bottom: 0px; overflow: visible; padding: 4px; color: <?php echo $featuredadheadingfontcolor ?>; font-family: '<?php echo $featuredadheadingfontface ?>'; font-size: <?php echo $featuredadheadingfontsize ?>; overflow: hidden;">
<div id="previewpanetitle" style="width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; text-align: center; overflow: hidden;"></div>
</div>

<div id="previewpane" style="text-align: left; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheight ?>px; background: <?php echo $featuredaddescbgcolor ?>; border: 1px solid <?php echo $featuredaddescbordercolor ?>; overflow: hidden; padding: 4px; color: <?php echo $featuredaddescfontcolor ?>; font-family: '<?php echo $featuredaddescfontface ?>'; font-size: <?php echo $featuredaddescfontsize ?>; text-align: center;">
<div id="featuredadpreview" style="padding: 4px;"></div>
</div>
			  </center>
            <?
    	}
		if($_POST['id']) 
		{	
?>
<script type="text/javascript">
changetext();
</script>
<?php
		}
    }
  }
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>