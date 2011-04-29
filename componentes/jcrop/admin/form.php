<?
$seccion = $_GET['componente'];
$img = $_GET['ruta'];
?>


<h2>Rellene los campos relativos a la imagen</h2>

<div class="ui-corner-all form_block" id="form">
    <form class="form" name="form" method="post" action="<? echo $app->ruta_admin . '/popup.php?seccion=jcrop&amp;accion=recorte' ?>" enctype="multipart/form-data" >
        
        <input type="hidden" name="ruta" value="<? echo $img; ?>" />
        <input type="hidden" name="seccion" value="<? echo $seccion; ?>" />
        
        <? mostrarComponenteAdmin('jcrop', 'jcrop'); ?>

        <input type="file" name="imagen" /><br/><br/>
        <input type="submit" class="ui-button ui-state-default ui-corner-all" name="siguiente" id="siguiente" value="Siguiente" />

    </form>
</div>