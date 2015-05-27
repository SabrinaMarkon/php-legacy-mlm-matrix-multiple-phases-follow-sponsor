<table cellspacing="0" cellpadding="15" width="160" bordercolor=#000000 border="1" bgcolor=#FFFFFF><tr><td><?
if ($memtype=="PRO") {
					$earn = $probuttonclick;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvbuttonclick;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvbuttonclick;
				}	


 echo "<center><font size=1><b>Earn $earn Points<br>Clicking Banner Buttons</b></font></center><br>";
?>

<?php

	
	$res_banners = @mysql_query("SELECT * FROM buttons where status=1 and max>shown ORDER BY RAND() LIMIT $buttondisplay");
	while($banners = @mysql_fetch_array($res_banners)) { 
	
	 mysql_query("update buttons set shown=shown+1, show_views=show_views+1 where id=".$banners['id']);

    if ($banners[bannerurl] != "" ) {

	?>

<?
if( session_is_registered("ulogin") )

	{ ?>


<center>


<table><tr><td>


<a href="<? echo "$domain/buttonclick1.php?id=".$banners['id']; ?>" target="_blank"><img src="<? echo $banners['bannerurl']; ?>" border="0"></a></td></tr></table></center>



<?

}

else
{ ?>



            <center><table><tr><td><a href="<? echo "$domain/buttonclick.php?id=".$banners['id']; ?>" target="_blank"><img src="<? echo $banners['bannerurl']; ?>" border="0"></a></td></tr></table></center>

    <?

}	

	}

    }



?>
</td></tr></table>