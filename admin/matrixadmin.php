<?php
session_start();
include "../config.php";
$key = "http://demomatrixmpcf.phpsitescripts.com";
$key2 = "http://www.demomatrixmpcf.phpsitescripts.com";
if (($domain != $key) and ($domain != $key2))
{
echo "The script you are trying to run isn't licensed. Please contact <a href=\"mailto:sabrina@phpsitescripts.com\">Sabrina Markon, PHPSiteScripts.com</a> to purchase a licensed copy.</a>";
exit;
}
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
########################################################################
########################################################################
function MatrixStats($id,$levelcount,$showid)
{
global $matrixdepth,$showid;
$matrixtoshow = "matrix" . $showid;
if ($levelcount > $matrixdepth)
{
return $tree;
}
else
{
$levelq = "select * from $matrixtoshow where parent1='$id' order by id";
$levelr = mysql_query($levelq);
$levelrow = mysql_num_rows($levelr);
if ($levelrow > 0)
{
$tree = $tree . "<ul style=\"padding-left: 42px;\">";
while ($levelrowz = mysql_fetch_array($levelr))
	{
	## get each level n person's username.
	$Lid = $levelrowz["id"];
	$Lusername = $levelrowz["username"];
	$Lmatrixsignupdate = $levelrowz["signupdate"];
		if ($Lmatrixsignupdate == 0)
		{
		$Lmatrixsignupdate = "";
		}
		if ($Lmatrixsignupdate != 0)
		{
		$Lmatrixsignupdate = formatDate($Lmatrixsignupdate);
		}
	$Lmatrixdatecycled = $levelrowz["datecycled"];
		if ($Lmatrixdatecycled == 0)
		{
		$Lmatrixdatecycled = "Not Yet";
		}
		if ($Lmatrixdatecycled != 0)
		{
		$Lmatrixdatecycled = formatDate($Lmatrixdatecycled);
		}	
	$tree = $tree . "<li><table border=\"0\" cellspacing=\"4\" cellpadding=\"4\"><tr><td align=\"center\" bgcolor=\"#d3d3d3\" style=\"width: 80px; height: 25px; cursor: pointer; border: 2px solid #999999;\">level " . $levelcount . "</font></td><td style=\"height: 25px;\">#" . $Lid . " " . $Lusername . " - JOINED: " . $Lmatrixsignupdate . " / CYCLED: " . $Lmatrixdatecycled . "</font></td></tr></table>";
	if ($levelcount <= $matrixdepth)
		{
	$tree = $tree . MatrixStats($Lid,$levelcount+1,$showid) . "</li>";
		}
	if ($levelcount > $matrixdepth)
		{
		$tree = $tree . "</li></ul>";
		break;
		}
	} # while ($levelrowz = mysql_fetch_array($levelr))
$tree = $tree . "</ul>";
} # if ($levelrow > 0)
return $tree;
} # else
} # function MatrixStats($id,$levelcount,$showid)
$action = $_POST["action"];
$showid = $_REQUEST["showid"];
######################################################################## ADD NEW POSITION
if ($action == "newposition")
{
include "../header.php";
include "../style.php";
$userid = $_POST["userid"];
$transaction = $_POST["transaction"];
$paychoice = $_POST["paychoice"];
$matrixid = $_POST['matrixid'];
$adpackid = $_POST["adpackid"];
# get configuration details for matrix.
$mq = "select * from matrixconfiguration where id=\"$matrixid\"";
$mr = mysql_query($mq);
$mrows = mysql_num_rows($mr);
if ($mrows > 0)
{
include "../matrixadd.php";
$matrixlevelname = mysql_result($mr,0,"matrixlevelname");
$matrixwidth = mysql_result($mr,0,"matrixwidth");
$matrixdepth = mysql_result($mr,0,"matrixdepth");
$matrixprice = mysql_result($mr,0,"matrixprice");
$matrixpayout = mysql_result($mr,0,"matrixpayout");
$givereentrythislevel = mysql_result($mr,0,"givereentrythislevel");
$cyclecommissionforsponsor = mysql_result($mr,0,"cyclecommissionforsponsor");
$matrixsequence = mysql_result($mr,0,"matrixsequence");
MatrixAdd($userid,$matrixlevelname,$matrixwidth,$matrixdepth,$matrixprice,$matrixpayout,$givereentrythislevel,$matrixsequence,$matrixid,$cyclecommissionforsponsor);
} # } # if ($mrows > 0)
echo "<p align=\"center\">Position Added For " . $userid . "</p>";
echo "<p align=\"center\"><a href=\"matrixadmin.php\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "newposition")
######################################################################## SAVE POSITION
if ($action == "saveposition")
{
include "../header.php";
include "../style.php";
$matrixid = $_POST["matrixid"];
$matrixtoshow = "matrix" . $showid;
$transaction = $_POST["transaction"];
$paychoice = $_POST["paychoice"];
$matrixlevelname = $_POST["matrixlevelname"];
$matrixdepth = $_POST["matrixdepth"];
$matrixwidth = $_POST["matrixwidth"];
$q = "update $matrixtoshow set transaction=\"$transaction\",paychoice=\"$paychoice\" where id=\"$matrixid\"";
$r = mysql_query($q) or die(mysql_error());
echo "<p align=\"center\">Position " . $matrixid . " in " . $matrixwidth . " x " . $matrixdepth . " " . $matrixlevelname . " was Saved!</p>";
echo "<p align=\"center\"><a href=\"matrixadmin.php\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "saveposition")
######################################################################## DELETE ONE POSITION
######################################################################## (THOSE WITHOUT REFERRALS ARE TOTALLY REMOVED. THOSE WITH REFERRALS ARE MARKED DELETED)
if ($action == "deleteonlyoneposition")
{
include "../header.php";
include "../style.php";
$matrixid = $_POST["matrixid"];
$deleteid = $_POST["deleteid"];
$matrixlevelname = $_POST["matrixlevelname"];
$matrixdepth = $_POST["matrixdepth"];
$matrixwidth = $_POST["matrixwidth"];
$hasreferrals = $_POST["hasreferrals"];
$matrixtoshow = "matrix" . $showid;
include "../matrixdelete.php";
echo "<p align=\"center\">" . $show . "</p>";
echo "<p align=\"center\"><a href=\"matrixadmin.php\">Return</a></p>";
include "../footer.php";
exit;
} # if ($action == "deleteonlyoneposition")
#########################################################################################
include "../header.php";
include "../style.php";
?>
<table>
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
?>
<!-- PAGE CONTENT -->
<style type="text/css">
.showstate{ /*Definition for state toggling image */
cursor:hand;
cursor:pointer;
float: right;
margin-top: 2px;
margin-right: 3px;
}

.headers{
width: 750px;
font-size: 120%;
font-weight: bold;
border: 1px solid black;
background-color: lightyellow;
}

.switchcontent{
width: 750px;
border: 1px solid black;
border-top-width: 0;
}

li { list-style-image:none;}
ul { list-style-type:none; }

.treeview ul{ /*CSS for Simple Tree Menu*/
margin: 0;
padding: 0;
}

.treeview li{ /*Style for LI elements in general (excludes an LI that contains sub lists)*/
/*background: white url(list.gif) no-repeat left center;*/
list-style-type: none;
padding-left: 22px;
margin-bottom: 3px;
}

.treeview li.submenu{ /* Style for LI that contains sub lists (other ULs). */
background: white url(closed.gif) no-repeat left 1px;
cursor: hand !important;
cursor: pointer !important;
}


.treeview li.submenu ul{ /*Style for ULs that are children of LIs (submenu) */
display: none; /*Hide them by default. Don't delete. */
}

.treeview .submenu ul li{ /*Style for LIs of ULs that are children of LIs (submenu) */
cursor: default;
}
</style>
<script language="Javascript">
<!--
/***********************************************
* Simple Tree Menu- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
var persisteduls=new Object()
var ddtreemenu=new Object()

//ddtreemenu.closefolder="closed.gif" //set image path to "closed" folder image
//ddtreemenu.openfolder="open.gif" //set image path to "open" folder image

//////////No need to edit beyond here///////////////////////////

ddtreemenu.createTree=function(treeid, enablepersist, persistdays){
var ultags=document.getElementById(treeid).getElementsByTagName("ul")
if (typeof persisteduls[treeid]=="undefined")
persisteduls[treeid]=(enablepersist==true && ddtreemenu.getCookie(treeid)!="")? ddtreemenu.getCookie(treeid).split(",") : ""
for (var i=0; i<ultags.length; i++)
ddtreemenu.buildSubTree(treeid, ultags[i], i)
if (enablepersist==true){ //if enable persist feature
var durationdays=(typeof persistdays=="undefined")? 1 : parseInt(persistdays)
ddtreemenu.dotask(window, function(){ddtreemenu.rememberstate(treeid, durationdays)}, "unload") //save opened UL indexes on body unload
}
}

ddtreemenu.buildSubTree=function(treeid, ulelement, index){
ulelement.parentNode.className="submenu"
if (typeof persisteduls[treeid]=="object"){ //if cookie exists (persisteduls[treeid] is an array versus "" string)
if (ddtreemenu.searcharray(persisteduls[treeid], index)){
ulelement.setAttribute("rel", "open")
ulelement.style.display="block"
//ulelement.parentNode.style.backgroundImage="url("+ddtreemenu.openfolder+")"
}
else
ulelement.setAttribute("rel", "closed")
} //end cookie persist code
else if (ulelement.getAttribute("rel")==null || ulelement.getAttribute("rel")==false) //if no cookie and UL has NO rel attribute explicted added by user
ulelement.setAttribute("rel", "closed")
else if (ulelement.getAttribute("rel")=="open") //else if no cookie and this UL has an explicit rel value of "open"
ddtreemenu.expandSubTree(treeid, ulelement) //expand this UL plus all parent ULs (so the most inner UL is revealed!)
ulelement.parentNode.onclick=function(e){
var submenu=this.getElementsByTagName("ul")[0]
if (submenu.getAttribute("rel")=="closed"){
submenu.style.display="block"
submenu.setAttribute("rel", "open")
//ulelement.parentNode.style.backgroundImage="url("+ddtreemenu.openfolder+")"
}
else if (submenu.getAttribute("rel")=="open"){
submenu.style.display="none"
submenu.setAttribute("rel", "closed")
//ulelement.parentNode.style.backgroundImage="url("+ddtreemenu.closefolder+")"
}
ddtreemenu.preventpropagate(e)
}
ulelement.onclick=function(e){
ddtreemenu.preventpropagate(e)
}
}

ddtreemenu.expandSubTree=function(treeid, ulelement){ //expand a UL element and any of its parent ULs
var rootnode=document.getElementById(treeid)
var currentnode=ulelement
currentnode.style.display="block"
//currentnode.parentNode.style.backgroundImage="url("+ddtreemenu.openfolder+")"
while (currentnode!=rootnode){
if (currentnode.tagName=="UL"){ //if parent node is a UL, expand it too
currentnode.style.display="block"
currentnode.setAttribute("rel", "open") //indicate it's open
//currentnode.parentNode.style.backgroundImage="url("+ddtreemenu.openfolder+")"
}
currentnode=currentnode.parentNode
}
}

ddtreemenu.flatten=function(treeid, action){ //expand or contract all UL elements
var ultags=document.getElementById(treeid).getElementsByTagName("ul")
for (var i=0; i<ultags.length; i++){
ultags[i].style.display=(action=="expand")? "block" : "none"
var relvalue=(action=="expand")? "open" : "closed"
ultags[i].setAttribute("rel", relvalue)
//ultags[i].parentNode.style.backgroundImage=(action=="expand")? "url("+ddtreemenu.openfolder+")" : "url("+ddtreemenu.closefolder+")"
}
}

ddtreemenu.rememberstate=function(treeid, durationdays){ //store index of opened ULs relative to other ULs in Tree into cookie
var ultags=document.getElementById(treeid).getElementsByTagName("ul")
var openuls=new Array()
for (var i=0; i<ultags.length; i++){
if (ultags[i].getAttribute("rel")=="open")
openuls[openuls.length]=i //save the index of the opened UL (relative to the entire list of ULs) as an array element
}
if (openuls.length==0) //if there are no opened ULs to save/persist
openuls[0]="none open" //set array value to string to simply indicate all ULs should persist with state being closed
ddtreemenu.setCookie(treeid, openuls.join(","), durationdays) //populate cookie with value treeid=1,2,3 etc (where 1,2... are the indexes of the opened ULs)
}

////A few utility functions below//////////////////////

ddtreemenu.getCookie=function(Name){ //get cookie value
var re=new RegExp(Name+"=[^;]+", "i"); //construct RE to search for target name/value pair
if (document.cookie.match(re)) //if cookie found
return document.cookie.match(re)[0].split("=")[1] //return its value
return ""
}

ddtreemenu.setCookie=function(name, value, days){ //set cookei value
var expireDate = new Date()
//set "expstring" to either future or past date, to set or delete cookie, respectively
var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days))
document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+"; path=/";
}

ddtreemenu.searcharray=function(thearray, value){ //searches an array for the entered value. If found, delete value from array
var isfound=false
for (var i=0; i<thearray.length; i++){
if (thearray[i]==value){
isfound=true
thearray.shift() //delete this element from array for efficiency sake
break
}
}
return isfound
}

ddtreemenu.preventpropagate=function(e){ //prevent action from bubbling upwards
if (typeof e!="undefined")
e.stopPropagation()
else
event.cancelBubble=true
}

ddtreemenu.dotask=function(target, functionref, tasktype){ //assign a function to execute to an event handler (ie: onunload)
var tasktype=(window.addEventListener)? tasktype : "on"+tasktype
if (target.addEventListener)
target.addEventListener(tasktype, functionref, false)
else if (target.attachEvent)
target.attachEvent(tasktype, functionref)
}

/***********************************************
* Switch Content script II- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 2nd, 2005.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var enablepersist="off" //Enable saving state of content structure using session cookies? (on/off)
var memoryduration="1" //persistence in # of days

var contractsymbol='../images/matrixclose.png' //Path to image to represent contract state.
var expandsymbol='../images/matrixopen.png' //Path to image to represent expand state.

/////No need to edit beyond here //////////////////////////

function getElementbyClass(rootobj, classname){
var temparray=new Array()
var inc=0
var rootlength=rootobj.length
for (i=0; i<rootlength; i++){
if (rootobj[i].className==classname)
temparray[inc++]=rootobj[i]
}
return temparray
}

function sweeptoggle(ec){
var inc=0
while (ccollect[inc]){
ccollect[inc].style.display=(ec=="contract")? "none" : ""
inc++
}
revivestatus()
}


function expandcontent(curobj, cid){
if (ccollect.length>0){
document.getElementById(cid).style.display=(document.getElementById(cid).style.display!="none")? "none" : ""
curobj.src=(document.getElementById(cid).style.display=="none")? expandsymbol : contractsymbol
}
}

function revivecontent(){
selectedItem=getselectedItem()
selectedComponents=selectedItem.split("|")
for (i=0; i<selectedComponents.length-1; i++)
document.getElementById(selectedComponents[i]).style.display="none"
}

function revivestatus(){
var inc=0
while (statecollect[inc]){
if (ccollect[inc].style.display=="none")
statecollect[inc].src=expandsymbol
else
statecollect[inc].src=contractsymbol
inc++
}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function getselectedItem(){
if (get_cookie(window.location.pathname) != ""){
selectedItem=get_cookie(window.location.pathname)
return selectedItem
}
else
return ""
}

function saveswitchstate(){
var inc=0, selectedItem=""
while (ccollect[inc]){
if (ccollect[inc].style.display=="none")
selectedItem+=ccollect[inc].id+"|"
inc++
}
if (get_cookie(window.location.pathname)!=selectedItem){ //only update cookie if current states differ from cookie's
var expireDate = new Date()
expireDate.setDate(expireDate.getDate()+parseInt(memoryduration))
document.cookie = window.location.pathname+"="+selectedItem+";path=/;expires=" + expireDate.toGMTString()
}
}

function do_onload(){
uniqueidn=window.location.pathname+"firsttimeload"
var alltags=document.all? document.all : document.getElementsByTagName("*")
ccollect=getElementbyClass(alltags, "switchcontent")
statecollect=getElementbyClass(alltags, "showstate")
if (enablepersist=="on" && get_cookie(window.location.pathname)!="" && ccollect.length>0)
revivecontent()
if (ccollect.length>0 && statecollect.length>0)
revivestatus()
}

if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload

if (enablepersist=="on" && document.getElementById)
window.onunload=saveswitchstate

/***********************************************
* END SWITCH CONTENT SCRIPT
***********************************************/
-->
</script>
<script type="text/javascript">
function changeAPHiddenInput (objDropDown)
{
	var adpackdata=objDropDown.value.split("||");
	var adpackid=adpackdata[0];
	if (adpackid)
	{
	var adpackdetails=adpackdata[1];
	document.getElementById("apdetails").innerHTML = "<br>" + adpackdetails + "<br>";
	document.getElementById("apdetails").visibility = "visible";
	document.getElementById("apdetails").display = "block";
	}
	else
	{
	document.getElementById("apdetails").innerHTML = "";
	document.getElementById("apdetails").visibility = "hidden";
	document.getElementById("apdetails").display = "none";
	}
}
</script>
<table cellpadding="4" cellspacing="0" border="0" width="100%" align="center">
<?php
$matrixviewchoice = "";
$q = "select * from members order by userid";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
{
$mq = "select * from matrixconfiguration order by id";
$mr = mysql_query($mq);
$mrows = mysql_num_rows($mr);
if ($mrows > 0)
	{
?>
<tr><td colspan="2" align="center">
<table cellpadding="4" cellspacing="4" border="0" align="center">
<tr><td align="center" colspan="2"><div style="font-size: 18px; font-weight: bold;">Add A New Position To A Matrix Phase</div></td></tr>
<form action="matrixadmin.php" method="post" name="theform">
<tr><td align="right"><br>Give To Member: </td><td><br>
<select name="userid">
<?php
while ($rowz = mysql_fetch_array($r))
{
$userid = $rowz["userid"];
echo "<option value=\"" . $userid . "\">" . $userid . "</option>";
}
?>
</select>
</td></tr>

<tr><td align="right">Add To Matrix Phase: </td><td>
<select name="matrixid">
<?php
while ($mrowz = mysql_fetch_array($mr))
{
$id = $mrowz["id"];
$matrixlevelname = $mrowz["matrixlevelname"];
$matrixwidth = $mrowz["matrixwidth"];
$matrixdepth = $mrowz["matrixdepth"];
echo "<option value=\"" . $id . "\">" . $matrixwidth . " x " . $matrixdepth . " - " . $matrixlevelname . "</option>";
if ($showid == $id)
	{
$matrixviewchoice = $matrixviewchoice . "<option value=\"" . $id . "\" selected>" . $matrixwidth . " x " . $matrixdepth . " - " . $matrixlevelname . "</option>";
	}
if ($showid != $id)
	{
$matrixviewchoice = $matrixviewchoice . "<option value=\"" . $id . "\">" . $matrixwidth . " x " . $matrixdepth . " - " . $matrixlevelname . "</option>";
	}
}
?>
</select>
</td></tr>

<tr><td align="right">Payment Transaction ID: </td><td><input type="text" class="typein" name="transaction" maxlength="255" size="16"></td></tr>
<?php
$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
$adpackr = mysql_query($adpackq);
$adpackrows = mysql_num_rows($adpackr);
if ($adpackrows > 0)
	{
?>
<tr><td align="right" valign="top">Select AdPack: </td><td><select name="adpackid" id="adpackid" class="pickone" onchange="changeAPHiddenInput(this)">
<option value=""> - Select Bonus AdPack - </option>
<?php
	while ($adpackrowz = mysql_fetch_array($adpackr))
		{
		$adpackid = $adpackrowz["id"];
		$adpackdescription = $adpackrowz["description"];
		$howmanytimeschosen = $adpackrowz["howmanytimeschosen"];
		$enabled = $adpackrowz["enabled"];
		$points = $adpackrowz["points"];
		$surfcredits = $adpackrowz["surfcredits"];
		$banner_num = $adpackrowz["banner_num"];
		$banner_views = $adpackrowz["banner_views"];
		$solo_num = $adpackrowz["solo_num"];
		$traffic_num = $adpackrowz["traffic_num"];
		$traffic_views = $adpackrowz["traffic_views"];
		$login_num = $adpackrowz["login_num"];
		$login_views = $adpackrowz["login_views"];
		$hotlink_num = $adpackrowz["hotlink_num"];
		$hotlink_views = $adpackrowz["hotlink_views"];
		$button_num = $adpackrowz["button_num"];
		$button_views = $adpackrowz["button_views"];
		$ptc_num = $adpackrowz["ptc_num"];
		$ptc_views = $adpackrowz["ptc_views"];
		$featuredad_num = $adpackrowz["featuredad_num"];
		$featuredad_views = $adpackrowz["featuredad_views"];
		$hheaderad_num = $adpackrowz["hheaderad_num"];
		$hheaderad_views = $adpackrowz["hheaderad_views"];
		$hheadlinead_num = $adpackrowz["hheadlinead_num"];
		$hheadlinead_views = $adpackrowz["hheadlinead_views"];
		$details = "";
	if ($points > 0)
		{
		$details .= "<span>$points Points</span><br>";
		}
	if ($surfcredits > 0)
		{
		$details .= "<span>$surfcredits Surf Credits</span><br>";
		}
	if ($solo_num > 0)
		{
		$details .= "<span>$solo_num Solo Ads</span><br>";
		}
	if (($featuredad_num > 0) and ($featuredad_views > 0))
		{
		$details .= "<span>$featuredad_num Featured Ads with $featuredad_views Impressions</span><br>";
		}
	if (($hheaderad_num > 0) and ($hheaderad_views > 0))
		{
		$details .= "<span>$hheaderad_num Hot Header Adz with $hheaderad_views Impressions</span><br>";
		}
	if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
		{
		$details .= "<span>$hheadlinead_num Hot Headline Adz with $hheadlinead_views Impressions</span><br>";
		}
	if (($banner_num > 0) and ($banner_views > 0))
		{
		$details .= "<span>$banner_num Banner Ads with $banner_views Impressions</span><br>";
		}
	if (($button_num > 0) and ($button_views > 0))
		{
		$details .= "<span>$button_num Button Banner Ads with $button_views Impressions</span><br>";
		}
	if (($login_num > 0) and ($login_views > 0))
		{
		$details .= "<span>$login_num Login Ads with $login_views Impressions</span><br>";
		}
	if (($traffic_num > 0) and ($traffic_views > 0))
		{
		$details .= "<span>$traffic_num Traffic Links with $traffic_views Impressions</span><br>";
		}
	if (($hotlink_num > 0) and ($hotlink_views > 0))
		{
		$details .= "<span>$hotlink_num Hot Links with $hotlink_views Impressions</span><br>";
		}
	if (($ptc_num > 0) and ($ptc_views > 0))
		{
		$details .= "<span>$ptc_num PTC Ads with $ptc_views Impressions</span><br>";
		}
		$details = htmlentities($details, ENT_COMPAT, "ISO-8859-1");
?>
<option value="<?php echo $adpackid ?>||<?php echo $details ?>"><?php echo $adpackdescription ?></option>
<?php
		}
?>
</select>
<?php
	}
?>
<br>
<div id="apdetails" name="apdetails"></div>
</td></tr>
<tr><td colspan="2" align="center"><br><input type="hidden" name="action" value="newposition"><input type="submit" value="Add"></td></tr></form>
</table><br>&nbsp;</td></tr>
<?php
	} # if ($mrows > 0)
} # if ($rows > 0)
########################################################################## SHOW MEMBER POSITIONS
if ($showid == "")
{
$getfirstq = "select * from matrixconfiguration order by id limit 1";
$getfirstr = mysql_query($getfirstq);
$getfirstrows = mysql_num_rows($getfirstr);
if ($getfirstrows > 0)
	{
	$showid = mysql_result($getfirstr,0,"id");
	}
}
if ($showid == "")
{
?>
<tr><td colspan="2" align="center">The Matrix System doesn't have any matrix phases set up yet, so this page isn't available yet.<br>Please visit "Matrix Settings" from the navigation menu to set up your matrix phases.</td></tr>
</table></td></tr>
<?php
#include "../footer.php";
exit;
}
$matrixtoshow = "matrix" . $showid;
$showq = "select * from matrixconfiguration where id=\"$showid\"";
$showr = mysql_query($showq);
$showrows = mysql_num_rows($showr);
if ($showrows > 0)
{
$matrixdepth = mysql_result($showr,0,"matrixdepth");
$matrixwidth = mysql_result($showr,0,"matrixwidth");
$matrixlevelname = mysql_result($showr,0,"matrixlevelname");
}
if ($showrows < 1)
{
?>
</table></td></tr>
<?php
exit;
}
?>
<tr><td colspan="2" align="center"><br><div style="font-size: 18px; font-weight: bold;">View Member Positions</div></td></tr>
<tr>
<form action="matrixadmin.php" method="get">
<td align="center" colspan="2"><br>Matrix Phase To Show:&nbsp;
<input type="hidden" name="showid" value="<?php echo $showid ?>">
<select name="showid" onchange="this.form.submit();">
<?php
echo $matrixviewchoice;
?>
</select>
</td>
</form>
</tr>

<tr><td colspan="2" align="center"><br><div style="font-size: 18px; font-weight: bold;"><?php echo $matrixwidth ?>x<?php echo $matrixdepth ?> <?php echo $matrixlevelname ?> Positions</div></td></tr>
<?php
$orderby = $id;

$q = "select * from $matrixtoshow order by id";
$r = mysql_query($q) or die(mysql_error());
$rows = mysql_num_rows($r);
if ($rows < 1)
{
?>
<tr><td colspan="2" align="center"><br>There are no positions yet in this matrix phase.<br>&nbsp;</td></tr>
<?php
}
if ($rows > 0)
{
?>
<tr><td colspan="2"><br>Click the PLUS sign at the TOP LEFT of any member's position to expand and see their matrix and downline in the system for this phase. It may be folded up again by clicking the X (appears instead of the plus sign when a matrix is expanded). You can also open all account downlines at once using the links below.</td></tr>
<tr><td align="center" colspan="2"><br><div style="margin-bottom: 5px"><a href="javascript:sweeptoggle('contract')">CONTRACT ALL</a> | <a href="javascript:sweeptoggle('expand')">EXPAND ALL</a></div></td></tr>
<tr><td align="center" colspan="2"><br>

<table border="1" cellspacing="0" cellpadding="0" align="center">
<?php
while ($rowz = mysql_fetch_array($r))
{
$cols = 14;
$totaldownline = 0;
$reftable = "";
$matrixid = $rowz["id"];
$positionordernumber = $rowz["positionordernumber"];
$username = $rowz["username"];
for($i=1;$i<=$matrixdepth;$i++)
{
$variableparentid = "parent" . $i;
$variableparentname = "parent" . $i . "username";
$variablelevel = "L" . $i;
$variablerefsneeded = "L" . $i . "refsneeded";
eval("\$variableparentid = \$rowz[\"$variableparentid\"];");
eval("\$variableparentname = \$rowz[\"$variableparentname\"];");
eval("\$variablelevel = \$rowz[\"$variablelevel\"];");
$maxrefsinthislevel = pow($matrixwidth, $i);
$variablerefsneeded = $maxrefsinthislevel-$variablelevel;
$totaldownline = $totaldownline+$variablelevel;
$reftable = $reftable . "<tr bgcolor=\"#ffffff\"><td align=\"center\"><font color=\"#000000\">" . $i . "</td><td align=\"center\"><font color=\"#000000\">" . $variablelevel . "</td><td align=\"center\"><font color=\"#000000\">" . $variablerefsneeded . "</td></tr>";
}
$urlreferrerid = $rowz["urlreferrerid"];
$urlreferrername = $rowz["urlreferrername"];
$signupdate = $rowz["signupdate"];
if ($signupdate == 0)
{
$signupdate = "";
}
if ($signupdate != 0)
{
$signupdate = formatDate($signupdate);
}
$datecycled = $rowz["datecycled"];
if ($datecycled == 0)
{
$lastdatecycled = "Not Yet";
}
if ($datecycled != 0)
{
$lastdatecycled = formatDate($datecycled);
}              
$paychoice = $rowz["paychoice"];
$transaction = $rowz["transaction"];
$lastpaid = $rowz["lastpaid"];
if ($lastpaid == 0)
{
$showlastpaid = "N/A";
}
if ($lastpaid != 0)
{
$showlastpaid = formatDate($lastpaid);
}
if ($urlreferrername == "")
{
$urlreferrername = $username;
}
#########################################
?>
<form action="matrixadmin.php" method="post" name="theform<?php echo $matrixid ?>">
<tr><td align="center">Show</td><td align="center">#</td><td align="center"><u>Matrix ID</u></td><td align="center"><u>Username</u></td><td align="center"><u>Date Added</u></td><td align="center"><u>Transaction</u></td><td align="center"><u>Paid With</u></td>
<td align="center"><u>Date Cycled</u></td>
<td align="center"><u>Save</u></td>
<td align="center"><u>Delete Position</u></td>
</tr>
<tr>
<td align="center">
<img src="../images/matrixopen.png" class="showstate" onClick="expandcontent(this, 'sc<?php echo $matrixid ?>')"/>
</td>
<td align="center"><?php echo $positionordernumber ?></td><td align="center"><?php echo $matrixid ?></td><td align="center"><?php echo $username ?></td><td align="center"><?php echo $signupdate ?></td><td align="center"><input type="text" name="transaction" value="<?php echo $transaction ?>" maxlength="255"></td><td align="center"><input type="text" name="paychoice" value="<?php echo $paychoice ?>" maxlength="255"></td>
<td align="center"><?php echo $lastdatecycled ?></td>
<td align="center">
<input type="hidden" name="action" value="saveposition">
<input type="hidden" name="matrixid" value="<?php echo $matrixid ?>">
<input type="hidden" name="showid" value="<?php echo $showid ?>">
<input type="hidden" name="matrixlevelname" value="<?php echo $matrixlevelname ?>">
<input type="hidden" name="matrixdepth" value="<?php echo $matrixdepth ?>">
<input type="hidden" name="matrixwidth" value="<?php echo $matrixwidth ?>">
<input type="submit" value="Save">
</td>
</form>
<?php
if ($matrixid == 1)
	{
?>
<td align="center">CANNOT DELETE POSITION 1</td>
<?php
	}
if ($matrixid != 1)
	{
	if ($totaldownline > 0)
		{
		$hasrefs = "yes";
		}
	if ($totaldownline < 1)
		{
		$hasrefs = "no";
		}
?>
<form action="matrixadmin.php" method="post" name="theform<?php echo $matrixid ?>">
<td align="center">
<input type="hidden" name="action" value="deleteonlyoneposition">
<input type="hidden" name="deleteid" value="<?php echo $matrixid ?>">
<input type="hidden" name="showid" value="<?php echo $showid ?>">
<input type="hidden" name="matrixlevelname" value="<?php echo $matrixlevelname ?>">
<input type="hidden" name="matrixdepth" value="<?php echo $matrixdepth ?>">
<input type="hidden" name="matrixwidth" value="<?php echo $matrixwidth ?>">
<input type="hidden" name="hasreferrals" value="<?php echo $hasrefs ?>">
<input type="submit" value="Delete">
</td>
</form>
<?php
	}
?>
</tr>

<tr><td id="sc<?php echo $matrixid ?>" class="switchcontent" style="display: none; width: 750px;" colspan="<?php echo $cols ?>">
<table cellspacing="2" cellpadding="2" align="center" style="width: 750px;">

<tr><td colspan="2" align="center"><br><br>
<a href="javascript:ddtreemenu.flatten('treemenu<?php echo $matrixid ?>', 'expand')">Expand All</a> | <a href="javascript:ddtreemenu.flatten('treemenu<?php echo $matrixid ?>', 'contact')">Contract All</a>
</td></tr>
<tr><td colspan="2"><br>
<?php
$tree = "<ul id=\"treemenu$matrixid\" class=\"treeview\"><li><table border=\"0\" cellspacing=\"4\" cellpadding=\"4\"><tr><td align=\"center\" bgcolor=\"#d3d3d3\" style=\"width: 80px; height: 25px; cursor: pointer; border: 2px solid #999999;\">member</font></td><td style=\"height: 25px;\">" . $username . " - SPONSOR: " . $urlreferrername . "</font></td></tr></table></li>";
$tree = $tree . MatrixStats($matrixid,1,$showid) . "</ul>";
echo $tree;
?>
</td></tr>

<tr><td colspan="2"><br><div style="font-size: 18px; font-weight: bold;" align="center">ID #<?php echo $matrixid ?> Downline By Level</div></td></tr>
<tr><td colspan="2" align="center"><br><table align="center" border="0" cellpadding="2" cellspacing="2" bgcolor="#999999">
<tr bgcolor="#eeeeee"><td align="center"><br><u>Level</u><br>&nbsp;</td><td align="center"><br><u>Referrals In Level</u><br>&nbsp;</td><td align="center"><br><u>Referrals Still Needed To Fill Level</u><br>&nbsp;</td></tr>
<?php
echo $reftable;
?>
<tr bgcolor="#eeeeee"><td align="right" colspan="2">Total Downline: </td><td align="center"><?php echo $totaldownline ?></td></tr>
</table><br>&nbsp;</td></tr>

</table></td></tr>
<tr bgcolor="#999999"><td colspan="<?php echo $cols ?>">&nbsp;</td></tr>
<script type="text/javascript">
<!--
ddtreemenu.createTree("treemenu<?php echo $matrixid ?>", false, 1)
ddtreemenu.flatten('treemenu<?php echo $matrixid ?>', 'contact')
-->
</script>
<?php
} # while ($rowz = mysql_fetch_array($r))
?>
</table></td></tr>
<?php
} # if ($rows > 0)
#include "../footer.php";
?>