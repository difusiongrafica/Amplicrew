<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
class mensajes extends listado {

    public function __construct($cliente, $carpeta) {
        global $app;
        $c = new mysql($app);
        $consulta = 'SELECT DISTINCT id FROM mensajes WHERE mensajes.de = '.$cliente.'';

        if($id_categoria != ''){
            $consulta .= ' AND mensajes.carpeta_id = '.$carpeta;
        }
        

        if($filtro != ''){
            $consulta .= $filtro;
        }
        else{
            $consulta .= ' ORDER BY proyectos.orden ASC ';
        }
        //echo $consulta.'<br/>';
        $res = $c->consulta($consulta);

        while ($row = $c->extarerArray($res)) {
            $p = new mensaje($row['id']);
            $this->elementos[] = $p;
        }

        
    }


}


class mensaje extends componente {
    var $id;
    var $de;
    var $para = array();
    var $carpeta;
    var $fecha;
    var $asunto;
    var $mensaje;
    var $leido;

    function  __construct($id = '') {
        global $app;
        if ($id != '') {
            $c = new mysql($app);
            $res = $c->consulta("SELECT * FROM mensajes WHERE id = $id");
            $row = $c->extarerArray($res);

            $this->id = $row['id'];            
            $this->de = $row['de'];
            $this->para = $row['para'];
            $this->carpeta = $row['carpeta'];            
            $this->fecha = $row['fecha'];
            $this->asunto = $row['asunto'];
            $this->mensaje = $row['mensaje'];
            $this->leido = $row['leido'];


        }
        else{
            $c = new mysql($app);
            $res = $c->consulta("SELECT MAX(id) as maxi FROM mensajes");
            $row = $c->extarerArray($res);

            $this->id = $row['maxi'] +1;
          
        }

    }

    function  __toString() {
        return $this->nombre;
    }

    

    function enviar(){
        global $app;
        $c = new mysql($app);

        $res = $c->consulta("SELECT MAX(id) as max FROM proyectos");
        $row = $c->extarerArray($res);
        $max = $row['max'] + 1;
        $this->id = $max;

        $carpeta = $this->verBandejaDeSalida($de);
        $c->consulta("INSERT INTO mensajes (id,de,para,carpeta_id,created_at,asunto,mensaje) VALUES ('$max','$this->id_cliente','$destino','$carpeta','NOW()','$this->asunto','$this->mensaje')");


        foreach ($this->para as $destino) {
            $carpeta = $this->verBandejaDeEntrada($destino);
            $c->consulta("INSERT INTO mensajes (id,de,para,carpeta_id,created_at,asunto,mensaje) VALUES ('$max','$this->id_cliente','$destino','$carpeta','NOW()','$this->asunto','$this->mensaje')");

        }

        

    }

    public function eliminar(){
        global $app;
        $c = new mysql($app);
        $c->consulta("DELETE FROM mensajes WHERE id = '$this->id'");
        

    }

    private function verBandejaDeEntrada($id_cliente){
        global $app;
        $c = new mysql($app);

        $res = $c->consulta("SELECT id FROM carpeta WHERE nombre = 'Bandeja de Entrada' AND usuario_id = '$id_cliente'");
        $row = $c->extarerArray($res);
        return $row['id'];
    }

    private function verBandejaDeSalida($id_cliente){
        global $app;
        $c = new mysql($app);

        $res = $c->consulta("SELECT id FROM carpeta WHERE nombre = 'Enviados' AND usuario_id = '$id_cliente'");
        $row = $c->extarerArray($res);
        return $row['id'];
    }

}

?>
