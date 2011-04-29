<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $usuario;
$p = new cancion($_POST['id']);

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

if($_FILES['mp3']['name'] != ''){
    $temp = $_FILES['mp3']['tmp_name'];
    $nombre = $_FILES['mp3']['name'];

    $ruta = $app->ruta_absoluta.'/img/cancion/'.$p->id.'/recursos/.'.$p->id.'.mp3';

    move_uploaded_file($temp, $ruta);

}

$r = new registro($usuario->id, "$accion la canción <i>$p->nombre</i>");
$r->guardar();


mostrarComponenteAdmin($app->seccion);