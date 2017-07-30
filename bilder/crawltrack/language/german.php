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
// Translation: Dirk Hombrecher (http://veillesud.veillefrance.com)
//----------------------------------------------------------------------
// file: german.php
//----------------------------------------------------------------------


//installation
$language['install']="Installation";
$language['welcome_install'] ="Willkomen in CrawlTrack, die Installation ist einfach, nur 3 Schrtitte.";
$language['menu_install_1']="1) Definition der Verbindungsparameter zu der Datenbank.";
$language['menu_install_2']="2) Definition der websites.";
$language['menu_install_3']="3) Benutzerrechte.";
$language['go_install']="Installation";
$language['step1_install'] ="Geben sie bitte die Parameter der Datenbank ein. Wenn alle Eingaben in Ordnung sind, werden die Datanbanks�tze und die lokalen Parameterdateien erstellt.";
$language['step1_install_login_mysql']="login in MySQL";
$language['step1_install_password_mysql']="Passwort MySQL";
$language['step1_install_host_mysql']="Host MySQL";
$language['step1_install_database_mysql']="Datenbank MySQL";
$language['step1_install_ok'] ="Parameterdateien in Ordnung.";
$language['step1_install_ok2'] ="Datens�tze in Ordnung.";
$language['step1_install_no_ok'] ="Es fehlen Information, �berpr�fen sie bitte Ihre Angaben.";
$language['step1_install_no_ok2'] ="Parameterdateien nicht erstellt, �berpr�fen Sie CHMOD 777.";
$language['step1_install_no_ok3'] ="Problem w�hrend des Aufbaus der Datens�tez, versuchen sie es noch einmal.";
$language['back_to_form'] ="Zur�ck zur Eingabe";
$language['retry'] ="Neuversuch";
$language['step2_install_no_ok']="Verbindung zu der Datenbank unm�glich, �berpr�fen Sie Ihre Eingaben.";
$language['step3_install_no_ok']="Auswahl der Datenbank unm�glich, �berpr�fen Sie Ihre Eingaben.";
$language['step4_install']="Los";

//site creation

$language['set_up_site']="Geben Sie bitte den Namen Ihres Websites ein, er wird im CrawlTrack benutzt. Es ist nicht notwendig die ganze URL einzugeben, nur den Namen (z. Bsp.: example anstatt: http://www.example.com).";
$language['site_name']="Name Ihres Websites:";
$language['site_no_ok']="Geben Sie einen website Namen an.";
$language['site_ok']="Der website wurde der Datenbank zugef�gt.";
$language['new_site']="Website hinzuf�gen";


//tag creation
$language['tag']="Der tag f�r Ihre webseiten";
$language['create_tag']="Hier finden Sie den tag f�r jede Ihrer webseiten. Dies ist ein php tag, der in phpseiten geh�rt. Falls Ihre Seiten nicht in php geschreiben sind, �ndern sie einfach den filetype in .php und setzen Sie <?php  vor den tag und ?> dahinter."; 
$language['site_name2']="Name des Websites";
$language['local_tag']="Der tag, wenn der Hoster weder fsockopen oder fputs Funktionen erlaubt. In diesem Fall muss die Webseite auf dem gleichen host liegen wie CrawlTrack.";
$language['non_local_tag']="Standard tag.";

//login set_up
$language['admin_creation']="Anlage des Administratorkontos";
$language['admin_setup']="Eingabe des login administrator und Passwort.";
$language['user_creation']="Eingabe eines Benutzerkontos";
$language['user_setup']="Eingabe des Benutzer login und Passwort.";
$language['user_site_creation']="Einagbe des Benutzer-website Kontos";
$language['user_site_setup']="Eingabe des Benutzer-website login und Passwort.";
$language['admin_rights']="Administratoren haben Zugang zu allen Statistiken und Set-up";
$language['login']="Login";
$language['password']="Passwort";
$language['valid_password']="Wiederholung des Passworts.";
$language['login_no_ok']="Fehlende Daten oder verschiedene Passw�rter, �berpr�fung des Formulars.";
$language['login_ok']="Account in Ordnung.";
$language['login_no_ok2']="Es ist ein Problem beim Aufbau des Kontos aufgetaucht, versuchen Sie es nocheinmal.";
$language['login_user']="Anlage eines Beutzerkontos";
$language['login_user_what']="Benutzer haben Zugang zu allen Statistiken";
$language['login_user_site']="Anlage eines Benutzer-website Kontos";
$language['login_user_site_what']="Benutzer-website haben Zugang zu den Statistiken eines Websites";
$language['login_finish']="Alle ben�tigten Konten sind angelegt, Die Installation ist beendet.";


//access

