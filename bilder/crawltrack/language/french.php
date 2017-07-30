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
// file: french.php
//----------------------------------------------------------------------


//installation
$language['install']="Installation";
$language['welcome_install'] ="Bienvenue sur CrawlTrack, l'installation va se faire simplement en 3 �tapes.";
$language['menu_install_1']="1) Saisie des donn�es de connection.";
$language['menu_install_2']="2) Param�trage des sites � auditer.";
$language['menu_install_3']="3) Param�trage des droits des utilisateur.";

$language['go_install']="Installer";

$language['step1_install'] ="Veuillez saisir dans le formulaire ci-dessous les informations concernant les identifiants de connection � la base de donn�es. Une fois le formulaire valid�, les tables et  le fichier de connection vont �tre automatiquement cr��s.";
$language['step1_install_login_mysql']="Identifiant MySQL";
$language['step1_install_password_mysql']="Mot de passe MySQL";
$language['step1_install_host_mysql']="Serveur MySQL";
$language['step1_install_database_mysql']="Base MySQL";
$language['step1_install_table_mysql']="Pr�fixe des tables";
$language['step1_install_ok'] ="Fichier de connection OK.";
$language['step1_install_ok2'] ="Cr�ation des tables OK.";
$language['step1_install_no_ok'] ="Il manque des informations pour cr�er les tables et le fichier de connection, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['step1_install_no_ok2'] ="Le fichier n'a pas pu �tre cr��, v�rifier que le r�pertoire est en CHMOD 777.";
$language['step1_install_no_ok3'] ="Un probl�me est survenu lors de la cr�ation des tables, essayer de nouveau la proc�dure.";
$language['back_to_form'] ="Retour au formulaire de saisie";
$language['retry'] ="Essayer de nouveau";
$language['step2_install_no_ok']="La connection � la base n'a pas pu s'effectuer, veuillez v�rifier les donn�es saisies.";
$language['step3_install_no_ok']="La s�lection de la base n'a pas pu s'effectuer, veuillez v�rifier les donn�es saisies.";
$language['step4_install']="Suite";

//site creation

$language['set_up_site']="Veuillez noter ci-dessous le nom du site � auditer, il s'agit du nom qui sera utilis� pour identifier le site lors de l'utilisation de CrawlTrack. Il n'est pas n�cessaire de saisir l'url du site, mais juste son nom (par exemple: Example � la place de: http://www.example.com).";
$language['site_name']="Nom du site:";
$language['site_no_ok']="Vous devez entrer un nom de site.";
$language['site_ok']="Le site a �t� ajout� � la base de donn�e.";
$language['new_site']="Ajouter un autre site";


//tag creation
$language['tag']="Tag � ins�rer dans vos pages";
$language['create_tag']="Vous trouverez ci-dessous le tag correspondant � chacun des sites configur�s. Il s'agit d'un tag en php qu'il vous faut ins�rer dans vos pages qui doivent donc �tre en .php. Si vos pages ne sont pas en .php, vous pouvez simplement changer l'extension en .php et mettre  &#60;?php  avant le tag et ?&#62; apr�s."; 
$language['site_name2']="Nom du site";
$language['local_tag']="Tag a utiliser si l'h�bergeur du site � audit� a d�sactiv� les fonctions fsockopen et fputs, CrawlTrack doit dans ce cas �tre install� sur le m�me serveur que le site � auditer.";
$language['non_local_tag']="Tag standard";

