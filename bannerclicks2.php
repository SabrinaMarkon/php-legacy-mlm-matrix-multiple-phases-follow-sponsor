<?
session_start();
include "config.php";
?>
<html>
<head>
<?
echo "<META http-equiv=\"refresh\" content=\"15; URL=bannerclicks3.php?id=".$_GET['adid']."&url=".urlencode($_GET['url'])."\">";
?>
</head>
<body background="images/Back-1.gif">
<center>
<?

if($_GET['message']) {

	if($_GET['url']) {
	?>
	<div style="float: left; padding-top: 65px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<div style="float: right; padding-top: 65px;">
	<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
	</div>

	<?
	}

	echo $_GET['message'];
	
} else {



$query3 = "select * from members where userid='".$userid."'";
		$result3 = mysql_query ($query3)
            		or die ("Query failed");
					
        $userrecord = mysql_fetch_array($result3);
		$memtype = $userrecord["memtype"];




	if ($memtype=="PRO") {
		$earn = $probannerearn;
	}

                elseif($memtype=="JV Member") {
		$earn = $jvbannerearn;
	}

	else {
		$earn = $superjvbannerclick;
	}

	?><br>
	You Will Earn <? echo $earn ?>  Credits After <span id="plzwait">10 seconds</span>
	<script type="text/javascript">
	counter = 15;
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

include("banners2.php");
mysql_close();
?>
</center>
</body>
</html>