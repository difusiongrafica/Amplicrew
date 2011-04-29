<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?
if ($app->accion == 'nuevo') {
    $p = new contenido();
    $p->guardar();
}
elseif($app->accion == 'editar'){
    $p = new contenido($_GET['id']);
}

$acciones->titulo = ucfirst($app->accion) . ' seccion';
?>
<? echo $acciones->mostrarHtml(); ?>

<div class="ui-corner-all ui-widget-content" id="form" >
    <form  class="form" name="form" method="post" action="<? echo $app->ruta_admin; ?>/index.php?seccion=<? echo $app->seccion; ?>&amp;accion=procesar" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td id="bloque-form">
                <input type="hidden" name="id" value="<? echo $p->id; ?>" />
                <input type="hidden" name="accion" value="<? echo $app->accion; ?>" />

                <label for="titulo">Título</label>
                <input type="text" class="titulo" name="titulo" id="titulo" value="<? echo $p->titulo; ?>" />


                <label for="contenido">Contenido</label>
                <textarea cols="80" class="ckeditor" rows="10" name="contenido" id="descripcion"><? echo $p->contenido; ?></textarea>

                <fieldset class="ui-widget-content ui-corner-all">
                    <legend>
                        Imagen principal
                    </legend>
                    <a href="javascript:void(0)" id="imagen" class="boton" onclick="jcropOpen('img/secciones/<? echo $p->id; ?>&amp;principal=1&amp;id_entrada=<? echo $p->id; ?>')">Subir Imagen principal</a>
                </fieldset>

                <fieldset>
                    <legend>
                        Archivos Adjuntos
                    </legend>
                    <input type="file" name="adjunto" />
                </fieldset>

                <fieldset>
                    <legend>Optimización para buscadores</legend>
                    <label for="metades">Descripción (Breve descripcion máx. 160 caracteres)</label>
                    <input type="text" name="metades" id="metades" value="<? echo $p->metades; ?>" />

                    <label for="metades">Etiquetas (palabras separadas por comas que describan el contenido de la entrada).</label>
                    <input type="text" name="metatags" id="metatags" value="<? echo $p->metatags; ?>" />
                </fieldset>


                <input type="submit" class="ui-button" name="guardar" id="guardar" value="Publicar" />
            </td>
            <td id="barra-widgets">
                <!-- WIDGET IMAGENES -->
                <div id="imagenes" class="ui-widget">
                    <h3 class="ui-widget-header ui-corner-top ">Imágenes</h3>
                    <div class="ui-widget-content ui-corner-bottom ">
                        Introduzca las imágenes de la entrada<br/><br/>
                        <a href="javascript:void(0)" id="imagen" class="boton" onclick="jcropOpen('img/secciones/<? echo $p->id; ?>&id_entrada=<? echo $p->id; ?>&amp;aspect=1.9672')">Subir imagen</a>
                        <div id="lista_imagenes" class="lista">
                            <hr/>
                            <h4>Listado de imágenes</h4><br/>
                            <? $imagenes = new listado('imagen', "AND nombre_componente = '$app->seccion' AND id_entrada = '$p->id'"); ?>
                            <ul>
                                <? foreach ($imagenes->elementos as $imagen): ?>
                                    <li class="ui-widget ui-widget-content ui-state-default ui-corner-all <? if ($imagen->principal): ?>principal<? endif; ?>" id="item_<? echo $imagen->id; ?>">
                                    <? echo $imagen->nombre; ?>
                                        <a class="boton eliminar_adjunto" href="javascript:void(0)" id="imagenes_<? echo $imagen->id; ?>"><span class="ui-icon ui-icon-close"></span></a>
                                      <!--  <a class="boton" href="#imagenes" onclick="jcropOpen('img/proyectos/<? echo $p->id; ?>&amp;id_proyecto=<? echo $p->id; ?>&amp;id_imagen=<? echo $imagen->id; ?>')" id="imagenes_<? echo $imagen->id; ?>"><span class="ui-icon ui-icon-pencil"></span></a> -->
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- FIN WIDGET IMAGENES -->


                <!-- WIDGET GALERIAS -->
                <div id="galrias" class="ui-widget">
                    <h3 class="ui-widget-header ui-corner-top ">Galerías</h3>
                    <div class="ui-widget-content ui-corner-bottom ">
                        Seleccione las galerias que quiera enlazar<br/>                     
                        <div id="lista_galerias">
                            <hr/>                            
                            <? $imagenes = new listado('galeria', " AND id_padre != 0 ORDER BY id_padre ASC"); ?>
                            <select name="galeria[]" size="12" multiple="multiple">
                                <? foreach ($imagenes->elementos as $imagen): ?>
                                <option style="font-weight: normal; font-size: 11px;" value="<? echo $imagen->id; ?>" title="<? echo $imagen->nombre; ?>" id="item_<? echo $imagen->id; ?>" <? if($p->buscarGaleriaEnlazada($imagen->id)): ?>selected="selected"<? endif; ?>>[<? echo $imagen->anio; ?>]<? echo $imagen->nombre; ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- FIN WIDGET GALERIAS -->


                <!-- WIDGET adjuntos -->
                <div id="adjuntos" class="ui-widget">
                    <h3 class="ui-widget-header ui-corner-top ">Archivos Adjuntos</h3>
                    <div class="ui-widget-content ui-corner-bottom ">
                        <div id="lista_imagenes" class="lista">
                            <? include($app->ruta_absoluta.'/componentes/secciones/admin/listaradjuntos.php'); ?>
                        </div>
                    </div>
                </div>
                <!-- FIN WIDGET adjuntos -->
            </td>
        </tr>
    </table>
    </form>
</div>