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
// file: search.php
//----------------------------------------------------------------------



if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}




//database connection
		

$connexion = mysql_connect($host,$user,$password);
$selection = mysql_select_db($db);
	

//language file include

include "language/".$lang.".php";


//include menu 
include"include/menumain.php";
include"include/menusite.php";

echo"<div class=\"content\">\n";

//test if form valid
if($crawler=="" && $validform==1)
	{
	$validform=0;
	}

//test form for navigation

if($validform==0)
	{
	if($crawler==0)
		{
		$crawler="";
		}
	echo"<br><br><h1>".$language['search2']."</h1>\n";	
	echo"<table width=\"720px\">\n";
	echo"<tr><td>\n";	
	echo"<div class=\"form2\" align=\"centrer\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"1\">";
	echo "<input type=\"hidden\" name ='navig' value=\"5\">";
	echo "<input type=\"hidden\" name ='search' value=\"1\">";
	echo "<input type=\"hidden\" name ='site' value=\"$site\">";			
	echo "<input type=\"hidden\" name ='period' value=\"$period\">";
	echo"<table align=\"centrer\" width=\"300px\">\n";
	echo"<tr>\n";
	echo"<td><h1>".$language['search_crawler']."</h1></td></tr>\n";
	echo"<tr><td align='center'><input name='crawler'  value='$crawler' type='text' size='20'/></td>\n";
	echo"</tr>\n";	
	echo"<tr>\n";
	echo"<td align='center'>\n";
	echo"<br>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['go_search']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form></div>\n";
	
	echo"</td><td>\n";

	echo"<div class=\"form2\" align=\"centrer\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"1\">";
	echo "<input type=\"hidden\" name ='navig' value=\"5\">";
	echo "<input type=\"hidden\" name ='search' value=\"2\">";
	echo "<input type=\"hidden\" name ='site' value=\"$site\">";	
	echo "<input type=\"hidden\" name ='period' value=\"$period\">";				
	echo"<table align=\"centrer\" width=\"300px\">\n";
	echo"<tr>\n";
	echo"<td><h1>".$language['search_page']."</h1></td></tr>\n";
	echo"<tr><td align='center'><input name='crawler'  value='$crawler' type='text' size='20'/></td>\n";
	echo"</tr>\n";	
	echo"<tr>\n";
	echo"<td align='center'>\n";
	echo"<br>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['go_search']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form></div>\n";

	echo"</td></tr><tr><td>&nbsp;</td></tr><tr><td>\n";	

	echo"<div class=\"form2\" align=\"centrer\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"1\">";
	echo "<input type=\"hidden\" name ='navig' value=\"5\">";
	echo "<input type=\"hidden\" name ='search' value=\"5\">";
	echo "<input type=\"hidden\" name ='site' value=\"$site\">";			
	echo "<input type=\"hidden\" name ='period' value=\"$period\">";
	echo"<table align=\"centrer\" width=\"300px\">\n";
	echo"<tr>\n";
	echo"<td><h1>".$language['search_user_agent']."</h1></td></tr>\n";
	echo"<tr><td align='center'><input name='crawler'  value='$crawler' type='text' size='20'/></td>\n";
	echo"</tr>\n";	
	echo"<tr>\n";
	echo"<td align='center'>\n";
	echo"<br>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['go_search']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form></div>\n";

	echo"</td><td>\n";
	
	echo"<div class=\"form2\" align=\"centrer\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"1\">";
	echo "<input type=\"hidden\" name ='navig' value=\"5\">";
	echo "<input type=\"hidden\" name ='search' value=\"3\">";
	echo "<input type=\"hidden\" name ='site' value=\"$site\">";	
	echo "<input type=\"hidden\" name ='period' value=\"$period\">";				
	echo"<table align=\"centrer\" width=\"300px\">\n";
	echo"<tr>\n";
	echo"<td><h1>".$language['search_user']."</h1></td></tr>\n";
	echo"<tr><td align='center'><input name='crawler'  value='$crawler' type='text' size='20'/></td>\n";
	echo"</tr>\n";	
	echo"<tr>\n";
	echo"<td  align='center'>\n";
	echo"<br>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['go_search']." ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form></div>\n";

	echo"</td></tr></table><br><br>\n";	
		
	}
