<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$sort = $_GET["sortby"];

if( session_is_registered("alogin") ) {


	$tbl_name="members";	//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "view.php"; 	//your file name  (the name of this file)
	$limit = 100; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	   
/* Get data. */
	$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$result = mysql_query($sql);


	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{


    

	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}

	    if($sort == "name")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`name` ASC";
	}
	else if($sort == "userid")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`userid` ASC";
	}
	else if($sort == "memtype")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`memtype` ASC";
	}
	else if($sort == "email")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`contact_email` ASC";
	}
	else if($sort == "ip")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`ip` ASC";
	}
	else if($sort == "verfied")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`ip` ASC";
	}
	else if($sort == "joindate")
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`joindate` ASC";
	}
	else
	{
		$query = "SELECT * FROM `members` ORDER BY `members`.`joindate` ASC";
	}


 
 

       	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?

    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><p><b>";
   echo "$total_pages Results found";
    echo "</center></p></b>";
mysql_close($dblink);
    ?>
<table align=center><tr><td><?=$pagination?></td></tr></table>
    <table width=70% border=0 cellpadding=2 cellspacing=2>


  		<tr>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=name">Name<a></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=userid">Userid<a></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=memtype">Level<a></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=email">Contact Email<a></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=ip">IP<a></font></center></td>
   <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="view.php?sortby=joindate">Join Date</a></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Edit Member</font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Verified</font></center></td>
        </tr>
    <?


 while ($line = mysql_fetch_array($result)) {		$name = $line["name"];
        $userid = $line["userid"];
	    $contactemail = $line["contact_email"];
        $subscribedemail = $line["subscribed_email"];
        $verified = $line["verified"];
        $ip = $line["ip"];
        $joindate = $line["joindate"];
        $memtype = $line["memtype"];
        ?>
  		<tr>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $name; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><a href="memberlogin.php?userid=<? echo $userid; ?>"><? echo $userid; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $memtype; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $contactemail; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $ip; ?></font></center></td>
 <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $joindate; ?></font></center></td>

          <td valign="middle" bgcolor="<? echo $basecolour; ?>"><center><br>
          <form method=POST action=edit.php>
          <input type="hidden" name="userid" value="<? echo $userid; ?>">
          <input type="submit" value="Edit">
          </form> </center>
          </td>

          <? if ($verified == 1) { ?>
             <td bgcolor="<? echo $basecolour; ?>"<center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Yes</font></center></td>
          <? } if ($verified == 0) { ?>
          	<td bgcolor="<? echo $basecolour; ?>" valign="middle"><center><br>
          	<form method="POST" action="resendv.php">
          	<input type="hidden" name="userid" value="<? echo $userid; ?>">
          	<input type="hidden" name="email" value="<? echo $subscribedemail; ?>">
          	<input type="submit" value="Resend">
          	</form> </center>
          	</td>
        	</tr>

        <? }


     }
     echo "</table></td></tr></table>";

  	}
else  {
	echo "Unauthorised Access!";
    }
?>
<table align=center><tr><td><?=$pagination?></td></tr></table>
<?
include "../footer.php";

?>