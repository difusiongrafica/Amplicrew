<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$n = new contenido($app->id);
?>

<div class="izquierda">
    
    <? if(count($n->img)): ?>
    <div id="slide1" class="widget imagen slideshow">
        <? foreach($n->img as $i): ?>
        <img src="<? echo $app->ruta_base; ?>/entorno.php?seccion=<? echo $app->seccion; ?>&amp;accion=recorte&amp;id=<? echo $i->id; ?>" alt="<? echo $i->nombre; ?>" />
        <? endforeach; ?>
    </div>
    <? endif; ?>

    <div class="noticia widget">
        <? if (@$n->img_principal->ruta != ''): ?>
        <img src="<? echo $n->img_principal->ruta; ?>" alt="" class="foto" height="300" />
        <? endif; ?>
        <h2><? echo $n->titulo; ?></h2>

<? echo $n->contenido; ?>
        <div class="clear">&nbsp;</div>

        <? echo mostrarComponente($app->seccion, 'adjuntos')?>

        <? echo mostrarComponente($app->seccion, 'galeria-enlaces')?>

    </div>
</div>

