<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$prin = 0;
if(isset($_GET['principal'])){
   $prin = $_GET['principal'];
}

$id_imagen = '';
$nombre = '';
$descripcion = '';
if(isset($_GET['id_imagen'])){
    $id_imagen = $_GET['imagen'];
    $i = new imgnoticia($_GET['id_imagen']);
    $nombre = $i->nombre;
    $descripcion = $i->descripcion;

    //$i->eliminar();
}

?>


<input type="hidden" name="principal" value="<? echo $prin; ?>" />
<input type="hidden" name="id_noticia" value="<? echo $_GET['id_proyecto']; ?>" />
<input type="hidden" name="id_imagen" value="<? echo $i->id; ?>" />
Nombre: <input type="text" name="nombre" value="<? echo $nombre; ?>" /><br/><br/>
