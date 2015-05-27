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
<body>


<div style="float: left; padding-top: 90px;">
<a href="<? echo $bonusurl; ?>" target="_top">Remove This Frame</a>
</div>

<div style="float: right; padding-top: 90px;">
<a href="<? echo $bonusurl; ?>" target="_top">Remove This Frame</a>
</div>



<center>
<?


			if(!$userrecord['bonus_viewed']) {
	
				if($_GET['points']>= $bonusmin AND $_GET['points']<=$bonusmax) {

				$queryaddpoints="update members set points=points+".$_GET['points']." where userid='".$userid."'";
				$resultaddpoints=mysql_query($queryaddpoints);

				//add this ad to viewers list
				mysql_query("UPDATE members SET bonus_viewed=1 WHERE userid='".$userid."'");	
				
				echo "You Have Earned ".$_GET['points']."$bonuspoints Points";
			
				} else echo "Invalid link";
			} else echo "You Have Already Received Credit Today";
			

	
?>



<br>

<?

include("../banners.php");
mysql_close();
?>
</center>

</body>
</html>