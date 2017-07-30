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
// file: display-one-crawler.php
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

echo"<br><br><div class=\"content\">\n";

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
AND crawlt_crawler.crawler_name='".sql_quote($crawler)."'
ORDER BY crawlt_visits.date ASC";
	
$requetestats = mysql_query($sqlstats, $connexion);
	
$nbrresult=mysql_num_rows($requetestats);
if($nbrresult>=1)
	{
	
	while ($ligne = mysql_fetch_object($requetestats))                                                                              
		{
		$page=$ligne->url_page;
		$date=$ligne->date;
		$address=$ligne->crawler_url;
		$info=$ligne->crawler_info;
		$agent=$ligne->crawler_user_agent;
		$ip=$ligne->crawler_ip;		
		$listpage[]=$page;
		$nbvisits[$page]=@$nbvisits[$page] + 1;
		$lastdate1[$page]=$date;
		if($agent!='')
			{
			$uagent[]=$agent;
			}
		if($ip!='')
			{
			$uagent[]=$ip;
			}			
		}

	//display
	$crawlerdisplay=htmlentities($crawler);
	$addressdisplay=htmlentities($address);
	$infodisplay=htmlentities($info);
			
	if($daybegin==$daytoday && $monthbegin==$monthtoday && $yearbegin==$yeartoday)
		{
				$testdate=1;
		echo"<h1>".$crawlerdisplay."</h1>\n";
		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='650px'>\n";	
		echo"<tr><th class='tableau1'>\n";
		echo"".$language['user_agent_or_ip']."\n";
		echo"</th>\n";
		echo"<th class='tableau2'>\n";
		echo"".$language['Origin']."\n";
		echo"</th></tr>\n";
		$uagent=array_unique($uagent);
		$nbline=sizeof($uagent);
		$nb=0;
		foreach ($uagent as $ua)
			{
			$uadisplay=htmlentities($ua);
			echo"<tr><td class='tableau3'>".$uadisplay."</td>\n";
			if($nb==0)
				{
				echo"<td class='tableau5' rowspan=".$nbline."><a href=\"$addressdisplay\">".$infodisplay."</a></td></tr>\n";
				}
			else
				{
				echo"</tr>\n";
				}	
			$nb=2;	
			}
		echo"</table></div><br>\n";
		echo"<h2>".$language['display_period']."$daytoday/$monthtoday/$yeartoday</h2>\n";
			
		}
	else
		{
		$testdate=0;
		echo"<h1>".$crawlerdisplay."</h1>\n";

		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='650px'>\n";	
		echo"<tr><th class='tableau1'>\n";
		echo"".$language['user_agent_or_ip']."\n";
		echo"</th>\n";
		echo"<th class='tableau2'>\n";
		echo"".$language['Origin']."\n";
		echo"</th></tr>\n";
		$uagent=array_unique($uagent);
		$nbline=sizeof($uagent);
		$nb=0;
		foreach ($uagent as $ua)
			{
			$uadisplay=htmlentities($ua);
			echo"<tr><td class='tableau3'>".$uadisplay."</td>\n";
			if($nb==0)
				{
				echo"<td class='tableau5' rowspan=".$nbline."><a href=\"$addressdisplay\">".$infodisplay."</a></td></tr>\n";
				}
			else
				{
				echo"</tr>\n";
				}	
			$nb=2;	
			}
		echo"</table></div><br>\n";	
			
		
							
		echo"<h2>".$language['display_period']."$daybegin/$monthbegin/$yearbegin
		 ---> $daytoday/$monthtoday/$yeartoday</h2>\n";
			
		}	
	
	echo"</div>\n";
	
	//suppression of double entries in the table	
	$listpage=array_unique($listpage);
	
	//summary table
	$nbrtotpages=sizeof($listpage);
	$nbrtotvisits=$nbrresult;
	
	echo"<div class='tableau' align='center'>\n";	
	echo"<table   cellpadding='0px' cellspacing='0' width='300px'>\n";	
	echo"<tr><th class='tableau1'>\n";
	echo"".$language['nbr_tot_visits']."\n";
	echo"</th>\n";
	echo"<th class='tableau2'>\n";
	echo"".$language['nbr_tot_pages']."\n";
	echo"</th></tr>\n";
	echo"<tr><td class='tableau3'>".$nbrtotvisits."</td>\n";
	echo"<td class='tableau5'>".$nbrtotpages."</td></tr>\n";	
	echo"</table></div><br>\n";	
	

	//graph
	echo"<div align='center'>\n";
	echo"<img src=\"./graphs/visit-graph.php?site=$site&amp;period=$period&amp;navig=$navig&amp;crawler=$crawler\" alt=\"graph\" width=\"600\" heigth=\"300\"/>\n";
	echo"</div>\n";



		
	
		//order case
	
	if($order==0)
		{	
		//case date
		arsort($lastdate1);
		$current=current($lastdate1);
		do 	{
			$table[]=key($lastdate1);
			}
		while($current=next($lastdate1));		
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
		//case page
		asort($listpage);
		$table=	$listpage;		
		}

	echo"<h2>".$language['visit_per-crawler']."</h2>\n";

	echo"<div class='tableau' align='center'>\n";	
	echo"<table   cellpadding='0px'; cellspacing='0' width='690px'>\n";
	if($order==3)
		{
		echo"<tr><th class='tableau1'>\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='order' value=\"3\">\n";			
		echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
		echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
		echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
		echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";		
		echo"<input type='submit' class='orderselect' value='".$language['page']."'>\n";
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
		echo"<input type='submit' class='order' value='".$language['page']."'>\n";
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
	
	foreach ($table as $page1)
		{
		$page1display=htmlentities($page1);
		
		$date2 = explode(' ', $lastdate1[$page1]);
		$date3 = explode('-', $date2[0]);
		$year = $date3[0];
		$month = $date3[1];
		$day = $date3[2];	
		$time3 = explode(':', $date2[1]);
		$hour=$time3[0];
		$minute=$time3[1];
		
		if ($comptligne%2 ==0)
			{
			echo"<tr><td class='tableau3'><a href='index.php?navig=4&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$page1."'>".$page1display."</a></td>\n";
			echo"<td class='tableau3'>".$nbvisits[$page1]."</td>\n";
						
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
			echo"<tr><td class='tableau30'><a href='index.php?navig=4&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$page1."'>".$page1display."</a></td>\n";
			echo"<td class='tableau30'>".$nbvisits[$page1]."</td>\n";
						
			if($testdate==1)
				{
				echo"<td class='tableau50'>$hour hr&nbsp;$minute mn</td></tr>\n";
				}
			else
				{
				echo"<td class='tableau50'>$day/$month/$year<br>$hour hr&nbsp;$minute mn</td></tr>\n";
				}
			}
		$comptligne = $comptligne + 1;							
		}

	echo"</table>\n";
	echo"<br>\n";
	}
else
	{
	
	$sqlstats2 = "SELECT * FROM crawlt_crawler
	WHERE crawlt_crawler.crawler_name='".sql_quote($crawler)."'
	ORDER BY crawler_name ASC";

	$requetestats2 = mysql_query($sqlstats2, $connexion);
	
	$nbrresult2=mysql_num_rows($requetestats2);
		if ($nbrresult2==0)
			{
			echo"<h1>Hacking attempt !!!!</h1>";
			exit();
			}
	
	
	while ($ligne = mysql_fetch_object($requetestats2))                                                                              
		{
		$address=$ligne->crawler_url;
		$info=$ligne->crawler_info;
		$agent=$ligne->crawler_user_agent;
		$uagent[]=$agent;
		}

	$crawlerdisplay=htmlentities($crawler);
	$addressdisplay=htmlentities($address);
	$infodisplay=htmlentities($info);
	
	
	echo"<div align='center'>\n";
		
	if($daybegin==$daytoday && $monthbegin==$monthtoday && $yearbegin==$yeartoday)
		{
		echo"<h1>".$crawlerdisplay."</h1>\n";	
		
		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='650px'>\n";	
		echo"<tr><th class='tableau1'>\n";
		echo"".$language['user_agent']."\n";
		echo"</th>\n";
		echo"<th class='tableau2'>\n";
		echo"".$language['Origin']."\n";
		echo"</th></tr>\n";
		$uagent=array_unique($uagent);
		$nbline=sizeof($uagent);
		$nb=0;
		foreach ($uagent as $ua)
			{
			$uadisplay=htmlentities($ua);
			echo"<tr><td class='tableau3'>".$uadisplay."</td>\n";
			if($nb==0)
				{
				echo"<td class='tableau5' rowspan=".$nbline."><a href=\"$addressdisplay\">".$infodisplay."</a></td></tr>\n";
				}
			else
				{
				echo"</tr>\n";
				}	
			$nb=2;	
			}
		echo"</table></div><br>\n";				
				
		echo"<h2>".$language['display_period']."$daytoday/$monthtoday/$yeartoday</h2>\n";			
		}
	else
		{
		echo"<h1>".$crawlerdisplay."</h1>\n";
		
		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='650px'>\n";	
		echo"<tr><th class='tableau1'>\n";
		echo"".$language['user_agent']."\n";
		echo"</th>\n";
		echo"<th class='tableau2'>\n";
		echo"".$language['Origin']."\n";
		echo"</th></tr>\n";
		$uagent=array_unique($uagent);
		$nbline=sizeof($uagent);
		$nb=0;
		foreach ($uagent as $ua)
			{
			$uadisplay=htmlentities($ua);
			echo"<tr><td class='tableau3'>".$uadisplay."</td>\n";
			if($nb==0)
				{
				echo"<td class='tableau5' rowspan=".$nbline."><a href=\"$addressdisplay\">".$infodisplay."</a></td></tr>\n";
				}
			else
				{
				echo"</tr>\n";
				}	
			$nb=2;	
			}
		echo"</table></div><br>\n";			
		
		echo"<h2>".$language['display_period']."$daybegin/$monthbegin/$yearbegin
		 ---> $daytoday/$monthtoday/$yeartoday</h2>\n";		
		}	
				
	echo"<h1>".$language['no_visit']."</h1>\n";
	echo"</div><br>\n";
	}

?>