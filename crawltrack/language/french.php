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
$language['welcome_install'] ="Bienvenue sur CrawlTrack, l'installation va se faire simplement en 3 étapes.";
$language['menu_install_1']="1) Saisie des données de connection.";
$language['menu_install_2']="2) Paramétrage des sites à auditer.";
$language['menu_install_3']="3) Paramétrage des droits des utilisateur.";

$language['go_install']="Installer";

$language['step1_install'] ="Veuillez saisir dans le formulaire ci-dessous les informations concernant les identifiants de connection à la base de données. Une fois le formulaire validé, les tables et  le fichier de connection vont être automatiquement créés.";
$language['step1_install_login_mysql']="Identifiant MySQL";
$language['step1_install_password_mysql']="Mot de passe MySQL";
$language['step1_install_host_mysql']="Serveur MySQL";
$language['step1_install_database_mysql']="Base MySQL";
$language['step1_install_table_mysql']="Préfixe des tables";
$language['step1_install_ok'] ="Fichier de connection OK.";
$language['step1_install_ok2'] ="Création des tables OK.";
$language['step1_install_no_ok'] ="Il manque des informations pour créer les tables et le fichier de connection, veuillez vérifier les infos saisies dans le formulaire et revalider après correction.";
$language['step1_install_no_ok2'] ="Le fichier n'a pas pu être créé, vérifier que le répertoire est en CHMOD 777.";
$language['step1_install_no_ok3'] ="Un problème est survenu lors de la création des tables, essayer de nouveau la procédure.";
$language['back_to_form'] ="Retour au formulaire de saisie";
$language['retry'] ="Essayer de nouveau";
$language['step2_install_no_ok']="La connection à la base n'a pas pu s'effectuer, veuillez vérifier les données saisies.";
$language['step3_install_no_ok']="La sélection de la base n'a pas pu s'effectuer, veuillez vérifier les données saisies.";
$language['step4_install']="Suite";

//site creation

$language['set_up_site']="Veuillez noter ci-dessous le nom du site à auditer, il s'agit du nom qui sera utilisé pour identifier le site lors de l'utilisation de CrawlTrack. Il n'est pas nécessaire de saisir l'url du site, mais juste son nom (par exemple: Example à la place de: http://www.example.com).";
$language['site_name']="Nom du site:";
$language['site_no_ok']="Vous devez entrer un nom de site.";
$language['site_ok']="Le site a été ajouté à la base de donnée.";
$language['new_site']="Ajouter un autre site";


//tag creation
$language['tag']="Tag à insérer dans vos pages";
$language['create_tag']="Vous trouverez ci-dessous le tag correspondant à chacun des sites configurés. Il s'agit d'un tag en php qu'il vous faut insérer dans vos pages qui doivent donc être en .php. Si vos pages ne sont pas en .php, vous pouvez simplement changer l'extension en .php et mettre  &#60;?php  avant le tag et ?&#62; après."; 
$language['site_name2']="Nom du site";
$language['local_tag']="Tag a utiliser si l'hébergeur du site à audité a désactivé les fonctions fsockopen et fputs, CrawlTrack doit dans ce cas être installé sur le même serveur que le site à auditer.";
$language['non_local_tag']="Tag standard";

