<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?
if ($app->accion == 'nuevo') {
    $p = new noticia();
    $p->guardar();
}
elseif($app->accion == 'editar'){
    $p = new noticia($_GET['id']);
}

$acciones->titulo = ucfirst($app->accion) . ' noticia';
?>
<? echo $acciones->mostrarHtml(); ?>

<div class="ui-corner-all ui-widget-content" id="form" >
    <form  class="form" name="form" method="post" action="<? echo $app->ruta_admin; ?>/index.php?seccion=<? echo $app->seccion; ?>&amp;accion=procesar" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<? echo $p->id; ?>" />
        <input type="hidden" name="accion" value="<? echo $app->accion; ?>" />

        <label for="titulo">Título</label>
        <input type="text" class="titulo" name="titulo" id="titulo" value="<? echo $p->titulo; ?>" />


        <label for="fecha">Fecha</label>
        <input type="text" class="fecha"  name="fecha" id="fecha" value="<? echo $p->fecha; ?>" />


        <label for="resumen">Resumen (resumen de tres líneas de la noticia)</label>
        <textarea cols="80" class="ckeditor" rows="10" name="resumen" id="resumen"><? echo $p->resumen; ?></textarea>


        <label for="contenido">Contenido</label>
        <textarea cols="80" class="ckeditor" rows="10" name="contenido" id="descripcion"><? echo $p->contenido; ?></textarea>

         <fieldset class="ui-widget-content ui-corner-all">
                <legend>
                    Imagen principal
                </legend>
                   <a href="javascript:void(0)" id="imagen" class="boton" onclick="jcropOpen('img/noticias/<? echo $p->id; ?>&amp;principal=1&amp;id_entrada=<? echo $p->id; ?>&amp;aspect=1.5')">Subir Imagen principal</a>
            </fieldset>

        <fieldset>
            <legend>Optimización para buscadores</legend>
            <label for="metades">Descripción (Breve descripcion máx. 160 caracteres)</label>
            <input type="text" name="metades" id="metades" value="<? echo $p->metades; ?>" />

            <label for="metades">Etiquetas (palabras separadas por comas que describan el contenido de la entrada).</label>
            <input type="text" name="metatags" id="metatags" value="<? echo $p->metatags; ?>" />
        </fieldset>


        <input type="submit" class="ui-button" name="guardar" id="guardar" value="Publicar" />

    </form>
</div>