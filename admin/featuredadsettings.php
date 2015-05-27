<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") )
{
?>
<script type="text/javascript">
function changetext(id)
{
str1 = document.getElementById('featuredadwidthp').value;
str2 = document.getElementById('featuredadheightp').value;
str3 = document.getElementById('featuredadheightheadingp').value;
str4 = document.getElementById('featuredadmaxheadingcharsp').value;
str5 = document.getElementById('featuredadheadingfontcolorp').value;
str6 = document.getElementById('featuredadheadingfontfacep').value;
str7 = document.getElementById('featuredadheadingfontsizep').value;
str8 = document.getElementById('featuredadheadingbgcolorp').value;
str9 = document.getElementById('featuredadheadingbordercolorp').value;
str10 = document.getElementById('featuredaddescfontcolorp').value;
str11 = document.getElementById('featuredaddescfontfacep').value;
str12 = document.getElementById('featuredaddescfontsizep').value;
str13 = document.getElementById('featuredaddescbgcolorp').value;
str14 = document.getElementById('featuredaddescbordercolorp').value;
str15 = document.getElementById('featuredaddescmaxbodylinesp').value;
str16 = document.getElementById('featuredadadsbytextp').value;
str17 = document.getElementById('featuredaddescmaxcharsperlinep').value;
str18 = document.getElementById('featuredadadsbyurlp').value;
str19 = document.getElementById('featuredadadsbyheightp').value;
str20 = document.getElementById('featuredadadsbyfontcolorp').value;
str21 = document.getElementById('featuredadadsbyfontfacep').value;
str22 = document.getElementById('featuredadadsbyfontsizep').value;
str23 = document.getElementById('featuredadadsbybgcolorp').value;
str24 = document.getElementById('featuredadadsbybordercolorp').value;

str = "<div style=\"text-align: left; font-weight: bold; width: "+str1+"px; height: "+str3+"px; background: "+str8+"; border: 1px solid "+str9+"; border-bottom: 0px; overflow: visible; padding: 4px; color: "+str5+"; font-family: "+str6+"; font-size: "+str7+"; overflow: hidden;\"><div style=\"width: "+str1+"px; height: "+str3+"px; text-align: center; overflow: hidden;\">Ad Heading</div></div><div style=\"text-align: left; width: "+str1+"px; height: "+str2+"px; background: "+str13+"; border: 1px solid "+str14+"; overflow: hidden; padding: 4px; color: "+str10+"; font-family: "+str11+"; font-size: "+str12+"; text-align: center;\"><div style=\"padding: 4px;\">Ad Description</div></div><div style=\"text-align: left; font-weight: bold; width: "+str1+"px; height: "+str19+"px; background: "+str23+"; border: 1px solid "+str24+"; border-top: 0px; overflow: visible; padding: 4px; color: "+str20+"; font-family: "+str21+"; font-size: "+str22+"; overflow: hidden;\"><div style=\"width: "+str1+"px; height: "+str19+"px; text-align: center; overflow: hidden;\">"+str16+"</div></div>";

document.getElementById('showfeaturedad').innerHTML = str;
}
</script>
<table align="center" border="0" width="100%">
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
echo "<center><H2>Edit Featured Ad Design</H2></center>";
if($_POST['action'] == "update")
	{
	$update=mysql_query("update settings set setting='$featuredadnumberofboxesp' where name='featuredadnumberofboxes'");
	$update=mysql_query("update settings set setting='$featuredadwidthp' where name='featuredadwidth'");
	$update=mysql_query("update settings set setting='$featuredadheightp' where name='featuredadheight'");
	$update=mysql_query("update settings set setting='$featuredaddescmaxbodylinesp' where name='featuredaddescmaxbodylines'");
	$update=mysql_query("update settings set setting='$featuredaddescmaxcharsperlinep' where name='featuredaddescmaxcharsperline'");
	$update=mysql_query("update settings set setting='$featuredaddescbgcolorp' where name='featuredaddescbgcolor'");
	$update=mysql_query("update settings set setting='$featuredaddescbordercolorp' where name='featuredaddescbordercolor'");
	$update=mysql_query("update settings set setting='$featuredaddescfontfacep' where name='featuredaddescfontface'");
	$update=mysql_query("update settings set setting='$featuredaddescfontsizep' where name='featuredaddescfontsize'");
	$update=mysql_query("update settings set setting='$featuredaddescfontcolorp' where name='featuredaddescfontcolor'");
	$update=mysql_query("update settings set setting='$featuredadheightheadingp' where name='featuredadheightheading'");
	$update=mysql_query("update settings set setting='$featuredadmaxheadingcharsp' where name='featuredadmaxheadingchars'");
	$update=mysql_query("update settings set setting='$featuredadheadingbgcolorp' where name='featuredadheadingbgcolor'");
	$update=mysql_query("update settings set setting='$featuredadheadingbordercolorp' where name='featuredadheadingbordercolor'");
	$update=mysql_query("update settings set setting='$featuredadheadingfontfacep' where name='featuredadheadingfontface'");
	$update=mysql_query("update settings set setting='$featuredadheadingfontsizep' where name='featuredadheadingfontsize'");
	$update=mysql_query("update settings set setting='$featuredadheadingfontcolorp' where name='featuredadheadingfontcolor'");
	$update=mysql_query("update settings set setting='$featuredadadsbytextp' where name='featuredadadsbytext'");
	$update=mysql_query("update settings set setting='$featuredadadsbyurlp' where name='featuredadadsbyurl'");
	$update=mysql_query("update settings set setting='$featuredadadsbyheightp' where name='featuredadadsbyheight'");
	$update=mysql_query("update settings set setting='$featuredadadsbybgcolorp' where name='featuredadadsbybgcolor'");
	$update=mysql_query("update settings set setting='$featuredadadsbybordercolorp' where name='featuredadadsbybordercolor'");
	$update=mysql_query("update settings set setting='$featuredadadsbyfontfacep' where name='featuredadadsbyfontface'");
	$update=mysql_query("update settings set setting='$featuredadadsbyfontsizep' where name='featuredadadsbyfontsize'");
	$update=mysql_query("update settings set setting='$featuredadadsbyfontcolorp' where name='featuredadadsbyfontcolor'");
	$update=mysql_query("update settings set setting='$featuredadheadingbgcolorallowchoicep' where name='featuredadheadingbgcolorallowchoice'");
	echo "<font color=red>The Featured Ad design settings have been updated.</font><br><br>";
$featuredadnumberofboxes = $featuredadnumberofboxesp;
$featuredadwidth = $featuredadwidthp;
$featuredadheight = $featuredadheightp;
$featuredaddescmaxbodylines = $featuredaddescmaxbodylinesp;
$featuredaddescmaxcharsperline = $featuredaddescmaxcharsperlinep;
$featuredaddescbgcolor = $featuredaddescbgcolorp;
$featuredaddescbordercolor = $featuredaddescbordercolorp;
$featuredaddescfontface = $featuredaddescfontfacep;
$featuredaddescfontsize = $featuredaddescfontsizep;
$featuredaddescfontcolor = $featuredaddescfontcolorp;
$featuredadheightheading = $featuredadheightheadingp;
$featuredadmaxheadingchars = $featuredadmaxheadingcharsp;
$featuredadheadingbgcolor = $featuredadheadingbgcolorp;
$featuredadheadingbordercolor = $featuredadheadingbordercolorp;
$featuredadheadingfontface = $featuredadheadingfontfacep;
$featuredadheadingfontsize = $featuredadheadingfontsizep;
$featuredadheadingfontcolor = $featuredadheadingfontcolorp;
$featuredadadsbytext = $featuredadadsbytextp;
$featuredadadsbyurl = $featuredadadsbyurlp;
$featuredadadsbyheight = $featuredadadsbyheightp;
$featuredadadsbybgcolor = $featuredadadsbybgcolorp;
$featuredadadsbybordercolor = $featuredadadsbybordercolorp;
$featuredadadsbyfontface = $featuredadadsbyfontfacep;
$featuredadadsbyfontsize = $featuredadadsbyfontsizep;
$featuredadadsbyfontcolor = $featuredadadsbyfontcolorp;
$featuredadheadingbgcolorallowchoice = $featuredadheadingbgcolorallowchoicep;
	}
?>
<form method="POST" action="featuredadsettings.php">
<input type="hidden" name="action" value="update">
<table>
<tr><td>Maximum Featured Ads Shown At One Time (enter 0 to show ALL at once):</td><td><input type="text" id="featuredadnumberofboxesp" name="featuredadnumberofboxesp" value="<? echo $featuredadnumberofboxes; ?>"></td></tr>
<tr><td>Width of Each Featured Ad:</td><td><input type="text" id="featuredadwidthp" name="featuredadwidthp" value="<? echo $featuredadwidth; ?>"> px</td></tr>
<tr><td>Height of Each Featured Ad:</td><td><input type="text" id="featuredadheightp" name="featuredadheightp" value="<? echo $featuredadheight; ?>"> px</td></tr>
<tr><td>Maximum Lines In Ad Description:</td><td><input type="text" id="featuredaddescmaxbodylinesp" name="featuredaddescmaxbodylinesp" value="<? echo $featuredaddescmaxbodylines; ?>"> lines</td></tr>
<tr><td>Maximum Characters Per Description Line:</td><td><input type="text" id="featuredaddescmaxcharsperlinep" name="featuredaddescmaxcharsperlinep" value="<? echo $featuredaddescmaxcharsperline; ?>"> characters (including spaces)</td></tr>
<tr><td>Background Color Of Description (ie. #ffffff or white):</td><td><input type="text" id="featuredaddescbgcolorp" name="featuredaddescbgcolorp" value="<? echo $featuredaddescbgcolor; ?>"></td></tr>
<tr><td>Border Color Of Description (ie. #ffffff or white):</td><td><input type="text" id="featuredaddescbordercolorp" name="featuredaddescbordercolorp" value="<? echo $featuredaddescbordercolor; ?>"></td></tr>
<tr><td>Description Font Name (ie. Arial):</td><td><input type="text" id="featuredaddescfontfacep" name="featuredaddescfontfacep" value="<? echo $featuredaddescfontface; ?>"></td></tr>
<tr><td>Description Font Size (ie. 14pt):</td><td><input type="text" id="featuredaddescfontsizep" name="featuredaddescfontsizep" value="<? echo $featuredaddescfontsize; ?>"></td></tr>	
<tr><td>Description Font Color (ie. #000000 or black):</td><td><input type="text" id="featuredaddescfontcolorp" name="featuredaddescfontcolorp" value="<? echo $featuredaddescfontcolor; ?>"></td></tr>

<tr><td>Height of Featured Ad Heading:</td><td><input type="text" id="featuredadheightheadingp" name="featuredadheightheadingp" value="<? echo $featuredadheightheading; ?>"> px</td></tr>
<tr><td>Maximum Characters Allowed In Heading:</td><td><input type="text" id="featuredadmaxheadingcharsp" name="featuredadmaxheadingcharsp" value="<? echo $featuredadmaxheadingchars; ?>"> characters (including spaces)</td></tr>
<tr><td>Default Highlight Color Of Heading:</td><td><input type="text" id="featuredadheadingbgcolorp" name="featuredadheadingbgcolorp" value="<? echo $featuredadheadingbgcolor; ?>"></td></tr>
<tr><td>Allow Members To Choose Their Own Heading Color?:</td><td>
<select name="featuredadheadingbgcolorallowchoicep">
<option value="1" <?php if ($featuredadheadingbgcolorallowchoice == 1) { echo "selected"; } ?>>YES</option>
<option value="0" <?php if ($featuredadheadingbgcolorallowchoice != 1) { echo "selected"; } ?>>NO</option>
</select>
</td></tr>
<tr><td>Border Color Of Heading (ie. #ffffff or white):</td><td><input type="text" id="featuredadheadingbordercolorp" name="featuredadheadingbordercolorp" value="<? echo $featuredadheadingbordercolor; ?>"></td></tr>
<tr><td>Heading Font Name (ie. Arial):</td><td><input type="text" id="featuredadheadingfontfacep" name="featuredadheadingfontfacep" value="<? echo $featuredadheadingfontface; ?>"></td></tr>
<tr><td>Heading Font Size (ie. 14pt):</td><td><input type="text" id="featuredadheadingfontsizep" name="featuredadheadingfontsizep" value="<? echo $featuredadheadingfontsize; ?>"></td></tr>	
<tr><td>Heading Font Color (ie. #000000 or black):</td><td><input type="text" id="featuredadheadingfontcolorp" name="featuredadheadingfontcolorp" value="<? echo $featuredadheadingfontcolor; ?>"></td></tr>

<tr><td>Title For Bottom Admin Box:</td><td><input type="text" id="featuredadadsbytextp" name="featuredadadsbytextp" value="<? echo $featuredadadsbytext; ?>"></td></tr>
<tr><td>URL For Bottom Admin Box:</td><td><input type="text" id="featuredadadsbyurlp" name="featuredadadsbyurlp" value="<? echo $featuredadadsbyurl; ?>"></td></tr>
<tr><td>Height of Bottom Admin Box:</td><td><input type="text" id="featuredadadsbyheightp" name="featuredadadsbyheightp" value="<? echo $featuredadadsbyheight; ?>"> px</td></tr>
<tr><td>Background Color Of Bottom Admin Box (ie. #ffffff or white):</td><td><input type="text" id="featuredadadsbybgcolorp" name="featuredadadsbybgcolorp" value="<? echo $featuredadadsbybgcolor; ?>"></td></tr>
<tr><td>Border Color Of Bottom Admin Box (ie. #ffffff or white):</td><td><input type="text" id="featuredadadsbybordercolorp" name="featuredadadsbybordercolorp" value="<? echo $featuredadadsbybordercolor; ?>"></td></tr>
<tr><td>Bottom Admin Box Font Name (ie. Arial):</td><td><input type="text" id="featuredadadsbyfontfacep" name="featuredadadsbyfontfacep" value="<? echo $featuredadadsbyfontface; ?>"></td></tr>
<tr><td>Bottom Admin Box Font Size (ie. 14pt):</td><td><input type="text" id="featuredadadsbyfontsizep" name="featuredadadsbyfontsizep" value="<? echo $featuredadadsbyfontsize; ?>"></td></tr>	
<tr><td>Bottom Admin Box Font Color (ie. #000000 or black):</td><td><input type="text" id="featuredadadsbyfontcolorp" name="featuredadadsbyfontcolorp" value="<? echo $featuredadadsbyfontcolor; ?>"></td></tr>

<tr><td colspan="2" align="center"><br><input type="button" name="previewbutton" value="Preview Ad" onclick="changetext();" style="width: 100px;"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Save" style="width: 100px;"></td></tr>

<tr><td colspan="2" align="center"><br>

<div id="showfeaturedad"></div>



</td></tr>
</table>
</form>
<?
echo "</td></tr></table>";
} # if( session_is_registered("alogin") )
else
{
echo "Unauthorised Access!";
}
include "../footer.php";
?>