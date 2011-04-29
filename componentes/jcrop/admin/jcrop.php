<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$id_imagen = '';
$nombre = '';
$descripcion = '';
$aspect = '';
$nombre_componente = $_GET['componente'];
$id_entrada = $_GET['id_entrada'];

if(isset($_GET['aspect'])){
    $aspect = $_GET['aspect'];
}
else{
    $aspect = 1;
}

if(isset($_GET['principal'])){
    $principal = "1";
}
else{
    $princpal = "0";
}


if(isset($_GET['id_imagen'])){
    $id_imagen = $_GET['imagen'];
    $i = new imagen($_GET['id_imagen']);
    $nombre = $i->nombre;
    $descripcion = $i->descripcion;   
}else{
    $i = new imagen($id_imagen);
}

?>


<input type="hidden" name="nombre_componente" value="<? echo $nombre_componente; ?>" />
<input type="hidden" name="principal" value="<? echo $principal; ?>" />
<input type="hidden" name="aspect" value="<? echo $aspect; ?>" />
<input type="hidden" name="id_imagen" value="<? echo $i->id; ?>" />
<input type="hidden" name="id_entrada" value="<? echo $id_entrada; ?>" />
Nombre: <input type="text" name="nombre" value="<? echo $nombre; ?>" /><br/><br/>
