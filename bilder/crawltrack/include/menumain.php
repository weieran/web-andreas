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
// file: menumain.php
//----------------------------------------------------------------------
// menu base on a www.alsacreations.com css menu 
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

echo"<div class=\"menumain\">\n";
echo"<div id=\"menug\">\n";	
echo"	<dl>\n";	
echo"		<dt onmouseover=\"javascript:montre('smenu1');\"  ><a href=\"index.php?navig=1&amp;period=$period&amp;site=$site&amp;crawler=$crawler\">".$language['crawler_name']."</a></dt>\n";
echo"			<dd id=\"smenu1\" >\n";
echo"				<ul>\n";

if ($navig==2)
	{
	echo"					<li><a href=\"index.php?navig=2&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";	
	echo"					<li><a href=\"index.php?navig=2&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=2&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=2&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";	
	}
else
	{
	echo"					<li><a href=\"index.php?navig=1&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";	
	echo"					<li><a href=\"index.php?navig=1&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=1&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=1&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}
echo"				</ul>\n";
echo"			</dd>\n";

echo"<noscript>\n";
echo"			<div class=\"nojava\">\n";
echo"				<ul>\n";

if ($navig==2)
	{
	echo"					<li><a href=\"index.php?navig=2&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";	
	echo"					<li><a href=\"index.php?navig=2&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=2&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=2&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";	
	}
else
	{
	echo"					<li><a href=\"index.php?navig=1&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";	
	echo"					<li><a href=\"index.php?navig=1&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=1&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=1&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}
echo"				</ul>\n";
echo"			</dd>\n";
echo"</noscript>\n";

echo"	</dl>\n";
	
echo"	<dl>\n";
echo"		<dt onmouseover=\"javascript:montre('smenu2');\"><a href=\"index.php?navig=3&amp;period=$period&amp;site=$site&amp;crawler=$crawler\">".$language['nbr_pages']."</a></dt>\n";

echo"			<dd id=\"smenu2\">\n";
echo"				<ul>\n";
if ($navig==4)
	{
	echo"					<li><a href=\"index.php?navig=4&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}
else
	{
	echo"					<li><a href=\"index.php?navig=3&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}	
echo"				</ul>\n";
echo"			</dd>\n";

echo"<noscript>\n";
echo"			<div class=\"nojava\">\n";
echo"				<ul>\n";
if ($navig==4)
	{
	echo"					<li><a href=\"index.php?navig=4&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=4&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}
else
	{
	echo"					<li><a href=\"index.php?navig=3&amp;period=0&amp;site=$site&amp;crawler=$crawler\">".$language['today']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=1&amp;site=$site&amp;crawler=$crawler\">".$language['days']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=2&amp;site=$site&amp;crawler=$crawler\">".$language['month']."</a></li>\n";
	echo"					<li><a href=\"index.php?navig=3&amp;period=3&amp;site=$site&amp;crawler=$crawler\">".$language['one_year']."</a></li>\n";
	}	
echo"				</ul>\n";
echo"			</dd>\n";
echo"</noscript>\n";

echo"	</dl>\n";
	
echo"	<dl>\n";	
echo"		<dt onmouseover=\"javascript:montre();\"><a href=\"index.php?navig=5&amp;site=$site&amp;crawler=$crawler\">".$language['search']."</a></dt>\n";
echo"	</dl>\n";
	
echo"	<dl>\n";	
echo"		<dt onmouseover=\"javascript:montre();\"><a href=\"index.php?navig=6&amp;site=$site&amp;crawler=$crawler\">".$language['admin']."</a></dt>\n";
echo"	</dl>\n";

echo"</div>\n";
echo"<div id=\"menud\">\n";


echo"	<dl>\n";
if($lang=='french')
	{	
	echo"		<dt onmouseover=\"javascript:montre();\"><a href=\"http://www.crawltrack.info/fr/documentation.php\">".$language['help']."</a></dt>\n";
	}
else
	{
	echo"		<dt onmouseover=\"javascript:montre();\"><a href=\"http://www.crawltrack.info/documentation.php\">".$language['help']."</a></dt>\n";
	}
echo"	</dl>\n";


if($lang=='french')
	{
	echo"	<dl>\n";	
	echo"		<dt onmouseover=\"javascript:montre();\" onclick=\"return window.open('./include/infofr.htm','CrawlTrack','top=300,left=350,height=200,width=350')\"><a href=\"#\">?</a></dt>\n";
	echo"	</dl>\n";
	}
else
	{
	echo"	<dl>\n";	
	echo"		<dt onmouseover=\"javascript:montre();\" onclick=\"return window.open('./include/infoen.htm','CrawlTrack','top=300,left=350,height=200,width=350')\"><a href=\"#\">?</a></dt>\n";
	echo"	</dl>\n";
	}

echo"	<dl>\n";	
echo"		<dt onmouseover=\"javascript:montre();\"><a href=\"index.php?navig=7\">X</a></dt>\n";
echo"	</dl>\n";
	
echo"</div>\n";
echo"<br><br><br>\n";
echo"</div>\n";


?>