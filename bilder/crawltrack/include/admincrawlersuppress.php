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
// file: admincrawlersuppress.php
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

if(isset($_POST['suppresscrawlerok']))
	{	
	$suppresscrawlerok = $_POST['suppresscrawlerok'];
	}
else
	{
	$suppresscrawlerok = 0;
	}

if($suppresscrawler==1)
	
	{
	
	if(isset($_POST['crawlertosuppress']))
		{	
		$crawlertosuppress = $_POST['crawlertosuppress'];
		}
	else
		{
		header("Location:../index.php");
		}
	
	if(isset($_POST['idcrawlertosuppress']))
		{	
		$idcrawlertosuppress = $_POST['idcrawlertosuppress'];
		}
	else
		{
		header("Location:../index.php");
		}	
	
	
		
	if($suppresscrawlerok==1)
		{
		//crawler suppression
				
		//database connection

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);

		//database query to suppress the crawler

		$sqldelete = "DELETE FROM crawlt_crawler WHERE id_crawler= '".sql_quote($idcrawlertosuppress)."'";
		$requetedelete = mysql_query($sqldelete, $connexion);

		
		$sqldelete2="DELETE FROM crawlt_visits WHERE crawlt_crawler_id_crawler= '".sql_quote($idcrawlertosuppress)."'";
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
		//validation of suppression	
	
		//display	
		
		$crawlertosuppress	= stripslashes($crawlertosuppress);	
		$crawlertosuppressdisplay=htmlentities($crawlertosuppress);	

		echo"<br><br><h1>".$language['crawler_suppress_validation']."</h1>\n";
		echo"<h1>".$language['crawler_name'].":&nbsp;$crawlertosuppressdisplay</h1>\n";
	
		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='navig' value='6'>\n";
		echo "<input type=\"hidden\" name ='validform' value=\"10\">";
		echo "<input type=\"hidden\" name ='suppresscrawler' value=\"1\">\n";
		echo "<input type=\"hidden\" name ='suppresscrawlerok' value=\"1\">\n";	
		echo "<input type=\"hidden\" name ='crawlertosuppress' value=\"$crawlertosuppress\">\n";
		echo "<input type=\"hidden\" name ='idcrawlertosuppress' value=\"$idcrawlertosuppress\">\n";		
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
		echo "<input type=\"hidden\" name ='validform' value=\"10\">";
		echo "<input type=\"hidden\" name ='suppresscrawler' value=\"0\">\n";
		echo "<input type=\"hidden\" name ='suppresscrawlerok' value=\"0\">\n";	
		echo"<table class=\"centrer\">\n";	
		echo"<tr>\n";
		echo"<td colspan=\"2\">\n";
		echo"<input name='ok' type='submit'  value=' ".$language['no']." ' size='20'>\n";
		echo"</td>\n";
		echo"</tr>\n";
		echo"</table>\n";
		echo"</form>\n";
		echo"</div>";	
	
		}	
	
	}
else
	{

		
	//database connection

	$connexion = mysql_connect($host,$user,$password);
	$selection = mysql_select_db($db);

	//database query to get crawler list
		
	$sqldeletecrawler = "SELECT * FROM crawlt_crawler";

	$requetedeletecrawler = mysql_query($sqldeletecrawler, $connexion);

	$nbrresult=mysql_num_rows($requetedeletecrawler);
	if($nbrresult>=1)		
		{

		while ($ligne = mysql_fetch_object($requetedeletecrawler))                                                                              
			{
			$idcrawler=$ligne->id_crawler; 
			$crawlername=$ligne->crawler_name;
			$crawlerua=$ligne->crawler_user_agent;
			$crawlerip=$ligne->crawler_ip;
			$namecrawler[$idcrawler]=$crawlername;
			if($crawlerua!='')
				{
				$uacrawler[$idcrawler]=$crawlerua;
				}
			else
				{
				$uacrawler[$idcrawler]=$crawlerip;
				}				
			}
	
		asort($namecrawler);
		$current=current($namecrawler);
		do 	{
			$listidcrawler[]=key($namecrawler);
			}
		while($current=next($namecrawler));
	
	
		//display	

		echo"<br><br><h1>".$language['crawler_suppress']."</h1>\n";

		echo"<div class='tableau' align='center' width='550px'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='550px'>\n";
		echo"<tr><th class='tableau2' colspan='3'>\n";
		echo"".$language['crawler_list']."\n";
		echo"</th></tr>\n";

		foreach ($listidcrawler as $crawler1)
			{
					
			echo"<tr><td class='tableau32' width='15%'>\n";
			echo"".$namecrawler[$crawler1]."\n";
			echo"</td><td class='tableau35' width='70%'>\n";
			$ua="$uacrawler[$crawler1]";
			$long = strlen ($ua);
			if ( $long>80)
				{
				$ua = substr  ("$uacrawler[$crawler1]",0,80);
				$ua=$ua."...";
				}
		
			$uadisplay=htmlentities($ua);
			echo"$uadisplay\n";		
			echo"</td><td class='tableau45' width='15%'>\n";	
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='validform' value=\"10\">\n";	
			echo "<input type=\"hidden\" name ='suppresscrawler' value=\"1\">\n";
			echo "<input type=\"hidden\" name ='crawlertosuppress' value=\"".$namecrawler[$crawler1]."\">\n";
			echo "<input type=\"hidden\" name ='idcrawlertosuppress' value=\"$crawler1\">\n";					
			echo"<input type='submit' class='button45' value='".$language['suppress_crawler']."'>\n";
			echo"</form>\n";
			echo"</td></tr>\n";
			}
		echo"</table></div>\n";
		echo"<br>\n";
		}
	else
		{
		//display	

		echo"<br><br><h1>".$language['crawler_suppress']."</h1>\n";

		echo"<div class='tableau' align='center' width='550px'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='550px'>\n";
		echo"<tr><th class='tableau2' colspan='3'>\n";
		echo"".$language['crawler_list']."\n";
		echo"</th></tr>\n";	
		echo"</table></div>\n";
		echo"<br>\n";			
		}
		
		
	}
?>