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
$language['install']="Instalación";
$language['welcome_install'] ="Bienvenido a CrawlTrack, instalación en tres pasos, muy fácil .";
$language['menu_install_1']="1) Introduzca los datos de conexión a la base de datos";
$language['menu_install_2']="2) Configure los sitios web";
$language['menu_install_3']="3) Configure los permisos";
$language['go_install']="Instalar";
$language['step1_install'] ="Por favor, rellene el formulario sobre la conexión a la base de datos. Una vez validado, se crearán las tablas y archivos de conexión.";
$language['step1_install_login_mysql']="Usuario MySQL";
$language['step1_install_password_mysql']="Contraseña MySQL";
$language['step1_install_host_mysql']="Servidor MySQL";
$language['step1_install_database_mysql']="Base de datos MySQL";
$language['step1_install_ok'] ="Archivos de conexión: OK.";
$language['step1_install_ok2'] ="Creación de tablas: OK.";
$language['step1_install_no_ok'] ="Falta información para crear las tablas y los ficheros, por favor revise el formulario.";
$language['step1_install_no_ok2'] ="Los ficheros de configuración no han sido creados, compruebe si los permisos del directorio son CHMOD 777.";
$language['step1_install_no_ok3'] ="Ha surgido un problema cuando se creaban las tablas, inténtelo de nuevo.";
$language['back_to_form'] ="Volver al formulario";
$language['retry'] ="Inténtelo de nuevo";
$language['step2_install_no_ok']="No es posible conectar con la base de datos, por favor, compruebe los datos de conexión.";
$language['step3_install_no_ok']="No es posible la selección de tablas en la base de datos, por favor, compruebe los datos de conexión.";
$language['step4_install']="Continuar";

//site creation

$language['set_up_site']="Introduzca un nombre para el sitio web, será el nombre para los seguimientos de CrawlTrack. No es necesario poner la URL, sólo un nombre (Por ejemplo: Pepito en lugar de: http://www.pepito.com).";
$language['site_name']="Nombre del sitio web:";
$language['site_no_ok']="Introduce un nombre para el sitio web";
$language['site_ok']="El sitio ha sido añadido a la base de datos";
$language['new_site']="Añadir un nuevo sitio web";


//tag creation
$language['tag']="Código a insertar en tus páginas";
$language['create_tag']="A continuación se muestra el código para cada sitio. Este código es para insertar en páginas .php. Si tus páginas no son .php, simplemente cambia la extensión a .php y añade  &#60;?php antes del código ?&#62; después."; 
$language['site_name2']="Nombre del sitio web";
$language['local_tag']="Código alternativo (si el servidor no permite las funciones fsockopen y fputs). En este caso el sitio web debe estar en el mismo servidor que CrawlTrack.";
$language['non_local_tag']="Código estándar";

//login set_up
$language['admin_creation']="Configuración de la cuenta de administrador";
$language['admin_setup']="Por favor, introduzca el nombre del administrador y contraseña.";
$language['user_creation']="Configuración de cuenta de usuario";
$language['user_setup']="Por favor, introduzca el nombre de usuario y contraseña.";
$language['user_site_creation']="Configuración de la cuenta de usuario-web";
$language['user_site_setup']="Por favor, introduzca el nombre de usuario-web y contraseña.";
$language['admin_rights']="El administrador tiene acceso a todas las estadísticas y configuraciones";
$language['login']="Usuario";
$language['password']="Contraseña";
$language['valid_password']="Repita la contraseña.";
$language['login_no_ok']="Faltan datos o las contraseñas son diferentes, por favor revise el formulario y corrija los datos.";
$language['login_ok']="Cuenta configurada.";
$language['login_no_ok2']="Ha habido un problema durante la configuración de la cuenta, inténtelo de nuevo.";
$language['login_user']="Crear cuenta de usuario";
$language['login_user_what']="El usuario tiene acceso a las estadísticas de todos los sitios web";
$language['login_user_site']="Crear cuenta de usuario-web";
$language['login_user_site_what']="El usuario-web tiene acceso a sólo a un sitio web";
$language['login_finish']="Todas las cuentas necesarias han sido creadas, la instalación ha concluido.";


