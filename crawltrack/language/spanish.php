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
// Translation: Sergio de la Torre (www.sergiodelatorre.com)
//----------------------------------------------------------------------
// file: spanish.php
//----------------------------------------------------------------------


//installation
$language['install']="Instalaci�n";
$language['welcome_install'] ="Bienvenido a CrawlTrack, instalaci�n en tres pasos, muy f�cil .";
$language['menu_install_1']="1) Introduzca los datos de conexi�n a la base de datos";
$language['menu_install_2']="2) Configure los sitios web";
$language['menu_install_3']="3) Configure los permisos";
$language['go_install']="Instalar";
$language['step1_install'] ="Por favor, rellene el formulario sobre la conexi�n a la base de datos. Una vez validado, se crear�n las tablas y archivos de conexi�n.";
$language['step1_install_login_mysql']="Usuario MySQL";
$language['step1_install_password_mysql']="Contrase�a MySQL";
$language['step1_install_host_mysql']="Servidor MySQL";
$language['step1_install_database_mysql']="Base de datos MySQL";
$language['step1_install_ok'] ="Archivos de conexi�n: OK.";
$language['step1_install_ok2'] ="Creaci�n de tablas: OK.";
$language['step1_install_no_ok'] ="Falta informaci�n para crear las tablas y los ficheros, por favor revise el formulario.";
$language['step1_install_no_ok2'] ="Los ficheros de configuraci�n no han sido creados, compruebe si los permisos del directorio son CHMOD 777.";
$language['step1_install_no_ok3'] ="Ha surgido un problema cuando se creaban las tablas, int�ntelo de nuevo.";
$language['back_to_form'] ="Volver al formulario";
$language['retry'] ="Int�ntelo de nuevo";
$language['step2_install_no_ok']="No es posible conectar con la base de datos, por favor, compruebe los datos de conexi�n.";
$language['step3_install_no_ok']="No es posible la selecci�n de tablas en la base de datos, por favor, compruebe los datos de conexi�n.";
$language['step4_install']="Continuar";

//site creation

$language['set_up_site']="Introduzca un nombre para el sitio web, ser� el nombre para los seguimientos de CrawlTrack. No es necesario poner la URL, s�lo un nombre (Por ejemplo: Pepito en lugar de: http://www.pepito.com).";
$language['site_name']="Nombre del sitio web:";
$language['site_no_ok']="Introduce un nombre para el sitio web";
$language['site_ok']="El sitio ha sido a�adido a la base de datos";
$language['new_site']="A�adir un nuevo sitio web";


//tag creation
$language['tag']="C�digo a insertar en tus p�ginas";
$language['create_tag']="A continuaci�n se muestra el c�digo para cada sitio. Este c�digo es para insertar en p�ginas .php. Si tus p�ginas no son .php, simplemente cambia la extensi�n a .php y a�ade  &#60;?php antes del c�digo ?&#62; despu�s."; 
$language['site_name2']="Nombre del sitio web";
$language['local_tag']="C�digo alternativo (si el servidor no permite las funciones fsockopen y fputs). En este caso el sitio web debe estar en el mismo servidor que CrawlTrack.";
$language['non_local_tag']="C�digo est�ndar";

//login set_up
$language['admin_creation']="Configuraci�n de la cuenta de administrador";
$language['admin_setup']="Por favor, introduzca el nombre del administrador y contrase�a.";
$language['user_creation']="Configuraci�n de cuenta de usuario";
$language['user_setup']="Por favor, introduzca el nombre de usuario y contrase�a.";
$language['user_site_creation']="Configuraci�n de la cuenta de usuario-web";
$language['user_site_setup']="Por favor, introduzca el nombre de usuario-web y contrase�a.";
$language['admin_rights']="El administrador tiene acceso a todas las estad�sticas y configuraciones";
$language['login']="Usuario";
$language['password']="Contrase�a";
$language['valid_password']="Repita la contrase�a.";
$language['login_no_ok']="Faltan datos o las contrase�as son diferentes, por favor revise el formulario y corrija los datos.";
$language['login_ok']="Cuenta configurada.";
$language['login_no_ok2']="Ha habido un problema durante la configuraci�n de la cuenta, int�ntelo de nuevo.";
$language['login_user']="Crear cuenta de usuario";
$language['login_user_what']="El usuario tiene acceso a las estad�sticas de todos los sitios web";
$language['login_user_site']="Crear cuenta de usuario-web";
$language['login_user_site_what']="El usuario-web tiene acceso a s�lo a un sitio web";
$language['login_finish']="Todas las cuentas necesarias han sido creadas, la instalaci�n ha concluido.";


