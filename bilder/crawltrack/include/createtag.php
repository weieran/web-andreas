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
// file: createtag.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_INSTALL'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

echo"<h1>".$language['tag']."</h1>\n";

echo"<p>".$language['create_tag']."</p>\n";

//logochoice
if ($logochoice==0)
	{
	$logo='logo.jpg';
	$lengthlogo=100;
	$heigthlogo=20;
	$alt='CrawlTrack: free crawlers and spiders tracking script - script gratuit de détection des robots';
	}
elseif ($logochoice==1)	
	{
	$logo='logo1.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='Crawler tracking tool for webmaster - Outil de suivi des robots pour webmaster';	
	}
elseif ($logochoice==2)	
	{
	$logo='logo2.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: free php open-source script - script php gratuit open-source';	
	}
elseif ($logochoice==3)	
	{
	$logo='logo3.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: crawler and spider visits statistics - statistiques des visites des robots';	
	}
elseif ($logochoice==4)	
	{
	$logo='logo4.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: php mysql script - script php mysql';	
	}
elseif ($logochoice==5)	
	{
	$logo='logo5.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: free crawlers and spiders tracking script for webmaster - script gratuit de détection des robots pour webmaster';	
	}
elseif ($logochoice==6)	
	{
	$logo='logo6.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: free and open-source crawlers and spiders tracking script - script open-source gratuit de détection des robots';	
	}
elseif ($logochoice==7)	
	{
	$logo='logo7.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='Webmaster tool: free crawlers and spiders tracking script - Outil pour webmaster: script gratuit de détection des robots';	
	}
elseif ($logochoice==8)	
	{
	$logo='logo8.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='Spider tracking tool for webmaster - Outil de suivi des robots pour webmaster';	
	}
elseif ($logochoice==9)	
	{
	$logo='logo9.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: open-source crawlers and spiders tracking script - script open-source de détection des robots';	
	}
elseif ($logochoice==10)	
	{
	$logo='logo10.png';
	$lengthlogo=80;
	$heigthlogo=15;
	$alt='CrawlTrack: free crawlers and spiders tracking script - script gratuit de détection des robots';	
	}
elseif ($logochoice==11)	
	{
	$logo='nologo.png';
	$lengthlogo=1;
	$heigthlogo=1;
	$alt='CrawlTrack: free crawlers and spiders tracking script for webmaster - script gratuit de détection des robots pour webmaster';	
	}



//database connection

include"include/configconnect.php";

$connexion = mysql_connect($host,$user,$password);
$selection = mysql_select_db($db);

//local tag creation

if (isset($_SERVER['PATH_TRANSLATED']) && !empty($_SERVER['PATH_TRANSLATED']))
	{
	$path = dirname( $_SERVER['PATH_TRANSLATED'] );
	}
