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
// file: updatecrawltrack.php
//----------------------------------------------------------------------

//this file is needed to update from a previous release to the 1.3.0 release.

if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

//variables
$updatetable=0;
$updatefile=0;

//langage file
include "language/".$lang.".php";


//databaseconnection

$connexion = mysql_connect($host,$user,$password);
$selection = mysql_select_db($db);

// check if the IP column exist in the crawler table

$tableinfo = mysql_query("SHOW COLUMNS FROM crawlt_crawler");
while ($table= mysql_fetch_assoc($tableinfo))
	{
	$listcolumn[]=$table['Field'];
	}


if(in_array('crawler_ip',$listcolumn))
	{
	$updatetable=1;
	echo"<p>".$language['table_mod_ok']."</p>\n";
	}	
else
	{

	//add the IP column in the crawler table

	$sqlupdate="ALTER TABLE crawlt_crawler ADD crawler_ip VARCHAR(16)";
	$requeteupdate = mysql_query($sqlupdate, $connexion);

	$sqlupdate2="UPDATE crawlt_crawler SET crawler_ip=''";
	$requeteupdate2 = mysql_query($sqlupdate2, $connexion);


	if($requeteupdate==1 && $requeteupdate2==1)
		{
		//case table creation ok
		$updatetable=1;		
		echo"<p>".$language['table_mod_ok']."</p>\n";
		}
	else
		{
		echo"<p>".$language['table_mod_no_ok']."</p>\n";		
		}
	}

//update the crawltrack file

//determine the path to the file
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
$filename=$path.'/crawltrack.php';

//suppress existing file
unlink($filename);

//create the new crawltrack file


@$content2.="<?php\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="//  CrawlTrack 1.3.0\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="// Crawler Tracker for website\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="// Author: Jean-Denis Brun\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="// Website: www.crawltrack.info\n";		
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="// That script is distributed under GNU GPL license\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="// file: crawltrack.php\n";
@$content2.="//----------------------------------------------------------------------\n";
@$content2.="//mysql escape function\n";		
@$content2.="function sql_quote( \$value )\n";
@$content2.="{\n";
@$content2.="if( get_magic_quotes_gpc() )\n";
@$content2.="{\n";
@$content2.="\$value = stripslashes( \$value );\n";
@$content2.="}\n";
@$content2.="//check if this function exists\n";
@$content2.="if( function_exists( \"mysql_real_escape_string\" ) )\n";
@$content2.="{\n";
@$content2.="\$value = mysql_real_escape_string( \$value );\n";
@$content2.="}\n";
@$content2.="//for PHP version < 4.3.0 use addslashes\n";
@$content2.="else\n";
@$content2.="{\n";
@$content2.="\$value = addslashes( \$value );\n";
@$content2.="}\n";
@$content2.="return \$value;\n";
@$content2.="}\n";		
@$content2.="//get information\n";
@$content2.="if (!isset(\$_SERVER))\n";
@$content2.="	{\n";
@$content2.="	\$_SERVER = \$HTTP_SERVER_VARS;\n";	
@$content2.="	}\n";		
@$content2.="if(isset(\$_POST['agent']))\n";
@$content2.="	{\n";
@$content2.="	\$agent = \$_POST['agent'];\n";	
@$content2.="	}\n";
@$content2.="else\n";
@$content2.="	{\n";
@$content2.="	\$agent =\$_SERVER['HTTP_USER_AGENT'];\n";	
@$content2.="	}\n";
@$content2.="if(isset(\$_POST['ip']))\n";
@$content2.="	{\n";
@$content2.="	\$ip = \$_POST['ip'];\n";	
@$content2.="	}\n";
@$content2.="else\n";
@$content2.="	{\n";
@$content2.="	\$ip =\$_SERVER['REMOTE_ADDR'];\n";	
@$content2.="	}\n";													
@$content2.="if(isset(\$_POST['url']))\n";
@$content2.="	{\n";
@$content2.="	\$url = \$_POST['url'];\n";	
@$content2.="	}\n";
@$content2.="else\n";
@$content2.="	{\n";
@$content2.="	\$url =\$_SERVER['REQUEST_URI'];\n";	
@$content2.="	}\n";	
@$content2.="if(isset(\$_POST['site']))\n";
@$content2.="	{\n";
@$content2.="	\$site = \$_POST['site'];\n";	
@$content2.="	}\n";
@$content2.="//connection to database\n";
@$content2.="\$connexion = mysql_connect(\"$host\",\"$user\",\"$password\");\n";
@$content2.="\$selection = mysql_select_db(\"$db\");\n";		
@$content2.="// check if the user agent or the ip exist in the crawler table\n";		
@$content2.="\$endwhile = false;\n";
@$content2.="\$endwhile2 = false;\n";
@$content2.="\$result = mysql_query(\"SELECT * FROM crawlt_crawler\");\n";		
@$content2.="while ( !(\$endwhile) && !(\$endwhile2) && (\$data = mysql_fetch_array(\$result)) )\n";		
@$content2.="	{\n";			
@$content2.="	if(\$data[\"crawler_user_agent\"]!='')\n";	
@$content2.="		{\n";			
@$content2.="		\$endwhile = (stristr(\$agent, \$data[\"crawler_user_agent\"]) !== false);\n";
@$content2.="		}\n";
@$content2.="	if(\$data[\"crawler_ip\"]!='')\n";	
@$content2.="		{\n";		
@$content2.="		\$endwhile2 = (strstr(substr(\$ip,0,strlen( \$data[\"crawler_ip\"])),\$data[\"crawler_ip\"]) !== false);\n";	
@$content2.="		}\n";	
@$content2.="	}\n";		
@$content2.="\$crawler = \$data[\"id_crawler\"];\n";				
@$content2.="\$date  = date(\"Y-m-d H:i:s\");\n";
@$content2.="if (\$endwhile OR \$endwhile2)\n";
@$content2.="	{\n";
@$content2.="	//check if the page already exist, if not add it to the table\n";
@$content2.="	\$result2 = mysql_query(\"SELECT id_page FROM crawlt_pages WHERE url_page='\".sql_quote(\$url).\"'\");\n";
@$content2.="	list(\$id_page) = mysql_fetch_row(\$result2);\n";		
@$content2.="	if(\$id_page)\n";		
@$content2.="		{\n";		
@$content2.="		\$page= \$id_page;\n";		
@$content2.="		}\n";
@$content2.="	else\n";		
@$content2.="		{\n";		
@$content2.="		mysql_query(\"INSERT INTO crawlt_pages (url_page) VALUES ('\".sql_quote(\$url).\"')\");\n";		
@$content2.="		\$id_insert = mysql_fetch_row(mysql_query(\"SELECT LAST_INSERT_ID()\"));\n";		
@$content2.="		\$page = \$id_insert[0];\n";		
@$content2.="		}\n";		
@$content2.="	//insertion of the visit datas in the visits database\n";		
@$content2.="	mysql_query(\"INSERT INTO crawlt_visits (crawlt_site_id_site, crawlt_pages_id_page, crawlt_crawler_id_crawler, date) VALUES ('\".sql_quote(\$site).\"', '\".sql_quote(\$page).\"', '\".sql_quote(\$crawler).\"', '\".sql_quote(\$date).\"')\");\n";		
@$content2.="	}\n";						
@$content2.="?>\n";



