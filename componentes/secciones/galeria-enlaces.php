<?
$n = new contenido($app->id);
if(count($n->galerias)):
?>
<h2>Galerías de Fotos</h2>
<? foreach($n->galerias as $gid): ?>
    <? $g = new galeria($gid); ?>

    <? if (count($g->subgalerias)): ?>
    <a style="text-transform: uppercase; margin-bottom: 5px;" href="<? echo $app->ruta_base; ?>/fotos/galerias/<? echo $g->id; ?>/ver-galerias-de-<? echo urlAmigable($g->nombre); ?>"  ><? echo ucfirst($g->nombre); ?></a><br/>
    <? else: ?>
    <a style="text-transform: uppercase; margin-bottom: 5px;" href="<? echo $app->ruta_base; ?>/fotos/ver/<? echo $g->id; ?>/<? echo urlAmigable($g->nombre); ?>" ><? echo ucfirst($g->nombre); ?></a><br/>
    <? endif; ?>
<? endforeach;?>
<? endif; ?>