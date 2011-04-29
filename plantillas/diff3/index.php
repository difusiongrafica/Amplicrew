<? header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="<? echo $app->default_lan; ?>" lang="<? echo $app->default_lan; ?>">
    <head>        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<? echo $app->ruta_img; ?>/favicon.ico" />        

        <? echo cargarCss(); //Carga las hojas de estilo generales y de seccion ?>   
        <? echo cargarJs(); //Carga los javascripts generales y de seccion ?>   
        <? echo mostrarCabecera(); ?>
        <? echo mostrarCabecera('barra'); ?>

        <meta name="title" content="<? echo $app->nombre_app; ?>" />
        <meta name="description" content="<? echo $app->metades; ?>" />
        <meta name="keywords" content="<? echo $app->metatags; ?>" />
        <title><? echo $app->nombre_app; ?></title>
    </head>

    <body>
        <? if ($app->seccion == 'inicio'): ?> <div id="shadow"></div><? endif; ?>
        <a name="top"></a>
        <div id="contenido-cabecera">
            <div id="cabecera">
                <a href="<? echo $app->ruta_base;?>"><h1 id="logo"><? echo $app->nombre_app; ?></h1></a>

            </div>
        </div>
        <div id="contenido-menu">
            <div id="menu" class="menu"><? echo mostrarComponente('menu'); ?></div>
        </div>
       
       
        <div id="contenedor" align="center">
            <div id="contenido" align="center">
                <div style="clear: both;"></div>

                <? echo mostrarContenido(); ?>

                <div class="derecha"><div id="barra"><? echo mostrarComponente('barra'); ?></div></div>
                <div class="clear"></div>

            </div>
            <!-- fin contenido -->
            
        </div>
        <div id="pie"><? echo mostrarComponente('pie'); ?></div>
        <!-- fin contenedor -->
        
        <? if ($app->debug): ?>
        <div id="debug"><? echo $app->debug_info; ?></div>
        <? endif; ?>
        
        <div id="fb-root"></div>
        <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({appId: '149956905024524', status: true, cookie: true, xfbml: true});
            };
            (function() {
                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.src = document.location.protocol +
                    '//connect.facebook.net/es_ES/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());
        </script>

        
<? if ($app->google_analitics != ''): ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<? echo $app-google_analitics; ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<? endif; ?>
        
    </body>
</html>