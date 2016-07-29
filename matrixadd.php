<?php
$username = $userid;
########################################################################
function GetParents($parent, $matrixtablename, $level, $addqbuildvalues)
{
global $matrixdepth;
if ($level > $matrixdepth)
{
return $addqbuildvalues;
}
else
{
$q = "select * from $matrixtablename where id=\"$parent\"";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
if ($rows > 0)
{
$nextparentid = mysql_result($r,0,"parent1");
$nextparentusername = mysql_result($r,0,"parent1username");
if ($level != 1)
	{
$q2 = "update $matrixtablename set L$level=L$level+1 where id=\"$nextparentid\"";
$r2 =  mysql_query($q2);
	} # if ($level != 1)
if ($level == 1)
	{
$q2 = "update $matrixtablename set L1=L1+1 where id=\"$nextparentid\"";
$r2 =  mysql_query($q2);
	} # if ($level == 1)
$addqbuildvalues = $addqbuildvalues . "\"$nextparentid\",\"$nextparentusername\",";
	if ($level <= $matrixdepth)
	{
	$addqbuildvalues = GetParents($nextparentid, $matrixtablename, $level+1, $addqbuildvalues);
	}
} # if ($rows > 0)

if ($rows < 1)
{
$addqbuildvalues = $addqbuildvalues . "\"0\",\"\",";
	if ($level <= $matrixdepth)
	{
	$addqbuildvalues = GetParents(0, $matrixtablename, $level+1, $addqbuildvalues);
	}
} # if ($rows < 1)
return $addqbuildvalues;
}
} # function GetParents($parent, $matrixtablename, $level, $addqbuildvalues)
########################################################################
function getNextUplineSponor($matrixtablename,$referrer_username,$username,$paychoice,$transaction,$matrixid,$matrixlevelname,$matrixwidth,$matrixdepth,$amount)
		{
		$uplineq = "select * from members where userid=\"$referrer_username\"";
		$upliner = mysql_query($uplineq);
		$uplinerows = mysql_num_rows($upliner);
		if ($uplinerows < 1)
				{
				$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
				$vacancyr = mysql_query($vacancyq);
				$vacancyrows = mysql_num_rows($vacancyr);
				if ($vacancyrows > 0)
				{
				$vacancyid = mysql_result($vacancyr,0,"id");
				$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
				$addr = mysql_query($addq);
				$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
				$addr0 = mysql_query($addq0);
					for($i=1;$i<=$matrixdepth;$i++)
					{
					$parentid = "parent" . $i;
					$parentusername = "parent" . $i . "username";
					$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
					$refr = mysql_query($refq);
					} # for($i=1;$i<=$matrixdepth;$i++)
				} # if ($vacancyrows > 0)
				if ($vacancyrows < 1)
				{
				# make new matrix with no sponsor because the upline sponsor isn't in the members table at all. 
				# so it is not possible to check any further upline.
				$getidq = "select * from $matrixtablename order by id desc limit 1";
				$getidr = mysql_query($getidq);
				$getidrows = mysql_num_rows($getidr);
				if ($getidrows < 1)
					{
					$getid = 1;
					}
				if ($getidrows > 0)
					{
					$getidlast = mysql_result($getidr,0,"id");
					$getid = $getidlast+1;
					}
					$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
					$por = mysql_query($poq);
					$porows = mysql_num_rows($por);
					if ($porows > 0)
					{
					$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
					$positionordernumber = $lastpositionordernumber+1;
					}
					$urlreferrerq = "select * from members where userid=\"$username\"";
					$urlreferrerr = mysql_query($urlreferrerq);
					$urlreferrerrows = mysql_num_rows($urlreferrerr);
					if ($urlreferrerrows > 0)
							{
							$urlreferrer = mysql_result($urlreferrerr,0,"referid");
							}
					$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
					$newr = mysql_query($newq);
					$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
					$addr0 = mysql_query($addq0);	
				} # if ($vacancyrows < 1)
				} # if ($uplinerows < 1)
		if ($uplinerows > 0)
				{
				$referrerusername_nextupline = mysql_result($upliner,0,"referid");
				$dotheyhaveapositionq = "select * from $matrixtablename where username=\"$referrer_username\" order by id limit 1"; 
				$dotheyhaveapositionr = mysql_query($dotheyhaveapositionq);
				$dotheyhaveapositionrows = mysql_num_rows($dotheyhaveapositionr);
				if ($dotheyhaveapositionrows < 1)
					{
					## referrer exists but does not have a matrix position themselves. Find the next available upline sponsor.
					if (($referrerusername_nextupline == $referrer_username) or ($referrerusername_nextupline == ""))
						{
						$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
						$vacancyr = mysql_query($vacancyq);
						$vacancyrows = mysql_num_rows($vacancyr);
						if ($vacancyrows > 0)
						{
						$vacancyid = mysql_result($vacancyr,0,"id");
						$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
						$addr = mysql_query($addq);
						$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
						$addr0 = mysql_query($addq0);
							for($i=1;$i<=$matrixdepth;$i++)
							{
							$parentid = "parent" . $i;
							$parentusername = "parent" . $i . "username";
							$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
							$refr = mysql_query($refq);
							} # for($i=1;$i<=$matrixdepth;$i++)
						} # if ($vacancyrows > 0)
						if ($vacancyrows < 1)
						{
						# make new matrix with no sponsor because the upline sponsor referred themselves or their referid is blank.
						# so it is not possible to check any further upline.
						$getidq = "select * from $matrixtablename order by id desc limit 1";
						$getidr = mysql_query($getidq);
						$getidrows = mysql_num_rows($getidr);
						if ($getidrows < 1)
							{
							$getid = 1;
							}
						if ($getidrows > 0)
							{
							$getidlast = mysql_result($getidr,0,"id");
							$getid = $getidlast+1;
							}
							$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
							$por = mysql_query($poq);
							$porows = mysql_num_rows($por);
							if ($porows > 0)
							{
							$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
							$positionordernumber = $lastpositionordernumber+1;
							}
							$urlreferrerq = "select * from members where userid=\"$username\"";
							$urlreferrerr = mysql_query($urlreferrerq);
							$urlreferrerrows = mysql_num_rows($urlreferrerr);
							if ($urlreferrerrows > 0)
									{
									$urlreferrer = mysql_result($urlreferrerr,0,"referid");
									}
							$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
							$newr = mysql_query($newq);
							$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
							$addr0 = mysql_query($addq0);	
						} # if ($vacancyrows < 1)
						} # if (($referrerusername_nextupline == $referrer_username) or ($referrerusername_nextupline == ""))
					else
						{
						$next = getNextUplineSponor($matrixtablename,$referrerusername_nextupline,$username,$paychoice,$transaction,$matrixid,$matrixlevelname,$matrixwidth,$matrixdepth,$amount);
						}
					} # if ($dotheyhaveapositionrows < 1)
				if ($dotheyhaveapositionrows > 0)
					{
					$referrerpositionid = mysql_result($dotheyhaveapositionr,0,"id");
					## check if this sponsor has a matrix position that  needs referrals or not.
					## Build Query: ie. select * from matrix where userid=\"$referrer\" and (L1<5 or L2<25 or L3<125 or L4<625 or L5<3125 or L6<15625) order by id limit 1 
					$q0build = "";
					for($j=1;$j<=$matrixdepth;$j++)
					{
					$refsinthislevel = pow($matrixwidth, $j);
						if ($j < $matrixdepth)
						{
						$q0build = $q0build . "L" . $j . "<" . $refsinthislevel . " or ";
						}
						if ($j == $matrixdepth)
						{
						$q0build = $q0build . "L" . $j . "<" . $refsinthislevel;
						}
					}
					$q0 = "select * from $matrixtablename where username=\"$referrer_username\" and (" . $q0build . ") order by id limit 1";
					$r0 = mysql_query($q0);
					$row0 = mysql_num_rows($r0);
						if ($row0 > 0)
						{
						## the referrer has a matrix that needs more referrals still.
							$urlreferrername = $referrer_username;
							$id = mysql_result($r0,0,"id");

							$addqbuildfields = "";
							$addqbuildvalues = "";

							## figure out which level we need to put this referral into. The referrer is the new persons parent 1 and the referrers parent 1 is the new persons parent 2 etc.
							for ($p=1;$p<=$matrixdepth;$p++)
							{
								$addqbuildfields = $addqbuildfields . "parent" . $p . "," . "parent" . $p . "username,";
							}

							for($i=1;$i<=$matrixdepth;$i++)
							{
								# below are results of this query: $q01 = "select * from matrix where username=\"$referrer_username\" order by id limit 1";
								$levelvariablename = "L" . $i;
								eval("\$levelvariablename = mysql_result(\$r0,0,\"$levelvariablename\");");
								$Lname = $levelvariablename;
								$maxrefsinthislevel = pow($matrixwidth, $i);
								if ($Lname < $maxrefsinthislevel)
								{
									#echo "Level $i<br>Has $Lname Referrals In It<hr>";
									if ($i > 1)
									{
									$onelessthanlevel = $i-1;
									$addq = "select * from $matrixtablename where parent$onelessthanlevel='$id' and L1<$matrixwidth order by id,L1 limit 1";
									$addr = mysql_query($addq);
									$addrow = mysql_num_rows($addr);
									if ($addrow > 0)
									{
									$newreferrername = mysql_result($addr,0,"username");
									$newreferrerid = mysql_result($addr,0,"id");
									$theparent1 = $newreferrerid;
									$theparent1username = $newreferrername;
									$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
									$addr1 =  mysql_query($addq1);

									$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

									## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
									$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

									} # if ($addrow > 0)
									} # if ($i > 1)
									if ($i == 1)
									{
									$theparent1 = $id;
									$theparent1username = $urlreferrername;
									$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
									$addr1 =  mysql_query($addq1);
									$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

									## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
									$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

									} # if ($i == 1)
								break;
								} # if ($Lname < $maxrefsinthislevel)
							} # for($i=1;$i<=$matrixdepth;$i++)

								$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
								$por = mysql_query($poq);
								$porows = mysql_num_rows($por);
								if ($porows > 0)
								{
								$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
								$positionordernumber = $lastpositionordernumber+1;
								}
							$urlreferrerq = "select * from members where userid=\"$username\"";
							$urlreferrerr = mysql_query($urlreferrerq);
							$urlreferrerrows = mysql_num_rows($urlreferrerr);
							if ($urlreferrerrows > 0)
									{
									$urlreferrer = mysql_result($urlreferrerr,0,"referid");
									}
								$addq0 = "insert into $matrixtablename (username," . $addqbuildfields . "urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$username\"," . $addqbuildvalues . "\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
								$addr0 =  mysql_query($addq0) or die(mysql_error());
								$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
								$addr0 = mysql_query($addq0);
						} # if ($row0 > 0)
						if ($row0 < 1)
						{
						######## the referrers matrix must be full because all their levels are filled for every position they have. Get their first downline referral who needs a new referral.
						$addqdownlinebuildfields = "";
						for ($d=1;$d<=$matrixdepth;$d++)
						{
							$addqdownlinebuildfields .= "parent" . $d . "=\"" . $referrerpositionid . "\" or ";
						}
						$addqdownlinebuildfields = substr($addqdownlinebuildfields, 0, -3);  
						$downlineq = "select * from $matrixtablename where cycled!=\"yes\" and (" . $addqdownlinebuildfields . ") order by id limit 1";
						$downliner = mysql_query($downlineq);
						$downlinerows = mysql_num_rows($downliner);
						if ($downlinerows < 1)
							{
							$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
							$vacancyr = mysql_query($vacancyq);
							$vacancyrows = mysql_num_rows($vacancyr);
							if ($vacancyrows > 0)
							{
							$vacancyid = mysql_result($vacancyr,0,"id");
							$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
							$addr = mysql_query($addq);
							$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
							$addr0 = mysql_query($addq0);
								for($i=1;$i<=$matrixdepth;$i++)
								{
								$parentid = "parent" . $i;
								$parentusername = "parent" . $i . "username";
								$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
								$refr = mysql_query($refq);
								} # for($i=1;$i<=$matrixdepth;$i++)
							} # if ($vacancyrows > 0)
							if ($vacancyrows < 1)
							{
							# may indicate a bug unless referrer's entire bottom level also have their matrices filled.
							$getidq = "select * from $matrixtablename order by id desc limit 1";
							$getidr = mysql_query($getidq);
							$getidrows = mysql_num_rows($getidr);
							if ($getidrows < 1)
								{
								$getid = 1;
								}
							if ($getidrows > 0)
								{
								$getidlast = mysql_result($getidr,0,"id");
								$getid = $getidlast+1;
								}
								$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
								$por = mysql_query($poq);
								$porows = mysql_num_rows($por);
								if ($porows > 0)
								{
								$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
								$positionordernumber = $lastpositionordernumber+1;
								}
								$urlreferrerq = "select * from members where userid=\"$username\"";
								$urlreferrerr = mysql_query($urlreferrerq);
								$urlreferrerrows = mysql_num_rows($urlreferrerr);
								if ($urlreferrerrows > 0)
										{
										$urlreferrer = mysql_result($urlreferrerr,0,"referid");
										}
								$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
								$newr = mysql_query($newq);
								$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
								$addr0 = mysql_query($addq0);	
							} # if ($vacancyrows < 1)
							} # if ($downlinerows < 1)
						if ($downlinerows > 0)
							{
							# give this referral (of the referrer) the new position in their downline.
							$downlinereferrerid = mysql_result($downliner,0,"id");
							$downlinereferrer = mysql_result($downliner,0,"username");
							$urlreferrername = $downlinereferrer;

							$addqbuildfields = "";
							$addqbuildvalues = "";

							## figure out which level we need to put this referral into. The referrer is the new persons parent 1 and the referrers parent 1 is the new persons parent 2 etc.
							for ($p=1;$p<=$matrixdepth;$p++)
							{
								$addqbuildfields = $addqbuildfields . "parent" . $p . "," . "parent" . $p . "username,";
							}

							for($i=1;$i<=$matrixdepth;$i++)
							{
								$levelvariablename = "L" . $i;
								eval("\$levelvariablename = mysql_result(\$downliner,0,\"$levelvariablename\");");
								$Lname = $levelvariablename;
								$maxrefsinthislevel = pow($matrixwidth, $i);
								if ($Lname < $maxrefsinthislevel)
								{
									#echo "Level $i<br>Has $Lname Referrals In It<hr>";
									if ($i > 1)
									{
									$onelessthanlevel = $i-1;
									$addq = "select * from $matrixtablename where parent$onelessthanlevel='$downlinereferrerid' and L1<$matrixwidth order by id,L1 limit 1";
									$addr = mysql_query($addq);
									$addrow = mysql_num_rows($addr);
									if ($addrow > 0)
									{
									$newreferrername = mysql_result($addr,0,"username");
									$newreferrerid = mysql_result($addr,0,"id");
									$theparent1 = $newreferrerid;
									$theparent1username = $newreferrername;
									$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
									$addr1 =  mysql_query($addq1);

									$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

									## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
									$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

									} # if ($addrow > 0)
									} # if ($i > 1)
									if ($i == 1)
									{
									$theparent1 = $downlinereferrerid;
									$theparent1username = $urlreferrername;
									$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
									$addr1 =  mysql_query($addq1);
									$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

									## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
									$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

									} # if ($i == 1)
								break;
								} # if ($Lname < $maxrefsinthislevel)
							} # for($i=1;$i<=$matrixdepth;$i++)

								$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
								$por = mysql_query($poq);
								$porows = mysql_num_rows($por);
								if ($porows > 0)
								{
								$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
								$positionordernumber = $lastpositionordernumber+1;
								}
								$urlreferrerq = "select * from members where userid=\"$username\"";
								$urlreferrerr = mysql_query($urlreferrerq);
								$urlreferrerrows = mysql_num_rows($urlreferrerr);
								if ($urlreferrerrows > 0)
										{
										$urlreferrer = mysql_result($urlreferrerr,0,"referid");
										}
								$addq0 = "insert into $matrixtablename (username," . $addqbuildfields . "urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$username\"," . $addqbuildvalues . "\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
								$addr0 =  mysql_query($addq0) or die(mysql_error());
								$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
								$addr0 = mysql_query($addq0);
							} # if ($downlinerows > 0)
						} # if ($row0 < 1)		
					} # if ($dotheyhaveapositionrows > 0)
				} # if ($uplinerows > 0)
		} # function getNextUplineSponor($referrer_username)
