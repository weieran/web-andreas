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
// file: createsite.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_INSTALL'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}


//echo"<h1>".$language['site']."</h1>\n";

//valid form

if($validsite==1 && $sitename=='')
	{
	echo"<p>".$language['site_no_ok']."</p>";

	
	$validsite=0;
	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value='4'>\n";
	echo "<input type=\"hidden\" name ='navig' value='15'>\n";
	echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";	
	echo "<input type=\"hidden\" name ='sitename' value='$sitename'>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
	echo"</form>\n";
	echo"</div>\n";
	}
else
	{


	//database connection

	include"include/configconnect.php";

	$connexion = mysql_connect($host,$user,$password);
	$selection = mysql_select_db($db);


	if($validsite !=1)
		{
		//form to add site in the database

		echo"<p>".$language['set_up_site']."</p>\n";
		echo"</div>\n";
	

		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='navig' value='15'>\n";
		echo "<input type=\"hidden\" name ='validform' value=\"4\">";
		echo "<input type=\"hidden\" name ='validsite' value=\"1\">";
		echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";	
		echo"<table class=\"centrer\">\n";
		echo"<tr>\n";
		echo"<td>".$language['site_name']."</td>\n";
		echo"<td><input name='sitename'  value='$sitename' type='text' maxlength='45' size='50'/></td>\n";
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
	else
		{
		//add the site in the database

		//check if site already exist
		
		
		$sqlexist = "SELECT * FROM crawlt_site
		WHERE name='".sql_quote($sitename)."'";

		$requeteexist = mysql_query($sqlexist, $connexion);
		
		$nbrresult=mysql_num_rows($requeteexist);
		
		if($nbrresult>=1)
			{
			//site already exist
			
			echo"<h1>".$language['exist_site']."</h1>\n";
			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='15'>\n";
			echo "<input type=\"hidden\" name ='validform' value=\"4\">";
			echo "<input type=\"hidden\" name ='validsite' value=\"0\">";
			echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";	
			echo"<table class=\"centrer\">\n";	
			echo"<tr>\n";
			echo"<td colspan=\"2\">\n";
			echo"<br>\n";
			echo"<input name='ok' type='submit'  value=' ".$language['new_site']." ' size='20'>\n";
			echo"</td>\n";
			echo"</tr>\n";
			echo"</table>\n";
			echo"</form>\n";
			

			//continue

			
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='15'>\n";
			echo "<input type=\"hidden\" name ='validform' value=\"5\">";
			echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
			echo"<table class=\"centrer\">\n";	
			echo"<tr>\n";
			echo"<td colspan=\"2\">\n";
			echo"<input name='ok' type='submit'  value=' ".$language['step4_install']." ' size='20'>\n";
			echo"</td>\n";
			echo"</tr>\n";
			echo"</table>\n";
			echo"</form>\n";
			echo"</div>";			
						
			}
		else
			{
			
			//the site didn't exist, we can add it in the database
			
			
			$sqlsite2="INSERT INTO crawlt_site (name) VALUES ('".sql_quote($sitename)."')";
			$requetesite2 = mysql_query($sqlsite2, $connexion);

			//check is requete is successfull

			if($requetesite2==1)
				{
				echo"<p>".$language['site_ok']."</p>\n";
			
				//add a new site

				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='navig' value='15'>\n";
				echo "<input type=\"hidden\" name ='validform' value=\"4\">";
				echo "<input type=\"hidden\" name ='validsite' value=\"0\">";
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";	
				echo"<table class=\"centrer\">\n";	
				echo"<tr>\n";
				echo"<td colspan=\"2\">\n";
				echo"<br>\n";
				echo"<input name='ok' type='submit'  value=' ".$language['new_site']." ' size='20'>\n";
				echo"</td>\n";
				echo"</tr>\n";
				echo"</table>\n";
				echo"</form>\n";
			

				//continue

			
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='navig' value='15'>\n";
				echo "<input type=\"hidden\" name ='validform' value=\"5\">";
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
				echo"<table class=\"centrer\">\n";	
				echo"<tr>\n";
				echo"<td colspan=\"2\">\n";
				echo"<input name='ok' type='submit'  value=' ".$language['step4_install']." ' size='20'>\n";
				echo"</td>\n";
				echo"</tr>\n";
				echo"</table>\n";
				echo"</form>\n";
				echo"</div>";
				}
			}
		}

	}


?>