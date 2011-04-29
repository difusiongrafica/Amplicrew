<?
if ($app->accion == 'nuevo') {
    $p = new $app->seccion();
    $p->id_padre =  $_GET['galeria'];
    $p->guardar();
}
elseif($app->accion == 'editar'){
    $p = new $app->seccion($_GET['id']);
}

$acciones->titulo = ucfirst($app->accion) . ' '. $app->seccion;
?>
<? echo $acciones->mostrarHtml(); ?>

<div class="ui-corner-all ui-widget-content" id="form" >
    <form  class="form" name="form" method="post" action="<? echo $app->ruta_admin; ?>/index.php?seccion=<? echo $app->seccion; ?>&amp;accion=procesar" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<? echo $p->id; ?>" />
        <input type="hidden" name="accion" value="<? echo $app->accion; ?>" />
        <input type="hidden" name="id_padre" value="<? echo $p->id_padre; ?>" />
        
        <label for="titulo">nombre</label>
        <input type="text" class="nombre required" name="nombre" id="nombre" value="<? echo $p->nombre; ?>" />

        <label for="anio">Año</label>
        <input type="text" class="anio" name="anio" id="anio" value="<? echo $p->anio; ?>" />

        <label for="descripcion">Descripción</label>
        <textarea cols="80" class="ckeditor" rows="10" name="descripcion" id="descripcion"><? echo $p->descripcion; ?></textarea> 

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