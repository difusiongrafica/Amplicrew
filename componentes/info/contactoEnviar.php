<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */


/* RECIBIMOS LOS DATOS DEL FORMULARIO */


$nombre = $_POST['nombre'];

$telefono = $_POST['telefono'];

$de = $_POST['mail'];

$provincia = $_POST['provincia'];
$poblacion = $_POST['poblacion'];

$texto = $_POST['texto'];

$titulo = 'Correo de contacto de la Hermandad de la Columna';

/* PREPARAMOS LOS DATOS PARA EL ENVÍO DEL MAIL */


include($app->ruta_absoluta.'/componentes/info/contactoPlantilla.php');

/* PREPARAMOS EL EMAIL */
$mail = new PHPMailer(true); //Creamos el objeto mail

$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';


$mail->Subject = $titulo;
$mail->Body = $correo;

$mail->SetFrom($de,$nombre);
$mail->AddAddress('comunicacioncolumna@hermandaddecolumna.com','Comunicación Hermandad de Columna');
$mail->AddAddress('correo2@localhost','Correo de prueba Difusión Gráfica');

if($fichero != ''){
    $mail->AddAttachment($fichero,$nombref);
}

$mail->Send();



?>

<p>Su formulario de ha enviado correctamente.</p>