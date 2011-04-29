<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$img = new imagen($_POST['id']);

foreach ($_POST as $variable => $valor) {
    if ($variable != 'id'){
        if ($img->existePropiedad($variable)){
            $img->{$variable} = $valor;
        }
    }
}

$img->guardar();

global $usuario;

$r = new registro($usuario->id, " subido la imagen <i>$img->nombre</i>");
$r->guardar();

mostrarComponenteAdmin("jcrop", "guardar-ok");

?>


