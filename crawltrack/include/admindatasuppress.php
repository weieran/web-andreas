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
// file: admindatasuppress.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

if(isset($_POST['suppressdata']))
	{	
	$suppressdata = $_POST['suppressdata'];
	}
else
	{
	$suppressdata = 0;
	}

if(isset($_POST['suppressdataok']))
	{	
	$suppressdataok = $_POST['suppressdataok'];
	}
else
	{
	$suppressdataok = 0;
	}

if($suppressdata==1)
	
	{
	
	if(isset($_POST['datatosuppress']))
		{	
		$datatosuppress = $_POST['datatosuppress'];
		}
	else
		{
		header("Location:../index.php");
		exit();		
		}
	
	
		
	if($suppressdataok==1)
		{
		//data suppression
				
		//database connection

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);

	//period calculation
	
	$today = date("Y-m-d");
	$today2 = explode('-', $today);
	$yeartoday = $today2[0];
	$monthtoday = $today2[1];
	$daytoday = $today2[2];		



		if ($datatosuppress==1)	
			{
			$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 31536000;
			}
		elseif ($datatosuppress==2)			
			{
			$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 15768000;
			}
		elseif ($datatosuppress==3)	
			{
			$ts =  mktime(0,0,0,$monthtoday, $daytoday, $yeartoday) - 2628000;
			}

		$datetosuppress = date("Y-m-d",$ts);

		//database query to suppress the crawler		
		$sqldelete="DELETE FROM crawlt_visits WHERE date < '".sql_quote($datetosuppress)."'";
		$requetedelete = mysql_query($sqldelete, $connexion);		
		
		if($requetedelete)
			{
			echo"<br><br><h1>".$language['data_suppress_ok']."</h1>\n";
			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";	
			}
		else
			{
			echo"<br><br><h1>".$language['data_suppress_no_ok']."</h1>\n";			
			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";			
			}
		
		}
	else
		{
		//validation of suppression	
	
		//display	
		
		if ($datatosuppress==1)	
			{
			$datatosuppressdisplay=$language['one_year_data'];
			}
		elseif ($datatosuppress==2)			
			{
			$datatosuppressdisplay=$language['six_months_data'];
			}
		elseif ($datatosuppress==3)	
			{
			$datatosuppressdisplay=$language['one_month_data'];
			}				
			

		echo"<br><br><h1>".$language['data_suppress_validation']."$datatosuppressdisplay &nbsp;?</h1>\n";
	
		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='navig' value='6'>\n";
		echo "<input type=\"hidden\" name ='validform' value=\"17\">";
		echo "<input type=\"hidden\" name ='suppressdata' value=\"1\">\n";
		echo "<input type=\"hidden\" name ='suppressdataok' value=\"1\">\n";	
		echo "<input type=\"hidden\" name ='datatosuppress' value=\"$datatosuppress\">\n";
		echo"<table class=\"centrer\">\n";	
		echo"<tr>\n";
		echo"<td colspan=\"2\">\n";
		echo"<input name='ok' type='submit'  value=' ".$language['yes']." ' size='20'>\n";
		echo"</td>\n";
		echo"</tr>\n";
		echo"</table>\n";
		echo"</form>\n";
		echo"</div>";
	
		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='navig' value='6'>\n";
		echo "<input type=\"hidden\" name ='suppressdata' value=\"0\">\n";
		echo "<input type=\"hidden\" name ='suppressdataok' value=\"0\">\n";	
		echo"<table class=\"centrer\">\n";	
		echo"<tr>\n";
		echo"<td colspan=\"2\">\n";
		echo"<input name='ok' type='submit'  value=' ".$language['no']." ' size='20'>\n";
		echo"</td>\n";
		echo"</tr>\n";
		echo"</table>\n";
		echo"</form>\n";
		echo"</div>";	
	
		}	
	
	}
else
	{
	
	echo"<br><br><h1>".$language['data_suppress']."</h1>\n";
	
	
	$connexion = mysql_connect($host,$user,$password);
	$selection = mysql_select_db($db);

	$sql = "SELECT * FROM crawlt_visits ORDER BY date ASC";

	$requete = mysql_query($sql, $connexion);
	
	$nbrresult=mysql_num_rows($requete);
	if($nbrresult>=1)
			{
			$ligne = mysql_fetch_object($requete);

			$date=$ligne->date;
			$date2 = explode('-', $date);
			$yeardate = $date2[0];
			$monthdate = $date2[1];
			$daydate = $date2[2];	
			$daydate2 = explode(' ',$daydate);
	
	
			if ($lang=='english')
				{
				echo"<h2>".$language['oldest_data']."$monthdate /".$daydate2[0]."/ $yeardate</h2>";
				}
			else
				{
				echo"<h2>".$language['oldest_data']."".$daydate2[0]." / $monthdate / $yeardate</h2>";
				}
			echo"<br><br><table>\n";
			echo"<tr><td valign='top'>\n";
			echo"".$language['data_suppress2']."\n";
			echo"</td><td>\n";
			echo"<div class=\"form3\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo"<input type=\"radio\" name=\"datatosuppress\" value=\"1\" checked>".$language['one_year_data']."<br><br>\n";
			echo"<input type=\"radio\" name=\"datatosuppress\" value=\"2\">".$language['six_months_data']."<br><br>\n";
			echo"<input type=\"radio\" name=\"datatosuppress\" value=\"3\">".$language['one_month_data']."<br><br>\n";
			echo "<input type=\"hidden\" name =\"suppressdata\" value=\"1\">\n";	
			echo "<input type=\"hidden\" name =\"navig\" value=\"6\">\n";
			echo "<input type=\"hidden\" name =\"validform\" value=\"17\">\n";
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>";
			echo"</td></tr></table>\n";
			}
		else
			{
			echo"<h2>".$language['no_data']."</h2>";			
			}
		
	}
?>