$filename2=$path.'/crawltrack.php';
if ( $file2 = fopen($filename2, "w") )
	{
	fwrite($file2, $content2);
	fclose($file2);
	}

//update the configconnect file

//determine the path to the file
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
$filename=$path.'/include/configconnect.php';


//suppress existing file
unlink($filename);

//create the new configconnect file

@$content.="<?php\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="//  CrawlTrack 1.3.0\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="// Crawler Tracker for website\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="// Author: Jean-Denis Brun\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="// Website: www.crawltrack.info\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="// That script is distributed under GNU GPL license\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="// file: configconnect.php\n";
@$content.="//----------------------------------------------------------------------\n";
@$content.="\$user=\"$user\";\n";
@$content.="\$password=\"$password\";\n";
@$content.="\$db=\"$db\";\n";
@$content.="\$host=\"$host\";\n";
@$content.="\$lang=\"$lang\";\n";
@$content.="\$version=\"$versionid\";\n";				
@$content.="?>\n";


if ( $file = fopen($filename, "w") )
	{
	fwrite($file, $content);
	fclose($file);
	}


if(file_exists('include/configconnect.php') && file_exists('crawltrack.php'))
	{
	//case file ok
	$updatefile=1;		
	echo"<br><br><br><br>".$language['files_mod_ok']."<br>\n";
	}
else
	{
	echo"".$language['files_mod_no_ok']."<br>\n";
	}

if($updatetable==1 && $updatefile==1)
	{
	echo"<div class=\"content\">\n";
	$a=substr($versionid,0,1);
	$b=substr($versionid,1,1);
	$c=substr($versionid,2,1);
	echo"<h1>".$language['update_crawltrack_ok']."&nbsp;$a.$b.$c</h1>";
	}
else
	{
	echo"<h1>".$language['update_crawltrack_no_ok']."</h1>";
	}	

//continue

echo"<div class=\"form\">\n";
echo"<form action=\"index.php\" method=\"POST\" >\n";
echo "<input type=\"hidden\" name ='navig' value='1'>\n";
echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
echo"<table class=\"centrer\">\n";	
echo"<tr>\n";
echo"<td colspan=\"2\">\n";
echo"<input name='ok' type='submit'  value=' OK ' size='20'>\n";
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
echo"</form>\n";
echo"</div>";

?>