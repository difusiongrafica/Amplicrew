<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $usuario;
$id = $_GET['id'];


$p = new $app->seccion($id);
$r = new registro($usuario->id, "eliminado la entrada <i>$p->nombre</i> de la seccion $app->seccion");
$p->eliminar();


$r->guardar();
