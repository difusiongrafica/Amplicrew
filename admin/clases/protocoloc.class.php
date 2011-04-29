<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
class protocoloc {
    var $url;
    var $ch;
    public function  __construct($url = '') {
        $this->url = $url;

        try {
            $this->ch = curl_init();
            curl_setopt($this->ch, CURLOPT_URL, $this->url);
        }
        catch (Exception $e){
            die ("ERROR Protocolo C: No se ha podido iniciar la conexión: ".$e);
        }
        
    }

    public function establecerOpcion($opcion, $valor){
        try {
            curl_setopt($this->ch, $opcion, $valor);
        }
        catch (Exception $e){
            die ("ERROR Protocolo C: No se ha podido establecer el valor: ".$e);
        }
    }

    public function enviarDatos($datos){
        try {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);   
        }
        catch (Exception $e){
            die ("ERROR Protocolo C: No se ha podido enviar los datos: ".$e);
        }

    }

    public function iniciar(){
        try {
            curl_exec($this->ch);
        }
        catch (Exception $e){
            die ("ERROR Protocolo C: No se ha podido establecer la conexion: ".$e);
        }
        
    }

    public function parar(){
        try{
            curl_close($this->ch);
        }
        catch (Exception $e){
            die ("ERROR Protocolo C: No se ha podido cerrar la conexion: ".$e);
        }
        
    }


}
?>
