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
// file: english.php
//----------------------------------------------------------------------


//installation
$language['install']="Installation";
$language['welcome_install'] ="Welcome on CrawlTrack, installation in three steps is easy .";
$language['menu_install_1']="1) Enter database connection datas.";
$language['menu_install_2']="2) Set-up websites.";
$language['menu_install_3']="3) Set-up users rights.";
$language['go_install']="Install";
$language['step1_install'] ="Please enter in the following form information regarding database connection. Once the form validate, the tables and the connections files will be created.";
$language['step1_install_login_mysql']="User MySQL";
$language['step1_install_password_mysql']="Password MySQL";
$language['step1_install_host_mysql']="Host MySQL";
$language['step1_install_database_mysql']="Database MySQL";
$language['step1_install_ok'] ="Connection files OK.";
$language['step1_install_ok2'] ="Tables creation OK.";
$language['step1_install_no_ok'] ="Information are missing to create the tables and the files, please check the form content and revalidate after correction.";
$language['step1_install_no_ok2'] ="The files hasn't been created, check if the folder is CHMOD 777.";
$language['step1_install_no_ok3'] ="A problem appear during table creation, try again.";
$language['back_to_form'] ="Back to the form";
$language['retry'] ="Try again";
$language['step2_install_no_ok']="Connection to the database is not possible, please, check the connection datas.";
$language['step3_install_no_ok']="Database selection is not possible, please, check the connection datas.";
$language['step4_install']="Go";

//site creation

$language['set_up_site']="Please enter below the website name, it's the name that will be used in CrawlTrack. No need to enter the website url, just it's name (for example: Example in place of: http://www.example.com).";
$language['site_name']="Website name:";
$language['site_no_ok']="You have to enter a website name.";
$language['site_ok']="The website has been add to the database.";
$language['new_site']="Add a new website";


//tag creation
$language['tag']="Tag to insert in your pages";
$language['create_tag']="You will find below the tags for each of the website. It's a php tag you have to insert in .php pages. If your pages are not .php, you can simply change the extension to .php and add  &#60;?php  before the tag and ?&#62; after."; 
$language['site_name2']="Website name";
$language['local_tag']="Tag to used if your hoster has disallow fsockopen and fputs functions. In that case the website need to be on the same host than CrawlTrack.";
$language['non_local_tag']="Standard tag.";

//login set_up
$language['admin_creation']="Administrator account set-up";
$language['admin_setup']="Please enter below the administrator login and password.";
$language['user_creation']="User account set-up";
$language['user_setup']="Please enter below the user login and password.";
$language['user_site_creation']="User-website account set-up";
$language['user_site_setup']="Please enter below the user-website login and password.";
$language['admin_rights']="Administrator has access to all website stats and set-up";
$language['login']="Login";
$language['password']="Password";
$language['valid_password']="Enter a second time the password.";
$language['login_no_ok']="Datas are missing or the passwords are different, please check the form content and revalidate after correction.";
$language['login_ok']="Account is set-up.";
$language['login_no_ok2']="A problem appear during account set-up, try again.";
$language['login_user']="Create a user account";
$language['login_user_what']="User has access to all website stats";
$language['login_user_site']="Create a user-website account";
$language['login_user_site_what']="User-website has access to one website stats";
$language['login_finish']="All needed accounts are set-up, installation is now finish.";


//access

$language['restrited_access']="Restricted access.";
$language['enter_login']="Please, enter below your login and password.";


//display


$language['crawler_name']="Crawlers";
$language['nbr_visits']="Visits";
$language['nbr_pages']="Pages viewed";
$language['date_visits']="Last visit";
$language['display_period']="Studied period :";
$language['today']="Today";
$language['days']="Since 8 days";
$language['month']="Since one month";
$language['one_year']="Since one year";
$language['no_visit']="There is no visit.";
$language['page']="Pages";
$language['admin']="Set-up";
$language['nbr_tot_visits']="Total visits";
$language['nbr_tot_pages']="Total pages viewed";
$language['nbr_tot_crawlers']="Nbre of crawlers";
$language['visit_per-crawler']="Visits details";
$language['100_visit_per-crawler']="Visits details (display limited to 100 lines).";
$language['user_agent']="User agent";
$language['Origin']="User";
$language['help']="Help";

//search

$language['search']="Search";
$language['search2']="Search";
$language['search_crawler']="a crawler";
$language['search_user_agent']="a user-agent";
$language['search_page']="a page";
$language['search_user']="a crawler user";
$language['go_search']="Search";
$language['result_crawler']="Here are the crawlers you are looking for.";
$language['result_ua']="Here are the user-agents you are looking for.";
$language['result_page']="Here are the pages you are looking for.";
$language['result_user']="Here are the crawler users you are looking for.";
$language['result_user_crawler']="Here are the crawlers of that user.";
$language['result_user_1']="User:&nbsp;";
$language['result_crawler_1']="Search keyword:&nbsp;";
$language['no_answer']="There is no answer.";
$language['to_many_answer']="There is more than 100 answers (display limited to 100 lines).";


