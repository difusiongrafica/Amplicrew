<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $usuario;
$p = new $app->seccion($_POST['id']);

foreach ($_POST as $variable => $valor) {
    if ($variable != 'id'){       
            $p->{$variable} = $valor;
    }
}

$p->guardar();

if($_POST['accion'] == "nuevo"){
    $accion = "creado";
}
elseif($_POST['accion'] == "editar"){
    $accion = "editado";
}


$r = new registro($usuario->id, "$accion la $app->seccion <i>$p->nombre</i>");
$r->guardar();


mostrarComponenteAdmin($app->seccion);