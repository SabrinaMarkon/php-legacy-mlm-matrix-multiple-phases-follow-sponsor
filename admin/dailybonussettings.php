<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
           <td valign="top" align="center" ><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    if ($action=="save") {
        

        $update=mysql_query("update settings set setting='$bonusurlp' where name='bonusurl'");
	$update=mysql_query("update settings set setting='$bonusminp' where name='bonusmin'");
	$update=mysql_query("update settings set setting='$bonusmaxp' where name='bonusmax'");
	$update=mysql_query("update settings set setting='$dailybonuspricep' where name='dailybonusprice'");





                echo "<p><b>Your settings have been saved.</b></p>";
    }
    else {
    ?>
<table width="700" align="center"><tr><td>
       <div align=center><H2>Daily Bonus Settings</H2></div>
            <form method="POST" action="dailybonussettings.php">
       <input type="hidden" name="action" value="save">
           
               
        
              <center>
       <hr>
       
         
               
       <p align="left">
 Daily bonus link: &nbsp;<input type="text" name="bonusurlp" size="50" value="<? echo $bonusurl; ?>"><br>
Enter the default url that will display if no daily links have been purchased. <br><br>
  Price per Daily Bonus Link&nbsp;<input type="text" name="dailybonuspricep" value="<? echo $dailybonusprice; ?>"> <br><br>

   Daily bonus points range<br>

       Min: <input type="text" name="bonusminp" value="<? echo $bonusmin; ?>"><br>
		Max: <input type="text" name="bonusmaxp" value="<? echo $bonusmax; ?>"> <br><br>

         </p>

 
       <input type="submit" value=" Save Settings ">
       </form></center>


    


    <? }

 echo "<center><H2>All Active Bonus links in the database</H2></center>";
        $query = "select * from dailybonus WHERE approved=1 ORDER by rented";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
            <center><table width=70% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	      <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Date</font></center></td>
	      <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
		$userid = $line["userid"];
                $url = $line["url"];
		$date = $line["rented"];
                $approved = $line["approved"];
                $clicks = $line["clicks"];
                
            if ($sent=="1") {
            	$sent="Yes";
            }
            else {
            	$sent="No";
            }
            if ($approved=="1") {
            	$approved="Yes";
            }
            else {
            	$approved="No";
            }
            if ($added=="1") {
            	$added="Yes";
            }
            else {
            	$added="No";
            }
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $date; ?></font></center></td>
	  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $approved; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $clicks; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deletebonus.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
          	</form>
          </center>
          <?
               
       }

echo "</td></tr></table></td></tr></table></td></tr></table>";
}
   
else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>