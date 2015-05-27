<html>
<body>

<center>
<?
if($_GET['ok']) echo "<b>If you can see this message, the site isn't a frame breaker.</b>";
else {
?>
Please wait <span id="plzwait">3 seconds</span>
<script type="text/javascript">
counter = 3;
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

</body>
</html>