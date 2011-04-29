<?
/***********************************************************
*           CONFIGURACION DIFF 3.0                         *
* En este fichero encontraremos todos los datos relativos  *
* a la base de datos y otros parámetros de configuración   *
* necesarios para el correcto funcionamiento de la web.    *
* NO MODIFIQUE NADA SI NO TIENE CONOCIMIENTOS DE LO QUE    *
* ESTÁ HACIENDO                                            *
************************************************************/


// GENERAL DESCRIPCION Y KEYWORDS

$nombre_app = "Amplicrew";
$metades = "";
$metatags = "";

//Codigo para google analitics

$google_analitics = ''; 

// IDIOMA POR DEFECTO

$default_lan = "es";

//PLANTILLA A CARGAR

$plantilla = "diff3";

// BASE DE DATOS

if ($_SERVER['SERVER_ADDR'] == '192.168.1.103'){ //DETECTA SI TRABAJAMOS EN LOCAL O EN REMOTO Y CARGA UNA U OTRA BASE DE DATOS

  //CARPETA PARA CARGA LOCAL
  $carpeta = "/amplicrew";

  $db_host='localhost'; // Host al que conectar, habitualmente es el ‘localhost’
  $db_name='hermandad'; // Nombre de la Base de Datos que se desea utilizar
  $db_user='difusion';   // Nombre del usuario con permisos para acceder
  $db_pass='798082jrj';  // Contraseña de dicho usuario

}
else{

  $carpeta = '';

  $db_host='localhost'; // Host al que conectar, habitualmente es el ‘localhost’
  $db_name='difusiongr_d3'; // Nombre de la Base de Datos que se desea utilizar
  $db_user='difusiongr_d3';   // Nombre del usuario con permisos para acceder
  $db_pass='798082jrj'; // Contraseña de dicho usuario
}

// FIN BASE DE DATOS





?>