<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */


class config{
    var $video;


    public function  __construct() {
        global $app;
        
        $c = new mysql($app);
        $consulta = 'SELECT * FROM config';
        $res = $c->consulta($consulta);
        $row = $c->extarerArray($res);
        
        $this->video = $row['video'];

    }
}