//login set_up
$language['admin_creation']="Création du compte administrateur";
$language['admin_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilisés par l'administrateur.";
$language['user_creation']="Création du compte utilisateur";
$language['user_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilisés par l'utilisateur.";
$language['user_site_creation']="Création du compte utilisateur-site";
$language['user_site_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilisés par l'utilisateur-site.";
$language['admin_rights']="L'administrateur a accès à la zone de configuration ainsi qu'aux stats de tous les sites audités.";
$language['login']="Identifiant";
$language['password']="Mot de passe";
$language['valid_password']="Saisissez une deuxième fois votre mot de passe.";
$language['login_no_ok']="Il manque des informations ou les mots de passe saisies sont différents, veuillez vérifier les infos saisies dans le formulaire et revalider après correction.";
$language['login_ok']="Le compte a été créé.";
$language['login_no_ok2']="Un problème est survenu lors de la création du compte, essayer de nouveau la procédure.";
$language['login_user']="Créer un compte utilisateur";
$language['login_user_what']="Un utilisateur a accès à l'ensemble des stats des sites";
$language['login_user_site']="Créer un compte utilisateur-site";
$language['login_user_site_what']="Un utilisateur-site a accès aux stats d'un seul site";
$language['login_finish']="J'ai créé l'ensembles des comptes voulus, l'installation est donc terminée.";


//access

$language['restrited_access']="L'accès aux statistiques est protégé.";
$language['enter_login']="Veuillez saisir ci-dessous votre identifiant et votre mot de passe.";

//display


$language['crawler_name']="Robots";
$language['nbr_visits']="Visites";
$language['nbr_pages']="Pages vues";
$language['date_visits']="Dernière visite";
$language['display_period']="Période étudiée :";
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
$language['visit_per-crawler']="Détail des visites";
$language['100_visit_per-crawler']="Détail des visites (affichage limité à 100 lignes).";
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
$language['result_crawler']="Voici les robots qui correspondent à votre recherche.";
$language['result_ua']="Voici les user-agents qui correspondent à votre recherche.";
$language['result_page']="Voici les pages qui correspondent à votre recherche.";
$language['result_user']="Voici les utilisateurs qui correspondent à votre recherche.";
$language['result_user_crawler']="Voici les robots de cet utilisateur.";
$language['result_user_1']="Utilisateur:&nbsp;";
$language['result_crawler_1']="Mot recherché:&nbsp;";
$language['no_answer']="Il n'y a pas de réponse correspondant à votre recherche.";
$language['to_many_answer']="Il y a plus de 100 réponses (affichage limité à 100 lignes).";


//admin

$language['user_create']="Créer un nouveau compte utilisateur.";
$language['user_site_create']="Créer un nouveau compte utilisateur-site.";
$language['new_site']="Ajouter un site à auditer.";
$language['see_tag']="Voir les tags à insérer.";
$language['new_crawler']="Ajouter un nouveau robot.";
$language['crawler_creation']="Veuillez complêter le formulaire ci-dessous avec les données du nouveau robot."; 
$language['crawler_name2']="Nom du robot:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="Utilisateur du robot:";
$language['crawler_url']="Adresse de l'utilisateur (sous la forme http://www.example.com)";
$language['crawler_url2']="Adresse de l'utilisateur:";
$language['crawler_no_ok']="Il manque des informations, veuillez vérifier les infos saisies dans le formulaire et revalider après correction.";
$language['exist']="Ce robot existe déjà dans la base de donnée";
$language['exist_data']="Voici les informations le concernant dans la base:";
$language['crawler_no_ok2']="Un problème est survenu lors de la création du robot, essayer de nouveau la procédure.";
$language['crawler_ok']="Le robot a été ajouté à la base de donnée.";

$language['user_suppress']="Supprimer un compte utilisateur ou utilisateur-site.";
$language['user_list']="Liste des logins utilisateurs et utilisateur-sites";
$language['suppress_user']="Supprimer ce compte";
$language['user_suppress_validation']="Etes vous sûr de vouloir supprimer ce compte?";
$language['yes']="Oui";
$language['no']="Non";
$language['user_suppress_ok']="Le compte a été supprimé avec succès.";
$language['user_suppress_no_ok']="Un problème est survenu lors de la suppression du compte, essayer de nouveau la procédure.";

$language['site_suppress']="Supprimer un site.";
$language['site_list']="Liste des sites";
$language['suppress_site']="Supprimer ce site";
$language['site_suppress_validation']="Etes vous sûr de vouloir supprimer ce site?";
$language['site_suppress_ok']="Le site a été supprimé avec succès.";
$language['site_suppress_no_ok']="Un problème est survenu lors de la suppression du site, essayer de nouveau la procédure.";

$language['crawler_suppress']="Supprimer un robot.";
$language['crawler_list']="Liste des robots";
$language['suppress_crawler']="Supprimer ce robot";
$language['crawler_suppress_validation']="Etes vous sûr de vouloir supprimer ce robot?";
$language['crawler_suppress_ok']="Le robot a été supprimé avec succès.";
$language['crawler_suppress_no_ok']="Un problème est survenu lors de la suppression du robot, essayer de nouveau la procédure.";

$language['crawler_test_creation']="Créer un robot de test.";
$language['crawler_test_suppress']="Supprimer le robot de test.";
$language['crawler_test_text']="Une fois le robot de test créé, allez visiter votre site avec l'ordinateur et le navigateur utilisés pour créer le robot."; 
$language['crawler_test_text2']="Si tout va bien, votre visite apparaitra dans CrawlTrack comme étant celle du robot Test-Crawltrack. N'oubliez pas ensuite de supprimer ce robot de test.";
$language['crawler_test_no_exist']="Le robot de test n'existe pas dans la base de données.";

$language['exist_site']="Ce site existe déjà dans la base de donnée";
$language['exist_login']="Ce login existe déjà dans la base de donnée";

//1.2.0
$language['update_title']="Mise à jour de la liste de robots.";
$language['update_crawler']="Mettre à jour la liste de robots.";
$language['list_up_to_date']="Il n'y a pas de mise à jour disponible actuellement.";
$language['update_ok']="La mise à jour s'est bien passée.";
$language['crawler_add']="robots ont été ajoutés à la base de données";
$language['no_access']="La mise à jour en ligne ne fonctionne pas.<br><br>Pour mettre à jour veuillez cliquer sur le lien ci-dessous pour télécharger la dernière liste de robot, placez le fichier crawlerlist.php dans le répertoire include de CrawlTrack et relancez la procédure de mise à jour.";
$language['no_access2']="La liaison avec CrawlTrack.info a échoué, veuillez réessayer ultérieurement.";
$language['download_update']="Si vous avez déjà téléchargé et uploadé sur votre site la liste de robot, cliquez sur le bouton ci-dessous pour faire la mise à jour.";
$language['download']="Télécharger la liste de robot";
$language['your_list']="La liste que vous utilisez est:";
$language['crawltrack_list']="La liste disponible sur Crawltrack.info est:";
$language['no_update']="Ne pas mettre à jour la liste.";
$language['no_crawler_list']="Le fichier crawlerlist.php n'est pas présent dans votre répertoire include";


//1.3.0
$language['use_user_agent']="La détection peux se faire par le user agent ou par l'IP. Vous devez donc mettre l'une ou l'autre des informations.";
$language['user_agent_or_ip']="User agent ou IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Modification de la table crawlt_crawler OK.";
$language['files_mod_ok']="Modification des fichiers configconnect.php et crawltrack.php OK.";
$language['update_crawltrack_ok']="La mise à jour de CrawlTrack est terminée, vous utilisez maintenant la version :";
$language['table_mod_no_ok']="La modification  de la table crawlt_crawler n'a pas pu se faire.";
$language['files_mod_no_ok']="Il y a eu un problème lors de la mise à jour des fichiers configconnect.php et crawltrack.php.";
$language['update_crawltrack_no_ok']="La mise à jour de CrawlTrack n'a pas pu se faire.";
$language['logo']="Choix du logo.";
$language['logo_choice']="Vous pouvez ici choisir le logo qui apparaitra sur vos page à l'emplacement du tag de CrawlTrack. Si vous ne souhaitez pas voir apparaitre de logo, sélectionnez l'option \"Pas de logo\".";
$language['no_logo']="Pas de logo.";
$language['data_suppress_ok']="Les données ont été supprimées avec succès.";
$language['data_suppress_no_ok']="Un problème est survenu lors de la suppression des données, essayer de nouveau la procédure.";
$language['data_suppress_validation']="Etes vous sûr de vouloir supprimer toutes les &nbsp;";
$language['data_suppress']="Suppression des données les plus anciennes dans la table des visites.";
$language['data_suppress2']="Supprimer les";
$language['one_year_data']="données vieilles de plus d'un an";
$language['six_months_data']="données vieilles de plus de six mois";
$language['one_month_data']="données vieilles de plus d'un mois";
$language['oldest_data']="La donnée la plus ancienne date du &nbsp;";
$language['no_data']="Il n'y a pas de donnée dans la table des visites.";

?>