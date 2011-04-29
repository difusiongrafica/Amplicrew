<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?
if ($app->accion == 'nuevo') {
    $p = new cancion();
    $p->guardar();
}
elseif($app->accion == 'editar'){
    $p = new cancion($_GET['id']);
}

$acciones->titulo = ucfirst($app->accion) . ' noticia';
?>
<? echo $acciones->mostrarHtml(); ?>

<div class="ui-corner-all ui-widget-content" id="form" >
    <form  class="form" name="form" method="post" action="<? echo $app->ruta_admin; ?>/index.php?seccion=<? echo $app->seccion; ?>&amp;accion=procesar" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<? echo $p->id; ?>" />
        <input type="hidden" name="accion" value="<? echo $app->accion; ?>" />

        <label for="nombre">Nombre</label>
        <input type="text" class="nombre" name="nombre" id="nombre" value="<? echo $p->nombre; ?>" />


        <label for="cargo">Archivo (mp3)</label>
        <input type="file" class="mp3"  name="mp3" id="mp3" />


        <input type="submit" class="ui-button" name="guardar" id="guardar" value="Publicar" />

    </form>
</div>