//access

$language['restrited_access']="Acceso restringido.";
$language['enter_login']="Por favor, introduzca su nombre de usuario y contrase�a.";


//display


$language['crawler_name']="Crawlers";
$language['nbr_visits']="Visitas";
$language['nbr_pages']="P�ginas vistas";
$language['date_visits']="�ltima visita";
$language['display_period']="Periodo:";
$language['today']="Hoy";
$language['days']="�ltimos 8 dias";
$language['month']="�ltimo mes";
$language['one_year']="�ltimo a�o";
$language['no_visit']="No hay visitas.";
$language['page']="P�ginas";
$language['admin']="Configuraci�n";
$language['nbr_tot_visits']="N�mero de visitas";
$language['nbr_tot_pages']="N�mero de p�ginas vistas";
$language['nbr_tot_crawlers']="N�mero de crawlers";
$language['visit_per-crawler']="Detalles";
$language['100_visit_per-crawler']="Detalles (s�lo se muestran 100 l�neas).";
$language['user_agent']="User agent";
$language['Origin']="User";
$language['help']="Ayuda";

//search

$language['search']="Buscar";
$language['search2']="Buscar";
$language['search_crawler']="por crawler";
$language['search_user_agent']="por user-agent";
$language['search_page']="por p�gina";
$language['search_user']="por crawler user";
$language['go_search']="Buscar";
$language['result_crawler']="Resultados de crawlers.";
$language['result_ua']="Resultados de user-agents.";
$language['result_page']="Resultados de p�ginas.";
$language['result_user']="Resultados de crawler users.";
$language['result_user_crawler']="Crawlers para este user.";
$language['result_user_1']="User:&nbsp;";
$language['result_crawler_1']="B�squeda:&nbsp;";
$language['no_answer']="No hay resultados para esta b�squeda.";
$language['to_many_answer']="Hay m�s de 100 resultados (s�lo se muestran 100 l�neas).";


//admin

$language['user_create']="Crear nueva cuenta de usuario.";
$language['user_site_create']="Crear nueva cuenta de usuario-web.";
$language['new_site']="A�adir sitio web.";
$language['see_tag']="Mostrar c�digo a insertar.";
$language['new_crawler']="A�adir un nuevo crawler";
$language['crawler_creation']="Por favor complete el formulario para el nuevo crawler."; 
$language['crawler_name2']="Nombre del crawler:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="User del crawler:";
$language['crawler_url']="URL del user (ej: http://www.ejemplo.com)";
$language['crawler_url2']="URL del user:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Faltan datos, por favor revise el formulario.";
$language['exist']="Este crawler ya est� en la base de datos";
$language['exist_data']="Esta es la informaci�n del crawler en la base de datos:";
$language['crawler_no_ok2']="Ha surgido un problema cuando se a�ad�a el crawler, int�ntelo de nuevo.";
$language['crawler_ok']="El crawler ha sido a�adido a la base de datos.";

$language['user_suppress']="Eliminar cuenta de usuario/usuario-web.";
$language['user_list']="Lista de usuaris y usuarios web";
$language['suppress_user']="Eliminar esta cuenta";
$language['user_suppress_validation']="�Est� seguro de eliminar esta cuenta?";
$language['yes']="Si";
$language['no']="No";
$language['user_suppress_ok']="La cuenta fue eliminada con �xito.";
$language['user_suppress_no_ok']="Ha ocurrido un problema al eliminar la cuenta, int�ntelo de nuevo.";

$language['site_suppress']="Eliminar un sitio web.";
$language['site_list']="Lista de sitios web";
$language['suppress_site']="Eliminar este sitio web";
$language['site_suppress_validation']="�Est� seguro de eliminar este sitio web?";
$language['site_suppress_ok']="El sitio web fue eliminado con �xito.";
$language['site_suppress_no_ok']="Ha ocurrido un problema al eliminar el sitio web, int�ntelo de nuevo.";

