<?
session_start();
include "../config.php";

$id = $_GET['id'];

$query = "select * from ptcads where id = '".$id."' LIMIT 1";
$result = mysql_query ($query)
           		or die ("Query failed");
$numrows = @ mysql_num_rows($result);
?>
<html>
<body background="../images/Back-4.gif">

<?
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
?>

<center>
<?
if ($numrows == 1) {

    $query1 = "select * from ptcadviews where userid='".$userid."' and tlid=".$id;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 0) {
                   
				if ($memtype=="PRO") {
					$earn = $proptcearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvptcearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvptcearn;
				}					
				

		      $query2 = "insert into ptcadviews set userid='".$userid."', tlid=".$id;
		      $result2 = mysql_query ($query2) or die ("Query failed");
	  
			  $query4 = "update members set commission=commission+".$earn." where userid='".$userid."'";
              $result4 = mysql_query ($query4) or die ("Query failed");
			add_adclick('ptc');	
				
				echo "You have earned $earn cash commissions";
			
			} else echo "You have already received cash for this ad";
			
		
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