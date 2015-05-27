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
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

        echo "<center><H2>Last 200 Solos Sent</H2></center>";
       









    $query2 = "SELECT * FROM solos where sent='1' ORDER by datesent DESC LIMIT 200";



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



	    

				$query5 = "SELECT * FROM solos where added=1 and sent=0";



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

Delete: Removes solo ad from database permanently<br>
Reset: Sends the solo ad back to queue for automatic resending 

	            <table width=70% border=0 cellpadding=2 cellspacing=2>



	            <tr>



	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>



	         

	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>

   <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Date Sent</font></center></td>
 <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Reset</font></center></td>


	            </tr>



	          <?



	          $result3 = mysql_query ($query2)



	             or die ("Query failed");



	          while ($line3 = mysql_fetch_array($result3)) {



	            $subject = $line3["subject"];

                    $sent = $line3["sent"];

                    $id = $line3["id"];

	            $adid = $line3["id"];

	            $approved = $line3["approved"];

                    $sqltimestamp = $line3["datesent"];



	            $counter = 0;







	            $query4 = "select * from clicks where adid=".$adid;



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



	                    <p><? echo $counter; ?></p></font>



	                </TD>

 <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>



	                    <p><? echo date ("Y-m-d H:i:s", $sqltimestamp); ?></p></font>



	                </TD>



  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deletesolo.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
          	</form>
          </center>
          </td>
          <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="resetsoload.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Reset">
          	</form>
          </center>
          </td>

	                


	            </TR>







	          <?



	          } //end while

} //end ($statstoshow == 1)


	          ?>



	            </TABLE>



	            </CENTER>



	   










 
	            </CENTER></td></tr></table>

	        <?


	  
        }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>