$language['restrited_access']="Gesch�tzter Zugang";
$language['enter_login']="Bitte geben Sie Ihr login und Passwort ein.";


//display


$language['crawler_name']="Crawlers";
$language['nbr_visits']="Besuche";
$language['nbr_pages']="Gesehene Seiten";
$language['date_visits']="Letzter Besuch";
$language['display_period']="Analysierte Periode:";
$language['today']="Heute";
$language['days']="Seit 8 Tagen";
$language['month']="Seit einem Monat";
$language['one_year']="Seit einem Jahr";
$language['no_visit']="Kein Besuch.";
$language['page']="Seiten";
$language['admin']="Anlage";
$language['nbr_tot_visits']="Alle Besuche";
$language['nbr_tot_pages']="Alle besuchten Seiten";
$language['nbr_tot_crawlers']="Anzahl der Crawlers";
$language['visit_per-crawler']="Besucherdetails";
$language['100_visit_per-crawler']="Besucherdetails (der Display ist auf 100 Zeilen beschr�nkt).";
$language['user_agent']="Benutzeragent";
$language['Origin']="Benutzer";
$language['help']="Hilfe";

//search

$language['search']="Suche";
$language['search2']="Suche";
$language['search_crawler']="eines Crawler";
$language['search_user_agent']="eines Benutzeragenten";
$language['search_page']="einer Seite";
$language['search_user']="eines Crawlerbenutzers";
$language['go_search']="Suche";
$language['result_crawler']="Hier die gesuchten Crawler.";
$language['result_ua']="Hier die gesuchten Benutzeragenten.";
$language['result_page']="Hier die gesuchten Seiten.";
$language['result_user']="Hier die gesuchten Crawlerbenutzer.";
$language['result_user_crawler']="Hier die Crawler f�r diesen Benutzer.";
$language['result_user_1']="Benutzer:&nbsp;";
$language['result_crawler_1']="Keywordsuche:&nbsp;";
$language['no_answer']="Keine Antwort.";
$language['to_many_answer']="Es gibt mehr als 100 Antworten (der Display ist auf 100 Zeilen beschr�nkt).";


//admin

$language['user_create']="Anlage eines neuen Benutzerkontos.";
$language['user_site_create']="Anlage eines neuen Benutzer-website Kontos.";
$language['new_site']="Zuf�gung eines website.";
$language['see_tag']="Anzeigen der tags, die den Seiten hinzugef�gt werden m�ssen.";
$language['new_crawler']="Zuf�gung eines neuen Crawlers";
$language['crawler_creation']="Bitte vervollst�ndigen Sie das folgende Formular mit den neuen crawler Daten."; 
$language['crawler_name2']="Name des Crawlers:";
$language['crawler_user_agent']="Benutzeragent:";
$language['crawler_user']="Crawlerbenutzer:";
$language['crawler_url']="Benutzer url (z. Bspl.: http://www.example.com)";
$language['crawler_url2']="Benutzer url:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Fehlende Daten, bitte �berpr�fen Sie Ihre Eingabe.";
$language['exist']="Der Crawler ist bereits in der Datenbank";
$language['exist_data']="Hier die Daten bez�glich der Datenbank:";
$language['crawler_no_ok2']="Ein Problem ist bei Anlage des Crawlers aufgetreten, neuer Versuch.";
$language['crawler_ok']="Der Crawler wurde der Datenbank hinzugef�gt.";

$language['user_suppress']="L�schung eines Benutzers oder oder Benutzer-websitekontos.";
$language['user_list']="Liste der Benutzer und Benutzer-websites logins";
$language['suppress_user']="L�schung dieses Kontos";
$language['user_suppress_validation']="Sind Sie sicher diese Konto zu l�schen?";
$language['yes']="Ja";
$language['no']="Nein";
$language['user_suppress_ok']="Das Konto wurde erfolgreich gel�scht.";
$language['user_suppress_no_ok']="Ein Problem ist bei der L�schung des Kontos aufgetaucht, neuer Versuch.";

$language['site_suppress']="L�schung eines Website.";
$language['site_list']="Liste der Websites";
$language['suppress_site']="L�schung dieses Website";
$language['site_suppress_validation']="Sind Sie sicher, dieses Website zu l�schen?";
$language['site_suppress_ok']="Die website wurde erfolgreich gel�scht.";
$language['site_suppress_no_ok']="Ein Problem ist bei der L�schung des Websites aufgetaucht, neuer Versuch.";

