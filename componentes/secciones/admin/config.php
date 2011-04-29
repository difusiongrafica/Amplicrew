<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 * Archivo de configuracion para componente.
 */

$url = '';
global $menu;

if($app->seccion == 'secciones'){
//Creamos un elemento jqgrid que nos ayudará a crear el javascript
$j = new jqgrid($url, 20, '', 'orden', 'asc', '', '');

//añadimos los campos que va a tener jqgrid
$j->addCampo(new campo());
$j->addCampo(new campo('Titulo', 'titulo','string', '50', true, true, false, ''));
$j->addCampo(new campo('Destacado', 'destacado','int', '50', true, true, false, ''));
$j->ordenable = true;

$acciones = new acciones("Acciones");
$acciones->btn_eliminar = true;
$acciones->btn_destacado = true;
}

//creamos añadimos las secciones del menu
$sec = new seccion("Contenido", "secciones",'ui-icon-note');

$sec->addSubseccion(new subseccion('Secciones administrables', 'secciones','', 0));
$sec->addSubseccion(new subseccion('Noticias', 'noticias','', 1));
$sec->addSubseccion(new subseccion('Calendario', 'eventos','', 2));
$sec->addSubseccion(new subseccion('Listado de Hermanos mayores', 'hermano','', 3));

$menu->addSeccion($sec);

