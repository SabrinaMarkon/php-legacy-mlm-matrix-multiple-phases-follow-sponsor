<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
function formatDate($val) {
	$arr = explode("-", $val);
	return date("M d Y", mktime(0,0,0, $arr[1], $arr[2], $arr[0]));
}
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
        <td  valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

        echo "<center><H2>List of pending ads</H2></center>";

$querysolos = "select * from adminsolos where sent=0 and added=1 and approved=1";
		$resultsolos = mysql_query ($querysolos)
	     	or die ("Query failed");
        $numrowssolos = @ mysql_num_rows($resultsolos);
        if ($numrowssolos == 0) {
        	echo "<p><center>No admin ads waiting to be sent.</p></center>";
        }
        else {
         	?>
              <p><font color="red"><center>There are <? echo $numrowssolos; ?> admin ad(s) waiting to be sent, <a href="sendadminsolos.php" target="_blank">click here</a> to send one now!</center></p></font>

<?
}

        $querysolos = "select * from solos where sent=0 and added=1 and approved=1";
		$resultsolos = mysql_query ($querysolos)
	     	or die ("Query failed");
        $numrowssolos = @ mysql_num_rows($resultsolos);
        if ($numrowssolos == 0) {
        	echo "<p><center>No solo ads waiting to be sent.</center>";
        }
        else {
         	?>
              <p><font color="red"><center>There are <? echo $numrowssolos; ?> solo ad(s) waiting to be sent, <a href="sendsolos.php" target="_blank">click here</a> to send one now!</center></p></font>
            <?
        }

//surf
        $query = "select * from surfurls where approved =0";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	echo "<p><center>No Surf Pages awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of Surf pages awaiting approval.</p>";
        	?>
			 <form action="approvesurf.php" method=POST name=surfpage>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	          	        <?
	        while ($line = mysql_fetch_array($result)) {
	            $id = $line["id"];
	            $surfurl = $line["surfurl"];
	            $surfname = $line["surfname"];
	            $surfpoint = $line["surfpoint"];
	            $userid = $line["userid"];

	        ?>

			 	<input type="hidden" name="currentpoints_<? echo $id; ?>" value="<? echo $surfpoint; ?>">
			 	<input type="hidden" name="currentuserid_<? echo $id; ?>" value="<? echo $userid; ?>">

<tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>		          
			<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<center>Userid: <a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center>
<br>
  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><br>Surf Name: <? echo $surfname; ?><br>Surf URL: <a href="sitecheck.php?url=<? echo $surfurl; ?>" target="_blank"><? echo $surfurl; ?></a>
  <br>Surf Credits: <? echo $surfpoint; ?>
  </font></center><br><br>
<br>
<center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="email.php?Member=<? echo $userid; ?>" class="button" target="_blank" onmouseover="window.status='Email Member';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Email Member&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>

<center>
<b>==================================<br>
 <center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="editsurfpage.php?id=<? echo $id; ?>" class="button" target="_blank" onmouseover="window.status='Edit Surf Page';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Edit Surf Page&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>
		
        
</td>
<tr>
<td>&nbsp;</td>    
</tr>



     

				       
  
</tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.surfpage);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }



        $query = "select * from banners where status=0 and added=1";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	echo "<p><center>No banners awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of banners awaiting approval.</p>";
        	?>
			 <form action="approvebanner.php" method=POST name=banner>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	          	        <?
	        while ($line = mysql_fetch_array($result)) {
	            $id = $line["id"];
	            $bannerurl = $line["bannerurl"];
	            $targeturl = $line["targeturl"];
	            $userid = $line["userid"];

	        ?>


<tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>		          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<center>Userid: <a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center>
<br>
  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><img src="<? echo $bannerurl; ?>"><br>Banner Url: <? echo $bannerurl; ?><br>Banner Link: <a href="sitecheck.php?url=<? echo $targeturl; ?>" target="_blank"><? echo $targeturl; ?></a></font></center><br><br>
<center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center>
<br>
<center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="email.php?Member=<? echo $userid; ?>" class="button" target="_blank" onmouseover="window.status='Email Member';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Email Member&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>

<center>
<b>==================================<br>
 <center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="editbanner.php?id=<? echo $id; ?>" class="button" target="_blank" onmouseover="window.status='Edit Banner';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Edit Banner&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>
		
        
</td>
<tr>
<td>&nbsp;</td>    
</tr>



     

				       
  
</tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.banner);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }



