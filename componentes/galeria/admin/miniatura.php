<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$i = new imagen($_GET['id']);
$proporcion = $i->w / $i->h;

if($proporcion <= 1){
    $alto = 90/$proporcion;
    $ancho = 90;
}
else{
     $alto = 90;
    $ancho = 90/$proporcion;
}


$i->verRecorte($alto,$ancho,'thum_');
