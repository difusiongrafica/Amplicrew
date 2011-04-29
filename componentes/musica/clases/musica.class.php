<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */



class cancion extends componente {  

    function  __construct($id = '') {
        global $app;

        $this->componente = 'cancion';

        if ($id != '') {
            $c = new mysql($app);
            $res = $c->consulta("SELECT * FROM $this->componente WHERE id = $id");
            $row = $c->extarerArray($res);

            foreach ($row as $variable => $valor){
                if ($this->existePropiedad($variable)){
                    $this->{$variable} = $valor;
                }
                
            }

        }
        else{
            $c = new mysql($app);
            $res = $c->consulta("SELECT MAX(id) as maxi FROM $this->componente");
            $row = $c->extarerArray($res);

            $this->id = $row['maxi'] +1;

            @mkdir($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id);
            chmod($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id, 0777);
            @mkdir($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/recursos');
            chmod($app->ruta_absoluta . '/img/' . $this->componente . '/' . $this->id . '/recursos', 0777);

        }

    }

    function  __toString() {
        return $this->titulo;
    }
    


    function guardar(){
        global $app;
        $c = new mysql($app);

        if ($this->id != ''){
            $c->consulta("UPDATE $this->componente SET nombre = '$this->nombre', orden = '$this->orden'  WHERE id = $this->id");
        }
        else{
            $res = $c->consulta("SELECT MAX(id) as max FROM $this->componente");
            $row = $c->extarerArray($res);
            $max = $row['max'] + 1;
            $this->id = $max;
            $c->consulta("INSERT INTO $this->componente (id,nombre) VALUES ('$max','$this->nombre')"); 
        }



    }
    

}