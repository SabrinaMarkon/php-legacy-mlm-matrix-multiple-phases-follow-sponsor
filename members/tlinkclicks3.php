<?
session_start();
include "../config.php";

$id = $_GET['id'];

$query = "select * from tlinks where id = '".$id."' LIMIT 1";
$result = mysql_query ($query)
           		or die ("Query failed");
$numrows = @ mysql_num_rows($result);
?>
<html>
<body background="../images/Back-4.gif">

<?
if($_GET['url']) {
?>
<div style="float: left; padding-top: 75px;">
<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
</div>

<div style="float: right; padding-top: 75px;">
<a href="<? echo $_GET['url']; ?>" target="_top">Remove This Frame</a>
</div>

<?
}
?>

<center>
<?
if ($numrows == 1) {

    $query1 = "select * from tlviews where userid='".$userid."' and tlid=".$id;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 0) {

				if ($memtype=="PRO") {
					$earn = $protrafficearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvtrafficearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvtrafficearn;
				}								
				assignpoints($referid, $earn);
				$queryaddpoints="update members set points=points+".$earn." where userid='".$userid."'";
				$resultaddpoints=mysql_query($queryaddpoints);



		      $query2 = "insert into tlviews set userid='".$userid."', tlid=".$id;
		      $result2 = mysql_query ($query2) or die ("Query failed");
	  
				add_adclick('traffic');
				
				
					echo "<font color=BLUE>You have earned <font color=BLACK><b>$earn</b></font> points</font>.&nbsp;&nbsp;";
			
			
			} else echo "You have already received points for this link";
			
		
	} else echo "Invalid link";
	
	
?>
<br>

<?

include("../banners2.php");
mysql_close();
?>
</center>

</body>
</html>