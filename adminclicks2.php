<html>
<head>
<?
if($_GET['seed']) echo "<META http-equiv=\"refresh\" content=\"10; URL=adminclicks3.php?seed=".$_GET['seed']."&adid=".$_GET['adid']."&userid=".$_GET['userid']."&url=".urlencode($_GET['url'])."\">";
?>
</head>
<body background="images/Back-1.gif">

<center>
<?
if($_GET['message']) {

	if($_GET['url']) {
	?>
	<div style="float: left; padding-top: 100px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<div style="float: right; padding-top: 100px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<?
	}

	echo $_GET['message'];
	
} else {
?><br>
You will earn <? echo $_GET['credit']; ?>  credits after <span id="plzwait">10 seconds</span>
<script type="text/javascript">
counter = 13;
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
include "config.php";
include("banners2.php");
mysql_close($dblink);
?>
</center>

</body>
</html>