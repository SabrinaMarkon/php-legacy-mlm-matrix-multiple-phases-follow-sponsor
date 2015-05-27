<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

		if ($action=="send") {

            $querysend="select * from post where id='$postid'";
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
			$adbody = "<a href=\"".$linesend["url"]."\">".$linesend["adbody"]."</a>";
			
			
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
		
		
        //first clear the database of expired ads.
        $onedayago = strtotime("-1 day");
        $querys="select * from post where posted < '".$onedayago."'";
        $results=mysql_query($querys);
        //now build the query.....

        while ($lines = mysql_fetch_array($results)) {
			$postid = $lines["postid"];

            if ($counter==0) {
                $queryv.= "delete from viewed where id=".$postid." ";
            }
            else {
                $queryv.= " and id=".$postid." ";
            }
            $counter=$counter+1;
        }
        if ($query<>"") {
            $resultv=mysql_query($queryv);
        }

        $queryd="delete from post where posted < '".$onedayago."'";
        $resultd=mysql_query($queryd);

        //then delete ads of users with no credits
        $querynil="select * from members where points<=0";
        $resultnil=mysql_query($querynil);
        $numrows = @ mysql_num_rows($resultnil);
        if ($numrows>0) {
        	//go on and delete these ads.
	        while ($linenil = mysql_fetch_array($resultnil)) {
	            $nilposter = $linenil["userid"];
                $querydelnil="delete from post where userid='".$nilposter."'";
                $resultdelnil=mysql_query($querydelnil);
            }
        }

        ?><center>
          <font size=6>Browse Text Ads</font>
        <?
   if ($memtype=="SUPER JV") {
	   echo	"<p>You will get ".$superjvreadearn." points for every website viewed.</p>";
   }
   if ($memtype=="JV Member") {
	   echo	"<p>You will get ".$jvreadearn." points for every website viewed.</p>";
   }
   else {
	   echo	"<p>You will get ".$proreadearn." points for every website viewed.</p>";
   }


            $queryviewed="select * from viewed where userid='".$userid."'";
            $resultviewed = mysql_query($queryviewed);

            $queryexclude="select * from post where";
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
            $queryexclude.= " userid<>'".$userid."' ORDER BY rand() LIMIT 3";
            $resultexclude=mysql_query($queryexclude);
            $numrows = @mysql_num_rows($resultexclude);
            if ($numrows==0) {
            	echo "<center><p><b>No more ads to view.</b></center></p>";
                $noads="TRUE";
            }
            else {
			
				$name = trim($name);
				$firstname = substr($name , 0, strpos($name, " "));
			
				$count = 0;
?>
                <center>
              	<table width=400>
                  <tr>
                    <td align="center">

<?			
	            while($linevad= mysql_fetch_array($resultexclude)) {
				
				$count++;
				
	            $adbody = str_replace("~fname~", $firstname, $linevad["adbody"]);
	            $poster = $linevad["userid"];
	            $postid = $linevad["id"];

				if($linevad['saved_id']) mysql_query("UPDATE saved_post SET hits=hits+1 WHERE id='".$linevad['saved_id']."'"); 
				

            ?> 
					
					<b>Ad #<? echo $count; ?></b><br>
                <?
					echo "<a href=\"adframe.php?id=".$postid."\" target=\"_blank\">".$adbody."</a><br>";
					?>

					<br>
					<form method="GET" action="browseads.php">
					<input type="hidden" name="action" value="send">
					<input type="hidden" name="postid" value="<? echo $postid; ?>">
					<input type="hidden" name="nextid" value=1>
					<input type="submit" value="Email me this ad"></form><br>

					<?
					

                    //add this ad to viewers list
                    $queryadtolist="insert into viewed (userid, postid) values ('$userid','$postid')";
                    $resultadtolist=mysql_query($queryadtolist);				
					
					
					}
					?>
					
					
					<?
					if($count == 3) {
					?>
					
				
	                <form id="nextad" method="POST" action="browseads.php">
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
					<?
					} else {
						echo "<center><p><b>No more ads to view.</b></center></p>";
					}
					?>
					
					
					
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