$query = "select * from buttons where status=0 and added=1";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	echo "<p><center>No buttons banners awaiting approval.</p></center>";
       } 
        else {
            echo "<p><center>List of <font color=#000000>BUTTON BANNERS</font> awaiting approval.</p>";
        	?>
			 <form action="approvebuttons.php" method=POST name=button>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	           	        <?
	        while ($line = mysql_fetch_array($result)) {
	            $id = $line["id"];
	            $bannerurl = $line["bannerurl"];
	            $targeturl = $line["targeturl"];
	            $userid = $line["userid"];

	        ?>
<tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>		          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<center>Userid: <a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center>
<br>
  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><img src="<? echo $bannerurl; ?>"><br>Banner Url: <? echo $bannerurl; ?><br>Banner Link: <a href="sitecheck.php?url=<? echo $targeturl; ?>" target="_blank"><? echo $targeturl; ?></a></font></center><br><br>
<center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center>
<br>
<center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="email.php?Member=<? echo $userid; ?>" class="button" target="_blank" onmouseover="window.status='Email Member';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Email Member&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>

<center>
<b>==================================<br>
 <center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="editbutton.php?id=<? echo $id; ?>" class="button" target="_blank" onmouseover="window.status='Edit Button Banner';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Edit Button Banner&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>
		
        
</td>
<tr>
<td>&nbsp;</td>    
</tr>



     

				       
  
</tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.button);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }

$query3 = "select * from hotlinks where approved=0 and added=1 order by date ASC";
        $result3 = mysql_query ($query3)
            or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
            echo "<p><center>No hot link awaiting approval.</center></p>";

        }

        else {

            echo "<p><center>List of hot links awaiting approval.</p>";

	        ?>
                <form action="approvehotlink.php" method=POST name=hotlink>
	            <table width=70% border=1 cellpadding=2 cellspacing=2>

	            <tr>
                  <td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Username</font></center></td>
                  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Subject</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
                  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Approve</font></center></td>

	            </tr>

	        <?

	        while ($line3 = mysql_fetch_array($result3)) {

	            $id = $line3["id"];
				
				$userid = $line3["userid"];

                $subject = $line3["subject"];

	            $url = $line3["url"];
				
				$date= $line3[".time()."];

	        ?><tr>

	          <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td></center></td>

	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $userid; ?></font></center></td>
			  
			  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>

			  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
			  
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>
			  
			  </center>
              </td></tr> <?
             
	        }
                echo '</table><input type="button" onClick="return Inverse(document.hotlink);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';		
		}

     
        $query3 = "select * from tlinks where approved=0 and added=1";
	     $result3 = mysql_query ($query3) or die ("Query failed");

        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	  echo "<p><center>No traffic link ads awaiting approval.</center></p>";
        }
        else {
            echo "<p><center>List of traffic link ads awaiting approval.</p>";
	        ?>
				<form action="approvetlink.php" method=POST name=traffic>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Paid Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
               $subject = $line3["subject"];
               $paid = $line3["paid"];
	            $url = $line3["url"];

	        ?><tr>
			  <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $paid; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
			  
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>

			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.traffic);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        } 
		
	         $query3 = "select * from ptcads where approved=0 and added=1";
	     $result3 = mysql_query ($query3) or die ("Query failed");

        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	  echo "<p><center>No ptc link ads awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of ptc link ads awaiting approval.</p>";
	        ?>
				<form action="approveptclink.php" method=POST name=ptc>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Paid Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
               $subject = $line3["subject"];
               $paid = $line3["paid"];
	            $url = $line3["url"];

	        ?><tr>
			  <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $paid; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
			  
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>

			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.ptc);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        } 
	
		$query3 = "select * from topnav where status=0 and added=1";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	echo "<p><center>No top navigation link awaiting approval.</center>";
        }
        else {
            echo "<p><center>List of top navigation links awaiting approval.</p>";
	        ?>
			    <form action="approvetopnav.php" method=POST name=topnav>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Name</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Target Url</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
                $subject = $line3["name"];
	            $targeturl = $line3["targeturl"];

	        ?><tr>
			  <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $userid; ?></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $targeturl; ?>" target="_blank"><? echo $targeturl; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>
			  
			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.topnav);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
		}

