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
// file: admincrawler.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

//valid form

if($validlogin==1)
	{
    if($crawlername2=='' OR ($crawlerua2=='' AND $crawlerip2=='') OR $crawleruser2=='' OR $crawlerurl2 =='')
		{        
		echo"<br><br><p>".$language['crawler_no_ok']."</p>";


		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='validform' value='2'>\n";
		echo "<input type=\"hidden\" name ='navig' value='6'>\n";
		echo "<input type=\"hidden\" name ='validlogin' value='0'>\n";
		echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";					
		echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
		echo "<input type=\"hidden\" name ='crawlername2' value='$crawlername2'>\n";
		echo "<input type=\"hidden\" name ='crawlerua2' value='$crawlerua2'>\n";
		echo "<input type=\"hidden\" name ='crawleruser2' value='$crawleruser2'>\n";
		echo "<input type=\"hidden\" name ='crawlerurl2' value='$crawlerurl2'>\n";
		echo "<input type=\"hidden\" name ='crawlerip2' value='$crawlerip2'>\n";				
		echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
		echo"</form>\n";
		echo"</div>\n";
		}
	else
		{
		
		//database connection

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);
		
		
		//check if crawler already exist

		if($crawlerip2=='')
			{
			$crawlerip3='no-ip';
			}
		else
			{
			$crawlerip3=$crawlerip2;
			}
			
		if($crawlerua2=='')
			{
			$crawlerua3='no-user-agent';
			}
		else
			{
			$crawlerua3=$crawlerua2;
			}			
			

		$sqlexist = "SELECT * FROM crawlt_crawler
		WHERE crawler_user_agent='".sql_quote($crawlerua3)."'
		OR crawler_ip='".sql_quote($crawlerip3)."'";
	
		$requeteexist = mysql_query($sqlexist, $connexion);
		
		$nbrresult=mysql_num_rows($requeteexist);
		
		if($nbrresult>=1)
			{
			$ligne = mysql_fetch_object($requeteexist);
			//crawler already exist
			
			$crawlernamedisplay=htmlentities($ligne->crawler_name);
			$useragdisplay=htmlentities($ligne->crawler_user_agent);
			$crawlerinfodisplay=htmlentities($ligne->crawler_info);
			$crawlerurldisplay=htmlentities($ligne->crawler_url);
			$crawleripdisplay=htmlentities($ligne->crawler_ip);						
			
			echo"<br><br><h2>".$language['new_crawler']."</h2>\n";			
			echo"<h1>".$language['exist']."</h1>\n";
			echo"<p>".$language['exist_data']."</p>\n";	
			echo"<h5>".$language['crawler_name2']."&nbsp;&nbsp;".$crawlernamedisplay."</h5>";			
			echo"<h5>".$language['crawler_user_agent']."&nbsp;&nbsp;".$useragdisplay."</h5>";
			echo"<h5>".$language['crawler_ip']."&nbsp;&nbsp;".$crawleripdisplay."</h5>";						
			echo"<h5>".$language['crawler_user']."&nbsp;&nbsp;".$crawlerinfodisplay."</h5>";	
			echo"<h5>".$language['crawler_url2']."&nbsp;&nbsp;".$crawlerurldisplay."</h5>";			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";				
							
			}
		else
			{
			//crawler didn't exist we can add the crawler in the database					
							
			$sqlcrawler="INSERT INTO crawlt_crawler (crawler_user_agent,crawler_name,crawler_url,crawler_info, crawler_ip) VALUES ('".sql_quote($crawlerua2)."','".sql_quote($crawlername2)."','".sql_quote($crawlerurl2)."','".sql_quote($crawleruser2)."','".sql_quote($crawlerip2)."')";
			$requetecrawler = mysql_query($sqlcrawler, $connexion);

			//check is requete is successfull

			if($requetecrawler==1)
				{
				echo"<br><br><h1>".$language['new_crawler']."</h1>\n";			
				echo"<p>".$language['crawler_ok']."</p>\n";				
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
				echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";				
				}
			else
				{
				echo"<br><br><h1>".$language['new_crawler']."</h1>\n";			
				echo"<p>".$language['crawler_no_ok2']."</p>";
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='validform' value='2'>\n";
				echo "<input type=\"hidden\" name ='navig' value='6'>\n";
				echo "<input type=\"hidden\" name ='validlogin' value='1'>\n";
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";			
				echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";					
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
				echo "<input type=\"hidden\" name ='crawlername2' value='$crawlername2'>\n";
				echo "<input type=\"hidden\" name ='crawlerua2' value='$crawlerua2'>\n";
				echo "<input type=\"hidden\" name ='crawleruser2' value='$crawleruser2'>\n";
				echo "<input type=\"hidden\" name ='crawlerurl2' value='$crawlerurl2'>\n";	
				echo "<input type=\"hidden\" name ='crawlerip2' value='$crawlerip2'>\n";				
				echo"<input name='ok' type='submit'  value=' ".$language['retry']." ' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";
				}
			}

		}
		
	}

//form

else
	{

		echo"<br><br><h1>".$language['new_crawler']."</h1>\n";
		echo"<p>".$language['crawler_creation']."</p><br>\n";


		
	echo"</div>\n";

	//data collect form

	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"2\">";
	echo "<input type=\"hidden\" name ='navig' value='6'>\n";
	echo "<input type=\"hidden\" name ='validlogin' value='1'>\n";			
	echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
	echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";	
	echo"<table class=\"centrer\">\n";
	echo"<tr>\n";
	echo"<td>".$language['crawler_name2']."</td>\n";
	echo"<td><input name='crawlername2'  value='$crawlername2' type=\"text\" maxlength=\"45\" size=\"50\"/></td>\n";
	echo"</tr>\n";
	echo"<tr><td>&nbsp;</td></tr>\n";
	echo"<tr><td>&nbsp;</td></tr>\n";		
	echo"<tr><td colspan=\"2\" align=\"left\"><b>".$language['use_user_agent']."</b></td></tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['crawler_user_agent']."</td>\n";
	echo"<td><textarea name='crawlerua2' value='$crawlerua2' wrap=\"virtual\" row=\"20\" cols=\"37\"/></textarea></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";		
	echo"<td>".$language['crawler_ip']."</td>\n";
	echo"<td><input name='crawlerip2' value='$crawlerip2' type=\"text\" maxlength=\"16\" size=\"50\"/></td>\n";
	echo"</tr>\n";
	echo"<tr><td>&nbsp;</td></tr>\n";
	echo"<tr><td>&nbsp;</td></tr>\n";		
	echo"<tr>\n";
	echo"<td>".$language['crawler_user']."</td>\n";
	echo"<td><input name='crawleruser2' value='$crawleruser2' type=\"text\" maxlength=\"245\" size=\"50\"/></td>\n";
	echo"</tr>\n";
	echo"<tr><td>&nbsp;</td></tr>\n";	
	echo"<tr>\n";		
	echo"<td>".$language['crawler_url']."</td>\n";
	echo"<td><input name='crawlerurl2' value='$crawlerurl2' type=\"text\" maxlength=\"245\" size=\"50\"/></td>\n";
	echo"</tr>\n";			
	echo"<tr>\n";
	echo"<td colspan=\"2\">\n";
	echo"<br>\n";
	echo"<input name='ok' type='submit'  value=' OK ' size='20'>\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"</table>\n";
	echo"</form>\n";
	}

?>