<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
echo mostrarComponente('boletines', 'widget-inicio'); ?>

<hr/>
<? 
echo mostrarComponente('fotos', 'widget-inicio');
global $config;
?>

<? if ($app->seccion != 'fotos' ): ?>
<hr/>
<iframe title="" width="234" height="206" src="http://www.youtube.com/embed/<? echo $config->video; ?>?rel=0" frameborder="0" allowfullscreen></iframe><br/><br/>
<? endif; ?>

<hr/>    
<fb:fan profile_id="195760210445034" width="260" height="210" connections="10" stream="false" header="false" css="<? echo $app->ruta_componentes; ?>/barra/css/f.css?10">
</fb:fan>

<hr/>
<? mostrarComponente('banner','widget-barra'); ?>
