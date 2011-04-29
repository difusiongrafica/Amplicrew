<?php
global $app;

$dir = $ruta = $app->ruta_absoluta . '/img/secciones/' . $p->id . '/recursos/';


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

   <hr/>

<h4>Listado de archivos</h4><br/>
<ul>
<? foreach ($archivos as $a): ?>
    <li class="ui-widget ui-widget-content ui-state-default ui-corner-all" id="item_<? echo $a; ?>">
        <? echo $a; ?>
        <a class="boton eliminar_adjunto" href="#adjuntos" id="adjunto_<? echo $p->id; ?>----<? echo $a; ?>"><span class="ui-icon ui-icon-close"></span></a>
    </li>
<? endforeach; ?>
</ul>

<?
endif;

closedir($directorio);
?>



