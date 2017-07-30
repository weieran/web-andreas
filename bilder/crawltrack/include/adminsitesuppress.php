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
// file: adminsitesuppress.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

if(isset($_POST['suppresssite']))
	{	
	$suppresssite = $_POST['suppresssite'];
	}
else
	{
	$suppresssite = 0;
	}

if(isset($_POST['suppresssiteok']))
	{	
	$suppresssiteok = $_POST['suppresssiteok'];
	}
else
	{
	$suppresssiteok = 0;
	}




if($suppresssite==1)
	
	{
	
	if(isset($_POST['sitetosuppress']))
		{	
		$sitetosuppress = $_POST['sitetosuppress'];
		}
	else
		{
		header("Location:../index.php");
		}
	
	if(isset($_POST['idsitetosuppress']))
		{	
		$idsitetosuppress = $_POST['idsitetosuppress'];
		}
	else
		{
		header("Location:../index.php");
		}	
	
	
		
	if($suppresssiteok==1)
		{
		//site suppression
				
		//database connection

		$connexion = mysql_connect($host,$user,$password);
		$selection = mysql_select_db($db);

		//database query to suppress the site
		
		$sqldelete = "DELETE FROM crawlt_site WHERE name= '".sql_quote($sitetosuppress)."'";
		$requetedelete = mysql_query($sqldelete, $connexion);
		
		
		//database query to get page id used by this site
		
		//page used by this site
		
		
		$sqlpage = "SELECT * FROM crawlt_visits WHERE crawlt_site_id_site = '".sql_quote($idsitetosuppress)."'";

		$requetepage = mysql_query($sqlpage, $connexion);
		
		$nbrresult=mysql_num_rows($requetepage);
		if($nbrresult>=1)		
			{		
		
			while ($ligne = mysql_fetch_object($requetepage))                                                                              
				{
				$pageid[]=$ligne->crawlt_pages_id_page;
				}
			
			$pageid=array_unique($pageid);
		
		
			//page used by the other sites
			
							
			$sqlpage2 = "SELECT * FROM crawlt_visits WHERE crawlt_site_id_site NOT IN ('".sql_quote($idsitetosuppress)."')";

			$requetepage2 = mysql_query($sqlpage2, $connexion);

		
			$nbrresult=mysql_num_rows($requetepage2);
			if($nbrresult>=1)		
				{
				while ($ligne = mysql_fetch_object($requetepage2))                                                                              
					{
					$pageid2[]=$ligne->crawlt_pages_id_page;
					}		
		
				$pageid2=array_unique($pageid2);		
		
				//to get the pages used only in the site to suppress
				$pagetosuppress=array_diff($pageid,$pageid2);
				}
			else
				{
				$pagetosuppress=$pageid;
				}

			//database query to suppress the pages link only to the site to suppress in the pages tables
		
			$listpage=implode("','",$pagetosuppress);
			$listpage="('".$listpage."')";
		
			$sqldelete3="DELETE FROM crawlt_pages WHERE id_page IN  ".$listpage."";
			$requetedelete3 = mysql_query($sqldelete3, $connexion);
			}
		else
			{
			$requetedelete3=1;
			}

		//database query to suppress the site visits in the visit table
		

		
		$sqldelete2="DELETE FROM crawlt_visits WHERE crawlt_site_id_site= '".sql_quote($idsitetosuppress)."'";
		$requetedelete2 = mysql_query($sqldelete2, $connexion);		
		
		if($requetedelete && $requetedelete2 && $requetedelete3)
			{
			echo"<br><br><h1>".$language['site_suppress_ok']."</h1>\n";
			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='navig' value='6'>\n";			
			echo"<input name='ok' type='submit'  value='OK' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";	
			}
		else
			{
			echo"<br><br><h1>".$language['site_suppress_no_ok']."</h1>\n";			
			
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
		$sitetosuppress	= stripslashes($sitetosuppress);
		$sitetosuppressdisplay=htmlentities($sitetosuppress);

		echo"<br><br><h1>".$language['site_suppress_validation']."</h1>\n";
		echo"<h1>".$language['site_name']."&nbsp;$sitetosuppressdisplay</h1>\n";
	
		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='navig' value='6'>\n";
		echo "<input type=\"hidden\" name ='validform' value=\"9\">";
		echo "<input type=\"hidden\" name ='suppresssite' value=\"1\">\n";
		echo "<input type=\"hidden\" name ='suppresssiteok' value=\"1\">\n";	
		echo "<input type=\"hidden\" name ='sitetosuppress' value=\"$sitetosuppress\">\n";
		echo "<input type=\"hidden\" name ='idsitetosuppress' value=\"$idsitetosuppress\">\n";		
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
		echo "<input type=\"hidden\" name ='validform' value=\"9\">";
		echo "<input type=\"hidden\" name ='suppresssite' value=\"0\">\n";
		echo "<input type=\"hidden\" name ='suppresssiteok' value=\"0\">\n";	
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

		
	//database connection

	$connexion = mysql_connect($host,$user,$password);
	$selection = mysql_select_db($db);

	//database query to get site list
		
	$sqldeletesite = "SELECT * FROM crawlt_site";

	$requetedeletesite = mysql_query($sqldeletesite, $connexion);

	$nbrresult=mysql_num_rows($requetedeletesite);
		
	if($nbrresult>=1)
			{

		while ($ligne = mysql_fetch_object($requetedeletesite))                                                                              
			{
			$idsite=$ligne->id_site; 
			$sitename=$ligne->name;
			$namesite[$idsite]=$sitename;
			$siteid[$sitename]=$idsite;
			}
	
		//display	

		echo"<br><br><h1>".$language['site_suppress']."</h1>\n";

		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";
		echo"<tr><th class='tableau2' colspan='2'>\n";
		echo"".$language['site_list']."\n";
		echo"</th></tr>\n";

		foreach ($namesite as $site1)
			{
			$site1display=htmlentities($site1);
					
			echo"<tr><td class='tableau3' width='300px'>\n";
			echo"".$site1display."\n";
			echo"</td><td class='tableau4'>\n";	
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
			echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
			echo "<input type=\"hidden\" name ='validform' value=\"9\">\n";	
			echo "<input type=\"hidden\" name ='suppresssite' value=\"1\">\n";
			echo "<input type=\"hidden\" name ='sitetosuppress' value=\"$site1\">\n";
			echo "<input type=\"hidden\" name ='idsitetosuppress' value=\"".$siteid[$site1]."\">\n";					
			echo"<input type='submit' class='button4' value='".$language['suppress_site']."'>\n";
			echo"</form>\n";
			echo"</td></tr>\n";
			}
		echo"</table></div>\n";
		echo"<br>\n";
		}
	else
		{

		//display	

		echo"<br><br><h1>".$language['site_suppress']."</h1>\n";

		echo"<div class='tableau' align='center'>\n";	
		echo"<table   cellpadding='0px' cellspacing='0' width='450px'>\n";
		echo"<tr><th class='tableau2' colspan='2'>\n";
		echo"".$language['site_list']."\n";
		echo"</th></tr>\n";
		echo"</table></div>\n";
		echo"<br>\n";		
		
		}
		
		
		
	}

?>