$language['crawler_suppress']="Eliminar un crawler.";
$language['crawler_list']="lista de crawlers";
$language['suppress_crawler']="Eliminar este crawler";
$language['crawler_suppress_validation']="�Est� seguro de eliminar este crawler?";
$language['crawler_suppress_ok']="El crawler fue eliminado con �xito.";
$language['crawler_suppress_no_ok']="Ha ocurrido un problema al eliminar el crawler, int�ntelo de nuevo.";

$language['crawler_test_creation']="Crear crawler de pruebas.";
$language['crawler_test_suppress']="Eliminar crawler de pruebas.";
$language['crawler_test_text']="Una vez que el crawler de pruebas ha sido creado, visita tu sitio con el mismo ordenador y navegador con el que creaste el crawler de pruebas."; 
$language['crawler_test_text2']="Si todo va bien, CrawlTrack registrar� la visita como la de un crawler de pruebas. No olvides eliminar el crawler de pruebas despu�s de la comprobaci�n.";
$language['crawler_test_no_exist']="No hay ning�n crawler de pruebas en la base de datos.";

$language['exist_site']="Este sitio web ya est� en la base de datos";
$language['exist_login']="Este cuenta ya est� en la base de datos";


//1.2.0
$language['update_title']="Actualizaci�n de la lista de crawlers.";
$language['update_crawler']="Actualizar lista de crawlers.";
$language['list_up_to_date']="No hay actualizaciones nuevas de la lista de crawlers.";
$language['update_ok']="Se ha actualizado con �xito.";
$language['crawler_add']="crawlers han sido a�adido a la base de datos.";
$language['no_access']="Actualizaci�n online no disponible.<br><br>Para actualizar haga click en el siguiente link, se descargar� la �ltima lista de crawlers, suba el archivo crawlerlist.php en el directorio include de Crawltrack y reinicie el procedimiento de actualizaci�n.";
$language['no_access2']="La conexi�n con www.CrawlTrack.info ha fallado, por favor, int�ntelo de nuevo m�s tarde.";
$language['download_update']="Si ya ha subido la lista de crawlers, haga click en el bot�n siguiente para actualizar la base de datos.";
$language['download']="Descargar lista de crawlers.";
$language['your_list']="La lista que est�s usando es:";
$language['crawltrack_list']="Lista disponible en www.Crawltrack.info:";
$language['no_update']="No actualizar lista de crawlers.";
$language['no_crawler_list']="El archivo crawlerlist.php no existe en tu directorio include.";


//1.3.0
$language['use_user_agent']="La identificaci�n del Crawler se realiza por su IP o User Agent. Tienes que suministrar al menos uno de estos dos campos.";
$language['user_agent_or_ip']="User agent o IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="La tabla Crawlt_crawler se ha actualizado con �xito.";
$language['files_mod_ok']="Los archivos Configconnect.php y crawltrack.php se han actualizado con �xito.";
$language['update_crawltrack_ok']="La actualizaci�n de CrawlTrack ha terminado, ahora est� usando una nueva version:";
$language['table_mod_no_ok']="Ha habido un error en la actualizaci�n de la tabla Crawlt_crawler.";
$language['files_mod_no_ok']="Ha habido un error durante la actualizaci�n de los archivos configconnect.php y crawltrack.php.";
$language['update_crawltrack_no_ok']="Ha habido un problema durante la actualizaci�n de CrawlTrack.";
$language['logo']="Elecci�n de logo.";
$language['logo_choice']="Puede elegir el logo que aparecer� en el lugar de la etiqueta de CrawlTrack. Si no quieres que se muestre ning�n logo, elige \"Sin logo\".";
$language['no_logo']="Sin logo.";
$language['data_suppress_ok']="La informaci�n ha sido eliminada con �xito.";
$language['data_suppress_no_ok']="Ha habido un problema durante el borrado, int�ntelo de nuevo.";
$language['data_suppress_validation']="Est� seguro de que quiere eliminar toda &nbsp;";
$language['data_suppress']="Borrar la informaci�n m�s antigua de la tabla de visitas.";
$language['data_suppress2']="Borrar toda";
$language['one_year_data']="la informaci�n con m�s de un a�o";
$language['six_months_data']="la informaci�n con mas de seis meses";
$language['one_month_data']="la informaci�n con m�s de un mes";
$language['oldest_data']="La informaci�n m�s antigua desde&nbsp;";
$language['no_data']="La tabla de visitas est� vac�a.";
?>