<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $usuario;
$p = new contenido($_POST['id']);

foreach ($_POST as $variable => $valor) {
    if ($variable != 'id' && !is_array($variable)){
        $p->{$variable} = $valor;
    }
}

$p->galerias = array();
if (isset ($_POST['galeria'])) {
    $galerias = $_POST['galeria'];

    foreach ($galerias as $g) {
        $p->galerias[] = $g;
    }
}



$p->guardar();

if($_POST['accion'] == "nuevo"){
    $accion = "creada";
}
elseif($_POST['accion'] == "editar"){
    $accion = "editada";
}


if($_FILES['adjunto']['name'] != ''){
    $temp = $_FILES['adjunto']['tmp_name'];
    $nombre = $_FILES['adjunto']['name'];

    $ruta = $app->ruta_absoluta.'/img/secciones/'.$p->id.'/recursos/'.nombreFichero($nombre);

    move_uploaded_file($temp, $ruta);

}

$r = new registro($usuario->id, "$accion la seccion <i>$p->titulo</i>");
$r->guardar();


mostrarComponenteAdmin($app->seccion);