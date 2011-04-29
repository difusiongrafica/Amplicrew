<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$id = $_GET['id'];
$imagenes = new listado('imagen', 'AND nombre_componente = "inicio" ORDER BY nombre'); ?>
<hr/>

<h4>Listado de imágenes</h4><br/>
<ul>
<? foreach ($imagenes->elementos as $imagen): ?>
    <li class="ui-widget ui-widget-content ui-state-default ui-corner-all <? if($imagen->principal): ?>principal<? endif; ?>" id="item_<? echo $imagen->id; ?>">
        <? echo $imagen->nombre; ?>
        <a class="eliminar_adjunto" href="#imagenes" id="imagenes_<? echo $imagen->id; ?>"><span class="ui-icon ui-icon-close"></span></a>
    </li>
<? endforeach; ?>
</ul>
