<?php

/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 * Archivo de configuracion para componente.
 */
if ($app->seccion == 'galeria') {

    $acciones = new acciones("Explorador de imágenes"); //Generar las acciones para las galerías
    $acciones->btn_destacado = true;
    $acciones->btn_edit = true;
    $acciones->btn_nuevo = true;

    $permitir_subgalerias = true; //Permite la creacion de subgalerias dentro de galerias si esta la opcion a true;
    $permitir_img_raiz = false; //Permite introducir imagenes dentro de la galeria principal si la opcion es a true;
    

}
//creamos añadimos las secciones del menu
$sec = new seccion("Multimedia", "galeria", 'ui-icon-image');
$sec->addSubseccion(new subseccion("Galerias", "galeria", 'ui-icon-image'));
$sec->addSubseccion(new subseccion("Música", "musica",'ui-icon-note'));
$sec->addSubseccion(new subseccion("Vídeos", "video",'ui-icon-note'));
$sec->addSubseccion(new subseccion("Boletines", "boletines",'ui-icon-note'));

$menu->addSeccion($sec);
