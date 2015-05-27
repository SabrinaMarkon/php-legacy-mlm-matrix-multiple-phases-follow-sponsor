<?
	//determine whether win or loose....
	$num=rand(1,$scratchodds);
	if ($num==1) {
    	$win=1;
    }
    else {
    	$win=0;
    }
    //determine the numbers
    if ($win==1) {
        $winning=rand(1,$maxwinning);
        $num1=$winning;
        $num2=$winning;
        $num3=$winning;
    }
    else {
        $num1=rand(1,$maxwinning);
        $num2=rand(1,$maxwinning);
        $num3=rand(1,$maxwinning);
        //ensure they are different.
        if (($num1==$num2)&&($num2==$num3)) {
			//its a win after all - no worries - lucky sod!
            $win=1;
        }
    }

?>
<center>
<form method="GET" action="browseads.php">
<input type="hidden" name="win" value="<? echo $win; ?>">
<input type="hidden" name="pointswon" value="<? echo $num1; ?>">
<input type="hidden" name="nextad" value="1">
<input type="hidden" name="action" value="claim">
<input type="submit" value=" Done ">
</form> </center>
<STYLE>
.general3 {background-color:#333333;z-index:4}
.general2 {background-color:#555555;z-index:3}
.general1 {background-color:#777777;z-index:2}
.general0 {background-color:#999999;z-index:1}
</STYLE>
<SCRIPT>
function scmetal() {
for (i=0;i<192;i++)
document.all['M'+i].style.display="";
}
</SCRIPT>
<DIV STYLE="position: relative;height: 300">
<SCRIPT>
// This script must be within the relatively positioned DIV.
for (p=0;p<3;p++)
for (i=0;i<4;i++)
for (j=3;j<7;j++)
for (k=0;k<5;k++) {
idn=p*64+i*16+j*4+k;
document.write('<DIV ID="M'+idn+'"onmouseover="style.display=\'none\'"CLASS="general'+i+'"STYLE="position:absolute;width:25;height:25;top:'+eval(0+j*25)+';left:'+eval(50+p*125+k*25)+'"></DIV>');
}
</SCRIPT>

  <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="360" HEIGHT="222" STYLE="position:absolute;top:0;left:50;width:375;height:100;z-index:0">
    <TR>
      <TD bgcolor="<? echo $basecolour; ?>" ROWSPAN="1" COLSPAN="3" WIDTH="375" HEIGHT="76">
	    <center><H2><? echo $sitename; ?></H2></center></TD>
    </TR>
    <TR>
    	<TD bgcolor="<? echo $basecolour; ?>" ROWSPAN="1" COLSPAN="1" WIDTH="126" HEIGHT="95"><H1><center><? echo $num1; ?></center></H1></TD>
	    <TD bgcolor="<? echo $basecolour; ?>" ROWSPAN="1" COLSPAN="1" WIDTH="126" HEIGHT="95"><H1><center><? echo $num2; ?></center></H1></TD>
	    <TD bgcolor="<? echo $basecolour; ?>" ROWSPAN="1" COLSPAN="1" WIDTH="126" HEIGHT="95"><H1><center><? echo $num3; ?></center></H1></TD>
	</TR>
	<TR>
		<TD bgcolor="<? echo $basecolour; ?>" ROWSPAN="1" COLSPAN="3" WIDTH="375" HEIGHT="45"><br></TD>
	</TR>
</TABLE>
</DIV>

