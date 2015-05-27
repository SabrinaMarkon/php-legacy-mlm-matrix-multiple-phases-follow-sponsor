<?
session_start();
include "../config.php";
?>
<html>
<head>
<?
if($_GET['id'])  echo "<META http-equiv=\"refresh\" content=\"6; URL=adtop2_html.php?id=".$_GET['id']."&url=".urlencode($_GET['url'])."\">";
?>
</head>
<body background="../images/Back-1.gif">

<center>
<?

if($_GET['message']) {

	if($_GET['url']) {
	?>
	<div style="float: left; padding-top: 60px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<div style="float: right; padding-top: 60px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<?
	}

	echo $_GET['message'];
	
} else {

	 if ($memtype=="PRO") {
					$earn = $prohtmlearn;
				}
				elseif ($memtype=="JV Member") {
					$earn = $jvhtmlearn;
				}
				elseif ($memtype=="SUPER JV") {
					$earn = $superjvhtmlearn;
				}
	if($_GET['type'] == "pro") {
	

	?>
	You Will Earn <? echo $earn ?>  points After <span id="plzwait">6 seconds</span>
	<script type="text/javascript">
	counter = 6;
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
	} else {
	
		if($_GET['url']) {
		?>
		<div style="float: left; padding-top: 60px;">
		<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
		</div>

		<div style="float: right; padding-top: 60px;">
		<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
		</div>

		<?
		}
		
		?>
		You have earned <? echo $earn; ?> points
		<?
	}
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