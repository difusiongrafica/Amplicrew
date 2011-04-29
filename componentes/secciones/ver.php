<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$n = new contenido($app->id);
?>

<div class="izquierda">
    <div class="widget imagen">
        <img src="<? echo $n->img_principal->ruta; ?>" alt="" />
    </div>


    <div class="noticia widget">
        <h2><? echo $n->titulo; ?></h2>
        
<? echo $n->contenido; ?>
        <div class="clear">&nbsp;</div>

        <? echo mostrarComponente($app->seccion, 'adjuntos')?>

        <? echo mostrarComponente($app->seccion, 'galeria-enlaces')?>

    </div>

    
</div>

