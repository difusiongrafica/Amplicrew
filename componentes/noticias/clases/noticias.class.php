<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */

class noticias extends listado {   

    public function __construct($destacado = '', $filtro = '') {
        global $app;
        $c = new mysql($app);
        $consulta = 'SELECT DISTINCT id FROM noticias WHERE 1=1 ';

        if($destacado != ''){
            $consulta .= ' AND destacado = '.$destacado;
        }

        if($filtro != ''){
            $consulta .= $filtro;
        }
        else{
            $consulta .= ' ORDER BY noticias.fecha DESC ';
        }
        //echo $consulta.'<br/>';
        $res = $c->consulta($consulta);

        while ($row = $c->extarerArray($res)) {
            $p = new noticia($row['id']);
            $this->elementos[] = $p;
        }

    }


}


class noticia extends componente {
    var $id;
    var $titulo;
    var $resumen;
    var $contenido;
    var $fecha;
    var $img_principal;
    var $destacado;


    function  __construct($id = '') {
        global $app;

        $this->componente = 'noticias';

        if ($id != '') {
            $c = new mysql($app);
            $res = $c->consulta("SELECT * FROM $this->componente WHERE id = $id");
            $row = $c->extarerArray($res);

            foreach ($row as $variable => $valor){
                $this->{$variable} = $valor;
            }            

            $res = $c->consulta("SELECT * FROM imagen WHERE nombre_componente='$this->componente' AND id_entrada = '$this->id'");
            while ($row = $c->extarerArray($res)) {
                $p = new imagen($row['id']);
                $this->img_principal = $p;
            }

        }
        else{
            $c = new mysql($app);
            $res = $c->consulta("SELECT MAX(id) as maxi FROM noticias");
            $row = $c->extarerArray($res);

            $this->id = $row['maxi'] +1;

            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id);
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id,0777);
            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id.'/recursos');
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id.'/recursos',0777);
            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id.'/crop');
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id.'/crop',0777);
        }

    }

    function  __toString() {
        return $this->titulo;
    }
    


    function guardar(){
        global $app;
        $c = new mysql($app);

        if ($this->id != ''){
            $c->consulta("UPDATE noticias SET titulo = '$this->titulo', resumen = '$this->resumen', contenido = '$this->contenido', fecha = '$this->fecha', metades = '$this->metades', metatags='$this->metatags', destacado = '$this->destacado'  WHERE id = $this->id");

        }
        else{
            $res = $c->consulta("SELECT MAX(id) as max FROM noticias");
            $row = $c->extarerArray($res);
            $max = $row['max'] + 1;
            $this->id = $max;
            $c->consulta("INSERT INTO noticias (id,titulo,resumen,contenido,fecha,metades,metatags) VALUES ('$max','$this->titulo','$this->resumen','$this->contenido','$this->fecha','$this->metades','$this->metatags')");

            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id);
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id,0777);
            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id.'/recursos');
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id.'/recursos',0777);
            @mkdir($app->ruta_absoluta.'/img/noticias/'.$this->id.'/crop');
            chmod ($app->ruta_absoluta.'/img/noticias/'.$this->id.'/crop',0777);

        }



    }

    public function eliminar(){
        global $app;
        $c = new mysql($app);
        $c->consulta("DELETE FROM noticias WHERE id = '$this->id'");

        $this->img_principal->eliminar();

        if ($this->id != ''){
            deldir($app->ruta_absoluta.'/img/noticias/'.$this->id);
        }

    }

}