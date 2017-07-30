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
// file: admin.php
//----------------------------------------------------------------------



if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

// do not modify
define('IN_CRAWLT_ADMIN', TRUE);


//language file include


include "language/".$lang.".php";


//include menu 
include"include/menumain.php";
echo"<div class=\"content\">\n";

if(	$_SESSION['rightadmin']==1)
	{

	if($validform==6)
		{
		include"include/adminuser.php";
		}
	elseif($validform==7)
		{
		include"include/adminusersite.php";
		}
	elseif($validform==4)
		{
		include"include/adminsite.php";
		}	
	elseif($validform==3)
		{
		include"include/admintag.php";
		}	
	elseif($validform==2)
		{
		include"include/admincrawler.php";
		}
	elseif($validform==8)
		{
		include"include/adminusersuppress.php";
		}		
	elseif($validform==9)
		{
		include"include/adminsitesuppress.php";
		}		
	elseif($validform==10)
		{
		include"include/admincrawlersuppress.php";
		}
	elseif($validform==11)
		{
		include"include/testcrawlercreation.php";
		}		
	elseif($validform==12)
		{
		include"include/testcrawlersuppress.php";
		}		
	elseif($validform==13)
		{
		include"include/update.php";
		}		
	elseif($validform==14)
		{
		include"include/updateremote.php";
		}
	elseif($validform==15)
		{
		include"include/updatelocal.php";
		}		
	elseif($validform==16)
		{
		include"include/logochoice.php";
		}	
	elseif($validform==17)
		{
		include"include/admindatasuppress.php";
		}

		
							
	else
		{
		echo"<h1>".	$language['admin']."</h1>\n";
		
		echo"<h5><a href=\"./index.php?navig=6&validform=13\">".$language['update_crawler']."</a></h5><br>\n";		
				
		echo"<h5><a href=\"./index.php?navig=6&validform=6\">".$language['user_create']."</a></h5>\n";
		echo"<h5><a href=\"./index.php?navig=6&validform=7\">".$language['user_site_create']."</a></h5>\n";
		echo"<h5><a href=\"./index.php?navig=6&validform=4\">".$language['new_site']."</a></h5>\n";	
		echo"<h5><a href=\"./index.php?navig=6&validform=16\">".$language['see_tag']."</a></h5>\n";		
		echo"<h5><a href=\"./index.php?navig=6&validform=2\">".$language['new_crawler']."</a></h5><br>\n";
		
		
		
		echo"<h5><a href=\"./index.php?navig=6&validform=11\">".$language['crawler_test_creation']."</a></h5>\n";		
		echo"<h5><a href=\"./index.php?navig=6&validform=12\">".$language['crawler_test_suppress']."</a></h5><br>\n";			
		
		echo"<h5><a href=\"./index.php?navig=6&validform=8\">".$language['user_suppress']."</a></h5>\n";
		echo"<h5><a href=\"./index.php?navig=6&validform=9\">".$language['site_suppress']."</a></h5>\n";
		echo"<h5><a href=\"./index.php?navig=6&validform=10\">".$language['crawler_suppress']."</a></h5><br>\n";
				
		echo"<h5><a href=\"./index.php?navig=6&validform=17\">".$language['data_suppress']."</a></h5>\n";			
		}
	
	

	}
else
	{
	if($validform==3)
		{
		include"include/admintag.php";
		}
	elseif($validform==16)
		{
		include"include/logochoice.php";
		}			
	else
		{
		echo"<h1>".	$language['admin']."</h1>\n";
		echo"<h5><a href=\"./index.php?navig=6&validform=16\">".$language['see_tag']."</a></h5>\n";
		echo"<br><br><br><br><br><br><br><br>";
		}
	}
?>