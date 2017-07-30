<?php
//----------------------------------------------------------------------
//  CrawlTrack 1.3.0
//----------------------------------------------------------------------
// Crawler Tracker for website
//----------------------------------------------------------------------
// Author: Jean-Denis Brun
//----------------------------------------------------------------------
// Website: www.crawltrack.info
//----------------------------------------------------------------------
// That script is distributed under GNU GPL license
//----------------------------------------------------------------------
// file: header.php
//----------------------------------------------------------------------


echo"<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo"<html>\n";

echo"<head>\n";
echo"<title>CrawlTrack</title>\n";
echo"<meta NAME=\"author\" CONTENT=\"Jean-Denis Brun\">\n";
echo"<meta NAME=\"description\" CONTENT=\"CrawlTrack the better crawler tracker\">\n";
echo"<meta NAME=\"keywords\" CONTENT=\"crawler,tracker,webmaster,statistics,robots,site,webmestre,statistiques,searchengines,moteur de recherche\">\n";
echo"<meta http-equiv=\"Content-Language\" content=\"fr\">\n";
echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">\n";
echo"<link rel=\"stylesheet\" type=\"text/css\" href=\"./include/style.css\" >\n";
echo"<script type=\"text/javascript\">\n";
echo"<!--\n";
echo"function montre(id) {\n";
echo"var d = document.getElementById(id);\n";
echo"	for (var i = 1; i<=2; i++) {\n";
echo"		if (document.getElementById('smenu'+i)) {document.getElementById('smenu'+i).style.display='none';}\n";
echo"	}\n";
echo"if (d) {d.style.display='block';}\n";
echo"}\n";
echo"//-->\n";
echo"</script>\n";


echo"</head>\n";

echo"<body >\n";


echo"<div class=\"main\">\n";
echo"<div class=\"header\">\n";
echo"<img src=\"./images/banniere.jpg\" width=\"744\" height=\"41\" border=\"0\" alt=\"CrawlTrack\">";
echo"</div>\n";


?>