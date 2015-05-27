<?php
session_start();
include "../config.php";
require('../EgoPaySci.php');
$key = "http://demomatrixmpsf.phpsitescripts.com";
$key2 = "http://www.demomatrixmpsf.phpsitescripts.com";
if (($domain != $key) and ($domain != $key2))
{
echo "The script you are trying to run isn't licensed. Please contact <a href=\"mailto:sabrina@phpsitescripts.com\">Sabrina Markon, PHPSiteScripts.com</a> to purchase a licensed copy.</a>";
exit;
}
include "../header.php";
include "../style.php";
include("navigation.php");
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
?>
<script type="text/javascript">
function changeHiddenInput (objDropDown)
{
	var adpackdata=objDropDown.value.split("||");
	var adpackid=adpackdata[0];
	if (adpackid)
	{
	var adpackdetails=adpackdata[1];
	document.getElementById("details").innerHTML = "<br>" + adpackdetails + "<br>";
	document.getElementById("details").visibility = "visible";
	document.getElementById("details").display = "block";
	}
	else
	{
	document.getElementById("details").innerHTML = "";
	document.getElementById("details").visibility = "hidden";
	document.getElementById("details").display = "none";
	}
}
</script>
<?php
$howmanypositions = $_POST["howmanypositions"];
if ($howmanypositions == "")
	{
	$howmanypositions = 1;
	}
$username = $userid;
$matrixid = $_REQUEST["matrixid"];
$showid = $_REQUEST["showid"];
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
echo "<center>No positions to show in this matrix phase.</center>";
include "../footer.php";
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
echo "<center>Matrix phase does not exist in the system.</center>";
include "../footer.php";
exit;
}
if ($matrixid == "")
{
$q = "select * from $matrixtoshow where username=\"$username\" order by id limit 1";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
	{
	$matrixid = mysql_result($r,0,"id");
	}
}
$q = "select * from $matrixtoshow where id=\"$matrixid\"";
$r = mysql_query($q) or die(mysql_error());
$row = mysql_num_rows($r);
if ($row > 0)
{
$totaldownline = 0;
$reftable = "";
for($i=1;$i<=$matrixdepth;$i++)
{
$variableparentid = "parent" . $i;
$variableparentname = "parent" . $i . "username";
$variablelevel = "L" . $i;
$variablerefsneeded = "L" . $i . "refsneeded";
eval("\$variableparentid = mysql_result(\$r,0,\"$variableparentid\");");
eval("\$variableparentname = mysql_result(\$r,0,\"$variableparentname\");");
eval("\$variablelevel = mysql_result(\$r,0,\"$variablelevel\");");
$maxrefsinthislevel = pow($matrixwidth, $i);
$variablerefsneeded = $maxrefsinthislevel-$variablelevel;
$totaldownline = $totaldownline+$variablelevel;
$reftable = $reftable . "<tr bgcolor=\"#ffffff\"><td align=\"center\"><font color=\"#000000\">" . $i . "</td><td align=\"center\"><font color=\"#000000\">" . $variablelevel . "</td><td align=\"center\"><font color=\"#000000\">" . $variablerefsneeded . "</td></tr>";
}
$urlreferrerid = mysql_result($r,0,"urlreferrerid");
$urlreferrername = mysql_result($r,0,"urlreferrername");
$signupdate = mysql_result($r,0,"signupdate");
if ($signupdate == 0)
{
$signupdate = "";
}
if ($signupdate != 0)
{
$signupdate = formatDate($signupdate);
} 
$datecycled = mysql_result($r,0,"datecycled");
if ($datecycled == 0)
{
$datecycled = "Not Yet";
}
if ($datecycled != 0)
{
$datecycled = formatDate($datecycled);
}               
if ($urlreferrername == "")
{
$urlreferrername = $username;
}
} # if ($row > 0)