//access

$language['restrited_access']="Acceso restringido.";
$language['enter_login']="Por favor, introduzca su nombre de usuario y contraseña.";


//display


$language['crawler_name']="Crawlers";
$language['nbr_visits']="Visitas";
$language['nbr_pages']="Páginas vistas";
$language['date_visits']="Última visita";
$language['display_period']="Periodo:";
$language['today']="Hoy";
$language['days']="Últimos 8 dias";
$language['month']="Último mes";
$language['one_year']="Último año";
$language['no_visit']="No hay visitas.";
$language['page']="Páginas";
$language['admin']="Configuración";
$language['nbr_tot_visits']="Número de visitas";
$language['nbr_tot_pages']="Número de páginas vistas";
$language['nbr_tot_crawlers']="Número de crawlers";
$language['visit_per-crawler']="Detalles";
$language['100_visit_per-crawler']="Detalles (sólo se muestran 100 líneas).";
$language['user_agent']="User agent";
$language['Origin']="User";
$language['help']="Ayuda";

//search

$language['search']="Buscar";
$language['search2']="Buscar";
$language['search_crawler']="por crawler";
$language['search_user_agent']="por user-agent";
$language['search_page']="por página";
$language['search_user']="por crawler user";
$language['go_search']="Buscar";
$language['result_crawler']="Resultados de crawlers.";
$language['result_ua']="Resultados de user-agents.";
$language['result_page']="Resultados de páginas.";
$language['result_user']="Resultados de crawler users.";
$language['result_user_crawler']="Crawlers para este user.";
$language['result_user_1']="User:&nbsp;";
$language['result_crawler_1']="Búsqueda:&nbsp;";
$language['no_answer']="No hay resultados para esta búsqueda.";
$language['to_many_answer']="Hay más de 100 resultados (sólo se muestran 100 líneas).";


//admin

$language['user_create']="Crear nueva cuenta de usuario.";
$language['user_site_create']="Crear nueva cuenta de usuario-web.";
$language['new_site']="Añadir sitio web.";
$language['see_tag']="Mostrar código a insertar.";
$language['new_crawler']="Añadir un nuevo crawler";
$language['crawler_creation']="Por favor complete el formulario para el nuevo crawler."; 
$language['crawler_name2']="Nombre del crawler:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="User del crawler:";
$language['crawler_url']="URL del user (ej: http://www.ejemplo.com)";
$language['crawler_url2']="URL del user:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Faltan datos, por favor revise el formulario.";
$language['exist']="Este crawler ya está en la base de datos";
$language['exist_data']="Esta es la información del crawler en la base de datos:";
$language['crawler_no_ok2']="Ha surgido un problema cuando se añadía el crawler, inténtelo de nuevo.";
$language['crawler_ok']="El crawler ha sido añadido a la base de datos.";

$language['user_suppress']="Eliminar cuenta de usuario/usuario-web.";
$language['user_list']="Lista de usuaris y usuarios web";
$language['suppress_user']="Eliminar esta cuenta";
$language['user_suppress_validation']="¿Está seguro de eliminar esta cuenta?";
$language['yes']="Si";
$language['no']="No";
$language['user_suppress_ok']="La cuenta fue eliminada con éxito.";
$language['user_suppress_no_ok']="Ha ocurrido un problema al eliminar la cuenta, inténtelo de nuevo.";

$language['site_suppress']="Eliminar un sitio web.";
$language['site_list']="Lista de sitios web";
$language['suppress_site']="Eliminar este sitio web";
$language['site_suppress_validation']="¿Está seguro de eliminar este sitio web?";
$language['site_suppress_ok']="El sitio web fue eliminado con éxito.";
$language['site_suppress_no_ok']="Ha ocurrido un problema al eliminar el sitio web, inténtelo de nuevo.";

