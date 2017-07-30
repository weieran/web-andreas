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
// file: visit-graph.php
//----------------------------------------------------------------------
// this graph is made with artichow    website: www.artichow.org
//----------------------------------------------------------------------

// session start 'crawlt'
session_name('crawlt');
session_start();


if( !isset($_SESSION['rightsite']) )
	{
	exit();
	}


//functions


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


 //include $_POST

include"../include/post.php";

if($_SESSION['rightsite']==0)
	{
	}
else
	{
	$site=$_SESSION['rightsite'];
	}

//database connection
		
include"../include/configconnect.php";

$connexion = mysql_connect($host,$user,$password);
$selection = mysql_select_db($db);	

//language file include

include "../language/".$lang.".php";
 




//legend text
$legend1=$language['nbr_visits'];
$legend2=$language['nbr_pages']; 
$legend3=$language['crawler_name'];

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
elseif($period==3 OR $period==4)
	{
	//case 1 year
	$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 31536000;
	$datebegin = date("Y-m-d",$ts);
	}	



//prepare X axis label

if($period == 0)
	{
	$hr=0;
	do 	{
		
		$axexlabel[]=$hr."hr";
		
		if($hr<10)
			{
			$hr="0".$hr;
			}
		$axex[]=$hr;	
		$nbvisits[$hr]=0;
		$hr=$hr+1;
		}
	while($hr<=23);	
	}
elseif($period==3 OR $period==4)
	{
	$date=$datebegin;	
	$nbmonth=0;		
	do 	{
		$date20 = explode('-', $date);
		$yeardate = $date20[0];
		$monthdate = $date20[1];
		$daydate = $date20[2];
		$axexlabel[]=$monthdate."/".$yeardate;
		$axex[]=$monthdate."/".$yeardate;
		$nbvisits[$monthdate]=0;
		$monthdate1=$monthdate + 1;
		$ts =  mktime(1,0,0,$monthdate1, $daydate, $yeardate);
		$date = date("Y-m-d",$ts);
		$nbmonth=$nbmonth+1;
		}
	while($nbmonth<=12);
	}
else
	{
	$date=$datebegin;	
	if($period==1)
		{
		$nbday=8;
		}
	else
		{
		$nbday=31;
		}
	
		
	$nbday2=0;
			
	do 	{
		$axex[]=$date;
		$date20 = explode('-', $date);
		$yeardate = $date20[0];
		$monthdate = $date20[1];
		$daydate = $date20[2];
		$yeardate2=substr($yeardate,2,3);	
		$axexlabel[]=$daydate."/".$monthdate."/".$yeardate2;
		
		$nbvisits[$date]=0;
		$ts =  mktime(1,0,0,$monthdate, $daydate, $yeardate) + 86400;
		$date = date("Y-m-d",$ts);
		$nbday2=$nbday2+1;
		}
	while($nbday2<=$nbday);

	}
	


//mysql requete

if($navig==2)
	{
	
	$sqlstats = "SELECT * FROM crawlt_visits,crawlt_crawler,crawlt_pages 
	WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
	AND crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
	AND crawlt_visits.date >='".sql_quote($datebegin)."' 
	AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
	AND crawlt_crawler.crawler_name='".sql_quote($crawler)."'
	ORDER BY crawlt_visits.date ASC";
	}
elseif($navig==4)	
	{	
		
	$sqlstats = "SELECT * FROM crawlt_visits,crawlt_crawler,crawlt_pages 
	WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
	AND crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
	AND crawlt_visits.date >='".sql_quote($datebegin)."'
	AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
	AND crawlt_pages.url_page='".sql_quote($crawler)."'
	ORDER BY crawlt_visits.date ASC";
	}	
else
	{
		
	$sqlstats = "SELECT * FROM crawlt_visits,crawlt_crawler,crawlt_pages 
	WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
	AND crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
	AND crawlt_visits.date >='".sql_quote($datebegin)."' 
	AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
	ORDER BY crawlt_visits.date ASC";
	}
	
$requetestats = mysql_query($sqlstats, $connexion);
	
	while ($ligne = mysql_fetch_object($requetestats))                                                                              
		{
		$page=$ligne->url_page;
		$crawler=$ligne->crawler_name;
		$date=$ligne->date;
		$date2 = explode(' ', $date);
		if($period==1 OR $period==2)
			{
			$date3=$date2[0];
			}
		elseif($period==0)
			{
			$time = explode(':', $date2[1]);
			$date3=$time[0];
			}
		elseif($period==3 OR $period==4)
			{
			$date4 = explode('-', $date2[0]);
			$date3=$date4[1]."/".$date4[0];
			}			
		
			
			
		$nbvisits[$date3]=$nbvisits[$date3] + 1;

		${'listpage'.$date3}[] =$page;
		${'listcrawler'.$date3}[] =$crawler;		
		}

//create table for graph

