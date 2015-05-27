<?php

session_start();


include "../header.php";
include "../config.php";
include "../style.php";

$adid = mysql_real_escape_string($_GET['adid']);
$seed = mysql_real_escape_string($_GET['seed']);

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");

		


     $query3 = "select * from adminsolos where approved=1 and sent=1 ORDER by datesent DESC LIMIT 10";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);

        if ($numrows3 == 0) {
        	echo "<p><center>No Emails to View.</p></center>";
        }
        else {
            echo "<p><center><H2>View The Last 10 Admin Emails Sent</H2></p>";
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

$adbody = str_replace("~fname~", $name, $line3["adbody"]);
$adbody = str_replace("~userid~",$userid,$adbody);
$subject = str_replace("~userid~",$userid,$subject);
$subject = str_replace("~fname~",$name,$subject);
  


	        ?>



	            <tr>


 <td bgcolor="#000099"><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF"><b><? echo $subject; ?></b></font></td>
</tr>



<tr>
 <td bgcolor="#99CCFF"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $adbody; ?></font></td>
</tr>
<tr>
  <td bgcolor="#FFFFFF"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">



<?



$result = mysql_query("SELECT * FROM adminlinks where adid=".$id." LIMIT 1");

echo "<table align=center border='0'>
";while($row = mysql_fetch_array($result))
  {
  echo "<tr><td>";
echo "<a href=$domain/adminclicks.php?userid=$_SESSION[uname]&seed=";
echo "" . $row['number'] . "";
echo "&id=$id target=NEW>";
if ($memtype == "PRO") {
        echo "<b>Click here to receive ".$adminproclickearn." credits</b>";
    } elseif($memtype == "JV Member") {
        echo "<b>Click here to receive ".$adminjvclickearn." credits</b>";
    }
    else {
         echo "<b>Click here to receive ".$adminsuperjvclickearn." credits</b>";
    }
echo "</a>";
      echo "</td></tr>";
  }
echo "</table>";


?>




</td>
</tr>

<tr><td><center><br><br>=============================================================<br><br><br></center></td></tr>

 	       <?
}	

       
	        echo "</table></center>" ;
        
}


?>


<?
include("../banners2.php");
?>






        <?

        echo "</td></tr></table>";

	}

else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>