$language['crawler_suppress']="Eliminar un crawler.";
$language['crawler_list']="lista de crawlers";
$language['suppress_crawler']="Eliminar este crawler";
$language['crawler_suppress_validation']="¿Está seguro de eliminar este crawler?";
$language['crawler_suppress_ok']="El crawler fue eliminado con éxito.";
$language['crawler_suppress_no_ok']="Ha ocurrido un problema al eliminar el crawler, inténtelo de nuevo.";

$language['crawler_test_creation']="Crear crawler de pruebas.";
$language['crawler_test_suppress']="Eliminar crawler de pruebas.";
$language['crawler_test_text']="Una vez que el crawler de pruebas ha sido creado, visita tu sitio con el mismo ordenador y navegador con el que creaste el crawler de pruebas."; 
$language['crawler_test_text2']="Si todo va bien, CrawlTrack registrará la visita como la de un crawler de pruebas. No olvides eliminar el crawler de pruebas después de la comprobación.";
$language['crawler_test_no_exist']="No hay ningún crawler de pruebas en la base de datos.";

$language['exist_site']="Este sitio web ya está en la base de datos";
$language['exist_login']="Este cuenta ya está en la base de datos";


//1.2.0
$language['update_title']="Actualización de la lista de crawlers.";
$language['update_crawler']="Actualizar lista de crawlers.";
$language['list_up_to_date']="No hay actualizaciones nuevas de la lista de crawlers.";
$language['update_ok']="Se ha actualizado con éxito.";
$language['crawler_add']="crawlers han sido añadido a la base de datos.";
$language['no_access']="Actualización online no disponible.<br><br>Para actualizar haga click en el siguiente link, se descargará la última lista de crawlers, suba el archivo crawlerlist.php en el directorio include de Crawltrack y reinicie el procedimiento de actualización.";
$language['no_access2']="La conexión con www.CrawlTrack.info ha fallado, por favor, inténtelo de nuevo más tarde.";
$language['download_update']="Si ya ha subido la lista de crawlers, haga click en el botón siguiente para actualizar la base de datos.";
$language['download']="Descargar lista de crawlers.";
$language['your_list']="La lista que estás usando es:";
$language['crawltrack_list']="Lista disponible en www.Crawltrack.info:";
$language['no_update']="No actualizar lista de crawlers.";
$language['no_crawler_list']="El archivo crawlerlist.php no existe en tu directorio include.";


//1.3.0
$language['use_user_agent']="La identificación del Crawler se realiza por su IP o User Agent. Tienes que suministrar al menos uno de estos dos campos.";
$language['user_agent_or_ip']="User agent o IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="La tabla Crawlt_crawler se ha actualizado con éxito.";
$language['files_mod_ok']="Los archivos Configconnect.php y crawltrack.php se han actualizado con éxito.";
$language['update_crawltrack_ok']="La actualización de CrawlTrack ha terminado, ahora está usando una nueva version:";
$language['table_mod_no_ok']="Ha habido un error en la actualización de la tabla Crawlt_crawler.";
$language['files_mod_no_ok']="Ha habido un error durante la actualización de los archivos configconnect.php y crawltrack.php.";
$language['update_crawltrack_no_ok']="Ha habido un problema durante la actualización de CrawlTrack.";
$language['logo']="Elección de logo.";
$language['logo_choice']="Puede elegir el logo que aparecerá en el lugar de la etiqueta de CrawlTrack. Si no quieres que se muestre ningún logo, elige \"Sin logo\".";
$language['no_logo']="Sin logo.";
$language['data_suppress_ok']="La información ha sido eliminada con éxito.";
$language['data_suppress_no_ok']="Ha habido un problema durante el borrado, inténtelo de nuevo.";
$language['data_suppress_validation']="Está seguro de que quiere eliminar toda &nbsp;";
$language['data_suppress']="Borrar la información más antigua de la tabla de visitas.";
$language['data_suppress2']="Borrar toda";
$language['one_year_data']="la información con más de un año";
$language['six_months_data']="la información con mas de seis meses";
$language['one_month_data']="la información con más de un mes";
$language['oldest_data']="La información más antigua desde&nbsp;";
$language['no_data']="La tabla de visitas está vacía.";
?>