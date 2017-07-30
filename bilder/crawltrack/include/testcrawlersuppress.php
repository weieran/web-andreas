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
// file: testcrawlersuppress.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

if(isset($_POST['suppresscrawler']))
	{	
	$suppresscrawler = $_POST['suppresscrawler'];
	}
else
	{
	$suppresscrawler = 0;
	}


if($suppresscrawler==1)
	
	{
	
		
		//crawler suppression
				
		//database connection

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);

		//database query to suppress the crawler
		
		$sqlstats = "SELECT * FROM crawlt_crawler WHERE crawler_name ='Test-Crawltrack'";
		
		$requetestats = mysql_query($sqlstats, $connexion);
	
		$nbrresult=mysql_num_rows($requetestats);
		if($nbrresult>=1)
		{
		while ($ligne = mysql_fetch_object($requetestats))                                                                              
			{
			$testcrawltrackid=$ligne->id_crawler;
			}
	
		
			$sqldelete = "DELETE FROM crawlt_crawler WHERE id_crawler= '".sql_quote($testcrawltrackid)."'";
			$requetedelete = mysql_query($sqldelete, $connexion);

		
			$sqldelete2="DELETE FROM crawlt_visits WHERE crawlt_crawler_id_crawler= '".sql_quote($testcrawltrackid)."'";
			$requetedelete2 = mysql_query($sqldelete2, $connexion);		
		
			if($requetedelete && $requetedelete2)
				{
				echo"<br><br><h1>".$language['crawler_suppress_ok']."</h1>\n";
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
				echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";	
				}
			else
				{
				echo"<br><br><h1>".$language['crawler_suppress_no_ok']."</h1>\n";			
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
				echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";			
				}
		
			}
		else
			{
			echo"<br><br><h1>".$language['crawler_test_no_exist']."</h1>\n";			
			}
	
	
	
		
	
	}
else
	{

			
	//display	

	echo"<br><br><h1>".$language['crawler_test_suppress']."</h1>\n";

	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='navig' value='6'>\n";
	echo "<input type=\"hidden\" name ='validform' value=\"12\">";
	echo "<input type=\"hidden\" name ='suppresscrawler' value=\"1\">\n";
	echo "<input type=\"hidden\" name ='crawlertosuppress' value=\"Test-CrawlTrack\">\n";
	echo"<table class=\"centrer\">\n";	
	echo"<tr>\n";
	echo"<td colspan=\"2\">\n";
	echo"<input name='ok' type='submit'  value=' ".$language['yes']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form>\n";
	echo"</div>";
	
	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='navig' value='6'>\n";
	echo "<input type=\"hidden\" name ='suppresscrawler' value=\"0\">\n";
	echo"<table class=\"centrer\">\n";	
	echo"<tr>\n";
	echo"<td colspan=\"2\">\n";
	echo"<input name='ok' type='submit'  value=' ".$language['no']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form>\n";
	echo"</div>";


	echo"<br>\n";
	}

?>