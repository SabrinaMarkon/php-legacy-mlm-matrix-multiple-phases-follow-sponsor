<?
session_start();
include "../config.php";
?>
<html>
<head>
<?
echo "<META http-equiv=\"refresh\" content=\"15; URL=ptcadclicks3.php?id=".$_GET['adid']."&url=".urlencode($_GET['url'])."\">";
?>
</head>
<body background="../images/Back-1.gif">

<center>
<?

if($_GET['message']) {

	if($_GET['url']) {
	?>
	<div style="float: left; padding-top: 85px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<div style="float: right; padding-top: 85px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<?
	}

	echo $_GET['message'];
	
} else {

	if ($memtype=="PRO") {
		$earn = $proptccearn;
	}
	elseif ($memtype=="JV Member"){
	    $earn = $jvptcearn;
	}
	elseif ($memtype=="SUPER JV"){
		$earn = $superjvptcearn;
	}

	?><br>
	You Will Earn <? echo $earn ?>  Cash Commissions After <span id="plzwait">15 seconds</span>
	<script type="text/javascript">
	counter = 15;
	function countdown() {
		if ((0 <= 50) || (0 > 0)) {
			counter--;
			if(counter > 0) {
				document.getElementById("plzwait").innerHTML = '<b>'+counter+'<\/b> seconds';
				setTimeout('countdown()',1000);
			}
		}
	}
	countdown();
	</script>
	<?
}
?>
<br>

<?

include("../banners2.php");
mysql_close();
?>
</center>

</body>
</html>