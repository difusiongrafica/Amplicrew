<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $usuario;
$p = new noticia($_POST['id']);

foreach ($_POST as $variable => $valor) {
    if ($variable != 'id'){
        $p->{$variable} = $valor;
    }
}

$p->guardar();

if($_POST['accion'] == "nuevo"){
    $accion = "creada";
}
elseif($_POST['accion'] == "editar"){
    $accion = "editada";
}


$r = new registro($usuario->id, "$accion la noticia <i>$p->titulo</i>");
$r->guardar();


mostrarComponenteAdmin($app->seccion);