else
	{
	
	
	//mysql requete
	if($search!=2)  
		{
		//case crawler, we search in the whole crawler database
		$sqlstats = "SELECT * FROM crawlt_crawler
		ORDER BY crawler_name ASC";
		}
	else
		{
		//case page, we search in the visit database
		
		
		$sqlstats = "SELECT * FROM crawlt_visits,crawlt_crawler,crawlt_pages 
		WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
		AND crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
		AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
		ORDER BY crawlt_visits.date ASC";
		}		
		
	$requetestats = mysql_query($sqlstats, $connexion);
	
	$nbrresult=mysql_num_rows($requetestats);
	if($nbrresult>=1)
		{
			
		if($search==1)
			{
	
			while ($ligne = mysql_fetch_object($requetestats))                                                                              
				{
				$crawlername=$ligne->crawler_name; 
				if(eregi($crawler,$crawlername))
					{
					$list[]=$crawlername;
					}
				}
				
			$crawlerdisplay=htmlentities($crawler);
				
			echo"<br><br><h1>".$language['search2']."</h1>\n";				
			echo"<h1>".$language['search_crawler']."</h1>\n";
			echo"<h2>".$language['result_crawler_1']."".$crawlerdisplay."</h2><br>\n";


			if(isset($list))
				{
				$list=array_unique($list);				
				sort($list);
				
				//change text if more than 100 answers	
				$nbrtotanswer=sizeof($list);
				if($nbrtotanswer>100)
					{
					echo"<br><br><h2>".$language['to_many_answer']."</h2>\n";
					}

				echo"<div class='tableau' align='center'>";
				echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";			
				echo"<tr><td class='tableau2'>".$language['result_crawler']."</td><tr>\n";
				
				//counter for alternate color lane
				$comptligne=2;
	
				//counter to limite number of datas displayed
				$comptdata=0;
				
							
				foreach ($list as $crawl)
					{
					$crawldisplay=htmlentities($crawl);
					
					if($comptdata<100)
						{
						if ($comptligne%2 ==0)
							{	
							echo"<tr><td class='tableau5'><a href='index.php?navig=2&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						else
							{
							echo"<tr><td class='tableau50'><a href='index.php?navig=2&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						}
						
					$comptligne = $comptligne + 1;
					$comptdata = $comptdata + 1;	
					}
				echo"</table></div><br>";
				}
			else
				{
				echo"<br><br><h2>".$language['no_answer']."</h2>\n";
				}							
			}
		elseif($search==2)
			{
			while ($ligne = mysql_fetch_object($requetestats))                                                                              
				{
				$pagename=$ligne->url_page; 
				if(eregi($crawler,$pagename))
					{
					$list[]=$pagename;
					}
				}
			$crawlerdisplay=htmlentities($crawler);	
				
			echo"<br><br><h1>".$language['search2']."</h1>\n";	
			echo"<h1>".$language['search_page']."</h1>\n";
			echo"<h2>".$language['result_crawler_1']."".$crawlerdisplay."</h2><br>\n";
			
			if(isset($list))
				{
				$list=array_unique($list);
				sort($list);
				//change text if more than 100 answers	
				$nbrtotanswer=sizeof($list);
				if($nbrtotanswer>100)
					{
					echo"<br><br><h2>".$language['to_many_answer']."</h2>\n";
					}				

				echo"<div class='tableau' align='center'>";
				echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";			
				echo"<tr><td class='tableau2'>".$language['result_page']."</td><tr>\n";	
				
				//counter for alternate color lane
				$comptligne=2;
	
				//counter to limite number of datas displayed
				$comptdata=0;				
				
						
				foreach ($list as $crawl)
					{
					$crawldisplay=htmlentities($crawl);
					
					if($comptdata<100)
						{
						if ($comptligne%2 ==0)
							{						
							echo"<tr><td class='tableau5'><a href='index.php?navig=4&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						else
							{
							echo"<tr><td class='tableau50'><a href='index.php?navig=4&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						}					
					$comptligne = $comptligne + 1;
					$comptdata = $comptdata + 1;															
					}
				echo"</table></div><br>";	
				}
			else
				{
				echo"<br><br><h2>".$language['no_answer']."</h2>\n";
				}								
			}
		elseif($search==3)
			{
			while ($ligne = mysql_fetch_object($requetestats))                                                                              
				{
				$crawlerinfo=$ligne->crawler_info; 
				if(eregi($crawler,$crawlerinfo))
					{
					$list[]=$crawlerinfo;
					}
				}
			$crawlerdisplay=htmlentities($crawler);
				
			echo"<br><br><h1>".$language['search2']."</h1>\n";	
			echo"<h1>".$language['search_user']."</h1>\n";
			echo"<h2>".$language['result_crawler_1']."".$crawlerdisplay."</h2><br>\n";


			if(isset($list))
				{
				$list=array_unique($list);				
				sort($list);
				//change text if more than 100 answers	
				$nbrtotanswer=sizeof($list);
				if($nbrtotanswer>100)
					{
					echo"<br><br><h2>".$language['to_many_answer']."</h2>\n";
					}

				echo"<div class='tableau' align='center'>";
				echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";			
				echo"<tr><td class='tableau2'>".$language['result_user']."</td><tr>\n";
				
				//counter for alternate color lane
				$comptligne=2;
	
				//counter to limite number of datas displayed
				$comptdata=0;
				
							
				foreach ($list as $crawl)
					{
					$crawldisplay=htmlentities($crawl);
					
					if($comptdata<100)
						{
						$crawl2=urlencode($crawl);
						if ($comptligne%2 ==0)
							{	
							echo"<tr><td class='tableau5'><a href='index.php?validform=1&amp;search=4&amp;navig=5&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl2."'>".$crawldisplay."</a></td><tr>\n";
							}
						else
							{
							echo"<tr><td class='tableau50'><a href='index.php?validform=1&amp;search=4&amp;navig=5&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl2."'>".$crawldisplay."</a></td><tr>\n";
							}
						}
						
					$comptligne = $comptligne + 1;
					$comptdata = $comptdata + 1;	
					}
				echo"</table></div><br>";
				}
			else
				{
				echo"<br><br><h2>".$language['no_answer']."</h2>\n";
				}	
			
			}
		elseif($search==5)
			{
			while ($ligne = mysql_fetch_object($requetestats))                                                                              
				{
				$crawlerua2=$ligne->crawler_user_agent; 
				if(eregi($crawler,$crawlerua2))
					{
					$list[]=$crawlerua2;
					}
				}
			$crawlerdisplay=htmlentities($crawler);	
				
			echo"<br><br><h1>".$language['search2']."</h1>\n";	
			echo"<h1>".$language['search_user_agent']."</h1>\n";
			echo"<h2>".$language['result_crawler_1']."".$crawlerdisplay."</h2><br>\n";


			if(isset($list))
				{
				$list=array_unique($list);				
				sort($list);
				//change text if more than 100 answers	
				$nbrtotanswer=sizeof($list);
				if($nbrtotanswer>100)
					{
					echo"<br><br><h2>".$language['to_many_answer']."</h2>\n";
					}

				echo"<div class='tableau' align='center'>";
				echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";			
				echo"<tr><td class='tableau2'>".$language['result_ua']."</td><tr>\n";
				
				//counter for alternate color lane
				$comptligne=2;
	
				//counter to limite number of datas displayed
				$comptdata=0;
				
							
				foreach ($list as $crawl)
					{
					$crawldisplay=htmlentities($crawl);
					
					if($comptdata<100)
						{
						$crawl2=urlencode($crawl);
						if ($comptligne%2 ==0)
							{	
							echo"<tr><td class='tableau5'><a href='index.php?validform=1&amp;search=6&amp;navig=5&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl2."'>".$crawldisplay."</a></td><tr>\n";
							}
						else
							{
							echo"<tr><td class='tableau50'><a href='index.php?validform=1&amp;search=6&amp;navig=5&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl2."'>".$crawldisplay."</a></td><tr>\n";
							}
						}
						
					$comptligne = $comptligne + 1;
					$comptdata = $comptdata + 1;	
					}
				echo"</table></div><br>";
				}
			else
				{
				echo"<br><br><h2>".$language['no_answer']."</h2>\n";
				}	
			
			}				

		elseif($search == 6)
			{			
			//database connection
		

			$connexion = mysql_connect($host,$user,$password);
			$selection = mysql_select_db($db);
			
			$sqlexist = "SELECT * FROM crawlt_crawler
			WHERE crawler_user_agent='".sql_quote($crawler)."'";
	
			$requeteexist = mysql_query($sqlexist, $connexion);
		
			$ligne = mysql_fetch_object($requeteexist);
			//crawler already exist
			$crawlernamedisplay=htmlentities($ligne->crawler_name);
			$useragdisplay=htmlentities($ligne->crawler_user_agent);
			$crawlerinfodisplay=htmlentities($ligne->crawler_info);
			$crawlerurldisplay=htmlentities($ligne->crawler_url);
			
			echo"<br><br><h1>".$language['search2']."</h1>\n";
			echo"<h1>".$language['search_user_agent']."</h1>\n";			
			echo"<p>".$language['exist_data']."</p>\n";	
			echo"<h5>".$language['crawler_name2']."&nbsp;&nbsp;<a href='index.php?navig=2&amp;period=3&amp;site=".$site."&amp;crawler=$ligne->crawler_name'>".$crawlernamedisplay."</a></h5>";			
			echo"<h5>".$language['crawler_user_agent']."&nbsp;&nbsp;".$useragdisplay."</h5>";			
			echo"<h5>".$language['crawler_user']."&nbsp;&nbsp;".$crawlerinfodisplay."</h5>";	
			echo"<h5>".$language['crawler_url2']."&nbsp;&nbsp;<a href=\"$ligne->crawler_url\">".$crawlerurldisplay."</a></h5>";	
			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='5'>\n";			
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";
			}
		else
			{
			
			$crawler=urldecode($crawler);
			while ($ligne = mysql_fetch_object($requetestats))                                                                              
				{
				$crawlerinfo=$ligne->crawler_info;
				$crawlername=$ligne->crawler_name; 
				if($crawlerinfo == $crawler)
					{
					$list[]=$crawlername;
					}
				}
				
			$crawlerdisplay=htmlentities($crawler);
				
			echo"<br><br><h1>".$language['search2']."</h1>\n";	
			echo"<h1>".$language['search_user']."</h1>\n";
			echo"<h2>".$language['result_user_1']."".$crawlerdisplay."</h2><br>\n";


			if(isset($list))
				{
				$list=array_unique($list);				
				sort($list);
				//change text if more than 100 answers	
				$nbrtotanswer=sizeof($list);
				if($nbrtotanswer>100)
					{
					echo"<br><br><h2>".$language['to_many_answer']."</h2>\n";
					}

				echo"<div class='tableau' align='center'>";
				echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";			
				echo"<tr><td class='tableau2'>".$language['result_user_crawler']."</td><tr>\n";
				
				//counter for alternate color lane
				$comptligne=2;
	
				//counter to limite number of datas displayed
				$comptdata=0;
				
							
				foreach ($list as $crawl)
					{
					$crawldisplay=htmlentities($crawl);
					
					if($comptdata<100)
						{
						if ($comptligne%2 ==0)
							{	
							echo"<tr><td class='tableau5'><a href='index.php?navig=2&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						else
							{
							echo"<tr><td class='tableau50'><a href='index.php?navig=2&amp;period=3&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td><tr>\n";
							}
						}
						
					$comptligne = $comptligne + 1;
					$comptdata = $comptdata + 1;	
					}
				echo"</table></div><br>";
				}
			else
				{
				echo"<br><br><h2>".$language['no_answer']."</h2>\n";
				}	
			}		
			
			
		}

	}
	


?>