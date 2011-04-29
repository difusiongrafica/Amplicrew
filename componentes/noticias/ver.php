<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$n = new noticia($app->id);
?>

<div class="izquierda">
    <div class="widget">
        <h2>Noticias</h2>

        <div class="noticia">
            <div class="img">
                <img src="<? echo $n->img_principal->ruta; ?>" alt="" width="250" />
            </div>
            <h3><? echo $n->titulo; ?></h3>
            <h4><? echo verFecha($n->fecha, 'es'); ?></h4>
            <? echo eliminarAtributosHtml($n->contenido, 'style'); ?><br/>
            <? echo $n->contenido; ?>
            <div class="clear">&nbsp;</div>

        </div>

        <div class="clear">&nbsp;</div>
    </div>
</div>



