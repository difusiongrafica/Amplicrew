<?php
$dir = $ruta = $app->ruta_absoluta . '/img/secciones/' . $app->id . '/recursos/';


$directorio = opendir($dir);
$archivos = array();

while ($archivo = readdir($directorio)):
    if ($archivo != '.' && $archivo != '..') {
        $archivos[] = $archivo;
    }
endwhile;

if (count($archivos)):
    natsort($archivos);
?>

    <h2>Descargas</h2>
    <? foreach ($archivos as $a): ?>
        <a style="text-transform: uppercase; margin-bottom: 5px;" href="<? echo $app->ruta_img; ?>/secciones/<? echo $app->id; ?>/recursos/<? echo $a; ?>"><? echo $a; ?></a><br/>
    <? endforeach; ?>

<?
endif;

closedir($directorio);
?>

