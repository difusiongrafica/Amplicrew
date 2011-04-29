

<script type="text/javascript">
                opener.focus();
                opener.mostrar_mensaje(1, "La imagen se ha guardado correctamente");
                opener.cerrarVentanaImagenes();
                 $("#galerias").load("entorno.php?seccion=galeria&accion=listado&galeria=1");
                this.close();
</script>