//admin

$language['user_create']="Create a new user account.";
$language['user_site_create']="Create a new user-website account.";
$language['new_site']="Add a website.";
$language['see_tag']="Display tags to insert.";
$language['new_crawler']="Add a new crawler";
$language['crawler_creation']="Please complete the following form with the new crawler datas."; 
$language['crawler_name2']="Crawler name:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="Crawler user:";
$language['crawler_url']="User url (like this: http://www.example.com)";
$language['crawler_url2']="User url:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Datas are missing, please check the form content and revalidate after correction.";
$language['exist']="That crawler is already in the database";
$language['exist_data']="Here are the datas concerning it in the database:";
$language['crawler_no_ok2']="A problem appear during crawler creation, try again.";
$language['crawler_ok']="The crawler has been added to the database.";

$language['user_suppress']="Suppress a user or a user-website account.";
$language['user_list']="List of users and user-websites logins";
$language['suppress_user']="Suppress that account";
$language['user_suppress_validation']="Are you sur that you want to suppress that account?";
$language['yes']="Yes";
$language['no']="No";
$language['user_suppress_ok']="The account has been successfully deleted.";
$language['user_suppress_no_ok']="A problem appear during account suppression, try again.";

$language['site_suppress']="Suppress a website.";
$language['site_list']="Websites list";
$language['suppress_site']="Suppress that website";
$language['site_suppress_validation']="Are you sur that you want to suppress that website?";
$language['site_suppress_ok']="The website has been successfully deleted.";
$language['site_suppress_no_ok']="A problem appear during website suppression, try again.";

$language['crawler_suppress']="Suppress a crawler.";
$language['crawler_list']="Crawler list";
$language['suppress_crawler']="Suppress that crawler";
$language['crawler_suppress_validation']="Are you sur that you want to suppress that crawler?";
$language['crawler_suppress_ok']="The crawler has been successfully deleted.";
$language['crawler_suppress_no_ok']="A problem appear during crawler suppression, try again.";

$language['crawler_test_creation']="Create a test crawler.";
$language['crawler_test_suppress']="Suppress the test crawler.";
$language['crawler_test_text']="Once the test crawler created, visit your site with the computer and the browser used to create the crawler."; 
$language['crawler_test_text2']="If everything is OK, your visit will be display in CrawlTrack as a Test-Crawltrack crawler visit. Don't forget after that to suppress the test crawler.";
$language['crawler_test_no_exist']="The test crawler didn't exist in the database.";

$language['exist_site']="That site is already in the database";
$language['exist_login']="That login is already in the database";

//1.2.0
$language['update_title']="Crawlers list update.";
$language['update_crawler']="Update the crawlers list.";
$language['list_up_to_date']="There is no updated crawlers list available actually.";
$language['update_ok']="Update successfull.";
$language['crawler_add']="crawlers have been added to the database";
$language['no_access']="Online update is not available.<br><br>To update, click on the link below to download the last crawlers list, upload the crawlerlist.php file in your CrawlTrack include folder and restart the update procedure.";
$language['no_access2']="Link with www.CrawlTrack.info failed, please try again later.";
$language['download_update']="If you have already upload on your site the new crawlers list, click on the button below to update your database.";
$language['download']="Download the crawlers list.";
$language['your_list']="The list you are using is:";
$language['crawltrack_list']="The list available on www.Crawltrack.info is:";
$language['no_update']="Do not update the crawlers list.";
$language['no_crawler_list']="The file crawlerlist.php didn't exist in your include folder.";

//1.3.0
$language['use_user_agent']="Crawler detection is made by user agent or by IP. You have to complete one of these two informations.";
$language['user_agent_or_ip']="User agent or IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Crawlt_crawler table update OK.";
$language['files_mod_ok']="Configconnect.php and crawltrack.php files update OK.";
$language['update_crawltrack_ok']="CrawlTrack update is finish, you are now using version :";
$language['table_mod_no_ok']="Crawlt_crawler table update failed.";
$language['files_mod_no_ok']="A problem appear during configconnect.php and crawltrack.php update.";
$language['update_crawltrack_no_ok']="A problem appear during CrawlTrack update.";
$language['logo']="Logo choice.";
$language['logo_choice']="You can here choose the logo which will appear on your pages at the place of the CrawlTrack tag. If you don't want to see the CrawlTrack logo, select \"No logo\".";
$language['no_logo']="No logo.";
$language['data_suppress_ok']="The datas have been successfully deleted.";
$language['data_suppress_no_ok']="A problem appear during datas suppression, try again.";
$language['data_suppress_validation']="Are you sur you want to suppress all &nbsp;";
$language['data_suppress']="Delete the oldest datas in the visits table.";
$language['data_suppress2']="Suppress all";
$language['one_year_data']="datas more than one year old";
$language['six_months_data']="datas more than six months old";
$language['one_month_data']="datas more than one month old";
$language['oldest_data']="The oldest data dates from the &nbsp;";
$language['no_data']="There is no data in the visits table.";

?>