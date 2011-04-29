<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $usuario;
$id = $_GET['id'];


$p = new cancion($id);
$r = new registro($usuario->id, "eliminado el hermano <i>$p</i>");


$p->eliminar();

$r->guardar();
