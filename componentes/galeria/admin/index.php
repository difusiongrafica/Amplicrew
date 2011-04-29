<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// http://difusion.serveftp.org/diff3/img/proyectos/1/principal.jpg

//$acciones->mostrarHtml();


$galeria_principal = "1";

if(isset($_GET['galeria'])){
    $galeria_actual = $_GET['galeria'];    
}
else{
    $galeria_actual = $galeria_principal;    
}

$gp = new galeria($galeria_principal);



$g = new galeria($galeria_actual);


?>
<script type="text/javascript">
mostrar_mensaje(1,"Para ver las opciones disponibles presione con el botón derecho encima del área de trabajo");
</script>
<h2 id="titulo-galeria">Galería <? echo $g->nombre; ?></h2>
<div id="info-galeria">
    <span id="seccion"><? echo $app->seccion; ?></span>
    <span id="id_actual"><? echo $g->id; ?></span>
    <span id="id_galeria"><? echo $g->id; ?></span>
    <span id="selected_elem">galeria</span>
</div>


<div id="contextmenu" class="contextmenu"> 
<ul id="galerias" class="ui-widget ui-widget-content ui-corner-all">
    
    <? if($g->id_padre != 0): ?>
    <? $padre = new galeria ($g->id_padre); ?>
       <li id="galeria_<? echo $padre->id; ?>" class="elemento galeria ui-state-default ui-corner-all tipcontent" ondblclick="abrirGaleria('<? echo $padre->id; ?>','<? echo $padre->nombre; ?>');">
                <img class="tipobject" src="<? echo $app->ruta_img; ?>/carpeta.png" alt="" style="border:none;" />
                <p><b>[volver a <? echo truncarCadena($padre->nombre,20); ?>]</b></p>
                <div class="tippopup ui-widget ui-widget-content ui-corner-all">
                    <h3>Galería</h3>
                    <img class="tipobject" src="<? echo $app->ruta_img; ?>/carpeta.png" alt="" />
                    <? echo "Nombre galería: ".$padre->nombre; ?><br/>
                    Subgalerías: <? echo $padre->verNumSubgalerias(); ?><br/>
                    Imágenes: <? echo $padre->verNumImagenes(); ?><br/>
                </div>
            </li>
    <? endif; ?>
    <? foreach ($g->subgalerias as $f): ?>
            <li id="galeria_<? echo $f->id; ?>" class="elemento galeria ui-state-default ui-corner-all tipcontent" ondblclick="abrirGaleria('<? echo $f->id; ?>', '<? echo $f->nombre; ?>');">
                <img class="tipobject" src="<? echo $app->ruta_img; ?>/carpeta.png" alt="" style="border:none;" />
                <p><b>[<? echo truncarCadena($f->nombre,20); ?>]</b></p>
                <div class="tippopup ui-widget ui-widget-content ui-corner-all">
                    <h3>Galería</h3>
                    <img class="tipobject" src="<? echo $app->ruta_img; ?>/carpeta.png" alt="" />
                    <? echo "Nombre galería: ".$f->nombre; ?><br/>
                    Subgalerías: <? echo $f->verNumSubgalerias(); ?><br/>
                    Imágenes: <? echo $f->verNumImagenes(); ?><br/>
                </div>
            </li>
    <? endforeach; ?>
    <? foreach ($g->imagenes as $f): ?>
            <li id="imagen_<? echo $f->id; ?>" class="elemento foto ui-state-default ui-corner-all tipcontent" >
                <img class="tipobject" src="<? echo $app->ruta_admin; ?>/entorno.php?seccion=<? echo $app->seccion;?>&amp;accion=miniatura&amp;id=<? echo $f->id; ?>" alt="" />

                <p><? echo truncarCadena($f->nombre,20); ?></p>
                <div class="tippopup ui-widget ui-widget-content ui-corner-all">
                    <h3>Imagen</h3>
                    <a href="<? echo $f->ruta; ?>" rel="shadowbox" title="<? echo $f->nombre; ?>">
                       <img src="<? echo $app->ruta_admin; ?>/entorno.php?seccion=<? echo $app->seccion;?>&amp;accion=preview&amp;&amp;id=<? echo $f->id; ?>" alt="" />
                    </a>
                    <? echo "Nombre fichero: ".$f->nombre; ?><br/>
                    
                    Ancho: <? echo $f->w; ?>px<br/>
                    Alto: <? echo $f->h; ?>px<br/>
                    <i>Pulsa en la imagen para agrandarla</i>

                </div>
            </li>
    <? endforeach; ?>
            <div class="clear"></div>
</ul>
</div>
<div class="vmenu">
  <? echo mostrarComponenteAdmin("galeria", "menucontextual"); ?>
</div>


<?