elseif (isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME']))
	{
	$path = dirname( $_SERVER['SCRIPT_FILENAME'] );
	}
else
	{
	$path = '.';
	}

$code ="include(\"".$path."/crawltrack.php\");";

//non-local tag preparation

$dom=$_SERVER["HTTP_HOST"];

$file=$_SERVER["PHP_SELF"];


$size= strlen($file);

$file1=substr($file,-$size,-9);

$file2=$file1."crawltrack.php";

$file3=$dom.$file1."images/".$logo;

$url_crawlt="http://".$dom.$file2;

//website list query

$sqlsite = "SELECT * FROM crawlt_site";
$requetesite = mysql_query($sqlsite, $connexion);
	
while ($ligne = mysql_fetch_object($requetesite))                                                                              
	{
	$site=$ligne->name; 
	$idsite=$ligne->id_site;
	$listsite[$idsite]=$site;
	$listid[$site]=$idsite;
	}


//table display

asort($listsite);
echo"<div align='center'>\n";	
echo"<table cellpadding='10px' cellspacing='0'>\n";
echo"<tr><th class='tableau1'>".$language['site_name2']."</th>\n";
echo"<th class='tableau2'>".$language['tag']."</th></tr>\n";

foreach ($listsite as $site1)
	{
	echo"<tr><td class='tableau3' rowspan='2'>".$site1."</td>\n";
	echo"<td class='tableau4' >\n";
	echo"<h3>".$language['non_local_tag']."</h3>\n";	
	echo"echo\"&#60;!--~~~CrawlTrack~~~~~~~~~~~~~~~~~~~~--&#62;\\n\";<br>\n";
	echo"\$url =urlencode(\$_SERVER['REQUEST_URI']);<br>\n";
	echo"\$agent =urlencode(\$_SERVER['HTTP_USER_AGENT']);<br>\n";
	echo"\$ip =urlencode(\$_SERVER['REMOTE_ADDR']);<br>\n";	
	echo"\$variablescodees = \"url=\".\$url.\"&agent=\".\$agent.\"&ip=\".\$ip.\"&site=$listid[$site1]\";<br>\n";
	echo"\$url_crawlt2=parse_url(\"$url_crawlt\");<br>\n";
	echo"\$hote=\$url_crawlt2['host'];<br>\n";
	echo"\$script=\$url_crawlt2['path'];<br>\n";
	echo"\$entete = \"POST  \".\$script.\"  HTTP/1.1\\r\\n\";<br>\n";
	echo"\$entete .= \"Host: \".\$hote.\" \\r\\n\";<br>\n";
	echo"\$entete .= \"Content-Type: application/x-www-form-urlencoded\\r\\n\";<br>\n";
	echo"\$entete .= \"Content-Length: \" . strlen(\$variablescodees) . \"\\r\\n\";<br>\n";
	echo"\$entete .= \"Connection: close\\r\\n\\r\\n\";<br>\n";
	echo"\$entete .= \$variablescodees . \"\\r\\n\";<br>\n";
	echo"\$socket = fsockopen(\$url_crawlt2['host'], 80, \$errno, \$errstr);<br>\n";
	echo"if(\$socket)<br>\n";
	echo"{<br>\n";
	echo"fputs(\$socket, \$entete);<br>\n";
	echo"fclose(\$socket);<br>\n";
	echo"}<br>\n";
	echo"echo\"&#60;a href=\\\"http://www.crawltrack.info\\\"&#62;&#60;img border=\\\"0\\\" src=\\\"http://$file3\\\" alt=\\\"$alt\\\" width=\\\"$lengthlogo\\\" height=\\\"$heigthlogo\\\"&#62;&#60;/a&#62;\\n\";<br>\n";
	echo"echo\"&#60;!--~~~CrawlTrack~~~~~~~~~~~~~~~~~~~~--&#62;\\n\";\n";

	echo"</td></tr>\n";
	echo"<td class='tableau4' >\n";
	echo"<h2>".$language['local_tag']."</h2>\n";
	echo"echo\"&#60;!--~~~CrawlTrack~~~~~~~~~~~~~~~~~~~~--&#62;\\n\";<br>\n";
	echo"\$site=$listid[$site1];<br>\n";
	echo"$code<br>\n";
	echo"echo\"&#60;a href=\\\"http://www.crawltrack.info\\\"&#62;<br>";
	echo"&#60;img border=\\\"0\\\" src=\\\"http://$file3\\\" alt=\\\"$alt\\\" width=\\\"$lengthlogo\\\" height=\\\"$heigthlogo\\\"&#62;<br>";
	echo"&#60;/a&#62;\\n\";<br>\n";
	echo"echo\"&#60;!--~~~CrawlTrack~~~~~~~~~~~~~~~~~~~~--&#62;\\n\";\n";
	echo"</td></tr>\n";
	}

echo"</table>\n";
echo"</div>\n";
echo"<br>\n";

//continue

echo"<div class=\"form\">\n";
echo"<form action=\"index.php\" method=\"POST\" >\n";
echo "<input type=\"hidden\" name ='navig' value='15'>\n";
echo "<input type=\"hidden\" name ='validform' value=\"6\">";
echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
echo"<table class=\"centrer\">\n";	
echo"<tr>\n";
echo"<td colspan=\"2\">\n";
echo"<input name='ok' type='submit'  value=' ".$language['step4_install']." ' size='20'>\n";
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
echo"</form>\n";
echo"</div>";

?>