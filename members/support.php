<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") ) {

	include "navigation.php";
    include "../banners2.php";
    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
if($action == " Send Support Request ") {
	$timesubmitted=date("Y-m-d H:i:s<br>");
	$top = "Hello,\n\nYou have a new support ticket from ~fullname~, userid ~userid~.  Please visit your administrative area to view the ticket here:\n~domain~/admin\n\n~sitename~ Automated Message Center\n\n======================================\nSubject and Message Follows:\n\n";
	$adminmsg="$top"."$subj"."\n\n"."$mesg"."\n";
    $query="insert into support (memberid,category,subj,mesg,timesubmitted,ticketstatus,membertype,lastreply,type,span) VALUES ('$userid','$category','$subj','$mesg','$timesubmitted','Open','member','$timesubmitted','new','1')";

	$result = MYSQL_QUERY($query);
    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
	echo"<p><center>Thank You for your request.<br>You will receive a response as quickly as possible.</center></p>";
    ?> <center><p><a href="support.php">Click here</a> to go back.</p></center> <?

	$mquery="select * from emails where title='newticket'";
	     $mresult=mysql_query($mquery);
	     $num_rows = mysql_num_rows($mresult);

     	$x=0;
	    $id=mysql_result($mresult,$x,"id");
	    $title=mysql_result($mresult,$x,"title");
	    $subject=mysql_result($mresult,$x,"subject");
	    $message=mysql_result($mresult,$x,"message");

	    $subject = stripslashes($subject);
	    $subject = str_replace("\"", "%quotes%", $subject);
	    $subject = str_replace("~firstname~", "$name", $subject);

	    $message = stripslashes($message);
	    $message = str_replace("\"", "%quotes%", $message);
	    $message = str_replace("~fullname~", "$name", $message);
	    $message = str_replace("~sitename~", "$sitename", $message);

	    $from = $sitename;
	    $from_address = $adminemail;
                    $new_contact = $contact_email;
	    $headers = "From: \"$from\" <$from_address>\n" .
	               "Content-Type: text/plain;\n";
                    $headers .= "X-Sender: <$adminemail>\n";
	    $headers .= "X-Mailer: PHP4\n";
	    $headers .= "X-Priority: 3\n";
	                "Return-Path: $from_address\n";
	   mail($new_contact, $subject, $message,"From: $from <$from_address>", "-f $from_address")
	            or print "";


	    $subject =  "New Support Request";
	    $subject = stripslashes($subject);
	    $subject = str_replace("\"", "%quotes%", $subject);

	    $adminmsg = stripslashes($adminmsg);
	    $adminmsg = str_replace("~domain~", "$domain", $adminmsg);
	    $adminmsg = str_replace("~sitename~", "$sitename", $adminmsg);
	    $adminmsg = str_replace("~subdomain~", "", $adminmsg);
	    $adminmsg = str_replace("~fullname~", "$name", $adminmsg);
	    $adminmsg = str_replace("~userid~", "$userid", $adminmsg);

	$from = $sitename;
	$from_address = $adminemail;
	$headers = "From: \"$from\" <$from_address>\n" .
	           "MIME-Version: 1.0\n" .
	           "Content-Type: text/plain\n" .
	            "Return-Path: $from_address\n";
	mail($adminemail, $subject, $adminmsg,"From: $from <$from_address>", "-f $from_address")
	or print "";

	}elseif($action=="view closed tickets") {
	echo"      <p align=\"center\"><p align=\"center\"><br>";
	if ($sortby!="")
	{
	        $sorted = " order by $sortby ";
	}
	$bareQuery = "select * from support where memberid = '$userid' and type = 'new' and ticketstatus = 'Closed'";
	$queryall = $bareQuery.$sorted;
	$resultall = MYSQL_QUERY($queryall);
	$numberall = mysql_num_rows($resultall);

	if ($numberall==0) {

	    echo "<center><p>You Have No Closed Support Requests</p></center>";
        ?> <center><p><a href="support.php">Click here</a> to go back.</p></center> <?

	}
	else if ($numberall>0) {

	$x=0;




	echo"<H2><b><center>Open Support Requests</center></p></b></H2>";
	echo"<p>";
	echo"      <div align=\"center\">";
	echo"        <center>";
	echo"        <table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"85%\">";
	echo"          <tr>";
	echo"            <td width=\"100%\">   ";
	echo"            <div align=\"center\">";
	echo"              <center>";
	echo"<table border=0 cellspacing=3 cellpadding=5 style=\"border-collapse: collapse\" bordercolor=\"#111111\">";
	echo"    <tr>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Ticket ID</font></b></td>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Subject</b>/font</td>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Status</b></font></td>";
	echo"    <td></td>";




	echo"    </tr><br><br>";

	        while ($x<$numberall)
	        {

	            // Changing Background color for each alternate row
	            if (($x%2)==0) { $bgcolor="#E1E1E1"; } else { $bgcolor="#F8F8F8"; }



	            // Retreiving data and putting it in local variables for each row
	            $tid=mysql_result($resultall,$x,"id");
	            $memberid=mysql_result($resultall,$x,"memberid");
	            $category=mysql_result($resultall,$x,"category");
	            $subj=mysql_result($resultall,$x,"subj");
	            $mesg=mysql_result($resultall,$x,"mesg");
	            $timesubmitted=mysql_result($resultall,$x,"timesubmitted");
	            $ticketstatus=mysql_result($resultall,$x,"ticketstatus");


	echo"         <tr bgcolor=\"$bgcolor\" height=20>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $tid&nbsp;</font></td>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $subj&nbsp;</font></td>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $ticketstatus&nbsp;</font></td>";
	echo"            <td><form method=\"post\"><input type=\"submit\" value=\"View\" class=\"form-button\"><input type=\"hidden\" name=\"action\" value=\"view ticket\"><input type=\"hidden\" name=\"page\" value=\"support\"><input type=\"hidden\" name=\"tid\" value=\"$tid\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"password\" value=\"$ckpassword\"></form></td>";
	echo"        </tr>";

	        $x++;
	    } // end while

	echo"</table></center>";
	echo"            </div>";
	echo"            </td>";
	echo"          </tr>";
	echo"        </table>";
	echo"        </center>";
	echo"      </div>";

	} // end if numberall > 0

	echo "";

}elseif($action=="view open tickets") {
	echo"      <p align=\"center\"><p align=\"center\"><br>";
	if ($sortby!="")
	{
	        $sorted = " order by $sortby ";
	}
	$bareQuery = "select * from support where memberid = '$userid' and type = 'new' and ticketstatus = 'Open'";
	$queryall = $bareQuery.$sorted;
	$resultall = MYSQL_QUERY($queryall);
	$numberall = mysql_num_rows($resultall);

	if ($numberall==0) {

	    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>You Have No Open Support Requests.</p></center> ";
        ?> <center><p><a href="support.php">Click here</a> to go back.</p></center></font> <?

	}
	else if ($numberall>0) {

	$x=0;



    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
	echo"<center><H2><b>Open Support Requests</H2></b></center>";
	echo"<p>";
	echo"      <div align=\"center\">";
	echo"        <center>";
	echo"        <table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"85%\">";
	echo"          <tr>";
	echo"            <td width=\"100%\">      ";
	echo"            <div align=\"center\">";
	echo"              <center>";
	echo"<table border=0 cellspacing=3 cellpadding=5 style=\"border-collapse: collapse\" bordercolor=\"#111111\">";
	echo"    <tr>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Ticket ID</b></font></td>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Subject</b></font></td>";
	echo"    <td><b><font size=2 face='$fonttype' color='$fontcolour'>Status</b></font></td>";
	echo"    <td></td>";




	echo"    </tr><br><br>";

	        while ($x<$numberall)
	        {

	            // Changing Background color for each alternate row
	            if (($x%2)==0) { $bgcolor="#E1E1E1"; } else { $bgcolor="#F8F8F8"; }



	            // Retreiving data and putting it in local variables for each row
	            $tid=mysql_result($resultall,$x,"id");
	            $memberid=mysql_result($resultall,$x,"memberid");
	            $category=mysql_result($resultall,$x,"category");
	            $subj=mysql_result($resultall,$x,"subj");
	            $mesg=mysql_result($resultall,$x,"mesg");
	            $timesubmitted=mysql_result($resultall,$x,"timesubmitted");
	            $ticketstatus=mysql_result($resultall,$x,"ticketstatus");


	echo"         <tr bgcolor=\"$bgcolor\" height=20>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $tid&nbsp;</font></td>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $subj&nbsp;</font></td>";
	echo"            <td><font size=2 face='$fonttype' color='$fontcolour'> $ticketstatus&nbsp;</font></td>";
	echo"            <td><form method=\"post\"><input type=\"submit\" value=\"View\" class=\"form-button\"><input type=\"hidden\" name=\"action\" value=\"view ticket\"><input type=\"hidden\" name=\"page\" value=\"support\"><input type=\"hidden\" name=\"tid\" value=\"$tid\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"password\" value=\"$ckpassword\"></form></td>";
	echo"        </tr>";

	        $x++;
	    } // end while

	echo"</table></center>";
	echo"            </div>";
	echo"            </td>";
	echo"          </tr>";
	echo"        </table>";
	echo"        </center>";
	echo"      </div>";

	} // end if numberall > 0

	echo "";
}elseif($action=="view ticket") {

	$result = mysql_query("select * from support where id='$tid'");
	$num_rows = mysql_num_rows($result);
	$x=0;
	$memberid=mysql_result($result,$x,"memberid");
	$origid=mysql_result($result,$x,"id");
	$category=mysql_result($result,$x,"category");
	$subj=mysql_result($result,$x,"subj");
	$subj=addslashes($subj);
	$mesg=mysql_result($result,$x,"mesg");
	$timesubmitted=mysql_result($result,$x,"timesubmitted");
	$ticketstatus=mysql_result($result,$x,"ticketstatus");

	$mesg = preg_replace("/(\015\012)|(\015)|(\012)/","&nbsp;<br />", $mesg);
    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
	echo"<div align=\"center\">";
	echo"        <center>";
	echo"        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
	echo"          <tr>";
	echo"            <td width=\"100%\">";

	$resultname = mysql_query("select * from support where subj='$subj' and timesubmitted='$timesubmitted'");
	$num_rows_name = mysql_num_rows($resultname);
	while ($a_row = mysql_fetch_array($resultname)) {

	$memberid = $a_row["memberid"];
	$tid = $a_row["id"];
	$category = $a_row["category"];
	$subj = $a_row["subj"];
	$mesg = $a_row["mesg"];
	$account = $a_row["account"];
	$timesubmitted = $a_row["timesubmitted"];
	$ticketstatus = $a_row["ticketstatus"];
	$lastreply = $a_row["lastreply"];
	$membertype = $a_row["membertype"];
	$mesg = preg_replace("/(\015\012)|(\015)|(\012)/","&nbsp;<br />", $mesg);
	echo"<table width=\"546\">";
	echo"         <tr height=30>";
	echo"<td align=left width=\"186\">Userid :</td>";
	echo"<td width=\"350\" align=\"left\">$memberid</td>";
	echo"        </tr>";
	echo"         <tr height=30>";
	echo"<td align=left width=\"186\">Subject :</td>";
	echo"<td width=\"350\" align=\"left\">$subj</td>";
	echo"        </tr>";
	echo"         <tr height=30>";
	echo"<td align=left width=\"186\">Message :</td>";
	echo"<td width=\"350\" align=\"left\">$mesg</td>";
	echo"        </tr>";
	echo"         <tr height=30>";
	echo"<td align=left width=\"186\">Date And Time Submitted :</td>";
	echo"<td width=\"350\" align=\"left\">$lastreply</td>";
	echo"        </tr>";
	echo"         <tr height=30>";
	echo"<td align=left width=\"186\">Ticket Status :</td>";
	echo"<td width=\"350\" align=\"left\">$ticketstatus</td>";
	echo"        </tr>";
    echo"</table>";
    echo"<hr>";
	}


    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
	if($ticketstatus=='Open') {
	echo"<form method=post>";
	echo"&nbsp;<p align='center'>Reply To This Ticket:</p>";
?>
<p align="center"><form method="post"><textarea rows="15" cols="40" name="reply" cols="20"></textarea><br><br><input type=hidden name="tid" value="<?php echo $tid ?>"><input type=hidden name="origid" value="<?php echo $origid ?>"><input type=hidden name="timesubmitted" value="<?php echo $timesubmitted ?>"><input type=hidden name="memberid" value="<?php echo $memberid ?>"><input type="hidden" name="page" value="support"><input type='hidden' name='adm_passwd' value='<?php echo $adm_passwd ?>'><input type="hidden" name="action" value="reply to ticket"><input type=hidden name='userid' value='<?php echo $userid ?>'><input type=hidden name='password' value='<?php echo $ckpassword ?>'><br><br><input type=submit name=Submit class="form-button" value="Submit Reply"></form></p><p></p>
<?php
	}

	echo"          </tr>";
	echo"        </table>";
	echo"        </center>";
	echo"</div>";
	echo"        <p align=\"center\"><br>";

}elseif($action=="reply to ticket") {
	$lastreply=date("Y-m-d H:i:s<br>");


	$resultall = mysql_query("select * from support where id='$tid' and timesubmitted='$timesubmitted'");
	$num_rows_all = mysql_num_rows($resultall);
	$x=0;
	$memberid=mysql_result($resultall,$x,"memberid");

	$category=mysql_result($resultall,$x,"category");
	$subj=mysql_result($resultall,$x,"subj");
	$mesg=mysql_result($resultall,$x,"mesg");
	$timesubmitted=$timesubmitted;
	$ticketstatus=mysql_result($resultall,$x,"ticketstatus");
	$subj=addslashes($subj);
	$resultname = mysql_query("select * from members where userid='$memberid'");
	$num_rows_name = mysql_num_rows($resultname);

	


	if (!$reply)
	    die ("Please Fill in A Message and  Try again.");







	     $query="update support set span = '1' where id='$origid'";

	$result = MYSQL_QUERY($query);

	     $query2="insert into support (memberid,mesg,timesubmitted,ticketstatus,replyto,lastreply,membertype,subj,span) VALUES ('$userid','$reply','$timesubmitted','Open','$memberid','$lastreply','member','$subj','1')";

	$result2 = MYSQL_QUERY($query2);

	echo"<center><p>Reply Has Been Sent<p>&nbsp;</p>";

    ?> <center><p><a href="support.php">Click here</a> to go back.</p></center> <?

	$top = "Hello,\n\nYou have an updated support ticket from ~fullname~, userid ~userid~.  Please visit your administrative area to view the ticket here:\n~domain~/admin\n\n~sitename~ Automated Message Center\n\n======================================\nSubject and Message Follows:\n\n";
	$adminmsg="$top"."$subj"."\n\n"."$reply"."\n";



	$mquery="select * from emails where title='reply'";
	     $mresult=mysql_query($mquery);
	     $num_rows = mysql_num_rows($mresult);

$id=mysql_result($mresult,$x,"id");
	    $title=mysql_result($mresult,$x,"title");
	    $subject=mysql_result($mresult,$x,"subject");
	    $message=mysql_result($mresult,$x,"message");
     	

	    $subject = stripslashes($subject);
	    $subject = str_replace("\"", "%quotes%", $subject);
	    $subject = str_replace("~firstname~", "$name", $subject);

	    $message = stripslashes($message);
	    $message = str_replace("\"", "%quotes%", $message);
	    $message = str_replace("~fullname~", "$name", $message);
	    $message = str_replace("~sitename~", "$sitename", $message);

	    $from = $sitename;
	    $from_address = $adminemail;
                    $new_contact = $contact_email;
	    $headers = "From: \"$from\" <$from_address>\n" .
	               "Content-Type: text/plain;\n";
                    $headers .= "X-Sender: <$adminemail>\n";
	    $headers .= "X-Mailer: PHP4\n";
	    $headers .= "X-Priority: 3\n";
	                "Return-Path: $from_address\n";
	    mail($new_contact, $subject, $message,"From: $from <$from_address>", "-f $from_address")
	            or print "";



	    $subject =  "New Reply Added";
	    $subject = stripslashes($subject);
	    $subject = str_replace("\"", "%quotes%", $subject);

	    $adminmsg = stripslashes($adminmsg);
	    $adminmsg = str_replace("~domain~", "$domain", $adminmsg);
	    $adminmsg = str_replace("~sitename~", "$sitename", $adminmsg);
	    $adminmsg = str_replace("~subdomain~", "", $adminmsg);
	    $adminmsg = str_replace("~fullname~", "$name", $adminmsg);
	    $adminmsg = str_replace("~userid~", "$userid", $adminmsg);

	$from = $sitename;
	$from_address = $adminemail;
	$headers = "From: \"$from\" <$from_address>\n" .
	           "MIME-Version: 1.0\n" .
	           "Content-Type: text/plain\n" .
	            "Return-Path: $from_address\n";
	mail($adminemail, $subject, $adminmsg,"From: $from <$from_address>", "-f $from_address")
	or print "";

}else{
    ?> <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <?
	echo"      <p align=\"center\"><br>";
	echo"      <b><H2><center>Support Center</center></H2></b></p><br>";
	echo"      </font>";
	echo"<div align=\"center\">";
	echo"  <center>";
	echo"  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"60%\">";
	echo"    <tr>";
	echo"      <td width=\"100%\"><font size=2 color=\"#111111\">";
	echo"<p align=\"center\">";
	echo"      <b>Userid: $userid</b><p align=\"center\">";
	echo"      <b>Name:   $name";
	echo"      </b>";
	echo"<p align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"action\" value=\"view open tickets\"><input type=\"hidden\" name=\"page\" value=\"support\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"password\" value=\"$ckpassword\"><input type=\"submit\" value=\"View Currently Open Tickets\" class=\"form-button\"></form><p align=\"center\">";
	echo"<p align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"action\" value=\"view closed tickets\"><input type=\"hidden\" name=\"page\" value=\"support\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"password\" value=\"$ckpassword\"><input type=\"submit\" value=\"View Closed Tickets\" class=\"form-button\"></form><p align=\"center\">Or Create A ";
	echo"      New Support Request Below:<p align=\"center\"><hr><p align=\"center\">&nbsp;Please fill in all fields.  Your request will be answered in the order it was received.</b><p>&nbsp;</td>";
	echo"    </tr>";
	echo"  </table>";
	echo"  </center>";
	echo"</div>";
	echo"<font size=2 color=\"#ff0000\"><div align=\"center\">";
	echo"  <center>";
	echo"  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"45%\">";
	echo"    <tr>";
	echo"      <td width=\"100%\">";
	echo"      <form method=post>";
	echo"<center><table bgcolor=\"#FFFFFF\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" cellpadding=\"0\" cellspacing=\"0\">";
	echo"<tr height=30 valign=top>";
	echo"<td align=center></td>";
	echo"</tr>";
	echo"<tr height=30 valign=top>";
	echo"<td align=center><b>Please Choose a Category :</td></tr><tr>";
	echo"<td align=\"center\">";
	echo"    <select size=\"1\" name=\"category\">";
	echo"            <option selected>Problem</option>";
	echo"            <option>Suggestion</option>";
	echo"            <option>Compliment</option>";
	echo"            <option>Complaint</option>";
	echo"            <option>Other</option>";
	echo"            </select><p>";
	echo"</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td align=center>";
	echo"    <input type=\"text\" name=\"subj\" size=\"50\">";
	echo"</td>";
	echo"</tr>";
	echo"<tr height=30 valign=top>";
	echo"<td align=center>Message :</td>";
	echo"<tr><td align=center>";
	echo"    <textarea rows=\"15\" cols=\"40\" name=\"mesg\"></textarea>";
	echo"</td>";
	echo"</tr>";
	echo"<tr height=30 valign=top>";
	echo"<td align=center></td>";

	echo"</table>";
	echo"<p align=\"center\">";
	echo"<input type=hidden name=page value=\"support\"><input type=hidden name=userid value=\"$userid\"><input type=hidden name=password value=\"$ckpassword\"> </p>";
	echo"<center><input type=submit name=Submit value=\"Submit Request\" class=\"form-button\">";
	echo"<input type=hidden name=action value=\" Send Support Request \"> </p>";
	echo"</form>";
	echo"</font></p>";
	echo"<p>&nbsp;</p>";
	echo"<p>&nbsp;</p>";
	echo"      </td>";
	echo"    </tr>";
	echo"  </table>";
	echo"  </center>";
	echo"</div>";
	echo"<p>";
	echo"</font>";
	}
    echo "</font></td></tr></table>";
}
else
  { ?>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include("../footer.php");
mysql_close($dblink);
?>