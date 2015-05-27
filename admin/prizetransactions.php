<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {

    	?>

<script language="JavaScript">
 function Inverse(form)
   {
    len = form.elements.length;
    var i=0;
    for( i=0; i<len; i++)
    {
     if (form.elements[i].type=='checkbox' )
     {
      form.elements[i].checked = !form.elements[i].checked;
     }
    }
	return false;
   }		
</script>
<table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='#000000'><p><b><center>";

       echo "<center><H2>Automated Prize Transactions</H2></center>";
        $query = "select * from prizetrans ORDER by date DESC";
		$result = mysql_query ($query)
	     	or die ("Query failed");




        ?>
 <form action="deleteprizetransactions.php" method=POST name=prize>
            <center><table width=70% border=0 cellpadding=2 cellspacing=2 bgcolor="#000000">
        	<tr>
<td bgcolor="#000000"><center><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF"></font></center></td>
<td bgcolor="#000000"><center><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF">ID</font></center></td>
	                       <td bgcolor="#000000"><center><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF">Userid</font></center></td>
              <td bgcolor="#000000"><center><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF">Transaction</font></center></td>
             	          <td bgcolor="#000000"><center><font size=2 face="<? echo $fonttype; ?>" color="#FFFFFF">Date</font></center></td>
 
             	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
            $userid = $line["userid"];
            $action = $line["action"];
            $sqltimestamp = $line["date"];
            $quantity = $line["quantity"];




                   ?><tr>
<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
 <td bgcolor="#FFFFCC"><center><font size=2 face="<? echo $fonttype; ?>" color="#000000"><? echo $id; ?></font></center></td>
          <td bgcolor="#FFFFCC"><center><font size=2 face="<? echo $fonttype; ?>" color="#000000"><? echo $userid; ?></font></center></td>
        <td bgcolor="#FFFFCC"><center><font size=2 face="<? echo $fonttype; ?>" color="#000000"><? echo $action; ?></font></center></td>        
<td bgcolor="#FFFFCC"><center><font size=2 face="<? echo $fonttype; ?>" color="#000000"><? echo date ("Y-m-d H:i:s", $sqltimestamp); ?></font></center></td>
          
    


                 </td></tr> <?
        }
     echo '</table><input type="button" onClick="return Inverse(document.paytrans);" value="Inverse"><input type="submit" name="submit" value="Delete"></form></center>';
               echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>