//login set_up
$language['admin_creation']="Cr�ation du compte administrateur";
$language['admin_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'administrateur.";
$language['user_creation']="Cr�ation du compte utilisateur";
$language['user_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'utilisateur.";
$language['user_site_creation']="Cr�ation du compte utilisateur-site";
$language['user_site_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'utilisateur-site.";
$language['admin_rights']="L'administrateur a acc�s � la zone de configuration ainsi qu'aux stats de tous les sites audit�s.";
$language['login']="Identifiant";
$language['password']="Mot de passe";
$language['valid_password']="Saisissez une deuxi�me fois votre mot de passe.";
$language['login_no_ok']="Il manque des informations ou les mots de passe saisies sont diff�rents, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['login_ok']="Le compte a �t� cr��.";
$language['login_no_ok2']="Un probl�me est survenu lors de la cr�ation du compte, essayer de nouveau la proc�dure.";
$language['login_user']="Cr�er un compte utilisateur";
$language['login_user_what']="Un utilisateur a acc�s � l'ensemble des stats des sites";
$language['login_user_site']="Cr�er un compte utilisateur-site";
$language['login_user_site_what']="Un utilisateur-site a acc�s aux stats d'un seul site";
$language['login_finish']="J'ai cr�� l'ensembles des comptes voulus, l'installation est donc termin�e.";


//access

$language['restrited_access']="L'acc�s aux statistiques est prot�g�.";
$language['enter_login']="Veuillez saisir ci-dessous votre identifiant et votre mot de passe.";

//display


$language['crawler_name']="Robots";
$language['nbr_visits']="Visites";
$language['nbr_pages']="Pages vues";
$language['date_visits']="Derni�re visite";
$language['display_period']="P�riode �tudi�e :";
$language['today']="Aujourd'hui";
$language['days']="Depuis 8 jours";
$language['month']="Depuis 1 mois";
$language['one_year']="Depuis un an";
$language['no_visit']="Il n'y a pas eu de visite.";
$language['page']="Pages";
$language['admin']="Configuration";
$language['nbr_tot_visits']="Total visites";
$language['nbr_tot_pages']="Total pages vues";
$language['nbr_tot_crawlers']="Nbre de robots";
$language['visit_per-crawler']="D�tail des visites";
$language['100_visit_per-crawler']="D�tail des visites (affichage limit� � 100 lignes).";
$language['user_agent']="User agent";
$language['Origin']="Utilisateur";
$language['help']="Aide";

//search

$language['search']="Recherche";
$language['search2']="Rechercher";
$language['search_crawler']="un robot";
$language['search_user_agent']="un user-agent";
$language['search_page']="une page";
$language['search_user']="un utilisateur de robot";
$language['go_search']="Chercher";
$language['result_crawler']="Voici les robots qui correspondent � votre recherche.";
$language['result_ua']="Voici les user-agents qui correspondent � votre recherche.";
$language['result_page']="Voici les pages qui correspondent � votre recherche.";
$language['result_user']="Voici les utilisateurs qui correspondent � votre recherche.";
$language['result_user_crawler']="Voici les robots de cet utilisateur.";
$language['result_user_1']="Utilisateur:&nbsp;";
$language['result_crawler_1']="Mot recherch�:&nbsp;";
$language['no_answer']="Il n'y a pas de r�ponse correspondant � votre recherche.";
$language['to_many_answer']="Il y a plus de 100 r�ponses (affichage limit� � 100 lignes).";


//admin

$language['user_create']="Cr�er un nouveau compte utilisateur.";
$language['user_site_create']="Cr�er un nouveau compte utilisateur-site.";
$language['new_site']="Ajouter un site � auditer.";
$language['see_tag']="Voir les tags � ins�rer.";
$language['new_crawler']="Ajouter un nouveau robot.";
$language['crawler_creation']="Veuillez compl�ter le formulaire ci-dessous avec les donn�es du nouveau robot."; 
$language['crawler_name2']="Nom du robot:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="Utilisateur du robot:";
$language['crawler_url']="Adresse de l'utilisateur (sous la forme http://www.example.com)";
$language['crawler_url2']="Adresse de l'utilisateur:";
$language['crawler_no_ok']="Il manque des informations, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['exist']="Ce robot existe d�j� dans la base de donn�e";
$language['exist_data']="Voici les informations le concernant dans la base:";
$language['crawler_no_ok2']="Un probl�me est survenu lors de la cr�ation du robot, essayer de nouveau la proc�dure.";
$language['crawler_ok']="Le robot a �t� ajout� � la base de donn�e.";

$language['user_suppress']="Supprimer un compte utilisateur ou utilisateur-site.";
$language['user_list']="Liste des logins utilisateurs et utilisateur-sites";
$language['suppress_user']="Supprimer ce compte";
$language['user_suppress_validation']="Etes vous s�r de vouloir supprimer ce compte?";
$language['yes']="Oui";
$language['no']="Non";
$language['user_suppress_ok']="Le compte a �t� supprim� avec succ�s.";
$language['user_suppress_no_ok']="Un probl�me est survenu lors de la suppression du compte, essayer de nouveau la proc�dure.";

$language['site_suppress']="Supprimer un site.";
$language['site_list']="Liste des sites";
$language['suppress_site']="Supprimer ce site";
$language['site_suppress_validation']="Etes vous s�r de vouloir supprimer ce site?";
$language['site_suppress_ok']="Le site a �t� supprim� avec succ�s.";
$language['site_suppress_no_ok']="Un probl�me est survenu lors de la suppression du site, essayer de nouveau la proc�dure.";

$language['crawler_suppress']="Supprimer un robot.";
$language['crawler_list']="Liste des robots";
$language['suppress_crawler']="Supprimer ce robot";
$language['crawler_suppress_validation']="Etes vous s�r de vouloir supprimer ce robot?";
$language['crawler_suppress_ok']="Le robot a �t� supprim� avec succ�s.";
$language['crawler_suppress_no_ok']="Un probl�me est survenu lors de la suppression du robot, essayer de nouveau la proc�dure.";

$language['crawler_test_creation']="Cr�er un robot de test.";
$language['crawler_test_suppress']="Supprimer le robot de test.";
$language['crawler_test_text']="Une fois le robot de test cr��, allez visiter votre site avec l'ordinateur et le navigateur utilis�s pour cr�er le robot."; 
$language['crawler_test_text2']="Si tout va bien, votre visite apparaitra dans CrawlTrack comme �tant celle du robot Test-Crawltrack. N'oubliez pas ensuite de supprimer ce robot de test.";
$language['crawler_test_no_exist']="Le robot de test n'existe pas dans la base de donn�es.";

$language['exist_site']="Ce site existe d�j� dans la base de donn�e";
$language['exist_login']="Ce login existe d�j� dans la base de donn�e";

//1.2.0
$language['update_title']="Mise � jour de la liste de robots.";
$language['update_crawler']="Mettre � jour la liste de robots.";
$language['list_up_to_date']="Il n'y a pas de mise � jour disponible actuellement.";
$language['update_ok']="La mise � jour s'est bien pass�e.";
$language['crawler_add']="robots ont �t� ajout�s � la base de donn�es";
$language['no_access']="La mise � jour en ligne ne fonctionne pas.<br><br>Pour mettre � jour veuillez cliquer sur le lien ci-dessous pour t�l�charger la derni�re liste de robot, placez le fichier crawlerlist.php dans le r�pertoire include de CrawlTrack et relancez la proc�dure de mise � jour.";
$language['no_access2']="La liaison avec CrawlTrack.info a �chou�, veuillez r�essayer ult�rieurement.";
$language['download_update']="Si vous avez d�j� t�l�charg� et upload� sur votre site la liste de robot, cliquez sur le bouton ci-dessous pour faire la mise � jour.";
$language['download']="T�l�charger la liste de robot";
$language['your_list']="La liste que vous utilisez est:";
$language['crawltrack_list']="La liste disponible sur Crawltrack.info est:";
$language['no_update']="Ne pas mettre � jour la liste.";
$language['no_crawler_list']="Le fichier crawlerlist.php n'est pas pr�sent dans votre r�pertoire include";


//1.3.0
$language['use_user_agent']="La d�tection peux se faire par le user agent ou par l'IP. Vous devez donc mettre l'une ou l'autre des informations.";
$language['user_agent_or_ip']="User agent ou IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Modification de la table crawlt_crawler OK.";
$language['files_mod_ok']="Modification des fichiers configconnect.php et crawltrack.php OK.";
$language['update_crawltrack_ok']="La mise � jour de CrawlTrack est termin�e, vous utilisez maintenant la version :";
$language['table_mod_no_ok']="La modification  de la table crawlt_crawler n'a pas pu se faire.";
$language['files_mod_no_ok']="Il y a eu un probl�me lors de la mise � jour des fichiers configconnect.php et crawltrack.php.";
$language['update_crawltrack_no_ok']="La mise � jour de CrawlTrack n'a pas pu se faire.";
$language['logo']="Choix du logo.";
$language['logo_choice']="Vous pouvez ici choisir le logo qui apparaitra sur vos page � l'emplacement du tag de CrawlTrack. Si vous ne souhaitez pas voir apparaitre de logo, s�lectionnez l'option \"Pas de logo\".";
$language['no_logo']="Pas de logo.";
$language['data_suppress_ok']="Les donn�es ont �t� supprim�es avec succ�s.";
$language['data_suppress_no_ok']="Un probl�me est survenu lors de la suppression des donn�es, essayer de nouveau la proc�dure.";
$language['data_suppress_validation']="Etes vous s�r de vouloir supprimer toutes les &nbsp;";
$language['data_suppress']="Suppression des donn�es les plus anciennes dans la table des visites.";
$language['data_suppress2']="Supprimer les";
$language['one_year_data']="donn�es vieilles de plus d'un an";
$language['six_months_data']="donn�es vieilles de plus de six mois";
$language['one_month_data']="donn�es vieilles de plus d'un mois";
$language['oldest_data']="La donn�e la plus ancienne date du &nbsp;";
$language['no_data']="Il n'y a pas de donn�e dans la table des visites.";

?>