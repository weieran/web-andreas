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
// file: logochoice.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN') && !defined('IN_CRAWLT_INSTALL'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

echo"<h1>".$language['logo']."</h1>\n";

echo"<p>".$language['logo_choice']."</p>\n";


echo"<div class=\"form3\">\n";
echo"<form action=\"index.php\" method=\"POST\" >\n";
echo"<table>\n";
echo"<tr><td>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"0\" checked><img src=\"./images/logo.jpg\" width=\"100\" height=\"20\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"1\"><img src=\"./images/logo1.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"2\"><img src=\"./images/logo2.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"3\"><img src=\"./images/logo3.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"4\"><img src=\"./images/logo4.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"5\"><img src=\"./images/logo5.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"</td><td>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"6\"><img src=\"./images/logo6.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"7\"><img src=\"./images/logo7.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"8\"><img src=\"./images/logo8.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"9\"><img src=\"./images/logo9.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"10\"><img src=\"./images/logo10.png\" width=\"80\" height=\"15\" border=\"0\" alt=\"CrawlTrack\"><br><br>\n";
echo"<input type=\"radio\" name=\"logochoice\" value=\"11\">".$language['no_logo']."<br><br>\n";
echo"</td></tr>\n";
echo"</table>\n";


//continue
if($navig==6)
	{
	$validform=3;
	}
elseif ($navig==15)
	{
	$validform=7;
	}


echo "<input type=\"hidden\" name ='navig' value=$navig>\n";
echo "<input type=\"hidden\" name ='validform' value=$validform>";
echo"<table class=\"centrer\">\n";	
echo"<tr>\n";
echo"<td colspan=\"2\">\n";
echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
echo"</form>\n";
echo"</div>";

?>