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
// file: display-all-pages.php
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

//stats calculation
	
//period calculation
	
$today = date("Y-m-d");
$today2 = explode('-', $today);
$yeartoday = $today2[0];
$monthtoday = $today2[1];
$daytoday = $today2[2];	
	
	
if ($period==0)
	{
	//case today
	$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) ;
	$datebegin = date("Y-m-d",$ts);
	}
elseif($period==1)	
	{
	//case 8 days
	$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 691200;
	$datebegin = date("Y-m-d",$ts);
	}
elseif($period==2)
	{
	//case 1 month
	$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 2628000;
	$datebegin = date("Y-m-d",$ts);
	}
elseif($period==3)
	{
	//case 1 year
	$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 31536000;
	$datebegin = date("Y-m-d",$ts);
	}	
	
	
	
$begin = explode('-', $datebegin);
$yearbegin= $begin[0];
$monthbegin = $begin[1];
$daybegin = $begin[2];	
	
	

//mysql requete

	
$sqlstats = "SELECT * FROM crawlt_visits,crawlt_crawler,crawlt_pages 
WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
AND crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
AND crawlt_visits.date >='".sql_quote($datebegin)."' 
AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
ORDER BY crawlt_visits.date ASC";
	
$requetestats = mysql_query($sqlstats, $connexion);
	
