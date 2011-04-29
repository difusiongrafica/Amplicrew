<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 * Archivo de configuracion para componente.
 */

$url = '';
global $menu;

if($app->seccion == 'musica'){
//Creamos un elemento jqgrid que nos ayudará a crear el javascript
$j = new jqgrid($url, 20, '', 'orden', 'asc', '', '');

//añadimos los campos que va a tener jqgrid
$j->addCampo(new campo());
$j->addCampo(new campo('nombre', 'nombre','string', '50', true, true, false, ''));
$j->ordenable = true;

$acciones = new acciones("Acciones");
$acciones->btn_eliminar = true;
$acciones->btn_destacado = false;
}

//creamos añadimos las secciones del menu
$sec = new seccion("Música", "musica",'ui-icon-note');
//$menu->addSeccion($sec);

