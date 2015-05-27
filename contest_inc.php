<?php
echo date("Y-m-d H:i:s");
 
?>

 <!-- start contest list copy here -->
                        <table cellpadding="4" cellspacing="0" border="1">
                            <tr>
                                <td>Member Name</td>
								<td align="right">Referrals</td>
                            </tr>
							<?php 	
									$_sql = "SELECT m1.referid, m2.name, count(*) as referrals FROM members m1
									inner join members m2 on m1.referid=m2.userid 
									where m2.verified=1 and m1.verified=1 and m1.joindate > '".$conteststart."'
									group by m1.referid, m2.name ORDER BY referrals DESC";
									$list=mysql_query($_sql) or die(mysql_error());
									if(mysql_affected_rows()>0) {
										while ($row = mysql_fetch_array($list)) {
											echo "<tr><td>" . $row["name"] . "</td>";
											echo "<td align=\"right\">" . $row["referrals"] . "</td></tr>";
										}
									}
							?>
                        </table>
 <!-- end copy here -->