<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

		if ($action=="send") {

            $querysend="select * from post_html where id='$postid'";
            $resultsend= mysql_query($querysend);
        	$numrows = @ mysql_num_rows($resultsend);
        	if ($numrows>0) {
	        	$linesend = mysql_fetch_array($resultsend);
            }
	        $headers .= "From: $sitename<$adminemail>\n";
	        $headers .= "Reply-To: <$adminemail>\n";
	        $headers .= "X-Sender: <$adminemail>\n";
	        $headers .= "X-Mailer: PHP4\n";
	        $headers .= "X-Priority: 3\n";
	        $headers .= "Return-Path: <$adminemail>\n";
			$adbody = "".$linesend["adbody"]."<a href=\"".$linesend["url"]."\" target=\"_blank\">Click Here To Visit The Site</a>";
			
			
                $headers .= "MIME-Version: 1.0\r\n";
			    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	            $adbody .= "<br><hr>";
	            $adbody .= "<p>This is an ad you have requested to be forwarded to you from ".$sitename.". You are receivng this because you are a member of ".$sitename.".</p>";
	            $adbody .= "<p>Login: ".$domain."<br>";
	            $adbody .= "Your Userid: ".$userid."<br>";
	            $adbody .= "Your Password: ".$password."</p>";
				$adbody .= "$adminname, $sitename, $adminaddress\n";

			@mail($contact_email, $linesend["adbody"], $adbody,$headers);

  	             ?><form method="GET" action="browseads.php">
                 <input type="hidden" name="nextid" value=1>
	             <input type="submit" value="Next Ad"><br>
                 </form> <?
            echo "<p><center>Ad sent to '$contact_email'</center></p>";
            echo "</center></font></td></tr></table>";
            include "../footer.php";
            exit;
        }
        ?><center>
          <font size=6>Browse Html Ads</font>
        <?
          if ($memtype=="PRO") {
           	   echo	"<p>You will get ".$prohtmlearn." points for every website viewed.</p>";
           }
           elseif ($memtype=="JV Member"){
               echo	"<p>You will get ".$jvhtmlearn." points for every website viewed.</p>";
           }
		   elseif ($memtype=="SUPER JV"){
               echo	"<p>You will get ".$superjvhtmlearn." points for every website viewed.</p>";
           }

            $queryviewed="select * from viewed_html where userid='".$userid."'";
            $resultviewed = mysql_query($queryviewed);

            $queryexclude="select * from post_html where";
            while ($lineviewed = mysql_fetch_array($resultviewed)) {
                $postid = $lineviewed["postid"];
                if ($counter==0) {
                    $queryexclude.= " id<>".$postid." and";
                }
                else {
                    $queryexclude.= " id<>".$postid." and";
                }
                $counter=$counter+1;
            }
            $queryexclude.= " userid<>'".$userid."' ORDER BY rand() LIMIT 1";
            $resultexclude=mysql_query($queryexclude);
            $numrows = @mysql_num_rows($resultexclude);
            if ($numrows==0) {
            	echo "<center><p><b>No more ads to view.</b></center></p>";
                $noads="TRUE";
            }
            else {
			
				$name = trim($name);
				$firstname = substr($name , 0, strpos($name, " "));

?>
                <center>
              	<table width=600>
                  <tr>
                    <td align="center">
					
					<div style="width: 600px; overflow: hidden;">

<?			
	            while($linevad= mysql_fetch_array($resultexclude)) {

				
	            $adbody = str_replace("~fname~", $firstname, $linevad["adbody"]);
	            $poster = $linevad["userid"];
	            $postid = $linevad["id"];

				if($linevad['saved_id']) mysql_query("UPDATE saved_html SET hits=hits+1 WHERE id='".$linevad['saved_id']."'"); 
				

            ?> 
			
                <?
					echo "".$adbody."<br><br><a href=\"adframe_html.php?id=".$postid."\" target=\"_blank\">Click Here To Visit The Site</a><br>";
					?>

					<br>
					<form method="GET">
					<input type="hidden" name="action" value="send">
					<input type="hidden" name="postid" value="<? echo $postid; ?>">
					<input type="hidden" name="nextid" value=1>
					<input type="submit" value="Email me this ad"></form><br>

					<?
					

                    //add this ad to viewers list
                    $queryadtolist="insert into viewed_html (userid, postid) values ('$userid','$postid')";
                    $resultadtolist=mysql_query($queryadtolist);				
					
					
					}
					?>
					
			
					
				
	                <form id="nextad" method="POST">
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
					</script>
					
					</div>

                    <br>
                	</td>
                   </tr>
                </table>
                <center>
            <?
        	}
			
    	echo "</center></font></td></tr></table>";
 	}

else
  { ?>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include "../footer.php";
mysql_close($dblink);
?>