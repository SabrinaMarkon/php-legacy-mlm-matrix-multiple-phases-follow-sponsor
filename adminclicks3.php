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

    $query1 = "select * from adminclicks where userid='".$userid."' and number=".$seed;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 1) {
    		echo "You have already received credits for this link";
    }  //end if ($numrows1 ==1)
    else {
	
    	$query2 = "insert into adminclicks set userid='".$userid."', number=".$seed.", adid=".$adid;
        $result2 = mysql_query ($query2)
            		or die ("Query failed");
					
        $query3 = "select * from members where userid='".$userid."'";
		$result3 = mysql_query ($query3)
            		or die ("Query failed");
					
        $userrecord = mysql_fetch_array($result3);
		$memtype = $userrecord["memtype"];
		
		
				
           if ($memtype=="PRO") {
				$earn = $adminproclickearn;
                                                         assignpoints($userrecord['referid'], $earn);
                                                        

				}
				elseif ($memtype == "JV Member") {

				$earn = $adminjvclickearn;
                                                         assignpoints($userrecord['referid'], $earn);
                                                         
				}

                                                               elseif ($memtype == "SUPER JV") {

				$earn = $adminsuperjvclickearn;
                                                         assignpoints($userrecord['referid'], $earn);
                                                         
				}
                                                              

				$queryaddpoints="update members set points=points+".$earn." where userid='".$userid."'";
				$resultaddpoints=mysql_query($queryaddpoints);

  echo "<font color=BLACK>You have earned <font color=READ><b>$earn</b></font> points.</font>&nbsp;&nbsp;";       

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
