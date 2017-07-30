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
// file: index.php
//----------------------------------------------------------------------

//version id

$versionid="130";


@error_reporting(0);

// do not modify
define('IN_CRAWLT', TRUE);

// session start 'crawlt'
session_name('crawlt');
session_start();


//function to escape query string


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

include"include/post.php";

//if install
if(file_exists('include/configconnect.php')  && $navig!=15 )
	{
	if($navig == 1)
		{
		$main="include/display-all-crawlers.php";
		}
	elseif($navig == 2)
		{
		$main="include/display-one-crawler.php";
		}
	elseif($navig == 3)
		{
		$main="include/display-all-pages.php";
		}
	elseif($navig == 4)
		{
		$main="include/display-one-page.php";
		}
	elseif($navig == 5)
		{
		$main="include/search.php";
		}
	elseif($navig == 6)
		{
		$main="include/admin.php";
		}
	elseif($navig == 7)
		{
		session_destroy();
		header("Location:index.php");
		}	
		
	
	//  IF NO SESSION LOGIN
	if( !isset($_SESSION['userlogin']) && !isset($_SESSION['userpass']))
		{
		//language file include
		include"include/configconnect.php";
		include "language/".$lang.".php";
		
		
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
		
		//access form
		include"include/header.php";
		
		echo"<div class=\"content\">\n";		
				
		echo"<h1>".$language['restrited_access']."</h1>\n";
		echo"<h2>".$language['enter_login']."</h2>\n";		
		echo"<div class=\"form\">\n";
		echo"<form action=\"include/login.php\" method=\"POST\" >\n";
		echo"<table align=\"centrer\" width=\"400px\">\n";
		echo"<tr>\n";		
		echo"<td >".$language['login']."&nbsp;<input name='userlogin'  value='$userlogin' type='text' maxlength='20' size='20'/></td></tr>\n";		
		echo"<tr><td></td></tr>\n";	
		echo"<tr><td >".$language['password']."&nbsp;<input name='userpass'  value='$userpass' type='password' maxlength='20' size='20'/></td</tr>\n";					
		echo "<input type=\"hidden\" name ='lang' value='$lang'>\n";
		echo"<tr><td><input name='ok' type='submit'  value='OK' size='20'></td></tr>\n";
		echo"</table></form>\n";
		echo"</div>\n";
		
		include"include/footer.php";		
						
		}
		
	else
		{
		
		//test to see if version is up-to-date
		include"include/configconnect.php";
		if (!isset($version))
			{
			$version=100;
			}
		if($version==$versionid)
			{
			//installation is up-to-date, display stats		
			include"include/header.php";
			include"$main";
			include"include/footer.php";
			}
		else
			{
			//update the installation
			include"include/header.php";
			include"include/updatecrawltrack.php";
			include"include/footer.php";
			}			
			
		}
	
	}
else
	{	
	//display install

	include"include/header.php";
	include"include/install.php";
	include"include/footer.php";	
		
	}

?>

</body>
</html>
