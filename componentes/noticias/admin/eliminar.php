<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $usuario;
$id = $_GET['id'];


if(file_exists($app->ruta_absoluta . '/img/noticias/' . $id . '.jpg')){
    unlink($app->ruta_absoluta . '/img/noticias/' . $id . '.jpg');
}

$p = new noticia($id);
$r = new registro($usuario->id, "eliminado el noticias <i>$p</i>");


$p->eliminar();

$r->guardar();
