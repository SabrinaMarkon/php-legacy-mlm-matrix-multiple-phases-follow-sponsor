<?
session_start();
include "config.php";

$id = $_GET['id'];

echo "Redirecting, please wait....<br>";
	$query = "update hotlinks set clicks=clicks+1 where id=".$id;
	$result = mysql_query ($query)
	    or die ("Query failed");

	$query2 = "select * from hotlinks where id='$id'";
	$result2 = mysql_query ($query2)
	    or die ("Query 2 failed");

	while ($line = mysql_fetch_array($result2)) {
	    $url = $line["url"];
	}
	
	if($url) {
		if( $userid )
	   	{
		    $delay = 2;
			$sql = mysql_query("SELECT * FROM hotlink_clicks WHERE userid = '".$userid."' AND hotlinkid = '".$id."'");
			if(!@mysql_num_rows($sql)) {
			
                                                                add_adclick('hotlink');
				if($memtype == "PRO") {

                assignpoints($userrecord['referid'], $earn);
	mysql_query("update members set points=points+".$prohotlinkearn." where userid='".$userid."'");

	echo "<center><font face=tahoma size=2 color=#FF0033><b>You Earned $prohotlinkearn Points!</b></font></center>";


				} elseif($memtype == "JV Member") {

                   assignpoints($userrecord['referid'], $earn);
                  mysql_query("update members set points=points+".$jvhotlinkearn." where userid='".$userid."'");

	echo "<center><font face=tahoma size=2 color=#FF0033><b>You Earned $jvhotlinkearn Points!</b></font></center>";

			} else {

                       assignpoints($userrecord['referid'], $earn);
	       mysql_query("update members set points=points+".$superjvhotlinkearn." where userid='".$userid."'");

  	echo "<center><font face=tahoma size=2 color=#FF0033><b>You Earned $superjvhotlinkearn Points!</b></font></center>";

			} 						
				mysql_query("INSERT INTO hotlink_clicks VALUES ('$id', '$userid')");
				
			} else echo "<center><font face=tahoma size=3 color=#FF0033><b>You Already Earned Points For This Hotlink</b></font></center>";
		
		}
	}
	
	

	echo "<META HTTP-EQUIV=Refresh Content=".$delay.";URL=".$url.">";

?>