########################################################################
function MatrixAdd($username,$matrixlevelname,$matrixwidth,$matrixdepth,$matrixprice,$matrixpayout,$givereentrythislevel,$matrixsequence,$matrixid,$cyclecommissionforsponsor)
{
global $paychoice,$transaction,$adpackid;
# make sure userid exists before adding to a matrix.
$q00 = "select * from members where userid=\"$username\"";
$r00 = mysql_query($q00);
$row00 = mysql_num_rows($r00);
if ($row00 > 0)
{
# adpack that comes wih a matrix position.
if ($adpackid != "")
{
$apackq = "select * from adpacks where id=\"$adpackid\"";
$apackr = mysql_query($apackq);
$apackrows = mysql_num_rows($apackr);
if ($apackrows > 0)
{
$countq = "update adpacks set howmanytimeschosen=howmanytimeschosen+1 where id=\"$adpackid\"";
$countr = mysql_query($countq);
$description = mysql_result($apackr,0,"description");
$points = mysql_result($apackr,0,"points");
$surfcredits = mysql_result($apackr,0,"surfcredits");
$banner_num = mysql_result($apackr,0,"banner_num");
$banner_views = mysql_result($apackr,0,"banner_views");
$solo_num = mysql_result($apackr,0,"solo_num");
$traffic_num = mysql_result($apackr,0,"traffic_num");
$traffic_views = mysql_result($apackr,0,"traffic_views");
$login_num = mysql_result($apackr,0,"login_num");
$login_views = mysql_result($apackr,0,"login_views");
$hotlink_num = mysql_result($apackr,0,"hotlink_num");
$hotlink_views = mysql_result($apackr,0,"hotlink_views");
$button_num = mysql_result($apackr,0,"button_num");
$button_views = mysql_result($apackr,0,"button_views");
$ptc_num = mysql_result($apackr,0,"ptc_num");
$ptc_views = mysql_result($apackr,0,"ptc_views");
$featuredad_num = mysql_result($apackr,0,"featuredad_num");
$featuredad_views = mysql_result($apackr,0,"featuredad_views");
$hheaderad_num = mysql_result($apackr,0,"hheaderad_num");
$hheaderad_views = mysql_result($apackr,0,"hheaderad_views");
$hheadlinead_num = mysql_result($apackr,0,"hheadlinead_num");
$hheadlinead_views = mysql_result($apackr,0,"hheadlinead_views");
########################################################
if ($points > 0)
	{
	mysql_query("UPDATE members SET points=points+".$points." WHERE userid='".$username."'");
	}
if ($surfcredits > 0)
	{
	mysql_query("UPDATE members SET surfcredits=surfcredits+".$surfcredits." WHERE userid='".$username."'");
	}
if ($solo_num > 0)
	{
		$count = $solo_num;
		while($count > 0) {
			mysql_query("INSERT INTO `solos` (`id` ,`userid` ,`approved` ,`subject` ,`adbody` ,`sent` ,`added`) VALUES (NULL , '".$username."', '0', '', '', '0', '0')");
			$count--;
		}
	}
if (($featuredad_num > 0) and ($featuredad_views > 0))
	{
		$count = $featuredad_num;
		while($count > 0) {
			mysql_query("insert into featuredads (userid,max,purchase) values('$username','".$featuredad_views."',NOW())");
			$count--;
			}
	}
if (($hheaderad_num > 0) and ($hheaderad_views > 0))
	{
		$count = $hheaderad_num;
		while($count > 0) {
			mysql_query("insert into hheaderads (userid,max,purchase) values('$username','".$hheaderad_views."',NOW())");
			$count--;
			}
	}
if (($hheadlinead_num > 0) and ($hheadlinead_views > 0))
	{
		$count = $hheadlinead_num;
		while($count > 0) {
			mysql_query("insert into hheadlineads (userid,max,purchase) values('$username','".$hheadlinead_views."',NOW())");
			$count--;
			}
	}
if (($banner_num > 0) and ($banner_views > 0))
	{
		$count = $banner_num;
		while($count > 0) {
			mysql_query("INSERT INTO `banners` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$username."', '0', '0', '0', '".$banner_views."', '0')");
			$count--;
		}
	}
if (($button_num > 0) and ($button_views > 0))
	{
		$count = $button_num;
		while($count > 0) {
			mysql_query("INSERT INTO `buttons` ( `id` , `name` , `bannerurl` , `targeturl` , `userid` , `status` , `shown` , `clicks` , `max` , `added` )VALUES (NULL , '', '', '', '".$username."', '0', '0', '0', '".$button_views."', '0')");
			$count--;
		}
	}
if (($login_num > 0) and ($login_views > 0))
	{
		$count = $login_num;
		while($count > 0) {
			mysql_query("insert into loginads (userid,max) values('$username','".$login_views."')");
			$count--;
		}
	}
if (($traffic_num > 0) and ($traffic_views > 0))
	{
		$count = $traffic_num;
		while($count > 0) {
			mysql_query("insert into tlinks (userid,paid) values('$username','".$traffic_views."')");
			$count--;
		}
	}
if (($hotlink_num > 0) and ($hotlink_views > 0))
	{
		$count = $hotlink_num;
		while($count > 0) {
			mysql_query("insert into hotlinks (userid,max) values('$username','".$hotlink_views."')");
			$count--;
		}
	}
if (($ptc_num > 0) and ($ptc_views > 0))
	{
		$count = $ptc_num;
		while($count > 0) {
			mysql_query("insert into ptcads (userid,paid) values('$username','".$ptc_views."')");
			$count--;
		}
	}
} # if ($apackrows > 0)
} # if ($adpackid != "")

$matrixtablename = "matrix" . $matrixid;
##################################################################
# Start Follow Me Matrix Entry - Traditional Matrix where Referrals are Placed in Sponsor's Downline
##################################################################
# get member's url sponsor
$q00 = "select * from members where userid=\"$username\"";
$r00 = mysql_query($q00);
$row00 = mysql_num_rows($r00);
if ($row00 < 1)
{
# member doesn't exist.
exit;
} # if ($row00 < 1)
if ($row00 > 0)
{
$referrerusername = mysql_result($r00,0,"referid");
$uplineq = "select * from members where userid=\"$referrerusername\"";
$upliner = mysql_query($uplineq);
$uplinerows = mysql_num_rows($upliner);
if ($uplinerows < 1)
		{
		$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
		$vacancyr = mysql_query($vacancyq);
		$vacancyrows = mysql_num_rows($vacancyr);
		if ($vacancyrows > 0)
		{
		$vacancyid = mysql_result($vacancyr,0,"id");
		$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
		$addr = mysql_query($addq);
		$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
		$addr0 = mysql_query($addq0);
			for($i=1;$i<=$matrixdepth;$i++)
			{
			$parentid = "parent" . $i;
			$parentusername = "parent" . $i . "username";
			$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
			$refr = mysql_query($refq);
			} # for($i=1;$i<=$matrixdepth;$i++)
		} # if ($vacancyrows > 0)
		if ($vacancyrows < 1)
		{
		# make new matrix with no sponsor because the upline sponsor isn't in the members table at all. 
		# so it is not possible to check any further upline.
		$getidq = "select * from $matrixtablename order by id desc limit 1";
		$getidr = mysql_query($getidq);
		$getidrows = mysql_num_rows($getidr);
		if ($getidrows < 1)
			{
			$getid = 1;
			}
		if ($getidrows > 0)
			{
			$getidlast = mysql_result($getidr,0,"id");
			$getid = $getidlast+1;
			}
			$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
			$por = mysql_query($poq);
			$porows = mysql_num_rows($por);
			if ($porows > 0)
			{
			$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
			$positionordernumber = $lastpositionordernumber+1;
			}
			$urlreferrerq = "select * from members where userid=\"$username\"";
			$urlreferrerr = mysql_query($urlreferrerq);
			$urlreferrerrows = mysql_num_rows($urlreferrerr);
			if ($urlreferrerrows > 0)
					{
					$urlreferrer = mysql_result($urlreferrerr,0,"referid");
					}
			$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
			$newr = mysql_query($newq);
			$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
			$addr0 = mysql_query($addq0);	
		} # if ($vacancyrows < 1)
		} # if ($uplinerows < 1)
if ($uplinerows > 0)
		{
		$referrerusername_nextupline = mysql_result($upliner,0,"referid");
		# referrer exists in members table. Check if they are in the matrix.
		## make sure the referrer exists in the matrix.
		$q01 = "select * from $matrixtablename where username=\"$referrerusername\" order by id limit 1";
		$r01 = mysql_query($q01);
		$row01 = mysql_num_rows($r01);
		if ($row01 > 0)
		{
			$referrerpositionid = mysql_result($r01,0,"id");
		## the referrer exists so get the first matrix position for the referrer that still needs a downline.
			## Build Query: ie. select * from matrix where userid=\"$referrer\" and (L1<5 or L2<25 or L3<125 or L4<625 or L5<3125 or L6<15625) order by id limit 1 
			$q0build = "";
			for($j=1;$j<=$matrixdepth;$j++)
			{
			$refsinthislevel = pow($matrixwidth, $j);
				if ($j < $matrixdepth)
				{
				$q0build = $q0build . "L" . $j . "<" . $refsinthislevel . " or ";
				}
				if ($j == $matrixdepth)
				{
				$q0build = $q0build . "L" . $j . "<" . $refsinthislevel;
				}
			}
			$q0 = "select * from $matrixtablename where username=\"$referrerusername\" and (" . $q0build . ") order by id limit 1";
			$r0 = mysql_query($q0);
			$row0 = mysql_num_rows($r0);
			if ($row0 > 0)
			{
			## the referrer has a matrix that needs more referrals still. 
			$urlreferrername = $referrerusername;
			$id = mysql_result($r0,0,"id");

			$addqbuildfields = "";
			$addqbuildvalues = "";

			## figure out which level we need to put this referral into. The referrer is the new persons parent 1 and the referrers parent 1 is the new persons parent 2 etc.
			for ($p=1;$p<=$matrixdepth;$p++)
			{
				$addqbuildfields = $addqbuildfields . "parent" . $p . "," . "parent" . $p . "username,";
			}

			for($i=1;$i<=$matrixdepth;$i++)
			{
				# below are results of this query: $q01 = "select * from matrix where username=\"$referrerusername\" order by id limit 1";
				$levelvariablename = "L" . $i;
				eval("\$levelvariablename = mysql_result(\$r0,0,\"$levelvariablename\");");
				$Lname = $levelvariablename;
				$maxrefsinthislevel = pow($matrixwidth, $i);
				if ($Lname < $maxrefsinthislevel)
				{
					#echo "Level $i<br>Has $Lname Referrals In It<hr>";
					if ($i > 1)
					{
					$onelessthanlevel = $i-1;
					$addq = "select * from $matrixtablename where parent$onelessthanlevel='$id' and L1<$matrixwidth order by id,L1 limit 1";
					$addr = mysql_query($addq);
					$addrow = mysql_num_rows($addr);
					if ($addrow > 0)
					{
					$newreferrername = mysql_result($addr,0,"username");
					$newreferrerid = mysql_result($addr,0,"id");
					$theparent1 = $newreferrerid;
					$theparent1username = $newreferrername;
					$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
					$addr1 =  mysql_query($addq1);

					$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

					## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
					$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

					} # if ($addrow > 0)
					} # if ($i > 1)
					if ($i == 1)
					{
					$theparent1 = $id;
					$theparent1username = $urlreferrername;
					$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
					$addr1 =  mysql_query($addq1);
					$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

					## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
					$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

					} # if ($i == 1)
				break;
				} # if ($Lname < $maxrefsinthislevel)
			} # for($i=1;$i<=$matrixdepth;$i++)

				$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
				$por = mysql_query($poq);
				$porows = mysql_num_rows($por);
				if ($porows > 0)
				{
				$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
				$positionordernumber = $lastpositionordernumber+1;
				}
				$urlreferrerq = "select * from members where userid=\"$username\"";
				$urlreferrerr = mysql_query($urlreferrerq);
				$urlreferrerrows = mysql_num_rows($urlreferrerr);
				if ($urlreferrerrows > 0)
						{
						$urlreferrer = mysql_result($urlreferrerr,0,"referid");
						}
				$addq0 = "insert into $matrixtablename (username," . $addqbuildfields . "urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$username\"," . $addqbuildvalues . "\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
				$addr0 =  mysql_query($addq0) or die(mysql_error());
				$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
				$addr0 = mysql_query($addq0);
			} # if ($row0 > 0)
			if ($row0 < 1)
			{
			######## the referrers matrix must be full because all their levels are filled for every position they have. Get their first downline referral who needs a new referral.
			$addqdownlinebuildfields = "";
			for ($d=1;$d<=$matrixdepth;$d++)
			{
				$addqdownlinebuildfields .= "parent" . $d . "=\"" . $referrerpositionid . "\" or ";
			}
			$addqdownlinebuildfields = substr($addqdownlinebuildfields, 0, -3);
			$downlineq = "select * from $matrixtablename where cycled!=\"yes\" and (" . $addqdownlinebuildfields . ") order by id limit 1";
			$downliner = mysql_query($downlineq);
			$downlinerows = mysql_num_rows($downliner);
			if ($downlinerows < 1)
				{
				# may indicate a bug.
				$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
				$vacancyr = mysql_query($vacancyq);
				$vacancyrows = mysql_num_rows($vacancyr);
				if ($vacancyrows > 0)
				{
				$vacancyid = mysql_result($vacancyr,0,"id");
				$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
				$addr = mysql_query($addq);
				$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
				$addr0 = mysql_query($addq0);
					for($i=1;$i<=$matrixdepth;$i++)
					{
					$parentid = "parent" . $i;
					$parentusername = "parent" . $i . "username";
					$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
					$refr = mysql_query($refq);
					} # for($i=1;$i<=$matrixdepth;$i++)
				} # if ($vacancyrows > 0)
				if ($vacancyrows < 1)
				{
				$getidq = "select * from $matrixtablename order by id desc limit 1";
				$getidr = mysql_query($getidq);
				$getidrows = mysql_num_rows($getidr);
				if ($getidrows < 1)
					{
					$getid = 1;
					}
				if ($getidrows > 0)
					{
					$getidlast = mysql_result($getidr,0,"id");
					$getid = $getidlast+1;
					}
					$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
					$por = mysql_query($poq);
					$porows = mysql_num_rows($por);
					if ($porows > 0)
					{
					$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
					$positionordernumber = $lastpositionordernumber+1;
					}
					$urlreferrerq = "select * from members where userid=\"$username\"";
					$urlreferrerr = mysql_query($urlreferrerq);
					$urlreferrerrows = mysql_num_rows($urlreferrerr);
					if ($urlreferrerrows > 0)
							{
							$urlreferrer = mysql_result($urlreferrerr,0,"referid");
							}
					$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
					$newr = mysql_query($newq);
					$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
					$addr0 = mysql_query($addq0);
				} # if ($vacancyrows < 1)
				} # if ($downlinerows < 1)
			if ($downlinerows > 0)
				{
				# give this referral (of the referrer) the new position in their downline.
				$downlinereferrerid = mysql_result($downliner,0,"id");
				$downlinereferrer = mysql_result($downliner,0,"username");
				$urlreferrername = $downlinereferrer;

				$addqbuildfields = "";
				$addqbuildvalues = "";

				## figure out which level we need to put this referral into. The referrer is the new persons parent 1 and the referrers parent 1 is the new persons parent 2 etc.
				for ($p=1;$p<=$matrixdepth;$p++)
				{
					$addqbuildfields = $addqbuildfields . "parent" . $p . "," . "parent" . $p . "username,";
				}

				for($i=1;$i<=$matrixdepth;$i++)
				{
					$levelvariablename = "L" . $i;
					eval("\$levelvariablename = mysql_result(\$downliner,0,\"$levelvariablename\");");
					$Lname = $levelvariablename;
					$maxrefsinthislevel = pow($matrixwidth, $i);
					if ($Lname < $maxrefsinthislevel)
					{
						#echo "Level $i<br>Has $Lname Referrals In It<hr>";
						if ($i > 1)
						{
						$onelessthanlevel = $i-1;
						$addq = "select * from $matrixtablename where parent$onelessthanlevel='$downlinereferrerid' and L1<$matrixwidth order by id,L1 limit 1";
						$addr = mysql_query($addq);
						$addrow = mysql_num_rows($addr);
						if ($addrow > 0)
						{
						$newreferrername = mysql_result($addr,0,"username");
						$newreferrerid = mysql_result($addr,0,"id");
						$theparent1 = $newreferrerid;
						$theparent1username = $newreferrername;
						$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
						$addr1 =  mysql_query($addq1);

						$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

						## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
						$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

						} # if ($addrow > 0)
						} # if ($i > 1)
						if ($i == 1)
						{
						$theparent1 = $downlinereferrerid;
						$theparent1username = $urlreferrername;
						$addq1 = "update $matrixtablename set L1=L1+1 where id=\"$theparent1\"";
						$addr1 =  mysql_query($addq1);
						$addqbuildvalues = "\"$theparent1\",\"$theparent1username\",";

						## need to get parent2 -> matrixdepth and L2->matrixdepth to update those
						$addqbuildvalues = GetParents($theparent1, $matrixtablename, 2, $addqbuildvalues);

						} # if ($i == 1)
					break;
					} # if ($Lname < $maxrefsinthislevel)
				} # for($i=1;$i<=$matrixdepth;$i++)

					$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
					$por = mysql_query($poq);
					$porows = mysql_num_rows($por);
					if ($porows > 0)
					{
					$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
					$positionordernumber = $lastpositionordernumber+1;
					}
					$urlreferrerq = "select * from members where userid=\"$username\"";
					$urlreferrerr = mysql_query($urlreferrerq);
					$urlreferrerrows = mysql_num_rows($urlreferrerr);
					if ($urlreferrerrows > 0)
							{
							$urlreferrer = mysql_result($urlreferrerr,0,"referid");
							}
					$addq0 = "insert into $matrixtablename (username," . $addqbuildfields . "urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$username\"," . $addqbuildvalues . "\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
					$addr0 =  mysql_query($addq0) or die(mysql_error());
					$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
					$addr0 = mysql_query($addq0);
				} # if ($downlinerows > 0)
			} # if ($row0 < 1)
		} # if ($row01 > 0)
		##################
		if ($row01 < 1)
		{
		## the referrer does not exist in the matrix, but is in the members table. Get the next available upline sponsor that has a matrix position.
		## If the upline sponsor chosen's matrix is full, put them under one of his referrals.
			if (($referrerusername_nextupline == $referrerusername) or ($referrerusername_nextupline == ""))
				{
				$vacancyq = "select * from $matrixtablename where username=\"VACANT\" order by id limit 1";
				$vacancyr = mysql_query($vacancyq);
				$vacancyrows = mysql_num_rows($vacancyr);
				if ($vacancyrows > 0)
				{
				$vacancyid = mysql_result($vacancyr,0,"id");
				$addq = "update $matrixtablename set username=\"$username\",paychoice=\"$paychoice\",transaction=\"$transaction\",signupdate=NOW() where id=\"$vacancyid\"";
				$addr = mysql_query($addq);
				$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
				$addr0 = mysql_query($addq0);
					for($i=1;$i<=$matrixdepth;$i++)
					{
					$parentid = "parent" . $i;
					$parentusername = "parent" . $i . "username";
					$refq = "update $matrixtablename set $parentusername=\"$username\" where $parentid=\"$vacancyid\"";
					$refr = mysql_query($refq);
					} # for($i=1;$i<=$matrixdepth;$i++)
				} # if ($vacancyrows > 0)
				if ($vacancyrows < 1)
				{
				# make new matrix with no sponsor because the upline sponsor referred themselves or their referid is blank.
				# so it is not possible to check any further upline.
				$getidq = "select * from $matrixtablename order by id desc limit 1";
				$getidr = mysql_query($getidq);
				$getidrows = mysql_num_rows($getidr);
				if ($getidrows < 1)
					{
					$getid = 1;
					}
				if ($getidrows > 0)
					{
					$getidlast = mysql_result($getidr,0,"id");
					$getid = $getidlast+1;
					}
					$poq = "select * from $matrixtablename order by positionordernumber desc limit 1";
					$por = mysql_query($poq);
					$porows = mysql_num_rows($por);
					if ($porows > 0)
					{
					$lastpositionordernumber = mysql_result($por,0,"positionordernumber");
					$positionordernumber = $lastpositionordernumber+1;
					}
					$urlreferrerq = "select * from members where userid=\"$username\"";
					$urlreferrerr = mysql_query($urlreferrerq);
					$urlreferrerrows = mysql_num_rows($urlreferrerr);
					if ($urlreferrerrows > 0)
							{
							$urlreferrer = mysql_result($urlreferrerr,0,"referid");
							}
					$newq = "insert into $matrixtablename (id,username,urlreferrername,paychoice,transaction,positionordernumber,signupdate) values (\"$getid\",\"$username\",\"$urlreferrer\",\"$paychoice\",\"$transaction\",\"$positionordernumber\",NOW())";
					$newr = mysql_query($newq);
					$addq0 = "insert into transactions (userid,action,`date`,quantity) values ('$username','$transaction - $matrixid Matrix Phase: $matrixlevelname Position','".time()."','$amount')";
					$addr0 = mysql_query($addq0);	
				} # if ($vacancyrows < 1)
				} # if (($referrerusername_nextupline == $referrer_username) or ($referrerusername_nextupline == ""))
			else
				{
				$upline_referrerusername_touse = getNextUplineSponor($matrixtablename,$referrerusername_nextupline,$username,$paychoice,$transaction,$matrixid,$matrixlevelname,$matrixwidth,$matrixdepth,$amount);
				}
		} # if ($row01 < 1)
	} # if ($uplinerows > 0)
} # } # if ($row00 > 0)
##################################################################
# End Follow Me Matrix Entry - Traditional Matrix where Referrals are Placed in Sponsor's Downline
##################################################################
} # if ($row00 > 0)

######################################################################################################## CYCLE CHECK
$refsinlowestmatrixlevel = pow($matrixwidth, $matrixdepth);
$cycleq = "select * from $matrixtablename where L$matrixdepth>=$refsinlowestmatrixlevel and cycled!=\"yes\"";
$cycler = mysql_query($cycleq);
$cyclerow = mysql_num_rows($cycler);
if ($cyclerow > 0)
{
	while ($cyclerowz = mysql_fetch_array($cycler))
	{
		$cycleid = $cyclerowz["id"];
		$cycleusername = $cyclerowz["username"];
		$cycleq2build = "";
		for($o=1;$o<=$matrixdepth;$o++)
		{
		$maxrefsinthislevel = pow($matrixwidth, $o);
		$cycleq2build = $cycleq2build . "L$o=" . $maxrefsinthislevel . ",";
		} # for($o=1;$o<=$matrixdepth;$o++)
		$cycleq2 = "update $matrixtablename set owed=owed+" . $matrixpayout . "," . $cycleq2build . "cycled=\"yes\", datecycled=NOW(), paid=\"yes\", lastpaid=NOW() where id=\"$cycleid\"";
		$cycler2 = mysql_query($cycleq2);
		$getpaidq = "update members set commission=commission+" . $matrixpayout . " where userid=\"$cycleusername\"";
		$getpaidr = mysql_query($getpaidq);
		if ($cyclecommissionforsponsor > 0)
		{
		$refq = "select * from members where userid=\"$cycleusername\"";
		$refr = mysql_query($refq);
		$refrows = mysql_num_rows($refr);
		if ($refrows > 0)
			{
			$referrer = mysql_result($refr,0,"referid");
			$refq2 = "update members set commission=commission+" . $cyclecommissionforsponsor . " where userid=\"$referrer\"";
			$refr2 = mysql_query($refq2);
			}
		}
		if ($givereentrythislevel == "yes")
		{
		$thislevel = MatrixAdd($cycleusername,$matrixlevelname,$matrixwidth,$matrixdepth,$matrixprice,$matrixpayout,$givereentrythislevel,$matrixsequence,$matrixid,$cyclecommissionforsponsor);
		}
		$nextmatrixsequence = $matrixsequence+1;
		$nq = "select * from matrixconfiguration where matrixsequence=\"$nextmatrixsequence\"";
		$nr = mysql_query($nq);
		$nrows = mysql_num_rows($nr);
		if ($nrows > 0)
		{
		$nextmatrixid = mysql_result($nr,0,"id");
		$nextmatrixlevelname = mysql_result($nr,0,"matrixlevelname");
		$nextmatrixwidth = mysql_result($nr,0,"matrixwidth");
		$nextmatrixdepth = mysql_result($nr,0,"matrixdepth");
		$nextmatrixprice = mysql_result($nr,0,"matrixprice");
		$nextmatrixpayout = mysql_result($nr,0,"matrixpayout");
		$nextgivereentrythislevel = mysql_result($nr,0,"givereentrythislevel");
		$nextcyclecommissionforsponsor = mysql_result($nr,0,"cyclecommissionforsponsor");
		$nextlevel = MatrixAdd($cycleusername,$nextmatrixlevelname,$nextmatrixwidth,$nextmatrixdepth,$nextmatrixprice,$nextmatrixpayout,$nextgivereentrythislevel,$nextmatrixsequence,$nextmatrixid,$nextcyclecommissionforsponsor);
		} # if ($nrows > 0)
		if ($nrows < 1)
		{
		$howmanypositions = 1;
		$firstmatrixq = "select * from matrixconfiguration order by id limit 1";
		$firstmatrixr = mysql_query($firstmatrixq);
		$firstmatrixrows = mysql_num_rows($firstmatrixr);
		if ($firstmatrixrows > 0)
			{
				$nextmatrixid = mysql_result($firstmatrixr,0,"id");
				$nextmatrixlevelname = mysql_result($firstmatrixr,0,"matrixlevelname");
				$nextmatrixwidth = mysql_result($firstmatrixr,0,"matrixwidth");
				$nextmatrixdepth = mysql_result($firstmatrixr,0,"matrixdepth");
				$nextmatrixprice = mysql_result($firstmatrixr,0,"matrixprice");
				$nextmatrixpayout = mysql_result($firstmatrixr,0,"matrixpayout");
				$nextgivereentrythislevel = mysql_result($firstmatrixr,0,"givereentrythislevel");
				$nextcyclecommissionforsponsor = mysql_result($firstmatrixr,0,"cyclecommissionforsponsor");
				$nextlevel = MatrixAdd($cycleusername,$nextmatrixlevelname,$nextmatrixwidth,$nextmatrixdepth,$nextmatrixprice,$nextmatrixpayout,$nextgivereentrythislevel,$nextmatrixsequence,$nextmatrixid,$nextcyclecommissionforsponsor);
			} # if ($firstmatrixrows > 0)
		} # if ($nrows < 1)
	}
} # if ($cyclerow > 0)

######################################################################################################## COMPRESS
$q = "update $matrixtablename set positionordernumber=1 where id=1";
$r = mysql_query($q);
$q = "select * from $matrixtablename where username!=\"VACANT\" order by id";
$r = mysql_query($q);
$rows = mysql_num_rows($r);
$positionordernumber = 0;
if ($rows > 0)
{
	while ($rowz = mysql_fetch_array($r))
	{
	$mid = $rowz["id"];
	$positionordernumber = $positionordernumber+1;
	for($i=1;$i<=$matrixdepth;$i++)
	{
	$levelname = "L" . $i;
	$parentidname = "parent" . $i;
	$q2 = "select * from $matrixtablename where $parentidname=\"".$mid."\"";
	$r2 = mysql_query($q2);
	$rows2 = mysql_num_rows($r2);
	$q3 = "update matrix set $levelname=\"".$rows2."\",positionordernumber=".$positionordernumber.",id=".$positionordernumber." where id=\"".$mid."\"";
	$r3 = mysql_query($q3);
	$q4 = "update matrix set $parentidname=".$positionordernumber." where $parentidname=".$mid;
	#echo $q3 . "<br>" . $q4 . "<br>";
	$r4 = mysql_query($q4);
	} # for($i=1;$i<=$matrixdepth;$i++)
	} # while ($rowz = mysql_fetch_array($r))
} # if ($rows > 0)


} # function MatrixAdd
?>