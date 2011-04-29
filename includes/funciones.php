<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

/* DEFINICION DE FUNCIONES PRINCIPALES */
function mostrarContenido() {
    global $app;
    if (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/' . $app->accion . '.php')) {
        include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/' . $app->accion . '.php');
    } else {
        echo("<b>ERROR 3001</b>: La accion <i>" . $app->accion . "</i> no existe para el componente <i>" . $app->seccion . "</i>.");
    }
}

function mostrarComponente($componente, $accion = 'index') {
    global $app;
    if (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/' . $accion . '.php')) {
        include($app->ruta_absoluta . '/componentes/' . $componente . '/' . $accion . '.php');
    } else {
        echo("<b>ERROR 3002</b>: La accion <i>" . $accion . "</i> no existe para el componente <i>" . $componente . "</i>.");
    }
}

function mostrarCabecera($componente = '', $accion = 'index') {
    global $app;
    if ($componente == '') {
        if (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/' . $app->accion . 'Header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/' . $app->accion . 'Header.php');
        } elseif (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/header.php');
        } else {
            echo("<b>ERROR 3003</b>: No existe la cabecera para el componente <i>" . $app->seccion . "</i>.");
        }
    }    
    else {
        if (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/' . $accion . 'Header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $componente . '/' . $accion . 'Header.php');
        } elseif (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $componente . '/header.php');
        } else {
            echo("<b>ERROR 3003</b>: No existe la cabecera para el componente <i>" . $componente . "</i>.");
        }
    }
}



function mostrarContenidoAdmin() {
    global $app;
    global $menu;
    include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/config.php');
    if (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/' . $app->accion . '.php')) {
        include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/' . $app->accion . '.php');
    } else {
        echo("<b>ERROR 4001</b>: La accion <i>" . $app->accion . "</i> no existe para el componente <i>" . $app->seccion . "</i>.");
    }
}

function mostrarComponenteAdmin($componente, $accion = 'index') {
    global $app;
    global $menu;
    include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/config.php');
    if (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/admin/' . $accion . '.php')) {
        include($app->ruta_absoluta . '/componentes/' . $componente . '/admin/' . $accion . '.php');
    } else {
        echo("<b>ERROR 4002</b>: La accion <i>" . $accion . "</i> no existe para el componente <i>" . $componente . "</i>.");
    }
}

function mostrarCabeceraAdmin($componente = '', $accion = 'index') {
    global $app;
    global $menu;
    include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/config.php');
    if ($componente == '') {
        if (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/' . $accion . 'Header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/' . $accion . 'Header.php');
        } elseif (file_exists($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $app->seccion . '/admin/header.php');
        } else {
            echo("<b>ERROR 4003</b>: No existe la cabecera para el componente <i>" . $app->seccion . "</i>.");
        }
    } else {
        if (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/admin/' . $accion . 'Header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $componente . '/admin/' . $accion . 'Header.php');
        } elseif (file_exists($app->ruta_absoluta . '/componentes/' . $componente . '/admin/header.php')) {
            include($app->ruta_absoluta . '/componentes/' . $componente . '/admin/header.php');
        } else {
            echo("<b>ERROR 3003</b>: No existe la cabecera para el componente <i>" . $componente . "</i>.");
        }
    }
}


function cargarClases($ruta) { 
    // abrir un directorio y listarlo recursivo
    if (is_dir($ruta)) {
        if ($dh = opendir($ruta)) {
            while (($file = readdir($dh)) !== false) {
                if (is_dir($ruta.$file) && $file != "." && $file != "..") {
                    if (strstr($file, "clases")) {
                        //echo $ruta.$file;
                        $clases = opendir($ruta.$file);
                        while ($clase = readdir($clases)) {
                            if (preg_match('/class\.php$/',$clase)) {
                                include_once($ruta.$file.'/'.$clase);
                                //echo $ruta.$file.'/'.$clase.'<br/>';
                            }
                        }
                    }//solo si el archivo es un directorio, distinto que "." y ".."

                    cargarClases($ruta.$file."/");
                }
            }
            closedir($dh);
        }
    }
}

function cargarCss(){
    global $app;
    if ($app->debug){ 
        $app->debug_info .= 'funcion: cargarCss()<br/> llamada a cargarFicheros<br/>';        
    }
    $f = cargarFicheros('css'); 
    
    foreach($f as $fich){
        echo '<link type="text/css" rel="stylesheet" href="'.$fich.'" media="screen" charset="ISO-8859-1" />
            ';
    }
    
}

function cargarJs(){
    global $app;
    if ($app->debug){ 
        $app->debug_info .= 'funcion: cargarJs()<br/> llamada a cargarFicheros<br/>';        
    }
    $f = cargarFicheros('js');
    
    foreach($f as $fich){
        echo '<script type="text/javascript" src="'.$fich.'"></script>
            ';
    }
    
}


function cargarFicheros($extension){
    global $app;
    
    $r_plantilla = $app->ruta_absoluta.'/plantillas/'.$app->plantilla.'/'.$extension.'/';
    $url_plantilla = $app->ruta_plantilla.'/'.$extension.'/';
    
    if ($app->debug){ 
        $app->debug_info .= 'funcion: cargarFicheros($extension)<br/> Datos:<br/>';
        $app->debug_info .= '$r_plantilla: '.$r_plantilla.'<br/>';
        $app->debug_info .= '$url_plantilla.'.$url_plantilla.'<br/> Añadiendo ficheros: ';
    }
    
    $r = opendir($r_plantilla);
    while($file = readdir($r)){
        if(preg_match("/.$extension$/",$file)){
            if($app->debug){
                $app->debug_info .= 'Fichero añadido: '. $url_plantilla.$file.'<br/>';
            }
            $ficheros[] = $url_plantilla.$file;
        }
    }    
    
    $f_general = $app->ruta_absoluta.'/componentes/'.$app->seccion.'/'.$extension.'/general.'.$extension;
    $url_general = $app->ruta_componentes.'/'.$app->seccion.'/'.$extension.'/general'.$extension;
    
    $f_accion = $app->ruta_absoluta.'/componentes/'.$app->seccion.'/'.$extension.'/'.$app->accion.'.'.$extension;
    $url_accion = $app->ruta_componentes.'/'.$app->seccion.'/'.$extension.'/'.$app->accion.'.'.$extension;
    
    if(file_exists($f_general)){
        $ficheros[] = $url_general;
    }
    
    if(file_exists($f_accion)){
        $ficheros[] = $url_accion;
    }
    
    if($app->debug){
        $app->debug_info .= '<hr/>';
    }
    
    return $ficheros;
    
}


function deldir($dir){
    $current_dir = opendir($dir);
    while($entryname = readdir($current_dir)){
        if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")){
            deldir("${dir}/${entryname}");
        }elseif($entryname != "." and $entryname!=".."){
            unlink("${dir}/${entryname}");
        }
    }
    closedir($current_dir);
    rmdir(${'dir'});
}

function comparar($a, $b){
        if ($a->orden == $b->orden){
            return 0;
        }
        else if ($a->orden > $b->orden){
            return -1;
        }
        else{
            return 1;
        }
    }

?>
