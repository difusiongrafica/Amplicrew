<div class="clear"></div>
<table id="inicio" width="100%" class="ui-widget">
    <tr>
        <td width="40%" valign="top" class="ui-widget-content ui-corner-all">
            <div class="ui-widget-header ui-corner-all">
                <h3>Panel de control</h3>
            </div>
            <div class="panel">
                <div id="estadisticas">
                    <h4>Sumario</h4>                    
                    
                    <p class="ui-widget ui-widget-header ui-corner-all">
                        <? $ps = new noticias(); echo count($ps->elementos);?> Noticias
                        <span class="ui-icon ui-icon-link"></span>
                    </p>

                    <p class="ui-widget ui-widget-header ui-corner-all">
                        <? $ps = new eventos(); echo count($ps->elementos);?> Eventos
                        <span class="ui-icon ui-icon-link"></span>
                    </p>

                    <p class="ui-widget ui-widget-header ui-corner-all">
                        <? $ps = new listado('galeria',''); echo count($ps->elementos);?> Galerias
                        <span class="ui-icon ui-icon-link"></span>
                    </p>

                    <p class="ui-widget ui-widget-header ui-corner-all">
                        <? $ps = new listado('imagen'); echo count($ps->elementos);?> Imágenes
                        <span class="ui-icon ui-icon-link"></span>
                    </p>

                    <p class="ui-widget ui-widget-header ui-corner-all">
                        <? $ps = new registros(); echo count($ps->listado);?> operaciones
                        <span class="ui-icon ui-icon-script"></span>
                    </p>
                </div>
                <div class="clear"><br/></div>
                <!-- WIDGET IMAGENES -->
                <div id="imagenes" class="ui-widget">
                    <h3 class="ui-widget-header ui-corner-top ">Slide Show inicio</h3>
                    <div class="ui-widget-content ui-corner-bottom ">
                        Introduzca las imágenes del slide de inicio (Se ordenan por nombre)<br/><br/>
                        <a href="javascript:void(0)" id="imagen" class="boton" onclick="jcropOpen('img/slide/&amp;id_entrada=1&amp;aspect=2.8625')">Subir Imagen de detalle</a>
                        <div id="lista_imagenes" class="lista">
                            <hr/>
                            <h4>Listado de imágenes</h4><br/>
                            <? $imagenes = new listado('imagen', 'AND nombre_componente = "inicio" ORDER BY nombre'); ?>
                            <ul>
                            <? foreach ($imagenes->elementos as $imagen): ?>
                                <li class="ui-widget ui-widget-content ui-state-default ui-corner-all <? if ($imagen->principal): ?>principal<? endif; ?>" id="item_<? echo $imagen->id; ?>">
                                <? echo $imagen->nombre; ?>
                                    <a class="eliminar_adjunto" href="javascript:void(0)" id="imagenes_<? echo $imagen->id; ?>"><span class="ui-icon ui-icon-close"></span></a>
                                </li>
                            <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- FIN WIDGET IMAGENES -->
                <hr/>
                
            </div>
        </td>

        <td valign="top">
            <div id="solapas" >
                <ul>
                    <li><a href="#tabs-1">Introducci&oacute;n</a></li>
                    <li><a href="#tabs-2">Registro</a></li>                    
                    <li><a href="#tabs-4">Acerca de</a></li>
                </ul>
                <div id="tabs-1">
                    <h3>Panel de administraci&oacute;n</h3>
                    <p>Mediante este panel de administraci&oacute;n podr&aacute; introducir y actualizar todo el contenido din&aacute;mico de su web a tiempo real.</p>
                    <p>A trav&eacute;s del menu superior o del panel de iconos podr&aacute; acceder a las distintas secciones y administrar desde all&iacute; su contenido.</p>
                    <p>Para realizar cualquier acci&oacute;n permitida por el panel s&oacute;lo tendr&aacute; que presionar en el icono correspondiente del panel de acciones.</p>
                    <p>Para notificar de cualquier tipo de error puede hacerlo a trav&eacute;s del icono eviar reporte. Las ventajas de utilizar este m&eacute;todo es que adem&aacute;s de ser m&aacute;s r&aacute;pido que una llamada telef&oacute;nica, se enviar&aacute; a nuestro departamento t&eacute;cnico informaci&oacute;n adiccional sobre como ha ocurrido el error.</p>
                </div>
                <div id="tabs-2">
                    <? echo mostrarComponenteAdmin("inicio","registro"); ?>
                </div>               
                <div id="tabs-4">
                    <p>Panel de administraci&oacute;n.</p>
                    <p>Este panel ha sido dise&ntilde;ado y desarrollado por <a href="http://www.difusiongrafica.com" target="_blank">Difusi&oacute;n Gr&aacute;fica</a> usando las &uacute;ltimas tecnonog&iacute;as web y las pautas de seguridad establecidas.</p>
                    <p></p>
                </div>
            </div>
        </td>

    </tr>

    
</table>