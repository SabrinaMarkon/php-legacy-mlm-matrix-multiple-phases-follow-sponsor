<?php

include "config.php";

?>
<html>
<body background="images/Back-4.gif">


<?
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
?>


<center>

<?

$userid = $_GET['userid'];
$adid = $_GET['adid'];
$seed = $_GET['seed'];

    $query1 = "select * from clicks where userid='".$userid."' and number=".$seed;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 1) {
    		echo "You have already received credits for this link";
    }  //end if ($numrows1 ==1)
    else {
	
    	$query2 = "insert into clicks set userid='".$userid."', number=".$seed.", adid=".$adid;
        $result2 = mysql_query ($query2)
            		or die ("Query failed");
					
        $query3 = "select * from members where userid='".$userid."'";
		$result3 = mysql_query ($query3)
            		or die ("Query failed");
					
        $userrecord = mysql_fetch_array($result3);
		$memtype = $userrecord["memtype"];
		
		
		add_adclick('solo');
		
       if ($memtype == "PRO") {
			assignpoints($userrecord['referid'], $earn);
        	$query4 = "update members set points=points+".$proclickearn." where userid='".$userid."'";
			$result4 = mysql_query ($query4)
            		or die ("Query failed");
			echo "$proclickearn credits have been added to your account";
        }
        elseif ($memtype == "JV Member") {
			assignpoints($userrecord['referid'], $earn);
        	$query5 = "update members set points=points+".$jvclickearn." where userid='".$userid."'";
			$result5 = mysql_query ($query5)
            		or die ("Query failed");
            echo "$jvclickearn  credits have been added to your account";
        } else {
			assignpoints($userrecord['referid'], $earn);
        	$query6 = "update members set points=points+".$superjvclickearn." where userid='".$userid."'";
			$result6 = mysql_query ($query6)
            		or die ("Query 6 failed");
            echo "$superjvclickearn credits have been added to your account";
        }				
	}


?>
<br>
<?
include("banners2.php");
mysql_close($dblink);
?>
</center>

</body>
</html>
