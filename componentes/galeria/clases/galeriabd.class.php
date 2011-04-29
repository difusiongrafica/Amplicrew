<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 * GALERIA CON BASE DE DATOS */


class galeria extends componente{
    var $anio;
    var $id_padre;
    var $descripcion;
    var $imagenes = array();
    var $subgalerias = array();


    public function  __construct($id = '') {
        $this->componente = 'galeria';
        parent::__construct($id);

        if ($this->id != '') {
            global $app;
            $c = new mysql($app);

            $res = $c->consulta("SELECT * FROM imagen WHERE nombre_componente='$this->componente' AND id_entrada = '$this->id'");
            while ($row = $c->extarerArray($res)) {
                $p = new imagen($row['id']);
                $this->imagenes[] = $p;
            }

            $res = $c->consulta("SELECT * FROM galeria WHERE id_padre = '$this->id'");
            while ($row = $c->extarerArray($res)) {
                $p = new galeria($row['id']);
                $this->subgalerias[] = $p;
            }

            @mkdir($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id);
            chmod($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id, 0777);
            @mkdir($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/recursos');
            chmod($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/recursos', 0777);
            @mkdir($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/crop');
            chmod($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/crop', 0777);
        }
        
        
    }


    public function guardar(){
        global $app;
        $c = new mysql($app);

        if ($this->id != ''){
            $c->consulta("UPDATE $this->componente SET nombre = '$this->nombre', anio = '$this->anio', descripcion = '$this->descripcion', id_padre = '$this->id_padre', metades = '$this->metades', metatags='$this->metatags', destacado = '$this->destacado'  WHERE id = $this->id");

        }
        else{
            $res = $c->consulta("SELECT MAX(id) as max FROM $this->componente");
            $row = $c->extarerArray($res);
            $max = $row['max'] + 1;
            $this->id = $max;
            $c->consulta("INSERT INTO $this->componente (id,nombre,anio,descripcion,id_padre,metades,metatags) VALUES ('$max','$this->nombre','$this->anio','$this->descripcion','$this->id_padre','$this->metades','$this->metatags')");

            @mkdir($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id);
            chmod ($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id,0777);
            @mkdir($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id.'/recursos');
            chmod ($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id.'/recursos',0777);
            @mkdir($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id.'/crop');
            chmod ($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id.'/crop',0777);

        }        
    }


    public function eliminar(){
        foreach ($this->imagenes as $i){
            $i->eliminar();
        }

        foreach ($this->subgalerias as $sg){
            $sg->eliminar();
        }

        parent::eliminar();
    }

    public function verNumImagenes(){
        return count($this->imagenes);
    }

    public function verNumSubgalerias(){
        return count($this->subgalerias);
    }
}

?>
