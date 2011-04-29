<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagen
 *
 * @author javi
 */
class imagen extends componente {
    var $nombre_componente;
    var $id_entrada;
    var $descripcion;
    var $principal;
    var $ruta;    
    var $x;
    var $y;
    var $x2;
    var $y2;
    var $w;
    var $h;

    public function  __construct($id = '') {
        $this->componente = 'imagen';
        parent::__construct($id);
    }

    function guardar(){
        global $app;
        $c = new mysql($app);

        if ($this->id != ''){
            $c->consulta("UPDATE $this->componente SET nombre = '$this->nombre', nombre_componente = '$this->nombre_componente', descripcion = '$this->descripcion', id_entrada = '$this->id_entrada', principal = '$this->principal', ruta = '$this->ruta', x='$this->x', y='$this->y', x2='$this->x2', y2='$this->y2', w='$this->w', h='$this->h'  WHERE id = $this->id");

        }
        else{
            $res = $c->consulta("SELECT MAX(id) as max FROM $this->componente");
            $row = $c->extarerArray($res);
            $max = $row['max'] + 1;
            $this->id = $max;
            $c->consulta("INSERT INTO $this->componente (id,nombre,nombre_componente,id_entrada,ruta,descripcion,principal,x,y,x2,y2,w,h) VALUES ('$this->id','$this->nombre','$this->nombre_componente','$this->id_entrada','$this->ruta','$this->descripcion','$this->principal','$this->x','$this->y','$this->x2','$this->y2','$this->w','$this->h')");


        }



    }

    public function eliminar(){
        global $app;
        $c = new mysql($app);
        $c->consulta("DELETE FROM $this->componente WHERE id = '$this->id'");

        if ($this->id != ''){
            unlink($app->ruta_absoluta.'/img/'.$this->nombre_componente.'/'.$this->id_entrada.'/'.$this->id.'.jpg');
            unlink($app->ruta_absoluta.'/img/'.$this->nombre_componente.'/'.$this->id_entrada.'/crop/thum_'.$this->id.'.jpg');
            unlink($app->ruta_absoluta.'/img/'.$this->nombre_componente.'/'.$this->id_entrada.'/crop/preview_'.$this->id.'.jpg');
        }

    }

    function verRecorte($width, $height,$prefijo = '1_') {
        global $app;

        //Obetenemos la ruta absoluta de la imagen
        $ruta_relativa = substr($this->ruta, strlen($app->ruta_base));
        $ruta_absoluta = $app->ruta_absoluta.'/'.$ruta_relativa;

        //echo $ruta_absoluta;

        $file_data = $this->filedata();



        $crop_dir = dirname($ruta_absoluta) . '/crop';
        
        $file_name = $prefijo.$file_data['filename'];
        $file_ext = $file_data['ext'];
        $ruta_absoluta_img = $ruta_absoluta;

        //echo $ruta_absoluta_img;
        
        if (!file_exists($crop_dir)) {
            mkdir($crop_dir);
            chmod($crop_dir, 0777);
        }

        if (file_exists($crop_dir . '/' . $file_name)) {
            header('Content-Type: image/png');
            $img_r = imagecreatefrompng($crop_dir . '/' . $file_name);
            imagealphablending($img_r, true); // setting alpha blending on
            imagesavealpha($img_r, true); // save alphablending setting (important)
            
            imagepng($img_r);
            
            imagedestroy($img_r);
            flush($img_r);
            
            
        } else {
            
            $img_info = getimagesize($ruta_absoluta_img); //informacion de la imagen

            if($file_ext == 'jpg'){
                $img_r = imagecreatefromjpeg($ruta_absoluta_img); // se crea una nueva imagen a partir del jpg
            }
            elseif($file_ext == 'png'){
                $img_r = imagecreatefrompng($ruta_absoluta_img); // se crea una nueva imagen a partir del png
                imagealphablending($img_r, true); // setting alpha blending on
                imagesavealpha($dst_r, true); // save alphablending setting (important)
		
            }
            
            $dst_r = ImageCreateTrueColor($width, $height); //y ahora otra con el tama�o predefinico
            $transparencia = imagecolorallocatealpha($dst_r, 0, 0, 0, 127);
            imagefill($dst_r, 0, 0, $transparencia);
            //probar hacerlo en 2 pasos primero redimensionar y luego recortar
            // start buffering        
            imagealphablending($dst_r, true); // setting alpha blending on
            
            imagecopyresampled($dst_r, $img_r, 0, 0, $this->x, $this->y, $width, $height, $this->w, $this->h); //insertamos la imagen en la nueva con las coordenadas especificadas.
            //echo $crop_dir . $file_name;
            
            
            imagesavealpha($dst_r, true); // save alphablending setting (important)
           
            imagepng($dst_r,$crop_dir .'/'. $file_name);
            header('Content-Type: image/png');
            imagepng($dst_r);
            
            imagedestroy($dst_r);
            flush($dst_r);
            
        }
    }

    function verImagen() {
        global $app;

        //Obetenemos la ruta absoluta de la imagen
        $ruta_relativa = substr($this->ruta, strlen($app->ruta_base));
        $ruta_absoluta = $app->ruta_absoluta.'/'.$ruta_relativa;

        //echo $ruta_absoluta;

        $file_data = $this->filedata();



        $crop_dir = dirname($ruta_absoluta) . 'crop';

        $file_name = $file_data['filename'];
        $file_ext = $file_data['ext'];
        $ruta_absoluta_img = $ruta_absoluta;

        header('Content-Type: image/png');

        if($file_ext == 'jpg'){
            $img_r = imagecreatefromjpeg($this->ruta);
        }
        else{
            $img_r = imagecreatefrompng($this->ruta);
            imagealphablending($img_r, true); // setting alpha blending on
            
            imagesavealpha($img_r, true); // save alphablending setting (important)
            
            

        }

        imagepng($img_r);
        
        imagedestroy($img_r);
        
    }

    public function filedata() {
        $path = $this->ruta;
        // Vaciamos la caché de lectura de disco
        clearstatcache();
        // Comprobamos si el fichero existe
        $data["exists"] = is_file($path);
        // Comprobamos si el fichero es escribible
        $data["writable"] = is_writable($path);
        // Leemos los permisos del fichero
        $data["chmod"] = ($data["exists"] ? substr(sprintf("%o", fileperms($path)), -4) : FALSE);
        // Extraemos la extensión, un sólo paso
        $data["ext"] = substr(strrchr($path, "."), 1);
        // Primer paso de lectura de ruta
        $data["path"] = array_shift(explode("." . $data["ext"], $path));
        // Primer paso de lectura de nombre
        $data["name"] = array_pop(explode("/", $data["path"]));
        // Ajustamos nombre a FALSE si está vacio
        $data["name"] = ($data["name"] ? $data["name"] : FALSE);
        // Ajustamos la ruta a FALSE si está vacia
        $data["path"] = ($data["exists"] ? ($data["name"] ? realpath(array_shift(explode($data["name"], $data["path"]))) : realpath(array_shift(explode($data["ext"], $data["path"])))) : ($data["name"] ? array_shift(explode($data["name"], $data["path"])) : ($data["ext"] ? array_shift(explode($data["ext"], $data["path"])) : rtrim($data["path"], "/"))));
        // Ajustamos el nombre a FALSE si está vacio o a su valor en caso contrario
        $data["filename"] = (($data["name"] OR $data["ext"]) ? $data["name"] . ($data["ext"] ? "." : "") . $data["ext"] : FALSE);
        // Devolvemos los resultados
        return $data;
    }

}

?>
