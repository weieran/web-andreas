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
// file: menusite.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

if($_SESSION['rightsite']==0)
	{
		
	//mysql requete
	
	$sqlsite = "SELECT * FROM crawlt_site";

	
	$requetesite = mysql_query($sqlsite, $connexion);
	
	$nbrresult=mysql_num_rows($requetesite);
		
	if($nbrresult>=1)
			{	
	
		while ($ligne = mysql_fetch_object($requetesite))                                                                              
			{
			$sitename=$ligne->name; 
			$siteid=$ligne->id_site;
			$listsite[]=$sitename;
			$listidsite[]=$siteid;
			}

		//preparation of site list display
		$nbrsite=sizeof($listsite);
		$nbrsiteaf=0;


		//display
		echo"<div class=\"menusite\" >\n";

		echo"<div width=\"200px\" align=\"centrer\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";

		echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
		echo "<input type=\"hidden\" name ='search' value=\"$search\">\n";		
		echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
		echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
		echo"<select onchange=\"form.submit()\" size=\"1\" name=\"site\"  style=\" font-size:14px; font-weight:bold; color: #003399;
		font-family: Verdana,Geneva, Arial, Helvetica, Sans-Serif;\">\n";
		do
			{
			if($listidsite[$nbrsiteaf]==$site)
				{
				echo"<option value=\"$listidsite[$nbrsiteaf]\" selected style=\" font-size:14px; font-weight:bold; color: #003399;
				font-family: Verdana,Geneva, Arial, Helvetica, Sans-Serif;\">".$listsite[$nbrsiteaf]."</option>\n";
				}
			else
				{
				echo"<option value=\"$listidsite[$nbrsiteaf]\" style=\" font-size:14px; font-weight:bold; color: #003399;
				font-family: Verdana,Geneva, Arial, Helvetica, Sans-Serif;\">".$listsite[$nbrsiteaf]."</option>\n";
				}		
			$nbrsiteaf=$nbrsiteaf+1;
			}
	
		while($nbrsiteaf<$nbrsite);

		echo"</select></form></div>\n";

		echo"</div>\n";
		
		}	
	}
else
	{

	//mysql requete
	
	$site=$_SESSION['rightsite'];
	
				
	$sqlsite = "SELECT * FROM crawlt_site
	WHERE id_site='".sql_quote($site)."'";

	
	$requetesite = mysql_query($sqlsite, $connexion);
	
	$nbrresult=mysql_num_rows($requetesite);
		
	if($nbrresult>=1)
		{		
	
		while ($ligne = mysql_fetch_object($requetesite))                                                                              
			{
			$sitename=$ligne->name; 
			}

		//display
		echo"<div class=\"menusite\" >\n";

		echo"<div width=\"200px\" align=\"centrer\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";

		echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
		echo "<input type=\"hidden\" name ='search' value=\"$search\">\n";		
		echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
		echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
		echo"<select size=\"1\" name=\"site\"  style=\" font-size:14px; font-weight:bold; color: #003399;
		font-family: Verdana,Geneva, Arial, Helvetica, Sans-Serif;\">\n";
		echo"<option value=\"$site\" selected style=\" font-size:14px; font-weight:bold; color: #003399;
			font-family: Verdana,Geneva, Arial, Helvetica, Sans-Serif;\">".$sitename."</option>\n";


		echo"</select></form></div>\n";

		echo"</div>\n";
		
		}

	}
?>