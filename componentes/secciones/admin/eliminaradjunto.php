<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
global $app;
$id = $_GET['id'];

$valores = explode('----', $id);

$entrada = $valores[0];

$id = $valores[1];

$dir = $ruta = $app->ruta_absoluta . '/img/secciones/' . $entrada . '/recursos/';



unlink($dir.$id);
