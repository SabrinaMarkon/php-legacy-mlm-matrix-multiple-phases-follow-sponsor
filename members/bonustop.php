<?
session_start();
include "../config.php";

	$sql = mysql_query("SELECT * FROM dailybonus WHERE rented='".date('Y-m-j')."' AND added=1 AND approved=1");
	if(@mysql_num_rows($sql)) {
		$info = mysql_fetch_array($sql);
		$bonusurl = $info['url'];
	}

?>
<html>
<head>
<?

$points = rand($bonusmin, $bonusmax);

echo "<META http-equiv=\"refresh\" content=\"11; URL=bonustop2.php?points=$points\">";
?>
<style>
<!--
body {
	font-weight: bold;
}

a {

	color: #0066CC;
	font-weight: bold;
}


-->
</style>
</head>

<body>

<center>
<?

if($_GET['message']) {

	?>
	<div style="float: left; padding-top: 75px;">
	<a href="<? echo $bonusurl; ?>" target="_top">Remove This Frame</a>
	</div>

	<div style="float: right; padding-top: 75px;">
	<a href="<? echo $bonusurl; ?>" target="_top">Remove This Frame</a>
	</div>

	<?

	echo $_GET['message'];
	
} else {



	

	?>
	You Will Earn <? echo $points; ?> Points After <span id="plzwait">20 seconds</span>
	<script type="text/javascript">
	counter = 20;
	function countdown() {
		if ((0 <= 100) || (0 > 0)) {
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

include("../banners.php");
mysql_close();
?>
</center>

</body>
</html>