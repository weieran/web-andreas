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
// file: install.php
//----------------------------------------------------------------------



if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}


// do not modify
define('IN_CRAWLT_INSTALL', TRUE);




echo"<div class=\"content\">\n";



//test validity form
if($validform==1)
	{
	//language file include
	include "language/".$lang.".php";
	
	// echo text

	echo"<h1>".$language['install']."</h1>\n";

	echo"<p>".$language['welcome_install']."</p>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h5>".$language['menu_install_2']."</h5>\n";
	echo"<h5>".$language['menu_install_3']."</h5>\n";
	echo"</div>\n";		
	
	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value='2'>\n";
	echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";	
	echo"<input name=\"ok\" type=\"submit\"  value='".$language['go_install']."' >\n";
	echo"</form>\n";
	echo"<br></div>\n";	
	
	}
elseif( $validform==2)
	{
	//language file include
	include "language/".$lang.".php";
	
	//connection datas collect
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h4>".$language['menu_install_2']."</h4>\n";
	echo"<h4>".$language['menu_install_3']."</h4>\n";
	echo"</div>\n";	
	
	
	echo"<p>".$language['step1_install']."</p>\n";
	echo"</div>\n";

	//data collect form

	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value=\"3\">";
	echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
	echo"<table class=\"centrer\" >\n";
	echo"<tr>\n";
	echo"<td>".$language['step1_install_login_mysql']."</td>\n";
	echo"<td><input name='idmysql'  value='$idmysql' type='text' size='50'/></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['step1_install_password_mysql']."</td>\n";
	echo"<td><input name='passwordmysql' value='$passwordmysql' type='password' size='50'/></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['step1_install_host_mysql']."</td>\n";
	echo"<td><input name='hostmysql' value='$hostmysql' type='text' size='50'/></td>\n";
	echo"</tr>\n";
	echo"<tr>\n";
	echo"<td>".$language['step1_install_database_mysql']."</td>\n";
	echo"<td><input name='basemysql' value='$basemysql' type='text' size='50'/></td>\n";
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
elseif($validform==3)
	{
	//language file include
	include "language/".$lang.".php";
	
	
	//file and tables creation
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h4>".$language['menu_install_2']."</h4>\n";
	echo"<h4>".$language['menu_install_3']."</h4>\n";
	echo"</div>\n";		
	
		
	include"include/createtable.php";
	}
elseif($validform==4)
	{
	//language file include
	include "language/".$lang.".php";
	
	//site creation
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h5>".$language['menu_install_2']."</h5>\n";
	echo"<h4>".$language['menu_install_3']."</h4>\n";
	echo"</div>\n";			
	
		
	include"include/createsite.php";
	}
elseif($validform==5)
	{
	//language file include
	include "language/".$lang.".php";
		
	//tag creation
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h5>".$language['menu_install_2']."</h5>\n";
	echo"<h4>".$language['menu_install_3']."</h4>\n";
	echo"</div>\n";		
	
	
	include"include/logochoice.php";	
	}
elseif($validform==6)
	{
	//language file include
	include "language/".$lang.".php";
		
	//user right
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h5>".$language['menu_install_2']."</h5>\n";
	echo"<h5>".$language['menu_install_3']."</h5>\n";
	echo"</div>\n";		
	
	
	include"include/loginsetup.php";	
	}
elseif($validform==7)
	{
	//language file include
	include "language/".$lang.".php";
		
	//tag creation
	echo"<h1>".$language['install']."</h1>\n";
	
	echo"<div align=\"left\">\n";
	echo"<h5>".$language['menu_install_1']."</h5>\n";
	echo"<h5>".$language['menu_install_2']."</h5>\n";
	echo"<h4>".$language['menu_install_3']."</h4>\n";
	echo"</div>\n";		
	
	
	include"include/createtag.php";	
	}	

else
	{
	//language choice
	echo"<br><h1>Welcome // Bienvenido // Wilkommen // Bienvenue</h1>\n";
	echo"<br><h2>Choose your language  // Elija su lengua <br><br> Wählen Sie Ihre Sprache // Choisissez votre langue.</h2><br><br>\n";
	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value='1'>\n";
	echo"<h1><input type=\"radio\" name=\"lang\" value=\"english\" >English\n";
	echo"<input type=\"radio\" name=\"lang\" value=\"spanish\" >Español\n";
	echo"<input type=\"radio\" name=\"lang\" value=\"german\" >Deutsch\n";	
	echo"<input type=\"radio\" name=\"lang\" value=\"french\" >Français</h1>\n";
	echo"<input name=\"ok\" type=\"submit\"  value=\"OK\" >\n";
	echo"</form>\n";
	echo"<br></div>\n";	
	}

?>