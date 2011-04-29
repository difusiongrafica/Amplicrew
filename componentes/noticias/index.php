<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$noticias = new noticias();
?>
<div class="izquierda">
    <div class="widget">
        <h2>Noticias</h2>
<? foreach ($noticias->elementos as $n): ?>
            <div class="noticia">
                <div class="img">
                    <img src="<? echo $app->ruta_base; ?>/entorno.php?seccion=noticias&amp;accion=preview&amp;id=<? echo $n->img_principal->id; ?>" alt="" />
            </div>
            <h3><? echo $n->titulo; ?></h3>
            <h4><? echo verFecha($n->fecha, 'es'); ?></h4>
            <div class="resumen"><? echo truncarTexto($n->resumen, 500); ?></div>
            <br/>
            
            <a class="vermas" href="<? echo $app->ruta_base; ?>/<? echo $app->seccion; ?>/ver/<? echo $n->id; ?>/<? echo urlAmigable($n->titulo); ?>" >ver más</a>
            <div class="clear">&nbsp;</div>
            <hr/>
        </div>
<? endforeach; ?>
        <div class="clear">&nbsp;</div>
    </div>
</div>


