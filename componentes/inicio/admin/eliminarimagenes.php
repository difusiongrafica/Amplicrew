<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

$id = $_GET['id'];
$i = new imagen($id);

$i->eliminar();