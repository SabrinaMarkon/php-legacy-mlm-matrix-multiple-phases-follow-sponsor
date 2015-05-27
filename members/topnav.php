<?php

    $banquery = "SELECT * FROM topnav where status=1 and max>shown ORDER BY RAND()";
	$banresult = mysql_query ($banquery);

    $banline = mysql_fetch_array($banresult);
    $banbannerurl = $banline["targeturl"];
    $banid = $banline["id"];
$navname = $banline["name"];

    //update the banners displayed
    $updbanquery = "update topnav set shown=shown+1 where id=".$banid;
    $updbanresult = mysql_query ($updbanquery);

    if ($banbannerurl != "" ) {

	?>
<?
if( session_is_registered("ulogin") )



	{


 ?>
 <br>
 <BR><b><font color= #ffffff></font></b><table border=1 cellpadding=0 cellspacing=0 width=165 height=26><tr valign=middle><td align="center" nowrap style="background:yellow" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"> <a href="<? echo "topnavclicks.php?id=".$banid; ?>" target="_blank" class="button" onmouseover="window.status='<? echo $navname; ?>';return true" onMouseOut="window.status='';return true" target="_blank"><font color="#000000"><b><? echo $navname; ?></font></b></a></td></tr></table>    <?



}

else
{ ?>
 <center><table><tr><td> <a href="<? echo "bannerclick.php?id=".$banid; ?>" target="_blank"> <img src="<? echo $banbannerurl; ?>" border="0"></a></td></tr></table></center>
<center><font size=1><b>Members Earn Points for Clicking Banners</b></font></center>
<br><center><span style="background-color: #FFFF00; color: #FF0000;font-size: 12px; width: 468px;">   
<? }



?>			



</b></font></span></center><br><br><br>

			
			</center>

    <?

    }

	

	
?>