<?php

session_start();


include "../header.php";
include "../config.php";
include "../style.php";

$adid = mysql_real_escape_string($_GET['adid']);
$seed = mysql_real_escape_string($_GET['seed']);
function getSuperSetting($name)
{
	$query = "select setting from supersettings where name=\"$name\"";
	$result = mysql_query( $query )
		or die( "An error occured executing the following query:<br>$query<br><br>Mysql returned the following error:<br><font color='red'>".mysql_error()."</font>" );
		
	$data = mysql_fetch_array( $result );
	
	return $data["setting"]; 
}
if( session_is_registered("ulogin") )
   	{  // members only stuff!

		#include("navigation.php");
        include("../banners.php");

		


      $query3 = "select * from supernetworksolos where approved=1 and sent=1 ORDER by rand() LIMIT 10";
		$result3 = mysql_query ($query3)
	     	or die ("Queryx failed");
        $numrows3 = @ mysql_num_rows($result3);

        if ($numrows3 == 0) {
        	echo "<p><center>No supersolos to view.</p></center>";
        }
        else {
            echo "<p><center><H2>Super Solo Inbox</H2><br><font face=Tahoma size=3 color=#000000>Catch the SuperSolos You Missed!<br>
			Get More Points Now!</font></p><br><br>";
	        ?>

<table width=100% border=0 cellpadding=2 cellspacing=0>

<?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $subject = $line3["subject"];
	            $adbody = $line3["adbody"];
	            $url = $line3["url"];
                            
$name = trim($name);
				$firstname = substr($name , 0, strpos($name, " "));

$adbody = str_replace("~fname~", $firstname, $line3["adbody"]);
$adbody = str_replace("~userid~",$userid,$adbody);
$subject = str_replace("~userid~",$userid,$subject);
$subject = str_replace("~fname~",$firstname,$subject);


	        ?>
	          



	          <center>  <tr>


<td bgcolor="#693f34"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><b><? echo $subject; ?></b></font></td>
</tr>



<tr>
 <td bgcolor="#ffffff"><font size=2 face="<? echo $fonttype; ?>" color="#000000"><? echo $adbody; ?></font></td>
</tr>
<tr>
  <td bgcolor="#693f34"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



<?





echo "<table align=center border='0'>";
//while($row = mysql_fetch_array($result))
  {
echo "<tr><td>";
echo "<a href=$domain/supernetworksolo.php?userid=$_SESSION[uname]&id=";
echo "" . $line3['id'] . "";
echo " target=blank>";

$query2 = "select * from supernetworksolos_viewed where userid='".$userid."' and id=".$id;
    $result2 = mysql_query ($query2)
            		or die ("Query 2 failed");
	$numrows2 = @ mysql_num_rows($result2);

    if ($numrows2 == 1) {
    	echo "</a><center>You have already received credit for this link</center>";
    } else {

if ($memtype == "FREE") {
        echo "<b>^^ Click here to view this website for ".getSuperSetting(supersoloproclick)." credits ^^</b>";
    }
elseif($memtype=="PRO")  {
         echo "<b>^^ Click here to view this website for ".getSuperSetting(supersolojvclick)." credits ^^</b>";
    }
elseif ($memtype == "SUPER JV") {
         echo "<b>^^ Click here to view this website for ".getSuperSetting(supersolosuperjvclick)." credits ^^</b>";
    }
elseif ($memtype == "PLATINUM") {
         echo "<b>^^ Click here to view this website for ".$platinumsupersoloearn." credits ^^</b>";
    }	
elseif ($memtype == "JVPARTNER") {
         echo "<b>^^ Click here to view this website for ".$jvsupersoloearn." credits ^^</b>";
    }

}



   echo "</a>";
      echo "</td></tr>";
  }
echo "</table>";


?>




</td>
</tr>

<tr><td><center><br><b>  -> -> -> -> -> -> -> -> Get More Traffic With <? echo getSuperSetting(supersitename); ?> Super Solos <- <- <- <- <- <- <- </b><br><br></center></td></tr>

 	       <?
}	

       
	        echo "</table></center>";
        
}


?>




<br><br><center>
<form id="nextad" method="POST" action="browsesupernetworksoloads.php">
	                <input type="submit" value="Next Ads"><br>
                    </form>
<span id="plzwait">Please wait <b>5</b> seconds...</span>
				  	<script type="text/javascript">
					counter = 6;
					function countdown() {
						if ((0 <= 100) || (0 > 0)) {
							counter--;
							if(counter == 0) {
								document.getElementById("nextad").style.display = 'block';
								document.getElementById("plzwait").style.display = 'none';
							}
							if(counter > 0) {
								document.getElementById("plzwait").innerHTML = 'Please wait <b>'+counter+'<\/b> seconds...';
								document.getElementById("nextad").style.display = 'none';
								setTimeout('countdown()',1000);
							}
						}
					}
					countdown();
					</script></center>
<br><br>






        <?


	}

else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>