<?php



	if( session_is_registered("ulogin") )

	{

		$queryclicked="select * from bannerviews where userid='".$userid."'";
		$resultclicked = mysql_query($queryclicked);



		$queryexclude="select * from banners where";

		while ($lineclicked = mysql_fetch_array($resultclicked)) {

			$blid = $lineclicked["blid"];

			$queryexclude.= " id<>".$blid." and";

		}
		$queryexclude.= " userid<>'".$userid."' and status=1 and max>shown ORDER BY RAND() LIMIT 1";

	} 
	
	else 
	{
	$queryexclude = "SELECT * FROM banners where status=1 and max>shown ORDER BY RAND()  LIMIT 1";
    }
		
	

	$banresult = mysql_query ($queryexclude);



    $banline = mysql_fetch_array($banresult);

    $banbannerurl = $banline["bannerurl"];

    $banid = $banline["id"];



    //update the banners displayed

   $updbanquery = "update banners set shown=shown+1,show_views=show_views+1 where id=".$banid;

    $updbanresult = mysql_query ($updbanquery);



    if ($banbannerurl != "" ) {



	?>
<?
if( session_is_registered("ulogin") )



	{


 ?>
 <br>
<center><table><tr><td><a href="<? echo "$domain/bannerclick.php?id=".$banid; ?>" target="_blank"><img src="<? echo $banbannerurl; ?>" border="0"></a></td></tr></table></center>
<center><font size=1><b>Members Earn Points for Clicking Banners</b></font></center> 
<center><span style="background-color: #FFFF00; color: #FF0000;font-size: 12px; width: 468px;">   
    <?



}

else
{ ?>
 <center><table><tr><td><a href="<? echo "bannerclick.php?id=".$banid; ?>" target="_blank"><img src="<? echo $banbannerurl; ?>" border="0"></a></td></tr></table></center>
<center><font size=1><b>Members Earn Points for Clicking Banners</b></font></center>
<center><span style="background-color: #FFFF00; color: #FF0000;font-size: 12px; width: 468px;">   
<? }


$sql = mysql_query("SELECT * FROM hotlinks WHERE approved=1 AND views<max ORDER BY rand()");
if(@mysql_num_rows($sql)) {
$info = mysql_fetch_array($sql);
mysql_query("UPDATE hotlinks SET views=views+1 WHERE id='".$info['id']."'");
echo "<b><font face=\"Tahoma\" size=\"1\">Members Hotlink : <a href=\"$domain/hotlinkclick.php?id=".$info['id']."\" target=\"_blank\"><u><font face=\"Tahoma\" size=\"1\">".$info['subject']."</font></u></a>";
}	

?>			



</b></font></span></center><br>

			
			</center>

    <?

    }

	

	
?>