#############################################################
function MatrixStats($id,$levelcount,$showid)
{
global $matrixdepth;
$matrixtoshow = "matrix" . $showid;
if ($levelcount > $matrixdepth)
{
return $tree;
}
else
{
$levelq = "select * from $matrixtoshow where parent1='$id' order by id";
$levelr = mysql_query($levelq) or die(mysql_error());
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
?>
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
-->
</script>
<style type="text/css">
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
/*background: white url(closed.gif) no-repeat left 1px;*/
cursor: hand !important;
cursor: pointer !important;
}


.treeview li.submenu ul{ /*Style for ULs that are children of LIs (submenu) */
display: none; /*Hide them by default. Don't delete. */
}

.treeview .submenu ul li{ /*Style for LIs of ULs that are children of LIs (submenu) */
cursor: default;
}
</style><br>
<table cellpadding="4" cellspacing="0" border="0" width="100%" align="center">
<tr><td align="center" colspan="2"><div style="font-size: 18px; font-weight: bold;"><?php echo $matrixwidth ?>x<?php echo $matrixdepth ?> <?php echo $matrixlevelname ?> ID #<?php echo $matrixid ?> Downline</div></td></tr>
<tr><td colspan="2"><br><tr><td colspan="2">Click each position to see each member of your downline and his or her referrals in this phase. It will also show you which level each member below you is in and whether or not they have cycled.</td></tr>
<tr><td colspan="2" align="center"><br>Your Affiliate URL: <a href="<?php echo $domain ?>/index.php?referid=<?php echo $userid ?>" target="_blank"><?php echo $domain ?>/index.php?referid=<?php echo $userid ?></a></td></tr>
<tr><td colspan="2" align="center"><br>Earnings Owed: $<?php echo $commission ?></td></tr>

<?php
$firstmatrixq = "select * from matrixconfiguration order by id limit 1";
$firstmatrixr = mysql_query($firstmatrixq);
$firstmatrixrows = mysql_num_rows($firstmatrixr);
if ($firstmatrixrows > 0)
{
$firstmatrixprice = mysql_result($firstmatrixr,0,"matrixprice");
$firstmatrixpayout = mysql_result($firstmatrixr,0,"matrixpayout");
if ($firstmatrixprice > 0)
	{
	?>
	<tr><td colspan="2" align="center"><br><br><table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
	<tr><td align="center" colspan="2"><div style="font-size: 18px; font-weight: bold;">Order Positions</div></td></tr>
	<?php
	if ($paymentprocessorfeepercentagetoadd > 0)
	{
	?>
	<tr><td align="center" colspan="2"><br>A fee of <?php echo $paymentprocessorfeepercentagetoadd ?>% is added to the total to compensate for payment processor fees.</td></tr>
	<?php
	}
	?>
	<tr><td align="center" colspan="2"><br>
	<table cellpadding="2" cellspacing="2" border="0" align="center" bgcolor="#989898">
	<tr bgcolor="#d3d3d3"><td align="center"><b>Price Per Position</b></td>
	<td align="center"><b>Cycle Payout</b></td>
	<?php
	if ($canbuymultiplepositionsatonce == "yes")
		{
	?>
	<td align="center"><b>Number Of Positions</b></td>
	<?php
		}
	$adpackq = "select * from adpacks where enabled=\"yes\" order by id limit 1";
	$adpackr = mysql_query($adpackq);
	$adpackrows = mysql_num_rows($adpackr);
	if ($adpackrows > 0)
		{
	$adpackdefaultid = mysql_result($adpackr,0,"id");
	?>
	<td align="center"><b>Select AdPack</b></td>
	<?php
		}
	$adpackchosen = $_POST["adpackchosen"];
	if ($adpackchosen == "")
		{
		$adpackchosen = $adpackdefaultid;
		}
	?>
	<td align="center"><b>Pay</b></td>
	<?php
	if ($adminpayza != "")
	{
	?>
	<td align="center"><b>Payza</b></td></tr>
	<?php
	}
	if (($egopay_store_id!="") and ($egopay_store_password!=""))
	{
	?>
	<td align="center"><b>EgoPay</b></td></tr>
	<?php
	}
	if ($adminperfectmoney != "")
	{
	?>
	<td align="center"><b>Perfect Money</b></td></tr>
	<?php
	}
	if ($adminokpay != "")
	{
	?>
	<td align="center"><b>OKPay</b></td></tr>
	<?php
	}
	if ($adminsolidtrustpay != "")
	{
	?>
	<td align="center"><b>Solid Trust Pay</b></td></tr>
	<?php
	}
	if ($adminmoneybookers != "")
	{
	?>
	<td align="center"><b>Moneybookers</b></td></tr>
	<?php
	}

	?>
	<tr bgcolor="#eeeeee"><td align="center">$<?php echo $firstmatrixprice ?>
	<?php
	if ($paymentprocessorfeepercentagetoadd > 0)
			{
			$feepercentage = $paymentprocessorfeepercentagetoadd/100;
			$totalfee = $firstmatrixprice*$feepercentage;
			$totalfee = sprintf("%.2f", $totalfee);
			echo " + " . $paymentprocessorfeepercentagetoadd . "%(\$" . $totalfee . ") Payment Processor Fee";
			}
	?>
	</td>
	<td align="center"><b>$<?php echo $firstmatrixpayout ?></b></td>
<?php
if ($canbuymultiplepositionsatonce == "yes")
	{
	?>
	<form method="post">
	<td align="center">
	Purchase <select name="howmanypositions" id="howmanypositions" onchange="this.form.submit();" class="pickone">
	<option value="1" <?php if ($howmanypositions == 1) { echo "selected"; } ?>>1</option>
	<option value="2" <?php if ($howmanypositions == 2) { echo "selected"; } ?>>2</option>
	<option value="3" <?php if ($howmanypositions == 3) { echo "selected"; } ?>>3</option>
	<option value="4" <?php if ($howmanypositions == 4) { echo "selected"; } ?>>4</option>
	<option value="5" <?php if ($howmanypositions == 5) { echo "selected"; } ?>>5</option>
	<option value="6" <?php if ($howmanypositions == 6) { echo "selected"; } ?>>6</option>
	<option value="7" <?php if ($howmanypositions == 7) { echo "selected"; } ?>>7</option>
	<option value="8" <?php if ($howmanypositions == 8) { echo "selected"; } ?>>8</option>
	<option value="9" <?php if ($howmanypositions == 9) { echo "selected"; } ?>>9</option>
	<option value="10" <?php if ($howmanypositions == 10) { echo "selected"; } ?>>10</option>
	</select> Positions
	<input type="hidden" name="adpackchosen" value="<?php echo $adpackchosen ?>">
	</td>
	</form>
	<?php
	} # if ($canbuymultiplepositionsatonce == "yes")
	$adpackq = "select * from adpacks where enabled=\"yes\" order by id";
	$adpackr = mysql_query($adpackq);
	$adpackrows = mysql_num_rows($adpackr);
	if ($adpackrows > 0)
		{
	?>
	<form method="post">
	<td align="center"><select name="adpackchosen" id="adpackchosen" onchange="this.form.submit();" class="pickone">
	<?php
		while ($adpackrowz = mysql_fetch_array($adpackr))
			{
			$adpackid = $adpackrowz["id"];
			$adpackdescription = $adpackrowz["description"];
	?>
	<option value="<?php echo $adpackid ?>" <?php if ($adpackchosen == $adpackid) { echo "selected"; } ?>><?php echo $adpackdescription ?></option>
	<?php
			}
	?>
	</select>
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	</td>
	</form>
	<?php
		}

	if ($paymentprocessorfeepercentagetoadd > 0)
		{
		$feepercentage = $paymentprocessorfeepercentagetoadd/100;
		$totalfee = $firstmatrixprice*$feepercentage;
		$totalfee = sprintf("%.2f", $totalfee);
		$totalcostperposition = $firstmatrixprice+$totalfee;
		$totalcost = $totalcostperposition*$howmanypositions;
		$totalcost = sprintf("%.2f", $totalcost);
		}
	else
		{
		$totalcost = $firstmatrixprice*$howmanypositions;
		$totalcost = sprintf("%.2f", $totalcost);
		}
	?>
	<td align="center"><b>$<?php echo $totalcost ?></b></td>
	<?php
	# PAYZA
	if ($adminpayza != "")
	{
	?>
	<form method="post" action="https://secure.payza.com/checkout">
	<td align="center">
	<input type="hidden" name="ap_purchasetype" value="item"> 
	<input type="hidden" name="ap_merchant" value="<?php echo $adminpayza ?>"> 
	<input type="hidden" name="ap_currency" value="USD"> 
	<input type="hidden" name="ap_returnurl" value="<?php echo $domain ?>/thank-you.php"> 
	<input type="hidden" name="ap_itemname" value="<?php echo $sitename ?> - <?php echo $userid ?>"> 
	<input type="hidden" name="ap_quantity" value="1"> 
	<input type="hidden" name="apc_1" value="<?php echo $userid ?>">
	<input type="hidden" name="apc_2" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="apc_3" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="ap_amount" value="<?php echo $totalcost ?>"> 
	<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payzasm.png" border="0">
	</form>
	</td>
	<?php
	} # if ($adminpayza != "")

	# EGOPAY
	if (($egopay_store_id!="") and ($egopay_store_password!=""))
	{
	try {
			
		$oEgopay = new EgoPaySci(array(
			'store_id'          => $egopay_store_id,
			'store_password'    => $egopay_store_password
		));
		
		$sPaymentHash = $oEgopay->createHash(array(
		/*
		 * Payment amount with two decimal places 
		 */
			'amount'    => $totalcost,
		/*
		 * Payment currency, USD/EUR
		 */
			'currency'  => 'USD',
		/*
		 * Description of the payment, limited to 120 chars
		 */
			'description' => $sitename . ' - ' . $userid,
		
		/*
		 * Optional fields
		 */
		'fail_url'	=> $domain. '/members/matrixselect.php',
		'success_url'	=> $domain. '/thank-you.php',
		
		/*
		 * 8 Custom fields, hidden from users, limited to 100 chars.
		 * You can retrieve them only from your callback file.
		 */
		'cf_1' => $userid,
		'cf_2' => $sitename . ' - ' . $userid,
		'cf_3' => $totalcost,
		'cf_4' => $howmanypositions,
		'cf_5' => $adpackchosen,
		//'cf_6' => '',
		//'cf_7' => '',
		//'cf_8' => '',
		));
		
	} catch (EgoPayException $e) {
		die($e->getMessage());
	}
	?>
	<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
	<td align="center">
	<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
	<input type="image" src="<?php echo $domain ?>/images/egopaysm.png" border="0">
	</form>
	</td>
	<?php
	} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

	# PERFECT MONEY
	if ($adminperfectmoney != "")
	{
	?>
	<form action="https://perfectmoney.com/api/step1.asp" method="POST">
	<td align="center">
	<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
	<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
	<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $totalcost ?>">
	<input type="hidden" name="PAYMENT_UNITS" value="USD">
	<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
	<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="BAGGAGE_FIELDS" value="userid item howmanypositions adpackid">
	<input type="hidden" name="userid" value="<?php echo $userid ?>">
	<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
	<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoneysm.png" border="0">
	</form>
	</td>
	<?php
	} # if ($adminperfectmoney != "")

	# OKPAY
	if ($adminokpay != "")
	{
	?>
	<form  method="post" action="https://www.okpay.com/process.html">
	<td align="center">
	<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
	<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="ok_currency" value="usd">
	<input type="hidden" name="ok_item_1_type" value="service">
	<input type="hidden" name="ok_item_1_price" value="<?php echo $totalcost ?>">
	<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
	<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
	<input type="hidden" name="ok_item_1_custom_2_title" value="howmanypositions">
	<input type="hidden" name="ok_item_1_custom_2_value" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="ok_item_1_custom_3_title" value="adpackid">
	<input type="hidden" name="ok_item_1_custom_3_value" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
	<input type="image" name="submit" src="<?php echo $domain ?>/images/okpaysm.gif" border="0">
	</form>
	</td>
	<?php
	} # if ($adminokpay != "")

	# SOLID TRUST PAY
	if ($adminsolidtrustpay != "")
	{
	?>
	<form action="https://solidtrustpay.com/handle.php" method="post">
	<td align="center">
	<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
	<input type="hidden" name="sci_name" value="your_sci_name">
	<input type="hidden" name="amount" value="<?php echo $totalcost ?>">
	<input type="hidden" name="currency" value="USD">
	<input type="hidden" name="user1" value="<?php echo $userid ?>">
	<input type="hidden" name="user2" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="user3" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
	<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="item_id" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpaysm.gif" alt="Solid Trust Pay" border="0">
	</form>
	</td>
	<?php
	} # if ($adminsolidtrustpay != "")

	# MONEYBOOKERS
	if ($adminmoneybookers != "")
	{
	?>
	<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
	<td align="center">
	<input type="hidden" name="pay_to_email" value="<?php echo $adminmoneybookers ?>">
	<input type="hidden" name="status_url" value="<?php echo $domain ?>/moneybookers_ipn.php">
	<input type="hidden" name="return_url" value="<?php echo $domain ?>/thank-you.php">
	<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/matrixselect.php">
	<input type="hidden" name="language" value="EN">
	<input type="hidden" name="amount" value="<?php echo $totalcost ?>">
	<input type="hidden" name="currency" value="USD">
	<input type="hidden" name="merchant_fields" value="userid,item,howmanypositions,adpackid">
	<input type="hidden" name="userid" value="<?php echo $userid ?>">
	<input type="hidden" name="item" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="hidden" name="howmanypositions" value="<?php echo $howmanypositions ?>">
	<input type="hidden" name="adpackid" value="<?php echo $adpackchosen ?>">
	<input type="hidden" name="detail1_text" value="<?php echo $sitename ?> - <?php echo $userid ?>">
	<input type="image" style="border-width: 1px; border-color: #8B8583;" src="<?php echo $domain ?>/images/moneybookerssm.gif">
	</form>
	</td>
	<?php
	} # if ($adminmoneybookers != "")
	?>
	</table></td></tr>
	<?php
	} # if ($firstmatrixprice > 0)
} # if ($firstmatrixrows > 0)
?>

<tr><td colspan="2" align="center"><br><br>
<a href="javascript:ddtreemenu.flatten('treemenu1', 'expand')">Expand All</a> | <a href="javascript:ddtreemenu.flatten('treemenu1', 'contact')">Contract All</a>
</td></tr>
<tr><td colspan="2"><br>
<?php
$tree = "<ul id=\"treemenu1\" class=\"treeview\"><li><table border=\"0\" cellspacing=\"4\" cellpadding=\"4\"><tr><td align=\"center\" bgcolor=\"#d3d3d3\" style=\"width: 80px; height: 25px; cursor: pointer; border: 2px solid #999999;\">you</font></td><td style=\"height: 25px;\">#" . $matrixid . " " . $username . " - JOINED: " . $signupdate . " / CYCLED: " . $datecycled . "</font></td></tr></table></li>";
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
</table><br><br>
<script type="text/javascript">
<!--
//ddtreemenu.createTree(treeid, enablepersist, opt_persist_in_days (default is 1))
ddtreemenu.createTree("treemenu1", false, 1)
//ddtreemenu.createTree("treemenu2", false)
ddtreemenu.flatten('treemenu1', 'contact')
-->
</script>
<?php
include "../footer.php";
?>