$nbrresult=mysql_num_rows($requetestats);
if($nbrresult>=1)
	{
	
	while ($ligne = mysql_fetch_object($requetestats))                                                                              
		{
		$crawlername=$ligne->crawler_name; 
		$page=$ligne->url_page;
		$date=$ligne->date;
		$listcrawler[]=$crawlername;
		$nbvisits[$page]=@$nbvisits[$page] + 1;
		$lastdate[$page]=$date;
		${'listcrawler'.$page}[] =$crawlername;
		$listpage[]=$page;
		}

	
	
	//display
	
			
	if($daybegin==$daytoday && $monthbegin==$monthtoday && $yearbegin==$yeartoday)
		{
		$testdate=1;
		echo"<h1>".$language['nbr_pages']."</h1>\n";
		echo"<h2>".$language['display_period']."$daytoday/$monthtoday/$yeartoday</h2>\n";
		}
	else
		{
		$testdate=0;
		echo"<h1>".$language['nbr_pages']."</h1>\n";
		echo"<h2>".$language['display_period']."$daybegin/$monthbegin/$yearbegin
		 ---> $daytoday/$monthtoday/$yeartoday</h2>\n";
		}	
	
	echo"</div>\n";


	//suppression of double entries in the tables
	$listcrawler=array_unique($listcrawler);
	$listpage=array_unique($listpage);
	
	//summary table
	$nbrtotpages=sizeof($listpage);
	$nbrtotvisits=$nbrresult;
	$nbrtotcrawlers = sizeof($listcrawler);
	
	echo"<div class='tableau' align='center'>\n";	
	echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";
	echo"<tr><th class='tableau1'>\n";
	echo"".$language['nbr_pages']."\n";
	echo"</th>\n";		
	echo"<th class='tableau1'>\n";
	echo"".$language['nbr_tot_visits']."\n";
	echo"</th>\n";
	echo"<th class='tableau2'>\n";
	echo"".$language['nbr_tot_crawlers']."\n";
	echo"</th></tr>\n";
	echo"<tr><td class='tableau3'>".$nbrtotpages."</td>\n";	
	echo"<td class='tableau3'>".$nbrtotvisits."</td>\n";
	echo"<td class='tableau5'>".$nbrtotcrawlers."</td></tr>\n";	
	echo"</table></div><br>\n";


	//graph
	echo"<div align='center'>\n";
	echo"<img src=\"./graphs/visit-graph.php?site=$site&amp;period=$period&amp;navig=$navig&amp;crawler=$crawler\" alt=\"graph\" width=\"600\" heigth=\"300\"/>\n";
	echo"</div>\n";





	
	
	//order case
	
	if($order==0)
		{	
		//case date
		arsort($lastdate);
		$current=current($lastdate);
		do 	{
			$table[]=key($lastdate);
			}
		while($current=next($lastdate));		
		}
	elseif($order==1)
		{
		//case pages viewed
		foreach ($listpage as $pagecrawl)
			{
			${'listcrawler'.$pagecrawl}=array_unique(${'listcrawler'.$pagecrawl});			
			$pagecrawler[$pagecrawl]=sizeof(${'listcrawler'.$pagecrawl});
			}
		arsort($pagecrawler);
		$current=current($pagecrawler);
		do 	{
			$table[]=key($pagecrawler);
			}
		while($current=next($pagecrawler));	
		}
	elseif($order==2)
		{
		//case visits
		arsort($nbvisits);
		$current=current($nbvisits);
		do 	{
			$table[]=key($nbvisits);
			}
		while($current=next($nbvisits));
					
		}
	elseif($order==3)
		{
		//case crawlers
		asort($listpage);
		$table=	$listpage;		
		}
		
	//change text if more than 100 pages	
	if($nbrtotpages>100)
		{
		echo"<h2>".$language['100_visit_per-crawler']."</h2>\n";
		}
	else
		{
		echo"<h2>".$language['visit_per-crawler']."</h2>\n";
		}


	echo"<div class='tableau' align='center'>\n";	
	echo"<table   cellpadding='0px' cellspacing='0' width='690px'>\n";
	if($order==3)
		{
		echo"<tr><th class='tableau1'>\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='order' value=\"3\">\n";			
		echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
		echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
		echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
		echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";		
		echo"<input type='submit' class='orderselect' value='".$language['nbr_pages']."'>\n";
		echo"</form>\n";		
		echo"</th>\n";
		}
	else
		{
		echo"<tr><th class='tableau1'>\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='order' value=\"3\">\n";			
		echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
		echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
		echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
		echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";		
		echo"<input type='submit' class='order' value='".$language['nbr_pages']."'>\n";
		echo"</form>\n";		
		echo"</th>\n";
		}	
		
	if($order==2)
			{
			echo"<th class='tableau1'>\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"2\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='orderselect' value='".$language['nbr_visits']."'>\n";
			echo"</form>\n";			
			echo"</th>\n";
			}
		else
			{
			echo"<th class='tableau1'>\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"2\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='order' value='".$language['nbr_visits']."'>\n";
			echo"</form>\n";
			echo"</th>\n";
			}			
	if($order==1)
			{
			echo"<th class='tableau1' >\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"1\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='orderselect' value='".$language['crawler_name']."'>\n";
			echo"</form>\n";			
			echo"</th>\n";
			echo"</th>\n";
			}
		else
			{
			echo"<th class='tableau1' >\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"1\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='order' value='".$language['crawler_name']."'>\n";
			echo"</form>\n";			
			echo"</th>\n";
			}	
	if($order==0)
			{
			echo"<th class='tableau2'>\n";			
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"0\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='orderselect' value='".$language['date_visits']."'>\n";
			echo"</form>\n";
			echo"</th></tr>\n";
			}
		else
			{
			echo"<th class='tableau2'>\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='order' value=\"0\">\n";			
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
			echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
			echo"<input type='submit' class='order' value='".$language['date_visits']."'>\n";
			echo"</form>\n";
			echo"</th></tr>\n";
			}		
	//counter for alternate color lane
	$comptligne=2;
	
	//counter to limite number of datas displayed
	$comptdata=0;
	
	foreach ($table as $crawl)
		{
		$crawldisplay=htmlentities($crawl);
		//to limit the display to 100 datas
		if($comptdata<100)
			{
			${'listcrawler'.$crawl}=array_unique(${'listcrawler'.$crawl});
			$nbrpage=sizeof(${'listcrawler'.$crawl});
			
			$date2 = explode(' ', $lastdate[$crawl]);
			$date3 = explode('-', $date2[0]);
			$year = $date3[0];
			$month = $date3[1];
			$day = $date3[2];	
			$time3 = explode(':', $date2[1]);
			$hour=$time3[0];
			$minute=$time3[1];
		
			if ($comptligne%2 ==0)
				{
				echo"<tr><td class='tableau3'><a href='index.php?navig=4&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td>\n";
				echo"<td class='tableau3'>".$nbvisits[$crawl]."</td>\n";
				echo"<td class='tableau3' width='60px'>".$nbrpage."</td> \n";			
			
				if($testdate==1)
					{
					echo"<td class='tableau5'>$hour hr&nbsp;$minute mn</td></tr>\n";
					}
				else
					{
					echo"<td class='tableau5'>$day/$month/$year<br>$hour hr&nbsp;$minute mn</td></tr>\n";
					}
				}
			else
				{
				echo"<tr><td class='tableau30'><a href='index.php?navig=4&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$crawl."'>".$crawldisplay."</a></td>\n";
				echo"<td class='tableau30'>".$nbvisits[$crawl]."</td>\n";
				echo"<td class='tableau30' width='60px'>".$nbrpage."</td> \n";			
			
				if($testdate==1)
					{
					echo"<td class='tableau50'>$hour hr&nbsp;$minute mn</td></tr>\n";
					}
				else
					{
					echo"<td class='tableau50'>$day/$month/$year<br>$hour hr&nbsp;$minute mn</td></tr>\n";
					}
				}				
			}	
			$comptligne = $comptligne + 1;
			$comptdata = $comptdata + 1;			
		}

	echo"</table>\n";
	echo"<br>\n";
	}
else
	{
	echo"<div align='center'>\n";
		
	if($daybegin==$daytoday && $monthbegin==$monthtoday && $yearbegin==$yeartoday)
		{
		echo"<h1>".$language['nbr_pages']."</h1>\n";
		echo"<h2>".$language['display_period']."$daytoday/$monthtoday/$yeartoday</h2>\n";
		}
	else
		{
		echo"<h1>".$language['nbr_pages']."</h1>\n";
		echo"<h2>".$language['display_period']."$daybegin/$monthbegin/$yearbegin
		 ---> $daytoday/$monthtoday/$yeartoday</h2>\n";
		}
				
	echo"<h1>".$language['no_visit']."</h1>\n";
	echo"</div><br>\n";
	}

?>