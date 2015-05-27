<?
session_start();
include "config.php";

$id = $_GET['id'];

$query = "select * from banners where id = '".$id."' LIMIT 1";
$result = mysql_query ($query)
           		or die ("Query failed");
$numrows = @ mysql_num_rows($result);
?>
<html>
<body background="images/Back-4.gif">
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

    $query1 = "select * from bannerviews where userid='".$userid."' and blid=".$id;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    $query3 = "select * from members where userid='".$userid."'";
		$result3 = mysql_query ($query3)
            		or die ("Query failed");
					
        $userrecord = mysql_fetch_array($result3);
		$memtype = $userrecord["memtype"];


    if ($numrows1 == 0) {
add_adclick('banner');

		if ($memtype=="PRO") {
			$earn = $probannerearn;
                                                assignpoints($userrecord['referid'], $earn);

				}

                                elseif($memtype=="JV Member"){
			$earn = $jvbannerearn;
                                                 assignpoints($userrecord['referid'], $earn);
				}

		else {
			$earn = $superjvbannerclick;
                                                 assignpoints($userrecord['referid'], $earn);
				}
				
			

				$queryaddpoints="update members set points=points+".$earn." where userid='".$userid."'";
				$resultaddpoints=mysql_query($queryaddpoints);


echo "<font color=BLACK>You have earned <font color=RED><b>$earn</b></font> points.</font>&nbsp;&nbsp;";
			
		      $query2 = "insert into bannerviews set userid='".$userid."', blid=".$id;
		      $result2 = mysql_query ($query2) or die ("Query failed");
	  
								
				

			
			} else echo "You have already received points for this link";
			
		
	} else echo "Invalid link";
	
	
?>
<br>

<?

include("banners2.php");
mysql_close();
?>
</center>

</body>
</html>