$query3 = "select * from botnav where status=0 and added=1";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	echo "<p><center>No bottom navigation link awaiting approval.</center>";
        }
        else {
            echo "<p><center>List of bottom navigation links awaiting approval.</p>";
	        ?>
			    <form action="approvebotnav.php" method=POST name=botnav>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Name</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Target Url</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
                $subject = $line3["name"];
	            $targeturl = $line3["targeturl"];

	        ?><tr>
			  <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $userid; ?></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $targeturl; ?>" target="_blank"><? echo $targeturl; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>
			  
			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.botnav);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
		}


		
		$query3 = "select * from footerads where approved=0 and added=1";
	     $result3 = mysql_query ($query3) or die ("Query failed");

        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	  echo "<p><center>No paid solo footer ads awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of solo footer ads awaiting approval.</p>";
	        ?>
				<form action="approvefooterad.php" method=POST name=footerad>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Paid Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
               $subject = $line3["subject"];
               $paid = $line3["paid"];
	            $url = $line3["url"];

	        ?><tr>
			  <td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $paid; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
			  
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>

			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.footerad);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        } 
		
		$query3 = "select * from loginads where approved=0 and added=1";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	echo "<p><center>No login ads awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of login ads awaiting approval.</p>";
	        ?>
				<form action="approvelogin.php" method=POST name=login>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Ad body</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Approve</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
                $subject = $line3["adbody"];

	        ?><tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $userid; ?></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $subject; ?></font></center></td>
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
				<a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>
			  
			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.login);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
		}
#############################################################################################
     $query3 = "select * from fullloginads where approved=0 and added=1";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	echo "<p><center>No Full Page Login Ads awaiting approval.</center></p>";
        }
        else {
            echo "<p><center>List of Full Page Login Ads awaiting approval.</center></p>";
	        ?>
	            <form action="approvefullloginad.php" method=POST name=fullloginad>
	            <table width=80% border=0 cellpadding=2 cellspacing=2>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Rent Date</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Order Date</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Approve</font></center></td>
	            </tr>
	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
                $date = $line3["rented"];
	            $url = $line3["url"];
				$purchase = $line3["purchase"];
				$purchasedate = formatDate($purchase);
	        ?><tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>
	          
			  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center></td>

			  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center></td>
			  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $date; ?></font></center></td>
			<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $purchasedate; ?></font></center></td>			  
	          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
			  <a href="email.php?Member=<? echo $userid; ?>" target="_blank">Email user</a>
			  
			  </center>
	          </td></tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.fullloginad);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }
##############################################################
        $query = "select * from featuredads where approved=0 and added=1";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	 echo "<p><center>No Featured Ads awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of Featured Ads awaiting approval.</p>";
	        ?>
<form action="approvefeaturedad.php" method=POST name=featuredad>
<table width="80%" border="1" cellpadding="2" cellspacing="0" style="border: 1px solid #000000;">
<tr>
<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Heading</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Highlight Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Description</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Max Impressions</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
</tr>
<?
while ($featuredadrowz = mysql_fetch_array($result))
{
$featuredadid = $featuredadrowz["id"];
$featuredaduserid = $featuredadrowz["userid"];
$featuredadurl = $featuredadrowz["url"];
$featuredadheading = $featuredadrowz["heading"];
$featuredadheading = stripslashes($featuredadheading);
$featuredadheadinghighlight = $featuredadrowz["headinghighlight"];
$featuredaddescription = $featuredadrowz["description"];
$featuredaddescription = stripslashes($featuredaddescription);
$featuredaddescription = trim($featuredaddescription);
$featuredaddescription = nl2br($featuredaddescription);
$featuredadapproved = $featuredadrowz["approved"];
$featuredadviews = $featuredadrowz["views"];
$featuredadclicks = $featuredadrowz["clicks"];
$featuredadmax = $featuredadrowz["max"];
$featuredadpurchase = $featuredadrowz["purchase"];
$featuredadpurchase = formatDate($featuredadpurchase);
?>
<tr>
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="checkbox" name="id[]" value="<? echo $featuredadid; ?>"></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $featuredaduserid; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $featuredadheading; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><div style="background: <?php echo $featuredadheadinghighlight ?>;  color: <?php echo $featuredadheadingfontcolor ?>; font-size: <?php echo $featuredadheadingfontsize ?>; font-family: '<?php echo $featuredadheadingfontface ?>'; border: 1px solid <?php echo $featuredadheadingbordercolor ?>;"><center><? echo $featuredadheadinghighlight; ?></div></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $featuredadurl; ?>" target="_blank"><? echo $featuredadurl; ?></a></font></center></td>
<td bgcolor="<? echo $basecolour; ?>" align="center">
<div style="width: 150px; height: 150px; padding: 4px; overflow:auto; border: solid 1px <?php echo $featuredaddescbordercolor ?>; background: <?php echo $featuredaddescbgcolor ?>; color: <?php echo $featuredaddescfontcolor ?>; font-size: <?php echo $featuredaddescfontsize ?>; font-family: '<?php echo $featuredaddescfontface ?>';" align="left"><? echo $featuredaddescription; ?></div></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $featuredadmax; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<a href="email.php?Member=<? echo $featuredaduserid; ?>" target="_blank">Email user</a>
</center>
</td></tr>
<?
}
	        echo '</table><input type="button" onClick="return Inverse(document.featuredad);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }
