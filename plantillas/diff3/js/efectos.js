/**
 * @author jesus
 */
function slideSwitch() { 
    var $active = $('#slide1 IMG.active, #slide IMG.active ');

    if ( $active.length == 0 ) $active = $('#slide1 IMG:last, #slide IMG:last');

    var $next =  $active.next().length ? $active.next()
    : $('#slide1 IMG:first, #slide IMG:first');

    $active.addClass('last-active');

    $next.css({
        opacity: 0.0
    })
    .addClass('active')
    .animate({
        opacity: 1.0
    }, 2500, function() {
        $active.removeClass('active last-active');
    });
}

function alturaBarra(){
    $izq = $(".izquierda").height();
    $barra = $("#barra").outerHeight();
    
    // alert($izq);

    if($izq > $barra){
        $("#barra") .animate({
            height: $izq-67
        }, 600, function() {
            // Animation complete.
            });

    }
}


function Play(){
    $("#jquery_jplayer_2").jPlayer('play');
}

function mostrarImagenes(){
    $('#slide1 img, #pie img').show();    
    $("img").fadeIn('slow').show();
        
}

Shadowbox.init();

$(window).load(function() {
    
    setInterval("slideSwitch()", 6000);
    setTimeout("alturaBarra()", 600);
});