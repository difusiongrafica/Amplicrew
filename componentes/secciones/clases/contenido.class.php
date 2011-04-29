<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

class contenidos extends listado {    

    public function __construct($destacado = '', $filtro = '') {
        global $app;
        $c = new mysql($app);
        $consulta = 'SELECT DISTINCT id FROM secciones WHERE 1=1 ';

        if($destacado != ''){
            $consulta .= ' AND destacado = '.$destacado;
        }

        if($filtro != ''){
            $consulta .= $filtro;
        }
        else{
            $consulta .= ' ORDER BY secciones.fecha DESC ';
        }
        //echo $consulta.'<br/>';
        $res = $c->consulta($consulta);

        while ($row = $c->extarerArray($res)) {
            $p = new contenido($row['id']);
            $this->elementos[] = $p;
        }

    }


}


class contenido extends componente {
    var $id;
    var $titulo;
    var $contenido;
    var $fecha;
    var $img_principal;
    var $img = array();
    var $galerias = array();
    var $destacado;


    function  __construct($id = '') {
        $this->componente='secciones';
        global $app;
        if ($id != '') {
            $c = new mysql($app);
            $res = $c->consulta("SELECT * FROM secciones WHERE id = $id");
            $row = $c->extarerArray($res);

            $this->id = $row['id'];
            $this->titulo = $row['titulo'];
            $this->contenido = $row['contenido'];
            $this->fecha = $row['fecha'];
            
            $this->destacado = $row['destacado'];

            $this->metades = $row['metades'];
            $this->metatags = $row['metatags'];

            $res = $c->consulta("SELECT * FROM imagen WHERE nombre_componente='$this->componente' AND id_entrada = '$this->id' AND principal = 1");
            while ($row = $c->extarerArray($res)) {
                $p = new imagen($row['id']);
                $this->img_principal = $p;
            }

            $res = $c->consulta("SELECT * FROM imagen WHERE nombre_componente='$this->componente' AND id_entrada = '$this->id' AND principal != 1 ORDER BY nombre ASC");
            while ($row = $c->extarerArray($res)) {
                $p = new imagen($row['id']);
                $this->img[] = $p;
            }

            $res = $c->consulta("SELECT * FROM seccionesgalerias WHERE id_seccion='$this->id'");
            while ($row = $c->extarerArray($res)) {                
                $this->galerias[] = $row['id_galeria'];
            }

        }
        else{
            $c = new mysql($app);
            $res = $c->consulta("SELECT MAX(id) as maxi FROM secciones");
            $row = $c->extarerArray($res);

            $this->id = $row['maxi'] +1;

            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id);
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id,0777);
            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id.'/recursos');
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id.'/recursos',0777);
            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id.'/crop');
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id.'/crop',0777);
        }

    }

    function  __toString() {
        return $this->titulo;
    }


    function buscarGaleriaEnlazada($gal){
        foreach ($this->galerias as $g) {
            if($g == $gal){
                return true;
            }
        }

        return false;
    }


    function guardar(){
        global $app;
        $c = new mysql($app);

        //Almacenamos los enlaces a las galerias

        // 1. borramos lo que habia
        $c->consulta("DELETE FROM seccionesgalerias WHERE id_seccion = '$this->id'");
        // 2. Añadimos lo que hay seleccionado
        foreach ($this->galerias as $g) {
            $c->consulta("INSERT INTO seccionesgalerias (id_seccion,id_galeria) VALUES ('$this->id','$g')");
        }

        // ACTUALIZAMOS LOS DEMAS VALORES
        if ($this->id != ''){
            $c->consulta("UPDATE secciones SET titulo = '$this->titulo', contenido = '$this->contenido', fecha = '$this->fecha', metades = '$this->metades', metatags='$this->metatags', destacado = '$this->destacado'  WHERE id = $this->id");

        }
        else{
            $res = $c->consulta("SELECT MAX(id) as max FROM secciones");
            $row = $c->extarerArray($res);
            $max = $row['max'] + 1;
            $this->id = $max;
            $c->consulta("INSERT INTO secciones (id,titulo,contenido,fecha,metades,metatags) VALUES ('$max','$this->titulo','$this->contenido','$this->fecha','$this->metades','$this->metatags')");

            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id);
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id,0777);
            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id.'/recursos');
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id.'/recursos',0777);
            @mkdir($app->ruta_absoluta.'/img/secciones/'.$this->id.'/crop');
            chmod ($app->ruta_absoluta.'/img/secciones/'.$this->id.'/crop',0777);

        }



    }

    public function eliminar(){
        global $app;
        $c = new mysql($app);
        $c->consulta("DELETE FROM secciones WHERE id = '$this->id'");

        if ($this->id != ''){
            deldir($app->ruta_absoluta.'/img/secciones/'.$this->id);
        }

    }
}