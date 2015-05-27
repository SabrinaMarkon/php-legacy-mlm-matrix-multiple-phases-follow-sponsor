<?php 
//buffer
ob_start('ob_gzhandler');
session_start();
//DEC 67 
//get a and decode 
// 
$a = $_GET['n'];
if ($a == $_SESSION['afloat']){
$a = base64_decode($a); 
$im = imagecreatetruecolor (185, 15);
//DEC 79 
//random numbers
// 
$myn = array($ooon = rand(81,99), $tooo = rand(61,$ooon-1), $trif = rand(41,$tooo-1), 
$foey = rand(21,$trif-1), $flit = rand(11,$foey-1));
$rn = array_rand($myn, 5);
$mynum = " " . $myn[$rn[0]] . " " . $myn[$rn[1]] . " " . $myn[$rn[2]] . " " . $myn[$rn[3]] . " " . $myn[$rn[4]] . "";

//DEC 68 
//get first numbers from string b.bbb" 
// 
$b = 0 + $a;
//DEC 69 
//get last numbers from string "a.aaa
//
$a = explode(" ", $a); 
$a = $a[3]; 
//DEC 66 
//round < a.aaa> to nearest number = round a 
// 
$aa = round($a);
//DEC 89 
//round < b.bbb > to nearest number = round b 
//
$bb = round($b);
//DEC 82 
//string, random click number and line coord
//
$na = 79;
$nb = 185;
$nc = 82; 
$nd = 182;
$ims = -1;
$ab = explode(" ", $mynum);
$mystring = "Click $ab[$aa]  $mynum";
//DEC 79 
//if bb <= aa reverse string and line coord. click number aa = bb + 1
// 
if ($bb <= $aa){
$aa = $bb + 1; 
$mystring = "" . $mynum . " Click $ab[$aa] "; 
$na = 0;
$nb = 106; 
$nc = 4;
$nd = 104;
$ims = -9;
}
//DEC 78 
//random image color
//
$change = rand(1,9);
$lime = imagecolorallocate($im,0,255,0);
$yellow = imagecolorallocate($im,255,255,0);
$white = imagecolorallocate($im,255,255,255);
$lgray = imagecolorallocate($im,206,206,206); 
$gray = imagecolorallocate($im,115,115,115); 
$black = imagecolorallocate($im,0,0,0);
$green = imagecolorallocate($im,1,107,0);
$grc = " $lime $yellow $white $lgray $yellow $white $gray $black $green";
$rc = explode(" ", $grc);
$bgc = $rc[$change]; 
//DEC 72 
//line & number colors
//
$bc = imagecolorallocate ($im, 0, 0, 0); 
$rd = imagecolorallocate ($im, 255, 0, 0); 
$wh = imagecolorallocate ($im, 255, 255, 255);
//DEC 73 
//if color = this change line & number color 
//
if (($change > 3) && ($change < 7)) { $bc = $rd;} 
elseif ($change > 6) { $bc = $wh;}
//DEC 67 
//fill image color
// 
imagefilledrectangle ($im, 1, 1, 184, 15, $bgc);
imagerectangle ($im, 0, 0, 184, 14, $bc); 
//DEC 75 
//vertical lines 
//
for($i=$na;$i<=$nb;$i+=21)
imageline($im,$i,0,$i,15,$bc);

//DEC 69 
//image string
// 
imagestring ($im, 3, $ims, 1, " $mystring", $bc); 
//DEC 89 
//header content 
//
header("Content-Type: image/gif"); 
//DEC 48 
//send image
//
imagegif($im); 
//DEC 55 
//destroy image 
//
imagedestroy($im); 
}
//flush
ob_end_flush();
?>
