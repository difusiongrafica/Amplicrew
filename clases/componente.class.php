<?php

/**
 * Esta clase generaliza todos los componentes que se agregaran.
 * Cada componente debe extender de este.
 *
 * @author Difusión Gráfica
 */
class componente {
    //put your code here
    var $id;
    var $componente; //nombre del componente
    var $nombre;
    var $metades;
    var $metatags;
    var $destacado;
    var $orden;

    public function  __construct($id = '') {
        global $app;

        if ($this->componente != ''){
            if ($id != '') {
                $c = new mysql($app);
                
                $res = $c->consulta("SELECT * FROM $this->componente WHERE id = '$id'");
                $row = $c->extarerArray($res);

                foreach ($row as $variable => $valor) {
                    if($this->existePropiedad($variable)){
                        $this->{$variable} = $valor;
                    }  
                }
            } else {
                $c = new mysql($app);
                $res = $c->consulta("SELECT MAX(id) as maxi FROM $this->componente");
                $row = $c->extarerArray($res);

                $this->id = $row['maxi'] + 1;
            }

        }
        
    }

    function existePropiedad($propiedad){
        return property_exists($this, $propiedad);
    }

    function  __toString() {
        return $this->nombre;
    }

    function  __get($name) {
        return $this->{$name};
    }

    function  __set($name, $value) {
        $this->{$name} = $value;
    }


    public function eliminar(){
        global $app;
        $c = new mysql($app);
        $c->consulta("DELETE FROM $this->componente WHERE id = '$this->id'");

        if ($this->id != ''){
            deldir($app->ruta_absoluta.'/img/'.$this->componente.'/'.$this->id);
        }

    }
   
}

class listado{
    
    var $elementos = array();

    public function __construct($clase = '',$filtro='',$destacado='') {
        global $app;
        $c = new mysql($app);
        $consulta = 'SELECT DISTINCT id FROM '.$clase.' WHERE 1=1 ';

        if($destacado != ''){
            $consulta .= ' AND destacado = '.$destacado;
        }

        if($filtro != ''){
            $consulta .= $filtro;
        }
        else{
            $consulta .= ' ORDER BY '.$clase.'.id DESC ';
        }
        //echo $consulta.'<br/>';
        $res = $c->consulta($consulta);

        while ($row = $c->extarerArray($res)) {
            $p = new $clase($row['id']);
            $this->elementos[] = $p;
        }
    }

    function numeroElementos(){
        return count($this->elementos);
    }

    function existePropiedad($propiedad){
        return property_exists($this, $propiedad);
    }

    public function ordernarPorAtributo($atributo = 'id',$sentido = '1'){
        if (!$this->existePropiedad($atributo)){
            return $this->elementos; //Si no existe el atributo devolvemos el mismo listado
        }

        if ($this->numeroElementos() == 0){
            return $this->elementos; // Si no hay elementos devolvemos el mismo listado
        }

        if(is_array($this->elementos[0]->{$atributo})){
            return $this->elementos; //Si el campo es un array devolvemos el mismo listado
        }
        
        $i = 0;
        $j = 0;

        while($i <= $this->numeroElementos()){
            while($j <= $this->numeroElementos()){
                if($this->compararAtributos($atributo,$this->elementos[$i],$this->elementos[$j]) > 0){
                    $temp = $this->elementos[$i];
                    $this->elementos[$i] = $this->elementos[$j];
                    $this->elementos[$j] = $temp;

                    echo $cambio;
                }
                
            }
        }

        return $this->elementos;


    }

    private function compararAtributos($atributo, $a, $b){
        if ($a->{$atributo} >= $b->{$atributo}){
            return 1;
        }
        else{
            return 0;
        }
    }

}
?>