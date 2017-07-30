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
// file: crawltrack.php
//----------------------------------------------------------------------
//mysql escape function
function sql_quote( $value )
{
if( get_magic_quotes_gpc() )
{
$value = stripslashes( $value );
}
//check if this function exists
if( function_exists( "mysql_real_escape_string" ) )
{
$value = mysql_real_escape_string( $value );
}
//for PHP version < 4.3.0 use addslashes
else
{
$value = addslashes( $value );
}
return $value;
}
//get information
if (!isset($_SERVER))
	{
	$_SERVER = $HTTP_SERVER_VARS;
	}
if(isset($_POST['agent']))
	{
	$agent = $_POST['agent'];
	}
else
	{
	$agent =$_SERVER['HTTP_USER_AGENT'];
	}
if(isset($_POST['ip']))
	{
	$ip = $_POST['ip'];
	}
else
	{
	$ip =$_SERVER['REMOTE_ADDR'];
	}
if(isset($_POST['url']))
	{
	$url = $_POST['url'];
	}
else
	{
	$url =$_SERVER['REQUEST_URI'];
	}
if(isset($_POST['site']))
	{
	$site = $_POST['site'];
	}
//connection to database
$connexion = mysql_connect("localhost","root","3Aw030785");
$selection = mysql_select_db("dbCrawlTrack");
// check if the user agent or the ip exist in the crawler table
$endwhile = false;
$endwhile2 = false;
$result = mysql_query("SELECT * FROM crawlt_crawler");
while ( !($endwhile) && !($endwhile2) && ($data = mysql_fetch_array($result)) )
	{
	if($data["crawler_user_agent"]!='')
		{
		$endwhile = (stristr($agent, $data["crawler_user_agent"]) !== false);
		}
	if($data["crawler_ip"]!='')
		{
		$endwhile2 = (strstr(substr($ip,0,strlen( $data["crawler_ip"])),$data["crawler_ip"]) !== false);
		}
	}
$crawler = $data["id_crawler"];
$date  = date("Y-m-d H:i:s");
if ($endwhile OR $endwhile2)
	{
	//check if the page already exist, if not add it to the table
	$result2 = mysql_query("SELECT id_page FROM crawlt_pages WHERE url_page='".sql_quote($url)."'");
	list($id_page) = mysql_fetch_row($result2);
	if($id_page)
		{
		$page= $id_page;
		}
	else
		{
		mysql_query("INSERT INTO crawlt_pages (url_page) VALUES ('".sql_quote($url)."')");
		$id_insert = mysql_fetch_row(mysql_query("SELECT LAST_INSERT_ID()"));
		$page = $id_insert[0];
		}
	//insertion of the visit datas in the visits database
	mysql_query("INSERT INTO crawlt_visits (crawlt_site_id_site, crawlt_pages_id_page, crawlt_crawler_id_crawler, date) VALUES ('".sql_quote($site)."', '".sql_quote($page)."', '".sql_quote($crawler)."', '".sql_quote($date)."')");
	}
?>
