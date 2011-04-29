<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$i = new imagen($_GET['id']);
$proporcion = $i->w / $i->h;

if($proporcion <= 1){
    $alto = 200/$proporcion;
    $ancho = 200;
}
else{
     $alto = 200;
    $ancho = 200/$proporcion;
}


$i->verRecorte($alto,$ancho,'preview_');
