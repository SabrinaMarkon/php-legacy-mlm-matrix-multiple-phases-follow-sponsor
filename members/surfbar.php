<?php
session_start();
include "../config.php";
if( ($userid == "") || ($password=="") )
{
	include "../header.php";
	include "../style.php";
	echo '<p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>';
	include "../footer.php";
	mysql_close($dblink);
	exit();
}
$surfwaittime = $_SESSION['surftime'];
if ($memtype=="PRO") {
	$earn = $prosurfcreditspersite;
	$surfratio = $prosurfratio;
}elseif($memtype=="JV Member"){
	$earn = $jvsurfcreditspersite;
	$surfratio = $jvsurfratio;
}else {
	$earn = $superjvsurfcreditspersite;
	$surfratio = $superjvsurfratio;
}
if (($_POST[x])&&(substr($_SESSION[igif], 16) === $_SESSION['afloat'])){

	// posted
	$x = $_POST[x];

	// decode, strip string and round numbers
	$a = base64_decode($_SESSION['afloat']);
	$b = 0 + $a;
	$a = explode(" ", $a);
	$a = $a[3];
	$bb = round($b);
	$aa = round($a);

	// x coords
	$gc = explode(" ", '0 19 40 60 82 104 79 100 121 142 163 185');

	// check if correct number has been clicked
	$ac = $aa + 6;
	$rightclick = false;
	if ($bb <= $aa){ $ac = $bb + 1; }
	$mess = "You clicked the wrong image.";
	// if correct number clicked success
	if (($x >= $gc[$ac-1]) && ($x <= $gc[$ac])){
		$rightclick = true;
	}
?>
<html>
<body>

	<div style="text-align: left; padding-top: 120px; float: left;">
	<a href="<?php echo $_SESSION['currentsurfpage_url'];?>" target="_top">Remove This Frame</a>
	</div>

	<div style="text-align: right; padding-top: 120px; float: right;">
	<a href="<?php echo $_SESSION['currentsurfpage_url'];?>" target="_top">Remove This Frame</a>
	</div>


<center>
<a href="index.php" target="_top">Return to Members Area</a> - <a href="mysurf.php" target="_top">Add Your Site</a> - <a href="support.php" target="_blank">Report This Site</a> - <a href="advertisestats.php" target="_top">Set Up Your Ads</a>

<?php
if(!$rightclick){
	echo '<br>'.$mess . ' <a href="surf.php" target="_top">View more sites</a><br>';
}else{
########
$surfratiocounter = $surfratiocounter+1; # userrecord will have one less count in the session variable for this, so 1 is added. Otherwise the user will have to
										 # always surf their ratio+1 before being credited a surf point.
if ($surfratiocounter < $surfratio)
{
echo '<br><a href="surf.php" target="_top">View more sites</a><br>';
}
else
{
echo "<br>You have earned $earn surf credits.". '<a href="surf.php" target="_top">View more sites</a><br>';	
}
	if($_SESSION['currentsurfpage_status'] == 'pending' && $_SESSION['currentsurfpage_id'] != $surf_last_id){
			$_SESSION['currentsurfpage_status'] = 'success';
			add_adclick('surfpages');
			if ($memtype=="PRO") {
				assignpoints($userrecord['referid'], $earn);
			}elseif($memtype=="JV Member"){
				assignpoints($userrecord['referid'], $earn);
			}else {
				assignpoints($userrecord['referid'], $earn);
			}
			//update member point and last surf id
			########
			if ($surfratiocounter < $surfratio)
			{
			mysql_query("UPDATE members SET sitessurfedtoday=sitessurfedtoday+1,totalsitessurfedever=totalsitessurfedever+1,sitessurfedforcontest=sitessurfedforcontest+1,surfratiocounter=surfratiocounter+1, surf_last_id='".$_SESSION['currentsurfpage_id']."' where userid='".$userid."'");
			}
			else
			{
			mysql_query("UPDATE members SET sitessurfedtoday=sitessurfedtoday+1,totalsitessurfedever=totalsitessurfedever+1,sitessurfedforcontest=sitessurfedforcontest+1,surfratiocounter=0,surfcredits=surfcredits+".$earn.", surf_last_id='".$_SESSION['currentsurfpage_id']."' where userid='".$userid."'");
			}
			########
			//remove credit from the surfurl owner
			mysql_query("UPDATE surfurls SET surfpoint=surfpoint-$earn, surfclicks=surfclicks+1, shownyet='yes' WHERE id='".$_SESSION['currentsurfpage_id']."' AND surfpoint>=$earn");
		}else{
			echo "You were already credited today for this surf page";
		}
}
?>

            <center><?php include("../banners2.php"); mysql_close($dblink); ?></center>			


    </center>

</body>
</html>

<?php
exit;
}else{

	// afloat = base64_encoded random string
	$afloat = base64_encode(" " . $num1 = rand(0,3) . "." . $num2 = rand(100,999) . " IDEuNzg3IEZsb2F0IDMuODc5IA " . $num3 = rand(1,4) . "." . $num4 = rand(100,999) . " "); 

	// rectangle x coord

	$aler = "> 78";
	if(round($num1 . "." . $num2) <= round($num3 . "." . $num4)) {$aler = "< 105";}

	// create random image
	$_SESSION[igif] = "surfimage.php?n=" . $afloat . "";
	$_SESSION['afloat'] = $afloat;
?>
<html>
<head>
<style type="text/css">
/* click image */
.cd {
width: 185px;
height: 15px;
background-image: url(<?=$_SESSION[igif];?>);
background-repeat: no-repeat;
position: relative;
z-index: 2;
}
</style>
<script language="JavaScript">
function submitform() {

	if (document.xcoords.x.value <?=$aler;?>) {
		document.xcoords.submit();

	} else {
		alert("Click number in square identical to number in the rectangle to submit.");
	}
}
// image x value
function xcoord(event) {
	image = event.offsetX?(event.offsetX):event.pageX-document.getElementById("coord").offsetLeft;
	document.xcoords.x.value = image;
}
</script>
</head>

<body>

<center>
	
<form name="xcoords" style="display: inline;" method="post" target="_self">
<input type="hidden" name="x">
</form>

	
<a href="index.php" target="_top">Return to Members Area</a> - <a href="mysurf.php" target="_top">Add Your Site</a> - <a href="support.php" target="_blank">Report This Site</a> - <a href="advertisestats.php" target="_top">Set Up Your Ads</a><br>

<?php
if ($surfratiocounter < $surfratio)
{
$show = "You Will Earn " . $earn . " Surf Credits After";
}
else
{
$show = "Your Surf Page Visit Will Be Counted After";
}
?>

<span id="plzwait">Your Surf Page Visit Will Be Counted After <?php echo $surfwaittime;?> seconds</span>
	<script type="text/javascript">
	counter = <?php echo $surfwaittime;?>;
	function countdown() {
		if ((0 <= 100) || (0 > 0)) {
			counter--;
			if(counter > 0) {
				document.getElementById("plzwait").innerHTML = '<?php echo $show ?> <b>'+counter+'<\/b> seconds';
				setTimeout('countdown()',1000);

			} else if(counter==0) {

				document.getElementById("plzwait").innerHTML = '<div id="coord" onclick="submitform(xcoord(event))" class="cd"></div>';


			}
		}
	}
	countdown();
	</script>
	<noscript><h2>You need a javascript enable browser to surf</h2></noscript>
	<br>

            <center>
            <?php include("../banners2.php"); mysql_close($dblink); ?>
            </center>
    </center>

</body>
</html>
<?php } ?>