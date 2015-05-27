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
        <td  valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

        echo "<center><H2>Admin Support Center</H2></center>";

		$domainname=$domain;

if($action=="view closed tickets") {
	    echo"      <p align=\"center\"><p align=\"center\"><br>";
	    if ($sortby!="")
	    {
	            $sorted = " order by $sortby ";
	    }
	    $bareQuery = "select * from support where ticketstatus = 'Closed' and membertype = 'member' and type = 'new'";
	    $queryall = $bareQuery.$sorted;
	    $resultall = MYSQL_QUERY($queryall);
	    $numberall = mysql_num_rows($resultall);

	    if ($numberall==0) {

	        echo "<p><center>There Are No Closed Support Requests.</p></center>";

	    }
	    else if ($numberall>0) {

	    $x=0;




	    echo"<p><center><b>Closed Support Requests</p></b></center>";
	    echo"<p>";
	    echo"      <div align=\"center\">";
	    echo"        <center>";
	    echo"        <table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"85%\">";
	    echo"          <tr>";
	    echo"            <td width=\"100%\">";
        echo"             <div align=\"center\">";
	    echo"              <center>";
	    echo"<table border=0 cellspacing=3 cellpadding=5 style=\"border-collapse: collapse\" bordercolor=\"#111111\">";
	    echo"    <tr bgcolor=\"$contrastcolour\">";
	    echo"    <td bgcolor=\"$contrastcolour\"><b>Ticket ID</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\"><b>Subject</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\"><b>Status</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\"></td>";




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
	    echo"            <td> $tid&nbsp;</td>";
	    echo"            <td> $subj&nbsp;</td>";
	    echo"            <td> $ticketstatus&nbsp;</td>";
	    echo"            <td><form method=\"post\"><input type=\"submit\" value=\"View\" class=\"form-button\"><input type=\"hidden\" name=\"action\" value=\"view closed ticket\"><input type=\"hidden\" name=\"admpage\" value=\"support\"><input type=\"hidden\" name=\"tid\" value=\"$tid\"><input type=\"hidden\" name=\"userid\" value=\"$userid\"><input type=\"hidden\" name=\"adm_passwd\" value=\"$adm_passwd\"></form></td>";
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
	    $result = mysql_query("select * from support where id='$id'");
	    $num_rows = mysql_num_rows($result);
	    $x=0;
	    $memberid=mysql_result($result,$x,"memberid");
	    $id=mysql_result($result,$x,"id");
	    $category=mysql_result($result,$x,"category");
	    $subj=mysql_result($result,$x,"subj");
	    $subj=addslashes($subj);
	    $mesg=mysql_result($result,$x,"mesg");
	    $timesubmitted=mysql_result($result,$x,"timesubmitted");
	    $ticketstatus=mysql_result($result,$x,"ticketstatus");
	    $origid=mysql_result($result,$x,"id");


	    echo"<div align=\"center\">";
	    echo"        <center>";
	    echo"        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"51%\">";
	    echo"          <tr>";
	    echo"            <td width=\"100%\">";


	    $resultname = mysql_query("select * from support where subj='$subj' and timesubmitted='$timesubmitted'");
	    $num_rows_name = mysql_num_rows($resultname);
	    while ($a_row = mysql_fetch_array($resultname)) {

	    $userid = $a_row["userid"];
	    $memberid = $a_row["memberid"];

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
	    echo"<td align=left width=\"186\">Ticket Id Number:</td>";
	    echo"<td width=\"350\" align=\"left\">$id</td>";
	    echo"        </tr>";
	    echo"         <tr height=30>";
	    echo"<td align=left width=\"186\">Userid :</td>";
	    echo"<td width=\"350\" align=\"left\">$memberid</td>";
	    echo"        </tr>";
	    echo"         <tr height=30>";
	    echo"<td align=left width=\"186\">Category :</td>";
	    echo"<td width=\"350\" align=\"left\">$category</td>";
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
	    echo"<hr>";
        echo"</table>";
	    }
	    echo"</div>";
        echo"</table>";
	    echo"<p>";
	    echo"<p align=\"center\">Reply To This Ticket:</p>";
?>
<p align="center"><form method="post"><textarea rows="15" cols="40" name="reply" cols="20"></textarea><br><br><center><input type="checkbox" name="ticketstatus" value="Closed"> Submit Reply And Close This Ticket Now<input type=hidden name="id" value="<?php echo $id ?>"><input type=hidden name="origid" value="<?php echo $origid ?>"><input type=hidden name="timesubmitted" value="<?php echo $timesubmitted ?>"><input type=hidden name="memberid" value="<?php echo $memberid ?>"><input type="hidden" name="admpage" value="support"><input type='hidden' name='adm_passwd' value='<?php echo $adm_passwd ?>'><input type="hidden" name="action" value="reply to ticket"><br><br><input type=submit name=Submit class="form-button" value="Submit Reply"></form></p><p></p>
<?php
	    echo"<p><form method=post>";
	    echo"&nbsp;<p align=\"center\"></p>";
	    echo"<p align=\"center\"></p>";
	    echo"<center>";
	    echo"<center><input type=\"hidden\" name=\"ticketstatus\" value=\"Closed\">If the ticket is resolved and you'd like to close it without an additional reply, click the following button to close it now.<p>";
	    echo"<input type=hidden name=\"id\" value=\"$id\">";
	    echo"<input type=hidden name=\"origid\" value=\"$origid\">";
	    echo"<input type=hidden name=\"timesubmitted\" value=\"$timesubmitted\">";
	    echo"<input type=hidden name=\"memberid\" value=\"$memberid\">";
	    echo"<input type=\"hidden\" name=\"admpage\" value=\"support\">";
	    echo"<input type='hidden' name='adm_passwd' value='$adm_passwd'>";
	    echo"<input type=submit name=Submit class=\"form-button\" value=\"Close Ticket Now\">";
	    echo"<input type=hidden name=action value=\"close ticket now\"></form>";
	    echo"<br>";
	    echo"</p>";

}elseif($action=="view closed ticket") {
	    $result = mysql_query("select * from support where id='$tid'");
	    $num_rows = mysql_num_rows($result);
	    $x=0;
	    $memberid=mysql_result($result,$x,"memberid");
	    $id=mysql_result($result,$x,"id");
	    $category=mysql_result($result,$x,"category");
	    $subj=mysql_result($result,$x,"subj");
	    $subj=addslashes($subj);
	    $mesg=mysql_result($result,$x,"mesg");
	    $timesubmitted=mysql_result($result,$x,"timesubmitted");
	    $ticketstatus=mysql_result($result,$x,"ticketstatus");
	    $origid=mysql_result($result,$x,"id");


	    echo"<div align=\"center\">";
	    echo"        <center>";
	    echo"        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"51%\">";
	    echo"          <tr>";
	    echo"            <td width=\"100%\">";


	    $resultname = mysql_query("select * from support where subj='$subj' and timesubmitted='$timesubmitted'");
	    $num_rows_name = mysql_num_rows($resultname);
	    while ($a_row = mysql_fetch_array($resultname)) {

	    $userid = $a_row["userid"];
	    $memberid = $a_row["memberid"];

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
	    echo"<td align=left width=\"186\">Ticket Id Number:</td>";
	    echo"<td width=\"350\" align=\"left\">$id</td>";
	    echo"        </tr>";
	    echo"         <tr height=30>";
	    echo"<td align=left width=\"186\">Userid :</td>";
	    echo"<td width=\"350\" align=\"left\">$memberid</td>";
	    echo"        </tr>";
	    echo"         <tr height=30>";
	    echo"<td align=left width=\"186\">Category :</td>";
	    echo"<td width=\"350\" align=\"left\">$category</td>";
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
	    echo"<hr>";
        echo"</table>";
	    }

	    echo"</td>";
	    echo"</tr>";
	    echo"</table>";
	    echo"</div>";
	    echo"<p>";

	    echo"</div>";
	    echo"        <p align=\"center\"><br>";
	    echo"<br>";
	    echo"        </p>";

}elseif($action=="reply to ticket") {

	    $lastreply=date("Y-m-d H:i:s<br>");

	    $ticketstatus=$ticketstatus;
	    $resultall = mysql_query("select * from support where id='$id' and timesubmitted='$timesubmitted'");
	    $num_rows_all = mysql_num_rows($resultall);
	    $x=0;
	    $memberid=mysql_result($resultall,$x,"memberid");
	    $id=$id;
	    $category=mysql_result($resultall,$x,"category");
	    $subj=mysql_result($resultall,$x,"subj");
	    $mesg=mysql_result($resultall,$x,"mesg");
	    $timesubmitted=$timesubmitted;

	    $subj=addslashes($subj);
	    $resultname = mysql_query("select * from members where userid='$memberid'");
	    $num_rows_name = mysql_num_rows($resultname);

	    $fullname=mysql_result($resultname,$x,"name");
	    $contact=mysql_result($resultname,$x,"contact_email");

	    if (!$reply)
	        die ("<center>Don't you want to type a message?  Try again.<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>");

	    if($ticketstatus=="Closed") {
	    $uquery="update support set ticketstatus = 'Closed', span='0' where origid = '$id'";
	    $uresult=MYSQL_QUERY($uquery);
	    $ouquery="update support set ticketstatus = 'Closed', span='0' where id = '$id'";
	    $ouresult=MYSQL_QUERY($ouquery);

	         $query="insert into support (memberid,subj,mesg,timesubmitted,ticketstatus,replyto,lastreply,membertype,origid,span) VALUES ('admin','$subj','$reply','$timesubmitted','Closed','$memberid','$lastreply','admin','$origid','0')";

	    $result = MYSQL_QUERY($query);
	    }else{
	         $query="insert into support (memberid,subj,mesg,timesubmitted,ticketstatus,replyto,lastreply,membertype,origid,span) VALUES ('admin','$subj','$reply','$timesubmitted','Open','$memberid','$lastreply','admin','$origid','0')";

	    $result = MYSQL_QUERY($query);
	    $ou2query="update support set span='0' where id = '$id'";
	    $ou2result=MYSQL_QUERY($ou2query);
	    }

	    echo"<center>Reply Has Been Sent<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>";



	    $mquery="select * from emails where title='ticketreply'";
	         $mresult=mysql_query($mquery);
	         $num_rows = mysql_num_rows($mresult);

	         $x=0;
	    $id=mysql_result($mresult,$x,"id");
	    $title=mysql_result($mresult,$x,"title");
	    $subject=mysql_result($mresult,$x,"subject");
	    $message=mysql_result($mresult,$x,"message");

	    $subject = stripslashes($subject);
	    $subject = str_replace("\"", "%quotes%", $subject);
	    $subject = str_replace("~firstname~", "$firstname", $subject);

	    $message = stripslashes($message);
	    $message = str_replace("\"", "%quotes%", $message);
	    $message = str_replace("~fullname~", "$fullname", $message);
	    $message = str_replace("~subj~", "$subj", $message);
	    $message = str_replace("~mesg~", "$mesg", $message);
	    $message = str_replace("~ticketstatus~", "$ticketstatus", $message);
	    $message = str_replace("~timesubmitted~", "$timesubmitted", $message);
	    $message = str_replace("~userid~", "$userid", $message);
	    $message = str_replace("~subdomain~", "$subdomain", $message);
	    $message = str_replace("~domain~", "$domain", $message);
	    $message = str_replace("~sitename~", "$sitename", $message);
	    $message = str_replace("~password~", "$password", $message);


	     $from = $sitename;
	    $from_address = $adminemail;
                        $headers = "From: \"$from\" <$from_address>\n" .
	               "Content-Type: text/plain;\n";
                    $headers .= "X-Sender: <$adminemail>\n";
	    $headers .= "X-Mailer: PHP4\n";
	    $headers .= "X-Priority: 3\n";
	                "Return-Path: $from_address\n";
	    mail($contact, $subject, $message,"From: $from <$from_address>", "-f $from_address")
	            or print "";

	    }elseif($action=="close ticket now") {
	    $uquery="update support set ticketstatus = 'Closed', span='0' where origid = '$id'";
	    $uresult=MYSQL_QUERY($uquery);
	    $ouquery="update support set ticketstatus = 'Closed', span='0' where id = '$id'";
	    $ouresult=MYSQL_QUERY($ouquery);
	    echo"<center>Ticket has been closed";


	    }else{
	    echo"      <p align=\"center\"><p align=\"center\"><br>";


	    if ($sortby!="")
	    {
	            $sorted = " order by $sortby ";
	    }
	    $bareQuery = "select * from support where ticketstatus = 'Open' and membertype = 'member' and type = 'new'";
	    $queryall = $bareQuery.$sorted;
	    $resultall = MYSQL_QUERY($queryall);
	    $numberall = mysql_num_rows($resultall);

	    if ($numberall==0) {

	        echo "There Are No Open Tickets.";
	    echo"<p align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"action\" value=\"view closed tickets\"><input type=\"hidden\" name=\"admpage\" value=\"support\"><input type=\"hidden\" name=\"adm_passwd\" value=\"$adm_passwd\"><input type=\"submit\" value=\"View Closed Tickets\" class=\"form-button\"></form><p align=\"center\">";

	    }
	    else if ($numberall>0) {

	    $x=0;




	    echo"<H2><b>Open Support Requests</H2></b></font> </font>";
	    echo"<p>";
	    echo"      <p align=\"center\"><br>";
	    echo"<p align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"action\" value=\"view closed tickets\"><input type=\"hidden\" name=\"admpage\" value=\"support\"><input type=\"hidden\" name=\"adm_passwd\" value=\"$adm_passwd\"><input type=\"submit\" value=\"View Closed Tickets\" class=\"form-button\"></form><p align=\"center\">";
	    echo"      </p>";
	    echo"      <div align=\"center\">";
	    echo"        <center>";
	    echo"        <table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"89%\">";
	    echo"          <tr>";
	    echo"            <td width=\"100%\">"      ;
	    echo"            <div align=\"center\">";
	    echo"              <center>";
	    echo"<table border=0 cellspacing=3 cellpadding=5 style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"500\">";
	    echo"    <tr bgcolor=\"$contrastcolour\">";
	    echo"    <td bgcolor=\"$contrastcolour\" width=\"67\"><b>ID</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\" width=\"118\"><b>User Id</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\" width=\"273\"><b>Subject</b></td>";
	    echo"    <td bgcolor=\"$contrastcolour\" width=\"273\"><b></b></td>";





	    echo"    </tr><br><br>";


	            while ($x<$numberall)
	            {

	                // Changing Background color for each alternate row
	                if (($x%2)==0) { $bgcolor="#E1E1E1"; } else { $bgcolor="#F8F8F8"; }



	                // Retreiving data and putting it in local variables for each row
	                $id=mysql_result($resultall,$x,"id");
	                $memberid=mysql_result($resultall,$x,"memberid");
	                $category=mysql_result($resultall,$x,"category");
	                $subj=mysql_result($resultall,$x,"subj");
	                $mesg=mysql_result($resultall,$x,"mesg");
	                $timesubmitted=mysql_result($resultall,$x,"timesubmitted");
	                $ticketstatus=mysql_result($resultall,$x,"ticketstatus");
	                $span=mysql_result($resultall,$x,"span");



	    echo"<tr bgcolor=\"$bgcolor\" height=20>";
	    echo"            <td width=\"67\"> $id &nbsp;</td>";
	    echo"            <td width=\"118\">$memberid</td>";
	    echo"            <td width=\"118\">";
	    if($span == '1') {

	    echo"<span style=\"background-color: #80FF80\">";
	    }
	    echo $subj;
	    if($span == '1') {

	    echo"";
	    }
	    echo"</a>&nbsp;</td>  ";
	    echo"            <td><form method=\"post\"><input type=\"submit\" value=\"View Ticket\" class=\"form-button\"></p><input type=\"hidden\" name=\"action\" value=\"view ticket\"><input type=\"hidden\" name=\"adm_passwd\" value=\"$adm_passwd\"><input type=\"hidden\" name=\"admpage\" value=\"support\"><input type=\"hidden\" name=\"id\" value=\"$id\"></form></td>";


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
	    }
    ?> </td>
     </tr>
     </table><?
  }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>