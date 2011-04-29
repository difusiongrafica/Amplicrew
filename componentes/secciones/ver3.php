<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$n = new contenido($app->id);
?>

<div class="izquierda">

    <div class="noticia widget">
        <? if (@$n->img_principal->ruta != ''): ?>
        <img src="<? echo $n->img_principal->ruta; ?>" alt="" class="img-i" width="200" />
        <? endif; ?>
        <h2><? echo $n->titulo; ?></h2>

<? echo $n->contenido; ?>
        <div class="clear">&nbsp;</div>

        <? echo mostrarComponente($app->seccion, 'adjuntos')?>

        <? echo mostrarComponente($app->seccion, 'galeria-enlaces')?>

    </div>
</div>