#############################################################################################
$query = "select * from hheadlineads where approved=0 and added=1";
$result = mysql_query ($query) or die (mysql_error());
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	 echo "<p><center>No Hot Headline Adz awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of Hot Headline Adz awaiting approval.</p>";
	        ?>
<form action="approvehheadlinead.php" method=POST name=hheadlinead>
<table width="80%" border="1" cellpadding="2" cellspacing="0" style="border: 1px solid #000000;">
<tr>
<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Subject</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Background Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Text Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Max Clicks</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
</tr>
<?
while ($hheadlineadrowz = mysql_fetch_array($result))
{
$hheadlineadid = $hheadlineadrowz["id"];
$hheadlineaduserid = $hheadlineadrowz["userid"];
$hheadlineadurl = $hheadlineadrowz["url"];
$hheadlineadtitle = $hheadlineadrowz["title"];
$hheadlineadcolor = $hheadlineadrowz["color"];
$hheadlineadbgcolor = $hheadlineadrowz["bgcolor"];
$hheadlineadclicks = $hheadlineadrowz["clicks"];
$hheadlineadmax = $hheadlineadrowz["max"];
$hheadlineadpurchase = $hheadlineadrowz["purchase"];
$hheadlineadpurchase = formatDate($hheadlineadpurchase);
?>
<tr>
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="checkbox" name="id[]" value="<? echo $hheadlineadid; ?>"></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheadlineaduserid; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheadlineadtitle; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $hheadlineadurl; ?>" target="_blank"><? echo $hheadlineadurl; ?></a></font></center></td>
<td bgcolor="<? echo $hheadlineadbgcolor; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheadlineadbgcolor; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $hheadlineadcolor; ?>"><center><? echo $hheadlineadcolor; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheadlineadmax; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<a href="email.php?Member=<? echo $hheadlineaduserid; ?>" target="_blank">Email user</a>
</center>
</td></tr>
<?
}
	        echo '</table><input type="button" onClick="return Inverse(document.hheadlinead);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }
