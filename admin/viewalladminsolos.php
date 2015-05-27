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

        echo "<center><H2>All admin ads in the database</H2></center>";
       









    $query2 = "SELECT * FROM adminsolos where userid='admin' and sent='1'";



	    $result2 = mysql_query ($query2)



	            or die ("Query failed");



	    $numrows2 = @ mysql_num_rows($result2);



	    if ($numrows2 == 0) {



	        ?>



	          <p>You currently do not have any admin ads in the database.</p>



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



	    

				$query5 = "SELECT * FROM adminsolos where userid='admin' and added=1 and sent=0";



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



	         

	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>


 <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>



	            </tr>



	          <?



	          $result3 = mysql_query ($query2)



	             or die ("Query failed");



	          while ($line3 = mysql_fetch_array($result3)) {



	            $subject = $line3["subject"];

                           $id = $line3["id"];

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



	                    <p><? echo $counter; ?></p></font>



	                </TD>


  <td bgcolor="<? echo $basecolour; ?>"><center>
            <form method="POST" action="deleteadminsolo.php">
          	<input type="hidden" name="id" value="<? echo $id; ?>">
           	<input type="hidden" name="done" value="NO">
          	<input type="submit" value="Delete">
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