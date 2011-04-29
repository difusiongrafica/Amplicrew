<?
global $usuario;
?>

<div id="footpanel" class="ui-widget ui-widget-header">
    <ul class="mainpanel">
        <li>
            <div id="firma">Powered by <a href="http://www.difusiongrafica.com" class="firma" target="_blank">Difusióngráfica.com</a></div>
        </li>

        <li class="derecha" id="registropanel">
            <a id="registro-link" class="boton-pie ui-widget ui-state-default" href="#"><span class="ui-icon ui-icon-script">&nbsp;</span> <span class="derecha" >Registro</span> </a>
            <div id="registro" class="subpanel ui-widget ui-widget-content ui-state-hover">
                <? echo mostrarComponenteAdmin("pie", "registro"); ?>
            </div>
        </li>

        <li class="derecha" style="display: none;">
            <a id="mensahes-link" class="boton-pie ui-widget ui-state-default ui-state-disabled" href="#"><span class="ui-icon ui-icon-mail-closed">&nbsp;</span> <span class="derecha" >Mensajes</span> </a>
        </li>

        <li class="derecha" id="userpanel">
            <a  class="boton-pie ui-widget ui-state-default" href="#"><span class="derecha" ><span class="ui-icon ui-icon-person">&nbsp;</span> <? echo $usuario->nombre; ?></span> </a>
            <div class="subpanel ui-widget ui-widget-content">
                <h3 class="ui-widget-header"><span> &ndash; </span>Panel de usuario</h3>
                <ul class="ui-widtget-content">
                    <li class="boton-pie ui-widget ui-state-default"><a href="<? echo $app->ruta_admin; ?>?seccion=usuarios&amp;accion=nuevo">Crear nuevo admin </a><span class="ui-icon ui-icon-circle-plus"></span></li>
                    <li class="boton-pie ui-widget ui-state-default"><a href="<? echo $app->ruta_admin; ?>?seccion=usuarios&amp;accion=editar">Cambiar datos </a><span class="ui-icon ui-icon-gear"></span></li>
                    <li class="boton-pie ui-widget ui-state-default"><a id="reporte_link" href="#">Reportar error </a><span class="ui-icon ui-icon-alert"></span></li>
                    <li class="boton-pie ui-widget ui-state-default"><a id="usuario-logout" href="#">Salir del panel </a><span class="ui-icon ui-icon-power"></span></li>
                </ul>

            </div>
        </li>
        

    </ul>

</div>

