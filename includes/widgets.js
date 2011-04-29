/* CONFIGURACION JAVASCRIPT PARA LOS WIDGETS GENÉRICOS REQUIERE JQUERY  */

$(document).ready(function ()
{


    $('#contextmenu li').live('mousemove',function(){
        //Vamos colocando información que recogera el menu para procesar las opciones
        
        $valores = $(this).attr("id").split('_');
        $("#id_galeria").text($valores[1]);
        $("#selected_elem").text($valores[0]);
    });

    $('#contextmenu').live('mouseover',
    function(){
        $default = $("#id_actual").text();
        $("#id_galeria").text($default);
        $("#selected_elem").text('galeria');
    });

    $('#contextmenu li').live('mouseout',
    function(){
        $default = $("#id_actual").text();

        $("#id_galeria").text($default);
        $("#selected_elem").text('galeria');
    });


    $('#contextmenu').bind('contextmenu',function(e){
        $seccion = $("#seccion").text();
        $id_selected = $("#id_galeria").text();
        $galeria_actual = $("#id_actual").text();
        $selected = $("#selected_elem").text();

        $(".vmenu").load('entorno.php?seccion=' + $seccion + '&accion=menucontextual&id_selected=' + $id_selected + '&selected_elem=' + $selected + '&gal_actual=' + $galeria_actual);

        var $cmenu = $(this).next();
        $('<div class="overlay"></div>').css({
            left : '0px',
            top : '0px',
            position: 'absolute',
            width: '100%',
            height: '100%',
            zIndex: '100'
        }).click(function() {
            $(this).remove();
            $cmenu.hide();
        }).bind('contextmenu' , function(){
            return false;
        }).appendTo(document.body);
        $(this).next().css({
            left: e.pageX,
            top: e.pageY,
            zIndex: '101'
        }).show();



        return false;
    });

    


  //FIN GALERIA
    
    $("#form fieldset").each(function(){
       $(this).width('100%');
       $ancho = $(this).width() - 22;
       $(this).width($ancho);
       
       $(this).addClass('ui-widget-header');
       $(this).addClass('ui-corner-all');
    });

    $("#form :input[type!=checkbox], #form span[class*='cke_editor']").each(function(){
       $(this).width('100%');
       $ancho = $(this).width() - 10;
       $(this).width($ancho);       
       $(this).addClass('ui-state-default');
       $(this).addClass('ui-corner-all');
    });

    $(window).resize(function(){

        $("#form fieldset").each(function(){
           $(this).width('100%');
           $ancho = $(this).width() - 22;
           $(this).width('10');
           
           $(this).width($ancho);
        });

        $("#form :input[type!=checkbox],#form  span[class*='cke_editor']").each(function(){
           $(this).width('100%');
           $ancho = $(this).width() - 10;
           $(this).width('10');
           $(this).width($ancho);
        });
    });

 //Validar formularios
    if($("#form").length){
        if($("#pass").length){
            $("#form form").validate({
                rules: {
                    pass: {
                        minlength: 5
                    },
                    pass2: {
                        minlength: 5,
                        equalTo: "#pass"
                    }
                }
            });
        }
        else{
            $("#form form").validate();
        }

        
    }

    //Datepicker
    $(".fecha").datepicker({
        inline: true,
        firstDay: 1,
        dateFormat: 'yy-mm-dd',
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        monthNames: ['Enero', 'Febrebo', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Dicicembre']
    }
    );
   

    //ColorPicker
    $(".widget-color").ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            $(el).val("#" + hex);
            $(el).ColorPickerHide();
            $(el).css("background", $(el).val());
        },
        onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);
        }
    })
    .bind('keyup', function(){
        $(this).ColorPickerSetColor(this.value);
    });
    

    //Botones
    $(".boton, input[type='submit'], input[type='button']").button();


    //Jcrop Dialogo
    $("#jcrop-dialog").dialog(
    {
        autoOpen: false,
        width: 965,
        height: 545,
        modal: true
    }
);
    $(".jcrop-open").click(function (){
        $("#jcrop-dialog").dialog('open');
    });

    $aspect = 1.9672;
    if($('#aspect').length && $('#aspect').text() != ''){
        $aspect = $('#aspect').text();
    }

    $('#cropbox').Jcrop({
            onChange: showPreview,
            onSelect:    showPreview,
            aspectRatio: $aspect
    });

    $(".ui-dialog").resize(function(){
        //alert("illo");
        $("#jcrop-dialog iframe").width($("#jcrop-dialog").width());
        $("#jcrop-dialog iframe").height($("#jcrop-dialog").height());
    });

   $("#solapas, .tab").tabs();

});


/* ABRE EL DIALOGO PARA EL RECORTE DE IMAGENES */
function jcropOpen(ruta){
    //$("#jcrop-dialog").dialog('open');
    $src = $("#jcrop-ruta").text() + ruta;

    $recorte = window.open($src,'recorte',"scrollbars=YES,directories=NO,location=NO,menubar=NO,status=NO");

    $recorte.focus();
    //$("#jcrop-dialog iframe").attr('src', $src);

}

function showPreview(coords)
            {
                if (parseInt(coords.w) > 0)
                {

                    var rx = 450 / coords.w;
                    var ry = 300 / coords.h;

                    var w = $('#cropbox').attr('width');
                    var h = $('#cropbox').attr('height');

                    $('#x').val(coords.x);
                    $('#y').val(coords.y);
                    $('#x2').val(coords.x2);
                    $('#y2').val(coords.y2);
                    $('#w').val(coords.w);
                    $('#h').val(coords.h);

                    jQuery('#preview').css({
                        width: Math.round(rx * w) + 'px',
                        height: Math.round(ry * h) + 'px',
                        marginLeft: '-' + Math.round(rx * coords.x) + 'px',
                        marginTop: '-' + Math.round(ry * coords.y) + 'px'
                    });
                }
            }

function mostrar_mensaje(tipo, mensaje){
    if(tipo == 2){
        Cabecera = "Error";
        estilo = "ui-state-error";
    }
    else{
        Cabecera = "Info";
        estilo = "ui-state-highlight";
    }
    $.jGrowl(mensaje, {
	header: Cabecera,
        theme: estilo
    });
}