$language['crawler_suppress']="L�schung eines Crawlers.";
$language['crawler_list']="Liste der Crawler";
$language['suppress_crawler']="L�schung dieses Crawlers";
$language['crawler_suppress_validation']="Sind SIe sicher, diesen Crawler zu l�schen?";
$language['crawler_suppress_ok']="Der crawler wurde erfolgreich gel�scht.";
$language['crawler_suppress_no_ok']="Ein Problem ist bei der L�schung des Crawlers aufgetaucht, neuer Versuch.";

$language['crawler_test_creation']="Anlage eines Testcrawlers.";
$language['crawler_test_suppress']="L�schung des Testcrawlers.";
$language['crawler_test_text']="Wenn der Testcrawler angelegt ist, besuchen Sie Ihre Seiten mit dem Computer und dem Browser mit dem Sie den Testcrawler angelegt haben."; 
$language['crawler_test_text2']="Wenn alles in Ordnung ist, werden Ihre Besuche im CrawlTrack als Test-Crawltrackbesuche angezeigt. Vergessen Sie nicht den testcrawler zu l�schen.";
$language['crawler_test_no_exist']="Der Testcrawler existiert nicht in der Datenbank.";

$language['exist_site']="Dieser site ist schon in der Datenbank";
$language['exist_login']="Dieser login ist schon in der Datenbank";

//1.2.0
$language['update_title']="Crawlerliste update.";
$language['update_crawler']="Update der Crawlerliste.";
$language['list_up_to_date']="Keine neuen updates f�r die Crawlerliste vorhanden.";
$language['update_ok']="Update in Arbeit.";
$language['crawler_add']="crawlers wurden der Datenbank zugef�gt.";
$language['no_access']="Online update ist nicht verf�gbar.<br><br>Um zu updaten, click des links unten, um die neueste Crawlerliste herunter zu laden, copieren Sie dieses Datei crawlerlist.php in das CrawlTrack include Verzeichnis und danach Neustart der Upodateprozedur.";
$language['no_access2']="Zugriff auf www.CrawlTrack.info unm�glich, versuchen Sie es sp�ter noch einmal.";
$language['download_update']="Wenn auf Ihrem Site eine neue Crawlerliste existiert, click unten, um die Daten in die Datenbank zu schicken.";
$language['download']="Herunterladen der Crawlerliste.";
$language['your_list']="Die benutzte List ist:";
$language['crawltrack_list']="Die auf www.Crawltrack.info zu erhaltene Liste ist:";
$language['no_update']="Machen Sie bitte keinen Update der Crawlerliste.";
$language['no_crawler_list']="Die crawlerlist.php Datei existiert nicht auf dem include Verzeichnis.";


//1.3.0
$language['use_user_agent']="Die Feststellung k�nnen durch es zu Benutzeragent oder durch IP erfolgen. Sie m�ssen also die ein oder andere der Informationen stellen";
$language['user_agent_or_ip']="Benutzeragent oder IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="�nderung der Datenbank OK.";
$language['files_mod_ok']="�nderung die programm configconnect.php und crawltrack.php OK.";
$language['update_crawltrack_ok']="Die Aktualisierung CrawlTrack wird beendet, Sie benutzen jetzt Version :";
$language['table_mod_no_ok']="Die �nderung der Datenbank konnte nicht erfolgen.";
$language['files_mod_no_ok']="Es hat ein Problem bei der Aktualisierung die programm configconnect.php und crawltrack.php gegeben.";
$language['update_crawltrack_no_ok']="Die Aktualisierung CrawlTrack konnte nicht erfolgen.";
$language['logo']="Wahl des Logos.";
$language['logo_choice']="Sie k�nnen hier das Logo w�hlen, das auf Ihrer Seite am Ort des tag von CrawlTrack sein wird. Wenn Sie w�nschen, kein Logo zu haben, die Option: \"Nicht ein Logo\" ausw�hlen.";
$language['no_logo']="Nicht ein Logo.";
$language['data_suppress_ok']="Die Daten sind erfolgreich abgeschafft worden.";
$language['data_suppress_no_ok']="Ein Problem ist bei der Abschaffung der Daten vorgekommen, neuer Versuch.";
$language['data_suppress_validation']="Sie sind sicher, alle  &nbsp;";
$language['data_suppress']="Abschaffung der �ltesten Daten in der Datenbank.";
$language['data_suppress2']="&nbsp;";
$language['one_year_data']="alte Angaben von mehr als einem Jahr abschaffen zu wollen?";
$language['six_months_data']="alte Angaben von mehr als sechs Monaten abschaffen zu wollen?";
$language['one_month_data']="alte Angaben von mehr als einem Monat abschaffen zu wollen?";
$language['oldest_data']="Die Angabe das �lteste Datum vom &nbsp;";
$language['no_data']="Es gibt keine Angabe in der Datenbank.";

?>