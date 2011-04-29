<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$usuario = new usuario();
$p = new noticia($_GET['id']);

if($p->destacado == 1){
    $p->destacado = 0;
    $accion = 'desactivado';
}
else{
    $p->destacado = 1;
     $accion = 'activado';
}

$p->guardar();

$r = new registro($usuario->id, "$accion la noticia <i>$p->titulo</i>");
$r->guardar();