#############################################################################################
        $query = "select * from hheaderads where approved=0 and added=1";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        $numrows = @ mysql_num_rows($result);
        if ($numrows == 0) {
        	 echo "<p><center>No Hot Header Ads awaiting approval.</p></center>";
        }
        else {
            echo "<p><center>List of Hot Header Ads awaiting approval.</p>";
	        ?>
<form action="approvehheaderad.php" method=POST name=hheaderad>
<table width="80%" border="1" cellpadding="2" cellspacing="0" style="border: 1px solid #000000;">
<tr>
<td bgcolor="<? echo $contrastcolour; ?>">&nbsp;</td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Userid</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Heading</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Header Text Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>URL</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Banner</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Description</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Description Text Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Background Color</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Max Clicks</font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Email</font></center></td>
</tr>
<?
while ($hheaderadrowz = mysql_fetch_array($result))
{
$hheaderadid = $hheaderadrowz["id"];
$hheaderaduserid = $hheaderadrowz["userid"];
$hheaderadurl = $hheaderadrowz["url"];
$hheaderadbanner = $hheaderadrowz["banner"];
$hheaderadheading = $hheaderadrowz["heading"];
$hheaderadheadingfontcolor = $hheaderadrowz["headingfontcolor"];
$hheaderadbgcolor = $hheaderadrowz["bgcolor"];
$hheaderaddescription = $hheaderadrowz["description"];
$hheaderaddescriptionfontcolor = $hheaderadrowz["descriptionfontcolor"];
$hheaderadapproved = $hheaderadrowz["approved"];
$hheaderadviews = $hheaderadrowz["views"];
$hheaderadclicks = $hheaderadrowz["clicks"];
$hheaderadmax = $hheaderadrowz["max"];
$hheaderadpurchase = $hheaderadrowz["purchase"];
$hheaderadpurchase = formatDate($hheaderadpurchase);
?>
<tr>
<td bgcolor="<? echo $basecolour; ?>" align="center"><input type="checkbox" name="id[]" value="<? echo $hheaderadid; ?>"></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheaderaduserid; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheaderadheading; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $hheaderadheadingfontcolor; ?>"><center><? echo $hheaderadheadingfontcolor; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $hheaderadurl; ?>" target="_blank"><? echo $hheaderadurl; ?></a></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="sitecheck.php?url=<? echo $hheaderadurl; ?>" target="_blank"><img src="<?php echo $hheaderadbanner ?>" border="0" width="200"></a></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheaderaddescription; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $hheaderaddescriptionfontcolor; ?>"><center><? echo $hheaderaddescriptionfontcolor; ?></font></center></td>
<td bgcolor="<? echo $hheaderadbgcolor; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheaderadbgcolor; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $hheaderadmax; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
<a href="email.php?Member=<? echo $hheaderaduserid; ?>" target="_blank">Email user</a>
</center>
</td></tr>
<?
}
	        echo '</table><input type="button" onClick="return Inverse(document.hheaderad);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }
#############################################################################################		

   $query3 = "select * from solos where approved=0 and added=1";
		$result3 = mysql_query ($query3)
	     	or die ("Query failed");
        $numrows3 = @ mysql_num_rows($result3);
        if ($numrows3 == 0) {
        	echo "<p><center>No solo ads awaiting approval.</center>";
        }
        else {
            echo "<p><center>List of soloads awaiting approval.</p>";
	        ?>
			    <form action="approvesolo.php" method=POST name=solo>
	            <table width=85% border=0 cellpadding=2 cellspacing=2>
	          	        <?
	        while ($line3 = mysql_fetch_array($result3)) {
	            $id = $line3["id"];
	            $userid = $line3["userid"];
                $subject = $line3["subject"];
	            $adbody = $line3["adbody"];
	            $url = $line3["url"];

	        ?>
<tr>
			<td bgcolor="<? echo $basecolour; ?>"><input type="checkbox" name="id[]" value="<? echo $id; ?>"></td>		          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
<center>Userid: <a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></a></center>
<br>
<center>Date Submitted: <? echo date("Y-m-d G:i", $line3["date"]); ?></font></center>
<br>
<center>Subject: <? echo $subject; ?></center>
<br>
<center><? echo $adbody; ?></center>
<br>
<center><a href="sitecheck.php?url=<? echo $url; ?>" target="_blank"><? echo $url; ?></a></font></center>
<br>
<center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="email.php?Member=<? echo $userid; ?>" class="button" target="_blank" onmouseover="window.status='Email Member';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Email Member&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>

<center>
<b>==================================<br>
 <center><table border=1 cellpadding=0 cellspacing=0 width=155 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="editsolo.php?id=<? echo $id; ?>" class="button" target="_blank" onmouseover="window.status='Edit Solo';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;Edit Solo&nbsp;&nbsp;&nbsp;</font></a></td></tr></table></center>
		
        
</td>
<tr>
<td>&nbsp;</td>    
</tr> <?
	        }
	        echo '</table><input type="button" onClick="return Inverse(document.solo);" value="Inverse"><input type="submit" name="submit" value="Approve"><input type="submit" name="submit" value="Delete"></form></center>';
        }	
 echo "</td></tr></table>";
  }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>