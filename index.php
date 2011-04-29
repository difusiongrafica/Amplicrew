<?

/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

/* INCLUIMOS EL FICHERO QUE CARGA LA CONFIG */


ini_set('error_reporting', E_ALL);
include('config.php');



/* Incñuimos la clase app y creamos el objeto principal app */
include('app.class.php');
$app = new app($nombre_app, $metades, $metatags, $default_lan, $plantilla, $db_host, $db_name, $db_user, $db_pass, $carpeta);

$app->debug = false; //Modo debug

if ($app->ruta_base == 'http://difusiongrafica.com'){    //redirección
    header ("Location: http://www.difusiongrafica.com");
}

$app->google_analitics = $google_analitics;


/* Cargamos la clase para generar consultas MySQL */
include($app->ruta_absoluta.'/clases/mysql.class.php');

/* Para obtener configuracion general de la aplicacion */
include($app->ruta_absoluta.'/clases/config.class.php');
$config = new config();

/* Cargamos las funciones principales */
include ($app->ruta_absoluta.'/includes/funciones.php');
include ($app->ruta_absoluta.'/includes/cadenas.php');

/* Incluimos la clase componente de donde heredaran los demás componentes */
include($app->ruta_absoluta.'/clases/componente.class.php');
include($app->ruta_absoluta.'/clases/imagen.class.php');
/* Incluimos las demás clases de los componentes */
cargarClases($app->ruta_absoluta.'/componentes/');


//incluimos la plantilla principal de la aplicacion
include($app->ruta_absoluta . '/plantillas/' . $app->plantilla . '/index.php');


?>
