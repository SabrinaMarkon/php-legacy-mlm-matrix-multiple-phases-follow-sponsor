<?php
include "config.php";
$key = "http://demomatrixmpsf.phpsitescripts.com";
$key2 = "http://www.demomatrixmpsf.phpsitescripts.com";
if (($domain != $key) and ($domain != $key2))
{
echo "The script you are trying to run isn't licensed. Please contact <a href=\"mailto:sabrina@phpsitescripts.com\">Sabrina Markon, PHPSiteScripts.com</a> to purchase a licensed copy.</a>";
exit;
}
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
$scrolldisplay = "";
$allpayouts = array();
#################################################### COMMISSIONS
$rq = "select * from payouts order by datepaid desc limit 100";
$rr = mysql_query($rq);
$rrows = mysql_num_rows($rr);
if ($rrows > 0)
	{
	while ($rrowz = mysql_fetch_array($rr))
		{
		$scrolluserid = $rrowz["userid"];
		$scrollpaid = $rrowz["paid"];
		$scrolldatepaid = $rrowz["datepaid"];
		$allpayouts["$scrolldatepaid"] = $scrolluserid . " was paid \$" . $scrollpaid;
		}
	}
####################################################
krsort($allpayouts);
foreach ($allpayouts as $key => $value)
{
$key = formatDate($key);
$scrolldisplay = $scrolldisplay . "<p align=\"center\">" . $value . "<br>on " . $key . "</p>";
}
?>
<html><head>
<title>Latest Payouts</title>
<style type="text/css">
<!--
BODY { margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; }
/* FONT COLORS */
TABLE		{ COLOR: #000000; FONT: 11px arial, sans-serif; font-weight: normal }
.title		{ COLOR: #0033FF; FONT: 12px arial, sans-serif; font-weight: bold; }
#NewsDiv	{ position: absolute; left: 0; top: 0; width: 100% }
/* PAGE LINK COLORS */
a:link		{ color: #0033FF; text-decoration: underline; }
a:visited	{ color: #6633FF; text-decoration: underline; }
a:active	{ color: #0033FF; text-decoration: underline; }
a:hover		{ color: #6699FF; text-decoration: none; }
-->
</style>
</head>
<BODY TEXT="#000000" onMouseover="scrollspeed=0" onMouseout="scrollspeed=current" OnLoad="NewsScrollStart();">
<div id="NewsDiv">
<table cellpadding="5" cellspacing="0" border="0" width="100%"><tr><td>

<!-- SCROLLER CONTENT STARTS HERE -->
<?php
echo $scrolldisplay;
?>
<!-- SCROLLER CONTENT ENDS HERE -->

</td></tr></table>
</div>

<!-- YOU DO NOT NEED TO EDIT BELOW THIS LINE -->

<script language="JavaScript" type="text/javascript">
<!-- HIDE CODE

var scrollspeed		= "1"		// SET SCROLLER SPEED 1 = SLOWEST
var speedjump		= "30"		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var startdelay 		= "2" 		// START SCROLLING DELAY IN SECONDS
var nextdelay		= "0" 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace		= "2px"		// TOP SPACING FIRST TIME SCROLLING
var frameheight		= "100px"	// IF YOU RESIZE THE WINDOW EDIT THIS HEIGHT TO MATCH



current = (scrollspeed)


function HeightData(){
AreaHeight=dataobj.offsetHeight
if (AreaHeight==0){
setTimeout("HeightData()",( startdelay * 1000 ))
}
else {
ScrollNewsDiv()
}}

function NewsScrollStart(){
dataobj=document.all? document.all.NewsDiv : document.getElementById("NewsDiv")
dataobj.style.top=topspace
setTimeout("HeightData()",( startdelay * 1000 ))
}

function ScrollNewsDiv(){
dataobj.style.top=parseInt(dataobj.style.top)-(scrollspeed)
if (parseInt(dataobj.style.top)<AreaHeight*(-1)) {
dataobj.style.top=frameheight
setTimeout("ScrollNewsDiv()",( nextdelay * 1000 ))
}
else {
setTimeout("ScrollNewsDiv()",speedjump)
}}



// END HIDE CODE -->
</script>


</body>
</html>
