<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

if( session_is_registered("alogin") ) {

    	?><table>

      	<tr>

        <td width="15%" valign=top><br>

        <? include("adminnavigation.php"); ?>

        </td>

        <td valign="top" align="center"><br><br> 


<?

$id = mysql_real_escape_string($_POST['id']);


if (isset($_POST['action'])) {
   $action = mysql_real_escape_string($_POST['action']);
}

		   
	    $query2 = "SELECT * FROM adminsolos where userid='".$_SESSION[aname]."'";



	    $result2 = mysql_query ($query2)



	            or die ("Query failed");



	    $numrows2 = @ mysql_num_rows($result2);



	    if ($numrows2 == 0) {



	        ?>



	          <p>You currently do not have any solo ads in our system.</p>



	        <?



	    }



	    while ($line2 = mysql_fetch_array($result2)) {



	        $soloadded = $line2["added"];







	        if ($soloadded == 0) {



	            $solostoadd = 1;



	            $solocount = $solocount+1;



	        } //end if ($added == 0)



	        else {



	            $solostatstoshow = 1;



	        } // end else



	    } //end while ($line2 = mysql_fetch_array($result2))



	    if ($solostoadd == 1) {



	     

				$query5 = "SELECT * FROM adminsolos where userid='".$_SESSION[aname]."' and added=1 and sent=0";



			    $result5 = mysql_query ($query5)



			            or die ("Query failed");



			    $numrows5 = @ mysql_num_rows($result5);



			    if ($numrows5 == 0) {



			      

			    } else {



									}



			  ?>



			  </font></p></b>



	        <?



	    }



	    if ($solostatstoshow == 1) {



	        ?>



	          

	          <CENTER>



	            <table width=70% border=0 cellpadding=2 cellspacing=2>



	            <tr>



	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>



	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Sent</font></center></td>



	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>



	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>



	            </tr>



	          <?



	          $result3 = mysql_query ($query2)



	             or die ("Query failed");



	          while ($line3 = mysql_fetch_array($result3)) {



	            $subject = $line3["subject"];



	            $sent = $line3["sent"];



	            $adid = $line3["id"];



	            $approved = $line3["approved"];



	            $counter = 0;







	            $query4 = "select * from adminclicks where adid=".$adid;



	            $result4 = mysql_query ($query4)



	                or die ("Query 4 failed");



	                while ($line4 = mysql_fetch_array($result4)) {



	                    $counter = $counter + 1;



	                }



	          ?>



	            <TR>



	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



	                    <p><? echo $subject; ?></p></font>



	                </TD>



	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



	                    <p>



	                    <? if ($sent == 1) {



	                          echo "Yes";



	                       }



	                       else {



	                          echo "Sending Soon";



	                       }



	                    ?>



	                    </p></font>



	                </TD>



	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



	                    <p><? echo $counter; ?></p></font>



	                </TD>



	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



	                    <? if ($approved == 1) {



	                          echo "Yes";



	                       }



	                       elseif ($approved == 0) {



	                          echo "Not yet";



	                       }



	                       elseif ($approved == 2) {



	                          echo "Denied *";



	                          $addnote = 1;



	                       }

}
}
	                    ?>





































		<!-- tinyMCE -->
		<script language="javascript" type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
		<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			extended_valid_elements : "a[href|target|name],font[face|size|color|style],span[class|align|style]"
		});
		</script>
		<!-- /tinyMCE --> 
<?
    if ($action == "send") {
	
	
		$subject = $_POST['subject'];
		$adbody = $_POST['adbody'];
		$url = $_POST['url'];
		
		if (empty($subject)){
       		?><p>No subject entered. Click <a href=addadminsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($adbody)){
       		?><p>No adbody entered. Click <a href=addadminsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($url)){
       		?><p>No url entered. Click <a href=addadminsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		

    	$query = "update adminsolos set subject='$subject', adbody='$adbody', added=1, approved=1, userid='admin', sent=0, url='$url',date='".time()."' where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
			
		
		
    	?>
      		<p><center>Your admin solo ad has been set up, and has been placed in the queue for sending. </center></p><BR><BR>
					
    	<?
		
		
		
		
    } 

else {
	
	

	
	//Solo available
	$query = "SELECT * FROM adminsolos where added=0 and userid='".$_SESSION[aname]."' limit 1";
	$result = mysql_query ($query)
		or die ("Query failed");
	while ($line = @mysql_fetch_array($result)) {
	
			
        $id = $line["id"];
		
			
			echo "<br><br>";
		}
		
		

            $subject = $line["subject"];
            $adbody = $line["adbody"];
            ?>
              <table width=700 border=0><tr><td>
              <center><H2>Add Admin Solo Ad</H2>
<?

$count= mysql_query("select * from adminsolos WHERE sent='0'");

    $rowcount = @ mysql_num_rows($count);

?>
<p><? echo $rowcount; ?> ads available to send.</p>



              <p> <BR>
<table width="550"><tr><td>
<b><font size=3></font></p><p align="center"><font color="#000000" face="tahoma" size="2"><b>
<font size="2"><span style="background-color: #FFFF00">DO NOT INCLUDE 
URLS IN THE BODY OF YOUR SOLO AD - ONLY PLACE THE URL IN THE CREDIT LINK BOX AT THE BOTTOM</span></font></b></font></p>
<BR><BR>You may use the tags ~fname~ for the FIRST name and ~userid~ for the USERID in the body and/or the subject line.
</td></tr></table>
<br><br>
              <form method="POST" action="addadminsolos.php">
              Subject:<br>
              <input type="text" name="subject" maxsize="70"><br>
              Ad body:<br>
              <textarea  name="adbody" cols="65" rows="30">
</textarea>
              <br>
			  Ad URL:<br>
              <input type="text" name="url" maxsize="1250"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="action" value="send">
              <p>Enter the website address you want traffic to go to above, include 
				<span style="background-color: #FFFF00">http://</span> <br>  Double check your solo ad, as it cannot be edited once submitted.</p>
				
              <input type="submit" value="Send">
              </form></center>
            <?
    	}
    
    echo "</td></tr></table></td></tr></table>";
 }
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>