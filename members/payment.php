<?php



session_start();



include "../header.php";

include "../config.php";

include "../style.php";



if( session_is_registered("ulogin") ) {



	include "navigation.php";

    include "../banners.php";



    ?> 
<BR><BR><BR>
<div style="text-align: center;">
<div style="text-align: left;">
<div style="text-align: left;"> </div>
<div style="margin-left: 80px;">
<div style="text-align: center;"> </div>
</div>
<div style="margin-left: 80px;">
<div style="text-align: left;">
<div style="text-align: center;"><font size="2" style="font-weight: bold;"><span style="font-family: Trebuchet MS;"><font style="color: rgb(0, 0, 128);"><span style="color: rgb(255, 0, 0);"></span></font></span></font></div>
<div style="text-align: center;">
<div style="text-align: left;"><font size="2" style="font-weight: bold;"><span style="font-family: Trebuchet MS;"><font style="color: rgb(0, 0, 128);"><span style="color: rgb(255, 0, 0);"><font size="5" style="color: rgb(0, 0, 128);">REQUEST PAYMENT</font></span></font></span></font><br/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="Word.Document" name="ProgId"/>
<meta content="Microsoft Word 12" name="Generator"/>
<meta content="Microsoft Word 12" name="Originator"/>
<link href="file:///C:\DOCUME~1\ADMINI~1\LOCALS~1\Temp\msohtmlclip1\01\clip_filelist.xml" rel="File-List"/>
<link href="file:///C:\DOCUME~1\ADMINI~1\LOCALS~1\Temp\msohtmlclip1\01\clip_themedata.thmx" rel="themeData"/>
<link href="file:///C:\DOCUME~1\ADMINI~1\LOCALS~1\Temp\msohtmlclip1\01\clip_colorschememapping.xml" rel="colorSchemeMapping"/><!--[if gte mso 9]><xml>
<w:WordDocument>
<w:View>Normal</w:View>
<w:Zoom>0</w:Zoom>
<w:TrackMoves/>
<w:TrackFormatting/>
<w:PunctuationKerning/>
<w:ValidateAgainstSchemas/>
<w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
<w:IgnoreMixedContent>false</w:IgnoreMixedContent>
<w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
<w:DoNotPromoteQF/>
<w:LidThemeOther>EN-US</w:LidThemeOther>
<w:LidThemeAsian>X-NONE</w:LidThemeAsian>
<w:LidThemeComplexScript>TH</w:LidThemeComplexScript>
<w:Compatibility>
<w:BreakWrappedTables/>
<w:SnapToGridInCell/>
<w:ApplyBreakingRules/>
<w:WrapTextWithPunct/>
<w:UseAsianBreakRules/>
<w:DontGrowAutofit/>
<w:SplitPgBreakAndParaMark/>
<w:DontVertAlignCellWithSp/>
<w:DontBreakConstrainedForcedTables/>
<w:DontVertAlignInTxbx/>
<w:Word11KerningPairs/>
<w:CachedColBalance/>
</w:Compatibility>
<w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
<m:mathPr>
<m:mathFont m:val="Cambria Math"/>
<m:brkBin m:val="before"/>
<m:brkBinSub m:val="&#45;-"/>
<m:smallFrac m:val="off"/>
<m:dispDef/>
<m:lMargin m:val="0"/>
<m:rMargin m:val="0"/>
<m:defJc m:val="centerGroup"/>
<m:wrapIndent m:val="1440"/>
<m:intLim m:val="subSup"/>
<m:naryLim m:val="undOvr"/>
</m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
<w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
DefSemiHidden="true" DefQFormat="false" DefPriority="99"
LatentStyleCount="267">
<w:LsdException Locked="false" Priority="0" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
<w:LsdException Locked="false" Priority="9" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
<w:LsdException Locked="false" Priority="39" Name="toc 1"/>
<w:LsdException Locked="false" Priority="39" Name="toc 2"/>
<w:LsdException Locked="false" Priority="39" Name="toc 3"/>
<w:LsdException Locked="false" Priority="39" Name="toc 4"/>
<w:LsdException Locked="false" Priority="39" Name="toc 5"/>
<w:LsdException Locked="false" Priority="39" Name="toc 6"/>
<w:LsdException Locked="false" Priority="39" Name="toc 7"/>
<w:LsdException Locked="false" Priority="39" Name="toc 8"/>
<w:LsdException Locked="false" Priority="39" Name="toc 9"/>
<w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
<w:LsdException Locked="false" Priority="10" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Title"/>
<w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
<w:LsdException Locked="false" Priority="11" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
<w:LsdException Locked="false" Priority="22" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
<w:LsdException Locked="false" Priority="20" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
<w:LsdException Locked="false" Priority="59" SemiHidden="false"
UnhideWhenUsed="false" Name="Table Grid"/>
<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
<w:LsdException Locked="false" Priority="1" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 1"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
<w:LsdException Locked="false" Priority="34" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
<w:LsdException Locked="false" Priority="29" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
<w:LsdException Locked="false" Priority="30" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 1"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 2"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 2"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 3"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 3"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 4"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 4"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 5"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 5"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
<w:LsdException Locked="false" Priority="60" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
<w:LsdException Locked="false" Priority="61" SemiHidden="false"
UnhideWhenUsed="false" Name="Light List Accent 6"/>
<w:LsdException Locked="false" Priority="62" SemiHidden="false"
UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
<w:LsdException Locked="false" Priority="63" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
<w:LsdException Locked="false" Priority="64" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
<w:LsdException Locked="false" Priority="65" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
<w:LsdException Locked="false" Priority="66" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
<w:LsdException Locked="false" Priority="67" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
<w:LsdException Locked="false" Priority="68" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
<w:LsdException Locked="false" Priority="69" SemiHidden="false"
UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
<w:LsdException Locked="false" Priority="70" SemiHidden="false"
UnhideWhenUsed="false" Name="Dark List Accent 6"/>
<w:LsdException Locked="false" Priority="71" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
<w:LsdException Locked="false" Priority="72" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
<w:LsdException Locked="false" Priority="73" SemiHidden="false"
UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
<w:LsdException Locked="false" Priority="19" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
<w:LsdException Locked="false" Priority="21" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
<w:LsdException Locked="false" Priority="31" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
<w:LsdException Locked="false" Priority="32" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
<w:LsdException Locked="false" Priority="33" SemiHidden="false"
UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
<w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
<w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
</w:LatentStyles>
</xml><![endif]--><style type="text/css">
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;
	mso-font-charset:2;
	mso-generic-font-family:auto;
	mso-font-pitch:variable;
	mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
	{font-family:"Cordia New";
	panose-1:2 11 3 4 2 2 2 2 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:16777219 0 0 0 65537 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1073750139 0 0 159 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:36.0pt;
	margin-bottom:.0001pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{mso-style-priority:34;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-type:export-only;
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:36.0pt;
	mso-add-space:auto;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Cordia New";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page Section1
	{size:595.3pt 841.9pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;
	mso-header-margin:35.4pt;
	mso-footer-margin:35.4pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
 /* List Definitions */
 @list l0
	{mso-list-id:1806266384;
	mso-list-type:hybrid;
	mso-list-template-ids:-531486860 67698689 67698691 67698693 67698689 67698691 67698693 67698689 67698691 67698693;}
@list l0:level1
	{mso-level-number-format:bullet;
	mso-level-text:&#61623;;
	mso-level-tab-stop:none;
	mso-level-number-position:left;
	text-indent:-18.0pt;
	font-family:Symbol;}
ol
	{margin-bottom:0cm;}
ul
	{margin-bottom:0cm;}
-->
</style><!--[if gte mso 10]>
<style>
/* Style Definitions */
table.MsoNormalTable
{mso-style-name:"Table Normal";
mso-tstyle-rowband-size:0;
mso-tstyle-colband-size:0;
mso-style-noshow:yes;
mso-style-priority:99;
mso-style-qformat:yes;
mso-style-parent:"";
mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
mso-para-margin-top:0cm;
mso-para-margin-right:0cm;
mso-para-margin-bottom:10.0pt;
mso-para-margin-left:0cm;
line-height:115%;
mso-pagination:widow-orphan;
font-size:11.0pt;
mso-bidi-font-size:14.0pt;
font-family:"Calibri","sans-serif";
mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin;}
table.MsoTableGrid
{mso-style-name:"Table Grid";
mso-tstyle-rowband-size:0;
mso-tstyle-colband-size:0;
mso-style-priority:59;
mso-style-unhide:no;
border:solid black 1.0pt;
mso-border-themecolor:text1;
mso-border-alt:solid black .5pt;
mso-border-themecolor:text1;
mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
mso-border-insideh:.5pt solid black;
mso-border-insideh-themecolor:text1;
mso-border-insidev:.5pt solid black;
mso-border-insidev-themecolor:text1;
mso-para-margin:0cm;
mso-para-margin-bottom:.0001pt;
mso-pagination:widow-orphan;
font-size:11.0pt;
mso-bidi-font-size:14.0pt;
font-family:"Calibri","sans-serif";
mso-ascii-font-family:Calibri;
mso-ascii-theme-font:minor-latin;
mso-hansi-font-family:Calibri;
mso-hansi-theme-font:minor-latin;}
</style>
<![endif]-->
<table cellspacing="0" cellpadding="0" border="1" style="border: medium none ; background: rgb(253, 233, 217) none repeat scroll 0% 0%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; border-collapse: collapse;" class="MsoTableGrid">
    <tbody>
        <tr style="">
            <td width="616" valign="top" style="border: 6pt ridge red; padding: 0cm 5.4pt; width: 462.1pt;">
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><span style="">&nbsp;&nbsp;   </span><o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;">Hello Everyone!<o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><o:p>&nbsp;</o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>I apologize for the Payment Request   Button having issues!<span style="">&nbsp; </span>We missed one   file due to the Site Script Upgrade.<span style="">&nbsp; </span>Good   News we have fixed that already!<span style="">&nbsp; </span>So go   and request payments for your commissions. <o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><o:p>&nbsp;</o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;">If you have sent request already,  REQUEST AGAIN! <o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><o:p>&nbsp;</o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><i><span style="font-size: 14pt; color: red;">Effective Next Month</span></i></b><b><i><span style="font-size: 14pt; color: rgb(0, 32, 96);">, all payment requests will be paid </span></i></b><b><i><span style="font-size: 14pt; color: red;">every last week</span></i></b><b><i><span style="font-size: 14pt; color: rgb(0, 32, 96);"> of the month!<span style="">&nbsp; </span>I am too busy now to do reviews of your   payouts so I am going to make a one-day-schedule for all payouts and perhaps   do a MASS PAYMENT!<o:p></o:p></span></i></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;"><o:p>&nbsp;</o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoNormal"><b><span style="font-size: 14pt;">Make sure that you are eligible and   you have passed the requirements for withdrawing your commissions or your   requests will be denied!<o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpFirst"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">You   must have at least $1 on your commissions</span></b><b><span style="font-size: 14pt;"> </span></b><span style="font-size: 14pt;"> <b><o:p></o:p></b></span></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpMiddle"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">YOU   MUST BE ACTIVE</span></b><b><span style="font-size: 14pt;"> &ndash; logging in   regularly, viewing &amp; posting FREE ADS as well! <o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpMiddle"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">Following   Advertising Rules</span></b><b><span style="font-size: 14pt;"> &ndash; not posting   PTP Ads, posting English Ads alone, Posting appropriate contents, Posting   appropriate banner sizes<o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpMiddle"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">NOT   SENDING THREAT SUPPORT TICKETS</span></b><b><span style="font-size: 14pt;"> &ndash;   If you send us any threat emails, your accounts will be deleted!<span style="">&nbsp; </span>If there are issues, kindly send us a   polite email or inquiry.<span style="">&nbsp; </span>You will be   given due respect if you do the same.<o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpMiddle"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">YOU   MUST NOT BE HERE TO CLICK ONLY FOR CASH!</span></b><b><span style="font-size: 14pt;"><span style="">&nbsp; </span>We are not a PTC Site!<span style="">&nbsp; </span>Your commissions will be reviewed!<span style="">&nbsp; </span>If your commissions are only from VIEWING   ADS FOR CASH, then this will not be paid in Cash!<span style="">&nbsp; </span>You can trade this for an advertising   package or credits!<span style="">&nbsp; </span>If you have   referred at least 1 Upgraded Member, you can have your commission fairly   enough!<span style="">&nbsp; </span>If you do not have any   referral, upgrade yourself!<o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; text-indent: -18pt; line-height: normal;" class="MsoListParagraphCxSpMiddle"><!--[if !supportLists]--><span style="font-size: 14pt; font-family: Symbol;"><span style="">&middot;<span style="font-family: &quot;Times New Roman&quot;; font-style: normal; font-variant: normal; font-weight: normal; font-size: 7pt; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </span></span></span><!--[endif]--><b><span style="font-size: 14pt; color: rgb(192, 0, 0);">ASIAN   COUNTRIES MUST UPGRADE!</span></b><b><span style="font-size: 14pt;"><span style="">&nbsp;&nbsp; </span>No questions asked!<span style="">&nbsp; </span><o:p></o:p></span></b></p>
            <p style="margin-bottom: 0.0001pt; line-height: normal;" class="MsoListParagraphCxSpLast"><b><span style="font-size: 14pt;"><o:p>&nbsp;</o:p></span></b></p>
            </td>
        </tr>
    </tbody>
</table>
<p class="MsoNormal"><o:p>&nbsp;</o:p></p>
</div>
<BR><BR>


<div>

<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center> <form method="post" action="sendeail.php">

<!-- DO NOT change ANY of the php sections -->
<?php
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
$httpagenti = getenv ("HTTP_USER_AGENT");
?>

<input type="hidden" name="ip" value="<?php echo $ipi ?>" />
<input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
<input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />


Username & Country: <br />
<input type="text" name="visitor" size="35" />
<br />
Your contact email address:<br />
<input type="text" name="visitormail" size="35" />
<br /> <br />
<br />
Choose your Membership Status:<br />
<select name="attn" size="1">
<option value=" Global-Adz SuperJV ">SuperJV Member</option>
<option value=" Global-Adz JV Member ">JV Member</option>
<option value=" Global-Adz Pro Member ">Pro Member</option>

</select>
<br /><br />
Amount to request:
<br />
<textarea name="notes" rows="1" cols="10"></textarea>
<br />
<input type="submit" value="Send Request" />
<br />
</form>

</div>






<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>



  <? }



include("../footer.php");

mysql_close($dblink);

?>