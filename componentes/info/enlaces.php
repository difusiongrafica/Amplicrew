<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$enlaces = new enlaces("ORDER BY orden ASC");
?>
<div class="izquierda">
    <div class="widget">
        <h2>ENLACES</h2>
        <? $contador = 0; ?>
        <? foreach ($enlaces->elementos as $p): ?>
            <div class="enlace <? if (($contador % 2) == 0): ?>primero<? endif; ?>">
                    <a target="_blank" href="<? echo $p->vinculo; ?>" title="<? echo $p->descripcion; ?>"><? echo $p->nombre; ?></a><br/>
            </div>
        <? $contador++; ?>
        <? if (($contador % 2) == 0): ?><div style="clear: both;"></div><? endif; ?>
        <? endforeach; ?>

<div style="clear: both;"></div>
    </div>
</div>



