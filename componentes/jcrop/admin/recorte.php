<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$id = $_POST['id_imagen'];
$img = new imagen($id);

foreach ($_POST as $variable => $valor) {
    if ($variable != 'id') {

        $img->{$variable} = $valor;
    }
}

$img->guardar();



if ($_FILES['imagen']['tmp_name'] != "") {
    $tipo = $_FILES['imagen']['type'];

    if ($tipo == 'image/jpeg') {
        $ext = 'jpg';
    } elseif ($tipo == 'image/png') {
        $ext = 'png';
    }

    $origen = $_FILES['imagen']['tmp_name'];
    $nombre = $app->ruta_absoluta . '/' . $img->ruta . '/' . $img->id . '.' . $ext;
}

move_uploaded_file($origen, $nombre);
$img_info = getimagesize($nombre); //informacion de la imagen
//Obtencion de medidas para la imagen principal max de anchura 800 maximo de altura 600;
$destino_temporal = tempnam($app->ruta_absoluta . "/img/tmp/", "tmp");
$img_final = aspectoImg($img_info, 976, 9000);
redimensionar_jpeg($nombre, $destino_temporal, $img_final[0], $img_final[1], 100);
copy($destino_temporal, $nombre);

$img->ruta = $app->ruta_base . '/' . $img->ruta . '/' . $img->id . '.' . $ext;
$img->guardar();
$ruta = $img->ruta;
?>

<h3>Seleccione el área que desea </h3>

<div class="ui-corner-all form_block" id="form">
    <? if($_POST['aspect'] != ''): ?>
    <div id="aspect"><? echo $_POST['aspect']; ?></div>
    <? endif; ?>
    <form class="form" name="form" method="post" action="<? echo $app->ruta_admin . '/entorno.php?seccion=' . $app->seccion . '&amp;accion=guardar' ?>" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<? echo $img->id; ?>" />


<? include($app->ruta_absoluta . '/includes/jcrop/jcrop.php'); ?><br/><br/>
        <input type="submit" value="Guardar recorte" />
    </form>
</div>