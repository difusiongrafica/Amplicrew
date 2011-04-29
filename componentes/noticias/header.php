<link type="text/css" rel="stylesheet" href="<? echo $app->ruta_base; ?>/componentes/inicio/css/estilo.css" media="screen" charset="ISO-8859-1" />
<style type="text/css">
a.vermas{
    display: block;
    float: right;
}
</style>

<?
if($app->accion == 'ver'){
    $n = new noticia($app->id);
    if ($n->metades != ''){
        $app->metades = $n->metades;
    }    
}

?>