foreach($axex as $data)
	{
	$visit[]=$nbvisits[$data];
	if($nbvisits[$data]==0)
		{
		$visitlabel[]="";
		}
	else
		{
		$visitlabel[]=$nbvisits[$data];
		}
		
	if(isset(${'listpage'.$data}))
		{
		${'listpage'.$data}=array_unique(${'listpage'.$data});
		$nbpage=sizeof(${'listpage'.$data});
		$page2[]=$nbpage;		
		$page2label[]=$nbpage;		
		}
	else
		{
		$page2[]=0;
		$page2label[]="";		
		}
				
	if(isset(${'listcrawler'.$data}))
		{			
		${'listcrawler'.$data}=array_unique(${'listcrawler'.$data});
		$nbcrawler=sizeof(${'listcrawler'.$data});
		$crawl[]=$nbcrawler;		
		$crawllabel[]=$nbcrawler;		
		}
	else
		{
		$crawl[]=0;
		$crawllabel[]="";		
		}	
					
	}

//graph creation

require_once "artichow/BarPlot.class.php";
require_once "artichow/LinePlot.class.php";

$graph = new Graph(600, 300);

$graph->title->setFont(new Tuffy(20));
$graph->title->setColor(new DarkBlue);


$group = new PlotGroup();

$group->setBackgroundColor(new Color(173, 216, 230, 60));

$group->setSpace(2, 2, 0.1, 0);


if($period==2 OR $period==3)
	{
	$group->setPadding(20, 85, 20, 50);
	}
else
	{
	$group->setPadding(20, 85, 20, 20);
	}

//visits

if($navig==2 OR $navig==4)
	{
	$plot = new BarPlot($visit,1,2);	
	}
else
	{
	$plot = new BarPlot($visit,1,3);
	}

$debut = new Color(0, 51, 153);
$fin = new Color(0, 191, 255);
   

$plot->setBarGradient(
	new LinearGradient(
      $debut,
      $fin,
		90
	)
);

$plot->setXAxisZero(TRUE);

if( $period==1 OR $period==3 OR $period==4)
	{
	$plot->label->set($visitlabel);
	$plot->label->move(0, -12);
	$plot->label->setFont(new Tuffy(12));
	$plot->label->setAngle(0);
	$plot->label->setPadding(0, 0, 5, 0);
	}

$plot->setSpace(2, 2, 20, 0);

$plot->barShadow->setSize(2);
$plot->barShadow->setPosition(SHADOW_RIGHT_TOP);
$plot->barShadow->setColor(new Color(180, 180, 180, 10));
$plot->barShadow->smooth(TRUE);

//legend

$group->legend->add($plot, $legend1, LEGEND_BACKGROUND); 

$group->add($plot);

if($navig==4)
	{}
else
	{
	//pages viewed

if($navig==2)
	{
	$plot = new BarPlot($page2,2,2);	
	}
else
	{
	$plot = new BarPlot($page2,2,3);
	}

	$debut = new Color(255, 0, 0);
	$fin = new Color(255, 215, 0);
   

	$plot->setBarGradient(
		new LinearGradient(
		$debut,
		$fin,
			90
		)
	);


	$plot->setXAxisZero(TRUE);


	if( $period==1 OR $period==3 OR $period==4)
		{
		$plot->label->set($page2label);
		$plot->label->move(0, -12);
		$plot->label->setFont(new Tuffy(12));
		$plot->label->setAngle(0);
		$plot->label->setPadding(0, 0, 5, 0);
		}

	$plot->setSpace(2, 2, 20, 0);

	$plot->barShadow->setSize(2);
	$plot->barShadow->setPosition(SHADOW_RIGHT_TOP);
	$plot->barShadow->setColor(new Color(0, 0, 0, 10));
	$plot->barShadow->smooth(TRUE);

	//legend
	$group->legend->add($plot, $legend2, LEGEND_BACKGROUND); 

	$group->add($plot);
	}

if($navig==2)
	{}
else
	{
	//crawler
	
	if($navig==4)
		{
		$plot = new BarPlot($crawl,2,2);	
		}
	else
		{
		$plot = new BarPlot($crawl,3,3);
		}


	$debut = new Color(0, 128, 0);
	$fin = new Color(144, 238, 144);
   

	$plot->setBarGradient(
		new LinearGradient(
		$debut,
		$fin,
			90
		)
	);

	$plot->setXAxisZero(TRUE);

	if($period==1 OR $period==3 OR $period==4)
		{
		$plot->label->set($crawllabel);
		$plot->label->move(0, -12);
		$plot->label->setFont(new Tuffy(12));
		$plot->label->setAngle(0);
		$plot->label->setPadding(0, 0, 5, 0);
		}

	$plot->setSpace(2, 2, 20, 0);

	$plot->barShadow->setSize(2);
	$plot->barShadow->setPosition(SHADOW_RIGHT_TOP);
	$plot->barShadow->setColor(new Color(0, 0, 0, 10));
	$plot->barShadow->smooth(TRUE);

	//legend
	$group->legend->add($plot, $legend3, LEGEND_BACKGROUND); 

	$group->add($plot);
}

$group->legend->setBackgroundColor(new Color(255,255,255,0));
$group->legend->setPosition(0.995,0.2); 

//X axis label  
$group->axis->bottom->setLabelText($axexlabel);
if($period==2 OR $period==3)
	{
	$group->axis->bottom->label->setAngle(45);
	$group->axis->bottom->label->move(-10, 0);
	}

$graph->add($group);
$graph->draw();

?>