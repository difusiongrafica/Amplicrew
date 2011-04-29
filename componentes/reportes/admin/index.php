<?

if ($_POST['descripcion'] != ""):

$destino = "jesus@difusiongrafica.com, soporte@difusiongrafica.com";
	
	$asunto = "REPORTE DE ERROR DE ".$_POST['app']." ";
	$texto = '
	<html>
	  <head>
	    <title>REPORTE DE ERROR DE '.$_POST['app'].'</title>
	  </head>
	  <body>
	    <h3>'.$asunto.'</h3>
	  ';

	$texto .= "Seccion: ".$_POST['seccion']."<br/>";
	
	$texto .= "Acci&oacute;n ".$_POST['accion']."<br/>";
	
	$texto .= "Descripci&oacute;n ".$_POST['descripcion']."<br/>";

        $texto .= "Usuario ".$_POST['usuario']."<br/>";

	$texto .= "<br/></body></html>";

	//para el env�o en formato HTML

	$headers = "Content-type: text/html\n";

	mail("$destino",$asunto, $texto, $headers);
	
	endif;
	
	header("location: ".$app->ruta_admin."/index.php?seccion=".$app->seccion."&accion=".$app->accion."");

?>

