<? $n = new contenido($app->id);

$app->metades = $n->metades;
$app->nombre_app = $n->metades.' | Hermandad de columna'; ?>

<link type="text/css" rel="stylesheet" href="<? echo $app->ruta_componentes; ?>/<? echo $app->seccion; ?>/css/estilo.css" />
<link type="text/css" rel="stylesheet" href="<? echo $app->ruta_base; ?>/componentes/inicio/css/estilo.css" media="screen" charset="ISO-8859-1" />