<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
<title>homepage.php</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
<link rel="icon" HREF="bilder/favicon.ico" TYPE="image/ico"> 
</head>
<body>

<?php
   error_reporting(E_ALL);
   include "inc/config.php"; 
   include "inc/preamble_session.php";   
?>

<div id="oben">
<h1>Homepage von Andreas Weier</h1>
</div>

<div id="Navigation">
<ul>
<li><a href="homepage.php?content=7&<?=SID?>"><img src="/bilder/SmallHome.gif" border="0"> Home</a>
<li>
<li><a href="homepage.php?content=1&<?=SID?>">Meine Hobbies</a></li><br>

  <li><a href="homepage.php?content=2&<?=SID?>">Schule</a></li><br>

  <li><a href="homepage.php?content=3&<?=SID?>">Ferien in Spanien</a></li><br>

  <li><a href="homepage.php?content=4&<?=SID?>">Meine Photos</a></li><br>

  <li><a href="homepage.php?content=8&<?=SID?>">Musik h&ouml;ren</a></li><br>

  <li><a href="homepage.php?content=5&action=1&<?=SID?>">G&auml;stebuch</a></li><br>

  <li><a href="homepage.php?content=6&<?=SID?>">Verschiedene Links</a></li><br>
		
  <li><a href="homepage.php?content=9&<?=SID?>">Admin</a></li><br>
  
  <li><a href="homepage.php?content=10&<?=SID?>">Filme</a></li><br>
  
</ul>
</div>

	<?php
	if(isset($_GET['content']))	{
		switch($_GET['content'])
		{
		case 1:
			include "Seiten/hobbies.php";	
		break;
		case 2:
			include "Seiten/schule.php";	
		break;
		case 3:
			include "Seiten/spanien.php";
		break;
		case 4:
			include "Seiten/fotogallery.php";
		break;
		case 5:
			include "Seiten/gaestebuch.php";
		break;
		case 6:
			include "Seiten/links.php";	
		break;
		case 7:
			include "Seiten/home.php";
		break;
		case 8:
			include "Seiten/streamServer.php";
		break;
		case 9:
			include "admin/admin.php";
		break;
		case 10:
			include "Seiten/filme.php";
		break;
		}
		}
		else {include "Seiten/home.php";}
		?>

<div id="unten">
	Das ist einfach noch die untere Zeile
</div>
</body>
</html>




