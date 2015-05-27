<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>Frame Breaker test</title>
<META HTTP-EQUIV="Refresh" Content="3; URL=sitecheck.php?ok=1&url=<? echo $_GET['url']; ?>">
</head>

  <frameset ROWS="60,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
  <frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="sitecheck_top.php?ok=<? echo $_GET['ok']; ?>">
  <frame name="main" src="<? echo $_GET['url']; ?>">
  </frameset>
  
</html>