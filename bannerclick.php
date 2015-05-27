<?php
session_start();
include "config.php";

$id = $_GET['id'];

echo "Redirecting, please wait....";
	$query = "update banners set clicks=clicks+1,show_clicks=show_clicks+1,show_views=show_views+1 where id=".$id;
	$result = mysql_query ($query)
	    or die ("Query failed");

	$query2 = "select * from banners where id='$id'";
	$result2 = mysql_query ($query2)
	    or die ("Query 2 failed");

	while ($line = mysql_fetch_array($result2)) {
	    $url = $line["targeturl"];
	}
	
	if($url) {
		if( session_is_registered("ulogin") )
	   	{
		
			$sql = mysql_query("SELECT * FROM bannerviews WHERE userid = '".$userid."' AND blid = '".$id."'");
			if(!@mysql_num_rows($sql)) {
			
				if($memtype == "PRO") {
					assignpoints($referid, $earn);
					mysql_query("update members set points=points+".$probannerearn." where userid='".$userid."'");
				} elseif($memtype == "JV Member") {
					assignpoints($referid, $earn);
					mysql_query("update members set points=points+".$jvbannerearn." where userid='".$userid."'");
				} elseif($memtype == "SUPER JV") {
					mysql_query("update members set points=points+".$superjvbannerearn." where userid='".$userid."'");
				}					
								
			}
		
		}
	}
	
	

	echo "<META HTTP-EQUIV=Refresh Content=0;URL=".$url.">";

?>