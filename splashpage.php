<?PHP 
$sref=$_REQUEST["ref"]; 
include "config.php";
mysql_close();
?>
<html>
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=iso-8859-1"> 
<title>Join <? echo $sitename; ?>!</title>
</head>

<body> 
<br><br>
<center>&nbsp;<a href="<? echo $domain; ?>/index.php?referid=<?PHP echo $sref ?>" target="_blank">
<img src="/images/header960.jpg" border="0"></a><br>
</body>

</html>