<?
if (isset($_GET['id_selected'])){
    $id_selected = $_GET['id_selected']; //id del elemento seleccionado
}
else{
    $id_selected = 0; //id del elemento seleccionado
}

if (isset($_GET['gal_actual'])){
    $galeria_actual = $_GET['gal_actual']; //galeria actual
}
else{
    $galeria_actual = 0;
}

if (isset($_GET['selected_elem'])){
    $selected_elem = $_GET['selected_elem']; //tipo de elemento seleccionado
}
else{
    $selected_elem = 0;
}






if($selected_elem == 'galeria'){
    $galeria_actual = $id_selected;
}


?>


<? if ($galeria_actual == '1' || $permitir_subgalerias == true): ?>
    <div class="first_li ui-state-default"><a href="<? echo $app->ruta_admin; ?>?seccion=<? echo $app->seccion; ?>&amp;accion=nuevo&amp;galeria=<? echo $galeria_actual; ?>"><span class="ui-icon ui-icon-plus"></span>Nueva Galería</a></div>
<? endif; ?>

<? if ($galeria_actual != '1' && $selected_elem == 'galeria'): //mostrar solo cuando pinchemos encima de una galeria ?>
        <div class="first_li ui-state-default"><a href="<? echo $app->ruta_admin; ?>?seccion=<? echo $app->seccion; ?>&amp;accion=editar&amp;id=<? echo $galeria_actual; ?>"><span class="ui-icon ui-icon-wrench"></span>Editar Galería</a></div>
        <div class="first_li ui-state-default"><a class="diff_confirm_action" id="galeria_eliminar_<? echo $galeria_actual; ?>" href="#"><span class="ui-icon ui-icon-trash"></span>Eliminar Galería</a></div>
<? endif; ?>

<? if ($galeria_actual != '1' || $permitir_img_raiz == true): ?>
            <div class="first_li ui-state-default"><a href="javascript:jcropOpen('img/galeria/<? echo $galeria_actual; ?>&id_entrada=<? echo $galeria_actual; ?>&aspect=1');"><span class="ui-icon ui-icon-plus"></span>Nueva Imagen</a></div>
<? endif; ?>

<? if ($selected_elem != 'galeria'): //mostrar solo cuando pinchemos encima de una galeria ?>
<!-- <div class="first_li ui-state-default"><a href="javascript:jcropOpen('img/galeria/<? echo $galeria_actual; ?>&id_imagen=<? echo $id_selected; ?>');"><span class="ui-icon ui-icon-wrench"></span>Editar Imagen</a></div> -->
<div class="first_li ui-state-default"><a class="diff_confirm_action" id="jcrop_eliminar_<? echo $id_selected; ?>" href="#"><span class="ui-icon ui-icon-trash"></span>Eliminar Imagen</a></div>
<? endif; ?>
