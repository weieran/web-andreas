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
// file: post.php
//----------------------------------------------------------------------



if(isset($_POST['lang']))
	{	
	$lang = $_POST['lang'];
	}
else
	{
	$lang = 'english';
	}



if(isset($_POST['idmysql']))
	{	
	$idmysql = $_POST['idmysql'];
	}
else
	{
	$idmysql = '';
	}


if(isset($_POST['passwordmysql']))
	{	
	$passwordmysql = $_POST['passwordmysql'];
	}
else
	{
	$passwordmysql = '';
	}


if(isset($_POST['hostmysql']))
	{	
	$hostmysql = $_POST['hostmysql'];
	}
else
	{
	$hostmysql = 'localhost';
	}

if(isset($_POST['basemysql']))
	{	
	$basemysql = $_POST['basemysql'];
	}
else
	{
	$basemysql = '';
	}

if(isset($_POST['sitename']))
	{	
	$sitename = $_POST['sitename'];
	}
else
	{
	$sitename = '';
	}

if(isset($_POST['validsite']))
	{
	$validsite = $_POST['validsite'];
	}
else
	{
	$validsite = 0;
	}

if(isset($_POST['order']))
	{
	$order= $_POST['order'];
	}
else
	{
	$order= 0;
	}




if(isset($_POST['login']))
	{	
	$login = $_POST['login'];
	}
else
	{
	$login = '';
	}


if(isset($_POST['password2']))
	{	
	$password2 = $_POST['password2'];
	}
else
	{
	$password2 = '';
	}

if(isset($_POST['password3']))
	{	
	$password3 = $_POST['password3'];
	}
else
	{
	$password3 = '';
	}

if(isset($_POST['validlogin']))
	{
	$validlogin = $_POST['validlogin'];
	}
else
	{
	$validlogin = 0;
	}

if(isset($_POST['logintype']))
	{
	$logintype = $_POST['logintype'];
	}
else
	{
	$logintype = 0;
	}

if(isset($_POST['crawlername2']))
	{	
	$crawlername2 = $_POST['crawlername2'];
	}
else
	{
	$crawlername2 = '';
	}

if(isset($_POST['crawlerua2']))
	{	
	$crawlerua2 = $_POST['crawlerua2'];
	}
else
	{
	$crawlerua2 = '';
	}

if(isset($_POST['crawleruser2']))
	{	
	$crawleruser2 = $_POST['crawleruser2'];
	}
else
	{
	$crawleruser2 = '';
	}

if(isset($_POST['crawlerurl2']))
	{	
	$crawlerurl2 = $_POST['crawlerurl2'];
	}
else
	{
	$crawlerurl2 = '';
	}

if(isset($_POST['crawlerip2']))
	{	
	$crawlerip2 = $_POST['crawlerip2'];
	}
else
	{
	$crawlerip2 = '';
	}

if(isset($_POST['logochoice']))
	{	
	$logochoice = $_POST['logochoice'];
	}
else
	{
	$logochoice = 0;
	}

//case  can use also hypertext link


if(isset($_POST['validform']))
	{
	$validform = $_POST['validform'];
	}
else
	{
	if(isset($_GET['validform']))
		{
		$validform = $_GET['validform'];
		}
	else
		{	
		$validform= 0;
		}
	}


if(isset($_POST['period']))
	{
	$period = $_POST['period'];
	}
else
	{
	if(isset($_GET['period']))
		{
		$period = $_GET['period'];
		}
	else
		{	
		$period = 0;
		}
	}

	
if(isset($_POST['navig']))
	{
	$navig = $_POST['navig'];
	}
else
	{
	if(isset($_GET['navig']))
		{
		$navig = $_GET['navig'];
		}
	else
		{	
		$navig = 1;
		}
	}



if(isset($_POST['site']))
	{
	$site= $_POST['site'];
	}
else
	{
	if(isset($_GET['site']))
		{
		$site = $_GET['site'];
		}
	else
		{
		//version 1.0.1 correction of the bug existing when site 1 didn't exist		
		if(file_exists('include/configconnect.php') )
			{
			include"include/configconnect.php";	
			$connexion = mysql_connect($host,$user,$password);
			$selection = mysql_select_db($db);		
			//mysql requete	
			$sqlpostsite = "SELECT * FROM crawlt_site ORDER BY id_site ASC";	
			$requetepostsite = mysql_query($sqlpostsite, $connexion);		
			$lignepostsite = mysql_fetch_object($requetepostsite);
			$site=$lignepostsite->id_site;		
			}
		else
			{			
			$site = 1;
			}
		}
	}

if(isset($_POST['crawler']))
	{
	$crawler= $_POST['crawler'];
	}
else
	{
	if(isset($_GET['crawler']))
		{
		$crawler = $_GET['crawler'];
		}
	else
		{	
		$crawler = 0;
		}
	}

if(isset($_POST['search']))
	{
	$search= $_POST['search'];
	}
else
	{
	if(isset($_GET['search']))
		{
		$search = $_GET['search'];
		}
	else
		{	
		$search = 0;
		}
	}







?>