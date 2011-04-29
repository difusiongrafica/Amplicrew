<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
echo $acciones->mostrarJavascript();
?>

<link href="<? echo $app->ruta_base; ?>/componentes/galeria/admin/css/estilo.css" type="text/css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="<? echo $app->ruta_base; ?>/componentes/galeria/admin/js/efectos.js"></script>
<script type="text/javascript">
    Shadowbox.init();

    $(document).ready(function(){
        $("#contextmenu").live('click',function(){
           
        });
    });
</script>