$(document).ready(function(){
    $('.diff_action, .diff_confirm_action').attr('href','');


    $('.diff_action').live('click',function(){
        $info = $(this).attr('id').split('_');
        $seccion = $info[0];
        $accion = $info[1];
        $id = $info[2];

        $.ajax({
            type: 'GET',
            url: 'entorno.php',
            data: 'seccion=' + $seccion + '&accion=' + $accion + '&id=' + $id,
            success: function(){
                mostrar_mensaje(1,$accion + ' ' + $seccion + ' ' + $id + ' completado');
                $("#galerias").load("entorno.php?seccion=galeria&accion=listado&galeria=1");
            },
            error: function(){
                mostrar_mensaje(2,'Se ha producido un error durante la operación');
            }
        });

    });

    $('.diff_confirm_action').live('click',function(){
        $info = $(this).attr('id').split('_');
        $seccion = $info[0];
        $accion = $info[1];
        $id = $info[2];

        $.ajax({
            type: 'GET',
            url: 'entorno.php',
            data: 'seccion=' + $seccion + '&accion=' + $accion + '&id=' + $id,
            success: function(){
                mostrar_mensaje(1,$accion + ' ' + $seccion + ' ' + $id + ' completado');
                $("#galerias").load("entorno.php?seccion=galeria&accion=listado&galeria=1");
            },
            error: function(){
                mostrar_mensaje(2,'Se ha producido un error durante la operación');
            }
        });

    });

});

