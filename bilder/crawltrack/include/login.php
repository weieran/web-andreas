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
// file: login.php
//----------------------------------------------------------------------






//database connection
		
include"configconnect.php";

$connexion = mysql_connect($host,$user,$password);
$selection = mysql_select_db($db);


//get values
if(isset($_POST['userlogin']))
	{	
	$userlogin = $_POST['userlogin'];
	}
else
	{
	$userlogin = '';
	}

if(isset($_POST['userpass']))
	{	
	$userpass = $_POST['userpass'];
	}
else
	{
	$userpass = '';
	}

//mysql requete
	
$sqllogin = "SELECT * FROM crawlt_login";
	
$requetelogin = mysql_query($sqllogin, $connexion);

$validuser=0;

$userpass2=md5($userpass);
	
while ($ligne = mysql_fetch_object($requetelogin))                                                                              
	{
	$user=$ligne->crawlt_user; 
	$passw=$ligne->crawlt_password;
	$admin=$ligne->admin;
	$sitelog=$ligne->site;
	if($user==$userlogin && $passw==$userpass2)
		{
		$rightsite=$sitelog;
		$rightadmin=$admin;
		$validuser=1;
		}	
	}

if($validuser==1)
	{
	// session start 'crawlt'
	session_name('crawlt');
	session_start();

	// we define session variables
	$_SESSION['userlogin']=$userlogin; 
	$_SESSION['userpass']=$userpass;
	$_SESSION['rightsite']=$rightsite;
	$_SESSION['rightadmin']=$rightadmin;
	header("Location:../index.php");
	}
else
	{
	header("Location:../index.php");
	}	


?>