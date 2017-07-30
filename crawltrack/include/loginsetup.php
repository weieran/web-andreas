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
// file: loginsetup.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_INSTALL'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

//valid form

if($validlogin==1)
	{
    if($login=='' OR $password2=='' OR $password3=='' OR $password2 != $password3)
		{        
		echo"<p>".$language['login_no_ok']."</p>";


		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='validform' value='6'>\n";
		echo "<input type=\"hidden\" name ='navig' value='15'>\n";
		echo "<input type=\"hidden\" name ='validlogin' value='0'>\n";
		echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";					
		echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
		echo "<input type=\"hidden\" name ='login' value='$login'>\n";
		echo "<input type=\"hidden\" name ='password2' value='$password2'>\n";
		echo "<input type=\"hidden\" name ='password3' value='$password3'>\n";
		echo "<input type=\"hidden\" name ='site' value='$site'>\n";		
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
		

		//check if login already exist
		
		
		$sqlexist = "SELECT * FROM crawlt_login
		WHERE crawlt_user='".sql_quote($login)."'";

		$requeteexist = mysql_query($sqlexist, $connexion);
		
		$nbrresult=mysql_num_rows($requeteexist);
		
		if($nbrresult>=1)
			{
			//login already exist		
			echo"<h1>".$language['exist_login']."</h1>";


			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='validform' value='6'>\n";
			echo "<input type=\"hidden\" name ='navig' value='15'>\n";
			echo "<input type=\"hidden\" name ='validlogin' value='0'>\n";
			echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";					
			echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
			echo "<input type=\"hidden\" name ='login' value='$login'>\n";
			echo "<input type=\"hidden\" name ='password2' value='$password2'>\n";
			echo "<input type=\"hidden\" name ='password3' value='$password3'>\n";
			echo "<input type=\"hidden\" name ='site' value='$site'>\n";		
			echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";
			}
		else
			{		
		
			//add the login in the database
		
			//password treatment
			$pass=md5($password2);
			if($logintype==0)
				{
				$admin=1;
				$website=0;
				}
			elseif($logintype==1)
				{
				$admin=0;
				$website=0;
				}	
			elseif($logintype==2)
				{
				$admin=0;
				$website=$site;
				}					
		
		
			$sqllogin="INSERT INTO crawlt_login (crawlt_user,crawlt_password,admin,site) VALUES ('".sql_quote($login)."','".sql_quote($pass)."','".sql_quote($admin)."','".sql_quote($website)."')";
			$requetelogin = mysql_query($sqllogin, $connexion);

			//check is requete is successfull

			if($requetelogin==1)
				{
				if($logintype==0)
					{
					echo"<h2>".$language['admin_creation']."</h2>\n";
					}
				elseif($logintype==1)	
					{
					echo"<h2>".$language['user_creation']."</h2>\n";
					}		
				elseif($logintype==2)	
					{
					echo"<h2>".$language['user_site_creation']."</h2>\n";
					}			
			
				echo"<p>".$language['login_ok']."</p>\n";
				if($logintype==0)
					{
					echo"<h2>".$language['login_user']."</h2>\n";
					echo"<p>".$language['login_user_what']."</p>\n";			

					echo"<div class=\"form\">\n";
					echo"<form action=\"index.php\" method=\"POST\" >\n";
					echo "<input type=\"hidden\" name ='validform' value='6'>\n";
					echo "<input type=\"hidden\" name ='logintype' value='1'>\n";
					echo "<input type=\"hidden\" name ='navig' value='15'>\n";
					echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";			
					echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
					echo"</form>\n";
					echo"</div>\n";
					}
			
				echo"<h2>".$language['login_user_site']."</h2>\n";			
				echo"<p>".$language['login_user_site_what']."</p>\n";	
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='validform' value='6'>\n";
				echo "<input type=\"hidden\" name ='logintype' value='2'>\n";
				echo "<input type=\"hidden\" name ='navig' value='15'>\n";			
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";						
				echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";			
			
				
				echo"<h2>".$language['login_finish']."</h2>\n";			
				
			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";							
			
				}
			else
				{
				echo"<h2>".$language['admin_creation']."</h2>\n";			
				echo"<p>".$language['login_no_ok2']."</p>";

			
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='validform' value='6'>\n";
				echo "<input type=\"hidden\" name ='navig' value='15'>\n";
				echo "<input type=\"hidden\" name ='validlogin' value='1'>\n";
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";			
				echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";		
				echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
				echo "<input type=\"hidden\" name ='login' value='$login'>\n";
				echo "<input type=\"hidden\" name ='password2' value='$password2'>\n";
				echo "<input type=\"hidden\" name ='password3' value='$password3'>\n";
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
	if($logintype==0)
		{
		echo"<h2>".$language['admin_creation']."</h2>\n";
		echo"<p>".$language['admin_setup']."</p>\n";
		echo"<p>".$language['admin_rights']."</p>\n";
		}
	elseif($logintype==1)	
		{
		echo"<h2>".$language['user_creation']."</h2>\n";
		echo"<p>".$language['user_setup']."</p>\n";
		echo"<p>".$language['login_user_what']."</p>\n";
		}		
	elseif($logintype==2)	
		{
		echo"<h2>".$language['user_site_creation']."</h2>\n";
		echo"<p>".$language['user_site_setup']."</p>\n";
		echo"<p>".$language['login_user_site_what']."</p>\n";
		
		
		//database connection
		
		include"include/configconnect.php";

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);
		
		
		
		
		//mysql requete
	
		$sqlsite = "SELECT * FROM crawlt_site";

	
		$requetesite = mysql_query($sqlsite, $connexion);
	
		$nbrresult=mysql_num_rows($requetesite);
	
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
		}

		
	echo"</div>\n";

	//data collect form

	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	if($logintype==2)	
		{
		echo"".$language['site_name']."";
		echo"<select  size=\"1\" name=\"site\"  style=\" font-size:14px; font-weight:bold; color: #003399;
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

		echo"</select>\n";		
		
		
		}
	
	
	
	
	echo "<input type=\"hidden\" name ='validform' value=\"6\">";
	echo "<input type=\"hidden\" name ='navig' value='15'>\n";
	echo "<input type=\"hidden\" name ='validlogin' value='1'>\n";			
	echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
	echo "<input type=\"hidden\" name ='logintype' value='$logintype'>\n";	
	echo"<table class=\"centrer\">\n";
	echo"<tr>\n";
	echo"<td>".$language['login']."</td>\n";
	echo"<td><input name='login'  value='$login' type='text' maxlength='20' size='50'/></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['password']."</td>\n";
	echo"<td><input name='password2' value='$password2' type='password' size='50'/></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td colspan=\"2\">\n";
	echo"".	$language['valid_password']."\n";
	echo"</td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['password']."</td>\n";
	echo"<td><input name='password3' value='$password3' type='password' size='50'/></td>\n";
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