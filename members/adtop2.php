<?
session_start();
include "../config.php";

$id = $_GET['id'];

$query = "select * from post where id = '".$id."' LIMIT 1";
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

    $query1 = "select * from viewed where userid='".$userid."' and postid=".$id;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 1) {

			$paid = mysql_result($result1, 0, "paid");	

			if(!$paid) {
	
				$poster = mysql_result($result, 0, "userid");
				
				if ($memtype=="PRO") {
					$earn = $proreadearn;
				}
				elseif ($memtype=="JV Member") {
					$earn = $jvreadearn;
				}
				elseif ($memtype=="SUPER JV") {
					$earn = $superjvreadearn;
				}					
				assignpoints($referid, $earn);
				$queryaddpoints="update members set points=points+".$earn." where userid='".$userid."'";
				$resultaddpoints=mysql_query($queryaddpoints);

				$querysubtract="update members set points=points-1 where userid='".$poster."'";
				$resultsubtract=mysql_query($querysubtract);

				//add this ad to viewers list
				mysql_query("UPDATE viewed SET paid = '1' WHERE userid='".$userid."' and postid=".$id);	

				
				add_adclick('text');
				
				



				echo "<font color=BLACK>You have earned <font color=RED><b>$earn</b></font> points.</font>&nbsp;&nbsp;";




			
			} else echo "You have already received points for this link";
			
		} else echo "Invalid link";
		
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