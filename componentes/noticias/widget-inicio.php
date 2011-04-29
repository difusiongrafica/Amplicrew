<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$noticias = new noticias('',' ORDER BY fecha DESC LIMIT 3');

?>
<? $i = 0; foreach ($noticias->elementos as $n): ?>
<div class="noticia">
    <div class="img">
        <img src="<? echo $app->ruta_base; ?>/entorno.php?seccion=noticias&amp;accion=preview&amp;id=<? echo $n->img_principal->id; ?>" alt="" />
    </div>
    <h3 style="float: left;"><? echo $n->titulo; ?></h3>
    <div style="float: right;">
        <a href="http://facebook.com/share.php?src=bm&v=3&u=<?php echo urlencode($app->ruta_base.'/noticias/ver/'.$n->id.'/'.urlAmigable($n->titulo)); ?>">
        <img src="<? echo $app->ruta_img; ?>/facebook.png" alt="" />
        </a>
        &nbsp;
        <a href="http://twitter.com/home?status=<?php echo urlencode($app->ruta_base.'/noticias/ver/'.$n->id.'/'.urlAmigable($n->titulo)); ?>">
        <img src="<? echo $app->ruta_img; ?>/twitter.png" alt="" />
        </a>
    </div>
    <br/><br/>
    <h4><? echo verFecha($n->fecha,'es'); ?></h4>
        <? echo truncarTexto($n->resumen,400); ?><br/>
        <a class="vermas" href="<? echo $app->ruta_base; ?>/noticias/ver/<? echo $n->id; ?>/<? echo urlAmigable($n->titulo); ?>" >Leer más</a>
    <div class="clear"></div>
    <? $i++; if($i != $noticias->numeroElementos()): ?><hr/><? endif; ?>
</div>
<? endforeach; ?>
<div class="clear"></div>